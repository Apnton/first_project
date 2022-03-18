<?php
if(!session_status()) {
    session_start();
}
require 'database/QueryBuilder.php';
require 'components/Auth.php';

$db = new QueryBuilder;
$auth = new Auth($db);


$data = [
    'email' => $_POST['email'],
    'password' => md5($_POST['password'])
];

$auth->login('users', $data);



