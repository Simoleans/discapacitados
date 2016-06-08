<?php
include ("../CDB.php");

// obtengo mis datos del formulario y
// lo almceno en una variable
// La Funcion trim() me sirve para no dejar espacios vacios



if(isset($_GET['ced'])){
	$cedula=$_GET['ced'];
}else{
$cedula = $_POST['cedula'];	
}


$sql = "SELECT * FROM reg_discapacitado WHERE Cedula = $cedula";
$result = mysql_query($sql,$link) or die (mysql_error());
	 
//la Funcion strlen devuelve la longitud de la cadena
//strlen();
//filter_var();

		    
 
		if (isset($result)) 
		{	
			$sql1 = "DELETE FROM reg_discapacitado   WHERE Cedula=$cedula";  
 						 mysql_query($sql1,$link) or die (mysql_error());
 						 echo "<script>alert('El usuario se ha borrado')</script>";
 						 echo "<script>window.location='busqueda_general.php'</script>";
			
			
		}else{
						 echo "<script>alert('Error , no se borro el usuario')</script>";
						echo "<script>window.location='busqueda_general.php'</script>";

		}
		

?>