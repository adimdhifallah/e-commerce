<?php
session_start();

$id = $_GET['id'];
$supp_total = $_SESSION['panier'][3][$id][1];
$_SESSION['panier'][1] -= $supp_total;
unset($_SESSION['panier'][3][$id]) ;
header('location:panier.php');




?>