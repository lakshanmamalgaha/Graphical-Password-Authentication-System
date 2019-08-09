<?php
    require 'core/init.php';
    $db=DB::getInstance();
    ob_start();
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $email=$_POST['email'];

        $username_count=$db->get("user",array(
            "username",
            "=",
            $username

        ))->count();

        if(!$username_count>0){

            $_SESSION['register'][0]=$username;
            $_SESSION['register'][1]=$first_name;
            $_SESSION['register'][2]=$last_name;
            $_SESSION['register'][3]=$email;

      //  header('Location:reg_image1.php');
        header('Location:reg.php');
        }
        else{
            echo '<ul class=text-danger text-center>Username already used!</ul>';
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V8</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
        <span class="image-title">
          GRAPHICAL PASSWORD AUTHENTICATION SYSTEM
        </span>
				<form class="login100-form p-l-55 p-r-55 p-t-178" method="post">
					<span class="login100-form-title">
						Register
					</span>

					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="text" name="username" placeholder="Username" required>
						<span class="focus-input100"></span>
					</div>

          <div class="wrap-input100 validate-input m-b-16">
            <input class="input100" type="text" name="first_name" placeholder="First Name" required>
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="text" name="last_name" placeholder="Last Name"  required>
						<span class="focus-input100"></span>
					</div>

          <div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="email" name="email" placeholder="Email" required>
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">
							Register
						</button>
					</div>

					<div class="flex-col-c p-t-17 p-b-4">
						<span class="txt1 p-b-9">
							Already have an account?
						</span>

						<a href="index.php" class="txt3">
							Login now
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


</body>
</html>
