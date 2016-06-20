<?php
include("../resources/metas.php"); 
include("conexion.php");

if(isset($_POST['titulo']) && !empty($_POST['titulo']) &&
	isset($_POST['autor']) && !empty($_POST['autor']) &&
	isset($_POST['fecha']) && !empty($_POST['fecha']) &&
	isset($_POST['tema']) && !empty($_POST['tema']) &&
	isset($_POST['color']) && !empty($_POST['color']) &&
	isset($_POST['contenido']) && !empty($_POST['contenido'])
	){
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$fecha = $_POST['fecha'];
$tema = $_POST['tema'];
$color = $_POST['color'];
$contenido = $_POST['contenido'];

$INSERTAR = "INSERT INTO ARTICULOS(TITULO,FECHA,AUTOR,CONTENIDO,TAGS,COLOR) VALUES('$titulo','$fecha',$autor,'$contenido','$tema','$color')";

$registrar = mysqli_query($link,$INSERTAR);
echo "<div class='alert alert-success' role='alert'>¡Listo! Tu articulo ya está dispobible en el <a href=../index.php?_rdr=home>Inicio</a></div>";
}


else{
	header("Location: ../views/178dadc3c9f87196fe2f1e1d7aae9f40cbc2c9a1.php");
	echo "<div class='alert alert-danger' role='alert'><strong>¡Error!</strong> No has llenado todos los campos</div>";
}


mysqli_close($link);
?>
<div class="col-md-12 col-sm-12 espacio-arriba center-block quitar-float text-center" id="principal">
	<img src="../resources/images/book-flat.png" alt="" class="imagen-book-principal animated bounceInDown" height="200px">
	<h1 class="pacifico grande carmin animated bounceInDown retraso-1">Dev145</h1>
</div>