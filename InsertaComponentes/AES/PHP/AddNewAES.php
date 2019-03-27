<?php
include $_SERVER['DOCUMENT_ROOT'].'/RSP/PHP/Connection/dbconnect.php';
$Nombre = $_POST['Nombre'];
$contacto = $_POST['contacto'];
$Numero = $_POST['Numero'];
$idCobertura = $_POST['idCobertura'];

$resultadoSelect = $DBcon->query("SELECT * FROM aes where Nombre = '$Nombre';");
if(mysqli_num_rows($resultadoSelect)==0)
{
  $query1 = $DBcon->query("INSERT into aes (Nombre,contacto,Numero,idCobertura) VALUES ('$Nombre','$contacto','$Numero',$idCobertura);") or die (mysqli_error());
  echo 1;
}
else{
  echo 0;
}

$DBcon->close();
?>
