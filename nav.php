<!-- nav -->
<div class="fixed-nav">
        <div class="nav">
            <ul class="main-nav">
                <li>
                    <a class="menu-a" href="index.php">Satılıq</a>
                </li>
                <li>
                    <a class="menu-a" href="rent.php">Kirayə</a>
                </li>
                <li>
                    <a class="menu-a" href="add.php">Elan yerləşdir</a>
                </li>
                <li>
                    <a href="about-us.php">Haqqımızda</a>
                </li>
            </ul>
            <ul class="user-nav">
                <?php
                    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                        include "database.php";
                        @$sql_fetch = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `all_user` WHERE  id = '{$_SESSION['user']}';"));                     
                        echo"
                        <li class=\"profile-nav\">
                            <a href=\"profile.php\" class=\"profile-name-icon\">
                                <span>".$sql_fetch['fullname']."</span>
                                <div class=\"bg\" id=\"profile-icon\">
                                    <img src=\"img/icon/user-black.png\" id=\"profile-icon1\">
                                    <img src=\"img/icon/user-orange.png\" id=\"profile-icon2\">
                                </div>
                            </a>
                            <li>
                                <a href=\"logout.php\">Çıxış</a>
                            </li>
                        </li>
                        ";
                    }
                    else
                        echo"
                        <li>
                            <a href=\"login-pop-up.php\">Daxil ol</a>
                        </li>
                        <li>
                            <a href=\"register-pop-up.php\">Qeydiyyat</a>
                        </li>
                        ";
                ?>
                
            </ul>
        </div>
    </div>
    <!----------------nav------------------>