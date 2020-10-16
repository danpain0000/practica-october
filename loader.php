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
<div class="container">
    <form class="form-signin" method="post" enctype="multipart/form-data">
        <h2>Загрузка фото</h2>
        <a href='myphoto.php' class='btn btn-lg btn-primary btn-block'>Мои фото</a>
        <a href='loader.php' class='btn btn-lg btn-primary btn-block'>Загрузить фото</a>
        <a href='logout.php' class='btn btn-lg btn-primary btn-block'>Выйти</a>
        <input type="file" name="image" value="">
        <button class="btn btn-lg btn primary btn-block" type="submit">Загрузить</button>
    </form>
</div>

</body>
</html>
<?php
if (isset($_SESSION['admin']))
{
    echo "<a href='allphoto.php' class='btn btn-lg btn-primary btn-block'>Все фото</a>";
}
require ('connect.php');
$username=$_SESSION['username'];
$folderUploads = 'uploads';
$image = $_FILES['image'];
$date = Date('d.m.Y.H.i.s.u');
if($image) {
    $image_name = $image['name'];
    $date=$date.$image_name;
    $tmp_name = $image['tmp_name'];
    if(!move_uploaded_file($tmp_name, $folderUploads . DIRECTORY_SEPARATOR. $date)){
        echo "Не удалось загрузить файл";
    }
    else
    {
        $query= "INSERT INTO photos (username,url) VALUES('$username','$date')";
        $result = mysqli_query($connection,$query);
    }
}

?>
