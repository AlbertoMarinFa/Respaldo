<div class="container-fluid">
  <div class="col-md-12">
    <div class="col-md-8">
      Parte
      <select class="form-control" id="Parte_AddNewParte">
        <?php
            include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
            $query1 = $DBcon->query("SELECT idPartes, DescripcionParte from catpartes;;");
            echo'<option value="0">SELECCIONA UNA OPCIÓN</option>';
            while ($userRow2 = $query1->fetch_assoc()) {
                echo'<option value="'.$userRow2["idPartes"].'">'.$userRow2["DescripcionParte"].'</option>';
            }
            $DBcon->close();
        ?>
      </select>
    </div>
    <div class="col-md-4">
      <input type="button" class="btn btn-primary" onclick="Parte_AddNewParte();" value="Agregar" style="margin-top: 20px;">
    </div>
  </div>
  <br>
  <br>
  <div class="col-md-12" id="Parte_ListaPartesParte">

  </div>
  <br>
  <br>
  <div class="col-md-12 text-center">
    <input type="button" class="btn btn-primary" onclick="General_CloseModal();" id="Parte_AddParte_SaveParte" value="Terminar">
  </div>
</div>
<script type="text/javascript">

  function Parte_AddNewParte(){
    $.post("EquiposRespaldo/PHP/AddparteEquipo.php",
      {idEquipo:Conertura_DatosEquipoEditar.idEquipo ,
      idParte:$("#Parte_AddNewParte").val()
    },
      function(response){
        if(response == 1){
          alert("Parte dada de alta correctamente");
          Parte_GetListaPartesByParte();
        }
        else if(response == 0){
          alert("ya existe una parte con estos datos");
          $('#Parte_AddParte_SaveParte').removeAttr('disabled');
        }
        else{
          alert("Error al registrar Parte");
          $('#Parte_AddParte_SaveParte').removeAttr('disabled');
        }
    });
  }

  Parte_GetListaPartesByParte();
  function Parte_GetListaPartesByParte(){
      $.post("EquiposRespaldo/PHP/ListaPartesEquipo.php",
       {idEquipo :Conertura_DatosEquipoEditar.idEquipo },
      function(response){
        if(response != 0){
          var _HTMLtemp = "<table class=\"table\">" +
              "<thead>" +
              "<tr>" +
              "<th scope=\"col\">No. Parte</th>" +
              "<th scope=\"col\">parte</th>" +
              "</tr>" +
              "</thead>" +
              "<tbody>" +
              response +
               "</tbody></table>";
               //ParteS_div_KISTLIST
               $("#Parte_ListaPartesParte").html(_HTMLtemp);
               $('[data-toggle="tooltip"]').tooltip();
        }
        else {
         $("#Parte_ListaPartesParte").html("<div class='col-md-12'><img class='center-block' style='width: 250px;' src='images/sin-resultados.png'></div>");
       }
      });
  }

  function Parte_DeleteParte(idParte){
    $.confirm({
    title: '¿Desea eliminar el Parte?',
     content: '',
    buttons: {
        confirm: function () {
            Parte_DeletePartePost(idParte);
        },
        cancel: function () {

        }
      }
    });
  }

  function Parte_DeletePartePost(idParte){
    //$idTipoParte
    $.post("EquiposRespaldo/PHP/deleteEquipoParte.php", {idEquipoParte:idParte},
    function(response){
        if(response == 1){
          $.alert('Parte eliminado correctamente');
          Parte_GetListaPartesByParte();
        }
        else{
          $.alert('Error al eliminar Parte');
        }
    });
  }
</script>
