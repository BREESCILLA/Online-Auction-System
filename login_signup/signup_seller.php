<!DOCTYPE html>
<html lang="en">
<head>
	<title>Signup | Seller</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/project_adi/admin/assets/img/favicon.ico">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" style="border:0px solid red;width:50%;">
				<form class="login100-form validate-form" action="/project_adi/admin/php_code.php" method="post">
					<span class="login100-form-title p-b-49">
						Signup - Seller
					</span>

					<div class="row">
						<div class="col-lg-6">
							<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
								<span class="label-input100">Username</span>
								<input class="input100" type="text" autofocus="" name="txt_username" placeholder="Username" tabindex="1">
								<span class="focus-input100" data-symbol="&#xf206;"></span>
							</div>		
						</div>
						<div class="col-lg-6">
							<div class="wrap-input100 validate-input m-b-10" data-validate = "License No. is required">
								<span class="label-input100">PAN Card No.</span>
								<input class="input100" type="text" name="txt_panno" 
								placeholder="PAN Card Number" tabindex="2">
								<span class="focus-input100" data-symbol="&#xf206;"></span>
							</div>		
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="wrap-input100 validate-input m-b-10" data-validate = "Email is required">
								<span class="label-input100">Email</span>
								<input class="input100" type="email" name="txt_email" placeholder="Email" tabindex="3">
								<span class="focus-input100" data-symbol="&#xf206;"></span>
							</div>		
						</div>
						<div class="col-lg-6">
							<div class="wrap-input100 validate-input m-b-10" data-validate = "Mobile No. is required">
								<span class="label-input100">Mobile</span>
								<input class="input100" type="phone" name="txt_phone" placeholder="Mobile Number" tabindex="4" maxlength="10">
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
					
					<div class="text-right p-t-8 p-b-31">
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
						  <button type="submit" tabindex="7" name="btn_seller_signup" class="login100-form-btn">
								Signup
							</button>
						</div>
					</div>
					<hr/>
					<a href="login_seller.php" class="txt2" tabindex="8" style="float:right"> Login </a>
					<a href="/project_adi/index.php" class="txt2" tabindex="9" style="float:left"> 
						Goto Home 	</a>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>