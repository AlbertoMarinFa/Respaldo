<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      Nombre Documento
      <input type="text"class="form-control" id="Documento_NombreDocumento">
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <input type="button" class="btn btn-primary" id="Documento_AddDocumento_SaveDocumento" value="Guardar">
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function(){
    $('#Documento_AddDocumento_SaveDocumento').click(function(){
      $('#Documento_AddDocumento_SaveDocumento').attr('disabled','disabled');
      Documento_AddNewDocumento();
    });
  });

  function Documento_AddNewDocumento(){
    $.post("InsertaComponentes/Documento/PHP/AddNewDocumento.php", {NombreDocumento:$("#Documento_NombreDocumento").val()},
    function(response){
        if(response == 1){
          alert("Documento dado de alta correctamente");
          Documento_GetDocumento();
          General_CloseModal();
        }
        else if(response == 0){
          alert("ya existe un Documento con este nombre");
          $('#Documento_AddDocumento_SaveDocumento').removeAttr('disabled');
        }
        else{
          alert("Error al registrar Documento");
          $('#Documento_AddDocumento_SaveDocumento').removeAttr('disabled');
        }
    });
  }
</script>
