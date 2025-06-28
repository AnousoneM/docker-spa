<?php

// j'ouvre ma session
session_start();

require_once '../config.php';

require_once '../helpers/Database.php';
require_once '../helpers/Form.php';

require_once '../models/Animals.php';

$animalFound = false;

// Nous vérifions que l'id est bien présent dans l'URL et qu'il n'est pas vide. 
// Sinon nous redirigeons l'utilisateur vers la page d'accueil.
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Nous vérifions également que l'id est bien un nombre entier à l'aide de la fonction prédéfinie ctype_digit().
    // Si ce n'est pas le cas, nous redirigeons l'utilisateur vers la page d'accueil.
    if (!ctype_digit($_GET['id'])) {
        header('Location: ../index.php');
        exit();
    } else {
        // Si c'est le cas, nous créons une variable $id qui contiendra l'id de l'animal.  
        // Nous allons également appeler la méthode getAnimalDetail() pour récupérer les informations de l'animal.
        $id = strip_tags($_GET['id']);
        $animal = new Animals();
        $animalDetails = $animal->getAnimalDetails($id);

        // Nous vérifions que l'animal a été trouvé, si oui nous modifions la valeur de la variable $animalFound à true pour afficher les informations de l'animal.
        if ($animalDetails != false) {
            $animalFound = true;
        }
    }
} else {
    header('Location: ../index.php');
    exit();
}

?>

<?php include_once '../views/view-details.php'; ?>