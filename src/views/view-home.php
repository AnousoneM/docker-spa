<?php include_once 'template/head.php'; ?>

<div id="pensionnaires" class="container my-4 p-3 font-pangolin">
    <h2 class="ms-2 mb-4 big-h2">Nos Pensionnaires</h2>

    <div class="row mx-0 justify-content-evenly">

        <?php foreach (Animals::getAllAnimals() as $animal) { ?>

            <div class="col-md-5 col-lg-5">
                <div class="row bg-light g-0 border border-secondary-subtle rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">

                    <div class="col-7 p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary-emphasis"><?= ucfirst($animal['bre_name']) ?></strong>
                        <P class="h3 mb-0"><?= $animal['ani_name'] ?></P>
                        <div class="mb-1 text-body-secondary"><?= $animal['birthdate'] ?></div>
                        <p class=" text-truncate"><?= $animal['ani_description'] ?></p>
                        <a href="../controllers/controller-details.php?id=<?= $animal['ani_id'] ?>" class="icon-link gap-1 icon-link-hover stretched-link text-decoration-none">
                            Plus d'infos
                        </a>
                    </div>

                    <div class="col-5 text-center">
                        <img src="../assets/img/<?= $animal['ani_picture'] ?>" alt="Image d'un <?= $animal['spe_name'] ?>" class="img-fluid" />
                    </div>

                </div>
            </div>

        <?php } ?>

    </div>
</div>

<?php include_once 'template/footer.php'; ?>