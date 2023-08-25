<?php 
    session_start();
    if(isset($_SESSION['user'])){
        header("Location: profile.php");
    }
    
    function check_session($index){
        if($_SESSION[$index]==$index){
            echo "style=\"display:block;\"";
            unset($_SESSION[$index]);
        }
        else{
            echo "style=\"display:none;\"";
        }      
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
    <link rel="stylesheet" href="assets/forget-password.css">

</head>
<body>
    <!-- forget-password -->
    <div class="flex-div" id="forget-password-card">
        <div class="forget-password-card">
            <form action="forget.php" method="post" class="forget-password-form">
                <input type="email" name="email" placeholder="E-mail" value="<?=@$_COOKIE["email"]?>">
                <input type="submit" value="Şifrə yenilə" id="forget-password-btn">
            </form>
            <div class="forget-password-text">
                <p class="forget-warning" <?php check_session('warning5');?>>
                    Bu e-maildə hesab tapılmadı. 
                    <br>
                    Xahiş edirik, qeydiyyatdan keçin.
                    <br>
                    <a class="forget-password-register" href="register-pop-up.php">Qeydiyyat</a>
                </p>
                <p class="forget-warning" <?php check_session('warning6');?>>Xana boş buraxıla bilməz!</p>
                <p class="forget-warning" <?php check_session('warning7');?> >Kodun müddəti bitib. Yenidən sınayın.</p>
            </div>
        </div>
    </div>
    <!-- forget-password -->    
    <script src="js/page.js"></script>
</body>
</html>