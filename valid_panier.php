<?php

//connexion a la base 
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




$query1="SELECT id FROM client where  admin='0'";
$resultat = $conn->query($query1);
      if( $client = $resultat->fetch()){
     session_start();
      $_SESSION['id'] =$client['id']; }
      $total = $_SESSION['panier'][1];
      $date = date('y-m-d');
     
    
     
  $requette_panier = "INSERT INTO panier(client,total,date_creation) VALUES('$client[id]','$total','$date')";
     $result = $conn->query($requette_panier);
      $panier_id = $conn->lastInsertId();


      $commandes = $_SESSION['panier'][3];  
      foreach($commandes as $command){
          $quantite = $command[0];
          $total = $command[1];
          $id_produit = $command[4];
          // //ajouter commandes
        $requet = "INSERT INTO commandes(produit,quantite,total,panier,date_creation,date_modification)VALUES('$id_produit','$quantite','$total','$panier_id','$date','$date')";

        $result = $conn->query($requet);


      }
     


header('location:produits.php');


?>