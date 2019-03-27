<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      Nombre Cuenta
      <input type="text"class="form-control" id="Cuenta_NombreCuenta">
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <input type="button" class="btn btn-primary" id="Cuenta_AddCuenta_SaveCuenta" value="Guardar">
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function(){
    $('#Cuenta_AddCuenta_SaveCuenta').click(function(){
      $('#Cuenta_AddCuenta_SaveCuenta').attr('disabled','disabled');
      Cuenta_AddNewCuenta();
    });
  });

  function Cuenta_AddNewCuenta(){
    $.post("InsertaComponentes/Cuenta/PHP/AddNewCuenta.php", {NombreCuenta:$("#Cuenta_NombreCuenta").val()},
    function(response){
        if(response == 1){
          alert("Cuenta dado de alta correctamente");
          Cuenta_GetCuenta();
          General_CloseModal();
        }
        else if(response == 0){
          alert("ya existe un Cuenta con este nombre");
          $('#Cuenta_AddCuenta_SaveCuenta').removeAttr('disabled');
        }
        else{
          alert("Error al registrar Cuenta");
          $('#Cuenta_AddCuenta_SaveCuenta').removeAttr('disabled');
        }
    });
  }
</script>
