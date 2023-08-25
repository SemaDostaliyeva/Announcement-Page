<?php
    session_start();
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
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
    <link rel="stylesheet" href="assets/login.css">
</head>
<body>
     <!-- login -->
    <div class="flex-div" id="login-card">
        <div class="login-card">
            <p class="login-warning1" <?php check_session('warning1');?> >Hesabınız var, zəhmət olmasa daxil olun.</p>
            <p class="login-warning1" <?php check_session('warning15');?> >Şifrə yeniləndi.<br>Daxil olun</p>
            <form action="login.php" method="post" class="login-form">
                <input type="email" name="email" placeholder="E-mail" value="<?=@$_COOKIE["email"]?>">
                <input type="password" name="password" placeholder="Şifrə">
                <input type="submit" value="Daxil ol" id="login-btn">
            </form>
            <div class="login-text">

                <p class="login-warning2" <?php check_session('warning2');?> >E-mail və ya şifrə yanlışdır.</p>
                <p class="login-warning3" <?php check_session('warning3');?> >Xanalar boş buraxıla bilməz!</p>
                <p class="login-warning4" <?php check_session('warning5');?>>
                    Bu e-maildə hesab tapılmadı. 
                    <br>
                    Xahiş edirik, qeydiyyatdan keçin.
                    <br>
                </p>
                <p>
                    <a class="forget-password" href="forget-password.php">Şifrənizi unutdunuzmu?</a>
                    <a class="login-register" href="register-pop-up.php">Qeydiyyat</a>
                </p>
            </div>
        </div>
    </div>
    <!-- login -->
    
    <script src="js/page.js"></script>
</body>
</html>