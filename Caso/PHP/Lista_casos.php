<?php
include $_SERVER['DOCUMENT_ROOT'].'/RSP/PHP/Connection/dbconnect.php';
$idEquipo = $_POST['idEquipo'];
$Serie = $_POST['Serie'];

$query1 = $DBcon->query("SELECT caso.idCaso,
equipo.Serie,
caso.FechaInicio,
caso.FechaFin,
(CASE
    WHEN IFNULL(caso.FechaFin,'') = '' THEN DATEDIFF(CAST(now() AS DATE), caso.FechaInicio)
    WHEN IFNULL(caso.FechaFin,'') <> ''THEN DATEDIFF(CAST(now() AS DATE), caso.FechaFin)
END ) dias,
catestatuscaso.Estatus,
catestatuscaso.CodEstatusCaso,
caso.NumeroCaso
from caso
INNER JOIN equipo on equipo.idEquipo = caso.idEquipo
inner join catestatuscaso on catestatuscaso.CodEstatusCaso = caso.CodEstatusCaso
      where equipo.idEquipo = $idEquipo and equipo.Serie = '$Serie';") or die (mysqli_error());

$rowcount = mysqli_num_rows($query1);

if($rowcount != 0){
  $count = 1;
  while ($userRow1 = $query1->fetch_assoc()) {
    $casotexto = '';
    if($userRow1["CodEstatusCaso"] == 1){
      $casotexto = '<td style="font-size: 13px"><i data-toggle="tooltip" title="Cerrar caso" onclick=\'Caso_CerrarCaso('.$userRow1["idCaso"].')\' class="fa fa-ban" style="cursor:pointer;"></i></td>';
    }
    else{
      $casotexto = "<td>Cerrado</td>";
    }
   /*echo '</tr>
  <td style="font-size: 13px">'.$count.'</td>
  <td style="font-size: 13px">'.$userRow1["Serie"].'</td>
  <td style="font-size: 13px">'.$userRow1["FechaInicio"].'</td>
  <td style="font-size: 13px">'.$userRow1["FechaFin"].'</td>
  <td style="font-size: 13px">'.$userRow1["dias"].'</td>
  <td style="font-size: 13px">'.$userRow1["Estatus"].'</td>
  <td style="font-size: 13px">'.$userRow1["NumeroCaso"].'</td>
  <td style="font-size: 13px"><i onclick=\'Caso_CerrarCaso('.$userRow1["idCaso"].')\' class="fa fa-cog" style="cursor:pointer;"></i></td>
  '.$casotexto.'*/
  echo '</tr>
  <td style="font-size: 13px">'.$count.'</td>
  <td style="font-size: 13px">'.$userRow1["Serie"].'</td>
  <td style="font-size: 13px">'.$userRow1["FechaInicio"].'</td>
  <td style="font-size: 13px">'.$userRow1["FechaFin"].'</td>
  <td style="font-size: 13px">'.$userRow1["dias"].'</td>
  <td style="font-size: 13px">'.$userRow1["Estatus"].'</td>
  <td style="font-size: 13px">'.$userRow1["NumeroCaso"].'</td>
  '.$casotexto.'
  </tr>';

  $count++;
  }
  while ($DBcon->more_results() && $DBcon->next_result());
}
else{
  echo 0;
}
$DBcon->close();
?>
