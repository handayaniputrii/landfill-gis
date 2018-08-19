<?php include 'functions.php';?>
<!doctype html>
<html>
<head>
    <title>Cetak Laporan</title>    
    <style>
    body{
        font-family: Arial;
        font-size: 12px;
        /*line-height: 20px;*/
    }
    .wrapper{
        margin: 0 auto;
        max-width: 980px;
    }    
    .header{
        margin-top: 30px;
        text-align:center;
    }
    h1{
        font-size: 14px;
    }
    .table{    	
    	color:#232323;
    	border-collapse:collapse;
    }
    th,td{
    	border:1px solid #999;
    	padding:5px 10px;        
    }
    thead{
        white-space: nowrap;
    }
    a{
        color: #232323;
        text-decoration: none;
    }
    </style>
</head>
<body onload="window.print()">
    <div class="wrapper">
    <?php    
    if(is_file($_GET['m'].'_cetak.php'))
        include $_GET['m'].'_cetak.php';
    ?>
    </div>
</body>
</html>
