<?php
    session_start();
    if(isset($_SESSION['user'])){
        header("Location: profile.php");
    }
    if(!isset($_SESSION['email'])){
        header("Location: forget-password.php");
    }
    function check_session($index){
        if(@$_SESSION[$index]==$index){
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
    <link rel="stylesheet" href="assets/new-password.css">
</head>
<body>
    <!-- new-password -->
    <div class="flex-div" id="new-password-card">
        <div class="new-password-card">
            <form action="new-password-check.php" method="POST" class="new-password-form">
                <input type="password" name="password" id="password" placeholder="Yeni şifrə">
                <input type="password" name="password-confirm" id="password-confirm" placeholder="Şifrənin təkrarı">
                <input type="submit" value="Yenilə" id="new-password-btn">
            </form>
            <div class="new-password-text">
                <p class="new-password-warning1" <?php check_session('warning12');?> >Xanalar boş buraxıla bilməz!</p>
                <p class="new-password-warning2" <?php check_session('warning13');?> >Şifrələr uyğun deyil!</p>
                <p class="new-password-warning3" <?php check_session('warning14');?> >Artıq bu şifrəni işlətmisiniz!</p>
            </div>
            
        </div>
    </div>
    <!-- new-password -->

    <script src="js/submit-function.js"></script>
</body>
</html>