<?php 

include("../views/metas.php"); 
include("config.php");
include("conexion.php");

if(isset($_POST['autor']) && !empty($_POST['autor']) &&
	isset($_POST['fecha']) && !empty($_POST['fecha']) &&
	isset($_POST['comentario']) && !empty($_POST['comentario']) &&
	isset($_POST['pub']) && !empty($_POST['pub']) 
	){


	$autor = $_POST['autor'];
$fecha = $_POST['fecha'];
$comentario = $_POST['comentario'];
$pub = $_POST['pub'];

$INSERTAR = "INSERT INTO COMENTARIOS(AUTOR_C,FECHA_C,CONTENIDO_C,PUBLICACION) VALUES($autor,'$fecha','$comentario',$pub)";

$registrar = mysqli_query($link,$INSERTAR);
echo "<div class='alert alert-success' role='alert'>¡Listo! Has comentado</div>";
header("Location:".$_SERVER['HTTP_REFERER']);
}else{
	echo "<script>alert('Debes llenar los campos indicados');</script>";
}
mysqli_close($link);
?>
<br/>
<a href="../views/profile.php" style="margin-left: 50px">Regresar a tu perfil</a>