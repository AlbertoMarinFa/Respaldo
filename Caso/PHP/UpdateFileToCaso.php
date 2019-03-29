<?php
include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
$Descripcion = $_POST['Descripcion'];
$idEquipo = $_POST['idEquipo'];
$idCaso = $_POST['idCaso'];
$Comentario = $_POST['Comentario'];

$query1 = $DBcon->query("INSERT into documentos
(Descripcion,
idEquipo,
idCaso,
FechaInsert,
Comentario)
VALUES
('$Descripcion',$idEquipo,$idCaso,now(),'$Comentario');") or die (mysqli_error());
echo 1;

$DBcon->close();
?>
