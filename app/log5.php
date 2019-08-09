<?php
include 'core/init.php';
$db=DB::getInstance();
ob_start();

$username=$_SESSION['log'][0];
$image1=$_SESSION['log_image'][0];
$image2=$_SESSION['log_image'][1];
$image3=$_SESSION['log_image'][2];
$image4=$_SESSION['log_image'][3];
$image5=$_SESSION['log_image'][4];

/*$login_data=$db->get("user",array(
    "username",
    "=",
    $username

))->first();

$img1=$login_data->image1;
$img2=$login_data->image2;
$img3=$login_data->image3;
$img4=$login_data->image4;
$img5=$login_data->image5;

if($image1==$img1 && $image2==$img2 && $image3==$img3 && $image4==$img4 && $image5==$img5 ){
    echo "<h2>successfully Logged!</h2>";
    header("refresh:5;url=home.php");
}
else{
    echo "You have selected Image Sequence Incorrectly! Try Again";
    header("refresh:5;url=login_image1.php");
}*/
if(isset($_POST['foo_x'])){
$foo_x=$_POST['foo_x'];
$foo_y=$_POST['foo_y'];

 $_SESSION['select_X'][4]=$foo_x;
 $_SESSION['select_Y'][4]=$foo_y;

 echo "X=$foo_x, Y=$foo_y ";
  header( "refresh:2;url=log_s.php" );
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Image 5</title>
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
          Select a Point on Image (Image 5)
        </span>
        <form class="login100-form p-l-55 p-r-55 p-t-55 p-b-55" method="post">
          <div class="">
            <input type="image" height="400px" width="690px" alt="Finding coordinates of an image" src="<?php echo $image5; ?>"
            name="foo" style="cursor:crosshair;" />
            <span class="focus-input100"></span>
          </div>


        </form>
      </div>
    </div>
  </div>



</body>
</html>
