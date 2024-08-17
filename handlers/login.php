<?php
$errors = [];
$data = $_POST;

if (isset($_POST['login-btn'])){
    ["email" => $email, 
    "password" => $password, 
    ] = $_POST;

    if (!isset($email) || trim(empty($email))){
        $errors["email"] = "Email is required";
    }

    if (!isset($password) || trim(empty($password))){
        $errors["password"] = "Password is required";
    }

    if (!count($errors)){
        $userFound = false;
        $users = file_get_contents('users.json');
        //    convert json to array
        $users = json_decode($users, true);
        foreach ($users as $user) {
            if ($email === $user['email']){
                $userFound = true;
                if ($password === $user['password']){
                    // sucess login
                    
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