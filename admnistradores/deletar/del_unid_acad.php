<?php
	include_once("../conexao.php");

	$unid_acad = $_POST['unid_acad'];

	mysqli_query($conn,"SET NAMES utf8");

	$query = "DELETE FROM unid_academica WHERE id = $unid_acad";

	$result = mysqli_query($conn,$query);

	if ($result) {
		echo "<script>
alert('Dados deletados');
window.location.href='unid_acad.php';
</script>";
	}else{
		echo "<script>
alert('Dados não deletados!');
window.location.href='unid_acad.php';
</script>";
	}

	mysqli_close($conn);




?>