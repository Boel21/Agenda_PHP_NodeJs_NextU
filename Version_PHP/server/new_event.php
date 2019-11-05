<?php
require('./conector.php');
session_start();

$con = new ConectorBD('localhost', 'root', '');
$response['conexion'] = $con->initConexion('mi_agenda_db');

if ($response['conexion'] == 'OK') {
	
	$data['titulo'] = '"'.$_POST['titulo'].'"';
    $data['fecha_inicio'] = '"'.$_POST['start_date'].'"';
    $data['fecha_fin'] = '"'.$_POST['end_date'].'"';
    $data['hora_inicio'] = '"'.$_POST['start_hour'].'"';
    $data['hora_fin'] = '"'.$_POST['end_hour'].'"'; 
    $data['todo_dia'] = '"'.$_POST['allDay'].'"';
    $data['fk_usuarios'] = '"'.$_SESSION['username'].'"';
    
    	$con->insertData('eventos',$data);
    	$response['msg'] = 'OK';

 	 }else {
   		 $response['msg'] = "No se pudo conectar a la Base de Datos, error al guardar el registro";
  	}


echo json_encode($response);


$con->cerrarConexion();

?>