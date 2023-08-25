<?php
    session_start();
    if(!isset($_POST['filter-submit'])){
        header("Location: index.php");
    }
    $string = "";
    ($_POST['bina-heyet'] != 'Hamısı') ? ($string .= "AND flat_type = '{$_POST['bina-heyet']}' ") : $string;
    ($_POST['seher-kend'] != 'Hamısı') ? ($string .= "AND area_type = {$_POST['seher-kend']} ") : $string;
    ($_POST['temir-tipi'] != 'Hamısı') ? ($string .= "AND fix_type = {$_POST['temir-tipi']} ") : $string;
    ($_POST['region'] != 'Hamısı') ? ($string .= "AND region = '{$_POST['region']}' ") : $string;
    ($_POST['baki-rayon'] != 'Hamısı') ? ($string .= "AND baku_region = '{$_POST['baki-rayon']}' ") : $string;
    (isset($_POST['rent']) && $_POST['rent'] != 'Hamısı') ? ($string .= "AND dayly_monthly = {$_POST['rent']} ") : $string;

    (!empty($_POST['cost-min'])) ? ($string .= "AND cost >= {$_POST['cost-min']} ") : $string;
    (!empty($_POST['cost-max'])) ? ($string .= "AND cost <= {$_POST['cost-max']} ") : $string;

    (!empty($_POST['kv-min'])) ? ($string .= "AND flat_area >= {$_POST['kv-min']} ") : $string;
    (!empty($_POST['kv-max'])) ? ($string .= "AND flat_area <= {$_POST['kv-max']} ") : $string;

    (!empty($_POST['sot-min'])) ? ($string .= "AND sot >= {$_POST['sot-min']} ") : $string;
    (!empty($_POST['sot-max'])) ? ($string .= "AND sot <= {$_POST['sot-max']} ") : $string;

    (!empty($_POST['room-min'])) ? ($string .= "AND room_count >= {$_POST['room-min']} ") : $string;
    (!empty($_POST['room-max'])) ? ($string .= "AND room_count <= {$_POST['room-max']} ") : $string;

    $_SESSION['filter'] = $string;

    ($_SESSION['page'] == "sail") ? ($page = "index.php") : ($page = "rent.php");
    header("Location: $page");

?>