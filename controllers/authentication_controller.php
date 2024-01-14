<?php

/*------------*/
// en-tant-quauteur-inscrit-je-souhaite-me-connecter-à-mon-compte
/*------------*/
global $db;

if (isset($_POST["req"]) && $_POST["req"] == "signup") {
    // Sanitize and validate input!
    $username = $_POST["username"];
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    $fileName = Validation::handleFileUpload();
    // Validate user input
    $errors = [
        "username_err" => Validation::validateUsername($username),
        "email_err" => Validation::validateEmail($email),
        "password_err" => Validation::validatePassword($password),
        "userexists_err" => Validation::userChecker($email, $db),
        "picture_err" => Validation::pictureValidation($fileName)
    ];

    if (array_filter($errors)) {
        // Handle errors
        echo json_encode(["errors" => $errors]);
        exit;
    }

    // Hash password
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // Register user
    User::register($username, $email, $passwordHash, $fileName, $db);
    echo json_encode(["success" => "User registered successfully"]);
    exit;
}

if (isset($_POST["req"]) && $_POST["req"] == "login") {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST["password"];
    $userChecker = User::user_checker($email, $db);

    if (!$userChecker) {
        echo json_encode(["error" => "User does not exist."]);
    } elseif (!password_verify($password, $userChecker["password"])) {
        echo json_encode(["error" => "Password is incorrect."]);
    } else {
        $checkLogin = new User($userChecker["user_id"]);
        $access = "home";
        if ($userChecker["role"] == "admin") {
            $access = "dashboard";
            $checkLogin->login($userChecker["user_id"], $access);
        } else
            $checkLogin->login($userChecker["user_id"], $access);

        echo json_encode(["success" => $access]);
    }
    exit;
}

/*------------*/
// en-tant-quauteur-inscrit-je-souhaite-me-connecter-à-mon-compte
/*------------*/