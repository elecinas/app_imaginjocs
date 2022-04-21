<?php
session_start();
if (isset($_SESSION['user_email']) && $_SESSION['user_is_admin'] == 0) {
    header('Location: ../index.php');
}
?>
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

                <div class="row">
                    <div class="col-md-3 my-4">
                        <a class="btn btn-success" href="">Nou proveidor</a>
                    </div>
                </div>

                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Proveidor</th>
                            <th scope="col">Telefon</th>
                            <th scope="col">Nif</th>
                            <th scope="col">Direcció</th>
                            <th scope="col">Logo</th>
                            <th scope="col" style="text-align: right">Accions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($suppliers as $supplier) : ?>
                            <tr>
                                <td>
                                    <?php echo $supplier['id'] ?>
                                </td>
                                <td>
                                    <?php echo $supplier['name'] ?>
                                </td>
                                <td>
                                    <?php echo $supplier['phone'] ?>
                                </td>
                                <td>
                                    <?php echo $supplier['nif'] ?>
                                </td>
                                <td>
                                    <?php echo $supplier['address'] ?>
                                </td>
                                <td><img src="<?php echo $supplier['logo'] ?>" width="60" alt=""> </td>


                                <td style="text-align: right">
                                    <div class="btn-group" role="group">
                                        <form method="GET" action="">
                                            <button type="submit" href="" class="btn btn-warning" style="border-radius: 5px 0 0 5px;">
                                                <i class="fa-solid fa-pencil"></i>
                                            </button>
                                        </form>
                                        <form method="POST" action="">
                                            <button type="submit" href="" class="btn btn-danger" style="border-radius: 0 5px 5px 0;">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>



                <div class="row" style="margin-top: 4rem; margin-bottom: 1rem; ">
                    <h4>Dades proveïdors de nombre_producto</h4>
                </div>
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Proveedor</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Día entrega</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--@foreach ($first_product->suppliers as $catan_supplier)-->
                        <tr>
                            <td>
                                <!--{{ $first_product->name }}-->
                            </td>
                            <td>
                                <!--{{ $catan_supplier->name }}-->
                            </td>
                            <td>
                                <!--{{ $catan_supplier->pivot->product_quantity }}-->
                            </td>
                            <td>
                                <!--{{ $catan_supplier->pivot->order_day }}-->
                            </td>
                        </tr>
                        <!--@endforeach-->
                    </tbody>
                </table>
            </div>

        </main>
        <?php include 'partials/footer.php' ?>
    </div>
</body>

</html>