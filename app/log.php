<?php
include 'core/init.php';
ob_start();
$errors=array();

if(isset($_POST['submit'])){


    $count=0;
		for ($i = 0; $i < count($_FILES['image_']['name']); $i++)
		{
      $type = explode('.', $_FILES['image_']['name'][$i]);
      $type = $type[count($type) - 1];
      $url = 'log/' . uniqid(rand()) . '.' . $type;
      if($_FILES['image_']['name'][$i] != ''){
      if(in_array($type, array('jpg', 'jpeg', 'png'))) {

			if ($_FILES["image_"]["size"][$i] < 3000000) // Check File size (Allow 1MB)
			{
				$temp = $_FILES["image_"]["tmp_name"][$i];
				$name = $_FILES["image_"]["name"][$i];

				if(empty($temp))
				{
					break;
				}
				if($i == 0){ $err = "File uploaded successfully"; $cls = "success"; }
        $_SESSION['log_image'][$i]=$url;


			  move_uploaded_file($temp,$url);
        $count++;

        if($count==5){
          header( "refresh:1;url=log1.php" );
        }
			}
			else
			{
				$errors[0] = "File size is more than 3MB";
			}
    }else{
      $errors[1]='Unsupported File Type';
    }
  }
  else{
    $errors[2]='Select 5 images to continue';
  }

		}

var_dump($errors);
}


 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="assets/bootstrap.min.css" type="text/css"/>
		<link rel="stylesheet" href="assets/main.css" type="text/css"/>

  </head>
  <body>
		<div class="container">
    <form class="" method="post" enctype="multipart/form-data">



      <div class="form-group">
      <input type="file" class="form-control" name="image_[]" value="">
      </div>
      <div class="form-group">
      <input type="file" class="form-control" name="image_[]" value="">
      </div>
      <div class="form-group">
      <input type="file" class="form-control" name="image_[]" value="">
      </div>
      <div class="form-group">
      <input type="file" class="form-control" name="image_[]" value="">
      </div>
      <div class="form-group">
      <input type="file" class="form-control" name="image_[]" value="">
      </div>

      <input type="submit" name="submit" value="Continue">

    </form>
		</div>

  </body>
</html>
