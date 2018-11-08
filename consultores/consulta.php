<?php
  session_start();
  if(isset($_SESSION['nor'])){
    echo 'Bem vindo '.$_SESSION['nor'].'';
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
  
  
  	<div id="navbar-main">
      <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon icon-shield" style="font-size:30px; color:#3498db;"></span>
          </button>
          <a class="navbar-brand hidden-xs hidden-sm" href="index.php"><span class="icon icon-file" style="font-size:18px; color:#3498db;"></span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li><a href="index.php" class="smoothScroll">Início</a></li>
              <li><a href="consulta.php">Consulta de Avaliação</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="left:705px">Olá, <?php echo $_SESSION['nor']; ?><span class="caret"></span>
                </a>
                <ul style="left:705px" class="dropdown-menu">
                  <li><a href="sair.php">Sair</a></li>
                </ul>
              </li>           
              
        </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <br>
    <br>
    <br>

    <style type="text/css">
      #div_consulta{
        position: relative;
        top: 8%;
        text-align: center;
      }
      #center-button-clear{
        position: relative;
        text-align:center;
        margin-right: 40px;
      }
      #center-button-submit{
        position: relative;
        text-align:center;
      }
      .form-control{
        width: 600px;
        margin: auto;
      }
    </style>

    <div id="div_consulta" class=container>
      <h3>Consulta de Avaliação Externa</h3><br>

    <?php include_once("conexao.php"); ?>
    <div class="form-group text-center">
    <form id="form1" class="form-horizontal" method="POST" action="consulta-pdf.php" role="form">

      <select onchange="change_campus()" class="form-control" name="campus" id="campus">
        <option>Campus</option>
        <?php
          $res = mysqli_query($conn,"SELECT DISTINCT campus.id,campus.nome FROM campus INNER JOIN instru_avaliacao ON campus.id = instru_avaliacao.id_campus ORDER BY LTRIM(campus.nome)");
          while($row = mysqli_fetch_array($res) ) {
        ?>
          <option value="<?php echo $row["id"]; ?>"><?php echo utf8_encode($row["nome"]); ?></option>
        <?php
          }
        ?>
      </select><br><br>

      <select onchange="change_unid_academica()" class="form-control" name ="unid_academica" id="unid_academica">
        <option>Unidade Acadêmica</option>
      </select><br><br>

      <select onchange="change_curso()" class="form-control" name="curso" id="curso">
        <option>Curso</option>
      </select><br><br>

      <select class="form-control" name="data" id="data">
        <option>Avaliação/Data</option>
      </select><br><br>

      <input type="hidden" name = "aux" id="aux" value=""></input>
      
      

    </form>
</div>

      <input id= center-button-clear type="button" onclick="reset();"class="btn btn-reset" value="Limpar" />
      <input type="button" id="center-button-submit" onclick= "submit();" name="insert" class="btn btn-success" value="Consultar">


    </div><br><br><br><br><br><br>






		<div id="footerwrap">
			<div class="container">
				<h4>Criado por Daniel Amaral</a> - Copyright 2018</h4>
			</div>
		</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="../js/consulta.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/js/retina.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="../assets/js/smoothscroll.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-func.js"></script>
  </body>
</html>
