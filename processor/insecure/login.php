<?php
session_start();

require('../../configurations/database.php');

include '../../models/User.php';

$email      = $_POST['email'];
$password   = $_POST['password'];

define('HOUR', 1);

if (
    (isset($email) && !empty($email)) && (isset($password) && !empty($password))
) {

    $theUser = new User();
    $theUser->setPassword($password);
    $theUser->setEmailAddress($email);

    // if ($theUser->doesAccountExist($email)) {

    if ($theUser->doesPasswordMatch()) {
        $_SESSION['success']    = "Login Successful";
        $_SESSION['email']      = $email;
        $_SESSION['password']   = $password;

        // Well, I want the user to login automatically when they access the
        // account side of the web app, without asking tem to enter their 
        // login details all over again. Storing in cookie is also a Vulnearability
        $_SESSION['name']    = $theUser->getName();
        $_SESSION['email']     = $theUser->getEmailAddress();
        $_SESSION['password'] = $theUser->getPassword();
        $_SESSION['user_id']  = $theUser->getUserID();

        setcookie('user_id',    $_SESSION['user_id'], (3600 + HOUR));
        setcookie('email',    $_SESSION['email'], (3600 + HOUR));
        setcookie('name',     $_SESSION['name'], (3600 + HOUR));
        setcookie('password', $_SESSION['password'], (3600 + HOUR));

        header("Location: ../../account/dashboard.php");
    } else {
        $_SESSION['error'] = 'Sorry ' . $email . ' your password didn\'t match the one we have';
        header('Location: ../../login.php');
        exit();
    }
    // } else {

    //     # This is a vulneability, do not tell if the user's account exists or not
    //     $_SESSION['error'] = "Sorry, $email, your account doesn't exist ";
    //     header('Location: ../../login.php');
    //     exit();
    // }
}
