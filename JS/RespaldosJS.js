$.urlParam = function (name) { var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href); if (results == null) { return null; } else { return results[1] || 0; } }

$(document).ready(function(){
  //$('#ContenedorGeneral').load("EquiposRespaldo/index.php");
});

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
