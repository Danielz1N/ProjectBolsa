<?php

	include_once("../conexao.php");
 
	$dimensao = $_POST['n_dim']; //Esse ten que ser o ID
	$order_dim = $_POST['order_item'];
	$descricao = $_POST['descricao'];

	mysqli_query($conn,"SET NAMES utf8");

	$query = "INSERT INTO itens_dim_instru (id_dim_instru,descricao,ordem) VALUES ('$dimensao','$descricao','$order_dim')";

	$result = mysqli_query($conn,$query);

	if ($result) {
		echo "<script>
alert('Dados inseridos');
window.location.href='items.php';
</script>";
	}else{
		echo "<script>
alert('Dados não inseridos!');
window.location.href='items.php';
</script>";
	}

	mysqli_close($conn);
?>