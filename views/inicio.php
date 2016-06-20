<link rel="stylesheet" type="text/css" href="../resources/css/inicio.css">
<?php 

//creamos la sesion
session_start();
if(!isset($_SESSION['CORREO'])) 
{
	include("resources/barra-nav.php");
}else{
	include("resources/menu.php");
}

include("config/conexion.php");
?>
<div class="inicio-portada text-center">
	<br/>
	<h1>Aprende y Comparte tus conocimientos</h1><br/><br/>
	<div class="btn-group" role="group">
		<button type="button" class="btn btn-amarillo"><p>Únete ahora</p></button>
	</div><br/>
	<img src="resources/images/book-flat.png" alt="Book" class="logo-inicio-book">
</div>

<?php 

$sentenciaArticulos = 'SELECT * FROM ARTICULOS  ORDER BY ID_ARTICULO DESC LIMIT 10';
$resultadosArticulos = mysqli_query($link,$sentenciaArticulos);

$sentenciaAutor = 'SELECT USERNAME,COLOR FROM USUARIOS,ARTICULOS WHERE ID_USUARIO = AUTOR';
$resultadosAutor = mysqli_query($link,$sentenciaAutor);
$row2 = mysqli_fetch_array($resultadosAutor);



if($row2['COLOR'] == "azul fuerte"){
	echo "<style>.entradas-inicio .inicio-post .entrada .imagen{background-color: #2980B9;}</style>";
}else{
	if($row2['COLOR'] == "azul marino"){
		echo "<style>.entradas-inicio .inicio-post .entrada .imagen{background-color: #2C3E50;}</style>";
	}else{
		if($row2['COLOR'] == "azul ligero"){
			echo "<style>.entradas-inicio .inicio-post .entrada .imagen{background-color: #00B9E6;}</style>";
		}else{
			if($row2['COLOR'] == "carmin"){
				echo "<style>.entradas-inicio .inicio-post .entrada .imagen{background-color: #E74C3C;}</style>";
			}
		}
	}
}
?>
<div class="entradas-inicio quitar-float" id="entradas">
	<div class="inicio-post">
		<h1 class="text-center">Entradas recientes</h1>
		<?php
		while ($row = mysqli_fetch_array($resultadosArticulos)) {

			?>
			<div class="col-md-4 entrada quitar-float animated fadeInDown">
				<div class="imagen"><br/>
					<center><h3><a href=articulo.php?id_articulo=<?php echo $row['ID_ARTICULO']?>><?php echo $row['TITULO']; ?></a></h3></center>
				</div>
				<h6><?php  echo "Escrito por: "."<strong>".$row2['USERNAME']."</strong>";?></h6>
			</div>
			<?php }?>

			<!--<aside class="col-md-3 barra-nav-publicaciones">
				<center><h3 class="light">Temas</h3></center>
				<ul class="lista-tags">
					<?php 

					$tags = 'SELECT DISTINCT TAGS FROM ARTICULOS ORDER BY ID_ARTICULO DESC';
					$resultadostags = mysqli_query($link,$tags);
					while($row3 = mysqli_fetch_array($resultadostags)){
						#echo "<li class=light>- ".$row3['TAGS']."</li>";
					}
					?>
				</ul>
			</aside>-->
		</div>
	</div>

	<div class="footer">
		<h1 class="light pacifico text-center">Dev145</h1>
		<p class="light text-center">Copyright &copy 2016 - <?php echo date('Y'); ?></p>
		<p class="light des">En Dev145 aprende cosas nuevas cada día de diversos temas. Tenemos mucho por explorar ésto es solo un inicio</p><br/><br/>
		<p class="light">Powered by Juan Pablo Aranda H.</p>
	</div>