<?php include 'includes/session.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> เพิ่ม ลบ แก้ไข บน Modal ด้วย PDO and jQuery AJAX  | boychawin.com</title>
	<!-- Fontawesome -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- Toastr -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
</head>

<body background="https://boychawin.com/B_images/logoboychawins.com.png">
	<!-- container -->
	<div class="container mt-5">
		<div class="row">
			<div class="col-12">
				<div class="jumbotron">
					<p class="lead"> เพิ่ม ลบ แก้ไข บน Modal ด้วย PHP + PDO and jQuery AJAX </p>
					<hr class="my-4">
				</div>
			</div>
		</div>
	</div>
	<div class="container-sm">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header bg-transparent"">
						<a type=" button" href="#addnew" class="btn btn-primary btn-sm btn-flat" data-bs-toggle="modal" data-bs-target="#addnew"><i class="fas fa-plus-square"></i></a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<th>Email</th>
									<th>action</th>
								</thead>
								<tbody>
									<?php
									$conn = $pdo->open();

									try {
										$stmt = $conn->prepare("SELECT * FROM users");
										$stmt->execute();
										foreach ($stmt as $row) {
											echo "
													<tr>
														<td>" . $row['email'] . "</td>
														<td>
														<button class='btn btn-success btn-sm edit btn-flat' data-id='" . $row['id'] . "'><i class='fa fa-edit'></i> </button>
														<button class='btn btn-danger btn-sm delete btn-flat' data-id='" . $row['id'] . "'><i class='fa fa-trash'></i> </button>
														</td>
													</tr>
													";
										}
									} catch (PDOException $e) {
										echo $e->getMessage();
									}

									$pdo->close();
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include 'includes/users_modal.php'; ?>
	</div>

	<?php include 'includes/scripts.php'; ?>
	<script>
		$(function() {
			$(document).on('click', '.edit', function(e) {
				e.preventDefault();
				$('#edit').modal('show');
				var id = $(this).data('id');
				getData(id);
				console.log(id);
			});

			$(document).on('click', '.delete', function(e) {
				e.preventDefault();
				$('#delete').modal('show');
				var id = $(this).data('id');
				console.log(id);
				getData(id);
			});

		});

		function getData(id) {
			$.ajax({
				type: 'POST',
				url: 'users_data.php',
				data: {
					id: id
				},
				dataType: 'json',
				success: function(response) {
					$('.bcId').val(response.id);
					$('#edit_email').val(response.email);
					$('.del_email').html(response.email);
				}
			});
		}
	</script>
</body>

</html>
