<?php
	include_once("../conexao.php");
	
	if(isset($_POST["id"]))
	{
		$id = $_POST["id"];
		$query = "SELECT * FROM dim_instrumento WHERE id_instru = $id";
		$result = mysqli_query($conn,$query);
		while($row = mysqli_fetch_array($result))
		{
			$data["descricao"] = $row["descricao"];
			$data["n_dim"] = $row["numero"];
			$data["order_dim"] = $row["ordem"];
		}
		echo json_encode($data);
	}

	if(isset($_POST["id2"]))
	{
		$id = $_POST["id2"];
		$res=mysqli_query($conn,"SELECT * FROM dim_instrumento WHERE id_instru = $id");
        echo "<select id='dimensao' onchange='change_all()'>";
        echo "<option>"; echo "Descrição da Dimensão" ; echo "</option>";
        while ($row = mysqli_fetch_array($res)) {
            echo "<option value = '$row[id]'>"; echo utf8_encode($row["descricao"]) ; echo "</option>";
        }
        echo "</select>";
	}

?>