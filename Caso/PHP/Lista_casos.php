<?php
include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
$idEquipo = $_POST['idEquipo'];
$Serie = $_POST['Serie'];

$query1 = $DBcon->query("SELECT caso.idCaso,
equipo.Serie,
DATE_FORMAT(caso.FechaInicio, '%m/%d/%Y %H:%i')FechaInicio,
DATE_FORMAT(caso.FechaFin, '%m/%d/%Y %H:%i')FechaFin,
(CASE
    WHEN IFNULL(caso.FechaFin,'') = '' THEN DATEDIFF(CAST(now() AS DATE), caso.FechaInicio)
    WHEN IFNULL(caso.FechaFin,'') <> ''THEN DATEDIFF(caso.FechaInicio, caso.FechaFin)
END ) dias,
catestatuscaso.Estatus,
catestatuscaso.CodEstatusCaso,
caso.NumeroCaso
from caso
INNER JOIN equipo on equipo.idEquipo = caso.idEquipo
inner join catestatuscaso on catestatuscaso.CodEstatusCaso = caso.CodEstatusCaso
      where equipo.idEquipo = $idEquipo and equipo.Serie = '$Serie' order by caso.FechaInicio desc;") or die (mysqli_error());

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
  echo '</tr>
  <td style="font-size: 13px">'.$count.'</td>
  <td style="font-size: 13px">'.$userRow1["Serie"].'</td>
  <td style="font-size: 13px">'.$userRow1["FechaInicio"].'</td>
  <td style="font-size: 13px">'.$userRow1["FechaFin"].'</td>
  <td style="font-size: 13px">'.$userRow1["dias"].'</td>
  <td style="font-size: 13px">'.$userRow1["Estatus"].'</td>
  <td style="font-size: 13px"><span data-toggle="tooltip" title="Agregar archivo" onclick=\'Caso_UploadFileToCaso('.$userRow1["idCaso"].')\' style="cursor:pointer;">'.$userRow1["NumeroCaso"].'</span></td>
  '.$casotexto.'
  <td style="font-size: 13px"><i data-toggle="tooltip" title="Agregar/Ver nota" onclick=\'Caso_AddViewNotas('.$userRow1["idCaso"].')\' class="fa fa-eye" style="cursor:pointer;"></i></td>
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
