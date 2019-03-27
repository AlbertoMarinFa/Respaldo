<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      Nombre parte
      <input type="text"class="form-control" id="Parte_NombreParte">
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <input type="button" class="btn btn-primary" id="Parte_AddParte_SaveParte" value="Guardar">
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function(){
    $('#Parte_AddParte_SaveParte').click(function(){
      $('#Parte_AddParte_SaveParte').attr('disabled','disabled');
      Parte_AddNewParte();
    });
  });

  function Parte_AddNewParte(){
    $.post("InsertaComponentes/Parte/PHP/AddNewParte.php", {DescripcionParte:$("#Parte_NombreParte").val()},
    function(response){
        if(response == 1){
          alert("Parte dado de alta correctamente");
          Parte_GetParte();
          General_CloseModal();
        }
        else if(response == 0){
          alert("ya existe una Parte con este nombre");
          $('#Parte_AddParte_SaveParte').removeAttr('disabled');
        }
        else{
          alert("Error al registrar Parte");
          $('#Parte_AddParte_SaveParte').removeAttr('disabled');
        }
    });
  }
</script>
