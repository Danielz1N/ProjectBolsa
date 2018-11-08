<?php
	include_once("../conexao.php");

	$campus = $_POST['campus'];

	mysqli_query($conn,"SET NAMES utf8");

	$query = "DELETE FROM campus WHERE id = $campus";

	$result = mysqli_query($conn,$query);

	if ($result) {
		echo "<script>
alert('Dados deletados');
window.location.href='campus.php';
</script>";
	}else{
		echo "<script>
alert('Dados não deletados!');
window.location.href='campus.php';
</script>";
	}

	mysqli_close($conn);



?>