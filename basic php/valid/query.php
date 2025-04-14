<?php
include("dbcon.php");
session_start();

$userName = $userEmail = $userPassword = $userConfirmPassword = "";
$userNameErr = $userEmailErr = $userPasswordErr = $userConfirmPasswordErr = "";

if (isset($_POST['registerUser'])) {
    $userName = trim($_POST['uName']);
    $userEmail = trim($_POST['uEmail']);
    $userPassword = trim($_POST['uPassword']);
    $userConfirmPassword = trim($_POST['uConfirmPassword']);

    // Server-side validation

    // Validate Name
    if (empty($userName)) {
        $userNameErr = "Name is Required";
    }

    // Validate Email
    if (empty($userEmail)) {
        $userEmailErr = "Email is Required";
    } else {
        if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
            $userEmailErr = "Please enter a valid email address";
        } else {
            // Check if the email already exists in the database
            $query = $pdo->prepare("SELECT * FROM user WHERE email = :uEmail");
            $query->bindParam('uEmail', $userEmail);
            $query->execute();
            $user = $query->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                $userEmailErr = "Email already exists";
            }
        }
    }

    // Validate Password
    if (empty($userPassword)) {
        $userPasswordErr = "Password is Required";
    } else {
        if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%&])[A-Za-z\d!@#$%&]{8,14}$/", $userPassword)) {
            $userPasswordErr = "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
        }
    }

    // Validate Confirm Password
    if (empty($userConfirmPassword)) {
        $userConfirmPasswordErr = "Confirm Password is Required";
    } elseif ($userPassword !== $userConfirmPassword) {
        $userConfirmPasswordErr = "Passwords do not match";
    }

    // If all validations pass, insert into the database
    if (empty($userNameErr) && empty($userEmailErr) && empty($userPasswordErr) && empty($userConfirmPasswordErr)) {
        $query = $pdo->prepare("INSERT INTO user(name, email, pssword) VALUES (:uName, :uEmail, :uPassword)");
        $query->bindParam('uName', $userName);
        $query->bindParam('uEmail', $userEmail);
        // Hash password before storing
        $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
        $query->bindParam('uPassword', $hashedPassword);
        $query->execute();

        echo "<script>alert('User added successfully'); location.assign('register.php');</script>";
    }
}
?>
