<?php
session_start();
require('../../configurations/database.php');

include '../../models/User.php';
include '../../models/Transaction.php';


$amount          = $_POST['amount'];
$bankName        = $_POST['bank_name'];
$accountName     = $_POST['account_name'];
$description     = $_POST['description'];
$name           = $_POST['name'];

$accountNumber   = $_POST['account_number'];


# Mitigation against XSS and Injection
$amount = addslashes(($amount));
$bankName = addslashes(($bankName));
$accountName = addslashes(($accountName));
$description = addslashes(($description));
$name = addslashes(($name));
$accountNumber = addslashes(($accountNumber));



if (
    empty($amount) || empty($bankName) || empty($accountName)
    || empty($description) || empty($accountNumber)
) {
    $_SESSION['error'] = 'You need to supply all the details for a transaction. None must be empty';

    header('Location: ../../new_transaction.php');
    exit();
}


// $proof_of_url = uploadFile();

$newTransaction = new Transaction();
$newTransaction->setAccountName($accountName);
$newTransaction->setAmount($amount);
$newTransaction->setAccountNumber($accountNumber);
$newTransaction->setBankName($bankName);
$newTransaction->setDepositorName($name);
$newTransaction->setDescription($description);
$newTransaction->save();

header('Location: ../../new_transaction.php');
exit();


function uploadFile()
{
    $target_dir = "/var/www/html/vulnerableapp/uploads/";
    $target_file = $target_dir . basename($_FILES['proof_file']['name']);
    $uploadOk = 1;

    $tmp_name = $_FILES['proof_file']['tmp_name'];

    $fileExtension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    //check if the file is a correct file and not script file using the file type
    // $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');
    // if (!in_array($fileExtension, $allowedfileExtensions)) {
    //     $uploadOk = 0;
    // }

    // $newName = $tmp_name . $fileExtension;
    // $targext_file = $target_dir . basename($newName);

    if ($uploadOk == 1) {
        $uploadSuccess = move_uploaded_file($_FILES['proof_file']['tmp_name'], $target_file);
        if ($uploadSuccess) {
            return basename($_FILES['proof_file']['tmp_name']);
        }
    } else {
        return null;
    }
}
