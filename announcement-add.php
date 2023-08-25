<?php
    session_start();
    include "database.php";

    function valid($data){
		if (isset($_POST[$data]) && !empty($_POST[$data])) {
            global $con;
			return mysqli_real_escape_string($con, htmlspecialchars(trim($_POST[$data])));
		}
		else
			return false;
	}

    if(!isset($_SESSION['user'])){
        header("Location: index.php");
    }
    
    $upload_dir = "uploads/";
    $allowed_types = array('jpg',  'jpeg');
    $count = 0;
    $num = 0;
    
    $maxsize = 10 * 1024 * 1024;

    $img_names = "";

    if(!empty(array_filter($_FILES["img"]["name"]))) {
        echo "yes";
        foreach ($_FILES["img"]["tmp_name"] as $key => $value) {
            $img_tmpname = $_FILES["img"]["tmp_name"][$key];
            $img_name = $_FILES["img"]["name"][$key];
            $img_size = $_FILES["img"]["size"][$key];
            $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
            $imgpath = $upload_dir.time().rand(102030, 989123).".".$img_ext;

            $img_names .= $imgpath."*";
            
            if(in_array(strtolower($img_ext), $allowed_types)) {
                if ($img_size > $maxsize){
                    $_SESSION['img-warning-1'] = 'img-warning-1';
                    // olcu codu
                }          
                move_uploaded_file($img_tmpname, $imgpath);
            }
            else {
                $_SESSION['img-warning-2'] = 'img-warning-2';
                
            }
            $count++;
        }
        $img_arr = explode("*", $img_names);
        
        if(isset($_POST['add-submit'])){
            if($count < 4){
                
                $_SESSION['img-count-less'] = 'less';
            }
            else if ($count > 12) {
              
                $_SESSION['img-count-more'] = 'more';
            }
        }        
    }

    for($i = 0; $i<12; $i++){
        if(!isset($img_arr[$i])){
            $img_arr[$i] = "";
        }
    }
    
    $fullname = valid('fullname');
    $email = valid('email');
    $tel = valid('tel');
    $elantipi = valid('elantipi');
    $satistipi = valid('satistipi');
    $region = valid('region');
    $bakirayon = valid('baki-rayon');
    $regionerazisi = valid('regionerazisi');
    $village = valid('village');
    $menziltipi = valid('menziltipi');
    $evinsahesi = valid('evinsahesi');
    $otaqsayi = valid('otaqsayi');
    $qiymet = valid('qiymet');
    $kiratipi = valid('kiratipi');
    $temirtipi = valid('temirtipi');
    $unvan = valid('unvan');
    $melumat = valid('melumat');
    $sot = valid('sot');
   
    $sql_insert = "INSERT INTO `bin` (users_id, fullname, phone, sail_type , email, image1, image2, image3, image4, image5, image6, image7, image8, image9, image10, image11, image12, cost, region, kend, baku_region, person_type, area_type, flat_type, sot, flat_area, room_count, fix_type, adress, info, dayly_monthly) VALUES ({$_SESSION['user']}, '{$fullname}', '{$tel}', '{$satistipi}','{$email}', '{$img_arr[0]}', '{$img_arr[1]}', '{$img_arr[2]}', '{$img_arr[3]}', '{$img_arr[4]}', '{$img_arr[5]}', '{$img_arr[6]}', '{$img_arr[7]}', '{$img_arr[8]}', '{$img_arr[9]}', '{$img_arr[10]}', '{$img_arr[11]}', '{$qiymet}', '{$region}', '{$village}', '{$bakirayon}', '{$elantipi}', '{$regionerazisi}', '{$menziltipi}', '{$sot}', '{$evinsahesi}', '{$otaqsayi}', '{$temirtipi}', '{$unvan}', '{$melumat}', '{$kiratipi}');";

    $run_sql_insert = mysqli_query($con, $sql_insert);
    header("Location: add.php");

?>