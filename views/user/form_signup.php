<?php
session_start();




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
        <div class="col-md-6">
            <h1 class="text-center">Sign up </h1>
                <?php if(isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger" role="alert">
                   <?php echo $_SESSION['error']; unset($_SESSION['error']);?>
                     </div>
            <?php endif;?>

            <form class="mt-4 " action="../../controllers/user/signup.php" method="post">
                <div class="form-group">
                    <label class="form-label">Email address</label>
                    <input name="email" type="text" class="form-control">
                </div>
                <div class="form-group mt-4">
                    <label class="form-label">Password</label>
                    <input name="password" type="password" class="form-control">
                </div>
                <div class="d-grid gap-2 col-4 mx-auto  mt-4 ">
                    <button class="btn btn-primary">create account</button>
                </div>
        </div>
            </form>

    </div>
</div>
</body>
</html>