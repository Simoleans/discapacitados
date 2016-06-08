<?php
session_start();
if(isset($_SESSION['user'])!=1){
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
		<link rel="stylesheet" type="text/css" href="datepicker/css/datepicker.css">
		<link href="images/favicon.jpg" type="image/x-icon" rel="shortcut icon" >
		
		 <script type="text/javascript" src="js/jquery.js"></script>
       
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

	<title>Registro de Donacion</title>
	<body class="estil1">
	<section>
		<article>
			<a href="#"><img src="img/banner.png" id="Banner"></a>
		</article>
	</section>
	
	
			<nav id="Nav_per">
				<ul class="nav nav-pills" id="navegar">
				<li><a href="Reg_1.php">Registro</a></li>
                    <li><a href="Update_Reg1.php">Actualizacion</a></li>
					<li><a href="Buscar_usu.php">Buscar</a></li>
					<li class="active"><a href="reg_don.php">Registrar Donacion</a></li>
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
	
	<p class="top"><?php echo "Usuario: ".$_SESSION['user']; ?></p>
	<br>
	<section>
	<table class="table" id="Tabla_per" align="center">
		<form action="Modulo/Reg_don.php" method="post" enctype="multipart/form-data">
		<tr>
			
			</td>
			<td><label>Nombres</label><p>
				<input pattern="([a-zA-ZÁÉÍÓÚñáéíóú]{3,}[\s]*)+" required type="text" name="nombre" placeholder="Nombres">
			</td>
			<td><label>Apellidos</label><p>
				<input required type="text" pattern="([a-zA-ZÁÉÍÓÚñáéíóú]{3,}[\s]*)+" name="apellido" placeholder="Apellido...">
			</td>
			<td><label>Monto (bsf) o objetos a donar :</label><p>
				<input required type="text"  name="monto" placeholder="Monto">
			</td>
			<tr>
				
					<td><label>Descripcion</label><p>
				<textarea required name="descripcion" placeholder="Observacion"></textarea>
			</td>
			</tr>

			<center><td>
				<input type="submit" name="registrar" value="Registrar" class="btn btn-danger">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="reset" name="reiniciar" value="Reiniciar" class="btn btn-inverse">			
			</td></center>
			</td><td>
		</tr>
			</form>
			</html>
					
			