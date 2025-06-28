<?php include_once 'template/head-admin.php'; ?>

<h1 class="text-center mt-4 mb-2 font-pangolin">Administration du refuge</h1>

<p class="text-center font-pangolin">Modification d'un pensionnaire</p>

<div class="row justify-content-center mx-0 mb-5">
    <div class="container col-lg-8 col-10 px-lg-5 px-3 pb-5 rounded shadow shadow-lg">

        <div class="form-error my-3 text-center"><?= $errors['bdd'] ?? '' ?></div>

        <?php if ($showForm) { ?>

            <!-- novalidate permet de désactiver la validation HTML5 -->
            <form action="" method="POST" novalidate>

                <!-- nous séparons le formulaire en 2 partie pour une meilleur lisibilité -->
                <div class="row mx-0">

                    <!-- premiere partie du formulaire -->
                    <div class="col px-3">

                        <div class="mb-4">
                            <label for="birthdate" class="form-label">Date d'arrivée *</label>
                            <span class="form-error"><?= $errors['arrivaldate'] ?? '' ?></span>
                            <input type="date" class="form-control" name="arrivaldate" id="arrivaldate" value=<?= $_POST['arrivaldate'] ?? Form::formatDateFrToUs($animalDetails['arrivaldate']) ?>>
                        </div>


                        <div class="mb-4">
                            <label for="name" class="form-label">Nom de l'animal *</label>
                            <span class="form-error"><?= $errors['name'] ?? '' ?></span>
                            <input type="text" class="form-control" id="name" name="name" placeholder="ex. Rintintin" value="<?= $_POST['name'] ?? $animalDetails['ani_name'] ?>">
                        </div>


                        <label for="specie" class="form-label">Type d'animal *</label>
                        <span class="form-error"><?= $errors['specie'] ?? '' ?></span>
                        <select class="form-select form-select-sm" name="specie" id="specie">
                            <option value="" selected disabled>Choix du type</option>
                            <?php foreach (Species::getSpecies() as $specie) { ?>
                                <option value="<?= $specie['spe_id'] ?>" <?= isset($_POST['specie']) && $_POST['specie'] == $specie['spe_id'] ? 'selected' : ($animalDetails['spe_id'] == $specie['spe_id'] ? 'selected' : '') ?>><?= ucfirst($specie['spe_name']) ?></option>
                            <?php } ?>
                        </select>


                        <label for="sex" class="form-label mt-4">Sexe de l'animal *</label>
                        <span class="form-error"><?= $errors['sex'] ?? '' ?></span>
                        <select class="form-select form-select-sm" name="sex" id="sex">
                            <option value="" selected disabled>Choix du sexe</option>
                            <option value="m" <?= isset($_POST['sex']) && $_POST['sex'] == 'm' ? 'selected' : ($animalDetails['ani_sex'] == 'm' ? 'selected' : '') ?>>Male</option>
                            <option value="f" <?= isset($_POST['sex']) && $_POST['sex'] == 'f' ? 'selected' : ($animalDetails['ani_sex'] == 'f' ? 'selected' : '') ?>>Femelle</option>
                        </select>


                        <label for="color" class="form-label mt-4">Couleur de l'animal *</label>
                        <span class="form-error"><?= $errors['color'] ?? '' ?></span>
                        <select class="form-select form-select-sm" name="color" id="color">
                            <option value="" selected disabled>Choix de la couleur</option>
                            <?php foreach (Colors::getAllColors() as $color) { ?>
                                <option value="<?= $color['col_id'] ?>" <?= isset($_POST['color']) && $_POST['color'] == $color['col_id'] ? 'selected' : ($animalDetails['col_id'] == $color['col_id'] ? 'selected' : '') ?>><?= ucfirst($color['col_name']) ?></option>
                            <?php } ?>
                        </select>


                        <label for="breed" class="form-label mt-4">Race de l'animal *</label>
                        <span class="form-error mb-4"><?= $errors['breed'] ?? '' ?></span>
                        <select class="form-select form-select-sm" name="breed" id="breed">
                            <option value="" selected disabled>Choix de la race</option>
                            <?php foreach (Breeds::getBreeds() as $breed) { ?>
                                <option value="<?= $breed['bre_id'] ?>" <?= isset($_POST['breed']) && $_POST['breed'] == $breed['bre_id'] ? 'selected' : ($animalDetails['bre_id'] == $breed['bre_id'] ? 'selected' : '') ?>><?= ucfirst($breed['bre_name']) ?></option>
                            <?php } ?>
                        </select>

                    </div>

                    <!-- deuxieme partie du formulaire -->
                    <div class="col px-3">

                        <div class="mb-4">
                            <label for="weight" class="form-label">Poids (En gramme) *</label>
                            <span class="form-error"><?= $errors['weight'] ?? '' ?></span>
                            <input type="text" class="form-control" name="weight" id="weight" value=<?= $_POST['weight'] ?? $animalDetails['ani_weight'] ?>>
                        </div>

                        <div class="mb-4">
                            <label for="birthdate" class="form-label">Date de naissance *</label>
                            <span class="form-error"><?= $errors['birthdate'] ?? '' ?></span>
                            <input type="date" class="form-control" name="birthdate" id="birthdate" value=<?= $_POST['birthdate'] ?? Form::formatDateFrToUs($animalDetails['birthdate']) ?>>
                        </div>


                        <label class="form-label">Informations</label>
                        <div class="mb-2 form-check">
                            <input type="checkbox" class="form-check-input" id="microchipped" name="microchipped" value="1" <?= isset($_POST['microchipped']) && $_POST['microchipped'] == 1 ? 'checked' : ($animalDetails['ani_microchipped'] == 1 ? 'checked' : '')  ?>>
                            <label class="form-check-label" for="microchipped">Pucé(e)</label>
                        </div>


                        <div class="mb-2 form-check">
                            <input type="checkbox" class="form-check-input" id="tattooed" name="tattooed" value="1" <?= isset($_POST['tattooed']) && $_POST['tattooed'] == 1 ? 'checked' : ($animalDetails['ani_tattooed'] == 1 ? 'checked' : '') ?>>
                            <label class="form-check-label" for="tatooed">Tatoué(e)</label>
                        </div>


                        <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input" id="vaccinated" name="vaccinated" value="1" <?= isset($_POST['vaccinated']) && $_POST['vaccinated'] == 1 ? 'checked' : ($animalDetails['ani_vaccinated'] == 1 ? 'checked' : '')  ?>>
                            <label class="form-check-label" for="vaccinated">Vacciné(e)</label>
                        </div>


                        <div class="mb-5">
                            <label for="description" class="form-label">Description *</label>
                            <span class="form-error"><?= $errors['description'] ?? '' ?></span>
                            <textarea class="form-control" id="description" name="description" placeholder="ex. Gentil et calin ... " rows="3"><?= $_POST['description'] ?? $animalDetails['ani_description'] ?></textarea>
                        </div>

                        <div class="text-center">
                            <input type="hidden" name="id" value="<?= $animalDetails['ani_id'] ?>">
                            <button type="submit" class="btn btn-primary font-pangolin mb-lg-0 mb-3">Modifier</button>
                            <a href="../controllers/controller-list.php" class="btn btn-secondary font-pangolin">Annuler</a>
                            <p class="mt-3">* Champs obligatoires</p>
                        </div>

                    </div>

                </div>

            </form>

        <?php } else { ?>
            <!-- Nous indiquons que tout est ok -->
            <p class="text-center font-pangolin h3">Les modifications ont bien été prises en compte <?= isset($_POST['specie']) && $_POST['specie'] == 2 ? '<i class="fa-solid fa-cat"></i>' : '<i class="fa-solid fa-dog"></i>' ?></p>
            <div class="text-center py-3">
                <a href="../controllers/controller-list.php" class="btn btn-primary font-pangolin m-1">Liste des pensionnaires</a>
                <a href="../controllers/controller-admin.php" class="btn btn-secondary font-pangolin m-1">Retour Menu</a>
            </div>

        <?php } ?>
    </div>
</div>

<?php include_once 'template/footer.php'; ?>