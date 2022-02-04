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
    .hero_rev{
        border: solid 1px #000;
        padding: 10px;
        width: 100%;
        height: 150px;
    }
</style>
<br>
<br>
<button class="btn btn-info btn_print">Print</button>
<br>
<br>
<div id="container_content">

    <div class="hero_rev">

        <div class="row">
            <div class="col-md-8">
                <h5  >
                    МЕТАЛ ИНЖЕНЕРИНГ СТАНКОВСКИ
                </h5>
            </div>
            <div class="col-md-4">
                <p style="float: right" >
                    ___ ___ <?php echo Date("Y") ?>год.
                </p>
            </div>
        </div>


                <p style="float: left" >
                    Испратено преку:<span>_______________________________________</span>
                </p>
                <p style="float: right" >
                    РБ.<span>__________________</span>
                </p>
                <br>
                <br>
                <p style="float:left;" >
                    За:<span>_______________________________________________</span>
                </p>
                <p style="float: right" >
                    Реверс Бр.<span>______________</span>
                </p>


    </div>

  <center>
      <table border="1px solid #000" class="table table-bordered">
          <thead>
          <tr>
              <th>Ред Бр.</th>
              <th>Назив на производот</th>
              <th>Ед М</th>
              <th>Кол.</th>
              <th>Цена</th>
              <th>Износ</th>
          </tr>
          </thead>
          <tbody>
          <tr   style="padding: 0" >
              <td  style="padding: 0;border-left:solid 1px #000" >1</td>
              <td style="padding: 0" >Брусалица</td>
              <td style="padding: 0" >ком</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0;border-right:solid 1px #000" >2</td>
          </tr>

          <tr style="padding: 0" >
              <td  style="padding: 0;border-left:solid 1px #000" >2</td>
              <td style="padding: 0" >Брусалица</td>
              <td style="padding: 0" >ком</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0;border-right:solid 1px #000" >2</td>
          </tr>

          <tr style="padding: 0" >
              <td  style="padding: 0;border-left:solid 1px #000" >3</td>
              <td style="padding: 0" >Брусалица</td>
              <td style="padding: 0" >ком</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0;border-right:solid 1px #000" >2</td>
          </tr>

          <tr style="padding: 0" >
              <td  style="padding: 0;border-left:solid 1px #000" >3</td>
              <td style="padding: 0" >Брусалица</td>
              <td style="padding: 0" >ком</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0;border-right:solid 1px #000" >2</td>
          </tr>


          <tr style="padding: 0" >
              <td  style="padding: 0;border-left:solid 1px #000" >3</td>
              <td style="padding: 0" >Брусалица</td>
              <td style="padding: 0" >ком</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0;border-right:solid 1px #000" >2</td>
          </tr>


          <tr style="padding: 0" >
              <td  style="padding: 0;border-left:solid 1px #000" >3</td>
              <td style="padding: 0" >Брусалица</td>
              <td style="padding: 0" >ком</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0;border-right:solid 1px #000" >2</td>
          </tr>


          <tr style="padding: 0" >
              <td  style="padding: 0;border-left:solid 1px #000" >3</td>
              <td style="padding: 0" >Брусалица</td>
              <td style="padding: 0" >ком</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0;border-right:solid 1px #000" >2</td>
          </tr>


          <tr style="padding: 0" >
              <td  style="padding: 0;border-left:solid 1px #000" >3</td>
              <td style="padding: 0" >Брусалица</td>
              <td style="padding: 0" >ком</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0;border-right:solid 1px #000" >2</td>
          </tr>


          <tr style="padding: 0" >
              <td  style="padding: 0;border-left:solid 1px #000" >3</td>
              <td style="padding: 0" >Брусалица</td>
              <td style="padding: 0" >ком</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0;border-right:solid 1px #000" >2</td>
          </tr>


          <tr style="padding: 0" >
              <td  style="padding: 0;border-left:solid 1px #000" >3</td>
              <td style="padding: 0" >Брусалица</td>
              <td style="padding: 0" >ком</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0;border-right:solid 1px #000" >2</td>
          </tr>


          <tr style="padding: 0" >
              <td  style="padding: 0;border-left:solid 1px #000" >3</td>
              <td style="padding: 0" >Брусалица</td>
              <td style="padding: 0" >ком</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0;border-right:solid 1px #000" >2</td>
          </tr>


          <tr style="padding: 0" >
              <td  style="padding: 0;border-left:solid 1px #000" >3</td>
              <td style="padding: 0" >Брусалица</td>
              <td style="padding: 0" >ком</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0" >2</td>
              <td style="padding: 0;border-right:solid 1px #000" >2</td>
          </tr>

          </tbody>
      </table>

  </center>
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
</body>
</html>