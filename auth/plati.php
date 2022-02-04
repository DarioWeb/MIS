<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Плати</title>
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
    <style>
        .left{
            float: left;
        }
        .faktura_body{
            width: 100%;

        }
        .ofc{
            position: fixed;
            background-color: #4896d9;
            z-index: 999;
            width: 100%;
            height: 100vh;
        }
    </style>
</head>
<body style="background-color: #4896d9" >
<a style="margin: 10px" class="btn btn-danger" href="workers.php">Назад</a>

<center>
    <h1 style="color: black" >Работник:<?php echo $_GET['name'] ?></h1>
</center>
<br>

<div class="ofc">
    <div class="container">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Сатнина</th>
                <th>Колку сати</th>
                <th>Опис</th>
                <th>Плата</th>
                <th>Датум</th>
                <th>#</th>

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

                    <tr id="red<?php echo $row['id']?>" >
                        <td><?php echo $row['satnina'] ?></td>
                        <td><?php echo $row['kolku'] ?></td>
                        <td><?php echo $row['opis'] ?></td>
                        <td><?php echo $row['plata'] ?></td>
                        <td><?php echo $row['time'] ?></td>
                        <td><button onclick="pay_worker(this)" data-id="<?php echo $row['id'] ?>" data-satnina="<?php echo $row['satnina'] ?>" data-hour="<?php echo $row['kolku'] ?>" data-opis="<?php echo $row['opis'] ?>" data-plata="<?php echo $row['plata']?>" data-time="<?php echo $row['time']?>" class="btn btn-success" >Плати</button></td>


                    </tr>

                    <?php
                }

            }


            ?>

            </tbody>




        </table>
        <table border="1px solid #fff" >
            <thead>
            <tr>
                <th>Вкупно плата:

                   <span id="vk_plata22">
                        <?php

                        echo  $vk_plata

                        ?>
                   </span>
                </th>
            </tr>
            </thead>
        </table>
        <br>
        <table border="1px solid #fff" >
            <thead>
            <tr  >
                <th>Вкупно сати:
                <span id="vk_sati22" >
                    <?php

                    echo $vk_sati

                    ?>
                </span>
                </th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="container">
        <button  id="btn_print" style="margin-top: 20px;display: none" class="btn_print btn btn-dark" >Принтај</button>
    </div>
</div>



<div class="faktura_body" id="container_content">

    <img width="40%" style="float: left" src="logo.png" alt="">
    <h5 style="float: right;color: #1c64a1;font-family: Impact;margin-top: 30px" >,,МЕТАЛ ИНЖЕНЕРИНГ СТАНКОВСКИ" <br> ДОО Произвотство, Трговија и услуги</h5>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <h2 style="color: #000;font-family: Georgia;float: left" >Име:<?php echo $_GET['name'] ?></h2>
    <br>
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
        <tbody id="tabela_faktura" >


        </tbody>
    </table>

    <br>
    <br>
   <div class="left">
       <h6 style="color: black;font-family: monospace" >Вкупно плата:<span id="plata_display" ></span>ден</h6>
       <h6 style="color: #000;font-family: monospace" >Вкупно сати:<span id="sati_display" ></span>h</h6>
   </div>
    <div style="float:right;margin-top: 40px" class="right">
        Потпис__________________
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function($)
    {

        $(document).on('click', '.btn_print', function(event)
        {
            event.preventDefault();

            //credit : https://ekoopmans.github.io/html2pdf.js

            var element = document.getElementById('container_content');

            //easy
            //html2pdf().from(element).save();

            //custom file name
            //html2pdf().set({filename: 'code_with_mark_'+js.AutoCode()+'.pdf'}).from(element).save();


            //more custom settings
            var opt =
                {
                    margin:       1,
                    filename:     'stankovski_.pdf',
                    image:        { type: 'jpeg', quality: 0.98 },
                    html2canvas:  { scale: 2 },
                    jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
                };

            // New Promise-based usage:
            html2pdf().set(opt).from(element).save();


        });



    });
</script>

<script>


    var btn_check = false;
    var vkupno_plata = 0;
    var vkupno_sati = 0;

    function pay_worker(el){

        if (!btn_check){
            document.getElementById("btn_print").style.display = "block"
            btn_check = true;
        }

        let satnina = el.getAttribute("data-satnina");
        let hour = el.getAttribute("data-hour");
        let opis = el.getAttribute("data-opis");
        let plata = el.getAttribute("data-plata");
        let datum = el.getAttribute("data-time");
        let id = el.getAttribute("data-id");

        vkupno_plata += parseInt(plata);
        vkupno_sati += parseInt(hour);

        document.getElementById("plata_display").innerHTML = vkupno_plata;
        document.getElementById("sati_display").innerHTML = vkupno_sati;


        // <tr>
        //     <td>John</td>
        //     <td>Doe</td>
        //     <td>john@example.com</td>
        // </tr>

        let html = "";

        html += "<tr>";
        html += "<td>"+satnina+"</td>";
        html += "<td>"+hour+"</td>";
        html += "<td>"+opis+"</td>";
        html += "<td>"+plata+"</td>";
        html += "<td>"+datum+"</td>";
        html += "</tr>";

        document.getElementById("tabela_faktura").innerHTML += html;

        document.getElementById("red"+id).remove();


        let mom_palata = document.getElementById("vk_plata22").innerHTML;

        let gg = parseInt(mom_palata) - plata;
        document.getElementById("vk_plata22").innerHTML = gg;



        let mom_sati = document.getElementById("vk_sati22").innerHTML;

        let gg2 = parseInt(mom_sati) - hour;
        document.getElementById("vk_sati22").innerHTML = gg2;



        let xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function (){

            if (this.readyState == 4 && this.status == 200){

                let obj = this.responseText;

                if (obj == 1){
                    alert("Успешно плативтеза ден:"+datum);
                }else{
                   alert("Дојде до грешка!")
                }

            }

        }
        xhttp.open("GET","../actions/plati_user.php?id="+id,true);
        xhttp.send();

    }

</script>

</body>
</html>