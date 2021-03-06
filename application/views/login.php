<!doctype html>
<html class="no-js" lang="" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/flat-ui.min.css">
    <link rel="stylesheet" href="css/main.css">
    <style>
        .container {
            width: 945px !important;
            margin-top: 40px;
        }
    </style>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Add your site or application content here -->


<div class="container">
    <div class="row">
        <div class="login">
            <div class="login-screen">
                <?php $error = $this->session->userdata('logInError'); if($error){?>
                <div class="alert alert-danger" role="alert">
                    <strong> Ops !</strong> <?php echo $error; $this->session->unset_userdata('logInError');?>
                </div>
                <?php } ?>
                <div class="login-icon">
                    <img src="img/login/icon.png" alt="Welcome to Mail App" />
                    <h4>Welcome to <small>Invoice App</small></h4>
                </div>

                <div class="login-form">
                    <form action="<?php echo base_url()?>Welcome/login" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control login-field" name="user_email" placeholder="Enter your name" id="login-name" />
                            <label class="login-field-icon fui-user" for="login-name"></label>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control login-field" name="user_password" placeholder="Password" id="login-pass" />
                            <label class="login-field-icon fui-lock" for="login-pass"></label>
                        </div>

                        <button class="btn btn-primary btn-lg btn-block" type="submit">Log in</button>
                        <a class="login-link" href="#">Lost your password?</a>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<script src="js/flat-ui.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>
</body>
</html>