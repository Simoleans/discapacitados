<?php
include ("../CDB.php");

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$contrasena= $_POST['contraseña'];
$repetir = $_POST['repetir'];




// header('location: ../add_prod.php?n=Error al subir');
//$opc_cedula = array('options' => array('min_range' => 7,'max_range' => 9));


// VALIDO LA CEDULA Q SEA SOLO NUMERICA
      if(filter_var($cedula, FILTER_VALIDATE_INT) === FALSE)
	{	
		echo "<script>alert('La CEDULA debe contener SOLO NUMEROS EJ: 12345678')</script>";
		echo "<meta http-equiv=refresh content=;URL=../Reg_1.php>";
	}
	
//BUSCO SI EXISTE OTRO REGISTRO PARA COMPROBAR Q NO SE REPITAN LOS REGISTROS
			$sql = "SELECT * FROM reg_usu WHERE Cedula = '$cedula'";
			$result = mysql_query($sql) or die (mysql_error());
 			
			if($contrasena==$repetir){

			
			 if (mysql_num_rows($result)>0) 
					{
					echo "<script>alert('Disculpe, esta persona ya existe')</script>";
					echo "<script>window.location='../Reg_Usuario.php'</script>";
			
					}else{ 
				     $sql2 = "INSERT INTO reg_usu (Cedula, Nombre, Apellido,Contrasena,Repetir)
				     			VALUES ('$cedula','$nombre','$apellido','$contrasena','$repetir')";  
							
							 mysql_query($sql2) or die (mysql_error());
							 
							 echo "<script>alert('Registrado Correctamente')</script>";
							 echo "<script>window.location='../iniciar.php'</script>";
						}
					}else{

								echo "<script>alert('Las contraseñas no coinciden , intente nuevamente')</script>";
							 echo "<script>window.location='../Reg_Usuario.php'</script>";
					}

					

?>