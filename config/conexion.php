<?php 

//conexion mysql con la aplicacion

$link = mysqli_connect("localhost","root","") or die("No se puedo conectar");
//echo "Conexion establecida";

mysqli_select_db($link,"DEV145") or die("No existe la BD");


//mysql_close($link);

 ?>