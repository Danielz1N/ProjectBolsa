<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="assets/css/login.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <h1>Acesso ao sistema</h1>
    </div>

    <!-- Login Form -->
    <form method="POST" action="valida.php">
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="usuário">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="senha">
      <input type="submit" class="fadeIn fourth" value="Login">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="index.html">Voltar à Pagina Inicial</a>
    </div>

  </div>
</div>