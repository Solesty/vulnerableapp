<?php

session_start();

require('../../configurations/constants.php');
require('../../configurations/database.php');

include '../../models/User.php';
include '../../models/Transaction.php';
include '../../models/CV.php';

$name           = $_POST['name'];
$dob            = $_POST['dob'];
$bvn            = $_POST['bvn'];
$hcert          = $_POST['hcert'];
$file           = $_FILES['file'];


if (
    empty($name) || empty($dob) || empty($hcert) || empty($bvn)
    || empty($file)
) {
    $_SESSION['error'] = 'You need to supply all the details to submit your cv.';
    header('Location: ../../submitcv.php');
    exit();
}


$file_url = uploadFile();

if ($file_url != null) {
    $cvObject = new CV();
    $cvObject->setName($name);
    $cvObject->setHCert($hcert);
    $cvObject->setCVFile($file_url);
    $cvObject->setDOB($dob);
    $cvObject->setBVN($bvn);
    $cvObject->save();


    if (TERMINAL_MODE) {
        echo "Uploaded";
    } else {
        header('Location: ../../submitcv.php');
        exit();
    }
} else {
    $_SESSION['error'] = 'We couln\'t upload your file';

    if (TERMINAL_MODE) {
        echo $_SESSION['error'];
        exit();
    } else {
        header('Location: ../../submitcv.php');
        exit();
    }
}

function uploadFile()
{
    $target_dir = ROOT_DIR . "uploads/";
    $target_file = $target_dir . basename($_FILES['file']['name']);
    $uploadOk = 1;

    $tmp_name = $_FILES['file']['tmp_name'];

    $fileExtension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //check if the file is a correct file and not script file
    // $allowedfileExtensions = array('jpg', 'gif', 'png', 'doc', 'docx', 'pdf');
    // if (!in_array($fileExtension, $allowedfileExtensions)) {
    //     $uploadOk = 0;
    // }

    // allow random names of file
    // $newName = $tmp_name . $fileExtension;
    // $targext_file = $target_dir . basename($newName);

    if ($uploadOk == 1) {
        $uploadSuccess = move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
        if ($uploadSuccess) {
            return basename($_FILES['file']['name']);
        }
    } else {
        return null;
    }
}
