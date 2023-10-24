<header id="header">
    <div class="grid wide header_in">
        <div class="bars none">
            <i class="fa-solid fa-bars"></i>
        </div>
        <a href="
        /index.php?pages=product_detail&action=layout&html=home" class="logo_header">
            <img src="https://mwc.com.vn/Assets/App/images/logo.png" alt="" />
        </a>
        <nav class="menu">
            <ul>
                <li><a href="../html/Sale.php">SALE - 50%</a></li>
                <li><a href="../html/giaynam.php">Giày Nam </a></li>
                <li><a href="../html/giaynu.php">Giày Nữ</a></li>
                <li><a href="../html/balo.php">BaLo - Túi</a></li>
                <li><a href="../html/phukien.php">Phụ Kiện</a></li>
            </ul>
        </nav>
        <div class="serach_container">
            <div class="box">
                <form method="post" action="/index.php?pages=product_detail&action=layout&html=serach">
                    <input type="text" name="search" class="input" name="txt"
                        onmouseout="this.value = ''; this.blur();">

                </form>
                <i class="fas fa-search"></i>

            </div>
        </div>
        <div class="header_login">
            <?php

            if ($_SESSION["dangky"] ?? "") { ?>


            <ul class="user_login">
                <li> <img style="width: 40px; border-radius: 50%;"
                        src="https://phunuvietnam.mediacdn.vn/media/news/33abffcedac43a654ac7f501856bf700/anh-profile-tiet-lo-g-ve-ban-1.jpg"
                        alt="">
                    <ul class="user_login_chil">
                        <li><a href="/index.php?pages=product_detail&action=layout&html=setting">Cài Đặt</a>
                        </li>
                        <li><a href="">Trơ Giúp & Hỗ Trợ</a></li>
                        <li><a href="">Đóng Góp Ý Kiến</a></li>
                        <li><a href="/index.php?pages=product_detail&action=layout&html=logout">Đăng Xuất</a></li>
                    </ul>
                </li>
                <li> <span style="margin-left: 10px;">
                        <?php echo $_SESSION["dangky"]["name"] ?>
                    </span></li>
            </ul>
            <?php } else { ?>
            <a href="/index.php?pages=product_detail&action=layout&html=login">

                <div class="login">Đăng Nhập</div>
            </a>
            <a href="/index.php?pages=product_detail&action=layout&html=login">

                <div class="register">Đăng Ký</div>
            </a>
            <?php } ?>
        </div>
    </div>
</header>