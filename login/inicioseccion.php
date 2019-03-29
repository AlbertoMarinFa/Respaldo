<?php
include $_SERVER['DOCUMENT_ROOT'].'/RSP/PHP/Connection/dbconnect.php';
$Usuario = $_POST['Usuario'];
$Pass = $_POST['Pass'];

$resultadoSelect = $DBcon->query("SELECT * from usuario
  WHERE Nombre = '$Usuario';") or die (mysqli_error());

if(mysqli_num_rows($resultadoSelect)!=0)
{
    $resultadoSelectConsul = $DBcon->query("SELECT * from usuario
    WHERE Nombre = '$Usuario' and PassWord= '$Pass';") or die (mysqli_error());
    if(mysqli_num_rows($resultadoSelectConsul)!=0)
    {
        echo "1";
    }
    else{
      echo "Contraseña incorrecta";
    }
}
else{
  echo "Usuario no existe";
}

$DBcon->close();
?>
