<?php
  require 'core/init.php';
  $db=DB::getInstance();
  ob_start();

  if(isset($_POST['submit'])){

    $username=$_POST['username'];
    $user=$db->get('user',array('username','=',$username));
    $user_count=$user->count();


    echo $user_count;
    if($user_count>=1){
      $user_data=$user->first();
        echo $username;
        $_SESSION['login'][0]=$username;
        $_SESSION['log'][0]=$username;
        //header("Location:login_image1.php");
        header("Location:log.php");

    }

  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Graphical Password Authentication System</title>
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
      <span class="image-title">
        GRAPHICAL PASSWORD AUTHENTICATION SYSTEM
      </span>
			<div class="wrap-login100">
				<form class="login100-form p-l-55 p-r-55 p-t-178" method="post">
					<span class="login100-form-title">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">
							Login
						</button>
					</div>

					<div class="flex-col-c p-t-17 p-b-4">
						<span class="txt1 p-b-9">
							Don’t have an account?
						</span>

						<a href="register.php" class="txt3">
							Register now
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>



</body>
</html>
