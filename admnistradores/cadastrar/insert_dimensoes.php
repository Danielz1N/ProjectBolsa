<?php
	include_once("../conexao.php");

	$instrumento = $_POST['instrumento'];
	$descricao = $_POST['descricao'];
	$n_dim = $_POST['n_dim'];
	$order_dim = $_POST['order_dim'];

	mysqli_query($conn,"SET NAMES utf8");

	$query = "INSERT INTO dim_instrumento (id_instru,numero,descricao,ordem) VALUES ('$instrumento','$n_dim','$descricao','$order_dim')";

	$result = mysqli_query($conn,$query);

	if ($result) {
		echo "<script>
alert('Dados inseridos');
window.location.href='dimensoes.php';
</script>";
	}else{
		echo "<script>
alert('Dados não inseridos!');
window.location.href='dimensoes.php';
</script>";
	}

	mysqli_close($conn);





?>