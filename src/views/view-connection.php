<?php include_once 'template/head-admin.php'; ?>

<p class="h1 text-center my-4 font-pangolin">Connexion à l'espace administration</p>

<div class="container text-center">
    <form action="" method="POST">

        <div class="row flex-column justify-content-center align-items-center">
            <div class="mb-4 col-4">
                <label for="login" class="form-label">Login *</label>
                <span class="connection-error"><?= $errors['login'] ?? '' ?></span>
                <input type="text" class="form-control" name="login" id="login" value=<?= $_POST['login'] ?? '' ?>>
            </div>
            <div class="mb-4 col-4">
                <label for="birthdate" class="form-label">Mot de passe *</label>
                <span class="connection-error"><?= $errors['password'] ?? '' ?></span>
                <input type="password" class="form-control" name="password" id="password" value=<?= $_POST['password'] ?? '' ?>>
            </div>
            <div class="mb-4 col-4">
                <button type="submit" class="btn btn-primary font-pangolin">Se connecter</button>
            </div>
        </div>

    </form>
</div>

<?php include_once 'template/footer.php'; ?>