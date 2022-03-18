<?php
session_start();
require 'database/QueryBuilder.php';
require 'components/Auth.php';
$db = new QueryBuilder;

$auth = new Auth($db);
$data = [
    'email' => $_POST['email'],
    'password' => md5($_POST['password'])
];


if($auth->register('users', $data)) {
    header("Location: form_signin.php");
}else {
    $_SESSION['error'] = 'Такой пользователь уже существует';
    header("Location: form_signup.php");
}





