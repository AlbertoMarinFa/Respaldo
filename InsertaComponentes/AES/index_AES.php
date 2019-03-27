<div class="container-fluid">
  <span><i id='Componetes_Apartado_AES' class="fa fa-arrow-left text-primary" style="font-size: 30px;cursor: pointer;">&nbsp;&nbsp;AES</i></span>
  <div class="row">
    <input type="button" class="btn btn-primary" value="Agregar AES" id="AES_AddNewAES">
  </div>
  <div class="col-md-12 text-center">
    <span class="text-primary" style="font-size: 30px;">Lista de AES</span>
  </div>
  <div id="AES_div_AESlist" class="col-md-12">

  </div>
</div>
<script type="text/javascript">
AES_GetAES();

$('#Componetes_Apartado_AES').click(function(){
  window.location.href = '#!Componentes';
});

function AES_GetAES() {
    $.get("InsertaComponentes/AES/PHP/ListaAES.php", function(respuesta) {
        if (respuesta != '0') {
            var _HTMLtemp = "<table class=\"table\">" +
                "<thead>" +
                "<tr>" +
                "<th scope=\"col\">Num. AES</th>" +
                "<th scope=\"col\">Nombre AES</th>" +
                "<th scope=\"col\">Nombre contacto</th>" +
                "<th scope=\"col\">Numero contacto</th>" +
                "</tr>" +
                "</thead>" +
                "<tbody>" +
                respuesta +
                 "</tbody></table>";
                 //AESS_div_KISTLIST
                 $("#AES_div_AESlist").html(_HTMLtemp);
        } else {
          $("#AES_div_AESlist").html("<div class='col-md-12'><div class='col-md-4'></div><div class='col-md-4'><img style='margin-left: 130px;' src='images/sin-resultados.png'></div><div class='col-md-4'></div></div>");
        }

    });
}

$('#AES_AddNewAES').click(function(){
  General_OpenModalGeneral("Agregar AES", "InsertaComponentes/AES/AddAES.php");
});

function AES_DeleteAES(idAES){
  $.confirm({
  title: '¿Desea eliminar el AES?',
   content: '',
  buttons: {
      confirm: function () {
          AES_DeleteAESPost(idAES);
      },
      cancel: function () {

      }
    }
  });
}

function AES_DeleteAESPost(idAES){
  //$idTipoAES
  $.post("InsertaComponentes/AES/PHP/deleteAES.php", {idAES:idAES},
  function(response){
      if(response == 1){
        $.alert('AES eliminado correctamente');
        AES_GetAES();
      }
      else{
        $.alert('Error al eliminar AES');
      }
  });
}

var Conertura_DatosAESEditar = [];
function AES_ConfigurarAES(idAES, Nombre){
  Conertura_DatosAESEditar = {
    idAES: idAES,
    Nombre: Nombre
  };

  General_OpenModalGeneral("Agregar AES", "InsertaComponentes/AES/ConfiguracionCobertira.php");

}
</script>
