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
    <style>

        nav{
            background-color: #000;
            height: 80px;
            display: flex;
            flex-direction: row;
        }
        .left{
            margin-top: 20px;
            float: left;
        }
        .right{
            margin-top: 20px;
            float: right;
        }
        nav h4{
            margin-top: 20px;
            color: #fff;
        }

        .add_worker input{
            display: block;
            margin-bottom: 15px;
            outline: none;
            padding: 5px;
        }
        .all_worker{
            margin-top: 40px;
        }

    </style>
</head>
<body style="background-color: #4896d9" >


<nav>
   <div class="container-fluid">
       <div class="row">
           <div class="col-md-4">
               <button class="btn btn-danger left" >Одјави се</button>
           </div>
           <div class="col-md-4">
            <center>
                <h4>Метал Инженеринг Станковски</h4>
            </center>
           </div>
           <div class="col-md-4">
               <button data-bs-toggle="modal" data-bs-target="#add" class="btn btn-primary right " >Додади нов работник</button>
           </div>
       </div>



   </div>
</nav>


<div class="all_worker">

    <div class="container">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Име</th>
                <th>Тел. Број</th>
                <th>Струка</th>
                <th>Додај Сатови</th>
                <th>Плати</th>
                <th>Статистика</th>
                <th>Избриши</th>
            </tr>
            </thead>
            <tbody>

            <?php

            $sql = "SELECT * FROM workers";
            $result = $mysqli->query($sql);
            if ($result->num_rows > 0){

                while ($row = $result->fetch_assoc()){

                    ?>
                    <tr>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['type'] ?></td>
                        <td><button  onclick="addHour(this)"  data-name="<?php echo $row['name'] ?>" data-bs-toggle="modal" data-bs-target="#hour" class="btn btn-secondary" >Додај сатови</button></td>
                        <td><a href="plati.php?name=<?php echo $row['name'] ?>" class="btn btn-success" >Плати</a></td>
                        <td><a href="stat.php?name=<?php echo $row['name'] ?>" class="btn btn-primary" >Статистика</a></td>
                        <td><button onclick="delete_worker(this)" data-name="<?php echo $row['name'] ?>" class="btn btn-danger" ><i class="fas fa-trash-alt"></i></button></td>
                    </tr>
                    <?php

                }

            }

            ?>



            </tbody>
        </table>
    </div>

</div>


<!-- The Modal -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Додади нов работник</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

               <center>
                   <form action="../actions/newWorker.php" method="post" class="add_worker" >
                       <input type="text" name="name" placeholder="Име на работник" required >
                       <input type="number" name="phone" placeholder="Тел. број" required >
                       <input type="text" name="type" placeholder="Струка"  required >
                       <button name="submit" class="btn btn-primary" >Додај</button>
                   </form>
               </center>

            </div>



        </div>
    </div>
</div>



<!-- The Modal -->
<div class="modal fade" id="hour">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Додај сатови</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <center>
                    <form action="../actions/addHour.php" method="post" class="add_worker" >
                        <input type="hidden" name="name" id="user_name" value="" >
                        <input type="text" name="opis" placeholder="Опис" >
                        <input type="number" name="price" placeholder="Сатнина" >

                        <input type="date" name="datum" placeholder="Датум" >

                        <label for="hour">Колку сати</label>

                        <select name="hour" id="">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                        <br>
                        <br>
                        <button name="submit" class="btn btn-primary" >Додај</button>
                    </form>
                </center>

            </div>



        </div>
    </div>
</div>


<?php

if (isset($_SESSION['success'])){
    ?>
    <script>
        alert("<?php echo $_SESSION['success'] ?>")
    </script>
    <?php
    unset($_SESSION['success']);
}
?>


<script>

    function addHour(el){
        let name = el.getAttribute("data-name");
        document.getElementById("user_name").value = name;

    }

    function delete_worker(el){
        let name = el.getAttribute("data-name");

        let xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function (){

            if (this.readyState == 4 && this.status == 200){

                let back = this.responseText;

                if (back == 1){
                    alert("Успешно го избришавте работникот!")
                    location.reload();
                }else{
                    alert("Дојде до грешка!")
                }

            }

        }
        xhttp.open("GET","../actions/delete_worker.php?name="+name,true);
        xhttp.send();

    }

</script>

</body>
</html>