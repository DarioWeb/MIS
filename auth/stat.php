<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Статистика</title>
    <?php
    include "../actions/bs.php";
    include "../actions/connection.php";

    if (!isset($_SESSION['login']) || !$_SESSION['login']){
        $_SESSION['fall'] = "You must be logged in!";
        header("location:../");
    }

    if (!isset($_GET['name']) || $_GET['name'] == null){
        header("location:workers.php");
    }

    ?>
</head>
<body style="background-color: #4896d9" >
<a style="margin: 10px" class="btn btn-danger" href="workers.php">Назад</a>


<br>
<br>
<center>
    <h1 style="color: #000" >Работник:<?php echo $_GET['name'] ?></h1>
</center>
<br>
<div class="container">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Сатнина</th>
            <th>Колку сати</th>
            <th>Опис</th>
            <th>Плата</th>
            <th>Датум</th>

        </tr>
        </thead>
        <tbody>



        <?php

        $vk_plata = 0;
        $vk_sati = 0;

        $worker = $_GET['name'];
        $sql = "SELECT * FROM hour WHERE name = '$worker'";

        $result = $mysqli->query($sql);

        if ($result->num_rows > 0){

            while ($row = $result->fetch_assoc()){
                $vk_plata += $row['plata'];
                $vk_sati += $row['kolku'];
                ?>

                <tr>
                    <td><?php echo $row['satnina'] ?></td>
                    <td><?php echo $row['kolku'] ?></td>
                    <td><?php echo $row['opis'] ?></td>
                    <td><?php echo $row['plata'] ?></td>
                    <td><?php echo $row['time'] ?></td>


                </tr>

                <?php
            }
//R3l8W1p*6e%eoL&UxVNa
        }else{
            ?>
            <center>
                <br>

                <h3 style="color: #000;background-color: red;display: inline-block;padding: 10px" >Работникот нема одработено ништо</h3>
            </center>
            <?php
        }


        ?>

        </tbody>




    </table>
    <table border="1px solid #fff" >
        <thead>
        <tr  >
            <th>Вкупно плата:

            <?php

          echo  $vk_plata

            ?>
            </th>
        </tr>
        </thead>
    </table>
    <br>
    <table border="1px solid #fff" >
        <thead>
        <tr  >
            <th>Вкупно сати:   <?php

               echo $vk_sati

                ?></th>
        </tr>
        </thead>
    </table>
</div>


</body>
</html>