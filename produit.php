

<?php
session_start();
function getAllcategorie(){
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
function getProduitsById($id){
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

  $categories = getAllcategorie();
  if(isset($_GET['id'])){
    $produit = getProduitsById($_GET['id']);
  }
 
  

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="produit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Nos produits</title>
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
    <a class="fas fa-shopping-cart" href="panier.php"></a>
    <div class="fas fa-user" id="login-btn"></div>
</div>
</header>
      <div class="row col-12 mt-7">
        
      <div class="card col-8 offset-2" >
  <img src="img/<?php echo $produit['img'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $produit['nom']  ?></h5>
    <p class="card-text"><?php echo $produit['description'] ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo $produit['prix']  ?>DT</li>
    
   
    
  </ul>
  <form action="commandes.php" method="POST">
       <input type="hidden" name="produit" value="<?php echo $produit['id']  ?>">
       <input type="number" name="quantite" class="form-control"  step="1" placeholder="Quantité ">
       <button type="submit" class="button-acheter">Acheter</button>

    </form>
    </div>
  
  
</div>
  <div>
    
         
           
      </div>
    
      <?php
    include "inc/footer.php";


?>
</body>
</html>