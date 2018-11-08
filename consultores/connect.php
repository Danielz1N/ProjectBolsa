<?php

	include_once("conexao.php");
	$campus = $_GET["campus"]; 
	$unid_academica = $_GET["unid_academica"];
	$curso = $_GET["curso"];
	$data = $_GET["data"];
	$aux = "";


	if ($campus == "Campus" && $unid_academica == "Unidade Acadêmica" && $curso == "Curso" && $data == "Avaliação/Data") {
		$aux = 0;
	}
	elseif ($campus != "Campus" && $unid_academica == "Unidade Acadêmica" && $curso == "Curso" && $data == "Avaliação/Data")
	{
		$aux = 1;
	}
	elseif ($campus != "Campus" && $unid_academica != "Unidade Acadêmica" && $curso == "Curso" && $data == "Avaliação/Data") 
	{		
		$aux = 2;
	
	}
	elseif ($campus != "Campus" && $unid_academica != "Unidade Acadêmica" && $curso != "Curso" && $data == "Avaliação/Data")
	{
		$aux = 3;
	}

	elseif ($campus != "Campus" && $unid_academica != "Unidade Acadêmica" && $curso != "Curso" && $data != "Avaliação/Data")
	{
		$aux = 4;
	}

	echo $aux;
?>