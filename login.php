<?php include 'include/session.php'; ?>
<?php
if (isset($_SESSION['user'])) {
  header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>เข้าสู่ระบบ | boychawin.com</title>
  <?php include 'include/head.php'; ?>

</head>

<body>

  <div class="container">


    <?php include 'include/nav.php'; ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <h5 class="card-header">เข้าสู่ระบบ</h5>
            <div class="card-body">

              <?php
              if (isset($_SESSION['error'])) {
                echo "
                <div class='alert alert-danger d-flex align-items-center' role='alert'>
                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Warning:'>
                  <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
                </svg>
                <div>
                " . $_SESSION['error'] . "
                </div>
              </div>
            ";
                unset($_SESSION['error']);
              }
              if (isset($_SESSION['success'])) {
                echo "
                <div class='alert alert-success d-flex align-items-center' role='alert'>
                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Success:'>
                <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
                </svg>
                <div>
                " . $_SESSION['success'] . "
                </div>
              </div>
        ";
                unset($_SESSION['success']);
              }
              ?>
              <div class="container">
                <div class="row ">
                  <div class="col-12">
                    <form action="login_db.php" method="POST">
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">อีเมล</label>
                        <input type="email" name="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">เราจะไม่แบ่งปันอีเมลของคุณกับคนอื่น</div>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">รหัสผ่าน</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                      </div>
                      <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">จดจำ</label>
                      </div>

                      <div class="d-grid gap-2">
                        <button name="login" type="submit" class="btn btn-outline-primary" type="button">เข้าสู่ระบบ</button>
                      </div>


                      <br>
                      <br>

                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section>

  </div>

  <?php include 'include/scripts.php' ?>
</body>

</html>