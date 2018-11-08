<?php	


	include_once("conexao.php");
	
	$campus = $_POST["campus"]; 
	$unid_academica = $_POST["unid_academica"];
	$curso = $_POST["curso"];
	$data = $_POST["data"];
	$aux = $_POST["aux"];


	$html = '
			<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
			<style type="text/css">
				@page { margin: 0px 0px 50px 0px; }
				.tg  {page-break-after: always;transform: scale(0.92);border-collapse:collapse;border-spacing:0;}
				.tg td{width: 24px; font-family:"Oswald", sans-serif;font-size:14px;padding:4px 0px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
				.tg th{font-family:"Oswald", sans-serif;font-size:14px;font-weight:normal;padding:4px 26px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
				.tg .tg-s6z2{text-align:center}
				.tg .1{background-color:#FF0000;border-color:inherit;text-align:center;vertical-align:top}
				.tg .2{background-color:#FF6347;border-color:inherit;text-align:center;vertical-align:top}
				.tg .3{background-color:#FFA500;border-color:inherit;text-align:center;vertical-align:top}
				.tg .4{background-color:#7FFF00;border-color:inherit;text-align:center;vertical-align:top}
				.tg .5{background-color:#00FF00;border-color:inherit;text-align:center;vertical-align:top}
				.tg .tg-baqh{text-align:center;vertical-align:middle;margin: 0 auto}';
	$html .=	'</style>';
	$html .= '<br><h1 style="text-align: center;">Consulta Avaliação Externa</h1>';
	$html .= '<table class="tg">';
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th rowspan="2" class="tg-baqh">ID</th>';
	$html .= '<th rowspan="2" class="tg-baqh">Data</th>';
	$html .= '<th rowspan="2" class="tg-baqh">Campus</th>';
	$html .= '<th rowspan="2" class="tg-baqh">Unid. Acadêmica</th>';
	$html .= '<th rowspan="2" class="tg-baqh">Curso</th>';
	$html .= '<th class="tg-baqh" colspan="28">Dimensões</th>';
	$html .= '</tr>';	
	$html .= '<tr>
			    <td class="tg-s6z2">*</td>
			    <td class="tg-s6z2">1</td>
			    <td class="tg-s6z2">2</td>
			    <td class="tg-s6z2">3</td>
			    <td class="tg-s6z2">4</td>
			    <td class="tg-s6z2">5</td>
			    <td class="tg-s6z2">6</td>
			    <td class="tg-s6z2">7</td>
			    <td class="tg-s6z2">8</td>
			    <td class="tg-s6z2">9</td>
			    <td class="tg-s6z2">10</td>
			    <td class="tg-s6z2">11</td>
			    <td class="tg-s6z2">12</td>
			    <td class="tg-s6z2">13</td>
			    <td class="tg-s6z2">14</td>
			    <td class="tg-s6z2">15</td>
			    <td class="tg-s6z2">16</td>
			    <td class="tg-s6z2">17</td>
			    <td class="tg-s6z2">18</td>
			    <td class="tg-s6z2">19</td>
			    <td class="tg-s6z2">20</td>
			    <td class="tg-s6z2">21</td>
			    <td class="tg-s6z2">22</td>
			    <td class="tg-s6z2">23</td>
			    <td class="tg-s6z2">24</td>
			    <td class="tg-s6z2">25</td>
			    <td class="tg-s6z2">26</td>
			    <td class="tg-s6z2">27</td>
			  </tr>';
	$html .= '</thead>';
	$html .= '<tbody>';

	if($aux == 0){
		//$result_id_aval = "SELECT * FROM instru_avaliacao";
		$result_id_aval = "SELECT
							  ins.id as id,
							  ins.data_criacao as data_criacao,
							  cps.nome as campus,
							  uni.nome as unid_acad,
							  crs.nome as curso,
							  ins.`D1.1`,ins.`D1.2`,ins.`D1.3`,ins.`D1.4`,ins.`D1.5`,ins.`D1.6`,ins.`D1.7`,ins.`D1.8`,ins.`D1.9`,ins.`D1.10`,ins.`D1.11`,ins.`D1.12`,ins.`D1.13`,ins.`D1.14`,ins.`D1.15`,ins.`D1.16`,ins.`D1.17`,ins.`D1.18`,ins.`D1.19`,ins.`D1.20`,ins.`D1.21`,ins.`D1.22`,ins.`D1.23`,ins.`D1.24`,ins.`D1.25`,ins.`D1.26`,ins.`D1.27`,
							  ins.`D2.1`,ins.`D2.2`,ins.`D2.3`,ins.`D2.4`,ins.`D2.5`,ins.`D2.6`,ins.`D2.7`,ins.`D2.8`,ins.`D2.9`,ins.`D2.10`,ins.`D2.11`,ins.`D2.12`,ins.`D2.13`,ins.`D2.14`,ins.`D2.15`,ins.`D2.16`,ins.`D2.17`,ins.`D2.18`,ins.`D2.19`,ins.`D2.20`,
							  ins.`D3.1`,ins.`D3.2`,ins.`D3.3`,ins.`D3.4`,ins.`D3.5`,ins.`D3.6`,ins.`D3.7`,ins.`D3.8`,ins.`D3.9`,ins.`D3.10`,ins.`D3.11`,ins.`D3.12`,ins.`D3.13`,ins.`D3.14`,ins.`D3.15`,ins.`D3.16`,ins.`D3.17`,ins.`D3.18`,ins.`D3.19`,ins.`D3.20`,ins.`D3.21`,ins.`D3.22`
							FROM
							  instru_avaliacao ins
							    INNER JOIN campus cps ON (ins.id_campus = cps.id)
							    INNER JOIN unid_acad uni ON (ins.id_unid_acad = uni.id)
							    INNER JOIN curso crs ON (ins.id_curso = crs.id)
							ORDER BY
							  ins.id";
	}
	elseif ($aux == 1) {
		//$result_id_aval = "SELECT * FROM instru_avaliacao WHERE id_campus = $campus";
		$result_id_aval = 	"SELECT
							  ins.id as id,
							  ins.data_criacao as data_criacao,
							  cps.nome as campus,
							  uni.nome as unid_acad,
							  crs.nome as curso,
							  ins.`D1.1`,ins.`D1.2`,ins.`D1.3`,ins.`D1.4`,ins.`D1.5`,ins.`D1.6`,ins.`D1.7`,ins.`D1.8`,ins.`D1.9`,ins.`D1.10`,ins.`D1.11`,ins.`D1.12`,ins.`D1.13`,ins.`D1.14`,ins.`D1.15`,ins.`D1.16`,ins.`D1.17`,ins.`D1.18`,ins.`D1.19`,ins.`D1.20`,ins.`D1.21`,ins.`D1.22`,ins.`D1.23`,ins.`D1.24`,ins.`D1.25`,ins.`D1.26`,ins.`D1.27`,
							  ins.`D2.1`,ins.`D2.2`,ins.`D2.3`,ins.`D2.4`,ins.`D2.5`,ins.`D2.6`,ins.`D2.7`,ins.`D2.8`,ins.`D2.9`,ins.`D2.10`,ins.`D2.11`,ins.`D2.12`,ins.`D2.13`,ins.`D2.14`,ins.`D2.15`,ins.`D2.16`,ins.`D2.17`,ins.`D2.18`,ins.`D2.19`,ins.`D2.20`,
							  ins.`D3.1`,ins.`D3.2`,ins.`D3.3`,ins.`D3.4`,ins.`D3.5`,ins.`D3.6`,ins.`D3.7`,ins.`D3.8`,ins.`D3.9`,ins.`D3.10`,ins.`D3.11`,ins.`D3.12`,ins.`D3.13`,ins.`D3.14`,ins.`D3.15`,ins.`D3.16`,ins.`D3.17`,ins.`D3.18`,ins.`D3.19`,ins.`D3.20`,ins.`D3.21`,ins.`D3.22`
							FROM
							  instru_avaliacao ins
							    INNER JOIN campus cps ON (ins.id_campus = cps.id)
							    INNER JOIN unid_acad uni ON (ins.id_unid_acad = uni.id)
							    INNER JOIN curso crs ON (ins.id_curso = crs.id)
							    WHERE ins.id_campus = $campus
							ORDER BY
							  ins.id";

	}
	elseif ($aux == 2) {
		//$result_id_aval = "SELECT * FROM instru_avaliacao WHERE id_campus = $campus AND id_unid_acad = $unid_academica";
		$result_id_aval = 	"SELECT
							  ins.id as id,
							  ins.data_criacao as data_criacao,
							  cps.nome as campus,
							  uni.nome as unid_acad,
							  crs.nome as curso,
							  ins.`D1.1`,ins.`D1.2`,ins.`D1.3`,ins.`D1.4`,ins.`D1.5`,ins.`D1.6`,ins.`D1.7`,ins.`D1.8`,ins.`D1.9`,ins.`D1.10`,ins.`D1.11`,ins.`D1.12`,ins.`D1.13`,ins.`D1.14`,ins.`D1.15`,ins.`D1.16`,ins.`D1.17`,ins.`D1.18`,ins.`D1.19`,ins.`D1.20`,ins.`D1.21`,ins.`D1.22`,ins.`D1.23`,ins.`D1.24`,ins.`D1.25`,ins.`D1.26`,ins.`D1.27`,
							  ins.`D2.1`,ins.`D2.2`,ins.`D2.3`,ins.`D2.4`,ins.`D2.5`,ins.`D2.6`,ins.`D2.7`,ins.`D2.8`,ins.`D2.9`,ins.`D2.10`,ins.`D2.11`,ins.`D2.12`,ins.`D2.13`,ins.`D2.14`,ins.`D2.15`,ins.`D2.16`,ins.`D2.17`,ins.`D2.18`,ins.`D2.19`,ins.`D2.20`,
							  ins.`D3.1`,ins.`D3.2`,ins.`D3.3`,ins.`D3.4`,ins.`D3.5`,ins.`D3.6`,ins.`D3.7`,ins.`D3.8`,ins.`D3.9`,ins.`D3.10`,ins.`D3.11`,ins.`D3.12`,ins.`D3.13`,ins.`D3.14`,ins.`D3.15`,ins.`D3.16`,ins.`D3.17`,ins.`D3.18`,ins.`D3.19`,ins.`D3.20`,ins.`D3.21`,ins.`D3.22`
							FROM
							  instru_avaliacao ins
							    INNER JOIN campus cps ON (ins.id_campus = cps.id)
							    INNER JOIN unid_acad uni ON (ins.id_unid_acad = uni.id)
							    INNER JOIN curso crs ON (ins.id_curso = crs.id)
							    WHERE ins.id_campus = $campus
							    AND ins.id_unid_acad = $unid_academica
							ORDER BY
							  ins.id";

	}
	elseif ($aux == 3) {
		//$result_id_aval = "SELECT * FROM instru_avaliacao WHERE id_campus = $campus AND id_unid_acad = $unid_academica AND id_curso = $curso";
		$result_id_aval = 	"SELECT
							  ins.id as id,
							  ins.data_criacao as data_criacao,
							  cps.nome as campus,
							  uni.nome as unid_acad,
							  crs.nome as curso,
							  ins.`D1.1`,ins.`D1.2`,ins.`D1.3`,ins.`D1.4`,ins.`D1.5`,ins.`D1.6`,ins.`D1.7`,ins.`D1.8`,ins.`D1.9`,ins.`D1.10`,ins.`D1.11`,ins.`D1.12`,ins.`D1.13`,ins.`D1.14`,ins.`D1.15`,ins.`D1.16`,ins.`D1.17`,ins.`D1.18`,ins.`D1.19`,ins.`D1.20`,ins.`D1.21`,ins.`D1.22`,ins.`D1.23`,ins.`D1.24`,ins.`D1.25`,ins.`D1.26`,ins.`D1.27`,
							  ins.`D2.1`,ins.`D2.2`,ins.`D2.3`,ins.`D2.4`,ins.`D2.5`,ins.`D2.6`,ins.`D2.7`,ins.`D2.8`,ins.`D2.9`,ins.`D2.10`,ins.`D2.11`,ins.`D2.12`,ins.`D2.13`,ins.`D2.14`,ins.`D2.15`,ins.`D2.16`,ins.`D2.17`,ins.`D2.18`,ins.`D2.19`,ins.`D2.20`,
							  ins.`D3.1`,ins.`D3.2`,ins.`D3.3`,ins.`D3.4`,ins.`D3.5`,ins.`D3.6`,ins.`D3.7`,ins.`D3.8`,ins.`D3.9`,ins.`D3.10`,ins.`D3.11`,ins.`D3.12`,ins.`D3.13`,ins.`D3.14`,ins.`D3.15`,ins.`D3.16`,ins.`D3.17`,ins.`D3.18`,ins.`D3.19`,ins.`D3.20`,ins.`D3.21`,ins.`D3.22`
							FROM
							  instru_avaliacao ins
							    INNER JOIN campus cps ON (ins.id_campus = cps.id)
							    INNER JOIN unid_acad uni ON (ins.id_unid_acad = uni.id)
							    INNER JOIN curso crs ON (ins.id_curso = crs.id)
							    WHERE ins.id_campus = $campus
							    AND ins.id_unid_acad = $unid_academica
							    AND ins.id_curso = $curso
							ORDER BY
							  ins.id";


	}
	elseif ($aux == 4) {
		//$result_id_aval = "SELECT * FROM instru_avaliacao WHERE id_campus = $campus AND id_unid_acad = $unid_academica AND id_curso = $curso AND data_criacao = '$data'";
		$result_id_aval = 	"SELECT
							  ins.id as id,
							  ins.data_criacao as data_criacao,
							  cps.nome as campus,
							  uni.nome as unid_acad,
							  crs.nome as curso,
							  ins.`D1.1`,ins.`D1.2`,ins.`D1.3`,ins.`D1.4`,ins.`D1.5`,ins.`D1.6`,ins.`D1.7`,ins.`D1.8`,ins.`D1.9`,ins.`D1.10`,ins.`D1.11`,ins.`D1.12`,ins.`D1.13`,ins.`D1.14`,ins.`D1.15`,ins.`D1.16`,ins.`D1.17`,ins.`D1.18`,ins.`D1.19`,ins.`D1.20`,ins.`D1.21`,ins.`D1.22`,ins.`D1.23`,ins.`D1.24`,ins.`D1.25`,ins.`D1.26`,ins.`D1.27`,
							  ins.`D2.1`,ins.`D2.2`,ins.`D2.3`,ins.`D2.4`,ins.`D2.5`,ins.`D2.6`,ins.`D2.7`,ins.`D2.8`,ins.`D2.9`,ins.`D2.10`,ins.`D2.11`,ins.`D2.12`,ins.`D2.13`,ins.`D2.14`,ins.`D2.15`,ins.`D2.16`,ins.`D2.17`,ins.`D2.18`,ins.`D2.19`,ins.`D2.20`,
							  ins.`D3.1`,ins.`D3.2`,ins.`D3.3`,ins.`D3.4`,ins.`D3.5`,ins.`D3.6`,ins.`D3.7`,ins.`D3.8`,ins.`D3.9`,ins.`D3.10`,ins.`D3.11`,ins.`D3.12`,ins.`D3.13`,ins.`D3.14`,ins.`D3.15`,ins.`D3.16`,ins.`D3.17`,ins.`D3.18`,ins.`D3.19`,ins.`D3.20`,ins.`D3.21`,ins.`D3.22`
							FROM
							  instru_avaliacao ins
							    INNER JOIN campus cps ON (ins.id_campus = cps.id)
							    INNER JOIN unid_acad uni ON (ins.id_unid_acad = uni.id)
							    INNER JOIN curso crs ON (ins.id_curso = crs.id)
							    WHERE ins.id_campus = $campus
							    AND ins.id_unid_acad = $unid_academica
							    AND ins.id_curso = $curso
							    AND ins.data_criacao = '$data'
							ORDER BY
							  ins.id";

	}

	$resultado_id_aval = mysqli_query($conn, $result_id_aval);
	while ($row_aval = mysqli_fetch_assoc($resultado_id_aval)) {
		$html .= '<tr><td class = "tg-s6z2" rowspan="3">'.$row_aval['id']."</td>";
		$html .= '<td class="tg-s6z2" rowspan="3">'.$row_aval['data_criacao']."</td>";
		$html .= '<td class="tg-s6z2" rowspan="3">'.utf8_encode($row_aval['campus'])."</td>";
		$html .= '<td class="tg-s6z2" rowspan="3">'.utf8_encode($row_aval['unid_acad'])."</td>";
		$html .= '<td class="tg-s6z2" rowspan="3">'.utf8_encode($row_aval['curso'])."</td>";
		$html .= '<td class="tg-s6z2">D1</td>';
		$html .= '<td class='.$row_aval['D1.1'].'></td>';
		$html .= '<td class='.$row_aval['D1.2'].'></td>';
		$html .= '<td class='.$row_aval['D1.3'].'></td>';
		$html .= '<td class='.$row_aval['D1.4'].'></td>';
		$html .= '<td class='.$row_aval['D1.5'].'></td>';
		$html .= '<td class='.$row_aval['D1.6'].'></td>';
		$html .= '<td class='.$row_aval['D1.7'].'></td>';
		$html .= '<td class='.$row_aval['D1.8'].'></td>';
		$html .= '<td class='.$row_aval['D1.9'].'></td>';
		$html .= '<td class='.$row_aval['D1.10'].'></td>';
		$html .= '<td class='.$row_aval['D1.11'].'></td>';
		$html .= '<td class='.$row_aval['D1.12'].'></td>';
		$html .= '<td class='.$row_aval['D1.13'].'></td>';
		$html .= '<td class='.$row_aval['D1.14'].'></td>';
		$html .= '<td class='.$row_aval['D1.15'].'></td>';
		$html .= '<td class='.$row_aval['D1.16'].'></td>';
		$html .= '<td class='.$row_aval['D1.17'].'></td>';
		$html .= '<td class='.$row_aval['D1.18'].'></td>';
		$html .= '<td class='.$row_aval['D1.19'].'></td>';
		$html .= '<td class='.$row_aval['D1.20'].'></td>';
		$html .= '<td class='.$row_aval['D1.21'].'></td>';
		$html .= '<td class='.$row_aval['D1.22'].'></td>';
		$html .= '<td class='.$row_aval['D1.23'].'></td>';
		$html .= '<td class='.$row_aval['D1.24'].'></td>';
		$html .= '<td class='.$row_aval['D1.25'].'></td>';
		$html .= '<td class='.$row_aval['D1.26'].'></td>';
		$html .= '<td class='.$row_aval['D1.27'].'></td></tr>';
		$html .= '<tr>';
		$html .= '<td class="tg-baqh">D2</td>';//20
		$html .= '<td class='.$row_aval['D2.1'].'></td>';
		$html .= '<td class='.$row_aval['D2.2'].'></td>';
		$html .= '<td class='.$row_aval['D2.3'].'></td>';
		$html .= '<td class='.$row_aval['D2.4'].'></td>';
		$html .= '<td class='.$row_aval['D2.5'].'></td>';
		$html .= '<td class='.$row_aval['D2.6'].'></td>';
		$html .= '<td class='.$row_aval['D2.7'].'></td>';
		$html .= '<td class='.$row_aval['D2.8'].'></td>';
		$html .= '<td class='.$row_aval['D2.9'].'></td>';
		$html .= '<td class='.$row_aval['D2.10'].'></td>';
		$html .= '<td class='.$row_aval['D2.11'].'></td>';
		$html .= '<td class='.$row_aval['D2.12'].'></td>';
		$html .= '<td class='.$row_aval['D2.13'].'></td>';
		$html .= '<td class='.$row_aval['D2.14'].'></td>';
		$html .= '<td class='.$row_aval['D2.15'].'></td>';
		$html .= '<td class='.$row_aval['D2.16'].'></td>';
		$html .= '<td class='.$row_aval['D2.17'].'></td>';
		$html .= '<td class='.$row_aval['D2.18'].'></td>';
		$html .= '<td class='.$row_aval['D2.19'].'></td>';
		$html .= '<td class='.$row_aval['D2.20'].'></td>';
		$html .= '<td style="background-color:#C0C0C0" class="tg-baqh" colspan="7"></td></tr>';
		$html .= '<tr>';
		$html .= '<td class="tg-baqh">D3</td>';//22
		$html .= '<td class='.$row_aval['D3.1'].'></td>';
		$html .= '<td class='.$row_aval['D3.2'].'></td>';
		$html .= '<td class='.$row_aval['D3.3'].'></td>';
		$html .= '<td class='.$row_aval['D3.4'].'></td>';
		$html .= '<td class='.$row_aval['D3.5'].'></td>';
		$html .= '<td class='.$row_aval['D3.6'].'></td>';
		$html .= '<td class='.$row_aval['D3.7'].'></td>';
		$html .= '<td class='.$row_aval['D3.8'].'></td>';
		$html .= '<td class='.$row_aval['D3.9'].'></td>';
		$html .= '<td class='.$row_aval['D3.10'].'></td>';
		$html .= '<td class='.$row_aval['D3.11'].'></td>';
		$html .= '<td class='.$row_aval['D3.12'].'></td>';
		$html .= '<td class='.$row_aval['D3.13'].'></td>';
		$html .= '<td class='.$row_aval['D3.14'].'></td>';
		$html .= '<td class='.$row_aval['D3.15'].'></td>';
		$html .= '<td class='.$row_aval['D3.16'].'></td>';
		$html .= '<td class='.$row_aval['D3.17'].'></td>';
		$html .= '<td class='.$row_aval['D3.18'].'></td>';
		$html .= '<td class='.$row_aval['D3.19'].'></td>';
		$html .= '<td class='.$row_aval['D3.20'].'></td>';
		$html .= '<td class='.$row_aval['D3.21'].'></td>';
		$html .= '<td class='.$row_aval['D3.22'].'></td>';
		$html .= '<td style="background-color:#C0C0C0" class="tg-baqh" colspan = "5"></td></tr>';
	}
	
	$html .= '</tbody>';
	$html .= '</table>';


	

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

	// Carrega seu HTML
	$dompdf->load_html('
			'. $html .'
		');

	$dompdf->set_paper('A4','landscape');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"consulta", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>