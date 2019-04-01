<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      Nombre AES
      <input type="text"class="form-control" id="AES_NombreAES">
    </div>
    <div class="col-md-12">
      Nombre contacto
      <input type="text"class="form-control" id="AES_NombreContactoAES">
    </div>
    <div class="col-md-12">
      Numero
      <input type="text"class="form-control" id="AES_NumeroContactoAES">
    </div>
    <div class="col-md-12">
      Cobertura
      <select class="form-control" id="AES_CoberturaAES">
        <?php
            include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
            $query1 = $DBcon->query("SELECT idCobertura,Nombre from  cobertura;");
            echo'<option value="0">SELECCIONA UNA OPCIÓN</option>';
            while ($userRow2 = $query1->fetch_assoc()) {
                echo'<option value="'.$userRow2["idCobertura"].'">'.$userRow2["Nombre"].'</option>';
            }
            $DBcon->close();
        ?>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <input type="button" class="btn btn-primary" id="AES_AddAES_SaveAES" value="Guardar">
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function(){
    $('#AES_AddAES_SaveAES').click(function(){
      $('#AES_AddAES_SaveAES').attr('disabled','disabled');
      AES_AddNewAES();
    });
  });

  function AES_AddNewAES(){
    $.post("InsertaComponentes/AES/PHP/AddNewAES.php",
    {Nombre:$("#AES_NombreAES").val(), contacto:$("#AES_NombreContactoAES").val(),
    Numero:$("#AES_NumeroContactoAES").val(),idCobertura:$("#AES_CoberturaAES").val()},
    function(response){
        if(response == 1){
          alert("AES dado de alta correctamente");
          AES_GetAES();
          General_CloseModal();
        }
        else if(response == 0){
          alert("ya existe un AES con este nombre");
          $('#AES_AddAES_SaveAES').removeAttr('disabled');
        }
        else{
          alert("Error al registrar AES");
          $('#AES_AddAES_SaveAES').removeAttr('disabled');
        }
    });
  }
</script>
