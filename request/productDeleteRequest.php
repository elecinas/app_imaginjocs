<?php

require_once '../controllers/product.php';

$id = $_GET['id'];

$product = new Product();
$result = $product->delete($id);

if ($result) {
    header("Location: ../products.php");
} else {
    echo "Error BD: Transaction error";
}
