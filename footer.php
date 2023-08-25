<?php
    include "database.php";
    $query_footer = "SELECT * FROM `footer`";
    $run_footer = mysqli_query($con, $query_footer);
    $footer_data = mysqli_fetch_assoc($run_footer);
?>
<!-- Footer -->
<footer class="footer-distributed">

<div class="footer-left">

    <h3><?=$footer_data['site_name']?></h3>

    <p class="footer-links">
        <a href="index.php" class="link-1">Satılıq</a>
                    
        <a href="rent.php">Kirayə</a>
    
        <a href="add.php">Elan yerləşdir</a>
        
        <a href="about-us.php">Haqqımızda</a>
    </p>

    <p class="footer-company-name">S. Dostalıyeva, G. Cumayeva © <?php echo date('Y',strtotime('now'));?></p>
</div>

<div class="footer-center">

    <div>
        <i class="fa fa-map-marker"></i>
        <p><?=$footer_data['footer_adress']?></p>
    </div>

    <div>
        <i class="fa fa-phone"></i>
        <p><?=$footer_data['footer_phone']?></p>
    </div>

    <div>
        <i class="fa fa-envelope"></i>
        <p><a href="mailto:<?=$footer_data['footer_email']?>"><?=$footer_data['footer_email']?></a></p>
    </div>

</div>

<div class="footer-right">

    <p class="footer-company-about">
        <span><?=$footer_data['footer_title']?></span>
        <?=$footer_data['footer_paragraph']?>
    </p>

</div>

</footer>

<!-- Footer -->