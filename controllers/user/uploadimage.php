<?php

require '../../database/QueryBuilder.php';
require '../../components/ImageManager.php';
$db = new QueryBuilder();

$imageManager = new ImageManager($db);
$fileName = $imageManager->upload($_FILES);

    $data = [
        'id' => $_POST['id'],
        'image' => $fileName
    ];
    $db->update('users', $data);







