<?php
session_start();
	if($_SESSION['nivel']!='a'){
	header('location: index.php');
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
        <link href="images/favicon.jpg" type="image/x-icon" rel="shortcut icon" />
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
		<title>Registro de Adulto Mayor</title>
	<body class="estil1">
	
	<article>
			<a href="#"><img src="img/banner.png" id="Banner"></a>
		</article>
	</section>
	
	
			<nav id="Nav_per">
				<ul class="nav nav-pills" id="navegar">
				<li><a href="Reg_1.php">Registro</a></li>
                    <li><a href="Update_Reg1.php">Actualizacion</a></li>
					<li><a href="Buscar_usu.php">Buscar</a></li>
					<li><a href="reg_don.php">Registrar Donacion</a></li>
					<li><a href="Modulo/bus_donacion.php">Ver Donaciones</a></li>
					<li><a href='Modulo/busqueda_general.php'>Busqueda General</a></li>
					<?php if(isset($_SESSION['user'])){
								if($_SESSION['nivel']==='a' || $_SESSION['nivel']==='A'){
									echo "<li class='active'><a href='Reg_Usuario.php'>Registrar Trabajadores</a></li>
										  <li><a href='bus_usu.php'>Trabajadores</a></li>";
										  
								}
								echo "<li><a href='logout.php'>Cerrar Sesion</a></li>";
							}
					?>
				</ul>
			</nav>
		
	<br>

	<p><?php echo "Usuario: ".$_SESSION['user']; ?></p>
	<br>
	<section>
	<center><table class="table" id="Tabla_per" align="center">
		<form action="Modulo/Reg_Usu.php" method="post">
		<tr>
			<td><label>Cedula (Usuario)</label><p>
				
				<input required type="text" pattern="[0-9]{6,8}" name="cedula" placeholder="Formato 12345678"  autofocus>
			</td>
			<td><label>Nombres</label><p>
				<input required pattern="([a-zA-ZÁÉÍÓÚñáéíóú]{3,}[\s]*)+" type="text" name="nombre" placeholder="Nombres...">
			</td>
			<td><label>Apellidos</label><p>
				<input required type="text" pattern="([a-zA-ZÁÉÍÓÚñáéíóú]{3,}[\s]*)+" name="apellido" placeholder="Apellidos...">
			</td>
		</tr>

							
			
			
			
			<td><label>Contraseña</label><p>
				<input required type="password"  pattern="[0-9]{6,8}" name="contraseña" placeholder="Solo numeros , entre 6 a 8 digitos">
			<td><label>Repita Contraseña</label><p>
				<input required type="password"  pattern="[0-9]{6,8}" name="repetir" placeholder="Solo numeros , entre 6 a 8 digitos">
		</tr>	
		
		<td>&nbsp;</td>

			<center><td>
				<input type="submit" name="registrar" value="Registrar" class="btn btn-danger">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="reset" name="reiniciar" value="Reiniciar" class="btn btn-inverse">			
			</td></center>
			</td><td>
		</tr>
		</form>
		
	</table></center>
	</section>
	</body>
</html>