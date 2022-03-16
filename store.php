<?php
require 'database/QueryBuilder.php';

$db = new QueryBuilder;
$db->store($_POST);
header("Location: /");
