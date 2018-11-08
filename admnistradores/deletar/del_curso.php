<?php
	include_once("../conexao.php");

	$id_curso = $_POST['curso'];

	mysqli_query($conn,"SET NAMES utf8");

	$query = "DELETE FROM curso WHERE id = $id_curso";

	$result = mysqli_query($conn,$query);

	if ($result) {
		echo "<script>
alert('Dados deletados');
window.location.href='curso.php';
</script>";
	}else{
		echo "<script>
alert('Dados não deletados!');
window.location.href='curso.php';
</script>";
	}

	mysqli_close($conn);

?>