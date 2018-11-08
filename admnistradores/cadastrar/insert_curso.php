<?php

	include_once("../conexao.php");

	$unid_acad = $_POST['unid_acad'];
	$curso = $_POST['curso'];

	mysqli_query($conn,"SET NAMES utf8");

	$query = "INSERT INTO curso (id_unid_acad,nome) VALUES ('$unid_acad','$curso')";

	$result = mysqli_query($conn,$query);

	if ($result) {
		echo "<script>
alert('Dados inseridos');
window.location.href='curso.php';
</script>";
	}else{
		echo "<script>
alert('Dados não inseridos!');
window.location.href='curso.php';
</script>";
	}

	mysqli_close($conn);
?>