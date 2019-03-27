<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      Nombre Modelo
      <input type="text"class="form-control" id="Modelo_NombreModelo">
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <input type="button" class="btn btn-primary" id="Modelo_AddModelo_SaveModelo" value="Guardar">
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function(){
    $('#Modelo_AddModelo_SaveModelo').click(function(){
      $('#Modelo_AddModelo_SaveModelo').attr('disabled','disabled');
      Modelo_AddNewModelo();
    });
  });

  function Modelo_AddNewModelo(){
    $.post("InsertaComponentes/Modelo/PHP/AddModelo.php", {NombreModelo:$("#Modelo_NombreModelo").val()},
    function(response){
        if(response == 1){
          alert("Modelo dado de alta correctamente");
          Modelo_GetModelo();
          General_CloseModal();
        }
        else if(response == 0){
          alert("ya existe un Modelo con este nombre");
          $('#Modelo_AddModelo_SaveModelo').removeAttr('disabled');
        }
        else{
          alert("Error al registrar Modelo");
          $('#Modelo_AddModelo_SaveModelo').removeAttr('disabled');
        }
    });
  }
</script>
