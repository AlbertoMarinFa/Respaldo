$.urlParam = function (name) { var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href); if (results == null) { return null; } else { return results[1] || 0; } }

$(document).ready(function(){
  //$('#ContenedorGeneral').load("EquiposRespaldo/index.php");
  
});

function fnLoginPH(){
  var _ValorUser=$("#usuario").val();
  var _ValorContra=$("#password").val();
  var _CountErrores=0;
  if($("#usuario").val() == ""){
    $("#frmHP_divErrorUser").addClass("has-error");
    $("#usuario").keypress(function(){
      $("#frmHP_divErrorUser").removeClass("has-error");
    });
    _CountErrores++;
  }
  if($("#password").val() == ""){
    $("#frmHP_divErrorPass").addClass("has-error");
    $("#password").keypress(function(){
      $("#frmHP_divErrorPass").removeClass("has-error");
    });
    _CountErrores++;
  }
  if(_CountErrores==0){
    $("#frmloginSesion").hide(500);
    $("#wrapper").show(500);
  }else{
    Notificacion_error("Error", "Llenar los datos faltantes", "","fa fa-times" );
  }
}

$('#Menu_EquipoRespaldo').click(function(){
    window.location.href = '#!';
});

$('#Menu_InsertaComponentes').click(function(){
  window.location.href = '#!Componentes';
});

function General_OpenModalGeneral(Title,body){
    $('#ModalGeneral_TituloModalGeneral').text(Title);
    $('#ModalGeneral_ModalBodyGeneral').load(body);
    $('#exampleModalLong').show();
}

function General_CloseModal(){
    $('#exampleModalLong').hide();
}

function CreateGuid() {
   function _p8(s) {
      var p = (Math.random().toString(16)+"000000000").substr(2,8);
      return s ? "-" + p.substr(0,4) + "-" + p.substr(4,4) : p ;
   }
   return _p8() + _p8(true) + _p8(true) + _p8();
}
