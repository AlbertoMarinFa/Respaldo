<?php

include $_SERVER['DOCUMENT_ROOT'].'/RSP/PHP/Connection/dbconnect.php';
$query1 = $DBcon->query("SELECT idtipokit,Descripcion from cattipokit;");
$rowcount = mysqli_num_rows($query1);
if($rowcount != 0){
  $count = 1;
  while ($userRow1 = $query1->fetch_assoc()) {

   echo '</tr>
  <td style="font-size: 13px">'.$count.'</td>
  <td style="font-size: 13px">'.$userRow1["Descripcion"].'</td>
  <td style="font-size: 13px"><i onclick=\'Kit_DeleteKit('.$userRow1["idtipokit"].')\' class="fa fa-trash-alt" style="cursor:pointer;"></i></td>
  </tr>';
//$userRow1["idtipokit"]
  $count++;
  }
  while ($DBcon->more_results() && $DBcon->next_result());
}
else{
  echo 0;
}
$DBcon->close();
?>
