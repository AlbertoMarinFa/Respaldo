<div class="container-fluid">
  <span><i id='Componetes_Apartado_KIT' class="fa fa-arrow-left text-primary" style="font-size: 30px;cursor: pointer;">&nbsp;&nbsp;KITS</i></span>
  <div class="row">
    <input type="button" class="btn btn-primary" value="Agregar KIT" id="KIT_AddNewKit">
  </div>
  <div class="col-md-12 text-center">
    <span class="text-primary" style="font-size: 30px;">Lista de KITS</span>
  </div>
  <div id="KITS_div_KISTLIST" class="col-md-12">

  </div>
</div>
<script type="text/javascript">
  KIT_GetKITS();
  $('#Componetes_Apartado_KIT').click(function(){
    window.location.href = '#!Componentes';
  });

  function KIT_GetKITS() {
      $.get("InsertaComponentes/KIT/PHP/ListaKist.php", function(respuesta) {
          if (respuesta != '0') {
              var _HTMLtemp = "<table class=\"table\">" +
                  "<thead>" +
                  "<tr>" +
                  "<th scope=\"col\">Num. kit</th>" +
                  "<th scope=\"col\">Nombre Kit</th>" +
                  "</tr>" +
                  "</thead>" +
                  "<tbody>" +
                  respuesta +
                   "</tbody></table>";
                   //KITS_div_KISTLIST
                   $("#KITS_div_KISTLIST").html(_HTMLtemp);
          } else {
            $("#KITS_div_KISTLIST").html("<div class='col-md-12'><div class='col-md-4'></div><div class='col-md-4'><img style='margin-left: 130px;' src='images/sin-resultados.png'></div><div class='col-md-4'></div></div>");
          }

      });
  }

  $('#KIT_AddNewKit').click(function(){
    General_OpenModalGeneral("Agregar Kit", "InsertaComponentes/KIT/AddKIT.html");
  });

  function Kit_DeleteKit(idKit){
    $.confirm({
    title: '¿Desea eliminar el Kit?',
     content: '',
    buttons: {
        confirm: function () {
            kit_DeleteKitPost(idKit);
        },
        cancel: function () {

        }
      }
    });
  }

  function kit_DeleteKitPost(idKit){
    //$idTipoKit
    $.post("InsertaComponentes/KIT/PHP/deleteKit.php", {idTipoKit:idKit},
    function(response){
        if(response == 1){
          $.alert('Kit eliminado correctamente');
          KIT_GetKITS();
        }
        else{
          $.alert('Error al eliminar Kit');
        }
    });
  }
</script>
