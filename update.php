<?php
require 'database/QueryBuilder.php';

$db = new QueryBuilder;
$db->update("tasks", $_POST);

header("Location: /");