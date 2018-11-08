<?php
	include_once("../conexao.php");

	$id_item = $_POST['order_item'];
	$new_descricao = $_POST['descricao'];

	mysqli_query($conn,"SET NAMES utf8");

	$query = "UPDATE itens_dim_instru SET descricao = '$new_descricao' WHERE id = $id_item";

	$result = mysqli_query($conn,$query);

	if ($result) {
		echo "<script>
alert('Dados atualizados');
window.location.href='items.php';
</script>";
	}else{
		echo "<script>
alert('Dados não atualizados!');
window.location.href='items.php';
</script>";
	}

	mysqli_close($conn);



?>