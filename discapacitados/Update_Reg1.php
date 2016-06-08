<?php

session_start();
$m="";
	if(isset($_GET['g'])){
		$m= "<h1>Bienvenido ".$_SESSION['user']."</h1>";
	}
$t="";

if(isset($_GET['error'])){
	$t="<p style='color: red;'>Datos incorrectos o la persona no esta registrada</p>";
}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/propio.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
        <link rel="stylesheet" type="text/css" href="css2/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css2/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css2/bootstrap-responsive.css">
		<link href="images/favicon.jpg" type="image/x-icon" rel="shortcut icon" >
	
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

		<title>Actualizacion de Datos</title>
	<body class="estil1">
	<section>
		<article>
			<a href="#"><img src="img/banner.png" id="Banner"></a>
		</article>
	</section>
	
	
			<nav id="Nav_per">
				<ul class="nav nav-pills" id="navegar">
				<li><a href="Reg_1.php">Registro</a></li>
                    <li class="active"><a href="Update_Reg1.php">Actualizacion</a></li>
					<li><a href="Buscar_usu.php">Buscar</a></li>
					<li><a href="reg_don.php">Registrar Donacion</a></li>
					<li><a href="Modulo/bus_donacion.php">Ver Donaciones</a></li>
					<li><a href='Modulo/busqueda_general.php'>Busqueda General</a></li>
					<?php if(isset($_SESSION['user'])){
								if($_SESSION['nivel']==='a' || $_SESSION['nivel']==='A'){
									echo "<li><a href='Reg_Usuario.php'>Registrar Trabajadores</a></li>
										  <li><a href='bus_usu.php'>Trabajadores</a></li>";
										  
								}
								echo "<li><a href='logout.php'>Cerrar Sesion</a></li>";
							}
					?>
				</ul>
			</nav>
	<hgroup><h3 align="center">Insertar cedula para buscar usuario</h3></hgroup>
	<br>
	<?php echo $t; ?>
	
	<p><?php echo "Usuario: ".$_SESSION['user']; ?></p>
	<br>
	
	<section>
	<table class="table" id="Tabla_per2" align="center">
		<form action="Modulo/Update_Reg2.php" method="POST">
		<tr>
			<td><label>Insertar Cedula</label>
				<input  pattern="[0-9]{6,8}" required="required" type="text" name="cedula" placeholder="12345678" autofocus>
			</td>
			<td><br>
				<input type="submit" name="buscar" value="Buscar" class="btn btn-Primary">
			</td>
		</tr>	
		</form>
	</table>
	</section>
	</body>
</html>