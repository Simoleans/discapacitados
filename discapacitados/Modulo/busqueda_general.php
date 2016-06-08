<?php
session_start();
if(isset($_SESSION['user'])!=1){
	header('location: index.php');
}
$m="";
	if(isset($_GET['g'])){
		$m= "<h1>Bienvenido ".$_SESSION['user']."</h1>";
	}
include ("../CDB.php");

/*---TRAER TODO---*/

$sql = "SELECT * FROM reg_discapacitado ";

/*-------INDIVIDUAL------------------
$sql = "SELECT * FROM reg_discapacitado WHERE Cedula='$cedula'";
*/
$result = mysql_query($sql) or die (mysql_error());
$num = mysql_num_rows($result);
if($num>0){
	$registro = mysql_fetch_array($result);
}else{
	header('location: ../Buscar_usu.php?error');
}


?>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/propio.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css">
        <link rel="stylesheet" type="text/css" href="../css2/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css2/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css2/bootstrap-responsive.css">
        <link rel="stylesheet" type="text/css" href="../tables/media/css/jquery.dataTables.css">
        <script type="text/javascript" language="javascript" src="../tables/media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="../tables/media/js/jquery.dataTables.min.js"></script>
	<link href="../images/favicon.jpg" type="image/x-icon" rel="shortcut icon" >

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
	
	
	<script>
$(document).ready(function() {
	$('#example').DataTable();
} );

	</script>
	

	</head>
		<title>Registro de Discapacitados</title>
	<body class='estil1'>
	<section>
		<article>
			<a href="#"><img src="../img/banner.png" id="Banner"></a>
		</article>
	</section>
	
	
			<nav id="Nav_per">
				<ul class="nav nav-pills">
					<li><a href="../Reg_1.php">Registro</a></li>
                    <li><a href="../Update_Reg1.php">Actualizacion</a></li>
					<li><a href="../Buscar_usu.php">Buscar</a></li>
						<li><a href="../reg_don.php">Registrar Donacionr</a></li>
							<li><a href="bus_donacion.php">Ver Donaciones</a></li>
					<li  class="active"><a href='busqueda_general.php'>Busqueda General</a></li>
					<?php if(isset($_SESSION['user'])){
								if($_SESSION['nivel']==='a' || $_SESSION['nivel']==='A'){
									echo "<li><a href='../Reg_Usuario.php'>Registrar Trabajadores</a></li>
										  <li><a href='../bus_usu.php'>Trabajadores</a></li>";
										  
								}
								echo "<li><a href='../logout.php'>Cerrar Sesion</a></li>";
							}
					?>
				</ul>
			</nav>
		
	<p class="top"><?php echo "Usuario: ".$_SESSION['user']; ?></p>
	<br>
	<table id="example" class="display " cellspacing="0" width="100%">
        <thead class="tab">
		    <tr>
			    <td><b>ID</b></td>
			    <td><b>Cedula</b></td>
			    <td><b>Nombre</b></td>
			    <td><b>Apellido</b></td>
			    <td><b>Fecha</b></td>
			    <td><b>Edad</b></td>
			    <td><b>Direccion</b></td>
			    <td><b>Sexo</b></td>
			    <td><b>Tipo de Discapacidad</b></td>
			    <td><b>Carnet</b></td>
			    <td><b>Pensionado</b></td>
			     <td><b>Observacion</b></td>
			    <td><b>ACCION </b></td>

			</tr>
        </thead>
        
        <tbody>
			<?php while($row = mysql_fetch_array($result)){?>
					<tr>
					    <td> <?php echo $row['ID']; ?>      </td>
					    <td> <?php echo $row['Cedula']; ?>      </td>
					    <td> <?php echo $row['Nombre']; ?>      </td>
					    <td> <?php echo $row['Apellido']; ?>    </td>
					    <td> <?php echo $row['Fecha']; ?>       </td>
					    <td> <?php echo $row['Edad']; ?>        </td>
					    <td> <?php echo $row['Direccion']; ?>   </td>
					     <td> <?php echo $row['Sexo']; ?>        </td>
					     <td> <?php echo $row['Tipo']; ?>        </td>
					    <td> <?php echo $row['Carnet']; ?>      </td>
					    <td> <?php echo $row['Pensionado']; ?>  </td>
					    <td> <?php echo $row['Observaciones']; ?> </td>
						<td>
							<a href="../pdf.php?ced=<?php echo $row['Cedula']; ?>">
				    			<img src="../images/pdf.png">

							<a href="../Modulo/Update_Reg4.php?ced=<?php echo $row['Cedula']; ?>">
								<img src="../images/editar.jpg" title="Editar" alt="Editar">
							</a>
							<?php if(isset($_SESSION['user'])){
								if($_SESSION['nivel']==='a' || $_SESSION['nivel']==='A'){?>

							<a href="../Borrar_usu.php?ced=<?php echo $row['Cedula'];?>">
								<img class="imag" src="../images/eliminar.jpg" title="Editar" alt="Editar">
							</a>
							<?php 
						}
					}
				    		?>
				    		</a>
				    	</td>
					</tr>
			<?php } ?>
        </tbody>
    </table>


