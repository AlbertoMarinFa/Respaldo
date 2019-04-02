<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      Agregar nota:
      <textarea type="text"class="form-control" id="Nota_NotaForCaso"></textarea>
    </div>
  </div>
  <br/>
  <div class="row">
    <div class="col-md-12 text-center">
      <input type="button" class="btn btn-primary" id="Nota_SaveComentarioForCaso" value="Guardar">
    </div>
  </div>
  <div class="row">
    Notas anteriores
    <div class="col-md-12" id="Notas_DivNotasByCaso">

    </div>
  </div>
</div>
<script type="text/javascript">
  $(function(){
    Notas_GetAllNotasByCaso();

    $('#Nota_SaveComentarioForCaso').click(function(){
      $('#Nota_SaveComentarioForCaso').attr('disabled','disabled');
      Nota_AddNewNota();
    });
  });

  function Nota_AddNewNota(){
    $.post("Caso/PHP/AddNewNota.php",
    {Descrpcion: $('#Nota_NotaForCaso').val(),
    idCaso: Conertura_DatosCasoEditar.idCaso,
    idUsuario: Session_Userid},
    function(response){
        if(response == 1){
          Notificacion_ok("Exitoso", "Caso Guardado Correctamente","", "fa fa-check");
          Notas_GetAllNotasByCaso();
          $('#Nota_NotaForCaso').val('')
          $('#Nota_SaveComentarioForCaso').removeAttr('disabled');
        }
        else{
          Notificacion_error("Error", "no se guardo correctamente", "","fa fa-times" );
          $('#Caso_AddCaso_SaveCaso').removeAttr('disabled');
        }
    });
  }

  function Notas_GetAllNotasByCaso(){
    $.post("Caso/PHP/Nota_GetNotas.php",
    {idCaso: Conertura_DatosCasoEditar.idCaso},
    function(response){
      if (response != '0') {
          var _HTMLtemp = "<table class=\"table table-hover\">" +
              "<thead>" +
              "<tr class='bg-primary'>" +
              "<th scope=\"col\">Num. Comentario</th>" +
              "<th scope=\"col\">Comentario</th>" +
              "<th scope=\"col\">Usuario</th>" +
              "<th scope=\"col\">Fecha insercion</th>" +
              "</tr>" +
              "</thead>" +
              "<tbody>" +
              response +
               "</tbody></table>";

               $("#Notas_DivNotasByCaso").html(_HTMLtemp);
      } else {
        $("#Notas_DivNotasByCaso").html("<div class='col-md-12'><img class='center-block' style='width: 250px;' src='images/sin-resultados.png'></div>");
      }
    });
  }
</script>
