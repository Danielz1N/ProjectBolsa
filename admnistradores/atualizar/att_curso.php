<?php
	include_once("../conexao.php");

	$campus = $_POST['campus'];
	$unid_acad = $_POST['unid_acad'];
	$curso = $_POST['curso'];
	$new_curso = $_POST['new_curso'];

	mysqli_query($conn,"SET NAMES utf8");

	$query = "UPDATE curso SET nome = '$new_curso' WHERE id = $curso";

	$result = mysqli_query($conn,$query);

	if ($result) {
		echo "<script>
alert('Dados atualizados');
window.location.href='curso.php';
</script>";
	}else{
		echo "<script>
alert('Dados não atualizados!');
window.location.href='curso.php';
</script>";
	}

	mysqli_close($conn);



?>