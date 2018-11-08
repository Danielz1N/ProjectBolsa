<?php
	include_once("conexao.php");
	if (isset($_POST['instru_aval'],$_POST['campus'],$_POST['unid_acad'],$_POST['curso'])) 
	{
		$query = mysqli_query($conn,"SELECT MAX(ordem) FROM dim_instrumento WHERE id_instru = ".$_POST['instru_aval']." limit 1");
		$array = mysqli_fetch_array($query);
		$ordem = $array[0];
		
		$result = mysqli_query($conn,"SELECT aval.id,aval.data,cps.nome as campus,uni.nome as unid_acad,crs.nome as curso FROM avaliacao aval INNER JOIN campus cps ON (aval.id_campus = cps.id) INNER JOIN unid_academica uni ON (aval.id_unid_acad = uni.id) INNER JOIN curso crs ON (aval.id_curso = crs.id) WHERE aval.id_instru = ".$_POST["instru_aval"]." AND aval.id_campus = ".$_POST["campus"]." AND aval.id_unid_acad = ".$_POST["unid_acad"]." AND aval.id_curso = ".$_POST["curso"]." ");

		echo "<table style='transform: scale(0.9);' class='table table-fixed table-bordered'>
					<thead style='color: #fff;background-color: #373a3c;'>
						<tr>
							<th style='text-align:center;vertical-align: middle;' rowspan='2'>ID</th>
							<th style='text-align:center;vertical-align: middle;' rowspan='2'>Data</th>
							<th style='text-align:center;vertical-align: middle;' rowspan='2'>Campus</th>
							<th style='text-align:center;vertical-align: middle;' rowspan='2'>Unidade Acadêmica</th>
							<th style='text-align:center;vertical-align: middle;' rowspan='2'>Curso</th>
							<th style='text-align:center' colspan=";echo $ordem+1;echo ">Dimensões</th>
						</tr>
						<tr>
						<td>*</td>";
						for($i = 1; $i <= $ordem; $i++){
							echo "<td>".$i."</td>";
						}
						echo "</tr></thead><tbody>";
		while ($row = mysqli_fetch_array($result)) 
		{	
			$result2 = mysqli_query($conn,"SELECT nts.id,nts.id_aval,nts.id_dim,nts.nota_dim,nts.nota_items,dim.numero FROM notas nts INNER JOIN dim_instrumento dim ON (nts.id_dim = dim.id) WHERE id_aval = ".$row["id"]." ORDER BY dim.numero ");
			$n_dim = mysqli_num_rows($result2);
			echo "<tr>
				<td style='vertical-align: middle' rowspan=".$n_dim.">".$row["id"]."</td>
				<td style='vertical-align: middle' rowspan=".$n_dim.">".$row["data"]."</td>
				<td style='vertical-align: middle' rowspan=".$n_dim.">".$row["campus"]."</td>
				<td style='vertical-align: middle' rowspan=".$n_dim.">".$row["unid_acad"]."</td>
				<td style='vertical-align: middle' rowspan=".$n_dim.">".$row["curso"]."</td>";
				while($row2 = mysqli_fetch_array($result2))
				{
					echo "<td>D.".$row2["numero"]."</td>";
					$array_notas = explode(",",$row2["nota_items"]);
					for ($i=0; $i < $ordem ; $i++) {
						if(empty($array_notas[$i])){ 
							echo "<td name='tdresponsive' value='NA'></td>";
						}else{
							echo "<td name='tdresponsive'value=";echo $array_notas[$i];echo " ></td>";
						}
					}
					echo "</tr>";
				}
		}
		echo "</tbody>
	     </table>";
	    echo "<button type='submit' id='center-button-submit' name='insert' class='btn btn-info'>Gerar PDF</button>";
	}
?>