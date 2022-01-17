<?php 

  	$serveur = 'localhost';
    $username = 'zeze';
    $database = 'memoire';
    $password = '';

    try {
       $db = new PDO("mysql:host=$serveur;dbname=$database",$username,$password);
       $db->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      echo'Erreur : ' .$e->getMessage();
    }
?>
