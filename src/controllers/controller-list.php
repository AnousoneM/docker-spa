<?php

// j'ouvre ma session
session_start();

// je vérifie que l'utilisateur est bien connecté
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit;
}

require_once '../config.php';

require_once '../helpers/Database.php';
require_once '../helpers/Form.php';

require_once '../models/Animals.php';

$errors = [];

if (isset($_GET['action'])) {

    // DELETE   
    // nous allons vérifier que l'action demandée est bien delete
    if ($_GET['action'] == 'delete') {

        if (isset($_GET['id']) && !empty($_GET['id'])) {
            // Nous vérifions également que l'id est bien un nombre entier à l'aide de la fonction prédéfinie ctype_digit().
            // Si ce n'est pas le cas, nous allons créer un message d'erreur.
            if (!ctype_digit($_GET['id'])) {
               $errors['message'] = '<i class="fa-solid fa-triangle-exclamation me-1"></i> L\'id doit être un nombre entier';
            } else {
                // Si c'est le cas, nous créons une variable $id qui contiendra l'id de l'animal.  
                // Nous allons également appeler la méthode getAnimalDetail() pour récupérer les informations de l'animal.
                $id = strip_tags($_GET['id']);
                $animal = new Animals();
                $animalDetails = $animal->getAnimalDetails($id);

                // Nous vérifions que l'animal a été trouvé, si oui nous modifions la valeur de la variable $animalFound à true pour afficher les informations de l'animal.
                if ($animalDetails != false) {
                    // Nous allons appeler la méthode deleteAnimal() pour supprimer l'animal.
                    $deleteAnimal = $animal->deleteAnimal($id);
                    // Si la suppression a fonctionné, nous redirigeons l'utilisateur vers la page d'accueil.
                    if ($deleteAnimal) {
                        $errors['message'] = 'Le pensionnaire a bien été archivé';
                    } else {
                        $errors['message'] = '<i class="fa-solid fa-triangle-exclamation"></i> La suppression a échoué';
                    }
                } else {
                    $errors['message'] = '<i class="fa-solid fa-triangle-exclamation"></i> Le pensionnaire spécifié n\'existe pas';
                }
            }
        }
    }
}







?>

<?php include_once '../views/view-list.php'; ?>

