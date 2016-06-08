<?php


session_start();
$m="";
	if(isset($_GET['g'])){
		$m= "<h1>Bienvenido ".$_SESSION['user']."</h1>";
	}


include ("../CDB.php");

if(isset($_GET['ced'])){
	$cedula=$_GET['ced'];
}else{
$cedula = $_POST['cedula'];	
}

$sql = "SELECT * FROM reg_discapacitado WHERE Cedula = $cedula";
$result = mysql_query($sql,$link) or die (mysql_error());

$registro = mysql_fetch_array($result);

if(filter_var($cedula, FILTER_VALIDATE_INT) === FALSE)
	{	
		echo "<script>alert('ERROR AL INGRESAR CEDULA, Verifique...')</script>";
		echo "<meta http-equiv=refresh content=;URL=../Update_Reg1.php>";
	}
				

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/propio.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css">
        <link rel="stylesheet" type="text/css" href="../css2/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css2/bootstrap.min.css">
		<script type="text/javascript" src="../js/jquery.js"></script>
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
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="../datepicker/locales/bootstrap-datepicker.es.min.js"></script>
		<script>
		    $('fecha').datepicker({
		      	format: 'dd/mm/yyyy',
		        language: "es",
		        todayBtn: "linked",
		    });
		</script>
	</head>
	<title>Registro de Adulto Mayor</title>
	
	<body class='estil1'>
		<section>
		<article>
			<a href="#"><img src="../img/banner.png" id="Banner"></a>
		</article>
	</section>
	
	
			<nav id="Nav_per">
				<ul class="nav nav-pills">
					<li><a href="../Reg_1.php">Registro</a></li>
                    <li   class="active"><a href="../Update_Reg1.php">Actualizacion</a></li>
					<li><a href="../Buscar_usu.php">Buscar</a></li>
					<li><a href='busqueda_general.php'>Busqueda General</a></li>
					<?php if(isset($_SESSION['user'])){
								if($_SESSION['nivel']==='a' || $_SESSION['nivel']==='A'){
									echo "<li><a href='../Reg_Usuario.php'>Registrar Trabajadores</a></li>
										  <li><a href='../bus_usu.php'>Usuarios</a></li>";
										  
								}
								echo "<li><a href='../logout.php'>Cerrar Sesion</a></li>";
							}
					?>
				</ul>
			</nav>
		
		<form action='../Modulo/Update_Reg3.php' method='post'>
		<section>
			<p><?php echo "Usuario: ".$_SESSION['user']; ?></p>
	
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
						<input class="fecha editar" type="text" required="" name="fechanac"  placeholder="mm/dd/aaaa" readonly value='<?php echo $registro["Fecha"] ?>' >
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
						
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input  type='submit' name='actualizar' value='Actualizar' class='btn btn-success'>
						</form>
					</td>
				
				
				<td><input name="Habilitar" value="Habilitar Campos" class="btn btn-inverse" id="click" style="cursor: pointer;"></br></br></td>
				</tr>	
				
			</table>
		</section>
		

		<script>
			function editable(){
				var x= document.getElementsByClassName("editar");
				var i;
				for (i=0; i<x.length; i++){
					x[i].removeAttribute("readonly");
				}
			}

			document.getElementById("click").onclick= editable;
		</script>
<script type="text/javascript" src="../datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="../datepicker/locales/bootstrap-datepicker.es.min.js"></script>
		<script>
		    $('.fecha').datepicker({
		      	format: 'dd/mm/yyyy',
		        language: "es",
		        todayBtn: "linked",
		    });
		</script>

	</body>
</html>
<?php
	
?>