<?php

require_once '../controllers/product.php';

//TODO validate data

$name = $_POST['name'];
$code = $_POST['code'];
$cost = $_POST['cost'];
$iva = $_POST['iva'];
$stock = $_POST['stock'];
$current_supplier_id = $_POST['current_supplier_id'];
$image = $_POST['image'];

$request = [
    "name" => $name,
    "code" => $code,
    "cost" => $cost,
    "iva" => $iva,
    "stock" => $stock,
    "current_supplier_id" => $current_supplier_id,
    "image" => $image
];

$product = new Product();
$result = $product->create($request);

if ($result) {
    header("Location: ../products.php");
} else {
    echo "Error BD: Transaction error";
}