<?php

	include("../../../wp-load.php");
	
	unset($_POST['submit']);
	unset($_POST['deposito']);
	
	foreach($_POST as $nombre_campo => $valor){
		if($valor){
			$asignacion .= ucfirst(str_replace("_"," ",$nombre_campo)) . ": " . $valor . "<br />";
		}else{
			$asignacion .= ucfirst(str_replace("_"," ",$nombre_campo)) . ": No definido<br />";
		}
	}
	$headers = "MIME-Version: 1.0\n" ;
	$headers .= "Content-type: text/html; charset=utf-8\n";
	$headers .= "From: Beggia\n";
	
	//mail('mail@marceloferreiro.com','Formulario de Reserva',$asignacion, $headers);
	mail(get_option('admin_email'),'Formulario de Reserva',$asignacion, $headers);
	
	header('Location: '.get_bloginfo('url').'/reserva-ok/');

?>