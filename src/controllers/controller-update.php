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
require_once '../models/Colors.php';
require_once '../models/Species.php';
require_once '../models/Breeds.php';

// Nous définissons un tableau d'erreurs
$errors = [];
// Nous définissons une variable permettant cacher / afficher le formulaire
$showForm = true;


// Nous vérifions que l'id est bien présent dans l'URL et qu'il n'est pas vide.
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Nous vérifions également que l'id est bien un nombre entier à l'aide de la fonction prédéfinie ctype_digit().
    // Si ce n'est pas le cas, nous redirigeons l'utilisateur vers la liste de pensionnaires.
    if (!ctype_digit($_GET['id'])) {
        header('Location: ../controllers/controller-list.php');
        exit();
    } else {
        // Si c'est le cas, nous créons une variable $id qui contiendra l'id de l'animal.  
        $id = strip_tags($_GET['id']);
        // Nous allons également appeler la méthode getAnimalDetail() pour récupérer les informations de l'animal.
        $animal = new Animals();
        $animalDetails = $animal->getAnimalDetails($id);

        // Nous vérifions que l'animal a été trouvé, si false, nous effecutuons un retour à la liste.
        if ($animalDetails === false) {
            header('Location: ../controllers/controller-list.php');
            exit();
        }
    }
} else {
    header('Location: ../controllers/controller-list.php');
    exit();
}




if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Contrôle du nom : vide et pattern
    if (isset($_POST['name'])) {

        if (empty($_POST['name'])) {
            $errors['name'] = 'Le nom est obligatoire';
        } else if (!preg_match(REGEX_NAME, $_POST['name'])) {
            $errors['name'] = 'Le nom n\'est pas valide';
        }
    }

    // controle du type : si selectionné et si existe dans la base de données
    if (!isset($_POST['specie'])) {
        $errors['specie'] = 'Veuillez sélectionner un type';
    }

    // controle du sexe : si selectionné et si existe dans la base de données
    if (!isset($_POST['sex'])) {
        $errors['sex'] = 'Veuillez sélectionner un sexe';
    }

    // controle de la couleur : si selectionné et si existe dans la base de données
    if (!isset($_POST['color'])) {
        $errors['color'] = 'Veuillez sélectionner une type couleur';
    }

    // controle de la race : si selectionné et si existe dans la base de données
    if (!isset($_POST['breed'])) {
        $errors['breed'] = 'Veuillez sélectionner une race';
    }

    // controle de la arrivaldate : si vide
    if (isset($_POST['arrivaldate'])) {
        if (empty($_POST['arrivaldate'])) {
            $errors['arrivaldate'] = 'Date d\'arrivée obligatoire';
        }
    }

    // controle de la birthdate : si vide
    if (isset($_POST['birthdate'])) {
        if (empty($_POST['birthdate'])) {
            $errors['birthdate'] = 'Date de naissance obligatoire';
        }
    }

    // controle du poids : vide et pattern
    if (isset($_POST['weight'])) {
        if (empty($_POST['weight'])) {
            $errors['weight'] = 'Le poids est obligatoire';
        } else if (!preg_match(REGEX_WEIGHT, $_POST['weight'])) {
            $errors['weight'] = 'Le poids n\'est pas valide';
        }
    }

    // Contrôle de la description : vide et pattern
    if (isset($_POST['description'])) {

        if (!preg_match(REGEX_NAME, $_POST['description'])) {
            $errors['description'] = 'Le texte n\'est pas valide';
        }

        if (empty($_POST['description'])) {
            $errors['description'] = 'La description est obligatoire';
        }
    }

    // si le tableau d'erreurs est vide, on ajoute l'animal dans la base de données
    if (empty($errors)) {
        // instanciation de la classe Animals
        $animal = new Animals();
        // utilisation de la méthode addAnimal pour ajouter un animal dans la base de données
        // si la méthode retourne true, on cache le formulaire à l'aide de la variable $showForm
        if ($animal->updateAnimal($_POST)) {
            $showForm = false;
        } else {
            // nous mettons en place un message d'erreur dans le cas où la requête échouée
            $errors['bdd'] = 'Une erreur est survenue lors de l\'ajout de l\'animal';
        }
    }
}

?>

<?php include_once '../views/view-update.php'; ?>
