<?php
include $_SERVER['DOCUMENT_ROOT'].'/RSP/PHP/Connection/dbconnect.php';
$idEquipo = $_POST['idEquipo'];
$query1 = $DBcon->query("SELECT equipoparte.idEquipoParte,
  equipoparte.idEquipo,
  equipoparte.idParte,
  catpartes.DescripcionParte NombreParte
  FROM equipoparte
  INNER join catpartes on catpartes.idPartes = equipoparte.idParte
  where equipoparte.idEquipo = $idEquipo;");
$rowcount = mysqli_num_rows($query1);
if($rowcount != 0){
  $count = 1;
  while ($userRow1 = $query1->fetch_assoc()) {

   echo '</tr>
  <td style="font-size: 13px">'.$count.'</td>
  <td style="font-size: 13px">'.$userRow1["NombreParte"].'</td>
  <td style="font-size: 13px"><i onclick=\'Parte_DeleteParte('.$userRow1["idEquipoParte"].')\' class="fa fa-trash-alt" style="cursor:pointer;"></i></td>
  </tr>';
//$userRow1["idtipokit"]
  $count++;
  }
  while ($DBcon->more_results() && $DBcon->next_result());
}
else{
  echo 0;
}
$DBcon->close();
?>
