
<?php


if(isset($_POST['creer'])){
    $servername = "localhost";
    $DBuser = "root";
    $DBpassword = "";
    $DBname = "e_commerce";
    $passd = $_POST['passd'];
    $mail = $_POST['mail'];
  
   
    $conn =mysqli_connect($servername,$DBuser,$DBpassword,$DBname) ;
      $query="SELECT * FROM client where mail='$mail' and passd='$passd'and admin='1'";
       $result=mysqli_query($conn,$query);
       if(mysqli_num_rows($result)==1)
       {
          
           header('location:../admin/profile.php');
       }
       
      
       $query1="SELECT * FROM client where mail='$mail' and passd='$passd' and admin='0'";
       $resultat=mysqli_query($conn,$query1);
       $client = $resultat->fetch_row();
       if(mysqli_num_rows($resultat)==1)
         
       {
        
           session_start();
           $_SESSION['mail'] =$client['mail'];
           $_SESSION['passd'] =$client['passd'];
           $_SESSION['id'] =$client['id'];
           $_SESSION['login']='true';
           header('location: ../produits.php');
       }
       
       else{echo'compte introuvable!';} 
    
    
    }
    
    
    ?>
    
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>s'inscrire</title>
    <link rel="stylesheet" href="../connexion/s1.css">
</head>

<body>
    <header>
        <a href="../connexion/index.php" class="logo"> <span id="logo1">Dermato</span> Net</a>
        <nav class="navigation">
            <a href="#Home">Accueil</a>
            <a href="#About">A propos</a> 
            <a href="f1.php">Contact</a>
            
        
        </nav>


    </header>



    <section>
        
        <div class="title">
            <h1><br>
                
                Se connecter </h1>
        </div>
        
    
    <div class="center">
       
        <form action="" method="post">
           

            <div class="inpt">
                <input type="email" name="mail" id="" required>

                <span></span>
                <label for="">Entrez votre email</label>
            </div>

            <div class="inpt">
                <input type="password" name="passd" id="" required>
               


                <span></span>
                <label for="">Insérez votre mot de passe</label>
            </div>
            <input type="submit"  name="creer" value="CET IT NOW">
           
            <a class="bk" href="index.php"><h4 >back</h4></a>



        </form>

    </div>
</section>




</body>

</html>