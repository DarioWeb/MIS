<?php
include "../actions/connection.php";

if (!isset($_SESSION['login']) || !$_SESSION['login']){
    $_SESSION['fall'] = "You must be logged in!";
    header("location:../");
}
//N=_p4+(V%D[JV$GN
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Metal Inzenering | Stankovski</title>
    <?php
    include "../actions/bs.php";
    ?>


</head>
<body style="background-color: #4896d9" >

<style>
    .admin_menu{
        background-color: #000;
        margin-top: 100px;
        display: inline-block;
        padding: 30px;
    }
    .admin_menu ul{
        margin: 0;
        padding: 0;
    }
    .admin_menu ul li{
        list-style: none;
        margin-bottom: 20px;
    }
</style>

<center>
    <div class="admin_menu">
        <ul>
            <li><a class="btn btn-primary" href="workers.php">Вработени</a></li>
            <li><a class="btn btn-primary" href="">Фактура</a></li>
            <li><a class="btn btn-primary" href="revers.php">Реверс</a></li>
            <li><a class="btn btn-danger" href="">Одјави се</a></li>
        </ul>
    </div>
</center>

</body>
</html>