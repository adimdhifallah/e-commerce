

<?php

session_start();
if(!$_SESSION['login']){
  header('location:connexion/f1.php');
}
$total = 0;
if(isset($_SESSION['panier'])){

    $total =  $_SESSION['panier'][1];
}


function getAllproduits(){
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

     $products = getAllproduits();
     $categories=getAllcategories();
     $commandes =array();
    if(isset($_SESSION['panier'])){
        if(count($_SESSION['panier'][3]) >0 ){
            $commandes = $_SESSION['panier'][3];

        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos produits</title>
    <link rel="stylesheet" href="produits.css">
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
  
<header class="header">

    <a href="#" class="logo"> <i class="fas fa-shopping-basket"></i> <span id="logo1">Dermato</span> Net </a>

    <nav class="navbar">
    <?php
     foreach($categories as $c){
       print'<a href="#home" style="text-decoration: none;">'.$c['nom'].'</a>';

     }


  ?>
        
        
    </nav>

    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <div class="fas fa-search" id="search-btn"></div>
        <div class="fas fa-shopping-cart"><a href ="cart.php"> </a></div>
        <div class="fas fa-user" id="login-btn"></div>
    </div>

    <form action="" class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>
    </form>

    

    

</header>


<br>
<br>
<br>
<br>
<br>
<div class="main-area">
    <br>
    <br>
    <br>
    <h1>panier utilisateur</h1>
    <br>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produit</th>
      <th scope="col">Quantité</th>
      <th scope="col">Total</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
        foreach($commandes as $index=> $commande){
            print' <tr>
            <th scope="row">'.($index+1).'</th>
            <td>'.$commande[5].'</td>
          
            <td>'.$commande[0].'</td>
            
            <td>'.$commande[1].' DT</td>
            
            
            <td> <a class="button-afficher" href ="supprimer_produitpanier.php?id='.$index.'">supprimer</a></td>
          </tr>';
        }




      ?>
      
   
  </tbody>
</table>

     <div>
         <h3>Total:<?php echo $total;  ?>DT</h3>
    <a href ="valid_panier.php" class=button-afficher >Valider</a>
   
    </div>
      </div>
    
        
      

</body>

</html>