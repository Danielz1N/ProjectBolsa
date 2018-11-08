<?php
	include_once("../conexao.php");

	$id_instru = $_POST['instrumento'];
	$id_dim = $_POST['dimensao'];

	mysqli_query($conn,"SET NAMES utf8");

	$query = "DELETE FROM dim_instrumento WHERE id = $id_dim AND id_instru = $id_instru";

	$result = mysqli_query($conn,$query);

	if ($result) {
		echo "<script>
alert('Dados deletados');
window.location.href='dimensoes.php';
</script>";
	}else{
		echo "<script>
alert('Dados não deletados!');
window.location.href='dimensoes.php';
</script>";
	}

	mysqli_close($conn);




?>