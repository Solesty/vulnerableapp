<?php
session_start();

require('../../configurations/database.php');

include '../../models/User.php';

$email      = $_POST['email'];
$password   = $_POST['password'];

// $email = addslashes($email);

if (
    (isset($email) && !empty($email)) && (isset($password) && !empty($password))
) {

    $theUser = new User();
    $theUser->setPassword($password);
    $theUser->setEmailAddress($email);

    if ($theUser->doesAccountExist($email)) {

        if ($theUser->doesPasswordMatch()) {
            $_SESSION['success']    = "Login Successful";

            $_SESSION['password']   = $password;

            $_SESSION['name']    = $theUser->getName();
            $_SESSION['email']     = $theUser->getEmailAddress();
            $_SESSION['password'] = $theUser->getPassword();
            $_SESSION['user_id']  = $theUser->getUserID();

            # MITIGATION
            // $_SESSION['name']    =  htmlentities($theUser->getName());
            // $_SESSION['email']     = htmlentities($theUser->getEmailAddress());
            // $_SESSION['password'] = htmlentities($theUser->getPassword());
            // $_SESSION['user_id']  = htmlentities($theUser->getUserID());

            header("Location: ../../account/dashboard.php");
        } else {

            # MITIGATION
            $email      = htmlentities($email);

            $_SESSION['error'] = 'Sorry ' . $email . ' your password didn\'t match the one we have';
            header('Location: ../../login.php');
            exit();
        }
    } else {
        # MITIGATION
        // $email      = htmlentities($email);

        # This is a vulneability, do not tell if the user's account exists or not
        $_SESSION['error'] = "Sorry, $email, your account doesn't exist ";
        header('Location: ../../login.php');
        exit();
    }
}
else{
    $_SESSION['error'] = "Please fill all details. ";
    header('Location: ../../login.php');
    exit();
}