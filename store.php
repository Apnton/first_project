<?php
require 'database/QueryBuilder.php';

$db = new QueryBuilder;
$db->store("tasks", $_POST);
header("Location: /");
