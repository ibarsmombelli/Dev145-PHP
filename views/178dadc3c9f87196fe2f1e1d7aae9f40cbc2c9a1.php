<style type="text/css">.autor{visibility: hidden;}</style>
<title>Publicar para Dev145</title>
<?php 
include("../config/conexion.php");
include("../resources/metas.php");
//creamos la sesion
session_start();
if(!isset($_SESSION['CORREO'])) 
{
	header('Location: ../index.php?_rdr=login'); 
	exit();
}else{

	$usuario = $_SESSION['CORREO'];
	$regConsulta = "SELECT * FROM USUARIOS WHERE CORREO = '$usuario'";
	$reg =  mysqli_query($link,$regConsulta);
	$row = mysqli_fetch_array($reg);


 ?>
 <div class="col-md-5 animated fadeInRight">
	<form class="form-signup" action="../config/registroArticulo.php" method="POST">
		<h2>Crear un articulo</h2>
		<input type="text" class="form-control" placeholder="Titulo" aria-describedby="basic-addon1" name="titulo"><br/>
		<input type="text" class="form-control autor" placeholder="Autor" aria-describedby="basic-addon1" name="autor" value="<?php echo $row['ID_USUARIO'];?>"><br/>
		<input type="text" class="form-control" placeholder="Fecha" aria-describedby="basic-addon1" name="fecha"><br/>
		<input type="text" class="form-control" placeholder="Tema" aria-describedby="basic-addon1" name="tema"><br/>
		<input type="text" class="form-control" placeholder="Color" aria-describedby="basic-addon1" name="color"><br/>
		<textarea type="text" class="form-control" placeholder="Contenido" name="contenido" style="height:300px;text-align:top"></textarea><br/>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
	</form>
</div>

<?php 
}
?>