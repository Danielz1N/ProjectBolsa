<?php
	include_once("../conexao.php");

	$campus = $_POST['campus'];
	$new_campus = $_POST['new_campus'];

	mysqli_query($conn,"SET NAMES utf8");

	$query = "UPDATE campus SET nome = '$new_campus' WHERE id = $campus";

	$result = mysqli_query($conn,$query);

	if ($result) {
		echo "<script>
alert('Dados atualizados');
window.location.href='campus.php';
</script>";
	}else{
		echo "<script>
alert('Dados não atualizados!');
window.location.href='campus.php';
</script>";
	}

	mysqli_close($conn);



?>