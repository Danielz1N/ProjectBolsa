<?php

	include_once("../conexao.php");

	$instru_aval = $_POST['instru_aval'];
	$descricao = $_POST['descricao'];
	$data = $_POST['data'];
	$campus = $_POST['campus']; 
	$unid_acad = $_POST['unid_acad'];
	$curso = $_POST['curso'];
	$nota_final = $_POST['nota_final'];


	mysqli_query($conn,"SET NAMES utf8");

	$query = "INSERT INTO avaliacao (id_instru, id_campus, id_unid_acad, id_curso, descricao, data, nota_final) VALUES ('$instru_aval','$campus','$unid_acad','$curso','$descricao','$data','$nota_final')";
	$result = mysqli_query($conn,$query);//inserimos o cabeçalho

	$id_aval = mysqli_insert_id($conn);//peguei o id da avaliação acima

	$result2 = mysqli_query($conn,"SELECT * FROM dim_instrumento WHERE id_instru = $instru_aval ORDER BY numero");

	while($row = mysqli_fetch_array($result2)) // RODA O LENGHT DE DIMENSOES!
	{	
		$id_dim = $row["id"];//id da dimensao atual
		$notas = implode(",",$_POST['nota_item_dim_'.$id_dim]);
		$notas_dim = $_POST['nota_dim_'.$id_dim];
		mysqli_query($conn,"INSERT INTO notas (id_aval,id_dim,nota_dim,nota_items) VALUES ('$id_aval','$id_dim','$notas_dim','$notas')");//insere td em notas 
	}

	if ($result && $result2) {
		echo "<script>
alert('Dados inseridos');
window.location.href='avaliacao.php';
</script>";
	}else{
		echo "<script>
alert('Dados não inseridos!');
window.location.href='avaliacao.php';
</script>";
	}

	mysqli_close($conn);
?>