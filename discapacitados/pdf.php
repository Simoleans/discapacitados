<?php 

include ("CDB.php");

if(isset($_GET['ced'])){
	$cedula=$_GET['ced'];
}else{
$cedula = $_POST['cedula'];	
}

$sql = "SELECT * FROM reg_discapacitado WHERE Cedula = $cedula";
$result = mysql_query($sql,$link) or die (mysql_error());
$registro = mysql_fetch_array($result);


$html = "<html>

<head>

<link rel='stylesheet' type='text/css' href='css/propio.css'>

</head>

	
	<body style='background: url(images/formato.png')'>

	<h1>Sistema De Desarrollo Social 'Discapacitados'</h1>
	<h2>Alcaldia del Municpio sucre</h2>

	
	
	
	<br>
	<br>
	<br>
	<br>

	<br>
	<br>

	<br>
	<br>
	<br>
	<br>

	<br>
	<br>
	<br>
<center><h3>Datos de la persona</h3></center>

	<table  border='1' color='black'>
	
	<tr border='1' class='tabplanilla'>
	<h2><td>Cedula</td>
	<td>Nombre</td>
	<td>Apellido</td>
	<td>Fecha de nacimiento</td>
	<td>Edad</td>
	<td>Direccion</td>
	<td>Sexo</td>
	<td>Tipo de discapacidad</td>
	<td>¿Tiene Carnet?</td>
	<td>¿Es Pensionado?</td>
	<td>Observaciones</td>
	<h2>
	</tr>

	
	<tr>
	<b><td>".$registro['Cedula']."<b>
	<b><td>".$registro['Nombre']."<b>
	<b><td>".$registro['Apellido']."<b>
	<b><td>".$registro['Fecha']."<b>
	<b><td>".$registro['Edad']."<b>
	<b><td>".$registro['Direccion']."<b>
	<b><td>".$registro['Sexo']."<b>
	<b><td>".$registro['Tipo']."<b>
	<b><td>".$registro['Carnet']."<b>
	<b><td>".$registro['Pensionado']."<b>
	<b><td>".$registro['Observaciones']."<b>
	</tbody>
</tr>
	</table>

</body>
	
	<p color='red'>

	</html>";

$pie = "<span><img src='images/qr.jpg' id='qr'><h3>
 </h3>&nbsp;".date("d/m/Y")."
</span>  ";

include("mpdf/mpdf.php");
$mpdf=new mPDF();

$mpdf->WriteHTML($html);
$mpdf->SetHTMLFooter($pie);
$mpdf->Output('PlanillaDeInscripcion'.$registro['ID'].'.pdf','D'); exit;
//'PlanillaDeInscripcion.pdf','D'


?>

//
