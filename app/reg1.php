<?php
include 'core/init.php';
$db=DB::getInstance();
ob_start();
/*
check weather user used a valid username
*/
if(!isset($_SESSION['register'][0])){
  header( "Location:register.php" );
}

$username=$_SESSION['register'][0];
$first_name=$_SESSION['register'][1];
$last_name=$_SESSION['register'][2];
$email=$_SESSION['register'][3];

//var_dump((isset($_SESSION['reg_image'])?$_SESSION['reg_image']:''));

$image1=(isset($_SESSION['reg_image'][0])?$_SESSION['reg_image'][0]:'');
$image2=(isset($_SESSION['reg_image'][1])?$_SESSION['reg_image'][1]:'');
$image3=(isset($_SESSION['reg_image'][2])?$_SESSION['reg_image'][2]:'');
$image4=(isset($_SESSION['reg_image'][3])?$_SESSION['reg_image'][3]:'');
$image5=(isset($_SESSION['reg_image'][4])?$_SESSION['reg_image'][4]:'');

//echo $image1;

if(isset($_POST['foo_x'])){
$foo_x=$_POST['foo_x'];
$foo_y=$_POST['foo_y'];

$_SESSION['click_X'][0]=$foo_x;
$_SESSION['click_Y'][0]=$foo_y;

//echo "X=$foo_x, Y=$foo_y ";
 header( "refresh:2;url=reg2.php" );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Image 1</title>
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

      <div class="wrap-image">
        <span class="image-title">
          Select a Point on Image (Image 1)
        </span>
        <form class="login100-form p-l-55 p-r-55 p-t-55 p-b-55" method="post">
          <div class="">
            <input type="image" height="400px" width="690px" alt="Finding coordinates of an image" src="<?php echo $image1; ?>"
            name="foo" style="cursor:crosshair;" />
            <span class="focus-input100"></span>
          </div>


        </form>
      </div>
    </div>
  </div>



</body>
</html>
