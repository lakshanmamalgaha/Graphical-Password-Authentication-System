<?php
include 'core/init.php';
ob_start();

/*
check weather user used a valid username
*/
if(!isset($_SESSION['register'][0])){
  header( "Location:register.php" );
}

/*
handelling image upload
	1.user should be required select 5 images.
	2.Image extention(type) must be 'jpg', 'jpeg' or 'png'.
	3.Image size should be less than 3000Kb.

After all five images uploaded successfully, images are saved to location root_directory/images.
*/
if(isset($_POST['submit'])){

    $count=0;
		for ($i = 0; $i < count($_FILES['image_']['name']); $i++)
		{
      $type = explode('.', $_FILES['image_']['name'][$i]); //get image type
      $type = $type[count($type) - 1];
      $url = 'images/' . uniqid(rand()) . '.' . $type; // image saved url
      if($_FILES['image_']['name'][$i] != ''){
      if(in_array($type, array('jpg', 'jpeg', 'png'))) { // check image type is correct

			if ($_FILES["image_"]["size"][$i] < 3000000) // Check File size (Allow 3MB)
			{
				$temp = $_FILES["image_"]["tmp_name"][$i];
				$name = $_FILES["image_"]["name"][$i];

				if(empty($temp))
				{
					break;
				}
				if($i == 0){ $err = "File uploaded successfully"; $cls = "success"; }
        $_SESSION['reg_image'][$i]=$url;
        //var_dump($_SESSION['reg_image']);

			  move_uploaded_file($temp,$url); //save uploaded images
        $count++;
        echo $count;
        if($count==5){
          header( "refresh:1;url=reg1.php" ); // redirect to the next page
        }
			}
			else
			{
				$err = "File size is more than 3MB";
			}
    }else{
      echo 'Unsupported File Type';
    }
  }
  else{
    echo 'Select 5 images to continue';
  }

		}


}


 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<title>Select Images</title>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 <!--===============================================================================================-->
 	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
 <!--===============================================================================================-->
 	<link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
 <!--===============================================================================================-->
 	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
 <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
 <!--===============================================================================================-->
 	<link rel="stylesheet" type="text/css" href="css/main.css">
 <!--===============================================================================================-->
 </head>
 <body>

	 <div class="limiter">
		 <div class="container-login100">
			 <div class="wrap-login100 p-t-20">
				 <span class="image-title">
					 Select 5 Images
				 </span>

				 <form class="login100-form p-l-55 p-r-55 p-t-20 p-b-20" method="post" enctype="multipart/form-data">


					 <label for="">Image 1</label>
					 <div class="wrap-input100 validate-input m-b-16">
						 <input class="input100" type="file" name="image_[]" value="">
						 <span class="focus-input100"></span>
					 </div>

					 <label for="">Image 2</label>
					 <div class="wrap-input100 validate-input m-b-16">
						 <input class="input100" type="file" name="image_[]" value="">
						 <span class="focus-input100"></span>
					 </div>

					 <label for="">Image 3</label>
					 <div class="wrap-input100 validate-input m-b-16">
						 <input class="input100" type="file" name="image_[]" value="">
						 <span class="focus-input100"></span>
					 </div>

					 <label for="">Image 4</label>
					 <div class="wrap-input100 validate-input m-b-16">
						 <input class="input100" type="file" name="image_[]" value="">
						 <span class="focus-input100"></span>
					 </div>

					 <label for="">Image 5</label>
					 <div class="wrap-input100 validate-input m-b-16">
						 <input class="input100" type="file" name="image_[]" value="">
						 <span class="focus-input100"></span>
					 </div>



					 <div class="container-login100-form-btn">
						 <input class="login100-form-btn" type="submit" name="submit" value="Continue">
					 </div>


				 </form>
			 </div>
		 </div>
	 </div>


  </body>
</html>
