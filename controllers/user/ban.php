<?php
require '../../database/QueryBuilder.php';
require '../../components/Auth.php';
$db = new QueryBuilder;
$users = $db->all('users');
$auth= new Auth($db);

$data = [
    'id' => $_GET['id'],
    'banned' => 1
];


$auth->ban('users', $data);
header("Location: ../../views/user/list.php");

