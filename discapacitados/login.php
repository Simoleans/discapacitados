<?php
require_once("CDB.php");
session_start();
	$ced=$_POST["cedula"];
	$pass=$_POST["clave"];

	$buscar=mysql_query("SELECT * FROM reg_usu WHERE cedula='$ced'");
	$row=mysql_fetch_array($buscar);
	$num= mysql_num_rows($buscar);

	if($num>0){
		if($pass==$row['Contrasena']){

			session_start();

			$_SESSION['user']=$row['Nombre'];
			$_SESSION['nivel']=$row['Nivel'];
			header('location: iniciar.php?g');
		}
		else{
			header('location: index.php?m');
		}
	}else{
		header('location: index.php?m');
	}
?>