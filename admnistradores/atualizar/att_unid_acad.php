<?php
	include_once("../conexao.php");

	$unid_acad = $_POST['unid_acad'];
	$new_unid = $_POST['new_unid_acad'];

	mysqli_query($conn,"SET NAMES utf8");

	$query = "UPDATE unid_academica SET nome = '$new_unid' WHERE id = $unid_acad";

	$result = mysqli_query($conn,$query);

	if ($result) {
		echo "<script>
alert('Dados atualizados');
window.location.href='unid_acad.php';
</script>";
	}else{
		echo "<script>
alert('Dados não atualizados!');
window.location.href='unid_acad.php';
</script>";
	}

	mysqli_close($conn);




?>