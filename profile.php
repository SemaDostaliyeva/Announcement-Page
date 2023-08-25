<?php 
    session_start();
    if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
        header("Location:index.php");
    }
    include "database.php";
    $grid1=1;
    $grid2=2;
    $grid3=3;
    $grid4=4;
    $table = "sail";

    function run_query($table){
        global $con;
        if($table == "rent")
            $dayly_monthly=", dayly_monthly";
        else
            $dayly_monthly="";
        $query_rent_grid = "SELECT  ROW_NUMBER() OVER () AS rownum, announcement_id ,image1, cost, region, kend,flat_area, adress, sot $dayly_monthly FROM   `{$table}` where users_id = '{$_SESSION['user']}' AND {$table}_status = 1 ;";
    
        return mysqli_query($con, $query_rent_grid);
    }

    if(isset($_POST['profile-submit'])){
        switch($_POST['sort']){
            case "sail":
                $table = "sail";
                break;
            case "rent":
                $table = "rent";
                break;
        }
    }
    $_SESSION['table'] = $table;
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
    <link rel="stylesheet" href="assets/profile.css">
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
    <?php include "nav.php"; ?>

    <!-- Sirala -->
    <div class="sort">
        <form action="profile.php" method="post" class="sort-form">
            <label for="tarix" class="label">
                <input type="radio" name="sort" id="tarix" value="sail" checked>
                Satılıq elanlarınız
            </label>
            <label for="sahe-min-max" class="label">
                <input type="radio" name="sort" id="sahe-min-max" value="rent">
                Kirayə elanlarınız
            </label>
            <input class="sort-submit" type="submit" name="profile-submit" value="Sırala">
        </form>
    </div>
    <!-- Sirala -->

    <!-- User's announcements -->
    <div class="div-big">
        <div class="grid grid1">
        <?php
        $run_grid_while = run_query($table);
        while($a = mysqli_fetch_assoc($run_grid_while)){
            if($a['rownum']==$grid1){
        ?>
            <a href="announcement.php?announcement-id=<?=$a['announcement_id']?>" target="_blank">
                <div class="item1">
                    <img src="<?=$a['image1']?>" alt="">
                    <div class="p-div">
                        <p class="cost">
                            <?="{$a['cost']} AZN "?> <?php if($table == 'rent') echo "/ ".$a['dayly_monthly']; ?>
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
                    <div class="delete-update">
                        <form action="delete.php" method="post">
                            <input type="submit" name="submit-delete" value="Sil" onclick="confirm('Elanı silmək istədiyinizə əminsinizmi?');" >
                            <input type="hidden" name="hidden-id" value="<?=$a['announcement_id']?>">
                        </form>
                    </div>
                </div>
            </a>
        <?php  $grid1 = $grid1 + 4; }} ?>
        </div>

        <div class="grid grid2">
        <?php
        $run_grid_while = run_query($table);
        while($b = mysqli_fetch_assoc($run_grid_while)){
            if($b['rownum'] == $grid2){
        ?>
            <a href="announcement.php?announcement-id=<?=$b['announcement_id']?>" target="_blank">
                <div class="item2">
                    <img src="<?=$b['image1']?>" alt="">
                    <div class="p-div">
                        <p class="cost">
                            <?="{$b['cost']} AZN "?> <?php if($table == 'rent') echo "/ ".$b['dayly_monthly']; ?>
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
                    <div class="delete-update">
                        <form action="delete.php" method="post">
                            <input type="submit" name="submit-delete" value="Sil" onclick="confirm('Elanı silmək istədiyinizə əminsinizmi?');">
                            <input type="hidden" name="hidden-id" value="<?=$b['announcement_id']?>">
                        </form>
                    </div>
                </div>
            </a>
        <?php $grid2 = $grid2 + 4; } } ?>
        </div>

        <div class="grid grid3">
        <?php
        $run_grid_while = run_query($table);
        while($c = mysqli_fetch_assoc($run_grid_while)){
            if($c['rownum'] == $grid3){
        ?>
            <a href="announcement.php?announcement-id=<?=$c['announcement_id']?>" target="_blank">
                <div class="item3">
                    <img src="<?=$c['image1']?>" alt="">
                    <div class="p-div">
                        <p class="cost">
                            <?="{$c['cost']} AZN "?> <?php if($table == 'rent') echo "/ ".$c['dayly_monthly']; ?>
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
                    <div class="delete-update">
                        <form action="delete.php" method="post">
                            <input type="submit" name="submit-delete" value="Sil" onclick="confirm('Elanı silmək istədiyinizə əminsinizmi?');">
                            <input type="hidden" name="hidden-id" value="<?=$c['announcement_id']?>">
                        </form>
                    </div>
                </div>
            </a>
        <?php $grid3 = $grid3+ 4; } }?>
        </div>

        <div class="grid grid4">
        <?php
        $run_grid_while = run_query($table);
        while($d = mysqli_fetch_assoc($run_grid_while)){
            if($d['rownum'] == $grid4){
        ?>
            <a href="announcement.php?announcement-id=<?=$d['announcement_id']?>" target="_blank">
                <div class="item4">
                    <img src="<?=$d['image1']?>" alt="">
                    <div class="p-div">
                        <p class="cost">
                            <?="{$d['cost']} AZN "?> <?php if($table == 'rent') echo "/ ".$d['dayly_monthly']; ?>
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
                    <div class="delete-update">
                        <form action="delete.php" method="post">
                            <input type="submit" name="submit-delete" value="Sil" onclick="confirm('Elanı silmək istədiyinizə əminsinizmi?');">
                            <input type="hidden" name="hidden-id" value="<?=$d['announcement_id']?>">
                        </form>
                    </div>
                </div>
            </a>
        <?php $grid4 = $grid4 + 4; } } ?>
        </div>
    </div>
    <!-- User's announcements -->

    <?php include "footer.php";?>

    <script src="js/page.js"></script>

</body>
</html>