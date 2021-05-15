<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #e3f2fd;">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php">
			<img src="https://boychawin.com/B_images/logoboychawin.com.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
			boychawin.com
		</a>

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="index.php">หน้าหลัก</a>
				</li>

				<?php if (isset($_SESSION['user'])) { ?>


					<li class="nav-item">
						<a class="nav-link alert-success" role="alert"" href="logout.php">ยินดีตอนรับ <?php if (isset($user['firstname'])) {
																	echo $user['firstname'];
																} ?> </a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="logout.php">ออกจากระบบ</a>
					</li>
				<? } else { ?>

					<li class="nav-item">
						<a class="nav-link" href="login.php">เข้าสู่ระบบ</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="register.php">สมัคร</a>
					</li>
				<? } ?>

			</ul>
			<form class="d-flex">
				<input class="form-control me-2" type="search" placeholder="ค้นหา" aria-label="Search">
				<button class="btn btn-outline-success" type="submit">ค้นหา</button>
			</form>

		</div>
	</div>
</nav>