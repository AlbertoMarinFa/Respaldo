<div class="container-fluid">
  <span><i id='Componetes_Apartado_Caso' class="fa fa-arrow-left text-primary" style="font-size: 30px;cursor: pointer;">&nbsp;&nbsp;Caso</i></span>
  <div class="row">
    <input type="button" class="btn btn-primary" value="Agregar Caso" id="Caso_AddNewCaso">
  </div>
  <div class="col-md-12 text-center">
    <span class="text-primary" style="font-size: 30px;"><font face="Comic Sans MS,arial,verdana">lista de casos</font></span>
  </div>
  <div id="Caso_div_Casolist" class="col-md-12">

  </div>
</div>
<script type="text/javascript">
Caso_GetCaso();

$('#Componetes_Apartado_Caso').click(function(){
  window.location.href = '#!';
});

function Caso_GetCaso() {
    $.post("Caso/PHP/Lista_Casos.php",{idEquipo:$.urlParam('idEquipo'), Serie:$.urlParam('Serie')},
    function(respuesta) {
        if (respuesta != '0') {
            var _HTMLtemp = "<table class=\"table table-hover\">" +
                "<thead>" +
                "<tr class='bg-primary'>" +
                "<th scope=\"col\">Num. Caso</th>" +
                "<th scope=\"col\">Serie</th>" +
                "<th scope=\"col\">Fecha Inicio</th>" +
                "<th scope=\"col\">Fecha Fin</th>" +
                "<th scope=\"col\">dias</th>" +
                "<th scope=\"col\">Estatus</th>" +
                "<th scope=\"col\">Numero Caso</th>" +
                //"<th scope=\"col\">Configurar</th>" +
                "<th scope=\"col\">Cerrar caso</th>" +
                "<th scope=\"col\">Notas</th>" +
                "</tr>" +
                "</thead>" +
                "<tbody>" +
                respuesta +
                 "</tbody></table>";
                 //CasoS_div_KISTLIST
                 $("#Caso_div_Casolist").html(_HTMLtemp);
                 $('[data-toggle="tooltip"]').tooltip();
        } else {
          $("#Caso_div_Casolist").html("<div class='col-md-12'><div class='col-md-4'></div><div class='col-md-4'><img style='margin-left: 130px;' src='images/sin-resultados.png'></div><div class='col-md-4'></div></div>");
        }

    });
}

$('#Caso_AddNewCaso').click(function(){
  General_OpenModalGeneral("Agregar Caso", "Caso/AddCaso.php");
});

function Caso_CerrarCaso(idCaso){
  $.confirm({
  title: '¿Desea cerrar el Caso?',
   content: '',
  buttons: {
      confirm: function () {
          Caso_CerrarCasoPost(idCaso);
      },
      cancel: function () {

      }
    }
  });
}

function Caso_CerrarCasoPost(idCaso){
  $.post("Caso/PHP/Caso_CerrarCaso.php", {idCaso:idCaso},
  function(response){
      if(response == 1){

        Notificacion_ok("Exitoso", "Caso Cerrado Correctamente","", "fa fa-ckeck");
        Caso_GetCaso();
      }
      else{
        Notificacion_error("Error", "no se guardo correctamente", "","fa fa-ckeck" );
      }
  });
}

var Conertura_DatosCasoEditar = [];
function Caso_ConfigurarCaso(idCaso, Nombre){
  Conertura_DatosCasoEditar = {
    idCaso: idCaso,
    Nombre: Nombre
  };

  General_OpenModalGeneral("Agregar Caso", "InsertaComponentes/Caso/ConfiguracionCobertira.php");

}

function Caso_UploadFileToCaso(idCaso){
  Conertura_DatosCasoEditar = {
    idCaso: idCaso
  };
  General_OpenModalGeneral("Subir/ver archivo", "Caso/AddFileToCaso.php");
}

function Caso_AddViewNotas(idCaso){
  Conertura_DatosCasoEditar = {
    idCaso: idCaso};
    General_OpenModalGeneral("Notas", "Caso/Nota_AddViewNota.php");
}
</script>
