<?php
require 'database/QueryBuilder.php';
$db = new QueryBuilder;
$db->remove($_GET);
header("Location: /");
