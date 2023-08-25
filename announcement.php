<?php 
    session_start();
    if(!isset($_GET['announcement-id']) || empty($_GET['announcement-id'])){
        header("Location: index.php");
    }
    include "database.php";
    $query_announcement = "SELECT * FROM `{$_SESSION['page']}` where announcement_id = '{$_GET['announcement-id']}';";
    $run_announcement = mysqli_query($con, $query_announcement);
    $fetch_announcement = mysqli_fetch_assoc($run_announcement);
    $person = "Agent"; 
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
    <link rel="stylesheet" href="assets/announcement.css">
    <style>
        <?php
        if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
            echo "
                .user-nav{
                    width: 32rem;
                }
            ";
        }
        ?>
    </style>
</head>
<body>
    <?php include "nav.php";?>

    <div class="announcement">
        <div class="card-slide">

            <div class="container">
                <div class="slider">
                    <div class="slider__slides">
                        <div class="slider__slide active">
                            <div style="background-image: url(<?=$fetch_announcement['image1']?>);"></div>
                        </div>           
                        <?php 
                            $count = 0;
                            for($i=2; $i<=12; $i++){
                                if($fetch_announcement['image'.$i]==""){ continue;}
                        ?>
                                <div class="slider__slide">
                                    <div style="background-image: url(<?=$fetch_announcement["image"."{$i}"]?>);"></div>
                                </div>
                        <?php $count++; } ?> 
                    </div>
                    <div id="nav-button--prev" class="slider__nav-button"></div>
                    <div id="nav-button--next" class="slider__nav-button"></div>
                    <div class="slider__nav">
                        <div class="slider__navlink active"></div>
                        <?php 
                            for($j=0; $j<$count; $j++){
                                echo "<div class=\"slider__navlink\"></div>";
                            }
                        ?>
                    </div>
                </div>
            </div>

        </div>

        <div class="info">
            <div class="info-div">
                <div class="info-item item1">
                    <h5>
                        <?php 
                        echo (!empty($fetch_announcement['region'])) ? (htmlspecialchars($fetch_announcement['region'])): "";
                        echo (!empty($fetch_announcement['baku_region'])) ? " / ".htmlspecialchars($fetch_announcement['baku_region']) : "";
                        echo (!empty($fetch_announcement['kend'])) ? " / ".htmlspecialchars($fetch_announcement['kend']) : "";
                        ?>
                    </h5>
                    <p>
                        <?=$fetch_announcement['adress'];?>
                    </p>
                    <p>
                        <?php 
                        echo htmlspecialchars($fetch_announcement['flat_area'])." m<sup>2</sup>";
                        echo (!empty($fetch_announcement['yard'])) ? " / ".htmlspecialchars($fetch_announcement['yard'])." sot" : "";
                        ?>
                    </p>
                    <p>
                        <?php 
                        if($fetch_announcement['fix_type'] == "1") $temir = "Təmirsiz"; 
                        elseif($fetch_announcement['fix_type'] == "2") $temir = "Natamam təmirli"; 
                        elseif($fetch_announcement['fix_type'] == "3") $temir = "Təmirli"; 

                    
                        echo htmlspecialchars($fetch_announcement['room_count'])." otaq";
                        echo " / ".htmlspecialchars($temir) ;
                        ?>
                    </p>
                </div>
                <div class="info-item item2">
                    <h6>Məlumat</h6>
                    <p class="info-p">
                        <?=htmlspecialchars($fetch_announcement['info'])?>
                    </p>
                </div>
                <div class="info-item item3">
                    <h4>
                        <?php 
                            echo htmlspecialchars($fetch_announcement['fullname']);
                            if($fetch_announcement['person_type'] == "1") echo " (".$person.")";
                        ?>
                    </h4>
                    <p>
                        <?=htmlspecialchars($fetch_announcement['phone'])?>
                    </p>
                    <p>
                        <?=htmlspecialchars($fetch_announcement['email'])?>
                    </p>
                </div>
                <div class="info-item item5">
                    <h5 class="cost">
                        <?=htmlspecialchars($fetch_announcement['cost']);?> AZN
                    </h5>
                </div>
            </div>
            <div class="info-item item6">
                <span>
                    <?=date('d-M-Y',strtotime('now'));?>
                </span>
            </div>
        </div>
    </div>

    <?php include "footer.php";?>
    <script src="js/announcement-slide.js"></script>
    <script src="js/page.js"></script>
</body>
</html>