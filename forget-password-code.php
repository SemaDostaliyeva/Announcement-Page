<?php
    session_start();
    if(isset($_SESSION['user'])){
        header("Location: profile.php");
    }
    if(!isset($_SESSION['email'])){
        header("Location: forget-password.php");
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
    <link rel="stylesheet" href="assets/forget-password-code.css">
</head>
<body>
    <!-- forget-password-code -->
    <div class="flex-div" id="forget-password-code-card">
        <div class="forget-password-code-card">
            <p class="send-msg-forget">
                E-mailinizə ismarıc göndərildi.<br>Hesabınızı təsdiqləyin.
            </p>
            <form action="forget-password-check.php" method="post" class="forget-password-code-form">
                <input type="text" name="code" placeholder="Kod">
                <input type="submit" value="Təsdiqlə" id="forget-password-code-btn">
            </form>
            <div class="forget-password-code-text">
                <p class="forget-code-warning" <?php check_session('warning8');?> >Xana boş buraxıla bilməz!</p>
                <p class="forget-code-warning" <?php check_session('warning9');?> >Kod yanlışdır!</p>
            </div>
        </div>
    </div>
    <!-- forget-password-code -->
    
    <script src="js/page.js"></script>
</body>
</html>