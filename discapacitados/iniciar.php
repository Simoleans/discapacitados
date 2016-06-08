<?php
session_start();
if(isset($_SESSION['user'])!=1){
	header('location: index.php');
}


$m="";
	if(isset($_GET['g'])){
		$m= "<h1>Bienvenido(a): ".$_SESSION['user']."</h1>";
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
       
        <script src="js/shortcut.js"></script>
    <script type="text/javascript">
      
 
      shortcut.add("Ctrl+G", function () {
        alert("DESARROLLADO POR FRANCISCO HERNANDEZ ; C.I 20990397 ; CONTACTO 04166863625");
      }, {
        "type": "keydown",
        "propagate": true,
        "target": document
      });
    </script>
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
	
	
		<header>
			
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
									echo "<li><a href='Reg_Usuario.php'>Registrar Trabajadores</a></li>
										  <li><a href='bus_usu.php'>Trabajadores</a></li>";
										  
								}
								echo "<li><a href='logout.php'>Cerrar Sesion</a></li>";
							}
					?>
				</ul>
			</nav>
		</header>
	</section>
		
	
<?php echo $m; ?>
	
	<br>
	<section>
		<table class="table"  align="center">
		<img class="imginicio" >
	 	<tr>
			
		</tr>
        
		</form>
		</table>
	</section>
	</body>
</html>
