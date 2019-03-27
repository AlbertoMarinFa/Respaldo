<div class="container-fluid">
  <span><i id='Componetes_Apartado_Cobertura' class="fa fa-arrow-left text-primary" style="font-size: 30px;cursor: pointer;">&nbsp;&nbsp;Coberturas</i></span>
  <div class="row">
    <input type="button" class="btn btn-primary" value="Agregar Cobertura" id="Cobertura_AddNewCobertura">
  </div>
  <div class="col-md-12 text-center">
    <span class="text-primary" style="font-size: 30px;">Lista de Coberturas</span>
  </div>
  <div id="Cobertura_div_Coberturalist" class="col-md-12">

  </div>
</div>
<script type="text/javascript">
Cobertura_GetCobertura();

$('#Componetes_Apartado_Cobertura').click(function(){
  window.location.href = '#!Componentes';
});

function Cobertura_GetCobertura() {
    $.get("InsertaComponentes/Cobertura/PHP/ListaCobertura.php", function(respuesta) {
        if (respuesta != '0') {
            var _HTMLtemp = "<table class=\"table\">" +
                "<thead>" +
                "<tr>" +
                "<th scope=\"col\">Num. Cobertura</th>" +
                "<th scope=\"col\">Nombre Cobertura</th>" +
                "</tr>" +
                "</thead>" +
                "<tbody>" +
                respuesta +
                 "</tbody></table>";
                 //CoberturaS_div_KISTLIST
                 $("#Cobertura_div_Coberturalist").html(_HTMLtemp);
        } else {
          $("#Cobertura_div_Coberturalist").html("<div class='col-md-12'><div class='col-md-4'></div><div class='col-md-4'><img style='margin-left: 130px;' src='images/sin-resultados.png'></div><div class='col-md-4'></div></div>");
        }

    });
}

$('#Cobertura_AddNewCobertura').click(function(){
  General_OpenModalGeneral("Agregar Cobertura", "InsertaComponentes/Cobertura/AddCobertura.php");
});

function Cobertura_DeleteCobertura(idCobertura){
  $.confirm({
  title: '¿Desea eliminar el Cobertura?',
   content: '',
  buttons: {
      confirm: function () {
          Cobertura_DeleteCoberturaPost(idCobertura);
      },
      cancel: function () {

      }
    }
  });
}

function Cobertura_DeleteCoberturaPost(idCobertura){
  //$idTipoCobertura
  $.post("InsertaComponentes/Cobertura/PHP/deleteCobertura.php", {idCobertura:idCobertura},
  function(response){
      if(response == 1){
        $.alert('Cobertura eliminado correctamente');
        Cobertura_GetCobertura();
      }
      else{
        $.alert('Error al eliminar Cobertura');
      }
  });
}

var Conertura_DatosCoberturaEditar = [];
function Cobertura_ConfigurarCobertura(idCobertura, Nombre){
  Conertura_DatosCoberturaEditar = {
    idCobertura: idCobertura,
    Nombre: Nombre
  };
  console.log(idCobertura + "  " + Nombre);
  General_OpenModalGeneral("Agregar Cobertura", "InsertaComponentes/Cobertura/ConfiguracionCobertira.php");

}
</script>
