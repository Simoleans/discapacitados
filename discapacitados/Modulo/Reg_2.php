<?php
include ("../CDB.php");

$cedula =   	$_POST['cedula'];
$nombre = 		$_POST['nombre'];
$apellido=  	$_POST['apellido'];
$fecha=			$_POST['fechanac'];
$edad = 		$_POST['edad'];
$direccion= 	$_POST['direccion'];
$sexo = 		$_POST['sexo'];
$tipo = 		$_POST['tipo'];
$carnet = 		$_POST['carnet'];
$pensionado = 	$_POST['pensionado'];
$observacion = 	$_POST['observacion'];





// header('location: ../add_prod.php?n=Error al subir');
//$opc_cedula = array('options' => array('min_range' => 7,'max_range' => 9));


// VALIDO LA CEDULA Q SEA SOLO NUMERICA
      if(filter_var($cedula, FILTER_VALIDATE_INT) === FALSE)
	{	
		echo "<script>alert('La CEDULA debe contener SOLO NUMEROS EJ: 12345678')</script>";
		echo "<meta http-equiv=refresh content=;URL=../Reg_1.php>";
	}
	
//BUSCO SI EXISTE OTRO REGISTRO PARA COMPROBAR Q NO SE REPITAN LOS REGISTROS
			$sql = "SELECT * FROM reg_discapacitado WHERE Cedula = $cedula";
			$result = mysql_query($sql,$link) or die (mysql_error());
 			

			 if (mysql_num_rows($result)>0) 
					{
					echo "<script>alert('Disculpe, esta persona ya existe')</script>";
					echo "<script>window.location='../Reg_1.php'</script>";
			
					}else{ 
				     $sql2 = "INSERT INTO reg_discapacitado (Cedula, Nombre, Apellido,Fecha,Edad,
							 Direccion,Sexo,Tipo,Carnet,Pensionado,Observaciones) VALUES ('$cedula',
							'$nombre','$apellido','$fecha','$edad','$direccion','$sexo','$tipo','$carnet',
							'$pensionado','$observacion')";  
							
							 mysql_query($sql2,$link) or die (mysql_error());
							 
							 echo "<script>alert('Registrado Correctamente')</script>";
							 echo "<script>window.location='../Reg_1.php'</script>";
						}
?>

