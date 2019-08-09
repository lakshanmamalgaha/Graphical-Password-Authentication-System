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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/main.css" type="text/css"/>
    <link rel="stylesheet" href="assets/bootstrap.min.css" type="text/css"/>
    <title>Login</title>
</head>
<body>
<div class="container">
        <h2>Login</h2>
        <form method="post">
            <label for="username">User Name</label>
            <input type="text" name="username">

            <br>
            <br>
            <input type="submit" value="Login" name="submit">

        </form>
        <br>
        <br>
        <br>
        <a href="register.php"  class="float-right" style="text-align:right;">Not registered yet?</a>
    </div>

</body>
</html>
