<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login | Seller - Online Auction System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/project_adi/admin/assets/img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/project_adi/login_signup/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/project_adi/login_signup/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/project_adi/login_signup/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="/project_adi/login_signup/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="/project_adi/login_signup/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="/project_adi/login_signup/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="/project_adi/login_signup/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/project_adi/login_signup/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="/project_adi/login_signup/css/util.css">
    <link rel="stylesheet" type="text/css" href="/project_adi/login_signup/css/main.css">
</head>
<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('/project_adi/login_signup/images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form" action="/project_adi/controllers/auth-controller.php" method="post">
                    <span class="login100-form-title p-b-49">
                        Login - Seller
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Username is required">
                        <span class="label-input100">Username / Email</span>
                        <input class="input100" type="text" autofocus name="txt_username" placeholder="Username / Email" tabindex="1">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" tabindex="2" type="password" name="txt_pass" placeholder="Password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>
                    
                    <div class="text-right p-t-8 p-b-31">
                        <a href="forgot-password.php?type=seller" tabindex="4">
                            Forgot password?
                        </a>
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" tabindex="3" name="btn_seller_login" class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>
                    <hr/>
                    <a href="signup-seller.php" class="txt2" tabindex="5" style="float:right">Signup</a>
                    <a href="/project_adi/index.php" class="txt2" tabindex="6" style="float:left">Go to Home</a>					
                </form>
            </div>
        </div>
    </div>

    <script src="/project_adi/login_signup/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="/project_adi/login_signup/vendor/animsition/js/animsition.min.js"></script>
    <script src="/project_adi/login_signup/vendor/bootstrap/js/popper.js"></script>
    <script src="/project_adi/login_signup/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/project_adi/login_signup/vendor/select2/select2.min.js"></script>
    <script src="/project_adi/login_signup/vendor/daterangepicker/moment.min.js"></script>
    <script src="/project_adi/login_signup/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="/project_adi/login_signup/vendor/countdowntime/countdowntime.js"></script>
    <script src="/project_adi/login_signup/js/main.js"></script>
</body>
</html>
