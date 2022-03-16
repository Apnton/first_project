<?php

require 'database/QueryBuilder.php';
$db = new QueryBuilder;


$tasks = $db->getAll();

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
            <h1>All Tasks</h1>
            <a class="btn btn-success" href="create.php">Add Task</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?=$task['id']?></td>
                        <td><?=$task['title']?></td>
                        <td class="col-4">
                            <a class="btn btn-warning" href="edit.php?id=<?=$task['id']?>">Edit</a>
                            <a class="btn btn-primary" href="show.php?id=<?=$task['id']?>">Show</a>
                            <a onclick="return confirm('are you sure?');" class="btn btn-danger" href="delete.php?id=<?=$task['id']?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>