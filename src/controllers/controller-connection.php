<?php

// j'ouvre ma session
session_start();

// si l'utilisateur est déjà connecté, je le redirige vers le menu admin
if (isset($_SESSION['user'])) {
    header('Location: ../controllers/controller-admin.php');
    exit;
}

// j'appelle ma config
require_once '../config.php';

// j'appelle mes helpers
require_once '../helpers/Database.php';
require_once '../helpers/Form.php';

// j'appelle mes models
require_once '../models/Users.php';

$errors = []; // je créé un tableau d'erreurs vide

// Je vérifie si la méthode de requête est bien POST pour lancer mes traitements
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // on recupère les valeurs dans la super global $_POST
    $login = $_POST['login'];
    $password = $_POST['password'];

    // je verifie que le login existe dans la base de données à l'aide de la méthode checkLogin()
    if (Users::checkLogin($login)) {
        // je verifie que le mot de passe correspond au mdp associé au login à l'aide de la méthode checkPassword()
        if (Users::checkPassword($login, $password)) {  
            // Si tout est ok, je créé une session et je redirige vers le menu admin
            $_SESSION['user'] = $login;
            header('Location: ../controllers/controller-admin.php');
            exit;
        } else {
            $errors['password'] = 'Mauvais mot de passe';
        }
    } else {
        $errors['login'] = 'Mauvais login';
    }
}


// Inclus la vue respective
include_once '../views/view-connection.php';


