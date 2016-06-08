<?php

// We will use PDO to execute database stuff. 
// This will return the connection to the database and set the parameter
// to tell PDO to raise errors when something bad happens

define('DB_SERVER', "localhost");
define('DB_USER', "root");
define('DB_PASSWORD', "");
define('DB_DATABASE', "discapacitados");
define('DB_DRIVER', "mysql");

function getDbConnection() {
  $db = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER . ";charset=utf8", DB_USER, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  return $db;
}

// This is the 'search' function that will return all possible rows starting with the keyword sent by the user
function serachForKeyword($cedula) {
  
    $db = getDbConnection();
    $stmt = $db->prepare("SELECT Cedula as Cedula FROM `reg_discapacitado` WHERE Cedula = ?");

    $cedula = $cedula;
    $stmt->bindParam(1, $cedula, PDO::PARAM_STR, 100);

    $isQueryOk = $stmt->execute();
  
    $results = '';
    
    if ($isQueryOk) {
      $results = $stmt->fetchAll(PDO::FETCH_COLUMN);
    } else {
      
      trigger_error('Error executing statement.', E_USER_ERROR);
    }

    $db = null; 

    return $results;
}