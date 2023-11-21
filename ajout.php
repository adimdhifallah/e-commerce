<?php
$nom = $_POST['nom'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$categorie = $_POST['categorie'];
$date_creation = date("y-m-d");
$categorie= $_POST['categorie'];
$target_dir = "../../img/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
               $image = $_FILES["image"]["name"];
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
  $date_creation = date("y-m-d");


$servername = "localhost";
$DBuser = "root";
$DBpassword = "";
$DBname = "e_commerce";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   //echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  $requette = "INSERT INTO products(nom,description,prix,img,categorie,date_creation) VALUES('$nom','$description','$prix','$image','$categorie','$date_creation')";
  $resultat = $conn->query($requette);
     if($resultat){
            header('location:liste.php?ajout=ok');

    }




?>