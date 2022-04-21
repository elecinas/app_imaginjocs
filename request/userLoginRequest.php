<?php

session_start();

require_once '../controllers/user.php';

//TODO validate data

$email = $_POST['email'];
$password = $_POST['password'];

$request = [
    "email" => $email,
    "password" => $password
];

$user = new User();
$result = $user->login($request);

if ($result) {
    if(password_verify($password, $result[0]['password'])){

        $_SESSION['user_email'] = $result[0]['email'];
        $_SESSION['user_name'] = $result[0]['name'];
        $_SESSION['user_is_admin'] = $result[0]['is_admin'];

        header("Location: ../index.php");

    } else {
        echo "Contraseña no válida";
    }
} else {
    echo "Error BD: Transaction error";
}
