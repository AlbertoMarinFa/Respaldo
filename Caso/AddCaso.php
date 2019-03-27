<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      Numero caso
      <input type="text"class="form-control" id="Caso_NombreCaso">
    </div>
    <div class="col-md-12">
      Estatus caso
      <select class="form-control" id="Caso_CoberturaCaso">
        <?php
            include $_SERVER['DOCUMENT_ROOT'].'/RSP/PHP/Connection/dbconnect.php';
            $query1 = $DBcon->query("SELECT CodEstatusCaso,Estatus from catestatuscaso;;");
            echo'<option value="0">SELECCIONA UNA OPCIÓN</option>';
            while ($userRow2 = $query1->fetch_assoc()) {
                echo'<option value="'.$userRow2["CodEstatusCaso"].'">'.$userRow2["Estatus"].'</option>';
            }
            $DBcon->close();
        ?>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <input type="button" class="btn btn-primary" id="Caso_AddCaso_SaveCaso" value="Guardar">
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function(){
    $('#Caso_AddCaso_SaveCaso').click(function(){
      $('#Caso_AddCaso_SaveCaso').attr('disabled','disabled');
      Caso_AddNewCaso();
    });
  });

  function Caso_AddNewCaso(){
    $.post("Caso/PHP/AddNewCaso.php",
    {idEquipo: $.urlParam('idEquipo'),
    CodEstatusCaso: $("#Caso_CoberturaCaso").val(),
    NumeroCaso: $("#Caso_NombreCaso").val()},
    function(response){
        if(response == 1){
          Notificacion_ok("Exitoso", "Caso Guardado Correctamente","", "fa fa-check");
          Caso_GetCaso();
          General_CloseModal();
        }
        else if(response == 0){
          Notificacion_warning("Caso Duplicado","se econtro caso duplicado","","fa fa-check")
          $('#Caso_AddCaso_SaveCaso').removeAttr('disabled');
        }
        else{
          Notificacion_error("Error", "no se guardo correctamente", "","fa fa-ckeck" );
          $('#Caso_AddCaso_SaveCaso').removeAttr('disabled');
        }
    });
  }
</script>
