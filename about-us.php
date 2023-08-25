<?php 
    session_start();
    include "database.php";
    $query_about_us = "SELECT * FROM `about_us`";
    $run_about = mysqli_query($con, $query_about_us);
    $about_num_row = mysqli_num_rows($run_about);
    $fetch_about = mysqli_fetch_assoc($run_about); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/reset.css">
    <link rel="stylesheet" href="assets/static.css">
    <link rel="stylesheet" href="assets/about-us.css">
    <style>
        <?php
        if(isset($_SESSION['user'])){
            echo "
                .user-nav{
                    width: 32rem;
                }
            ";
        }
        ?>
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            function counter(id, start, end, duration) {
            let obj = document.getElementById(id),
            current = start,
            range = end - start,
            increment = end > start ? 1 : -1,
            step = Math.abs(Math.floor(duration / range)),
            timer = setInterval(() => {
            current += increment;
            obj.textContent = current;
            if (current == end) {
                clearInterval(timer);
            }
            }, step);
            }
            counter("num1", 0, <?=$fetch_about['card1_count']?>, 3000);
            counter("num2", 0, <?=$fetch_about['card2_count']?>, 2500);
            counter("num3", 0, <?=$fetch_about['card3_count']?>, 3000);
            counter("num4", 0, <?=$fetch_about['card4_count']?>, 3000);
        });
    </script>
</head>
<body>
    <?php include "nav.php";?>

    <div class="about">
        <div class="about-us-div">
            <h3>
               <?=$fetch_about['about_header']?>
            </h3>
            <p>
                <?=$fetch_about['about_paragraph']?>
            </p>
        </div>
        <div class="about-img" style="background-image: url(img/about-img2.jpg);"></div>
    </div>

    <div class="facts-cards">
        <div class="card-fact">
            <img src="img/icon/icons8-sticky-notes-orange-64.png" width="64" alt="">
            <h1 class="number" id="num1"></h1>
            <span>Elan sayı</span>
        </div>
        <div class="card-fact">
            <img src="img/icon/icons8-sale-price-tag-96.png" width="64" alt="">
            <h1 class="number" id="num2"></h1>
            <span>Satılıq elanlar</span>
        </div>
        <div class="card-fact">
            <img src="img/icon/icons8-rent-64.png" width="64" alt="">
            <h1 class="number" id="num3" ></h1>
            <span>Kirayə elanlar</span>
        </div>
        <div class="card-fact">
            <img src="img/icon/user-orange.png" width="64" alt="">
            <h1 class="number" id="num4" ></h1>
            <span>Aktiv istifadəçilər</span>
        </div>
    </div>

    <?php include "footer.php";?>
    <script src="js/page.js"></script>
</body>
</html>