<?php
session_start();

require('../../configurations/database.php');

include '../../models/User.php';

$name       = $_POST['name'];
$email      = $_POST['email'];
$password   = $_POST['password'];

if (
    (isset($name) && !empty($name)) && (isset($email) && !empty($email)) && (isset($password) && !empty($password))
) {
    $newUser = new User();
    $newUser->setName($name);
    $newUser->setPassword($password);
    $newUser->setEmailAddress($email);
    $newUser->setPassword($password);
    $newUser->save();
    $newUser->wasSaved();
    $isUserSaved = $newUser->wasSaved();

    if ($isUserSaved) {
        header('Location: ../../login.php');
    } else {
        header('Location: ../../register.php');
    }
} else {
    header('Location: ../../register.php');
}
