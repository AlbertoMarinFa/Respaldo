<?php

include $_SERVER['DOCUMENT_ROOT'].'/RSP/PHP/Connection/dbconnect.php';
$query1 = $DBcon->query("SELECT Serie,
  IFNULL(equipo.Contacto,'')Contacto ,IFNULL(equipo.Numero,'')Numero,
(CASE
    WHEN equipo.IsDisponible =1 THEN 'Disponible'
    WHEN equipo.IsDisponible = 0 THEN 'No disponible'
END ) isDisponible,
modelo.Descripcion modelo,
cuenta.NombreCuenta cuenta,
catestadoequipo.Descripcion EstatusEquipo,
aes.Nombre AESNombre,
estados.Estado,
municipios.Municipio,
equipo.idEquipo
from equipo
inner join estados on estados.idEstado = equipo.idEstado
inner join municipios on municipios.idMunicipio = equipo.idMunicipio
inner join aes on aes.idAES = equipo.idAES
inner join modelo on modelo.idModelo = equipo.idModelo
INNER join cuenta on cuenta.idCuenta = equipo.idCuenta
inner join catestadoequipo on catestadoequipo.idEstadoEquipo = equipo.idEstadoEquipo;");
$rowcount = mysqli_num_rows($query1);
if($rowcount != 0){
  $count = 1;
  while ($userRow1 = $query1->fetch_assoc()) {
    $OnclicEstatus=$userRow1["EstatusEquipo"]==="Faltan Partes" ? "data-toggle='tooltip' title='Partes faltantes' onClick='fncModalPartes('".$userRow1["idEquipo"]."')' style='cursor:pointer;'" : ""; 
   echo "</tr>
  <td style='font-size: 13px'>".$count."</td>
  <td style='font-size: 13px' data-toggle='tooltip' title='Ver Casos' onclick=\"Equipo_RedireccionCasoEquipo('".$userRow1["idEquipo"]."','".$userRow1["Serie"]."')\">".$userRow1["Serie"]."</td>
  <td style='font-size: 13px'>".$userRow1["Contacto"]."</td>
  <td style='font-size: 13px'>".$userRow1["Numero"]."</td>
  <td style='font-size: 13px'>".$userRow1["isDisponible"]."</td>
  <td style='font-size: 13px'>".$userRow1["modelo"]."</td>
  <td style='font-size: 13px'>".$userRow1["cuenta"]."</td>
  <td style='font-size: 13px' ".$OnclicEstatus.">".$userRow1["EstatusEquipo"]."</td>
  <td style='font-size: 13px'>".$userRow1["AESNombre"]."</td>
  <td style='font-size: 13px'>".$userRow1["Estado"]."</td>
  <td style='font-size: 13px'>".$userRow1["Municipio"]."</td>
  <td style='font-size: 13px'><i data-toggle='tooltip' title='Modificar Equipo' onclick=\"Equipo_ConfigurarEquipo('".$userRow1["idEquipo"]."','".$userRow1["Serie"]."')\" class='fa fa-cog' style='cursor:pointer;'></i></td>    
  </tr>";
  $count++;
  }
  while ($DBcon->more_results() && $DBcon->next_result());
}
else{
  echo '0';
}
$DBcon->close();

?>