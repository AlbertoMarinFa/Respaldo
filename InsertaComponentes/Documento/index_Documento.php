<div class="container-fluid">
  <span><i id='Componetes_Apartado_Documento' class="fa fa-arrow-left text-primary" style="font-size: 30px;cursor: pointer;">&nbsp;&nbsp;Documentos</i></span>
  <div class="row">
    <input type="button" class="btn btn-primary" value="Agregar Documento" id="Documento_AddNewDocumento">
  </div>
  <div class="col-md-12 text-center">
    <span class="text-primary" style="font-size: 30px;">Lista de Documento</span>
  </div>
  <div id="Documento_div_Documentolist" class="col-md-12">

  </div>
</div>
<script type="text/javascript">
Documento_GetDocumento();
$('#Componetes_Apartado_Documento').click(function(){
  window.location.href = '#!Componentes';
});


function Documento_GetDocumento() {
    $.get("InsertaComponentes/Documento/PHP/ListaDocumento.php", function(respuesta) {
        if (respuesta != '0') {
            var _HTMLtemp = "<table class=\"table\">" +
                "<thead>" +
                "<tr>" +
                "<th scope=\"col\">Num. Documento</th>" +
                "<th scope=\"col\">Nombre Documento</th>" +
                "</tr>" +
                "</thead>" +
                "<tbody>" +
                respuesta +
                 "</tbody></table>";
                 //DocumentoS_div_KISTLIST
                 $("#Documento_div_Documentolist").html(_HTMLtemp);
        } else {
          $("#Documento_div_Documentolist").html("<div class='col-md-12'><div class='col-md-4'></div><div class='col-md-4'><img style='margin-left: 130px;' src='images/sin-resultados.png'></div><div class='col-md-4'></div></div>");
        }

    });
}

$('#Documento_AddNewDocumento').click(function(){
  General_OpenModalGeneral("Agregar Documento", "InsertaComponentes/Documento/AddDocumento.php");
});

function Documento_DeleteDocumento(idDocumento){
  $.confirm({
  title: '¿Desea eliminar el Documento?',
   content: '',
  buttons: {
      confirm: function () {
          Documento_DeleteDocumentoPost(idDocumento);
      },
      cancel: function () {

      }
    }
  });
}

function Documento_DeleteDocumentoPost(idDocumento){
  //$idTipoDocumento
  $.post("InsertaComponentes/Documento/PHP/deleteDocumento.php", {idDocumento:idDocumento},
  function(response){
      if(response == 1){
        $.alert('Documento eliminado correctamente');
        Documento_GetDocumento();
      }
      else{
        $.alert('Error al eliminar Documento');
      }
  });
}
</script>
