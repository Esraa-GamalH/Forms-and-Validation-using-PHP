<?php
$errors = [];
$data = $_POST;
$emailRegExp = ' /^([a-zA-Z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/ ';
$passRegExp = ' /^[a-z0-9_]{8}$/ ';

if (isset($_POST['submit-btn'])) {
    [
        "name" => $name,
        "email" => $email,
        "password" => $password,
        "ConfirmPassword" => $ConfirmPassword,
        "roomNum" => $roomNum,
    ] = $_POST;

    if (!isset($name) || empty(trim($name))) {
        $errors["name"] = "Name is required";
    }


    //Email validation with 2 ways
    if (!isset($email) || empty(trim($email))) {
        $errors["email"] = "Email is required";
    } else {
        // 1) using filter_var
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Invalid email format";
        }
        // 2) using regex
        if (!preg_match($emailRegExp, $email)) {
            $errors["email"] = "Invalid email format";
        }
    }

    //Password Validation
    if (!isset($password) || empty(trim($password))) {
        $errors["password"] = "Password is required";
    } else if (!preg_match($passRegExp, $password)) {
        $errors["password"] = "Invalid password format. Must be 8 chars, lowerCase ,and _ only.";
    }


    if (!isset($ConfirmPassword) || empty(trim($ConfirmPassword))) {
        $errors["ConfirmPassword"] = "Confirmation of password is required";
    } else if ($ConfirmPassword !== $password) {
        $errors["ConfirmPassword"] = "Doesn't match given password";
    }

    if (!isset($roomNum) || empty(trim($roomNum))) {
        $errors["roomNum"] = "Room number is required";
    } else if ($roomNum !== "application1" && $roomNum !== "application2" && $roomNum !== "cloud") {
        $errors["roomNum"] = "You must choose from options given only";
    }


    // Photo Validation
    //add isset
    if (empty($_FILES['profilePhoto']['name'])) {
        $errors["profilePhoto"] = "Profile Photo is required";
    } else if (isset($_FILES['profilePhoto'])) {
        $file = $_FILES['profilePhoto'];
        $fileSize = $file['size'];
        $ext = explode('.', $file['name']);
        $file_ext = strtolower(end($ext));
        $ext = $file["full_path"];
        $extensions = array("jpeg", "jpg", "png");

        // File Extension
        if (in_array($file_ext, $extensions) === false) {
            $errors['profilePhoto'] = " Extension not allowed, please choose a JPEG , JPG or PNG file.";
        }

        // add 5MB
        if ($fileSize < 1 * 1024 || $fileSize > 5 * 1024 * 1024) {
            $errors["profilePhoto"] = "Photo size must be more than 1KB and less than 5MB";
        }
    }


    // Store user to users file
    if (!count($errors)) {
        $id = 1;
        $users = file_get_contents('users.json');
        // convert json to array
        $users = json_decode($users, true);

        foreach ($users as $user) {
            $id = $user['id'];
        }
        // we can use end()
        $id = $id + 1;

        $users[] = [
            'id' => $id,
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'roomNum' => $_POST['roomNum'],
            'profilePhoto' => $file
        ];
        // convert array to json
        // pretty adds extra size
        $users = json_encode($users, JSON_PRETTY_PRINT);
        file_put_contents('users.json', $users);

        // redirect to login page
        header("refresh:1; url=login.php");
    }
}
