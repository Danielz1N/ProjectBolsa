<?php

	include_once("../conexao.php");

	$descricao = $_POST['descricao'];

	mysqli_query($conn,"SET NAMES utf8");

	$query = "INSERT INTO instrumento (descricao) VALUES ('$descricao')";

	$result = mysqli_query($conn,$query);

	if ($result) {
		echo "<script>
alert('Dados inseridos');
window.location.href='instru_avaliacao.php';
</script>";
	}else{
		echo "<script>
alert('Dados não inseridos!');
window.location.href='instru_avaliacao.php';
</script>";
	}

	mysqli_close($conn);
?>