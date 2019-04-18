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
</head>

<body>
    <div class="container">
        <div class="row first-row">
            <div class="col-md-6 offset-md-4">
                <div class="card">
                    <div class="card-header">New Transaction</div>

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
                                <label>Amount Transfered</label>
                                <input name="amount" class="form-control" type="number" placeholderrrrrrr="Amount" />
                            </div>

                            <div class="form-group">
                                <label>Bank Name</label>
                                <input name="bank_name" value="SURE BANK"  readonly class="form-control" type="text" placeholderrrrr="Bank Name" />
                            </div>

                            <div class="form-group">
                                <label>Account Name</label>
                                <input value="SureBank Savings" readonly name="account_name" class="form-control" type="text" placeholderrrrr="Account Name" />
                            </div>

                            <div class="form-group">
                                <label>Account Number</label>
                                <input name="account_number" value="0022019283" readonly class="form-control" type="text" placeholderrrrr="Account Number" />
                            </div>

                            <div class="form-group">
                                <label>Depositor Name</label>
                                <input name="name" class="form-control" type="text"  />
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

<script src="vendor/jquery-3.2.1.min.js"></script>
<script src="vendor/jquery-ui.min.js"></script>
<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
<script src="vendor/bootstrap-4.1/popper.min.js"></script>
<script src="js/vulapp.js"></script>