<?php
	include_once("../conexao.php");
	
	
	if(isset($_GET["id2"]))
	{
		$id = $_GET["id2"];
		$res=mysqli_query($conn,"SELECT * FROM dim_instrumento WHERE id_instru = $id");
        echo "<select id='dimensao' onchange='change_all()'>";
        echo "<option>"; echo "Descrição da Dimensão" ; echo "</option>";
        while ($row = mysqli_fetch_array($res)) {
            echo "<option value = '$row[id]'>"; echo utf8_encode($row["descricao"]) ; echo "</option>";
        }
        echo "</select>";
	}

?>