<?php
    session_start();
    if(isset($_SESSION['user'])){
        header("Location: profile.php");
    }
    function check_session($index){
        if($_SESSION[$index]==$index){
            echo "style=\"display:block;\"";
        }
        else{
            echo "style=\"display:none;\"";
        }      
        unset($_SESSION[$index]);        
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
    <link rel="stylesheet" href="assets/register.css">
</head>
<body>
    <!-- register -->
    <div class="flex-div" id="register-card">
        <div class="register-card">
            <form onsubmit="return check();" action="register.php" method="POST" class="register-form">
                <input type="text" name="fullname" id="fullname" placeholder="Ad Soyad">
                <input type="email" name="email" id="email" placeholder="E-mail">
                <input type="password" name="password" id="password" placeholder="Şifrə">
                <input type="password" name="password-confirm" id="password-confirm" placeholder="Şifrənin təkrarı">
                <input type="submit" value="Qeydiyyat" id="register-btn">
            </form>
            <div class="register-text">
                <p class="register-warning1" id="fill-warning" style="display:none;">Xanalar boş buraxıla bilməz!</p>
                <p class="register-warning2" id="psw-warning" style="display:none;">Şifrələr uyğun deyil!</p>
                <p class="register-warning3"  style="display:none;" <?php check_session('warning4');?> >Kodun müddəti bitib. Yenidən sınayın.</p>
                <p>
                    <span>Hesabınız varmı?</span>
                    <a class="register-login" href="login-pop-up.php">Daxil ol</a>
                </p>
            </div>
            
        </div>
    </div>
    <!-- register -->

    <script src="js/submit-function.js"></script>
</body>
</html>