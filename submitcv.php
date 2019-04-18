<?php
session_start();

$message = '';
$messageStatus = '';
if (isset($_SESSION['error'])) {
    $message = $_SESSION['error'];
    $messageStatus = 'error';
    unset($_SESSION['error']);
}

$successMessage = '';
if (isset($_SESSION['success'])) {
    $message = $_SESSION['success'];
    $messageStatus = 'success';
    unset($_SESSION['success']);
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Upload Your CV</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap-4.1/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="vendor/font-awesome-4.7/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
</head>

<body>
    <div class="container">
        <div class="row first-row">
            <div class="col-md-6 offset-md-4">
                <div class="card">
                    <div class="card-header">Upload Your CV</div>

                    <div style="margin: 5px" class="<?php
                                                    if ($messageStatus == 'error') {
                                                        echo 'message-error';
                                                    } else if ($messageStatus == 'success') {
                                                        echo 'message-success';
                                                    }  ?>" style="text-align: center">
                        <?php echo $message; ?>
                    </div>


                    <div class="card-body">
                        <form action="processor/insecure/submit_cv.php" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Full Name</label>
                                <input name="name" class="form-control" type="text" placeholderrrrrrr="Amount" />
                            </div>

                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input name="dob" class="form-control" type="text" placeholder="Day/Month/Year" />
                            </div>


                            <div class="form-group">
                                <label>Secret BVN (DEMO) </label>
                                <input name="bvn" class="form-control" type="text" />
                            </div>

                            <div class="form-group">
                                <label>Highest Education Cert.</label>
                                <input name="hcert" class="form-control" type="text" />
                            </div>
                            
                            <div class="form-group">
                                <label>CV Document</label> <br />
                                <input type="file" name="file" />
                            </div>

                            <div>
                                <button type="submit" class="btn btn-lg btn-info btn-block">
                                    <span id="payment-button-amount">Submit</span>
                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script src="vendor/jquery-3.2.1.min.js"></script>
<script src="vendor/jquery-ui.min.js"></script>
<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
<script src="vendor/bootstrap-4.1/popper.min.js"></script>
<script src="js/vulapp.js"></script>