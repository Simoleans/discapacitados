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


$sql = "SELECT * FROM reg_donacion ";

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
	
	</head>
		<title>Registro Discapacitado</title>
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
						<li><a href="../reg_don.php">Registrar Donacion</a></li>
							<li class="active"><a href="bus_donacion.php">Ver Donaciones</a></li>
					<li  ><a href='busqueda_general.php'>Busqueda General</a></li>
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
		
	<p><?php echo "Usuario: ".$_SESSION['user']; ?></p>
	
	<br>
	<section>
	<table align='center' class='table'  border='3'>
	    <tr id='tr_consul'>
	    	<thead class="tab">
		   
			    <td><b>ID</b></td>
			    <td><b>Nombre</b></td>
			    <td><b>Apellido</b></td>
			    <td><b>Monto</b></td>
			    <td><b>Descripcion</b></td>
			   


		</tr>
		</thead>

		<?php while($row = mysql_fetch_array($result)){?>
				<tr>
				    <td><?php echo $row['ID']; ?></td>
				    
				    <td><?php echo $row['Nombre']; ?></td>
				    <td><?php echo $row['Apellido']; ?></td>
				    <td><?php echo $row['Monto']; ?></td>
				    <td><?php echo $row['Descripcion']; ?></td>
				</tr>
		<?php } ?>
		


<!--
		<?php $row = mysql_fetch_array($result) ?>
		<tr>
		    			<td> <?php echo $registro['ID']; ?>          </td>
					    
					    <td> <?php echo $registro['Nombre']; ?>      </td>
					    <td> <?php echo $registro['Apellido']; ?>    </td>
					    <td> <?php echo $registro['Fecha']; ?>       </td>
					    <td> <?php echo $registro['Edad']; ?>        </td>
					    <td> <?php echo $registro['Direccion']; ?>   </td>
					    <td> <?php echo $registro['Sexo']; ?>        </td>
					    <td> <?php echo $registro['Tipo']; ?>        </td>
					    <td> <?php echo $registro['Carnet']; ?>      </td>
					    <td> <?php echo $registro['Pensionado']; ?>  </td>
					    <td> <?php echo $registro['Observaciones']; ?> </td>

					    -->