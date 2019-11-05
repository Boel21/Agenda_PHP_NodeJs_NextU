<?php
require('./conector.php');

$con = new ConectorBD('localhost', 'root', '');

$response['conexion'] = $con->initConexion('mi_agenda_db');

if ($response['conexion'] == 'OK') {

  $resultado_consulta = $con->consultar(['usuarios'], ['email', 'password'], 'WHERE email="'.$_POST['username'].'"');

  if ($resultado_consulta->num_rows != 0) {
        $fila = $resultado_consulta->fetch_assoc();
    if (password_verify($_POST['password'], $fila['password'])) {
        $response['msg'] = 'OK';
        session_start();
        $_SESSION['username'] = $fila['email'];
    }  else {
        $response['msg'] = 'Contraseña incorrecta';
    }
  } else {
      $response['msg'] = 'Email incorrecto';
  }
}

echo json_encode($response);

$con->cerrarConexion();
?>
