<?php
	include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
	//$Estado=$_GET['idEstado'];
	$Estado = $_POST['idEstado'];
	$resultadoSelect = $DBcon->query("SELECT municipios.idMunicipio,municipios.Municipio from estados_muni,estados,municipios
	where estados_muni.idEstado = estados.idEstado
	and estados_muni.idMunicipio = municipios.idMunicipio
	and estados_muni.idEstado = '$Estado';");

	$html= "<option value='0'>Seleccionar Municipio</option>";
	while ($rowM = $resultadoSelect->fetch_assoc()) {
		$html.= "<option value='".$rowM['idMunicipio']."'>".utf8_encode($rowM['Municipio'])."</option>";
	}
	echo $html;

	$DBcon->close();

?>
