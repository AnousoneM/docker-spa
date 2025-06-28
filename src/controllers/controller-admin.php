<?php 

// j'ouvre ma session
session_start();

// je vérifie que l'utilisateur est bien connecté
if(!isset($_SESSION['user'])){
    header('Location: ../index.php');
    exit;
}

include_once '../views/view-admin.php'; 

?>