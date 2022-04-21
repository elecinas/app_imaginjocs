<?php

require_once '../controllers/product.php';

$id = $_GET['id'];

//TODO validate data

$name = $_POST['name'];
$code = $_POST['code'];
$cost = $_POST['cost'];
$iva = $_POST['iva'];
$stock = $_POST['stock'];
$current_supplier_id = $_POST['current_supplier_id'];
$image = $_POST['image'];

$request = [
    "id" => $id,
    "name" => $name,
    "code" => $code,
    "cost" => $cost,
    "iva" => $iva,
    "stock" => $stock,
    "current_supplier_id" => $current_supplier_id,
    "image" => $image
];

$product = new Product();
$result = $product->update($request);

if ($result) {
    header("Location: ../products.php");
} else {
    echo "Error BD: Transaction error";
}
