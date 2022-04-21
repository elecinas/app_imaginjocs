<?php
session_start();
if (isset($_SESSION['user_email'])) {
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<?php include 'partials/head.php' ?>

<body class="animsition">
    <div class="page-wrapper">

        <?php include 'partials/nav.php' ?>

        <main class="container">
            <div class="bg-light p-5 mt-5 rounded d-flex flex-column align-items-center">
                <h1>Inicia sessió</h1>
                <p class="lead">Introdueix el teu nom d'usuari i contrassenya.</p>
                <div class="form-login-container">
                    <!-- login form -->
                    <form action="request/userLoginRequest.php" method="POST">
                        <!-- email input -->
                        <div class="form-outline mb-4">
                            <input type="email" name="email" id="email" class="form-control" required/>
                            <label class="form-label" for="email">Correu electrònic</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" name="password" id="password" class="form-control" required/>
                            <label class="form-label" for="password">Contrassenya</label>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-dark btn-block mb-4">Sign in</button>

                        <!-- Register buttons -->
                        <div class="text-center">
                        <p>Encara no tens compte? <a href="signup.php">Registra't</a></p>
                        </div>
                    </form>
                    <!-- login form -->
                </div>
        </main>
        <?php include 'partials/footer.php' ?>
    </div>
</body>

</html>