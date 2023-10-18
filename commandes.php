<?php



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


  


 $id_produit = $_POST['produit'];
 $quantite = $_POST['quantite'];

  $requette = "SELECT prix,nom FROM products WHERE id='$id_produit'";
  $resultat = $conn->query($requette);
  $produit =$resultat->fetch();
  
 $total =$quantite* $produit['prix'];
 $date = date('y-m-d');



 $query1="SELECT id FROM client where  admin='0'";
 $resultat = $conn->query($query1);
       if( $client = $resultat->fetch()){
      session_start();
       $_SESSION['id'] =$client['id']; }
       if(!isset($_SESSION['panier'])){//si panier n'existe pas 
        $_SESSION['panier'] = array($client['id'],0,$date,array() );//creation panier

       }
       $_SESSION['panier'][1] += $total;
      
       $_SESSION['panier'][3][] = array($quantite,$total,$date,$date,$id_produit,$produit['nom']);
       
      
header('location:panier.php');

?>
