<?php

session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);
include('includes/header.php');

include('../configurations/constants.php');

$con = mysqli_connect(HOST, MYSQL_USERNAME, MYSQL_PASSOWRD, INSECURE_MYSQL_DATABASE);
$query = "SELECT * FROM transaction;";
$result = mysqli_query($con, $query);



?>
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row m-t-30">
                <div class="col-md-12">
                    <!-- DATA TABLE-->
                    <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-data3">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>amount</th>
                                    <th>description</th>
                                    <th>bank</th>
                                    <th>account number</th>
                                    <th>account name</th>
                                    <th>Depositor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 1;
                                while ($value = $result->fetch_assoc()) {

                                    ?>
                                    <tr>
                                        <td> <?php echo $counter++; ?> </td>
                                        <td> <?php echo $value['amount'] ?> </td>
                                        <td> <?php echo $value['transfdescription'] ?> </td>
                                        <td> <?php echo $value['bank_name'] ?> </td>
                                        <td> <?php echo $value['acct_num'] ?> </td>
                                        <td> <?php echo $value['acct_name'] ?> </td>
                                        <td> <?php echo $value['name'] ?> </td>

                                        <!-- MITIGATION  -->
                                        <!-- REMOVE ALL # from the php tags -->
                                        <!-- REMOVE THIS 
                                        <td> <?php # echo stripslashes( htmlentities($value['amount'])) ?> </td>
                                        <td> <?php # echo stripslashes( htmlentities($value['transfdescription'])) ?> </td>
                                        <td> <?php # echo stripslashes( htmlentities($value['bank_name'])) ?> </td>
                                        <td> <?php # echo stripslashes( htmlentities($value['acct_num'])) ?> </td>
                                        <td> <?php # echo stripslashes( htmlentities($value['acct_name'])) ?> </td>
                                        <td> <?php # echo stripslashes( htmlentities($value['name'])) ?> </td> 
                                        
                                        REMOVE THIS -->

                                    </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>




            <?php
            include('../account/includes/footer.php');

            ?>