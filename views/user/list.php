<?php
require '../../database/QueryBuilder.php';
require '../../components/Auth.php';

$db = new QueryBuilder;
$users = $db->all('users');

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
            <h1>All Users</h1>
            <a class="btn btn-success" href="views/tasks/create.php">Add User</a>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?=$user['id']?></td>
                        <td><?=$user['email']?></td>
                        <td><?=$user['banned']?></td>
                        <td class="col-4">
                            <a class="btn btn-warning" href="../../controllers/user/ban.php?id=<?=$user['id']?>">Ban</a>
                            <a class="btn btn-success" href="../../controllers/user/unban.php?id=<?=$user['id']?>">Unban</a>
                            <a class="btn btn-primary" href="../../views/user/view.php?id=<?=$user['id']?>">View</a>
                            <a onclick="return confirm('are you sure?');" class="btn btn-danger" href="../../controllers/user/remove.php?id=<?=$user['id']?>">Remove</a>
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
