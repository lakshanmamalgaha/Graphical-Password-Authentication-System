<?php
include 'core/init.php';
ob_start();
$username=$_SESSION['log'][0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
<h2 style="text-align:center;">Welcome <?php echo $username; ?></h2>
<a href="logout.php">Log Out</a>
</body>
</html>