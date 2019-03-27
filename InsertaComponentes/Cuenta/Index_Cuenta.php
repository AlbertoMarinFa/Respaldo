<div class="container-fluid">
  <span><i id='Componetes_Apartado_Cuenta' class="fa fa-arrow-left text-primary" style="font-size: 30px;cursor: pointer;">&nbsp;&nbsp;Cuentas</i></span>
  <div class="row">
    <input type="button" class="btn btn-primary" value="Agregar Cuenta" id="Cuenta_AddNewCuenta">
  </div>
  <div class="col-md-12 text-center">
    <span class="text-primary" style="font-size: 30px;">Lista de Cuentas</span>
  </div>
  <div id="Cuenta_div_Cuentalist" class="col-md-12">

  </div>
</div>
<script type="text/javascript">
Cuenta_GetCuenta();

$('#Componetes_Apartado_Cuenta').click(function(){
  window.location.href = '#!Componentes';
});

function Cuenta_GetCuenta() {
    $.get("InsertaComponentes/Cuenta/PHP/ListaCuenta.php", function(respuesta) {
        if (respuesta != '0') {
            var _HTMLtemp = "<table class=\"table\">" +
                "<thead>" +
                "<tr>" +
                "<th scope=\"col\">Num. Cuenta</th>" +
                "<th scope=\"col\">Nombre Cuenta</th>" +
                "</tr>" +
                "</thead>" +
                "<tbody>" +
                respuesta +
                 "</tbody></table>";
                 //CuentaS_div_KISTLIST
                 $("#Cuenta_div_Cuentalist").html(_HTMLtemp);
        } else {
          $("#Cuenta_div_Cuentalist").html("<div class='col-md-12'><div class='col-md-4'></div><div class='col-md-4'><img style='margin-left: 130px;' src='images/sin-resultados.png'></div><div class='col-md-4'></div></div>");
        }

    });
}

$('#Cuenta_AddNewCuenta').click(function(){
  General_OpenModalGeneral("Agregar Cuenta", "InsertaComponentes/Cuenta/AddCuenta.php");
});

function Cuenta_DeleteCuenta(idCuenta){
  $.confirm({
  title: '¿Desea eliminar el Cuenta?',
   content: '',
  buttons: {
      confirm: function () {
          Cuenta_DeleteCuentaPost(idCuenta);
      },
      cancel: function () {

      }
    }
  });
}

function Cuenta_DeleteCuentaPost(idCuenta){
  //$idTipoCuenta
  $.post("InsertaComponentes/Cuenta/PHP/deleteCuenta.php", {idCuenta:idCuenta},
  function(response){
      if(response == 1){
        $.alert('Cuenta eliminado correctamente');
        Cuenta_GetCuenta();
      }
      else{
        $.alert('Error al eliminar Cuenta');
      }
  });
}
</script>
