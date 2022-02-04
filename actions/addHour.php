<?php
include "connection.php";

if (isset($_POST['submit'])){

    $name = strip_tags($_POST['name']);
    $opis = strip_tags($_POST['opis']);
    $price = strip_tags($_POST['price']);
    $time = strip_tags($_POST['datum']);
    $hour = strip_tags($_POST['hour']);


    if (empty($name) || empty($opis) || empty($price) || empty($time) || empty($hour)){
        die("Pleas fill in all fileds!");
    }else{


        $plata = $hour * $price;

        $sql = "INSERT INTO hour (name,opis,satnina,kolku,time,plata) VALUES ('$name','$opis','$price','$hour','$time','$plata')";

        if ($mysqli->query($sql)){

            $_SESSION['success'] = "Успешно додадовте сатови!";
            header("location:../auth/");

        }

    }

}else{
    header("location:../");
}