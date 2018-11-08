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
      .text-center {
    border-bottom: 1px solid #ddd;
    padding-bottom: 5px;
    margin-bottom: 5px;
}
    </style>

		<div class="container">
      <form id='form1' method="POST" action="insert_avaliacao.php">
  		<div class="form-group text-center">
        <h3 style="margin-top: 4%">Cadastro de Avaliação</h3>
        <div class="row">
        <select autofocus onchange="change_instru()" style="float:left;margin-top:4%;margin-bottom:1.5%;width: 55%;margin-left: 7%" class="form-control" name="instru_aval" id="instru_aval">
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
        <input style= "margin-left:69%;margin-top:4%;width: 25%" type="date" class="form-control" name = "data" id="data">
      </div>
      <div class="row">
        <select onchange="change_campus()" style="float:left;margin-bottom:1.5%;width: 55%;margin-left: 7%" class="form-control" name="campus" id="campus">
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
          <input style= "margin-left:69%;width: 25%" type="text" class="form-control" name = "nota_final" id="nota_final" placeholder="Nota Final">
        </div>
        <div class="row">
          <select onchange="change_unid_acad()" style="margin-bottom:1.5%;width: 55%;margin-left:7%"class="form-control" name="unid_acad" id="unid_acad">
            <option hidden >Unidade Acadêmica</option>
          </select>
        </div>

        <div class="row">
          <select style="margin-bottom:1.5%;width: 55%;margin-left: 7%"class="form-control" name="curso" id="curso">
            <option hidden>Curso</option>
          </select>
          <input autofocus style= "float:left;margin-left:7%;width: 55%;margin-bottom: 1.5%" type="text" class="form-control" name = "descricao" id="descricao" placeholder="Descrição da Avaliação">
          <button id= center-button-clear type="reset" style="margin-right: 25px" class="btn btn-reset">Limpar</button>
          <input type="button" onclick="verify()" id="center-button-submit" name="insert" class="btn btn-success" value="Cadastrar">
        </div>
      </div>
      <div style="margin-left: 5.6%;margin-right: 6%"class="row" name="conteudo" id="conteudo">
        <!-- PHP -->
      </div>
    </form>
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
    function change_instru(){
      var id = $('#instru_aval').val();
      $.ajax({
        url:"ajax_cadastrar.php",
        method: "POST",
        data:{id:id},
        success:function(result)
        {
          $('#conteudo').html(result);
        }
      })
    }; 
    function verify(){
      var instrumento = document.getElementById("instru_aval").value;
      var data = document.getElementById("data").value;
      var campus = document.getElementById("campus").value;
      var nota_final = document.getElementById("nota_final").value;
      var unid_acad = document.getElementById("unid_acad").value;
      var curso = document.getElementById("curso").value;
      var descricao = document.getElementById("descricao").value;
      var aux = 0;
      elements = document.getElementsByTagName("input");
      if(instrumento != "Instrumento de Avaliação" && data != "" && campus != "Campus" && nota_final != "" && unid_acad != "Unidade Acadêmica" && curso != "Curso" && descricao != ""){
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
