<?php
include("dbcon.php");


$userName = $userEmail = $userPassword = $userConfirmPassword = "" ;
$userNameErr= $userEmailErr = $userPasswordErr = $userConfirmPasswordErr = "" ;
if(isset($_POST['registerUser'])){
    $userName = $_POST['uName'];
    $userEmail = $_POST['uEmail'];
    $userPassword = $_POST['uPassword'];
    $userConfirmPassword = $_POST['uConfirmPassword'];
    if(empty($userName)){
        $userNameErr = "Name is Required" ;
    }
    if(empty($userEmail)){
        $userEmailErr = "Email is Required";
    }else{
        $query = $pdo->prepare("select * from user where email = :uEmail ");
        $query->bindParam('uEmail',$userEmail);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        // print_r($user);
        // die();
        if($user){
            $userEmailErr = "Email is already Exist";
        }
    }
    if(empty($userPassword)){
        $userPasswordErr = "Password is Required";
    }
    if(empty($userConfirmPassword)){
        $userConfirmPasswordErr = "Conform Password is Required";
    }
    else{
        if($userPassword != $userConfirmPassword){
            $userConfirmPasswordErr = "password not matched";
        }
    }

 if(empty($userNameErr) && empty($userEmailErr) && empty($userPasswordErr) && empty($userConfirmPasswordErr)){
    $query = $pdo->prepare("insert into user(name,email,pssword) values (:uName , :uEmail , :uPassword)");
    $query->bindParam('uName',$userName);
    $query->bindParam('uEmail',$userEmail);
    $query->bindParam('uPassword',$userPassword);
    $query->execute();
    // echo "<script>alert('user added ');location.assign('register.php')</script>":
    echo "<script>alert('User added successfully'); location.assign('register.php');</script>";

 }


}


// include("dbcon.php");

// $userName = $userEmail = $userPassword = $userConfirmPassword = "";
// $userNameErr = $userEmailErr = $userPasswordErr = $userConfirmPasswordErr = "";

// if (isset($_POST['registerUser'])) {
//     $userName = $_POST['uName'];
//     $userEmail = $_POST['uEmail'];
//     $userPassword = $_POST['uPassword'];
//     $userConfirmPassword = $_POST['uConfirmPassword'];

//     if (empty($userName)) {
//         $userNameErr = "Name is required.";
//     }
//     if (empty($userEmail)) {
//         $userEmailErr = "Email is required.";
//     } else {
//         $query = $pdo->prepare("SELECT * FROM users WHERE email = :uEmail");
//         $query->bindParam(':uEmail', $userEmail);
//         $query->execute();
//         $user = $query->fetch(PDO::FETCH_ASSOC);
//         if ($user) {
//             $userEmailErr = "Email already exists.";
//         }
//     }

//     if (empty($userPassword)) {
//         $userPasswordErr = "Password is required.";
//     }
//     if (empty($userConfirmPassword)) {
//         $userConfirmPasswordErr = "Confirm password is required.";
//     } else {
//         if ($userPassword != $userConfirmPassword) {
//             $userConfirmPasswordErr = "Passwords do not match.";
//         }
//     }

//     if (empty($userNameErr) && empty($userEmailErr) && empty($userPasswordErr) && empty($userConfirmPasswordErr)) {
//         $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
//         $query = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:uName, :uEmail, :uPassword)");
//         $query->bindParam(':uName', $userName);
//         $query->bindParam(':uEmail', $userEmail);
//         $query->bindParam(':uPassword', $hashedPassword);
//         $query->execute();

//         echo "<script>alert('User added successfully'); location.assign('register.php');</script>";
//     }
// }



?>