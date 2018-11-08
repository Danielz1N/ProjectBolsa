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

   <title> Consulta/Cadastro de Avaliação </title>

    <!-- Bootstrap core CSS -->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="../../assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/icomoon.css">
    <link href="../../assets/css/animate-custom.css" rel="stylesheet">
    <script src="../../assets/js/jquery.min.js"></script>  
    <script type="text/javascript" src="../../assets/js/modernizr.custom.js"></script>
    
    
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    
    

  </head>

  <body data-spy="scroll" data-offset="0" data-target="#navbar-main">
  
    <?php include_once("header.php") ?>
    <?php include_once("../conexao.php") ?>
    <br>
    <br>

    <style type="text/css">
      #div_form{
        position: relative;
        top: 8%;
        text-align: center;
      }
    </style>

		<div id="div_form" class="container">
  		<div class="form-group text-center">
        <h3>Atualizar Unidade Acadêmica</h3>
        <form id='form1'class="form-horizontal" method="POST" action="att_unid_acad.php">
          
          <select autofocus onchange="change_campus()" style="margin-top:10%;margin-bottom:2.5%;width: 600px;margin-left: 260px" class="form-control" name="campus" id="campus">
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

          <select autofocus onchange="change_unid()"style="margin-bottom:2.5%;width: 600px;margin-left: 260px"class="form-control" name="unid_acad" id="unid_acad">
            <option>Unidade Acadêmica</option>
          </select>

          <input style= "margin-bottom:8%;margin-left:260px;width: 600px" type="text" class="form-control" name = "new_unid_acad" id="new_unid_acad" placeholder="Nome da Nova Unidade Acadêmica">

          <button id= center-button-clear type="reset" style="margin-right: 30px" class="btn btn-reset">Limpar</button>
          <input type="button" onclick="verify()" id="center-button-submit" name="insert" class="btn btn-success" value="Atualizar">
        </form>
      </div>
		</div><!-- container -->

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
   function change_unid(){
      document.getElementById("new_unid_acad").value = $("#unid_acad option:selected").text();
    };
    function verify(){
      var campus = document.getElementById("campus").value;
      var unid_acad = document.getElementById("unid_acad").value;
      var input = document.getElementById("new_unid_acad").value;
      if(campus != "Campus" && unid_acad != "Unidade Acadêmica" && input != ""){
        document.getElementById('form1').submit();
      }else{
        alert("Verifique os Campos");
      }
    } 
  </script>

	<script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../assets/js/retina.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="../../assets/js/smoothscroll.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery-func.js"></script>
  </body>
</html>
