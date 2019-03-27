<?php
include $_SERVER['DOCUMENT_ROOT'].'/RSP/PHP/Connection/dbconnect.php';
$DescripcionParte = $_POST['DescripcionParte'];
$resultadoSelect = $DBcon->query("SELECT * FROM catpartes where DescripcionParte = '$DescripcionParte';");
if(mysqli_num_rows($resultadoSelect)==0)
{
  $query1 = $DBcon->query("INSERT into catpartes (DescripcionParte) values('$DescripcionParte');") or die (mysqli_error());
  echo 1;
}
else{
  echo 0;
}

$DBcon->close();
?>
