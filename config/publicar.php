<?php 

include("../views/metas.php"); 
include("config.php");
include("conexion.php");

if(isset($_POST['autor']) && !empty($_POST['autor']) &&
	isset($_POST['fecha']) && !empty($_POST['fecha']) &&
	isset($_POST['contenido']) && !empty($_POST['contenido']) 
	){


$autor = $_POST['autor'];
$fecha = $_POST['fecha'];
$contenido = $_POST['contenido'];

$INSERTAR = "INSERT INTO PUBLICACIONES(AUTOR,FECHA,CONTENIDO) VALUES($autor,'$fecha','$contenido')";

$registrar = mysqli_query($link,$INSERTAR);
echo "<div class='alert alert-success' role='alert'>¡Listo! Publicado</div>";
header("Location: ../views/profile.php");
}else{
	echo "<script>alert('Debes llenar los campos indicados');</script>";
}
mysqli_close($link);
?>
<br/>
<a href="../views/profile.php" style="margin-left: 50px">Regresar a tu perfil</a>