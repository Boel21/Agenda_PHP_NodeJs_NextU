<?php
require('./conector.php');

$con = new ConectorBD('localhost', 'root', '');
$response['conexion'] = $con->initConexion('mi_agenda_db');

if ($response['conexion'] == 'OK') {
  
    	$con->eliminarRegistro('eventos','id='.$_POST['id']);
    	$response['msg'] = 'OK';

 	 }else {
    $response['msg'] = "No se pudo conectar a la Base de Datos, error al eliminar el registro";
  	}

echo json_encode($response);


$con->cerrarConexion();

 ?>

