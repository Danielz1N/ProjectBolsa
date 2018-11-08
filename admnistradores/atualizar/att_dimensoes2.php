<?php
	include_once("../conexao.php");

	$id_instru = $_POST['instrumento'];
	$id_dim = $_POST['dimensao'];
	$new_desc_dim = $_POST['descricao'];
	$new_n_dim = $_POST['n_dim'];
	$new_order_dim = $_POST['order_dim'];

	mysqli_query($conn,"SET NAMES utf8");

	$query = "UPDATE dim_instrumento SET descricao = '$new_desc_dim' , numero = $new_n_dim , ordem = $new_order_dim WHERE id_instru = $id_instru AND id = $id_dim";

	$result = mysqli_query($conn,$query);

	if ($result) {
		echo "<script>
alert('Dados atualizados');
window.location.href='dimensoes.php';
</script>";
	}else{
		echo "<script>
alert('Dados não atualizados!');
window.location.href='dimensoes.php';
</script>";
	}

	mysqli_close($conn);




?>