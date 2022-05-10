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
                <div class="row mt-4">
                    <h4>Llistat de productes</h4>
                </div>

                <div class="row">
                    <div class="col-md-3 my-4">
                        <a type="button" class="btn btn-success text-white" data-toggle="modal" data-target=".modal-create-product">Nou producte</a>
                    </div>
                </div>
                <!-- STARTs form modal for create Product -->
                <div class="modal fade modal-create-product" tabindex="-1" role="dialog" aria-labelledby="create-product-label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title h4">Nou producte</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- STARTs new product form -->
                                <form method="POST" action="request/productCreateRequest.php">
                                    <!-- input name -->
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" name="name" class="form-control" placeholder="Introdueix el nom del producte">
                                    </div>
                                    <!-- input code -->
                                    <div class="form-group">
                                        <label for="code">Codi ISBN</label>
                                        <input type="text" name="code" class="form-control" placeholder="9781234567897">
                                    </div>
                                    <!-- input cost -->
                                    <div class="form-group">
                                        <label for="cost">Preu</label>
                                        <input type="text" name="cost" class="form-control" placeholder="9.99">
                                    </div>
                                    <!-- input iva -->
                                    <div class="form-group">
                                        <label for="iva">Tipus d'IVA</label>
                                        <select class="custom-select" name="iva">
                                            <option selected>Escull un tipus d'IVA</option>
                                            <option value="21">21%</option>
                                            <option value="10">10%</option>
                                            <option value="4">4%</option>
                                            <option value="0">0%</option>
                                        </select>
                                    </div>
                                    <!-- input stock -->
                                    <div class="form-group">
                                        <label for="stock">Quantitat de productes en stock</label>
                                        <input type="text" name="stock" class="form-control" placeholder="23">
                                    </div>
                                    <!-- input supplier -->
                                    <div class="form-group">
                                        <label for="current_supplier_id">Proveïdor actual</label>
                                        <select class="custom-select" name="current_supplier_id">
                                            <option selected>Selecciona un dels teus proveïdors</option>
                                            <?php foreach ($suppliers as $supplier) : ?>
                                                <option value="<?php echo $supplier['id'] ?>"><?php echo $supplier['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!-- input image -->
                                    <div class="form-group">
                                        <label for="image">Imatge</label>
                                        <input type="text" name="image" class="form-control" placeholder="https://www.nosolorol.com/22-thickbox_default/aquelarre.jpg">
                                    </div>
                                    <button type="submit" class="btn btn-success">Introduïr producte</button>
                                </form>
                                <!-- ENDs new product form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ENDs form modal for create Product -->

                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Producte</th>
                            <th scope="col">Codi ISBN</th>
                            <th scope="col">Preu</th>
                            <th scope="col">IVA</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Proveïdor actual</th>
                            <th scope="col">Imatge</th>
                            <th scope="col">Accions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $iva = [21, 10, 4, 0];
                        foreach ($products as $product) :
                        ?>
                            <tr>
                                <td>
                                    <?php echo $product['id'] ?>
                                </td>
                                <td>
                                    <?php echo $product['name'] ?>
                                </td>
                                <td>
                                    <?php echo $product['code'] ?>
                                </td>
                                <td>
                                    <?php echo $product['cost'] ?>€
                                </td>
                                <td>
                                    <?php echo $product['iva'] ?>%
                                </td>
                                <td>
                                    <?php echo $product['stock'] ?>
                                </td>
                                <td>
                                    <?php echo $product['supplier_name'] ?>
                                </td>
                                <td> <img src="<?php echo $product['image'] ?>" width="60" alt=""> </td>
                                <td style="text-align: right">
                                    <div class="btn-group" role="group">
                                        <a type="button" href="" class="btn btn-warning" style="border-radius: 5px 0 0 5px;" data-toggle="modal" data-target=".modal-edit-product-<?php echo $product['id'] ?>">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                        <a type="button" href="request/productDeleteRequest.php?id=<?php echo $product['id'] ?>" class="btn btn-danger" style="border-radius: 0 5px 5px 0;">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <!-- STARTs form modal for edit Product -->
                            <div class="modal fade modal-edit-product-<?php echo $product['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title h4">Edita el producte <?php echo $product['name'] ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- STARTs edit product form -->
                                            <form method="POST" action="request/productEditRequest.php?id=<?php echo $product['id']; ?>">
                                                <!-- input name -->
                                                <div class="form-group">
                                                    <label for="name">Nombre</label>
                                                    <input type="text" name="name" class="form-control" value="<?php echo $product['name'] ?>">
                                                </div>
                                                <!-- input code -->
                                                <div class="form-group">
                                                    <label for="code">Codi ISBN</label>
                                                    <input type="text" name="code" class="form-control" value="<?php echo $product['code'] ?>">
                                                </div>
                                                <!-- input cost -->
                                                <div class="form-group">
                                                    <label for="cost">Preu</label>
                                                    <input type="text" name="cost" class="form-control" value="<?php echo $product['cost'] ?>">
                                                </div>
                                                <!-- input iva -->
                                                <div class="form-group">
                                                    <label for="iva">Tipus d'IVA</label>
                                                    <select class="custom-select" name="iva">
                                                        <?php for ($i = 0; $i < 4; $i++) : ?>
                                                            <option value="<?php echo $iva[$i] ?>" <?php if ($iva[$i] == $product['iva']) {
                                                                                                        echo 'selected';
                                                                                                    } ?>>
                                                                <?php echo $iva[$i] ?>%
                                                            </option>
                                                        <?php endfor; ?>
                                                    </select>
                                                </div>
                                                <!-- input stock -->
                                                <div class="form-group">
                                                    <label for="stock">Quantitat de productes en stock</label>
                                                    <input type="text" name="stock" class="form-control" value="<?php echo $product['stock'] ?>">
                                                </div>
                                                <!-- input supplier -->
                                                <div class="form-group">
                                                    <label for="current_supplier_id">Proveïdor actual</label>
                                                    <select class="custom-select" name="current_supplier_id">
                                                        <option selected>Selecciona un dels teus proveïdors</option>
                                                        <?php foreach ($suppliers as $supplier) : ?>
                                                            <option value="<?php echo $supplier['id'] ?>" <?php if ($supplier['id'] == $product['current_supplier_id']) {
                                                                                                                echo 'selected';
                                                                                                            } ?>>
                                                                <?php echo $supplier['name'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <!-- input image -->
                                                <div class="form-group">
                                                    <label for="image">Imatge</label>
                                                    <input type="text" name="image" class="form-control" value="<?php echo $product['image'] ?>">
                                                </div>
                                                <button type="submit" class="btn btn-success">Editar producte</button>
                                            </form>
                                            <!-- ENDs edit product form -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ENDs form modal for edit Product -->
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </main>
        <?php include 'partials/footer.php' ?>
    </div>
</body>

</html>