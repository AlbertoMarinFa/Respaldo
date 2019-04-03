<div class="row" id="divCasosHojasConfiguracion">
  <div class="col-md-12">
    <input type="text" class="form-control" id="Caso_ComentarioCaso">
  </div>
  <div class="col-md-12">
    <div class="col-md-6" id="ConfiguracionEquipo_CartaResponsivaDIV">
      <div class="custom-file">
          <input type="file" class="custom-file-input" id="Equipo_Caso_UploadFile" aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="Equipo_Caso_UploadFile"></label>
      </div>
    </div>
  </div>
  <br><br>
  <div class="col-md-12" id="Caso_ListaArchivosCargados">

  </div>
</div>
<div class="row">

</div>
<script type="text/javascript">
function Equipo_Caso_UploadCartatoEquipo(idArchivo){
  $.post("Caso/PHP/UpdateFileToCaso.php",
    {Descripcion:idArchivo,
    idEquipo:$.urlParam('idEquipo'),
    idCaso:Conertura_DatosCasoEditar.idCaso,
    Comentario: $('#Caso_ComentarioCaso').val()},
  function(response){
    $('#Equipo_Caso_UploadFile').val('');
      Equipo_Caso_GetListaArchivosCaso();
  });
}

Equipo_Caso_GetListaArchivosCaso();
function Equipo_Caso_GetListaArchivosCaso(){
  $.post("Caso/PHP/ListaArchivosCaso.php", {
    idCaso:Conertura_DatosCasoEditar.idCaso,
    idEquipo:$.urlParam('idEquipo')},
  function(response){
    if (response != '0') {
        var _HTMLtemp = "<table class=\"table table-hover\">" +
            "<thead>" +
            "<tr class='bg-primary'>" +
            "<th scope=\"col\">Num. Archivo</th>" +
            "<th scope=\"col\">Comentario</th>" +
            "<th scope=\"col\">Fecha subida</th>" +
            "<th scope=\"col\">Ver</th>" +
            "</tr>" +
            "</thead>" +
            "<tbody>" +
            response +
             "</tbody></table>";
             //CasoS_div_KISTLIST
             $("#Caso_ListaArchivosCargados").html(_HTMLtemp);
             $('[data-toggle="tooltip"]').tooltip();
    } else {
      $("#Caso_ListaArchivosCargados").html("<div class='col-md-12'><img class='center-block' style='width: 250px;' src='images/sin-resultados.png'></div>");      
    }
  });
}
</script>
<script>
$(document).ready(function(){
 $(document).on('change', '#Equipo_Caso_UploadFile', function(){
   var File = document.getElementById("Equipo_Caso_UploadFile").files[0];
  var name = document.getElementById("Equipo_Caso_UploadFile").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  /*if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
  {
   alert("Invalid Image File");
 }*/

  File.name = CreateGuid() + '.' + ext;

  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("Equipo_Caso_UploadFile").files[0]);
  var f = document.getElementById("Equipo_Caso_UploadFile").files[0];
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
    url:"Caso/PHP/UploadFile.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){

    },
    success:function(data)
    {
      Equipo_Caso_UploadCartatoEquipo(data);
    }
   });
  }
 });
});
</script>
