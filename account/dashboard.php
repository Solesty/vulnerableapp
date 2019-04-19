<?php

session_start();

include('../account/includes/header.php');


session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);
// include('includes/header.php');

include('../configurations/constants.php');

$con = mysqli_connect(HOST, MYSQL_USERNAME, MYSQL_PASSOWRD, INSECURE_MYSQL_DATABASE);
$query = "SELECT * FROM transaction;";
$result = mysqli_query($con, $query);


?>


<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div chass="col-md-12">

                </div>
            </div>
            <div class="row m-t-25">
                <div class="col-sm-12 col-lg-12">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                                <div class="text">
                                    <h2><?php echo $result->num_rows ?></h2>
                                    <span>cash requests</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <!-- <canvas id="widgetChart1"></canvas> -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>CHERT SECURITY | Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->

<?php
include('../account/includes/footer.php');

?>