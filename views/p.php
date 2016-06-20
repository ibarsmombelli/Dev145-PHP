<link rel="stylesheet" type="text/css" href="../resources/css/p.css">

<div class="row menu-fondo"> <nav class="barra-menu"> <div class="col-md-7" id="logo-menu"><a href="" class="grande pacifico light">Dev145</a></div> <div class="col-md-4" id="barra-menu"> <a href="../index.php?_rdr=home" class="home">Inicio</a> <a href="foro.php" class="foro">Foro</a> <a href="profile.php" class="perfil">Mi Perfil</a> <a href="logout.php" class="logout">Cerrar Sesión</a> </nav> </div> <?php
if(isset($_GET['id_p'])){

	$id = $_GET['id_p'];
}else{
	header("Location: ../index.php?_rdr=home");
}

include("../config/conexion.php");
include("metas.php");


session_start();
if(!isset($_SESSION['CORREO'])) 
{
	header('Location: ../index.php?_rdr=login'); 
	exit();
}else{

//Consulta mysql
	$Publicaciones = "SELECT * FROM PUBLICACIONES WHERE ID_P = $id";
	$resultadosP = mysqli_query($link,$Publicaciones);

	$autor = "SELECT USERNAME FROM USUARIOS,PUBLICACIONES WHERE AUTOR = ID_USUARIO AND ID_P = $id";
	$autorR = mysqli_query($link,$autor);

	$row = mysqli_fetch_array($resultadosP);
	$row2 = mysqli_fetch_array($autorR);

	//Comentarios
	//$sentenciaAutor = 'SELECT USERNAME,COLOR FROM USUARIOS,ARTICULOS WHERE ID_USUARIO = AUTOR';



	//$id = $_GET['id_p'];
	$Comentarios = "SELECT * FROM USUARIOS,COMENTARIOS WHERE PUBLICACION = $id AND AUTOR_C = ID_USUARIO ORDER BY ID_C DESC";
	$ComentariosR = mysqli_query($link,$Comentarios);

}
echo "<title>$row2[USERNAME]</title>
<div class='contenido col-md-8'>
	<h3 class='gris'>$row2[USERNAME]</h3>
	<p>Tema: $row[FECHA]</p>
	<p>$row[CONTENIDO]</p>
</div>";

$usuario = $_SESSION['CORREO'];
$entrarConsulta = "SELECT * FROM USUARIOS WHERE CORREO = '$usuario'";
$entrar =  mysqli_query($link,$entrarConsulta);
$rowA = mysqli_fetch_array($entrar);
$ID_USUARIO = $rowA['ID_USUARIO'];

?>
<div class="col-md-12">
	<h1 class="pacifico">Comentarios</h1>
	<div class="col-md-6">
		<ul>
			<?php 
			while($row3 = mysqli_fetch_array($ComentariosR)){

				?>
				<li><?php echo $row3['USERNAME']."<br/>".$row3['FECHA_C']."<br/>".$row3['CONTENIDO_C'];?></li><br/>

				<?php }?>
			</ul>
		</div>
	</div>
	<div class="publicaciones-form col-md-4">
		<form class="form-pub" action="../config/comentar.php" method="POST">
			<textarea type="text" class="form-control" placeholder="Escribe tu aportación o contribución" name="comentario" style="height:150px;text-align:top"></textarea><br/>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Publicar</button>
			<input type="text" class="form-control autor" placeholder="Autor" aria-describedby="basic-addon1" name="autor" value="<?php echo $rowA['ID_USUARIO'];?>"><br/>
			<input type="text" class="form-control fecha" placeholder="Fecha" aria-describedby="basic-addon1" name="fecha" value="<?php echo date('Y-m-d');?>"><br/>
			<input type="text" class="form-control pub" placeholder="Publicacion" aria-describedby="basic-addon1" name="pub" value="<?php echo $id;?>">
		</form><br/>
	</div>
