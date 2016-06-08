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
<script type="text/javascript">//Aqui empieza la comprobacion EN VIVO de el usuario si esta en la base de datos
    var MIN=5; var MAX=9;

		$( document ).ready(function() {
			$("#cedu").focusout(function() {
				var cedula = $("#cedu").val();
				if (cedula.length >= MIN) {
					$.get( "comprobar/cedula_get.php", { cedula: cedula } )
					.done(function( data ) {
						$('#mensaje').html('');
						var results = jQuery.parseJSON(data);
						if($('#cedu').val() == results ){
							$('#mensaje').html('<p style="color:red;">Cedula ya registrada</p>');
						}else{
							$('#mensaje').html('<p style="color:green;">Disponible</p>');
						}

					});
				} else {
					
				}
			});

		}); //Aqui termina la comprobacion

    	</script> 
    
</head>
		<title>Registro de Discapacitados</title>
	<body class="estil1">
	<?php

include("header.php")


	?>
	
	<p class="top"><?php echo "Usuario: ".$_SESSION['user']; ?></p>
	<br>
	<section>
	<table class="table" id="Tabla_per" align="center">
		<form action="Modulo/Reg_2.php" method="post" enctype="multipart/form-data">
		<tr>
			<td class="tabmov"><label>Cedula</label><p>
				<input  required pattern="[0-9]{6,8}" type="text" name="cedula" placeholder="12345678" id='cedu' autofocus/>
				<span id="mensaje"></span>
			</td>
			<td><label>Nombres</label><p>
				<input pattern="([a-zA-ZÁÉÍÓÚñáéíóú]{3,}[\s]*)+" required type="text" name="nombre" placeholder="Nombres">
			</td>
			<td><label>Apellidos</label><p>
				<input required type="text" pattern="([a-zA-ZÁÉÍÓÚñáéíóú]{3,}[\s]*)+" name="apellido" placeholder="Apellido...">
			</td>
			<tr>
				<td>
					<label>Fecha de Nacimiento</label><p>
					<input id="fecha" type="text" required="" name="fechanac" placeholder="mm/dd/aaaa">
					
				</td>
				<td><label>Edad</label><p>
				<input required type="text" pattern="[0-9]{2,3}" name="edad" placeholder="Edad">

			</td>
			</tr>
			
		</tr>	
		<tr>

			
			

			<td><label>Direccion</label><p>
				<textarea required name="direccion" placeholder="Direccion donde vive"></textarea>
			</td>


			<td><label>Sexo</label><p>
				<select name="sexo" required="required">
				  <option></option>
				  <option value="Masculino">Masculino</option>
				  <option value="Femenino">Femenino</option>
				</select> 
			</td>
			
			<td><label>Tipo de Discapacidad</label><p>
				<select name="tipo" required="required">
				  <option></option>
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
		</tr>	
		<tr>

		<td>

			


			<label>¿Tiene Carnet de Discapacitado?</label><p>
				 <select name="carnet" required="required">
				  <option></option>
				  <option value="Si">SI</option>
				  <option value="No">NO</option>
				</select> 
			</td>

		<td><label>¿Es Pensionad@?</label><p>
				<select name="pensionado" required="required">
				  <option></option>
				  <option value="Si">SI</option>
				  <option value="No">NO</option>
				</select> 
			</td>

			<td><label>Observacion</label><p>
				<textarea required name="observacion" placeholder="Observacion"></textarea>
			</td>

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
		
	</table>
	</section>

	<script type="text/javascript" src="datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="datepicker/locales/bootstrap-datepicker.es.min.js"></script>
		<script>
		    $('#fecha').datepicker({
		      	format: 'dd/mm/yyyy',
		        language: "es",
		        todayBtn: "linked",
		    });
		</script>
	</body>
</html>
