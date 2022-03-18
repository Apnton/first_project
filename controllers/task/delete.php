<?php
require '../../database/QueryBuilder.php';
$db = new QueryBuilder;
$db->remove("tasks", $_GET);
header("Location: /");
