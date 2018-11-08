<?php
	require_once '../dompdf/autoload.inc.php';
	use Dompdf\Dompdf;

	$fileContent = file_get_contents( "consulta-pdf.php" ) ;

	$dompdf = new Dompdf();
	$dompdf -> loadHtml($fileContent);
	$dompdf -> setPaper('A4','landscape');
	$dompdf -> render();

	$dompdf -> stream();

?>