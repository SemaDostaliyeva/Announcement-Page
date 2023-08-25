<?php 
    session_start();
    $_SESSION['page']='rent';
    include "database.php";
    $query_rent = "SELECT * FROM `rent`;";
    $run_rent= mysqli_query($con, $query_rent);
    $run_num_row = mysqli_num_rows($run_rent);

    $grid1=1;
    $grid2=2;
    $grid3=3;
    $grid4=4;
    $filter_grid="add_date DESC";
    $day_mon="";


    if(isset($_POST['rent-submit'])){
        switch($_POST['sort']){
            case "tarix":
                $filter_grid="add_date DESC";
                break;
            case "sahe-min-max":
                $filter_grid="flat_area ASC";
                break;
            case "sahe-max-min":
                $filter_grid="flat_area DESC";
                break;
            case "qiymet-min-max":
                $filter_grid="cost ASC";
                break;
            case "qiymet-max-min":
                $filter_grid="cost DESC";
                break;
        }
    }
    
    function run_query(){
        global $con;
        global $filter_grid;
        (isset($_SESSION['filter'])) ? ($filter = $_SESSION['filter']) : ($filter = "");
        $query_rent_grid = "SELECT  ROW_NUMBER() OVER (ORDER BY $filter_grid) AS rownum, announcement_id, image1, cost, region, kend,flat_area, adress, sot, dayly_monthly FROM   `rent` where rent_status = 1 $filter;";
        $run = mysqli_query($con, $query_rent_grid);
        return $run;
    }
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
    <link rel="stylesheet" href="assets/rent.css">
    <style>
        <?php
        if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
            echo "
                .user-nav{
                    width: 38rem;
                }
            ";
        }
        ?>
    </style>
</head>
<body>
    <!-- nav -->
    <div class="fixed-nav">
        <div class="nav">
            <ul class="main-nav">
                <li>
                    <a class="menu-a" href="index.php">Satılıq</a>
                </li>
                <li>
                    <a class="menu-a" href="rent.php">Kirayə</a>
                </li>
                <li>
                    <a class="menu-a" href="add.php">Elan yerləşdir</a>
                </li>
                <li>
                    <a href="about-us.php">Haqqımızda</a>
                </li>
            </ul>
            <ul class="user-nav">
                <?php
                    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                        include "database.php";
                        @$sql_fetch = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `all_user` WHERE  id = '{$_SESSION['user']}';"));
                        echo"
                        <li class=\"profile-nav\">
                            <a href=\"profile.php\" class=\"profile-name-icon\">
                                <span>".$sql_fetch['fullname']."</span>
                                <div class=\"bg\" id=\"profile-icon\">
                                    <img src=\"img/icon/user-black.png\" id=\"profile-icon1\">
                                    <img src=\"img/icon/user-orange.png\" id=\"profile-icon2\">
                                </div>
                            </a>
                            <li>
                                <a href=\"logout.php\" class=\"logout-p\">Çıxış</a>
                            </li>
                        </li>
                        ";
                    }
                    else
                        echo"
                        <li>
                            <a href=\"login-pop-up.php\">Daxil ol</a>
                        </li>
                        <li>
                            <a href=\"register-pop-up.php\">Qeydiyyat</a>
                        </li>
                        ";
                ?>
                <li onclick="togglePassDiv2('index-filter');";>
                    <div class="bg" id="filter-icon">
                        <img src="img/icon/icons8-filter-black-30.png"  id="filter-icon1" alt="">
                        <img src="img/icon/icons8-filter-hover-30.png" id="filter-icon2" alt="">
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!----------------nav------------------>

    <!-----------------Filter----------------->
    <div class="filter index-filter" id="index-filter" style="display: none;">
        <form action="filter.php" method="post" class="form">
            <div class="div-filter div-filter-select div-rent">
                <label for="rent">Kirayə</label>
                <select class="select rent" name="rent" id="rent">
                    <option value="Hamısı">Hamısı</option>
                    <option value="1">Aylıq</option>
                    <option value="2">Günlük</option>
                </select>
            </div>

            <div class="div-filter div-filter-select div-bina-heyet">
                <label for="bina-heyet">Bina-Həyət</label>
                <select class="select bina-heyet" name="bina-heyet" id="bina-heyet" onchange="select3();">
                    <option value="Hamısı">Hamısı</option>
                    <option value="1">Bina</option>
                    <option value="2">Həyət</option>
                </select>
            </div>
                
            <div class="div-filter div-filter-select div-seher-kend">
                <label for="seher-kend">Şəhər-Kənd</label>
                <select class="select seher-kend" name="seher-kend" id="seher-kend" >
                    <option value="Hamısı">Hamısı</option>
                    <option value="1">Şəhər</option>
                    <option value="2">Kənd</option>
                </select>
            </div>

            <div class="div-filter div-filter-select div-temir-tipi">
                <label for="temir-tipi">Təmir tipi</label>
                <select class="select temir-tipi" name="temir-tipi" id="temir-tipi">
                    <option value="Hamısı">Hamısı</option>
                    <option value="1">Təmirsiz</option>
                    <option value="2">Natamam təmirli</option>
                    <option value="3">Tam təmirli</option>
                </select>
            </div>

            <div class="div-filter div-filter-select div-region">
                <label for="region">Region</label>
                <select class="select region" name="region" id="region" onchange="select2();">
                    <option value="Hamısı">Hamısı</option>
                    <option value="Bakı">Bakı</option>
                    <option value="Abşeron">Abşeron</option>
                    <option value="Xırdalan ş.">Xırdalan ş.</option>
                    <option value="Sumqayıt">Sumqayıt</option>
                    <option value="Gəncə">Gəncə</option>
                    <option value="Ağdaş">Ağdaş</option>
                    <option value="Ağstafa">Ağstafa</option>
                    <option value="Ağsu">Ağsu</option>
                    <option value="Astara">Astara</option>
                    <option value="Balakən">Balakən</option>
                    <option value="Bərdə">Bərdə</option>
                    <option value="Beyləqan">Beyləqan</option>
                    <option value="Biləsuvar">Biləsuvar</option>
                    <option value="Cəbrayıl">Cəbrayıl</option>
                    <option value="Cəlilabad">Cəlilabad</option>
                    <option value="Daşkəsən">Daşkəsən</option>
                    <option value="Dəliməmmədli">Dəliməmmədli</option>
                    <option value="Füzuli">Füzuli</option>
                    <option value="Gədəbəy">Gədəbəy</option>
                    <option value="Goranboy">Goranboy</option>
                    <option value="Göyçay">Göyçay</option>
                    <option value="Göygöl">Göygöl</option>
                    <option value="Göytəpə">Göytəpə</option>
                    <option value="Hacıqabul">Hacıqabul</option>
                    <option value="Horadiz">Horadiz</option>
                    <option value="İmişli">İmişli</option>
                    <option value="İsmayıllı">İsmayıllı</option>
                    <option value="Kəlbəcər">Kəlbəcər</option>
                    <option value="Kürdəmir">Kürdəmir</option>
                    <option value="Laçın">Laçın</option>
                    <option value="Lənkəran">Lənkəran</option>
                    <option value="Lerik">Lerik</option>
                    <option value="Liman">Liman</option>
                    <option value="Masallı">Masallı</option>
                    <option value="Mingəçevir">Mingəçevir</option>
                    <option value="Naftalan">Naftalan</option>
                    <option value="Naxçıvan MR">Naxçıvan MR</option>
                    <option value="Neftçala">Neftçala</option>
                    <option value="Oğuz">Oğuz</option>
                    <option value="Qax">Qax</option>
                    <option value="Qazax">Qazax</option>
                    <option value="Qəbələ">Qəbələ</option>
                    <option value="Qobustan">Qobustan</option>
                    <option value="Quba">Quba</option>
                    <option value="Qubadlı">Qubadlı</option>
                    <option value="Qusar">Qusar</option>
                    <option value="Saatlı">Saatlı</option>
                    <option value="Sabirabad">Sabirabad</option>
                    <option value="Şabran">Şabran</option>
                    <option value="Şamaxı">Şamaxı</option>
                    <option value="Samux">Samux</option>
                    <option value="Şəki">Şəki</option>
                    <option value="Salyan">Salyan</option>
                    <option value="Şəmkir">Şəmkir</option>
                    <option value="Şirvan">Şirvan</option>
                    <option value="Siyəzən">Siyəzən</option>
                    <option value="Şuşa">Şuşa</option>
                    <option value="Tərtər">Tərtər</option>
                    <option value="Tovuz">Tovuz</option>
                    <option value="Ucar">Ucar</option>
                    <option value="Xaçmaz">Xaçmaz</option>
                    <option value="Xaçmaz / Xudat">Xaçmaz / Xudat</option>
                    <option value="Xaçmaz / Nabran">Xaçmaz / Nabran</option>
                    <option value="Xızı">Xızı</option>
                    <option value="Xocavənd">Xocavənd</option>
                    <option value="Ağcəbədi">Ağcəbədi</option>
                    <option value="Yardımlı">Yardımlı</option>
                    <option value="Yevlax">Yevlax</option>
                    <option value="Zaqatala">Zaqatala</option>
                    <option value="Zəngilan">Zəngilan</option>
                    <option value="Zərdab">Zərdab</option>
                    <option value="Ağdam">Ağdam</option>
                </select>
            </div>
            <div class="div-filter div-filter-select div-region" id="baki-div" style="display: none;">
                <label for="baki-rayon">Bakı rayonları</label>
                <select class="select baki-region" name="baki-rayon" id="baki-rayon">
                    <option value="Hamısı">Hamısı</option>
                    <option value="Həzi Aslanov">Həzi Aslanov</option>
                    <option value="Əhmədli">Əhmədli</option>
                    <option value="Xalqlar Dostluğu">Xalqlar Dostluğu</option>
                    <option value="Neftçilər">Neftçilər</option>
                    <option value="Qara Qarayev">Qara Qarayev</option>
                    <option value="Koroğlu">Koroğlu</option>
                    <option value="Ulduz">Ulduz</option>
                    <option value="Nəriman Nərimanov">Nəriman Nərimanov</option>
                    <option value="Gənclik">Gənclik</option>
                    <option value="28 May">28 May</option>
                    <option value="Nizami">Nizami</option>
                    <option value="Elmlər Akademiyası">Elmlər Akademiyası</option>
                    <option value="İnşaatçılar">İnşaatçılar</option>
                    <option value="20 Yanvar">20 Yanvar</option>
                    <option value="Memar Əcəmi">Memar Əcəmi</option>
                    <option value="Nəsimi">Nəsimi</option>
                    <option value="Azadlıq prospekti">Azadlıq prospekti</option>
                    <option value="Cəfər Cabbarlı">Cəfər Cabbarlı</option>
                    <option value="Xətai"> Xətai</option>
                    <option value="Sahil">Sahil</option>
                    <option value="İçəri Şəhər">İçəri Şəhər</option>
                    <option value="Bakmil">Bakmil</option>
                    <option value="Dərnəgül">Dərnəgül</option>
                    <option value="Avtovağzal">Avtovağzal</option>
                    <option value="8 Noyabr">8 Noyabr</option>
                </select>
            </div>
            <div class="div-filter min-max min-max-pul">
                <input type="text" name="cost-min" placeholder="min">
                <input type="text" name="cost-max" placeholder="max">
                <span>AZN</span>
            </div>

            <div class="div-filter min-max min-max-kvadrat">
                <input type="text" name="kv-min" placeholder="min">
                <input type="text" name="kv-max" placeholder="max">
                <span>m^2</span>
            </div>

            <div class="div-filter min-max min-max-sot" id="sot" style="display: none;">
                <input type="text" name="sot-min" placeholder="min">
                <input type="text" name="sot-max" placeholder="max">
                <span>sot</span>
            </div>

            <div class="div-filter min-max min-max-otaq">
                <input type="text" name="room-min" placeholder="min">
                <input type="text" name="room-max" placeholder="max">
                <span>otaq</span>
            </div>
            <div class="search-btn-div">
                <input id="search-button" type="submit" name="filter-submit" value="Axtar">
            </div>
        </form>
    </div>
    <!--------Filter---------->

    <!-- Sirala -->
    <div class="sort">
        <form action="rent.php" method="post" class="sort-form">
            <label for="tarix" class="label">
                <input type="radio" name="sort" id="tarix" value="tarix" checked>
                Tarix
            </label>
            <label for="sahe-min-max" class="label">
                <input type="radio" name="sort" id="sahe-min-max" value="sahe-min-max">
                Sahə(min-max)
            </label>
            <label for="sahe-max-min" class="label">
                <input type="radio" name="sort" id="sahe-max-min" value="sahe-max-min">
                Sahə(max-min)
            </label>
            <label for="qiymet-min-max" class="label">
                <input type="radio" name="sort" id="qiymet-min-max" value="qiymet-min-max">
                Qiymət(min-max)
            </label>
            <label for="qiymet-max-min" class="label">
                <input type="radio" name="sort" id="qiymet-max-min" value="qiymet-max-min">
                Qiymət(max-min)
            </label>
            <input class="sort-submit" type="submit" name="rent-submit" value="Sırala">
        </form>
    </div>
    <!-- Sirala -->
    
    <!-- Grid -->
    <div class="gridbig">
        <!-- run_grid_rent -->

        <div class="grid grid1">
        <?php
        $run_grid_while = run_query();
        while($a = mysqli_fetch_assoc($run_grid_while)){
            if($a['rownum']==$grid1){
                if($a['dayly_monthly'] == "1") $day_mon = "Aylıq"; 
                elseif($a['dayly_monthly'] == "2") $day_mon = "Günlük"; 
        ?>
            <a href="announcement.php?announcement-id=<?=$a['announcement_id']?>" target="_blank" >
                <div class="item1">
                    <img src="<?=$a['image1']?>" alt="">
                    <div class="p-div">
                        <p class="cost">
                            <?="{$a['cost']} AZN / ".$day_mon?>
                        </p>
                        <p class="adress">
                            <?php echo"<span>{$a['region']} {$a['kend']} {$a['adress']}</span>"?>
                        </p>
                        <p class="bottom-text">
                            <span>
                                <?=$a['flat_area']?> m<sup>2</sup>
                            </span>
                        </p>
                    </div>
                </div>
            </a>
        <?php  $grid1 = $grid1 + 4; }} ?>
        </div>

        <div class="grid grid2">
        <?php
        $run_grid_while = run_query();
        while($b = mysqli_fetch_assoc($run_grid_while)){
            if($b['rownum'] == $grid2){
                if($b['dayly_monthly'] == "1") $day_mon = "Aylıq"; 
                elseif($b['dayly_monthly'] == "2") $day_mon = "Günlük";
        ?>
            <a href="announcement.php?announcement-id=<?=$b['announcement_id']?>" target="_blank" >
                <div class="item2">
                    <img src="<?=$b['image1']?>" alt="">
                    <div class="p-div">
                        <p class="cost">
                            <?="{$b['cost']} AZN / ".$day_mon?>
                        </p>
                        <p class="adress">
                            <?php echo"<span>{$b['region']} {$b['kend']} {$b['adress']}</span>"?>
                        </p>
                        <p class="bottom-text">
                            <span>
                                <?=$b['flat_area']?> m<sup>2</sup>
                            </span>
                        </p>
                    </div>
                </div>
            </a>
        <?php $grid2 = $grid2 + 4; } } ?>
        </div>

        <div class="grid grid3">
        <?php
        $run_grid_while = run_query();
        while($c = mysqli_fetch_assoc($run_grid_while)){
            if($c['rownum'] == $grid3){
                if($c['dayly_monthly'] == "1") $day_mon = "Aylıq"; 
                elseif($c['dayly_monthly'] == "2") $day_mon = "Günlük"; 
        ?>
            <a href="announcement.php?announcement-id=<?=$c['announcement_id']?>" target="_blank" >
                <div class="item3">
                    <img src="<?=$c['image1']?>" alt="">
                    <div class="p-div">
                        <p class="cost">
                            <?="{$c['cost']} AZN / ".$day_mon?>
                        </p>
                        <p class="adress">
                            <?php echo"<span>{$c['region']} {$c['kend']} {$c['adress']}</span>"?>
                        </p>
                        <p class="bottom-text">
                            <span>
                                <?=$c['flat_area']?> m<sup>2</sup>
                            </span>
                        </p>  
                    </div>
                </div>
            </a>
        <?php $grid3 = $grid3+ 4; } }?>
        </div>

        <div class="grid grid4">
        <?php
        $run_grid_while = run_query();
        while($d = mysqli_fetch_assoc($run_grid_while)){
            if($d['rownum'] == $grid4){
                if($d['dayly_monthly'] == "1") $day_mon = "Aylıq"; 
                elseif($d['dayly_monthly'] == "2") $day_mon = "Günlük"; 
        ?>
            <a href="announcement.php?announcement-id=<?=$d['announcement_id']?>" target="_blank" >
                <div class="item4">
                    <img src="<?=$d['image1']?>" alt="">
                    <div class="p-div">
                        <p class="cost">
                            <?="{$d['cost']} AZN / ".$day_mon?>
                        </p>  
                        <p class="adress">
                            <?php echo"<span>{$d['region']} {$d['kend']} {$d['adress']}</span>"?>
                        </p>
                        <p class="bottom-text">
                            <span>
                                <?=$d['flat_area']?> m<sup>2</sup>
                            </span>
                        </p>     
                    </div>
                </div>
            </a>
        <?php $grid4 = $grid4 + 4; } } ?>
        </div>
    </div>
    <!-- Grid -->

    <?php include "footer.php"; unset($_SESSION['filter']);?>
    <script src="js/page.js"></script>

</body>
</html>