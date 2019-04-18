<?php

class CV
{
    private $name;
    private $age;
    private $hcert;
    private $cvFile;
    private $wasSaved;
    private $bvn;
    private $dob;

    public function save()
    {

        $name = $this->getName();
        $age = $this->getAge();
        $hcert = $this->getHCert();
        $cvFile = $this->getCVFile();
        $bvn = $this->getBVN();
        $dob = $this->getDOB();

        $query = "INSERT INTO cv ( name, hcert, cvFile, dob, bvn )
        VALUES ('$name', '$hcert', '$cvFile', '$dob', '$bvn' );";
        # Use PDO instead of mysqli - optional
        $inserted = mysqli_query(get_connection(), $query);

        if ($inserted) {
            $_SERVER['error'] = '';
            $_SESSION['success'] = 'Your CV has been submitted.';
            $this->wasSaved = true;
        } else {
            $_SERVER['success'] = '';
            $_SESSION['error'] = "Unfortunately we are unable to submit your CV.";
            $this->wasSaved = false;
        }
    }


    public function wasSaved()
    {
        return $this->wasSaved;
    }

    public function setDOB($dob)
    {
        $this->dob = $dob;
    }

    public function getDOB()
    {
        return $this->dob;
    }

    public function setBVN($bvn)
    {
        $this->bvn = $bvn;
    }

    public function getBVN()
    {
        return $this->bvn;
    }

    public function setCVFile($cvFile)
    {
        $this->cvFile = $cvFile;
    }

    public function getCVFile()
    {
        return $this->cvFile;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setHCert($hcert)
    {
        $this->hcert = $hcert;
    }

    public function getHCert()
    {
        return $this->hcert;
    }
}
