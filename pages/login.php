<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">
    <div class="text-center">
        <h1 class="text-success">Cafeteria</h1>
    </div>
    <form action="" method="POST" class="m-auto d-flex flex-column align-items-center mt-5 w-50">
        <div class="mb-3 d-flex w-100">
            <div class="d-inline w-25">
                <label class="form-label">Email </label>
            </div>
            <div class="d-inline w-75">
                <input class="form-control" type="text" name="email" value="<?= isset($data['email'])? $data['email']: "" ?>">
                <span class="text-danger">
                    <?= isset($errors['email'])? $errors['email']: "" ?>
                    <?= isset($errors['userEmailError'])? $errors['userEmailError']: "" ?>
                </span>
            </div>
        </div>

        <div class="mb-3 d-flex w-100">
            <div class="d-inline w-25">
                <label class="form-label">Password </label>
            </div>
            <div class="d-inline w-75">
                <input class="form-control" type="password" name="password" value=<?= isset($data['password'])? $data['password']: "" ?>>
                <span class="text-danger">
                <?= isset($errors['password'])? $errors['password']: "" ?>
                    <?= isset($errors['userPassError'])? $errors['userPassError']: "" ?>
                </span>
            </div>
        </div>
        
        <input type="submit" value="Login" name="login-btn" class="btn btn-success">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>