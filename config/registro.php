<?php
include("../resources/metas.php"); 
include("conexion.php");
if(isset($_POST['nombre']) && !empty($_POST['nombre']) &&
	isset($_POST['username']) && !empty($_POST['username']) &&
	isset($_POST['correo']) && !empty($_POST['correo']) &&
	isset($_POST['pass']) && !empty($_POST['pass'])){
$nombre = $_POST['nombre'];
$username = $_POST['username'];
$correo = $_POST['correo'];
$pass = $_POST['pass'];

$INSERTAR = "INSERT INTO USUARIOS(NOMBRE,USERNAME,CORREO,PASS) VALUES('$nombre','$username','$correo','$pass')";

$registrar = mysqli_query($link,$INSERTAR);
echo "<div class='alert alert-success' role='alert'>¡Listo! Te has registrado con éxito ya puedes iniciar sesión</div>";
}else{
	header("Location: ../index.php?_rdr=signup");
	echo "<div class='alert alert-danger' role='alert'><strong>¡Error!</strong> No has llenado todos los campos</div>";
}
mysqli_close($link);
?>
<div class="col-md-12 col-sm-12 espacio-arriba center-block quitar-float text-center" id="principal">
	<img src="../resources/images/book-flat.png" alt="" class="imagen-book-principal animated bounceInDown" height="200px">
	<h1 class="pacifico grande carmin animated bounceInDown retraso-1">Dev145</h1>
</div>