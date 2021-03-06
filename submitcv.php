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
      <a class="navbar-brand text-brand" href="">Sure<span class="color-b">MFB</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Services
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="new_transaction.php">Request Cash</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Career
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="submitcv.php">Submit CV</a>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
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