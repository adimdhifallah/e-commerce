
<?php
//connexion ala base donneee
$servername = "localhost";
$DBuser = "root";
$DBpassword = "";
$DBname = "e_commerce";
if(isset($_POST['create'])){ // lorsqu'on appuie sur le boutton 

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$passd = $_POST['passd'];


$conn =mysqli_connect('localhost','root','','login') ;
//requette d'inssertion des donnees dans la base
$req= " INSERT INTO client(nom,prenom,mail,passd) VALues ('$nom','$prenom','$mail','$passd')";
$res= mysqli_query($conn,$req);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>s'inscrire</title>
    <link rel="stylesheet" href="../connexion/s2.css">
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
                
               <h1> S'inscrire </h1>
        </div>



        <div class="center">
       
            <form action="" method="post">
                <div class="inpt">
                    <input type="text" name="nom" id="" required>
                    <span></span>
                    <label for="">Votre nom </label>
                </div>
                <div class="inpt">
                    <input type="text" name="prenom" id="" required>
                    <span></span>
                    <label for="">Votre Prénom</label>
                </div>
    
                <div class="inpt">
                    <input type="email" name="mail" id="" required>
    
                    <span></span>
                    <label for="">Entrez votre email</label>
                </div>
    
                <div class="inpt">
                    <input type="password" name="passd" id="" required>
    
    
                    <span></span>
                    <label for=""> votre mot de passe</label>
                </div>
                <input type="submit" onclick="myFunction()" name="create" value="CET IT NOW">
               
                <a class="bk" href="index.php"><h4 >back</h4></a>
    
    
    
            </form>
    
        </div>
    </section>
    <script>
        function myFunction() {
          alert("Inscription avec succée!");
        }
        </script>
    
    
</body>
</html>