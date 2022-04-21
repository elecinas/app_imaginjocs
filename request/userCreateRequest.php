<?php

require_once '../controllers/user.php';

//TODO validate data
//TODO confirm password

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);//Codificacion contraseña
$confirm_password = $_POST['confirm_password'];

$request = [
    "name" => $name,
    "email" => $email,
    "password" => $password
];

$user = new User();
$result = $user->create($request);

if ($result) {
    header("Location: ../index.php");
} else {
    echo "Error BD: Transaction error";
}