
<?php


include "../../inc/functions.php";
$categories = getAllcategories();
$produits = getAllproducts();





?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Admin:produits</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

  
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    
    <link href="../css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">DermatoNet</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
        <a href="../../deconnexion.php" class="btn btn-primary">déconnexion</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
      <?php       
           include "../template/navigation.php ";
        
        ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Produits</h1>

            <a  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ajouter</a>
           
           
          </div>
          <?php

if(isset($_GET['ajout']) && $_GET['ajout'] =="ok"){
  print '<div class="alert-success">
  Produit ajoutée  avec succés
</div>';
}


?>
<?php
if(isset($_GET['supp']) && $_GET['supp'] =="ok"){
               print '<div class="alert-success">
               Produit supprimée avec succés
             </div>';
             }


?>
          
 <?php

if(isset($_GET['modif']) && $_GET['modif'] =="ok"){
  print '<div class="alert-success">
  Produit modifiée avec succés
</div>';
}


?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">prix</th>
      <th scope="col">image</th>
      <th scope="col">categorie</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
       $i=0;

   foreach($produits as  $p){
         $i++; 
       print ' <tr>
       <th scope="row">'.$i.'</th>
       <td>'.$p['nom'].'</td>
       <td>'.$p['description'].'</td>
       <td>'.$p['prix'].'</td>
       <td>'.$p['img'].'</td>
       <td>'.$p['categorie'].'</td>
       <td colspan="2">
       <a class="btn btn-success" data-toggle="modal" data-target="#editModal'.$p['id'].'">Modifier</a><br>
       <a href="supprimer.php?idc='.$p['id'].'" class="btn btn-danger">Supprimer</a></td>
     </tr>  ';
      
   }



   ?>
    
    
  </tbody>
</table>


   <!-- Modal ajout -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter Produits</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="ajout.php" method="POST" enctype="multipart/form-data">
         <div class="form-group">
           <input type="text" name="nom" class="form-control" placeholder="nom de produit...">

        </div>
        <div class="form-group">
           <textarea  name="description" class="form-control" placeholder="Description de produit..."></textarea>

        </div>
        <div class="form-group">
           <input type="number" name="prix" step="0.01"class="form-control" placeholder="prix de produit...">

        </div>
        <div class="form-group">
           <input type="file" name="image" class="form-control" placeholder="image de produit...">

        </div>
        <div class="form-group">
            <select class="form-control"  name="categorie" >
               
            <?php
            foreach($categories as $index => $c){
                print '<option value="'.$c['id'].'"> '.$c['nom'].'  </option>';
            }
            ?>
            </select>



       
      <div class="modal-footer">
   
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
      </form>
    </div>
  </div>
</div>

          <div>
          

        
          
            
 





            </div>
          


          

          
          </div>
        </main>
      </div>
    
    </div>
    <?php
  foreach($produits as $index => $produit){?>
      <!-- Modal modifier -->
<div class="modal fade" id="editModal<?php  echo $produit['id'];   ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="modifier.php" method="post" id="addform" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $produit['id']; ?> "name="idc">
       
       
       <div class="form-group" id="bloknom">
           <input type="text" name="nom" id="nom"class="form-control" value="<?php echo $produit['nom'];?>">

        </div>
        <div class="form-group">
           <textarea  name="description" class="form-control" ><?php echo $produit['description'];?></textarea>

        </div>
        <div class="form-group" id="bloknom">
           <input type="number" name="prix" id="prix" step ="0.01" class="form-control" value="<?php echo $produit['prix'];?>">

        </div>
        <div class="form-group" id="bloknom">
           <input type="file" name="image" id="image"class="form-control" value="<?php echo $produit['img'];?>">

        </div>
        <div class="form-group">
            <select class="form-control"  name="categorie" >
               
            <?php
            foreach($categories as $index => $c){
                print '<option value="'.$c['id'].'"> '.$c['nom'].'  </option>';
            }
            ?>
            </select>
          </div>
                 
     
      </div>
      <div class="modal-footer">
   
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
      </form>
    </div>
  </div>
</div>
  <?php   

  }


?>
      
  

  
     
 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../js/vendor/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

   
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    
    </script>
  </body>
</html>
