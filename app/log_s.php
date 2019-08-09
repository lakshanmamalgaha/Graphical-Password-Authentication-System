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

$sql="SELECT username,
  AES_DECRYPT(image1,'asd') AS image1,
  AES_DECRYPT(image2,'asd') AS image2,
  AES_DECRYPT(image3,'asd') AS image3,
  AES_DECRYPT(image4,'asd') AS image4,
  AES_DECRYPT(image5,'asd') AS image5 FROM user WHERE
  (username ='$username')";

/*$sql="SELECT username,
  AES_DECRYPT(image1,'asd') AS image1,
  AES_DECRYPT(image2,'asd') AS image2,
  AES_DECRYPT(image3,'asd') AS image3,
  AES_DECRYPT(image4,'asd') AS image4,
  AES_DECRYPT(image5,'asd') AS image5
  FROM user";

$login_data=$db->get("user",array(
    "username",
    "=",
    $username

))->first();*/

$login_data1=$db->queryNormal($sql);
$login_data=$login_data1->first();
var_dump($login_data);


$point_x=$db->queryNormal("
SELECT username,
  AES_DECRYPT(image1,'asd') AS image1,
  AES_DECRYPT(image2,'asd') AS image2,
  AES_DECRYPT(image3,'asd') AS image3,
  AES_DECRYPT(image4,'asd') AS image4,
  AES_DECRYPT(image5,'asd') AS image5 FROM click_point_x WHERE
  (username ='$username')
")->first();

var_dump($point_x);
$point_y=$db->queryNormal("
SELECT username,
  AES_DECRYPT(image1,'asd') AS image1,
  AES_DECRYPT(image2,'asd') AS image2,
  AES_DECRYPT(image3,'asd') AS image3,
  AES_DECRYPT(image4,'asd') AS image4,
  AES_DECRYPT(image5,'asd') AS image5 FROM click_point_y WHERE
  (username ='$username')
")->first();

var_dump($point_y);
$img1=$login_data->image1;
$img2=$login_data->image2;
$img3=$login_data->image3;
$img4=$login_data->image4;
$img5=$login_data->image5;
var_dump($_SESSION['select_X']);
$click_point_x_1=$_SESSION['select_X'][0];
$click_point_x_2=$_SESSION['select_X'][1];
$click_point_x_3=$_SESSION['select_X'][2];
$click_point_x_4=$_SESSION['select_X'][3];
$click_point_x_5=$_SESSION['select_X'][4];
var_dump($_SESSION['select_Y']);
$click_point_y_1=$_SESSION['select_Y'][0];
$click_point_y_2=$_SESSION['select_Y'][1];
$click_point_y_3=$_SESSION['select_Y'][2];
$click_point_y_4=$_SESSION['select_Y'][3];
$click_point_y_5=$_SESSION['select_Y'][4];

$point_x_1=(int)$point_x->image1;
$point_x_2=(int)$point_x->image2;
$point_x_3=(int)$point_x->image3;
$point_x_4=(int)$point_x->image4;
$point_x_5=(int)$point_x->image5;

$point_y_1=(int)$point_y->image1;
$point_y_2=(int)$point_y->image2;
$point_y_3=(int)$point_y->image3;
$point_y_4=(int)$point_y->image4;
$point_y_5=(int)$point_y->image5;
echo $point_x_3;
$s1=checkPoint(417,$click_point_x_1,272,$click_point_y_1);

$s2=checkPoint($point_x_2,$click_point_x_2,$point_y_2,$click_point_y_2);
$s3=checkPoint($point_x_3,$click_point_x_3,$point_y_3,$click_point_y_3);
$s4=checkPoint($point_x_4,$click_point_x_4,$point_y_4,$click_point_y_4);
$s5=checkPoint($point_x_5,$click_point_x_5,$point_y_5,$click_point_y_5);

echo $s1.'<br>';
echo $s2.'<br>';
echo $s3.'<br>';
echo $s4.'<br>';
echo $s5.'<br>';

$q1=areEqual(encodeImage($img1),encodeImage($image1));
$q2=areEqual(encodeImage($img2),encodeImage($image2));
$q3=areEqual(encodeImage($img3),encodeImage($image3));
$q4=areEqual(encodeImage($img4),encodeImage($image4));
$q5=areEqual(encodeImage($img5),encodeImage($image5));
echo $q1.'<br>';
echo $q2.'<br>';
echo $q3.'<br>';
echo $q4.'<br>';
echo $q5.'<br>';


if($q1 && $q2 && $q3 && $q4 && $q5 && $s1 && $s2 && $s3 && $s4 && $s5){
    echo "<h2>successfully Logged!</h2>";
  //  header("refresh:5;url=home.php");



}
else{
    echo "You have selected Image Sequence Incorrectly! Try Again";
    //header("refresh:5;url=log.php");
}


function checkPoint($pointX,$clickPointX,$pointY,$clickPointY){

  if(((int)$clickPointX>=(int)$pointX-10 && (int)$clickPointX<=(int)$pointX+10)&&
    ((int)$clickPointY>=(int)$pointY-10 && (int)$clickPointY<=(int)$pointY+10)){
    return 1;
  }
  else{
    return 0;
  }
}

function encodeImage($ImagePath){
  $ext = pathinfo($ImagePath, PATHINFO_EXTENSION);
  $Imgcontent = file_get_contents($ImagePath);
  $base64 = 'data:image/' . $ext . ';base64,' . base64_encode($Imgcontent);
  return $base64;
}

function areEqual($sourceImage, $uploadedImage){
  if (strcmp($sourceImage, $uploadedImage) !== 0) {
          return false;
  }
  return true;
}

?>
