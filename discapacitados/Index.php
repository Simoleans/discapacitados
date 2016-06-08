<?php
session_start();
session_destroy();
$m="";

if(isset($_GET['m'])){
	$m="<p style='color: red;'>Datos incorrectos</p>";
}

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
		<link rel="stylesheet" type="text/js" href="js/bootstrap.js">
        <link rel="stylesheet" type="text/js" href="js/bootstrap.min.js">
	<style type="text/css">
		.nav-pills > .active > a,
		.nav-pills > .active > a:hover,
		.nav-pills > .active > a:focus {
  		color: #ffffff;
  		background-color: #bd362f;

		}
		.nav > li > a:hover,
		.nav > li > a:focus {
		  text-decoration: none;
		  background-color: #000000;
		}
	</style>
	</head>
		<title>Inicio</title>
	<body class="estil1">
	<section>
		<article>
			<a href="#"><img src="img/banner.png" id="Banner"></a>
		</article>
	</section>
	
	<section id="Nav_per">
		<header>
			<nav id="Nav_per">
				<div class="letras"><b>ALCALDIA BOLIVARIANA DEL MUNICIPIO SUCRE</b><p><p>
				<b>SISTEMA DE INFORMACION </b><P>
				<b> "DISCAPACITADOS"</b></div>

				<ul class="nav nav-pills">
					<li><a href="index.php"></a></li>
				</ul>
			</nav>
		</header>
	</section>
	<h3>Iniciar Sesion</h3>
	<?php echo $m; ?>
	<br>
	<section>
		<table class="table" id="Tabla_Usu" align="center">
		<form class="form-horizontal" action="login.php" method="post">
	 	<tr>
			<td>
			    <label>Cedula</label>
			    <input type="text" id="inputEmail" placeholder="Cedula" name="cedula">
			</td>
		</tr>
		<tr>	
			<td>
			    <label>Clave</label>
			    <input type="password" id="inputPassword" placeholder="Contraseña" name="clave">
			</td>
		</tr>
		<tr>	
			<td>
			    <label class="checkbox">Recordar
                <input type="checkbox"></label> 
			</td>
		</tr>
        <tr>	
			<td>&nbsp;&nbsp;&nbsp;&nbsp;
			     <input type="submit" class="btn btn-danger" value="Entrar">
                 &nbsp;&nbsp;&nbsp;
                  <input type="reset" class="btn btn-inverse" value="Borrar">
             </td>
		</tr>	
		</form>
		</table>
	</section>
	</body>
</html>
