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
        <h3>Deletar Dimensões</h3>
        <form id='form1'class="form-horizontal" method="POST" action="del_dimensoes.php">
          
          <select autofocus onchange="change_dimensao()" style="margin-top:10%;margin-bottom:2.5%;width: 600px;margin-left: 260px" class="form-control" name="instrumento" id="instrumento">
            <option hidden="">Instrumento de Avaliação</option>
            <?php
              $res = mysqli_query($conn,"SELECT * FROM instrumento ORDER BY LTRIM(descricao)");
              while($row = mysqli_fetch_array($res) ) {
            ?>
              <option value="<?php echo $row["id"]; ?>"><?php echo utf8_encode($row["descricao"]); ?></option>
            <?php
              }
            ?>
          </select>

          <select style="margin-bottom:12%;width: 600px;margin-left: 260px" class="form-control" name="dimensao" id="dimensao">
            <option hidden="">Descrição da Dimensão</option>
          </select>


            
          <button id= center-button-clear type="reset" style="margin-right: 30px" class="btn btn-reset">Limpar</button>
          <input type="button" onclick="verify()" id="center-button-submit" name="insert" class="btn btn-success" value="Deletar">
        </form>
      </div>
		</div><!-- container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript">
   function change_dimensao(){
      var id_instru = $('#instrumento').val();
      $.ajax({
        url:"ajax.php",
        method: "POST",
        data:{id_instru:id_instru},
        success:function(result)
        {
          $('#dimensao').html(result);
        }
      })
    };
    function verify(){
      var instrumento = document.getElementById("instrumento").value;
      var dimensao = document.getElementById("dimensao").value;
      if(instrumento != "Instrumento de Avaliação" && dimensao != "Descrição da Dimensão"){
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
