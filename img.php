<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php
$img=$_GET['img'];
echo "<img src='uploads/$img' width='1300' height='700'>";
echo "<a href='myphoto.php' class='btn btn-lg btn-primary btn-block'>Вернуться в фото</a>";
require('connect.php');
$query = "Update photos set viewcount=viewcount+1 where url='$img'";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$query = "SELECT * FROM photos where url='$img'";
$result = mysqli_query($connection,$query) or die(mysqli_error($connection));
while($row = mysqli_fetch_array($result)) {
    $uname=$row['username'];}
if (isset($_SESSION['admin']) or $uname==$_SESSION['username']) {
    echo "<form method='post'> <input type='submit' name='delete' value='Удалить фото' class='btn btn-lg btn-primary btn-block'/></form>";
    if(isset($_POST['delete']))
    {
        $query = "Delete from photos where url='$img'";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        echo "<meta http-equiv=\"refresh\" content=\"0; url=myphoto.php\">";
    }
}
?>