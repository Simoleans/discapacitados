<?php
include ("../CDB.php");

$nombre = 		$_POST['nombre'];
$apellido=  	$_POST['apellido'];
$monto=			$_POST['monto'];
$descripcion =  $_POST['descripcion'];

//BUSCO SI EXISTE OTRO REGISTRO PARA COMPROBAR Q NO SE REPITAN LOS REGISTROS
			$sql = "SELECT * FROM reg_donacion";
			$result = mysql_query($sql,$link) or die (mysql_error());
 			

			 
				     $sql2 = "INSERT INTO reg_donacion ( Nombre, Apellido,Monto,Descripcion) VALUES (
							'$nombre','$apellido','$monto','$descripcion')";  
							
							 mysql_query($sql2,$link) or die (mysql_error());
							 
							 echo "<script>alert('Registrado Correctamente')</script>";
							 echo "<script>window.location='../iniciar.php'</script>";
						
?>