<?php
	include_once("../conexao.php");

	$id_item = $_POST["order_item"];

	mysqli_query($conn,"SET NAMES utf8");

	$query = "DELETE FROM itens_dim_instru WHERE id = $id_item";

	$result = mysqli_query($conn,$query);

	if ($result) {
		echo "<script>
alert('Dados deletados');
window.location.href='items.php';
</script>";
	}else{
		echo "<script>
alert('Dados não deletados!');
window.location.href='items.php';
</script>";
	}

	mysqli_close($conn);




?>