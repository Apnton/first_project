<?php
require 'database/QueryBuilder.php';

$db = new QueryBuilder;
$db->update($_POST);

header("Location: /");