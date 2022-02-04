<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Metal Inzenering Stankovski</title>
    <?php
    include "actions/bs.php";
    ?>

    <style>
        .login_form{
            background-color: #000;
            display: inline-block;
            padding: 30px;
            margin-top: 100px;
        }
        .login_form input{
            display: block;
            margin-bottom: 15px;
            padding: 10px;
            outline: none;
        }
        .login_form label{
            color: #fff;
        }
    </style>

</head>
<body style="background-image: url('metal_back_hero.jpg');background-size: cover" >

<center>
    <form action="actions/login.php" method="post" class="login_form">
        <label for="name">Твоето име</label>
        <input  type="text" name="name" placeholder="Твоето име" required >
        <label for="password">Твојата лозинка</label>
        <input autocomplete="off" type="password" name="psw" placeholder="Твојата лозинка"  required>
        <button name="login_btn" class="btn btn-primary" >Најави се</button>
    </form>
</center>

<?php
session_start();

if (isset($_SESSION['login']) && $_SESSION['login']){
    header("location:auth/");
}

if (isset($_SESSION['fall'])){
    ?>
    <script>
        alert('<?php echo $_SESSION['fall'] ?>')
    </script>
<?php
    unset($_SESSION['fall']);
}

?>

</body>
</html>