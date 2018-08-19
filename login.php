<?php include 'functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-theme.css" rel="stylesheet">
	<link href="assets/css/elegant-icons-style.css" rel="stylesheet" />
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/style-responsive.css" rel="stylesheet" />  
	<link rel="icon" href="palembang.png"/>
  </head>

  <body class="login-img3-body">
  <div class="container">
    <form class="login-form" action="?act=login" method="post">
      <div class="login-wrap">
        <p class="login-img"><img alt="" src="palembang.png" width="70px" height="70px"></p>
		<?php if($_POST) include 'aksi.php'; ?>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input type="text" class="form-control" name="user" placeholder="Username" required autofocus >
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
          <input type="password" class="form-control" name="pass" placeholder="Password" required>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Masuk</button>
      </div>
    </form>
  </div>

</body>
</html>
