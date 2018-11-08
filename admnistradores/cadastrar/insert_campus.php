<?php

	include_once("../conexao.php");

	$campus = $_POST['campus'];

	mysqli_query($conn,"SET NAMES utf8");

	$query = "INSERT INTO campus (nome) VALUES ('$campus')";

	$result = mysqli_query($conn,$query);

	if ($result) {
		echo "<script>
alert('Dados inseridos');
window.location.href='campus.php';
</script>";
	}else{
		echo "<script>
alert('Dados não inseridos!');
window.location.href='campus.php';
</script>";
	}

	mysqli_close($conn);
?>