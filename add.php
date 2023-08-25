<?php 
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: register-pop-up.php");
    }
    include "database.php";
    $query_rules = "SELECT * FROM `rules`";
    $run_rules = mysqli_query($con, $query_rules);
    $rules_num_row = mysqli_num_rows($run_rules);
    $rules = mysqli_fetch_assoc($run_rules); 
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
    <link rel="stylesheet" href="assets/add.css">
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
       <?php 
            if($_SESSION['img-count-less'] == 'less'){
                echo "alert(\"Minimum 4 şəkil olmalıdır!\");";
                unset($_SESSION['img-count-less']);
            }
            else if($_SESSION['img-count-more'] == 'more'){
                echo "alert(\"Maksimum 12 şəkil olmalıdır!\");";
                unset($_SESSION['img-count-more']);
            }
            else if($_SESSION['img-warning-1'] == 'img-warning-1'){
                echo "alert(\"Fayl böyükdür!\");";
                unset($_SESSION['img-warning-1']);
            }
            else if($_SESSION['img-warning-2'] == 'img-warning-2'){
                echo "alert(\"Bu fayl dəstəklənmir!\");";
                unset($_SESSION['img-warning-2']);
            }
        ?>
    </script>
</head>
<body>
    <?php include "nav.php";?>

    <!-- Add-card -->
    <form  action="announcement-add.php" method="post" onsubmit="return check2();" enctype="multipart/form-data">
        <div class="flex-add-div-main">
            <div class="main-add-div">
                <div class="flex-add-div flex-add-div1">
                    <div class="label-input">
                        <label for="fullname">Ad Soyad</label>
                        <input type="text" name="fullname" class="fullname" placeholder="Ad Soyad" id="fullname" value="<?=@$_COOKIE["fullname"]?>">
                    </div>
                    <div class="label-input">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" class="email" placeholder="elan@gmail.com" id="email" value="<?=@$_COOKIE["email"]?>">
                    </div>
                    <div class="label-input">
                        <label for="tel">Telefon nömrəsi</label>
                        <input type="tel" name="tel" class="tel" placeholder="000-111-22-33" id="tel">
                    </div>
                    <div class="label-input">
                        <label for="elantipi">Əlaqədar şəxs</label>
                        <div class="radio elantipi">
                            <label for="agent" class="not">
                                <input type="radio" name="elantipi" id="agent" value="1">
                                Vasitəçi (agent)
                            </label>
                            <label for="oz" class="not">
                                <input type="radio" name="elantipi" id="oz" value="2" checked>
                                Elan sahibi
                            </label>
                        </div>
                    </div>
                    <div class="label-input">
                        <label for="satistipi">Elan növü</label>
                        <div class="radio satistipi" onchange="return togglePassDiv4('gun-ay');">
                            <label for="satiliq" class="not">
                                <input type="radio" name="satistipi" id="satiliq" value="1" checked>
                                Satılıq
                            </label>
                            <label for="kiraye" class="not">
                                <input type="radio" name="satistipi" id="kiraye" value="2">
                                Kirayə
                            </label>
                        </div>
                    </div>
                    <div class="label-input-flex-row">
                        <div class="label-input">
                            <label for="region">Region</label>
                            <select name="region" id="region" onchange="select();">
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
                        <div class="label-input" id="baki-div">
                            <label for="baki-rayon">Bakı rayonları</label>
                            <select name="baki-rayon" id="baki-rayon">
                                <option value="Həzi Aslanov">Həzi Aslanov </option>
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
                    </div>
                    <div class="label-input">
                        <label for="regionerazisi">Region ərazisi</label>
                        <div class="radio regionerazisi" onchange="return togglePassDiv4('village');">
                            <label for="seher" class="not">
                                <input type="radio" name="regionerazisi" id="seher" value="1" checked>
                                Şəhər
                            </label>
                            <label for="kend" class="not">
                                <input type="radio" name="regionerazisi" id="kend" value="2">
                                Kənd
                            </label>
                            <input type="text" name="kend" id="village" placeholder="Qəsəbə / Kənd" style = "display:none;">
                        </div>
                    </div>
                    <div class="label-input">
                        <label for="menziltipi">Mənzil tipi</label>
                        <div class="radio menziltipi" onchange="return togglePassDiv4('yard');">
                            <label for="bina" class="not">
                                <input type="radio" name="menziltipi" id="bina" value="1" checked>
                                Bina
                            </label>
                            <label for="heyet" class="not">
                                <input type="radio" name="menziltipi" id="heyet" value="2">
                                Həyət
                            </label>
                            <input type="text" name="sot" id="yard" placeholder="Sahə (sot)" style = "display:none;">
                        </div>
                    </div> 
                </div>

                <div class="flex-add-div flex-add-div2">
                    <div class="label-input">
                        <label for="evinsahesi">Evin sahəsi</label>
                        <div>
                            <input type="text" name="evinsahesi" id="evinsahesi"><span>kv.metr</span>
                        </div>
                    </div>
                    <div class="label-input">
                        <label for="otaqsayi">Otaq sayı</label>
                        <input type="text" name="otaqsayi" id="otaqsayi">
                    </div>
                    <div class="label-input">
                        <label for="qiymet">Qiymət</label>
                        <div>
                            <input type="text" id="qiymet" name="qiymet">
                            <span>AZN</span>
                        </div>
                        
                        <div class="radio" style = "display:none;" id="gun-ay">
                            <label for="ayliq" class="not">
                                <input type="radio" name="kiratipi" id="ayliq" value="1" checked>
                                Aylıq
                            </label>
                            <label for="gunluk" class="not">
                                <input type="radio" name="kiratipi" id="gunluk" value="2">
                                Günlük
                            </label>
                        </div>
                    </div>
                    <div class="label-input">
                        <label for="temirtipi">Təmir tipi</label>
                        <div class="radio" id="temirtipi">
                            <label for="tamtemirli" class="not">
                                <input type="radio" name="temirtipi" id="tamtemirli" value="1" checked>
                                Təmirsiz
                            </label>
                            <label for="natamamtemirli" class="not">
                                <input type="radio" name="temirtipi" id="natamamtemirli" value="2">
                                Natamam təmirli
                            </label>
                            <label for="temirsiz" class="not">
                                <input type="radio" name="temirtipi" id="temirsiz" value="3">
                                Tam təmirli
                            </label>
                        </div>
                    </div>
                    <div class="label-input">
                        <label for="unvan">Dəqiq ünvan</label>
                        <input type="text" name="unvan" id="unvan">
                    </div>
                    <div class="label-input">
                        <label for="melumat">Məlumat</label>
                        <textarea name="melumat" class="info" id="melumat" cols="50" rows="5" maxlength="800"></textarea>
                    </div>
                    <div class="img-submit-reset">
                        <div class="label-input" id="img-not">
                            <label for="img">Şəkil əlavə edin</label>
                            <input  type="file"  id="img" name="img[]" accept=".jpg, .jpeg" multiple>
                        </div>
                        <input type="submit" name="add-submit" id="submit" class="btn-add" value="Göndər">
                        <input type="reset" class="btn-add" value="Sıfırla">
                    </div>
                </div>

                <div class="flex-add-div flex-add-div-info">
                    <ul >
                       <?php 
                        for($i=1; $i<6; $i++){
                            echo "<li>".$rules['rules'.$i]."</li>";
                        }
                        ?> 
                    </ul>
                </div>
            </div>
        </div>
    </form>

    <!-- Add-card -->

    <?php include "footer.php";?>

    <script src="js/page.js"></script>

</body>
</html>