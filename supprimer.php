<?php

$idproduct = $_GET['idc'];
//chaine de cnx
$servername = "localhost";
$DBuser = "root";
$DBpassword = "";
$DBname = "e_commerce";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
 $requette = "DELETE FROM  products WHERE id= '$idproduct'";
 $resultat = $conn->query($requette);
 if($resultat){
     header('location:liste.php?supp=ok');
     
 }

 




?>