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
        <h3>Atualizar Dimensões</h3>
        <form id='form1'class="form-horizontal" method="POST" action="att_dimensoes2.php">
          
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

          <select autofocus onchange="change_all()" style="margin-bottom:2.5%;width: 600px;margin-left: 260px" class="form-control" name="dimensao" id="dimensao">
            <option hidden="">Descrição da Dimensão</option>
          </select>

          <input style= "margin-bottom:2.5%;margin-left:260px;width: 600px" type="text" class="form-control" name = "descricao" id="descricao" placeholder="Descricão da Dimensão">

          <div>
            <input autofocus style= "float:left;margin-right:80px;margin-left:260px;width: 260px" type="text" class="form-control" name = "n_dim" id="n_dim" placeholder="Nº da Dimensão">
            <input autofocus style= "margin-bottom:10%;margin-left:260px;width: 260px" type="text" class="form-control" name = "order_dim" id="order_dim" placeholder="Ordem da Dimensão">
          </div>


          <button id= center-button-clear type="reset" style="margin-right: 30px" class="btn btn-reset">Limpar</button>
          <input type="button" onclick="verify()" id="center-button-submit" name="insert" class="btn btn-success" value="Atualizar">
        </form>
      </div>
		</div><!-- container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	

  <script type="text/javascript">
    function change_all(){
      var id = $('#instrumento').val();
      $.ajax({
        url:"att_dimensoes.php",
        method: "POST",
        data:{id:id},
        dataType:"JSON",
        success:function(data)
        {
          document.getElementById("descricao").value = data.descricao;
          document.getElementById("n_dim").value = data.n_dim;
          document.getElementById("order_dim").value = data.order_dim;
        }
      })
    };
    function change_dimensao(){
      var id2 = $('#instrumento').val();
      $.ajax({
        url:"att_dimensoes.php",
        method: "POST",
        data:{id2:id2},
        success:function(result)
        {
          $('#dimensao').html(result);
        }
      })
    };
    function verify(){
      var instru = document.getElementById("instrumento").value;
      var dimensao = document.getElementById("dimensao").value;
      var descricao = document.getElementById("descricao").value;
      var n_dim = document.getElementById("n_dim").value;
      var order_dim = document.getElementById("order_dim").value;
      if(instru != "Instrumento de Avaliação" && dimensao != "" && descricao != "" && n_dim != "" && order_dim != ""){
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
