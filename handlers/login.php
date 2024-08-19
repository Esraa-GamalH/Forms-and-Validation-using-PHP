<?php
$errors = [];
$data = $_POST;

if (isset($_POST['login-btn'])){
    ["email" => $email, 
    "password" => $password, 
    ] = $_POST;

    if (!isset($email) || empty(trim($email))){
        $errors["email"] = "Email is required";
    }

    if (!isset($password) || empty(trim($password))){
        $errors["password"] = "Password is required";
    }

    if (!count($errors)){
        $userFound = false;
        $users = file_get_contents('users.json');
        //    convert json to array
        $users = json_decode($users, true);

        // function to check if user exists
        foreach ($users as $user) {
            if ($email === $user['email']){
                // better to be after check password
                $userFound = true;
                if ($password === $user['password']){
                    // sucess login -> start session
                    session_start();
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['password'] = $password;
                    header("location: welcome.php");
                }
                else{
                    $errors["userPassError"] = "Wrong Password";
                }
            }
        }
        if (!$userFound){
            $errors["userEmailError"] = "User Not Found!";
        }
    }

}


?>