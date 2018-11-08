<?php
	include_once("../conexao.php");

	$campus = $_POST['campus'];
	$unid_acad = $_POST['unid_acad'];

	mysqli_query($conn,"SET NAMES utf8");

	$query = "INSERT INTO unid_academica (id_campus,nome) VALUES ('$campus','$unid_acad')";

	$result = mysqli_query($conn,$query);

	if ($result) {
		echo "<script>
alert('Dados inseridos');
window.location.href='unid_acad.php';
</script>";
	}else{
		echo "<script>
alert('Dados não inseridos!');
window.location.href='unid_acad.php';
</script>";
	}

	mysqli_close($conn);




?>