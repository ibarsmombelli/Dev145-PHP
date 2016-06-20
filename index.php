<?php include("config/config.php");
include("lib/menu-navegacion.php");?>
<?php include("config/conexion.php"); ?>
<!Doctype html>
<html lang="es">
<head>
	<title><?php if($url == true){echo $titulo;}else{echo "Dev145 | Un espacio para ti";}?></title>
	<?php include("resources/metas.php");?>
</head>
<body>
	<?php if($url == true){include($contenido);}else{include("views/principal.php");} ?>
</body>
</html>
