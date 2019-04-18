<div class="container-fluid">
  <div class="col-md-12">
    <input type="button" id="Equipo_AddNewEquipo" class="btn btn-primary" value="Nuevo equipo">
  </div>
  <br>
  <div class="col-md-12 text-center">
    <span class="text-primary" style="font-size: 30px;">Lista de equipos</span>
  </div>
  <div class="col-md-12">
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-search"></i>
        </span>
        <input type="text" placeholder="Buscar Equipo" class="form-control" id="Equipos_BuscaEquipos" />
    </div>
  </div>
  <br/><br/>
  <div class="col-md-12" id="Equipo_DIVListaEquipo">

  </div>
</div>
<script type="text/javascript">

$(document).ready(function(){
    $('#Equipos_BuscaEquipos').keyup(function(){
      clearTimeout($.data(this, 'timer'));
      var _Time = setTimeout(Equipo_GetEquipo, 2000);
      $(this).data('timer', _Time);
    });


  TokenInicio = localStorage.getItem("TokenInicio");
  if(!TokenInicio){
    $("#frmloginSesion").show();
    $("#wrapper").hide();
  }else{
    $("#wrapper").show();
    $("#frmloginSesion").hide();
    $("#divUserNamespan").text(TokenInicio);

    $.post("PHP/GetDatoSession.php",
    {Usuario: localStorage.getItem("TokenInicio")},
    function(response){
      var obj = JSON.parse(response);
      datosrespuesta = obj;
      Session_Userid = datosrespuesta.idUsuario;
      Session_Codtipousuario = datosrespuesta.codTipoUsuario;
      console.error("hola " +Session_Codtipousuario);
      if(Session_Codtipousuario){
        if(Session_Codtipousuario != "1"){
          $("#Equipo_AddNewEquipo").remove();
          $("#Menu_InsertaComponentes").remove();
        }
      }else{
        $("#Equipo_AddNewEquipo").remove();
        $("#Menu_InsertaComponentes").remove();
      }
    });

  }
});
Equipo_GetEquipo();

$('#Componetes_Apartado_Equipo').click(function(){
  $('#ContenedorGeneral').load("InsertaComponentes/index.html");
});

function Equipo_GetEquipo() {
    $.post("EquiposRespaldo/PHP/ListaEquipos.php",{Busqueda: $('#Equipos_BuscaEquipos').val()}, function(respuesta) {
        if (respuesta != '0') {
            var _HTMLtemp = "<table class=\"table table-hover\">" +
                "<thead>" +
                "<tr class='bg-primary'>" +
                "<th scope=\"col\">No. Equipo</th>" +
                "<th scope=\"col\">Serie</th>" +
                "<th scope=\"col\">Contacto</th>" +
                "<th scope=\"col\">Numero</th>" +
                "<th scope=\"col\">Disponible</th>" +
                "<th scope=\"col\">Modelo</th>" +
                "<th scope=\"col\">Cuenta</th>" +
                "<th scope=\"col\">EstatusEquipo</th>" +
                "<th scope=\"col\">AES</th>" +
                "<th scope=\"col\">Estado</th>" +
                "<th scope=\"col\">Municipio</th>" +
                "<th scope=\"col\">Modificar</th>" +
                "</tr>" +
                "</thead>" +
                "<tbody>" +
                respuesta +
                 "</tbody></table>";
                 //EquipoS_div_KISTLIST
                 $("#Equipo_DIVListaEquipo").html(_HTMLtemp);
                 $('[data-toggle="tooltip"]').tooltip();
        } else {
          $("#Equipo_DIVListaEquipo").html("<div class='col-md-12'><div class='col-md-4'></div><div class='col-md-4'><img style='margin-left: 130px;' src='images/sin-resultados.png'></div><div class='col-md-4'></div></div>");
        }

    });
}

$('#Equipo_AddNewEquipo').click(function(){
  General_OpenModalGeneral("Agregar Equipo", "EquiposRespaldo/AddEquipo.php");
});

function Equipo_DeleteEquipo(idEquipo){
  $.confirm({
  title: '¿Desea eliminar el Equipo?',
   content: '',
  buttons: {
      confirm: function () {
          Equipo_DeleteEquipoPost(idEquipo);
      },
      cancel: function () {

      }
    }
  });
}

function Equipo_DeleteEquipoPost(idEquipo){
  //$idTipoEquipo
  $.post("EquiposRespaldo/PHP/deleteEquipo.php", {idEquipo:idEquipo},
  function(response){
      if(response == 1){
        $.alert('Equipo eliminado correctamente');
        Equipo_GetEquipo();
      }
      else{
        $.alert('Error al eliminar Equipo');
      }
  });
}

var Conertura_DatosEquipoEditar = [];
function Equipo_ConfigurarEquipo(idEquipo, Serie){
  Conertura_DatosEquipoEditar = {
    idEquipo: idEquipo,
    Serie: Serie
  };

  General_OpenModalGeneral("Modificar Equipo", "EquiposRespaldo/Equipo_ConfiguraEquipo.php");
}

function Equipos_AddfiletoEquipo(){
  General_OpenModalGeneral("Agregar archivo", "EquiposRespaldo/UpdaloadFileEquipo.php");
}

var DatosCasoEditar = [];
function Equipo_RedireccionCasoEquipo(idEquipo, Serie){
  DatosCasoEditar = {
    idEquipo: idEquipo,
    Serie: Serie
  };
  window.location.href = '#!Caso?idEquipo=' + idEquipo + '&Serie=' + Serie;
}

function fncModalPartes(idEquipo){
  Conertura_DatosEquipoEditar = {
    idEquipo: idEquipo
  };
  General_OpenModalGeneral("Agregar archivo", "EquiposRespaldo/ConfigurarParteEquipo.php");
}
</script>
