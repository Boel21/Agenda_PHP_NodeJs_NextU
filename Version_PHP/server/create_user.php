<?php
require('./conector.php');
session_start();

$con = new ConectorBD('localhost', 'root', '');
$response['conexion'] = $con->initConexion('mi_agenda_db');

if ($response['conexion'] == 'OK') {

		/*$email_1 = "joelvergara@gmail.com";
		$nombre_1 = "Joel Vergara";
		$password_1 = password_hash('12345', PASSWORD_DEFAULT);
		$fecha_nacimiento_1 = "1988-09-21";
	
		$data['email'] = '"'.$email_1.'"';
    	$data['nombre'] = '"'.$nombre_1.'"';
    	$data['password'] = '"'.$password_1.'"';
    	$data['fecha_nacimiento'] = '"'.$fecha_nacimiento_1.'"';
    
    	$con->insertData('usuarios',$data);*//*inserta primer usuario, pero ya esta creado*/

    	$email_2 = "andreagonzalez@gmail.com";
		$nombre_2 = "Andrea Gonzalez";
		$password_2 = password_hash('54321', PASSWORD_DEFAULT);
		$fecha_nacimiento_2 = "1986-02-18";
	
		$data['email'] = '"'.$email_2.'"';
    	$data['nombre'] = '"'.$nombre_2.'"';
    	$data['password'] = '"'.$password_2.'"';
    	$data['fecha_nacimiento'] = '"'.$fecha_nacimiento_2.'"';
    
    	$con->insertData('usuarios',$data);//inserta segundo usuario

    	$email_3 = "noemi@gmail.com";
		$nombre_3 = "Noemi Vergara";
		$password_3 = password_hash('noemi123', PASSWORD_DEFAULT);
		$fecha_nacimiento_3 = "2016-08-26";
	
		$data['email'] = '"'.$email_3.'"';
    	$data['nombre'] = '"'.$nombre_3.'"';
    	$data['password'] = '"'.$password_3.'"';
    	$data['fecha_nacimiento'] = '"'.$fecha_nacimiento_3.'"';
    
    	$con->insertData('usuarios',$data);//inserta tercer usuario
	
    	$response['msg'] = 'OK';

 	 }else {
   		 $response['msg'] = "No se pudo conectar a la Base de Datos, error al guardar el registro";
  	}


echo json_encode($response);


$con->cerrarConexion();

?>




 ?>
