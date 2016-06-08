<?php
include ("../CDB.php");

// obtengo mis datos del formulario y
// lo almceno en una variable
// La Funcion trim() me sirve para no dejar espacios vacios

$cedula = trim($_POST['cedula']);
$nombre = trim($_POST['nombre']);
$apellido = trim($_POST['apellido']);
$fecha= $_POST['fechanac'];
$edad = $_POST['edad'];
$direccion = $_POST['direccion'];
$carnet = $_POST['carnet'];
$pensionado = $_POST['pensionado'];
$sexo = $_POST['sexo'];
$observacion = $_POST['observacion'];
$tipo = $_POST['tipo'];




$sql = "SELECT * FROM reg_discapacitado WHERE Cedula = $cedula";
$result = mysql_query($sql,$link) or die (mysql_error());
	 
//la Funcion strlen devuelve la longitud de la cadena
//strlen();
//filter_var();

		    
 
		if (isset($result)) 
		{	
			$sql1 = "UPDATE reg_discapacitado SET Nombre='$nombre', Apellido='$apellido', Fecha='$fecha',
						 Edad='$edad', Direccion='$direccion',Carnet='$carnet',Pensionado='$pensionado',Sexo='$sexo',Observaciones='$observacion',Tipo='$tipo'  WHERE Cedula=$cedula";  
 						 mysql_query($sql1,$link) or die (mysql_error());
 						 echo "<script>alert('Datos Actualizados Correctamente')</script>";
 						 echo "<script>window.location='../Update_Reg1.php'</script>";
			
			
		}else{
						 echo "<script>alert('Error , no se pudo modificar el usuario')</script>";
						 echo "<script>window.location='../Update_Reg1.php'</script>";

		}
		

?>