<?php
include 'core/init.php';
$db=DB::getInstance();
ob_start();

if(!isset($_SESSION['reg_image'][0])){
  header( "Location:reg1.php" );
}

$username=$_SESSION['register'][0];
$first_name=$_SESSION['register'][1];
$last_name=$_SESSION['register'][2];
$email=$_SESSION['register'][3];


$image1=$_SESSION['reg_image'][0];
$image2=$_SESSION['reg_image'][1];
$image3=$_SESSION['reg_image'][2];
$image4=$_SESSION['reg_image'][3];
$image5=$_SESSION['reg_image'][4];

if(isset($_POST['foo_x'])){
$foo_x=$_POST['foo_x'];
$foo_y=$_POST['foo_y'];

$_SESSION['click_X'][1]=$foo_x;
$_SESSION['click_Y'][1]=$foo_y;

 header( "refresh:1;url=reg3.php" );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Image 2</title>
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
          Select a Point on Image (Image 2)
        </span>
        <form class="login100-form p-l-55 p-r-55 p-t-55 p-b-55" method="post">
          <div class="">
            <input type="image" height="400px" width="690px" alt="Finding coordinates of an image" src="<?php echo $image2; ?>"
            name="foo" style="cursor:crosshair;" />
            <span class="focus-input100"></span>
          </div>


        </form>
      </div>
    </div>
  </div>



</body>
</html>
