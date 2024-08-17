<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">

    <div class="text-center">
        <h1 class="text-primary">Add User</h1>
    </div>
    <form action="" method="POST" class="m-auto d-flex flex-column align-items-center mt-5 w-50" enctype="multipart/form-data">

        <div class="mb-3 w-100 d-flex">
            <div class="d-inline w-25">
                <label class="form-label">Name </label>
            </div>
            <div class="d-inline w-75">
                <input class="form-control" type="text" name="name" value="<?= isset($data['name'])? $data['name']: "" ?>">
                <span class="text-danger">
                    <?= isset($errors['name'])? $errors['name']: "" ?>
                </span>
            </div>
        </div>

        <div class="mb-3 d-flex w-100">
            <div class="d-inline w-25">
                <label class="form-label">Email </label>
            </div>
            <div class="d-inline w-75">
                <input class="form-control" type="text" name="email" value="<?= isset($data['email'])? $data['email']: "" ?>">
                <span class="text-danger">
                    <?= isset($errors['email'])? $errors['email']: "" ?>
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
                </span>
            </div>
        </div>

        <div class="mb-3 d-flex w-100">
            <div class="d-inline w-25">
                <label class="form-label ">Confirm Password </label>
            </div>
            <div class="d-inline w-75">
                <input class="form-control " type="password" name="ConfirmPassword" value=<?= isset($data['ConfirmPassword'])? $data['ConfirmPassword']: "" ?>>
                <span class="text-danger">
                    <?= isset($errors['ConfirmPassword'])? $errors['ConfirmPassword']: "" ?>
                </span>            
            </div>
        </div>

        <div class="mb-3 d-flex w-100">
            <div class="w-25">
                <label for="roomNum" class="form-labe">Room No. </label>
            </div>
            <div class="w-75">
                <select name="roomNum" id="roomNum" class="form-select">
                    <option selected>Open this select menu</option>
                    <option value="application1" <?= (isset($data['roomNum']) && $data['roomNum'] === 'application1') ? 'selected' : '' ?> >Application 1</option>
                    <option value="application2" <?= (isset($data['roomNum']) && $data['roomNum'] === 'application2') ? 'selected' : '' ?> >Application 2</option>
                    <option value="cloud" <?= (isset($data['roomNum']) && $data['roomNum'] == 'cloud') ? 'selected' : '' ?> >Cloud</option>
                </select>
                <span class="text-danger">
                    <?= isset($errors['roomNum']) ? $errors['roomNum'] : "" ?>
                </span>
            </div>
        </div>

        <div class="mb-3 d-flex w-100">
            <div class="w-25">
                <label for="formFile" class="form-label">Profile Picture</label>
            </div>
            <div class="w-75">
                <input type="file" class="form-control" id="formFile" name="profilePhoto" accept="image/*">
                <span class="text-danger">
                    <?= isset($errors['profilePhoto']) ? $errors['profilePhoto'] : "" ?>
                </span>
            </div>
        </div>

        <div class="btn-group">
            <input class="btn btn-primary w-25" type="submit" value="Save" name="submit-btn">
            <input class="btn btn-danger w-25" type="reset" style="margin-left: 10px" value="Reset">
        </div>

    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>