<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      No. serie
      <input type="text"class="form-control" id="Equipo_NoSerieEquipo">
    </div>
    <div class="col-md-6">
      Nombre contacto
      <input type="text" class="form-control" id="Equipo_NombreContacto required onkeypress="return soloLetras(event);" onKeyUp="this.value = this.value.toUpperCase();">
    </div>
    <div class="col-md-6">
      Numero contacto
      <input type="text" class="form-control" id="Equipo_NumeroContacto" required onKeyPress="return SoloNumeros(event);">
    </div>
    <div class="col-md-12">
      Disponible
      <select class="form-control" id="Equipo_IsDisponibleEquipo">
        <option value="">SELECCIONA UNA OPCIÓN</option>
        <option value="1">Disponible</option>
        <option value="0">No disponible</option>
      </select>
    </div>
    <div class="col-md-12">
      Modelo Equipo
      <select class="form-control" id="Equipo_ModeloEquipo">
        <?php
            include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
            $query1 = $DBcon->query("SELECT idModelo,Descripcion Modelo from modelo;");
            echo'<option value="0">SELECCIONA UNA OPCIÓN</option>';
            while ($userRow2 = $query1->fetch_assoc()) {
                echo'<option value="'.$userRow2["idModelo"].'">'.$userRow2["Modelo"].'</option>';
            }
            $DBcon->close();
        ?>
      </select>
    </div>
    <div class="col-md-12">
      Cueta Equipo
      <select class="form-control" id="Equipo_CuentaEquipo">
        <?php
            include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
            $query1 = $DBcon->query("SELECT idCuenta,NombreCuenta Cuenta from cuenta;");
            echo'<option value="0">SELECCIONA UNA OPCIÓN</option>';
            while ($userRow2 = $query1->fetch_assoc()) {
                echo'<option value="'.$userRow2["idCuenta"].'">'.$userRow2["Cuenta"].'</option>';
            }
            $DBcon->close();
        ?>
      </select>
    </div>
    <div class="col-md-12">
      Estado Equipo
      <select class="form-control" id="Equipo_EstatusEquipo">
        <?php
            include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
            $query1 = $DBcon->query("SELECT idEstadoEquipo,Descripcion Estado from catestadoequipo;");
            echo'<option value="0">SELECCIONA UNA OPCIÓN</option>';
            while ($userRow2 = $query1->fetch_assoc()) {
                echo'<option value="'.$userRow2["idEstadoEquipo"].'">'.$userRow2["Estado"].'</option>';
            }
            $DBcon->close();
        ?>
      </select>
    </div>
    <div class="col-md-12">
      AES Equipo
      <select class="form-control" id="Equipo_AESEquipo">
        <?php
            include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
            $query1 = $DBcon->query("SELECT idAES,Nombre AES from aes;");
            echo'<option value="0">SELECCIONA UNA OPCIÓN</option>';
            while ($userRow2 = $query1->fetch_assoc()) {
                echo'<option value="'.$userRow2["idAES"].'">'.$userRow2["AES"].'</option>';
            }
            $DBcon->close();
        ?>
      </select>
    </div>
    <div class="col-md-6">
      Estado
      <select class="form-control" onchange="fncGetMunicipiosByEstado()" id="Equipo_EstadoUbicacionEquipo">
        <?php
            include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
            $query1 = $DBcon->query("SELECT idEstado,estado from estados;");
            echo'<option value="0">SELECCIONA UNA OPCIÓN</option>';
            while ($userRow2 = $query1->fetch_assoc()) {
                echo'<option value="'.$userRow2["idEstado"].'">'.$userRow2["estado"].'</option>';
            }
            $DBcon->close();
        ?>
      </select>
    </div>
    <div class="col-md-6">
      Municipio
      <select class="form-control" id="Equipo_MunicipioEquipo">

      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <input type="button" class="btn btn-primary" id="Equipo_AddEquipo_SaveEquipo" value="Guardar">
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function(){
    $('#Equipo_AddEquipo_SaveEquipo').click(function(){
      $('#Equipo_AddEquipo_SaveEquipo').attr('disabled','disabled');
      Equipo_AddNewEquipo();
    });
  });

  function Equipo_AddNewEquipo(){
    $.post("EquiposRespaldo/PHP/AddNewEquipo.php",
    {Serie:$("#Equipo_NoSerieEquipo").val(),
    IsDisponible:$("#Equipo_IsDisponibleEquipo").val(),
    idModelo:$("#Equipo_ModeloEquipo").val(),
    idCuenta:$("#Equipo_CuentaEquipo").val(),
    idEstadoEquipo:$("#Equipo_EstatusEquipo").val(),
    idAES:$("#Equipo_AESEquipo").val(),
    idEstado:$("#Equipo_EstadoUbicacionEquipo").val(),
    idMunicipio:$("#Equipo_MunicipioEquipo").val(),
    Contacto:$("#Equipo_NombreContacto").val(),
    Numero:$("#Equipo_NumeroContacto").val(),
  },
    function(response){
        if(response == 1){
          alert("Equipo dado de alta correctamente");
          Equipo_GetEquipo();
          General_CloseModal();
        }
        else if(response == 0){
          alert("ya existe un Equipo con estos datos");
          $('#Equipo_AddEquipo_SaveEquipo').removeAttr('disabled');
        }
        else{
          alert("Error al registrar Equipo");
          $('#Equipo_AddEquipo_SaveEquipo').removeAttr('disabled');
        }
    });
  }

  function fncGetMunicipiosByEstado(){
      _estado = $("#Equipo_EstadoUbicacionEquipo").val();

      $.post("EquiposRespaldo/PHP/GetListaMunicipios.php", {idEstado:_estado},
      function(response){
          $('#Equipo_MunicipioEquipo').html(response);
      });
  }

  function SoloNumeros(evt){
 if(window.event){//asignamos el valor de la tecla a keynum
  keynum = evt.keyCode; //IE
 }
 else{
  keynum = evt.which; //FF
 } 
 //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
 if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
  return true;
 }
 else{
  return false;
 }
}
function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
    especiales = [8, 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial){
alert('Tecla no aceptada');
        return false;
      }
}
</script>
