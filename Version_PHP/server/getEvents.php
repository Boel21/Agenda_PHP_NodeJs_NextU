<?php
require('./conector.php');
session_start();


if (isset($_SESSION['username'])) {
$con = new ConectorBD('localhost', 'root', '');
$response['conexion'] = $con->initConexion('mi_agenda_db');

if ($response['conexion'] == 'OK') {
  $resultado_consulta = $con->consultar(['eventos'],['*'], "WHERE fk_usuarios ='".$_SESSION['username']."'");

    $i=0;
    while ($fila = $resultado_consulta->fetch_assoc()){
      $response['eventos'][$i]['id']=$fila['id'];
      $response['eventos'][$i]['title']=$fila['titulo'];
      $response['eventos'][$i]['fk_usuarios']=$fila['fk_usuarios'];
      if ($fila['todo_dia'] == 0) {
        $todo_dia = false;
        $response['eventos'][$i]['start']=$fila['fecha_inicio'].' '.$fila['hora_inicio'];
        $response['eventos'][$i]['end']=$fila['fecha_fin'].' '.$fila['hora_fin'];
      }else {
        $todo_dia = true;
        $response['eventos'][$i]['start']=$fila['fecha_inicio'];
        $response['eventos'][$i]['end']="";
      }
      $response['eventos'][$i]['allDay']=$todo_dia;
      $i++;
    }
    $response['msg'] = "OK";
  }else {
    $response['msg'] = "No se pudo conectar a la Base de Datos";
  }
}else {
$response['msg'] = "No se ha iniciado una sesión";
}


echo json_encode($response);



$con->cerrarConexion();

 ?>
