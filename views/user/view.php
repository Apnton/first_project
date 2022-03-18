<?php
require '../../database/QueryBuilder.php';
$db = new QueryBuilder();

$user = $db->getOne('users', $_GET);



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">

    <div class="row justify-content-center align-items-center">
        <h1 class="text-center">User profile</h1>
        <div class="col-md-4 mt-4">
            <img src="../../uploads/avatar.jpg" alt="">
            <h2><?=$user['email']?></h2>
            <form action="../../controllers/user/uploadimage.php" method="post" enctype="multipart/form-data">
                <input class="form-control mt-4" type="file" name="image">
                <input type="hidden" name="id" value="<?=$user['id']?>">
                <button class="btn btn-primary mt-4" type="submit">Загрузить</button>
            </form>

    </div>
    </div>
</div>
</body>
</html>