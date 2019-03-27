<div class="container-fluid">
    <div class="col-md-12">
        <label>Selecciona un archivo</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="Equipo_UploadFile" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="Equipo_UploadFile"></label>
        </div>
        <br />
    </div>
    <div class="col-md-12 text-center">
        <input type="button" class="btn btn-primary" value="Subir Archivo" />
    </div>
</div>
<script>
$(document).ready(function(){
 $(document).on('change', '#Equipo_UploadFile', function(){
   var File = document.getElementById("Equipo_UploadFile").files[0];
  var name = document.getElementById("Equipo_UploadFile").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
  {
   alert("Invalid Image File");
  }

  File.name = CreateGuid() + '.' + ext;

  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("Equipo_UploadFile").files[0]);
  var f = document.getElementById("Equipo_UploadFile").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 2000000)
  {
   alert("Image File Size is very big");
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
      console.log(data);
    }
   });
  }
 });
});
</script>
