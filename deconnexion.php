<?php
session_start();
session_unset();
session_destroy();

header('location:connexion/index.php');



?>