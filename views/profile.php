<?php 
include("metas.php"); 
include("../config/config.php");
include("../config/conexion.php");
include("../lib/menu-navegacion.php");



//creamos la sesion
session_start();
if(!isset($_SESSION['CORREO'])) 
{
	header('Location: ../index.php?_rdr=login'); 
	exit();
}else{
	$usuario = $_SESSION['CORREO'];
	$entrarConsulta = "SELECT * FROM USUARIOS WHERE CORREO = '$usuario'";
	$entrar =  mysqli_query($link,$entrarConsulta);
	while ($row = mysqli_fetch_array($entrar)) {
		echo "<title>Soy ".$row['USERNAME']."</title>";
	}
}

?>
<div class="row menu-fondo">
	<nav class="barra-menu">
		<div class="col-md-7" id="logo-menu"><a href="" class="grande pacifico light">Dev145</a></div>
		<div class="col-md-4" id="barra-menu"><a href="foro.php" class="home">Inicio</a>
			<a href="profile.php" class="perfil">Mi Perfil</a>
			<a href="logout.php" class="logout">Cerrar Sesión</a>
		</nav>
	</div>