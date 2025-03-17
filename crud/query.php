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
    }
    if(empty($userPassword)){
        $userPasswordErr = "Password is Required";
    }
    if(empty($userConfirmPassword)){
        $userConfirmPasswordErr = "Conform Password is Required";
    }


}

?>