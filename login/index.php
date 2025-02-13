<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-image: url(../assets/img/image.jpeg); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container">
        <div class="col-12">
            <div class="row">
                <div style="width: 100%; height: 100vh; margin:auto; align-items: center; justify-content: center; display: flex;">
                    <div class="card col-4">
                        <div class="card-body">
                            <form action="../curd/auth-login.php" method="POST">
                                <div class="mb-3" style="text-align: center;">
                                    <img src="../assets/img/logo.png" alt="" width="130">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Username">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                                <div class="mb-3" style="padding-top: 30px;">
                                    <button name="login" type="submit" class="btn btn-success col-12">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>