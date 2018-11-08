<?php
	include_once("../conexao.php");

	$instru_aval = $_POST['instru_aval'];
	$new_instru_aval = $_POST['new_instru_aval'];

	mysqli_query($conn,"SET NAMES utf8");

	$query = "UPDATE instrumento SET descricao = '$new_instru_aval' WHERE id = $instru_aval";

	$result = mysqli_query($conn,$query);

	if ($result) {
		echo "<script>
alert('Dados atualizados');
window.location.href='instru_avaliacao.php';
</script>";
	}else{
		echo "<script>
alert('Dados não atualizados!');
window.location.href='instru_avaliacao.php';
</script>";
	}

	mysqli_close($conn);



?>