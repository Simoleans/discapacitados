<?php
session_start();
if(isset($_SESSION['user'])!=1){
	header('location: index.php');
}
$m="";
	if(isset($_GET['g'])){
		$m= "<h1>Bienvenido ".$_SESSION['user']."</h1>";
	}


include ("CDB.php");

if(isset($_GET['ced'])){
	$cedula=$_GET['ced'];
}else{
$cedula = $_POST['cedula'];	
}

$sql = "SELECT * FROM reg_discapacitado WHERE Cedula = $cedula";
$result = mysql_query($sql,$link) or die (mysql_error());
$registro = mysql_fetch_array($result);

if(filter_var($cedula, FILTER_VALIDATE_INT) === FALSE) // Validar cedula que sea solo numeros 
	{	
		echo "<script>alert('ERROR AL INGRESAR CEDULA, Verifique...')</script>";
		echo "<meta http-equiv=refresh content=;URL=../Update_Reg1.php>";
	}
				
if (isset($registro) && !empty($registro))
		{
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
	<title>Registro Discapacitados</title>
	
	<body class='estil1'>
		<section>
		<article>
			<a href="#"><img src="img/banner.png" id="Banner"></a>
		</article>
	</section>
	
	<section id="Nav_per">
		<header>
			<nav id="Nav_per">
				<ul class="nav nav-pills">
					<li><a href="Reg_1.php">Registro</a></li>
                    <li><a href="Update_Reg1.php">Actualizacion</a></li>
					<li   class="active"><a href="Buscar_usu.php">Buscar</a></li>
					<li><a href='Modulo/busqueda_general.php'>Busqueda General</a></li>
					<?php if(isset($_SESSION['user'])){
								if($_SESSION['nivel']==='a' || $_SESSION['nivel']==='A'){
									echo "<li><a href='Reg_Usuario.php'>Registrar Trabajadores</a></li>
										  <li><a href='bus_usu.phTrabajadores</a></li>";
										  
								}
								echo "<li><a href='logout.php'>Cerrar Sesion</a></li>";
							}
					?>
				</ul>
			</nav>
		</header>
	</section>
	<br>
		<form action='Modulo/Borrar_usu1.php' method='post'>
		<section>
			<p><?php echo "Usuario: ".$_SESSION['user']; ?></p>
			<p>
				<span class="label label-danger">peligro</span>
				<div class="alert alert-danger" role="alert">
  <span class="sr-only">ALERTA</span>
 VERIFICAR ANTES DE BORRAR
</div>
	
	<br>
			<table class='table' id='Tabla_per' align='center'>
				<tr>
					<td>
						<label>Cedula</label><p>
						<input class="editar" required type='text' name='cedula' readonly value="<?php echo $registro['Cedula'] ?>" placeholder='Formato 12345678' autofocus>
					</td>
					<td>
						<label>Nombres</label><p>
						<input class="editar" required type='text' readonly name='nombre' value='<?php echo $registro["Nombre"]?>'placeholder='Nombres...'>
					</td>
					<td>
						<label>Apellidos</label><p>
						<input class="editar" required type='text' readonly name='apellido' value='<?php echo $registro["Apellido"] ?>'placeholder='Apellidos...'>
					</td>
					
				</tr>	
				<tr>
					<td>
						<label>Fecha de Nacimiento</label><p>
						<input class="fecha editar" type="text" required="" name="fechanac"  placeholder="mm/dd/aaaa" readonly value=' <?php echo $registro["Fecha"] ?>' >
					</td>
					<td>
						<label>Edad</label><p>
						<input class="editar" required type='text' readonly value='<?php echo $registro["Edad"] ?>' name='edad' placeholder='Edad'>
					</td>
					</tr>
					<td>
						<label>Direccion</label><p>
						<textarea class="editar" required name='direccion' readonly placeholder='Direccion donde vive'><?php echo $registro["Direccion"]; ?></textarea>
					</td>
					<td>
						<label>Sexo</label><p>
						<select class="editar" readonly name='sexo' required='required'>
							<option  value='<?php echo $registro["Sexo"] ?>'><?php echo $registro["Sexo"] ?><p>
							<option value='Masculino'>Masculino</option>
							<option value='Femenino'>Femenino</option>
						</select> 
					</td>

					<td><label>Tipo de Discapacidad</label><p>
				<select  class="editar" name="tipo"  readonly required="required">
				  <option value='<?php echo $registro["Tipo"] ?>'><?php echo $registro["Tipo"] ?><p></option>
				  <option value="Autismo">Autismo</option>
				  <option value="Enfermedades Cronicas">Enfermedades Cronicas</option>
				   <option value="Deficiencia auditiva y sordera">Deficiencia auditiva y sordera</option>
				  <option value="Discapacidad intelectual">Discapacidad intelectual</option>
				   <option value="Dificultades del aprendizaje">Dificultades del aprendizaje</option>
				  <option value="P&eacute;rdida de la memoria">P&eacute;rdida de la memoria</option>
				   <option value="Enfermedades mentales">Enfermedades mentales</option>
				  <option value="Discapacidad f&iacute;sica">Discapacidad f&iacute;sica</option>
				  <option value="Trastornos del habla y del lenguaje">Trastornos del habla y del lenguaje</option>
				  <option value="Deficiencia visual y ceguera">Deficiencia visual y ceguera</option>
				</select> 
			</td>
				
				<tr>
					<td>
						<label>¿Tiene Carnet de Discapacidad?</label><p>
						<select class="editar" readonly="readonly" name='carnet'  required>
							<option readonly='readonly' value='<?php echo $registro["Carnet"]; ?>'><?php echo $registro["Carnet"]; ?></option>
							<option readonly='readonly'value='Si'>SI</option>
							<option readonly='readonly' value='No'>NO</option>
						</select>
					</td>
					<td>
						<label>¿Es Pensionad@?</label><p>
						<select class="editar" readonly name='pensionado' required>
							<option readonly='readonly' value='<?php echo $registro["Pensionado"]; ?>'><?php echo $registro["Pensionado"] ?></option>
							<option readonly='readonly' value='Si'>SI</option>
							<option readonly='readonly' value='No'>NO</option>
						</select> 
					</td>
					<td>
						<label>Observacion</label><p>
						<textarea class="editar" required name='observacion' readonly placeholder='Algunas observaciones'><?php echo $registro["Observaciones"] ?></textarea>
					</td>
				</tr>
				<tr>
					<td>
				</tr>
				<tr>
					<td>
						
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input  type='submit' name='eliminar' value='Eliminar' class="btn btn-danger">
						</form>
					</td>
				</tr>
				
			</table>
		</section>
		
	</body>
</html>
<?php
	}else{
			echo "<b><script>alert('Esta Persona NO se encuetra registrada')</script></b>";
			 echo "<meta http-equiv=refresh content=;URL=../Update_Reg1.php>";
		}
?>