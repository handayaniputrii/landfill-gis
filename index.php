<?php
include'functions.php';
//if(empty($_SESSION['login']))
    //header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="icon" href="palembang.png"/>

    <title>Pemetaan Penentuan Lokasi Baru TPA kota Palembang</title>
    <link href="assets/css/cerulean-bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/general.css" rel="stylesheet"/>
	<link href="assets/css/styles.css" rel="stylesheet"/>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiDdGyp6n2hKHPECuB6JZIT-8dVHCpwI0&language=id&region=ID&libraries=drawing,places,geometry"></script>
    <script>
               
    </script>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-static-top">
	  <div class="container1">   
        <div class="navbar-header">
          <a class="navbar-brand" href="?m=alternatif_list_login">Pemetaan Penentuan Lokasi Baru TPA kota Palembang</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse pull-right">
          <ul class="nav navbar-nav">
          <?php if($_SESSION['login']):?>
			<?php if($_SESSION['level']=='pimpinan'):?>
			<li><a href="?m=alternatif_list_login"><span class="glyphicon glyphicon-map-marker"></span> Peta</a></li>
			<li><a href="?m=hitung"><span class="glyphicon glyphicon-th"></span> Perhitungan</a></li>
            <?php endif?> 
            <?php if($_SESSION['level']=='admin'):?>
			<li><a href="?m=alternatif_list_login"><span class="glyphicon glyphicon-map-marker"></span> Peta</a></li>
			<li class="dropdown"><a href="?m=kriteria"><span class="glyphicon glyphicon-list-alt"></span>  Kriteria <b class="caret"></b></a>
				<ul>
				<li><a href="?m=kriteria"><span class="glyphicon glyphicon-list-alt"></span>   Kriteria</a></li>
				<li><a href="?m=sub"><span class="glyphicon glyphicon-th-list"></span>  Nilai kriteria</a></li>
				<li><a href="?m=rel_kriteria"><span class="glyphicon glyphicon-calendar"></span>  Bobot Kriteria</a></li>
				</ul>
			</li>
            <li><a href="?m=alternatif"><span class="glyphicon glyphicon-text-background"></span>   Alternatif<b class="caret"></b></a>
				<ul>
					<li><a href="?m=alternatif"><span class="glyphicon glyphicon-text-background"></span> Alternatif</a></li>
					<li><a href="?m=rel_alternatif"><span class="glyphicon glyphicon-text-color"></span> Nilai Alternatif</a></li>            
				</ul>
			</li>
			<li><a href="?m=hitung"><span class="glyphicon glyphicon-th"></span> Perhitungan</a></li>
            <li><a href="?m=user"><span class="glyphicon glyphicon-user"></span> User</a></li>
            <?php endif?>         
			<li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
			<span class="profile-ava">
							<?php
										if(isset($_SESSION['login'])){
											if ($_SESSION['level'] == 'admin'){
												echo'<img alt="" src="pemimpin.png" width="35px" height="35px">';
												}
											else
											{
												echo'<img alt="" src="admin.png"  width="35px" height="35px">';
										}
										echo'<td> ' .$_SESSION['login'].'</td>';
										}
							?>
                            <b class="caret"></b>
            </span>
			</a>
			<ul>
				<li><a href="?m=password"><span class="glyphicon glyphicon-wrench"></span> Ganti Password</a></li> 
				<li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>         
			</ul>
			</li>
          <?php else:?>
			<li><a href="?m=tentang"><span class="glyphicon glyphicon-log-out"></span> Tentang</a></li>
			<li><a href="?m=profil"><span class="glyphicon glyphicon-log-out"></span> Profil DKLH</a></li>
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          <?php endif?>
		  
          </ul>
        </div><!--/.nav-collapse -->
    </nav>    
    <div class="container2">
    <?php
        if(file_exists($mod.'.php'))
            include $mod.'.php';
        else
            include 'alternatif_list_login.php'; //halaman pertama ketika membuka web
    ?>
    </div>
    <footer class="footer bg-primary">
      <div class="container3">
        <p>Copyright &copy; Handayani Putri Wardanny </p>
      </div>
    </footer>
</body>
</html>
