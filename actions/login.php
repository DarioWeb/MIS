<?php
include "connection.php";

if (isset($_POST['login_btn'])){

    $name = $_POST['name'];
    $psw = $_POST['psw'];

    if (empty($name) || empty($psw)){
      $_SESSION['fall'] = "Ве молиме пополнете ги сите полиња!";
      header("location:../");
    }else{

        $sql = "SELECT * FROM users WHERE name = '$name'";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0){

            $row = $result->fetch_assoc();
            if (password_verify($psw,$row['password'])){

               $_SESSION['login'] = true;
               header("location:../auth/");

            }else{
              $_SESSION['fall'] = "Неточно име или лозинка!";
                header("location:../");
            }

        }else{
            $_SESSION['fall'] = "Неточно име или лозинка!";
            header("location:../");
        }

    }

}
