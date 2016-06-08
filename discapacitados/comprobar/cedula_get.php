<?php
require('cedula_db.php');

if (!isset($_GET['cedula'])) {
	die("");
}

$cedula = $_GET['cedula'];
$data = serachForKeyword($cedula);
echo json_encode($data, JSON_HEX_APOS);