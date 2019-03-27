<div class="container-fluid">
  <span><i id='Componetes_Apartado_Modelo' class="fa fa-arrow-left text-primary" style="font-size: 30px;cursor: pointer;">&nbsp;&nbsp;Modelos</i></span>
  <div class="row">
    <input type="button" class="btn btn-primary" value="Agregar Modelo" id="Modelo_AddNewModelo">
  </div>
  <div class="col-md-12 text-center">
    <span class="text-primary" style="font-size: 30px;">Lista de Modelos</span>
  </div>
  <div id="Modelo_div_Modelolist" class="col-md-12">

  </div>
</div>
<script type="text/javascript">
Modelo_GetModelo();

$('#Componetes_Apartado_Modelo').click(function(){
  window.location.href = '#!Componentes';
});

function Modelo_GetModelo() {
    $.get("InsertaComponentes/Modelo/PHP/ListaModelos.php", function(respuesta) {
        if (respuesta != '0') {
            var _HTMLtemp = "<table class=\"table\">" +
                "<thead>" +
                "<tr>" +
                "<th scope=\"col\">Num. Modelo</th>" +
                "<th scope=\"col\">Nombre Modelo</th>" +
                "</tr>" +
                "</thead>" +
                "<tbody>" +
                respuesta +
                 "</tbody></table>";
                 //ModeloS_div_KISTLIST
                 $("#Modelo_div_Modelolist").html(_HTMLtemp);
        } else {
          $("#Modelo_div_Modelolist").html("<div class='col-md-12'><div class='col-md-4'></div><div class='col-md-4'><img style='margin-left: 130px;' src='images/sin-resultados.png'></div><div class='col-md-4'></div></div>");
        }

    });
}

$('#Modelo_AddNewModelo').click(function(){
  General_OpenModalGeneral("Agregar Modelo", "InsertaComponentes/Modelo/AddNewModelo.php");
});

function Modelo_DeleteModelo(idModelo){
  $.confirm({
  title: '¿Desea eliminar el Modelo?',
   content: '',
  buttons: {
      confirm: function () {
          Modelo_DeleteModeloPost(idModelo);
      },
      cancel: function () {

      }
    }
  });
}

function Modelo_DeleteModeloPost(idModelo){
  //$idTipoModelo
  $.post("InsertaComponentes/Modelo/PHP/deleteModelo.php", {idModelo:idModelo},
  function(response){
      if(response == 1){
        $.alert('Modelo eliminado correctamente');
        Modelo_GetModelo();
      }
      else{
        $.alert('Error al eliminar Modelo');
      }
  });
}
</script>
