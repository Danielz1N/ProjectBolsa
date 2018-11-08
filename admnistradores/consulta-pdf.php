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

    <!-- Bootstrap core CSS -->
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


    <!-- Custom styles for this template -->
    <link href="../assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/icomoon.css">
    <link href="../assets/css/animate-custom.css" rel="stylesheet">


    
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    
    <script src="../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/modernizr.custom.js"></script>
    
  </head>

  <body data-spy="scroll" data-offset="0" data-target="#navbar-main">

    <br>
    <br>

    <?php include_once("conexao.php"); ?>
    <div class="row">
      <div class="form-group text-center">
        <h3>Consulta de Avaliação</h3><br>
          <?php include_once("consulta_pdf.php"); ?>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  <script type="text/javascript">
    $(document).ready(function() {

      elements = document.getElementsByName("tdresponsive");
      for (var i = 0; i < elements.length; i++) {
        if(elements[i].attributes[1].value == 0){
          elements[i].style.backgroundColor="white";
        }if(elements[i].attributes[1].value == 1){
          elements[i].style.backgroundColor="#d50719";
        }
        if(elements[i].attributes[1].value == 2){
          elements[i].style.backgroundColor="#d75b00";
        }
        if(elements[i].attributes[1].value == 3){
          elements[i].style.backgroundColor="#c49200";
        }if(elements[i].attributes[1].value == 4){
          elements[i].style.backgroundColor="#97c100";
        }
        if(elements[i].attributes[1].value == 5){
          elements[i].style.backgroundColor="#1beb12";
        }if(elements[i].attributes[1].value == 'NA'){
          elements[i].style.backgroundColor="#e6e6e6";
        }
      }

    });

  </script>
	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/js/retina.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="../assets/js/smoothscroll.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-func.js"></script>
  </body>
</html>
