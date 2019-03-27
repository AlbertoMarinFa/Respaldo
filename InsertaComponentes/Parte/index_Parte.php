<div class="container-fluid">
  <span><i id='Componetes_Apartado_Parte' class="fa fa-arrow-left text-primary" style="font-size: 30px;cursor: pointer;">&nbsp;&nbsp;Partes</i></span>
  <div class="row">
    <input type="button" class="btn btn-primary" value="Agregar Parte" id="Parte_AddNewParte">
  </div>
  <div class="col-md-12 text-center">
    <span class="text-primary" style="font-size: 30px;">Lista de Partes</span>
  </div>
  <div id="Parte_div_Partelist" class="col-md-12">

  </div>
</div>
<script type="text/javascript">
Parte_GetParte();

$('#Componetes_Apartado_Parte').click(function(){
  window.location.href = '#!Componentes';
});

function Parte_GetParte() {
    $.get("InsertaComponentes/Parte/PHP/ListaPartes.php", function(respuesta) {
        if (respuesta != '0') {
            var _HTMLtemp = "<table class=\"table\">" +
                "<thead>" +
                "<tr>" +
                "<th scope=\"col\">Num. Parte</th>" +
                "<th scope=\"col\">Nombre Parte</th>" +
                "</tr>" +
                "</thead>" +
                "<tbody>" +
                respuesta +
                 "</tbody></table>";
                 //ParteS_div_KISTLIST
                 $("#Parte_div_Partelist").html(_HTMLtemp);
        } else {
          $("#Parte_div_Partelist").html("<div class='col-md-12'><div class='col-md-4'></div><div class='col-md-4'><img style='margin-left: 130px;' src='images/sin-resultados.png'></div><div class='col-md-4'></div></div>");
        }

    });
}

$('#Parte_AddNewParte').click(function(){
  General_OpenModalGeneral("Agregar Parte", "InsertaComponentes/Parte/AddParte.php");
});

function Parte_DeleteParte(idParte){
  $.confirm({
  title: '¿Desea eliminar el Parte?',
   content: '',
  buttons: {
      confirm: function () {
          Parte_DeletePartePost(idParte);
      },
      cancel: function () {

      }
    }
  });
}

function Parte_DeletePartePost(idParte){
  //$idTipoParte
  $.post("InsertaComponentes/Parte/PHP/deleteParte.php", {idParte:idParte},
  function(response){
      if(response == 1){
        $.alert('Parte eliminado correctamente');
        Parte_GetParte();
      }
      else{
        $.alert('Error al eliminar Parte');
      }
  });
}
</script>
