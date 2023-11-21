<?php
session_start();
$nom = $_POST['nom'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$id = $_POST['idc'];
$date_modification= date("y-m-d");
$categorie= $_POST['categorie'];
$target_dir = "../../img/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
               $image = $_FILES["image"]["name"];
  } else {
    echo "Sorry, there was an error uploading your file.";
  }

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
 

    

$requette = "UPDATE  products SET nom = '$nom',description = '$description',prix = '$prix',img = '$image',categorie = '$categorie', date_modification = '$date_modification' WHERE id='$id'";
$resultat = $conn->query($requette);
     if($resultat){
            header('location:liste.php?modif=ok');

    }






?>