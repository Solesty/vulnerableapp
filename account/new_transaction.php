<?php
include('../account/includes/header.php');


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

<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="card">
                        <div class="card-header">New Transaction</div>

                        <div style="margin: 20px" class="<?php
                                    if ($messageStatus == 'error') {
                                        echo 'message-error';
                                    } else if ($messageStatus == 'success') {
                                        echo 'message-success';
                                    }  ?>" style="text-align: center">
                            <?php echo $message; ?>
                        </div>

                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Submit a Transaction</h3>
                                <div style="text-align: center; margin-top: 20px; font-weight: 700;">
                                    <h5>Please make sure you've made payment to</h5>
                                    <small>BANK NAME: ACCESS BANK</small> <br />
                                    <small>ACCOUNT NAME: SURE BANK PLC</small> <br />
                                    <small>ACCOUNT NUMBER: 019291920129</small>
                                </div>

                            </div>
                            <hr>
                            <form action="../processor/insecure/submit_transaction.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $_SESSION['user_id'] ?>" name="user_id" />
                                <div class="form-group">
                                    <label> Payment Amount </label>
                                    <input id="amount" name='amount' type="number" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label> Bank Name (From) </label>
                                    <input id="account_name" name='bank_name' type="text" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label> Account Name (From) </label>
                                    <input id="account_name" name='account_name' type="text" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label> Account Number (From) </label>
                                    <input id="account_number" name='account_number' type="text" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label> Transaction Description (Required) </label>
                                    <textarea class="form-control" name="description"></textarea>
                                    <small>What is the purpose of this transaction?</small>
                                </div>

                                <div class="form-group">
                                    <label> Proof of Transaction (Required)</label>
                                    <input required type="file" name='proof_file' />
                                    <br>
                                    <small> A file (image/pdf/doc) is needed to show you transfered the amount. </small>
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


            <?php
            include('../account/includes/footer.php');

            ?>