<?php
if(!session_status()) {
    session_start();
}
require 'components/Auth.php';
require  'database/QueryBuilder.php';
$db = new QueryBuilder();
$auth = new Auth($db);
$data = [
    'email' => $_POST['email'],
    'password' => md5($_POST['password'])
];

$auth->login('users', $data);
var_dump($auth->currentUser());


