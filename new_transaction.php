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
    <title>Submit Your Transaction</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap-4.1/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="vendor/font-awesome-4.7/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

</head>

<body>

    <div class="click-closed"></div>

    <!--/ Nav Star /-->
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
        <div class="container">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <a class="navbar-brand text-brand" href="">Sure<span class="color-b">Bank MF</span></a>

            <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="./">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="submitcv.php">Submit CV</a>
                    </li>
                    <li class="nav-item active ">
                        <a class="nav-link" href="new_transaction.php">Request Cash</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Our Services</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="n#">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Admin Login</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!--/ Nav End /-->


    <div class="container">
        <div class="row first-row">
            <div class="col-md-6 offset-md-4">
                <div class="card">
                    <div class="card-header">Request Cash</div>

                    <div style="margin: 5px" class="<?php
                                                    if ($messageStatus == 'error') {
                                                        echo 'message-error';
                                                    } else if ($messageStatus == 'success') {
                                                        echo 'message-success';
                                                    }  ?>" style="text-align: center">
                        <?php echo $message; ?>
                    </div>


                    <div class="card-body">
                        <form action="processor/insecure/submit_transaction.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Amount</label>
                                <input name="amount" class="form-control" type="number" placeholderrrrrrr="Amount" />
                            </div>

                            <div class="form-group">
                                <label>Bank Name</label>
                                <input name="bank_name" value="" class="form-control" type="text" placeholderrrrr="Bank Name" />
                            </div>

                            <div class="form-group">
                                <label>Account Name</label>
                                <input value="" name="account_name" class="form-control" type="text" placeholderrrrr="Account Name" />
                            </div>

                            <div class="form-group">
                                <label>Account Number</label>
                                <input name="account_number" value="" class="form-control" type="text" placeholderrrrr="Account Number" />
                            </div>

                            <div class="form-group">
                                <label>Depositor Name</label>
                                <input name="name" class="form-control" type="text" />
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control"></textarea>
                                <small>What is the purpose of this transaction?</small>
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


<!-- JavaScript Libraries -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/jquery/jquery-migrate.min.js"></script>
<script src="lib/popper/popper.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/scrollreveal/scrollreveal.min.js"></script>

<script src="vendor/jquery-3.2.1.min.js"></script>
<script src="vendor/jquery-ui.min.js"></script>
<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
<script src="vendor/bootstrap-4.1/popper.min.js"></script>
<script src="js/vulapp.js"></script>