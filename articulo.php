<link rel="stylesheet" type="text/css" href="resources/css/articulos.css">
<?php
if(isset($_GET['id_articulo'])){

	$id = $_GET['id_articulo'];
}else{
	header("Location: index.php?_rdr=home");
}

include("config/conexion.php");
include("resources/metas.php");



//Consulta mysql
$articulo = "SELECT * FROM ARTICULOS WHERE ID_ARTICULO = $id";
$resultadosArticulos = mysqli_query($link,$articulo);
$autor = 'SELECT USERNAME FROM USUARIOS,ARTICULOS WHERE ID_USUARIO = AUTOR';
$autorR = mysqli_query($link,$autor);



//Mostrar información de mysql en a vista del usuario
$row = mysqli_fetch_array($resultadosArticulos);
$row2 = mysqli_fetch_array($autorR);
if($row['COLOR'] == "azul fuerte"){
	echo "<style>.jumbotron{background-color: #2980B9;}</style>";
}else{
	if($row['COLOR'] == "azul marino"){
		echo "<style>.jumbotron{background-color: #2C3E50;}</style>";
	}else{
		if($row['COLOR'] == "azul ligero"){
			echo "<style>.jumbotron{background-color: #00B9E6;}</style>";
		}else{
			if($row['COLOR'] == "carmin"){
				echo "<style>.jumbotron{background-color: #E74C3C;}</style>";
			}else{
				echo "<style>.jumbotron{background-color: #E74C3C;}</style>";
			}
		}
	}
}
?>
<title><?php echo $row['TITULO']; ?></title>
<?php 
include("resources/barra-nav.php");
echo "<div class=jumbotron portada-articulo>
<div class=container>
	<center><h1 style=color:#fff>$row[TITULO]</h1></center>
</div>
</div>";
echo "<div class='contenido col-md-8'>
<h3 class='gris'>$row[TITULO]</h3><br/>
<p>Tema: $row[TAGS]</p><br/><br/>
<p>$row[CONTENIDO]</p>
</div>";
?>
<aside class="col-md-3 barra-nav-publicaciones">
	<h3  class="light text-center"><?php echo "Escrito por: "."<h2 class='light text-center'>".$row2['USERNAME']."</h2>"."<br/>"; ?></h3>
	<h4 class="light text-center"><?php echo "Publicado el: <br/><br/>".$row['FECHA']; ?></h4>
</aside>