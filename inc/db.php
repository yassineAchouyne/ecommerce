<?php
$dsn="mysql:host=localhost;dbname=ecommerce";
$user = "root";
$pass="";
try {
    $db = new PDO($dsn, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION) ;
} catch (PDOException $e) {
    die("erreur ".$e->getMessage());    
}
?>