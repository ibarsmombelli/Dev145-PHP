<?php 

//creamos la sesion
session_start();
if(!isset($_SESSION['CORREO'])) 
{
	include("resources/barra-nav.php");
}else{
	include("resources/menu.php");
	header("Location: views/profile.php");
}

?><br/>
<div class="col-md-5 animated fadeInRight">
	<form class="form-signup" action="views/sesion.php" method="POST">
		<h2>Iniciar sesión</h2>
		<input type="email" class="form-control" placeholder="Correo Electronico" aria-describedby="basic-addon1" name="correo"><br/>
		<input type="password" class="form-control" placeholder="Contraseña" aria-describedby="basic-addon1" name="pass"><br/>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
	</form>
</div>