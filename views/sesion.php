<?php 
include("../resources/metas.php"); 
include("../config/config.php");
include("../config/conexion.php");
if(isset($_POST['correo']) && !empty($_POST['correo']) && isset($_POST['pass']) && !empty($_POST['pass'])){

	$correo = $_POST['correo'] ;
	$pass = $_POST['pass'] ;
	$entrarConsulta = "SELECT * FROM USUARIOS WHERE CORREO = '$correo' AND PASS = '$pass'";
	$entrar =  mysqli_query($link,$entrarConsulta);


//$row = mysqli_fetch_array($result)
	if($row = mysqli_fetch_array($entrar)){
		if($row['CORREO'] == $correo && $row['PASS'] == $pass){
			echo "Has entrado correctamente";
			 //Creamos sesión
			session_start();  
			$_SESSION['CORREO'] = $correo;  
			header("Location: profile.php");  
		}else{
			header("Location: ../index.php?_rdr=login");
		}
	}
	else{
			header("Location: ../index.php?_rdr=login");
		}
}else{
		echo "<div class='alert alert-danger' role='alert'><strong>¡Error!</strong> No has llenado todos los campos</div>";
		header("Location: ../index.php?_rdr=login");
	}

?>