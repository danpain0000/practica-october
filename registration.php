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
require ('connect.php');
if (isset($_POST['username']) && isset($_POST['password']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];

    $query= "INSERT INTO users (username,password) VALUES('$username','$password')";
    $result = mysqli_query($connection,$query);

    if($result)
    {
        $smsg = "Регистрация выполнена";
    }
    else
    {
        $fsmsg = "Ошибка";
    }
}
?>
    <div class="container">
        <form class="form-signin" method="post">
            <h2>Регистрация</h2>
            <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php }?>
            <?php if(isset($fsmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fsmsg; ?> </div><?php }?>
            <input type="text" name="username" class="form-control" placeholder="username" required>
            <input type="password" name="password" class="form-control" placeholder="password" required>
            <button class="btn btn-lg btn primary btn-block" type="submit">Зарегистрироваться</button>
            <a href="login.php" class="btn btn-lg btn-primary btn-block">Войти</a>
        </form>
    </div>
</body>
</html>