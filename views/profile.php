<link rel="stylesheet" type="text/css" href="../resources/css/profile.css">
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
	$row = mysqli_fetch_array($entrar);

	echo "<title>Soy ".$row['USERNAME']."</title>";
	$ID_USUARIO = $row['ID_USUARIO'];
	$contadorArticulos = "SELECT COUNT(*) FROM ARTICULOS WHERE AUTOR = $ID_USUARIO ";
	$contadorArticulosR = mysqli_query($link,$contadorArticulos);
	$row2 = mysqli_fetch_array($contadorArticulosR);



	$publicaciones = "SELECT * FROM PUBLICACIONES,USUARIOS WHERE AUTOR = ID_USUARIO AND AUTOR = $ID_USUARIO ORDER BY ID_P DESC";
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
		<div class="p-usuario"><br/><br/><br/><br/>
			<div class="p-usuario-texto">
				<p><?php echo "Usuario: "."<strong>".$row['USERNAME']."</strong>"."<br/>"."Correo: ".$row['CORREO']; ?></p>
				<p><?php echo "Articulos: ".$row2[0]; }?></p>
				<?php 
				if($row['CORREO'] == "dev145@outlook.com" && $row['PASS'] == "Qsjr94205321")
					echo "<center><button class='btn btn-success'><a href='178dadc3c9f87196fe2f1e1d7aae9f40cbc2c9a1.php' class='light blanco' style='text-decoration:none'>Crear Articulo</a></button></center>"?>
			</div>
		</div>
		<br/><br/>

		<div class="publicaciones-form col-md-4">
			<form class="form-pub" action="../config/publicar.php" method="POST">
				<textarea type="text" class="form-control" placeholder="Escribe tu pregunta, aportación o contribución" name="contenido" style="height:300px;text-align:top"></textarea><br/>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Publicar</button>
				<input type="text" class="form-control autor" placeholder="Autor" aria-describedby="basic-addon1" name="autor" value="<?php echo $row['ID_USUARIO'];?>"><br/>
				<input type="text" class="form-control fecha" placeholder="Fecha" aria-describedby="basic-addon1" name="fecha" value="<?php echo date('Y-m-d')?>"><br/>
			</form><br/>
		</div>



		<div class="pub quitar-float">
			<?php 
			while($row3 = mysqli_fetch_array($publicacionesR)){
				?>
				<div class="publicacions-res col-md-6">
					<p><strong><?php echo $row3['USERNAME']?></strong></p>
					<p>Publicado el: <?php echo $row3['FECHA'];?></p>
					<p><?php echo $row3['CONTENIDO'];?></p>
					<a href="p.php?id_p=<?php echo $row3['ID_P'];?>">Comentar</a>
				</div>
				<?php }?>
			</div>