<?php
include "connection.php";

if (!isset($_GET['id'])){
    header("location:../");
}


$id = $_GET['id'];

$sql = "DELETE FROM hour WHERE id = '$id'";

if ($mysqli->query($sql)){
    echo 1;
}else{
    echo 2;
}