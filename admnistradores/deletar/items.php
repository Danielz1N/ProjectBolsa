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
        <h3>Deletar Item</h3>
        <form id='form1'method="POST" action="del_items.php" class="form-horizontal">
          
          <select autofocus onchange="change_instru()" style="margin-top:8%;margin-bottom:2.5%;width: 600px;margin-left: 270px" class="form-control" name="instru_aval" id="instru_aval">
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

          <select onchange="change_dim()" style="float:left;margin-bottom:2.5%;width: 260px;margin-left: 270px;margin-right: 80px"class="form-control" name="n_dim" id="n_dim">
            <option hidden >Dimensão</option>
          </select>

          <select onchange="change_order()"style="margin-left:270px;width: 260px" class="form-control" name="order_item" id="order_item">
            <option hidden >Ordem do Item</option>
          </select>

          <input readonly style= "margin-bottom:2.5%;margin-left:270px;width: 600px" type="text" class="form-control" name = "descricao" id="descricao" placeholder="Descricão do Item">

          <button id= center-button-clear type="reset" style="margin-top: 50px;margin-right: 30px" class="btn btn-reset">Limpar</button>
          <input type="button" style="margin-top: 50px"onclick="verify()" id="center-button-submit" name="insert" class="btn btn-success" value="Deletar">
        </form>
      </div>
		</div><!-- container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript">
   function change_instru(){
      var id_instrumento = $('#instru_aval').val();
      $.ajax({
        url:"ajax.php",
        method: "POST",
        data:{id_instrumento:id_instrumento},
        success:function(result)
        {
          $('#n_dim').html(result);
        }
      })
    };
    function change_dim(){
      var id_dim = $('#n_dim').val();
      $.ajax({
        url:"ajax.php",
        method: "POST",
        data:{id_dim:id_dim},
        success:function(result)
        {
          $('#order_item').html(result);
        }
      })
    };
    function change_order(){
      var id_item = $('#order_item').val();
      $.ajax({
        url:"ajax.php",
        method: "POST",
        data:{id_item:id_item},
        dataType: "JSON",
        success:function(data)
        {
          document.getElementById("descricao").value = data.nome;
        }
      })
    }; 
    function verify(){
      var instru = document.getElementById("instru_aval").value;
      var n_dim = document.getElementById("n_dim").value;
      var order_item = document.getElementById("order_item").value;
      if(instru != "Instrumento de Avaliação" && n_dim != "Dimensão" && order_item != "Ordem do Item"){
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
  <script type="text/javascript" src="../../js/cadastro.js"></script>
  </body>
</html>
