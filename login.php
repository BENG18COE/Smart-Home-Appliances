<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>


<?php
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $email = mysqli_real_escape_string($connection, $email);
  $password = mysqli_real_escape_string($connection, $password);

  $query = "SELECT * FROM users WHERE user_email = '{$email}' ";
  $select_admin_query = mysqli_query($connection, $query);

  if (!$select_admin_query) {
    die("QUERY FAILED" . mysqli_error($connection));
  }

  while ($row = mysqli_fetch_array($select_admin_query)) {
    $db_email = $row['user_email'];
    $db_password = $row['user_password'];

    if ($email == $db_email && $db_password == $password) {

      // Unsetting all cookies
      setcookie("user_email", "", time() - (60 * 60 * 24 * 7), "/chauka");

      $expiration = time() + (7200); // Setting Coookie expiration of two hours
      setcookie("user_email", $email, $expiration);

      header("Location: ./");
    } elseif ($email != $db_email && $db_password == $password) {
      echo '
          <br>
          <div class="alert border-0 border-danger border-start border-4 bg-light-danger alert-dismissible fade show" style="position: relative; min-width: 50%; position: absolute; top: 0; right: 0;">
            <div class="d-flex align-items-center">
              <div class="fs-3 text-info">
                <i class="bi bi-info-circle-fill"></i>
              </div>
              <div class="ms-3">
            <div class="text-danger">Wrong Email or Password</div>
            </div>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <br>
        <br>
      ';
    } elseif ($email == $db_email && $db_password != $password) {
      echo '
          <br>
          <div class="alert border-0 border-danger border-start border-5 bg-light-danger alert-dismissible fade show" style="position: relative; min-width: 50%; position: absolute; top: 0; right: 0;">
            <div class="d-flex align-items-center">
              <div class="fs-3 text-info">
                <i class="bi bi-x-circle-fill"></i>
              </div>
              <div class="ms-3">
            <div class="text-danger">Wrong Email or Password</div>
            </div>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <br>
        <br>
      ';
    }
  }
}
?>


<!doctype html>
<html lang="en" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <link href="assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../cdn.jsdelivr.net/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css">

  <!-- plugins -->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

  <!-- Bootstrap CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- Favicon icon -->
  <title>Login Chauka Smart Home</title>

  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet" />

  <style>
    body {
      overflow-x: hidden;
    }
  </style>
</head>

<body>
  <!--start wrapper-->
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="assets/images/error/login.svg" class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form action="" method="post" class="form-body" id="sign_in" accept-charset="utf-8">
            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form1Example13">Email address</label>
              <input type="email" id="form1Example13" class="form-control form-control-lg" name="email" placeholder="Email" autocapitalize="off" require>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form1Example23">Password</label>
              <input type="password" id="form1Example23" class="form-control form-control-lg" name="password" placeholder="Password" autocapitalize="off" require>
            </div>

            <!-- Submit button -->
            <div class="text-center">
              <button type="submit" class="btn btn-primary btn-lg btn-block" name="login">Sign in</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </section>
  <!--end wrapper-->


  <!--plugins-->
  <script src="js/jquery.min.js"></script>
  <script src="js/pace.min.js"></script>

</body>

</html>