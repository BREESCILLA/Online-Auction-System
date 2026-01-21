<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup | Seller - Online Auction System</title>
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
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" style="width:50%;">
                <form class="login100-form validate-form" action="/project_adi/controllers/auth-controller.php" method="post">
                    <span class="login100-form-title p-b-49">
                        Signup - Seller
                    </span>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">
                                <span class="label-input100">Username</span>
                                <input class="input100" type="text" autofocus name="txt_username" placeholder="Username" tabindex="1">
                                <span class="focus-input100" data-symbol="&#xf206;"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="wrap-input100 validate-input m-b-10" data-validate="PAN Card No. is required">
                                <span class="label-input100">PAN Card No.</span>
                                <input class="input100" type="text" name="txt_panno" placeholder="PAN Card Number" tabindex="2">
                                <span class="focus-input100" data-symbol="&#xf206;"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="wrap-input100 validate-input m-b-10" data-validate="Email is required">
                                <span class="label-input100">Email</span>
                                <input class="input100" type="email" name="txt_email" placeholder="Email" tabindex="3">
                                <span class="focus-input100" data-symbol="&#xf206;"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="wrap-input100 validate-input m-b-10" data-validate="Mobile No. is required">
                                <span class="label-input100">Mobile</span>
                                <input class="input100" type="tel" name="txt_phone" placeholder="Mobile Number" tabindex="4" maxlength="10">
                                <span class="focus-input100" data-symbol="&#xf206;"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="wrap-input100 validate-input" data-validate="Password is required">
                                <span class="label-input100">Password</span>
                                <input class="input100" tabindex="5" type="password" name="txt_pass" placeholder="Password">
                                <span class="focus-input100" data-symbol="&#xf190;"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="wrap-input100 validate-input" data-validate="Confirm Password is required">
                                <span class="label-input100">Confirm Password</span>
                                <input class="input100" tabindex="6" type="password" name="txt_cpass" placeholder="Confirm Password">
                                <span class="focus-input100" data-symbol="&#xf190;"></span>
                            </div>
                        </div>
                    </div>

                    <div class="text-right p-t-8 p-b-31"></div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" tabindex="7" name="btn_seller_signup" class="login100-form-btn">
                                Signup
                            </button>
                        </div>
                    </div>
                    <hr/>
                    <a href="login-seller.php" class="txt2" tabindex="8" style="float:right">Already have an account? Login</a>
                    <a href="/project_adi/index.php" class="txt2" tabindex="9" style="float:left">Go to Home</a>
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
