<?php
  session_start();
  if(isset($_SESSION['adm'])){
  }else{
    echo '<script type="text/javascript">window.location="../index.html"</script> ';
  }

?>


<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Daniel de Amaral">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">
    <title> Consulta/Cadastro de Avaliação </title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <style>
    html, body{
      padding: 0;
      margin: 0;
      height: 100%;
    }
    #wrapper {
      min-height: 100%;
      position: relative;
    }
    #header { 
      height: 50px;
    }
    #content {
      padding-bottom: 90px;
    }
    #footerwrap {
      position: absolute;
      bottom: 0;
      width: 100%;
      padding-top: 20px; 
      /* Set the fixed height of the footer here */
      height: 65px;
      line-height: 200px; /* Vertically center the text there */
      background-color: #f5f5f5;
    }    
    </style>
    <!-- Custom styles -->
    <link href="../assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/icomoon.css">
    <link href="../assets/css/animate-custom.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    <!-- Scripts JS -->
    <script src="../assets/js/jquery.min.js"></script>
	  <script type="text/javascript" src="../assets/js/modernizr.custom.js"></script>
  </head>

  <body data-spy="scroll" data-offset="0" data-target="#navbar-main">
  <div id="wrapper">
  	<div id="navbar-main">
      <!-- Fixed navbar -->
      <?php include_once("header.php") ?>
    </div>
  </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
		

	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/js/retina.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="../assets/js/smoothscroll.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-func.js"></script>
  </body>
</html>
