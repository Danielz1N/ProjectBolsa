<?php
  session_start();
  if(isset($_SESSION['adm'])){
    echo 'Bem vindo '.$_SESSION['adm'].' - ADM';
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
    <?php include_once("header.php") ?>
    <?php include_once("../conexao.php") ?>

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

    <?php include_once("conexao.php"); ?>
    <div style="margin-top: 4%"class="row">
    <div class="form-group text-center">
       <h3>Consulta de Avaliação</h3><br>
    <form id="form1" class="form-horizontal" method="POST" action="consulta-pdf.php" role="form">

      <select autofocus style="margin-top:3%;margin-bottom:1.5%;width: 50%;margin-left: 25%" class="form-control" name="instru_aval" id="instru_aval">
            <option hidden="">Instrumento de Avaliação</option>
            <?php
              $res = mysqli_query($conn,"SELECT id,descricao FROM instrumento ORDER BY LTRIM(descricao)");
              while($row = mysqli_fetch_array($res) ) {
            ?>
              <option value="<?php echo $row["id"]; ?>"><?php echo utf8_encode($row["descricao"]); ?></option>
            <?php
              }
            ?>
      </select>
      <select onchange="change_campus()" style="margin-bottom:1.5%;width: 50%;margin-left: 25%" class="form-control" name="campus" id="campus">
            <option hidden="">Campus</option>
            <?php
              $res = mysqli_query($conn,"SELECT id,nome FROM campus ORDER BY LTRIM(nome)");
              while($row = mysqli_fetch_array($res) ) {
            ?>
              <option value="<?php echo $row["id"]; ?>"><?php echo utf8_encode($row["nome"]); ?></option>
            <?php
              }
            ?>
      </select>
      <select onchange="change_unid_acad()" style="margin-bottom:1.5%;width: 50%;margin-left:25%"class="form-control" name="unid_acad" id="unid_acad">
            <option hidden >Unidade Acadêmica</option>
      </select>
      <select onchange="change_curso()" style="margin-bottom:7%;width: 50%;margin-left: 25%"class="form-control" name="curso" id="curso">
            <option hidden>Curso</option>
      </select>
      <button id= center-button-clear type="reset" style="margin-right: 25px" class="btn btn-reset">Limpar</button>
      <button type="submit" id="center-button-submit" name="insert" class="btn btn-success">Consultar</button>

    </form>
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  <script type="text/javascript">
    function change_campus(){
      var id = $('#campus').val();
      $.ajax({
        url:"ajax.php",
        method: "POST",
        data:{id:id},
        success:function(result)
        {
          $('#unid_acad').html(result);
        }
      })
    };
    function change_unid_acad(){
      var id_unid_acad = $('#unid_acad').val();
      $.ajax({
        url:"ajax.php",
        method: "POST",
        data:{id_unid_acad:id_unid_acad},
        success:function(result)
        {
          $('#curso').html(result);
        }
      })
    };
  </script>
	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/js/retina.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="../assets/js/smoothscroll.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-func.js"></script>
  </body>
</html>
