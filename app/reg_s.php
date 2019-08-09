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


$username=(isset($_SESSION)?$_SESSION['register'][0]:'');
$first_name=(isset($_SESSION)?$_SESSION['register'][1]:'');
$last_name=(isset($_SESSION)?$_SESSION['register'][2]:'');
$email=(isset($_SESSION)?$_SESSION['register'][3]:'');

$image1=(isset($_SESSION['reg_image'][0])?$_SESSION['reg_image'][0]:'');
$image2=(isset($_SESSION['reg_image'][1])?$_SESSION['reg_image'][1]:'');
$image3=(isset($_SESSION['reg_image'][2])?$_SESSION['reg_image'][2]:'');
$image4=(isset($_SESSION['reg_image'][3])?$_SESSION['reg_image'][3]:'');
$image5=(isset($_SESSION['reg_image'][4])?$_SESSION['reg_image'][4]:'');


if(!empty($image1) && !empty($image2) && !empty($image3) && !empty($image4) && !empty($image5)){

$sql="INSERT INTO user
(username,first_name,last_name,email,image1,image2,image3,image4,image5)
 VALUES
('$username', '$first_name','$last_name','$email',
  AES_ENCRYPT('$image1','asd'),
   AES_ENCRYPT('$image2','asd'),
   AES_ENCRYPT('$image3','asd'),
   AES_ENCRYPT('$image4','asd'),
   AES_ENCRYPT('$image5','asd'))";

$db->queryNormal($sql);

}

$click_point_x_1=(int)$_SESSION['click_X'][0];
$click_point_x_2=(int)$_SESSION['click_X'][1];
$click_point_x_3=(int)$_SESSION['click_X'][2];
$click_point_x_4=(int)$_SESSION['click_X'][3];
$click_point_x_5=(int)$_SESSION['click_X'][4];

$click_point_y_1=(int)$_SESSION['click_Y'][0];
$click_point_y_2=(int)$_SESSION['click_Y'][1];
$click_point_y_3=(int)$_SESSION['click_Y'][2];
$click_point_y_4=(int)$_SESSION['click_Y'][3];
$click_point_y_5=(int)$_SESSION['click_Y'][4];


if(isset($_SESSION['click_X'])){

$sql="INSERT INTO click_point_x
(username,image1,image2,image3,image4,image5) VALUES (
  '$username',
   AES_ENCRYPT('$click_point_x_1','asd'),
   AES_ENCRYPT('$click_point_x_2','asd'),
   AES_ENCRYPT('$click_point_x_3','asd'),
   AES_ENCRYPT('$click_point_x_4','asd'),
   AES_ENCRYPT('$click_point_x_5','asd')
)";

$db->queryNormal($sql);

}

if(isset($_SESSION['click_Y'])){

$sql="INSERT INTO click_point_y
(username,image1,image2,image3,image4,image5) VALUES (
  '$username',
   AES_ENCRYPT('$click_point_y_1','asd'),
   AES_ENCRYPT('$click_point_y_2','asd'),
   AES_ENCRYPT('$click_point_y_3','asd'),
   AES_ENCRYPT('$click_point_y_4','asd'),
   AES_ENCRYPT('$click_point_y_5','asd')
)";

$db->queryNormal($sql);

}
/*
if(isset($_SESSION['click_X'])){

$sql="INSERT INTO click_point_x
(username,image1,image2,image3,image4,image5) VALUES (
  '$username',
   '$click_point_x_1',
   '$click_point_x_2',
   '$click_point_x_3',
   '$click_point_x_4',
   '$click_point_x_5'
)";

$db->queryNormal($sql);

}

if(isset($_SESSION['click_Y'])){

$sql="INSERT INTO click_point_y
(username,image1,image2,image3,image4,image5) VALUES (
  '$username',
   '$click_point_y_1',
   '$click_point_y_2',
   '$click_point_y_3',
   '$click_point_y_4',
   '$click_point_y_5'
)";

$db->queryNormal($sql);

}
*/
  //destroy the session variable after a successfull registration
  session_destroy();
  //redirect to the login page
  header( "refresh:5;url=index.php" );


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Success</title>
</head>
<body>




</body>
</html>
