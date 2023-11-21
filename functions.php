<?php


  function searchProduits($keywoards){
   
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
    //creation req
    $requette = "SELECT * FROM products WHERE nom LIKE'%$keywoards%'";
    //execution req
    $resultat = $conn->query($requette);
    //resultat
    $produits = $resultat->fetchAll();
    return $produits;
     }

   function getAllcategories(){
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
  $requette = "SELECT * FROM categorie";
  $resultat = $conn->query($requette);
  $categories = $resultat ->fetchAll();
 // var_dump($categorie);
 return $categories;
}
   function getProduitById($id){
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
    //req
    $requette = "SELECT * FROM products WHERE id=$id";
    $resultat = $conn->query($requette);
    //resultat
    $produit = $resultat->fetch();
    return $produit;

    
}



  function getAllproducts(){
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
  $requette = "SELECT * FROM products";
  $resultat = $conn->query($requette);
  $products = $resultat ->fetchAll();
 // var_dump($categorie);
 return $products;
}
function getAllusers(){
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
    $requette = "SELECT * FROM client where admin=0";
     $resultat = $conn->query($requette);
     $users = $resultat->fetchAll();
     return $users;

}
function getuserById($id){
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
  //req
  $requette = "SELECT * FROM client WHERE id=$id and admin='0'";
  $resultat = $conn->query($requette);
  //resultat
  $produit = $resultat->fetch();
  return $user;

  
}
function getAllcommandes(){
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
  //req
  $requette = "SELECT c.nom , c.prenom,p.total,p.date_creation ,p.id  FROM panier p , client c WHERE p.client = c.id";
  $resultat = $conn->query($requette);
  //resultat
   
  $commandes= $resultat->fetch();
 
  return $commandes;


}


?>

