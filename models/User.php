<?php

class User
{
    private $name;
    private $password;
    private $email_address;

    private $wasSaved = false;

    function __construct()
    { }

    public function wasSaved()
    {
        return $this->wasSaved;
    }

    public function save()
    {

        # Sanitize input before internal useage.
        $name           = $this->getName();
        $email_address  = $this->getEmailAddress();
        $password       = $this->getPassword();

        $name = htmlentities($name);
        $email_address = htmlentities($email_address);
        $password = htmlentities($password);

        if (!$this->doesAccountExist($email_address)) {

            # Do not store the user's password plainly
            $query = "INSERT INTO users ( name, password, email, plain_password )
            VALUES ('$name', '$password', '$email_address', '$password');";

            # Use PDO instead of mysqli - optional
            $inserted = mysqli_query(get_connection(), $query);

            if ($inserted) {
                $_SERVER['error'] = '';
                $_SESSION['success'] = 'Congratulations ' . $name . ', your account has been successfully created';
                $this->wasSaved = true;
            } else {
                $_SERVER['success'] = '';
                $_SESSION['error'] = "Unfortunately we are unable to create $name account.";
                $this->wasSaved = false;
            }
        } else {
            $this->wasSaved = false;
            $_SESSION['error'] = "A user with $email_address already exist";
        }
    }

    public function doesAccountExist($email)
    {
        // $email =    htmlentities($email);

        $query = "SELECT * FROM users WHERE users.email = '$email'";

        $result = get_connection()->query($query);

        if ($result) {
            $user = $result->fetch_object();
            return $result->num_rows;
        } else {
            return 0;
        }
    }

    public function doesPasswordMatch()
    {
        if (!empty($this->getEmailAddress())) {
            $user = $this->getUSer();
            if ($user) {
                $this->setEmailAddress($user->email);
                $this->setName($user->name);
                $this->setPassword($user->password);
                # This is a vulneaibility, use the password hashing instead
                # And compare the hashes together
                if ($user->password == $this->getPassword()) {
                    return true;
                } else {
                    return false;
                }
            }
            return false;
        } else {
            return false;
        }
    }

    private function getUSer()
    {
        $email = $this->getEmailAddress();
        $password = $this->getPassword();

        # Sample of SQL-INJECTION
        // SELECT * FROM users WHERE users.email = 'solesty7@gmail.com' /**' AND users.password = 'asdsad'
        $query = "SELECT * FROM users WHERE users.email = '$email' AND users.password = '$password' ";

        $result = get_connection()->query($query);

        if ($result->num_rows == 0) {
            return null;
        }
        $user = $result->fetch_object();

        $this->setEmailAddress($user->email);
        $this->setName($user->name);
        $this->setPassword($user->password);

        return $user;
    }

    public function getUserID()
    {
        return $this->getUSer()->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmailAddress($email_address)
    {
        $this->email_address = $email_address;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmailAddress()
    {
        return $this->email_address;
    }
}
