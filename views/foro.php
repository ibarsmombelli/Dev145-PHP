<link rel="stylesheet" type="text/css" href="../resources/css/foro.css">
<?php
include("metas.php"); 
include("../config/config.php");
include("../config/conexion.php");
include("../lib/menu-navegacion.php");


session_start();
if(!isset($_SESSION['CORREO'])) 
{
	header('Location: ../index.php?_rdr=login'); 
	exit();
}else{

	$usuario = $_SESSION['CORREO'];
	$entrarConsulta = "SELECT * FROM USUARIOS WHERE CORREO = '$usuario'";
	$entrar =  mysqli_query($link,$entrarConsulta);
	$row2 = mysqli_fetch_array($entrar);

	$usuario = $_SESSION['CORREO'];
	$entrarConsulta = "SELECT * FROM USUARIOS WHERE CORREO = '$usuario'";
	$entrar =  mysqli_query($link,$entrarConsulta);
	while ($row = mysqli_fetch_array($entrar)) {
		echo "<title>".$row['USERNAME']." | Foro Dev145</title>";
	}
}



$publicaciones = "SELECT * FROM PUBLICACIONES,USUARIOS WHERE AUTOR = ID_USUARIO ORDER BY ID_P DESC";
$publicacionesR = mysqli_query($link,$publicaciones);

?>
<div class="row menu-fondo">
	<nav class="barra-menu">
		<div class="col-md-7" id="logo-menu"><a href="" class="grande pacifico light">Dev145</a></div>
		<div class="col-md-4" id="barra-menu">
			<a href="../index.php?_rdr=home" class="home">Inicio</a>
			<a href="foro.php" class="foro">Foro</a>
			<a href="profile.php" class="perfil">Mi Perfil</a>
			<a href="logout.php" class="logout">Cerrar Sesión</a>
		</nav>
	</div>

	<div class="pub quitar-float">
		<?php 
		while($row3 = mysqli_fetch_array($publicacionesR)){
			?>
			<div class="publicacions-res col-md-6">
				<p><strong><?php echo $row3['USERNAME']?></strong></p>
				<p>Publicado el: <?php echo $row3['FECHA'];?></p>
				<p><?php echo $row3['CONTENIDO'];?></p><br/>
				<a href="p.php?id_p=<?php echo $row3['ID_P'];?>">Comentar</a>
			</div>
			<?php }?>
		</div>