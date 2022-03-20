<?php
require 'vendor/autoload.php';
use Delight\Auth\Auth;


$pdo = new \PDO('mysql:dbname=crud;host=localhost;charset=utf8mb4', 'root');

$auth = new Auth($pdo);

try {
    $auth->login($_POST['email'], $_POST['password']);

    echo 'User is logged in';
}
catch (\Delight\Auth\InvalidEmailException $e) {
    die('Wrong email address');
}
catch (\Delight\Auth\InvalidPasswordException $e) {
    die('Wrong password');
}
catch (\Delight\Auth\EmailNotVerifiedException $e) {
    die('Email not verified');
}
catch (\Delight\Auth\TooManyRequestsException $e) {
    die('Too many requests');
}
echo $auth->getEmail();
$auth->logOut();
echo $auth->getEmail();
var_dump($auth->check());
