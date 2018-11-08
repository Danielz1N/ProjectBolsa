<?php
	include_once("../conexao.php");
	if (isset($_POST["id"])) 
	{
		$id = $_POST["id"];
		$query1 = "SELECT * FROM dim_instrumento WHERE id_instru = $id ORDER BY numero";
		$result1 = mysqli_query($conn,$query1);
		while($row = mysqli_fetch_array($result1))
		{	
			$id2 = $row["id"];
			echo "<div id=".$id2.">";
			echo "<h3>Dimensão "; echo $row["numero"];echo "</h3>";
			$query2 = "SELECT * FROM itens_dim_instru WHERE id_dim_instru = $id2 ORDER BY ordem";
			$result2 = mysqli_query($conn,$query2);
			echo "<table class='table table-bordered'>";
			echo "<tr>";
				echo "<th style='text-align:center'><b>Item</b></th>";
				echo "<th style='text-align:center'><b>Descrição</b></th>";
				echo "<th style='text-align:center'><b>Nota</b></th>";
			echo "</tr>";
			$i = 1;
			while($row2 = mysqli_fetch_array($result2))
			{
				echo "<tr>";
					echo "<td style='text-align:center'width='10%'>";echo $row2["ordem"];echo "</td>";
					echo "<td width='76%'>";echo utf8_encode($row2["descricao"]);echo "</td>";
					echo "<td><input id='nota_item_dim_".$id2."[]' name='nota_item_dim_".$id2."[]' style='text-align:center;width:100%' type='text'></input></td>";
				echo "</tr>";
				$i = $i + 1;
			}
			echo "</table>";
			echo "<div style='margin-left: 74.5%;margin-right: 0%'class='row'>";
			echo "<table class='table table-bordered'>";
				echo "<td style='text-align:center' width='45%'><b>Nota Final</b></td>";
				echo "<td style='background-color:#e6e6e6'>
				<input id='nota_dim_".$id2."' name='nota_dim_".$id2."' style='text-align:center;width:100%' type='text'></td>";
			echo "</table>";
			echo "</div>";
			echo "</div>";
			echo "<br>";
		}
	}
?>