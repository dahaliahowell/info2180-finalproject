<?php header('Access-Control-Allow-Origin: *'); 

require_once 'dbconfig.php';

try {

    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  } catch(PDOException $e) {
    echo $e->getMessage();
  }

?>