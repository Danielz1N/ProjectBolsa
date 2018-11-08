<?php
	include_once("../conexao.php");

	$instru_aval = $_POST['instru_aval'];

	mysqli_query($conn,"SET NAMES utf8");

	$query = "DELETE FROM instrumento WHERE id = $instru_aval";

	$result = mysqli_query($conn,$query);

	if ($result) {
		echo "<script>
alert('Dados deletados');
window.location.href='instru_avaliacao.php';
</script>";
	}else{
		echo "<script>
alert('Dados não deletados!');
window.location.href='instru_avaliacao.php';
</script>";
	}

	mysqli_close($conn);



?>