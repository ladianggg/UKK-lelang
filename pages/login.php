


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>AdminLTE 2 | Log in</title>
  <!-- Bootstrap 4.0.0 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      Administrator
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Log In to Access the Admin Page.</p>
      <form action="login_process.php" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="username" placeholder="Username">
          <!-- <span class="fa fa-user form-control-feedback"></span> -->
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Password"><br>
          <!-- <span class="fa fa-lock form-control-feedback"></span> -->
          <div class="form-group">
                      <select class="form-control" name="level">
                        <option value="" disabled selected>--Pilih Level--</option>
                        <option value="petugas">Petugas</option>
                        <option value="administrator">Administrator</option>
                        <option value="masyarakat">Masyarakat</option>
                      </select>
                    </div>
          <div class="text-center">
            <p class="mb-0">Don't have an account? <a href="register.php" class="text-black-50 fw-bold">Register!</a></p>
          </div>
        

          <button type="submit" class="btn btn-primary btn-block" href="index.php">Login</button>
        </div>
      </form>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
  <!-- jQuery 3.2.1 -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap 4.0.0 -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>