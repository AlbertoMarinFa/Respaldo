<style type="text/css">
  .scrollable_tableCobertura {
    height: 200px;
    overflow-y: scroll;
  }
</style>
<div class="content-fluid">
  <span class="text-primary" id="Cobertura_NombreConertura"></span>
  <div class="col-md-12">
    Estado:
    <div class="col-md-12">
      <select class="form-control" id="Cobertura_CB_EstadoCobertura">
        <?php
            include $_SERVER['DOCUMENT_ROOT'].'/RSP/PHP/Connection/dbconnect.php';
            $query1 = $DBcon->query("SELECT * FROM estados");
            echo'<option value="0">SELECCIONA UNA OPCIÓN</option>';
            while ($userRow2 = $query1->fetch_assoc()) {
                echo'<option value="'.$userRow2["idEstado"].'">'.utf8_encode($userRow2["Estado"]).'</option>';
            }
            $DBcon->close();
        ?>
      </select>
    </div>
    <br>
    <div class="col-md-12 scrollable_tableCobertura" id="Cobertura_DIV_DetalleCoberturaMunicipios" style="display:none !important;">

    </div>
  </div>
  <div class="col-md-12">
    <input type="button" class="btn btn-primary" onclick="$('#exampleModalLong').hide();" value="Terminar">
  </div>
</div>
<script type="text/javascript">
$(function(){
  $('#Cobertura_NombreConertura').text("Cobertura: " + Conertura_DatosCoberturaEditar.Nombre);
});

$('#Cobertura_CB_EstadoCobertura').change(function(){
  Cobertura_GetDetalleCoberturaMunicipios();
});

function Cobertura_GetDetalleCoberturaMunicipios() {
    $.post("InsertaComponentes/Cobertura/PHP/Cobertura_GetDetalleCobertura.php",{idCobertura:Conertura_DatosCoberturaEditar.idCobertura,idEstado:$('#Cobertura_CB_EstadoCobertura').val()},  function(respuesta) {
        if (respuesta != '0') {
            var _HTMLtemp = "<table class=\"table\">" +
                "<thead>" +
                "<tr>" +
                "<th scope=\"col\">Estado</th>" +
                "<th scope=\"col\">Cubierto</th>" +
                "</tr>" +
                "</thead>" +
                "<tbody>" +
                respuesta +
                 "</tbody></table>";
                 //CoberturaS_div_KISTLIST
                 $("#Cobertura_DIV_DetalleCoberturaMunicipios").html(_HTMLtemp);
                 $('#Cobertura_DIV_DetalleCoberturaMunicipios').show();

                 $('.Cobertura_CheckboxDetalleCobertura').bootstrapToggle({
                   on: 'SI',
                   off: 'NO'
                 });
        } else {
          $("#Cobertura_DIV_DetalleCoberturaMunicipios").html("<div class='col-md-12'><div class='col-md-4'></div><div class='col-md-4'><img style='margin-left: 130px;' src='images/sin-resultados.png'></div><div class='col-md-4'></div></div>");
        }

    });
}

function Cobertura_UpdateCoberturaDetalle(idDetalleCobertura, idMunicipio,isActive){  
  isActive = $('#Cobertura_Municipio' + $('#Cobertura_CB_EstadoCobertura').val() + idMunicipio).prop('checked') == true ? 1 : 0;

  $.post("InsertaComponentes/Cobertura/PHP/Cobertura_UpdateCoberturaDetalle.php",
  {idCobertura:Conertura_DatosCoberturaEditar.idCobertura,idEstado:$('#Cobertura_CB_EstadoCobertura').val(),
  idMunicipio: idMunicipio,idDetalleCobertura: idDetalleCobertura,isActive:isActive}, function(respuesta) {
      if (respuesta == '1') {
        $.alert('Municipio guardado correctamente');
      }
      else if (respuesta == '2') {
        $.alert('Municipio actualizado correctamente');
      }
      else {
        $.alert('Error al actualizar cobertura');
      }
  });

}
</script>
