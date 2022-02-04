<?php
include "connection.php";

$user = $_GET['name'];

$sql = "DELETE FROM workers WHERE name = '$user'";

if ($mysqli->query($sql)){
    echo 1;
}else{
    echo 0;
}