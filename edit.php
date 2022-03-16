<?php
require 'database/QueryBuilder.php';
$db = new QueryBuilder;
$task = $db->getOne("tasks", $_GET);


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
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Tasks</h1>
            <form action="update.php" method="post">
                <div class="form-group">
                    <div class="form-group">
                        <input name="id" type="hidden" value="<?=$task['id']?>" class="form-control">
                    </div>
                    <input name="title" type="text" value="<?=$task['title']?>" class="form-control">
                </div>
                <div class="form-group mt-4">
                    <textarea name="content" class="form-control" ><?=$task['content']?></textarea>
                </div>
                <div class="form-group mt-4">
                    <button class="btn btn-success">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>
</body>
</html>