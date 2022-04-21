<!DOCTYPE html>
<html lang="es">

<?php include 'partials/head.php' ?>

<body class="animsition">
    <?php
    require_once 'controllers/product.php';
    $product = new Product;
    $products = $product->list();
    require_once 'controllers/supplier.php';
    $supplier = new Supplier;
    $suppliers = $supplier->list();
    ?>
    <div class="page-wrapper">

        <?php include 'partials/nav.php' ?>

        <main class="container">
            <div class="bg-light p-5 mt-5 rounded">
                <h1>Inici</h1>
                <p class="lead">Benvingut a l&apos;aplicació per gestionar productes.</p>

        </main>
        <?php include 'partials/footer.php' ?>
    </div>
</body>

</html>