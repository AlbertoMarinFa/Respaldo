<div class="container-fluid">
  <span class="text-primary" id="Configuracion_equipoSerie"></span>
  <br/>
  <br/>
  <div class="col-md-12">
    Carta responsiva
    <div class="col-md-12">
      <div class="col-md-6" id="ConfiguracionEquipo_CartaResponsivaDIV">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="Equipo_UploadFile" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="Equipo_UploadFile"></label>
        </div>
      </div>
    </div>
  </div>
  <br />
  <div class="col-md-12">
    Estado Equipo
    <select class="form-control" id="Equipo_IsDisponibleEquipo">
      <option value="">SELECCIONA UNA OPCIÓN</option>
      <option value="1">Disponible</option>
      <option value="0">No disponible</option>
    </select>
  </div>
  <br /><br />
  <div class="col-md-12">
    Estatus Equipo
    <select class="form-control" id="Equipo_EstatusEquipo">
      <?php
          include $_SERVER['DOCUMENT_ROOT'].'/RSP/PHP/Connection/dbconnect.php';
          $query1 = $DBcon->query("SELECT idEstadoEquipo,Descripcion Estado from catestadoequipo;");
          echo'<option value="0">SELECCIONA UNA OPCIÓN</option>';
          while ($userRow2 = $query1->fetch_assoc()) {
              echo'<option value="'.$userRow2["idEstadoEquipo"].'">'.$userRow2["Estado"].'</option>';
          }
          $DBcon->close();
      ?>
    </select>
  </div>
  <br /><br />
  <div class="col-md-12">
    Nombre contacto
    <input type="text" class="form-control" id="Equipo_NombreContacto">
  </div>
  <br /><br />
  <div class="col-md-12">
    Numero contacto
    <input type="text" class="form-control" id="Equipo_NumeroContacto">
  </div>
  <br /><br />
  <div class="col-md-12 text-center">
    <input type="button" class="btn btn-primary" onclick="Equipo_UpdateConfiguracionByEquipo();" value="Actualiar">
  </div>
</div>
<script type="text/javascript">
  $(function(){
    $('#Configuracion_equipoSerie').text("Serie: " + Conertura_DatosEquipoEditar.Serie);

  });

ConfiguracionEquipo_GetCartaResponsiva();
  function ConfiguracionEquipo_GetCartaResponsiva(){
      //ConfiguracionEquipo_CartaResponsivaDIV
      $.post("EquiposRespaldo/PHP/GetCartaByEquipo.php", {idEquipo:Conertura_DatosEquipoEditar.idEquipo},
      function(response){
        if(response != 0){
          $('#ConfiguracionEquipo_CartaResponsivaDIV').html("<div class='col-md-12 text-center'><a target='_blank' onclick=\"href = '" + response + "';\" data-sub-html='' class='fa fa-file' style='font-size: 40px;cursor: pointer;'></a></div>");
        }
      });
  }

  function Equipo_UploadCartatoEquipo(idArchivo){
    $.post("EquiposRespaldo/PHP/UpdateFileToEquipo.php", {idArchivo:idArchivo,idEquipo:Conertura_DatosEquipoEditar.idEquipo},
    function(response){
      $('#Equipo_UploadFile').val('');
        ConfiguracionEquipo_GetCartaResponsiva();
    });
  }

  Equipo_GetConfiguracionByEquipo();
  function Equipo_GetConfiguracionByEquipo(){
    $.post("EquiposRespaldo/PHP/Equipo_GetDatosEquipo.php", {idEquipo:Conertura_DatosEquipoEditar.idEquipo},
    function(response){
      var ArregloDatos = jQuery.parseJSON(response);
      $('#Equipo_IsDisponibleEquipo').val(ArregloDatos.IsDisponible);
      $('#Equipo_EstatusEquipo').val(ArregloDatos.idEstadoEquipo);
      $('#Equipo_NombreContacto').val(ArregloDatos.Contacto);
      $('#Equipo_NumeroContacto').val(ArregloDatos.Numero);
    });
  }

  function Equipo_UpdateConfiguracionByEquipo(){
    $.post("EquiposRespaldo/PHP/Equipo_UpdateEquipo.php", {
      idEquipo:Conertura_DatosEquipoEditar.idEquipo,
      IsDisponible:$('#Equipo_IsDisponibleEquipo').val(),
      idEstadoEquipo:$('#Equipo_EstatusEquipo').val(),
      Contacto:$('#Equipo_NombreContacto').val(),
      Numero:$('#Equipo_NumeroContacto').val(),
    },
    function(response){
      if(response == 1){
        Notificacion_ok("Éxito", "Equipo actualizado correctamente", "", "fa fa-check");
        Equipo_GetEquipo();
        General_CloseModal();
      }
      else{
        Notificacion_error("Error", "Error al actualizar equipo", "", "fa fa-times");
      }
    });
  }
</script>
<script>
$(document).ready(function(){
 $(document).on('change', '#Equipo_UploadFile', function(){
   var File = document.getElementById("Equipo_UploadFile").files[0];
  var name = document.getElementById("Equipo_UploadFile").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  /*if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
  {
   alert("Invalid Image File");
 }*/

  File.name = CreateGuid() + '.' + ext;

  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("Equipo_UploadFile").files[0]);
  var f = document.getElementById("Equipo_UploadFile").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 20000000)
  {
   //alert("Image File Size is very big");
   Notificacion_error("Error", "El archivo es demaciado grande", "", "fa fa-times");
  }
  else
  {
   form_data.append("file", File);
   form_data.append("nameFile", CreateGuid() + '.' + ext);
   $.ajax({
    url:"EquiposRespaldo/PHP/UploadFile.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){

    },
    success:function(data)
    {
      Equipo_UploadCartatoEquipo(data);
    }
   });
  }
 });
});
</script>
