<?php

class Transaction
{
    private $account_name;
    private $account_number;
    private $bank_name;
    private $proof_file;
    private $name;
    private $amount;
    private $description;
    private $wasSaved;

    function __construct()
    { }

    public function save()
    {

        $account_name = $this->getAccountName();
        $account_number = $this->getAccountNumber();
        $bank_name = $this->getBankName();
        $amount = $this->getAmount();
        $name = $this->getDepositorName();
        $description = $this->getDescription();

        $account_name = addslashes($account_name);
        $account_number = addslashes($account_number);
        $bank_name = addslashes($bank_name);
        $amount = addslashes($amount);
        $description = addslashes($description);


        # Do not store the user's password plainly
        $query = "INSERT INTO transaction ( amount, acct_name, acct_num, bank_name, transfdescription, name )
        VALUES ('$amount', '$account_name', '$account_number', '$bank_name', '$description', '$name');";


        # Use PDO instead of mysqli - optional
        $inserted = mysqli_query(get_connection(), $query);


        if ($inserted) {
            $_SERVER['error'] = '';
            $_SESSION['success'] = 'Your transactions has been submitted.';
            $this->wasSaved = true;
        } else {
            $_SERVER['success'] = '';
            $_SESSION['error'] = "Unfortunately we are unable to submit your transaction.";
            $this->wasSaved = false;
        }
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAccountName($account_name)
    {
        $this->account_name = $account_name;
    }

    public function getAccountName()
    {
        return $this->account_name;
    }

    public function setAccountNumber($account_number)
    {
        $this->account_number = $account_number;
    }

    public function getAccountNumber()
    {
        return $this->account_number;
    }

    public function setBankName($bank_name)
    {
        $this->bank_name = $bank_name;
    }

    public function getBankName()
    {
        return $this->bank_name;
    }

    public function setProofFile($proof_url)
    {
        $this->proof_file = $proof_url;
    }

    public function getProofFile()
    {
        return $this->proof_file;
    }

    public function setUserID($user)
    {
        $this->user_id = $user;
    }

    public function getUserID()
    {
        return $this->user_id;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDepositorName($name)
    {
        $this->name = $name;
    }

    public function getDepositorName()
    {
        return $this->name;
    }

    public function wasSaved()
    {
        return $this->wasSaved;
    }
}
