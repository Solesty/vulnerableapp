<?php
    include('../../configurations/constants.php');

    function get_connection(){

        $con = mysqli_connect(HOST, MYSQL_USERNAME , MYSQL_PASSOWRD , INSECURE_MYSQL_DATABASE );
        return $con;
    }
