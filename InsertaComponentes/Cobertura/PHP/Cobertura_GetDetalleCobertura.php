<?php
    include $_SERVER['DOCUMENT_ROOT'].'/RSP/PHP/Connection/dbconnect.php';
    $idCobertura = $_POST['idCobertura'];
    $idEstado = $_POST['idEstado'];
    $query1 = $DBcon->query("
      select detallecobertura.idDetalleCobertura,
      detallecobertura.idCobertura,
      	estados_muni.idEstado,
      	municipios.idMunicipio,
          municipios.Municipio,
      	detallecobertura.isActive
      from estados_muni
      INNER join municipios
      	ON municipios.idMunicipio = estados_muni.idMunicipio
      INNER JOIN detallecobertura
      	ON detallecobertura.idMunicipio = municipios.idMunicipio
      where estados_muni.idEstado = '$idEstado'

      union

      select IFNULL(detallecobertura.idDetalleCobertura,0)idDetalleCobertura,
      IFNULL(detallecobertura.idCobertura,0)idCobertura,
      	IFNULL(estados_muni.idEstado,0)idEstado,
          IFNULL(municipios.idMunicipio,0)idMunicipio,
      	municipios.Municipio,
          IFNULL(detallecobertura.isActive , 0)isActive
      from estados_muni
      INNER join municipios
      	ON municipios.idMunicipio = estados_muni.idMunicipio
      LEFT JOIN detallecobertura
      	ON detallecobertura.idMunicipio = municipios.idMunicipio
      where
      	estados_muni.idEstado = '$idEstado'
          and municipios.idMunicipio not in (
      		select detallecobertura.idMunicipio
              from detallecobertura
              where detallecobertura.idCobertura = '$idCobertura'
          )");

    $count = 1;
    while ($userRow1 = $query1->fetch_assoc()) {
      $htmlCheck = "";
      $htmlCompuesto =  $idEstado . $userRow1["idMunicipio"];
      if($userRow1["isActive"] == 1){
        $htmlCheck = "<input type='checkbox' id='Cobertura_Municipio$htmlCompuesto' class='Cobertura_CheckboxDetalleCobertura' onchange=\"Cobertura_UpdateCoberturaDetalle('".$userRow1["idDetalleCobertura"]."','".$userRow1["idMunicipio"]."','".$userRow1["isActive"]."')\" data-toggle='toggle' checked='checked' data-on='SI' data-off='NO'/>";
      }
      else{
        $htmlCheck = "<input type='checkbox' id='Cobertura_Municipio$htmlCompuesto' class='Cobertura_CheckboxDetalleCobertura' onchange=\"Cobertura_UpdateCoberturaDetalle('".$userRow1["idDetalleCobertura"]."','".$userRow1["idMunicipio"]."','".$userRow1["isActive"]."')\" data-toggle='toggle' data-on='SI' data-off='NO'/>";
      }

     echo "</tr>
    <td style='font-size: 13px'>".$userRow1["Municipio"]."</td>
    <td style='font-size: 13px'>".$htmlCheck."</td>
    </tr>";

    $count++;
    }
    while ($DBcon->more_results() && $DBcon->next_result());
    $DBcon->close();
?>
