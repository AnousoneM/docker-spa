<footer class="footer mt-auto py-5 text-center font-pangolin">
    <a class="text-decoration-none text-white" href="../controllers/controller-connection.php">Footer by Afpa - DWWM - 2023</a>

    <!-- je fais apparaitre un lien de déconnexion uniquement si l'utilisateur est connecté -->
    <?php if (isset($_SESSION['user'])) { ?>
        <a class="text-decoration-none text-dark d-block mt-1" href="../controllers/controller-disconnection.php">Déconnexion</a>
    <?php } ?>

</footer>
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>