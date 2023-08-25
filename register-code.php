<?php
    session_start();
    if(isset($_SESSION['user'])){
        header("Location: profile.php");
    }
    if(!isset($_SESSION['register-email'])){
        header("Location: register-pop-up.php");
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
    <link rel="stylesheet" href="assets/register-code.css">
</head>
<body>
    <!-- register-code -->
    <div class="flex-div">
        <div class="register-code-card">
            <p class="send-msg-register">
                E-mailinizə ismarıc göndərildi.<br>Hesabınızı təsdiqləyin.
            </p>
            <form action="register-code-check.php" method="post" class="register-code-form">
                <input type="text" name="code" placeholder="Kod">
                <input type="submit" value="Təsdiqlə" id="register-code-btn">
            </form>
            <div class="register-code-text">
                <p class="register-code-warning" <?php check_session('warning10');?> >Xana boş buraxıla bilməz!</p>
                <p class="register-code-warning" <?php check_session('warning11');?> >Kod yanlışdır!</p>
            </div>
        </div>
    </div>
    <!-- register-code -->
    <script src="js/page.js"></script>
</body>
</html>