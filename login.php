<!DOCTYPE html>
<html lang="en">
<head>
	<title>Account Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.login.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" action="includes/login.inc.php" method="post">
					<span class="login100-form-title p-b-32">
						Account Login
					</span>

					<span class="txt1 p-b-11">
						Username or email
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="username" >
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="pswd" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form-checkbox">
                            <a href="#" class="txt3">   
                                Forgot Password?
							</a>
						</div>

						<div>
							<a href="signup.php" class="txt3">
                                Sign Up
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button name="login-submit" class="login100-form-btn">
							Login
                        </button>
                    </div>
				</form>
			</div>
		</div>
    </div>	

	<div id="dropDownSelect1"></div>

</body>
</html>