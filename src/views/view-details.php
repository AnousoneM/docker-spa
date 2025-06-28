<?php include_once 'template/head.php'; ?>

<div id="pensionnaires" class="container bg-light rounded shadow my-4 p-3 font-pangolin">

    <?php if ($animalFound === true) { ?>
        <p class="ms-2 text-center h1 big-h2"><?= $animalDetails['ani_name'] ?></p>
        <p class="ms-2 text-secondary-emphasis text-center h3"><?= ucfirst($animalDetails['bre_name']) . ' - ' . ($animalDetails['ani_sex'] == 'm' ? 'Mâle' : 'Femelle')  ?></p>
        <p class="text-body-secondary text-center">Né(e) le <?= $animalDetails['birthdate'] ?></p>
        <hr>
        <div class="row justify-content-center">

            <div class="col-md-5 p-4">
                <img class="img-fluid shadow rounded" src="../assets/img/<?= $animalDetails['ani_picture']?>" alt="Photo d'un <?= $animalDetails['spe_name'] ?>">
            </div>

            <div class="col-md-7 p-4">
                <p class="fw-normal h6"><i class="fa-solid fa-house me-2"></i>Date d'arrivée au refuge : <?= $animalDetails['arrivaldate'] ?></p>
                <ul>
                    <li><b>Vacciné(e) : </b><?= $animalDetails['ani_vaccinated'] == 0 ? 'Non' : 'Oui' ?></li>
                    <li><b>Tatoué(e) : </b><?= $animalDetails['ani_tattooed'] == 0 ? 'Non' : 'Oui'  ?></li>
                    <li><b>Pucé(e) : </b><?= $animalDetails['ani_microchipped'] == 0 ? 'Non' : 'Oui'  ?></li>
                </ul>
                <p class="fw-normal h2"><?= $animalDetails['ani_description'] ?></p>
            </div>

            <div class="text-center">
                <a href="../index.php" class="btn btn-sm btn-secondary mt-2">Retour</a>
            </div>

        </div>
    <?php } else { ?>
        <p class="text-center mt-3 h4">Il n'y a pas d'animal correspondant</p>
        <div class="text-center">
            <a href="../index.php" class="btn btn-sm btn-secondary mt-2">Retour</a>
        </div>
    <?php } ?>






</div>

<?php include_once 'template/footer.php'; ?>