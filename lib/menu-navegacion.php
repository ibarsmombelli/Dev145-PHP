<?php
/*
* @Autor Juan Pablo Aranda Hernandez
*/

//Libreria para menu de navegación

/* Configuración
*  manejo dinámico 
* control de las vistas
*/
$url = "";
if(isset($_GET["_rdr"]) && !empty($_GET["_rdr"])){
	$url = $_GET["_rdr"];
	
	switch($url){
		case "home":
		$titulo = "Dev145 | Un espacio para ti";
		$contenido = "views/inicio.php";
		break;
		
		case "signup":
		$titulo = "Dev145 | Crear una cuenta";
		$contenido = "views/signup.php";
		break;
		
		case "login":
		$titulo = "Dev145 | Iniciar sesion";
		$contenido = "views/login.php";
		break;
		
		default:
		$titulo = "Dev145 | Un espacio para ti";
		$contenido = "views/principal.php";
		break;
	}
}

?>