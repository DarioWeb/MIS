<?php
include "connection.php";

if (isset($_POST['submit'])){

    $name = strip_tags($_POST['name']);
    $phone = strip_tags($_POST['phone']);
    $type = strip_tags($_POST['type']);


    if (empty($name) || empty($phone) || empty($type)){
        die("Pleas fill in all fileds!");
    }else{

        $sql = "INSERT INTO workers (name,phone,type) VALUES ('$name','$phone','$type') ";

        if ($mysqli->query($sql)){

            $_SESSION['success'] = "Успешно додадовте нов работник!";
            header("location:../auth/");

        }

    }

}else{
    header("location:../");
}