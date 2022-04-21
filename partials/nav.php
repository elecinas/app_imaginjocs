<?php
session_start();
$user_email = "";
$user_name = "";
//TODO watch video :3
if (isset($_SESSION['user_email'])) {
    $user_email = $_SESSION['user_email'];
    $user_name = $_SESSION['user_name'];
    $user_is_admin = $_SESSION['user_is_admin'];
}
?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-uppercase" href="index.php">imaginjocs</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a 
                        class="nav-link 
                            <?php if (!empty($user_email && $user_is_admin == 1)) : ?>
                                active
                            <?php else : ?>
                                disabled
                            <?php endif ?>
                            " 
                        aria-current="page" 
                        href="products.php" 
                        <?php if (!empty($user_email && $user_is_admin == 1)) : ?>
                            aria-disabled="true" 
                        <?php endif ?>>Productes
                    </a>
                </li>
                <li class="nav-item">
                    <a 
                        class="nav-link 
                            <?php if (!empty($user_email && $user_is_admin == 1)) : ?>
                                active
                            <?php else : ?>
                                disabled
                            <?php endif ?>
                            " 
                        aria-current="page" 
                        href="suppliers.php" 
                        <?php if (!empty($user_email && $user_is_admin == 1)) : ?>
                            aria-disabled="true" 
                        <?php endif ?>>Proveïdors
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#!" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <p class="m-0 text-white">
                    <?php if (!empty($user_name)) : ?>
                        <?= $user_name ?> / <a href="../request/userLogoutRequest.php">Logout</a>
                    <?php else : ?>
                        <a href="login.php">login</a> /<a href="signup.php"> sign up</a>
                    <?php endif ?>
                </p>
            </div>
        </div>
    </div>
</nav>