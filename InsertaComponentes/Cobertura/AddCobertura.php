<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      Nombre Cobertura
      <input type="text"class="form-control" id="Cobertura_NombreCobertura">
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <input type="button" class="btn btn-primary" id="Cobertura_AddCobertura_SaveCobertura" value="Guardar">
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function(){
    $('#Cobertura_AddCobertura_SaveCobertura').click(function(){
      $('#Cobertura_AddCobertura_SaveCobertura').attr('disabled','disabled');
      Cobertura_AddNewCobertura();
    });
  });

  function Cobertura_AddNewCobertura(){
    $.post("InsertaComponentes/Cobertura/PHP/AddNewCobertura.php", {NombreCobertura:$("#Cobertura_NombreCobertura").val()},
    function(response){
        if(response == 1){
          alert("Cobertura dado de alta correctamente");
          Cobertura_GetCobertura();
          General_CloseModal();
        }
        else if(response == 0){
          alert("ya existe un Cobertura con este nombre");
          $('#Cobertura_AddCobertura_SaveCobertura').removeAttr('disabled');
        }
        else{
          alert("Error al registrar Cobertura");
          $('#Cobertura_AddCobertura_SaveCobertura').removeAttr('disabled');
        }
    });
  }
</script>
