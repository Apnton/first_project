<?php
require '../../database/QueryBuilder.php';
require '../../components/Auth.php';
$db = new QueryBuilder;
$users = $db->all('users');
$auth= new Auth($db);
$auth->remove('users', $_GET);
header("Location: ../../views/user/list.php");
