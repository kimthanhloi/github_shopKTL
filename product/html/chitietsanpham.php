<?php
// var_dump($_SESSION['dangky']);

if (!empty($_SESSION["dangky"])) {
    $userid = $_SESSION["dangky"]["id"];
    // echo $userid;
    if (!empty($userid)) {


        $user = new user();



        $getid = $user->select_iduser($userid);


    }

}



?>


</div>
<div class="container">


    <section class="main_product_details">
        <article class="grid ">
            <div class="row">

                <?php

                $id = $_GET['id'];
                $comment = new comment();

                if (isset($_GET['id'])) {

                    $comment->list_see_chitiet_insert($id);
                }

                $product = new products();
                $rows = $product->selectbyid($id);
                foreach ($rows as $row) {
                    extract($row)
                        ?>
                    <form class="form_chitiet"
                        action="/index.php?pages=product_detail&action=layout&html=giohang&id=<?= $id ?>" method="post"
                        style="display: flex;">
                        <div class="col l-6 m-6 c-12">
                            <div class="img">
                                <div class="product_details product_details-box-img">

                                    <img class="product_details_img" src="../../adminnew/img/<?= $img ?>" alt="">
                                </div>
                            </div>

                        </div>
                        <div class="col l-6 m-6 c-12 border_bt">
                            <div class="product_details">

                                <div class="product_details-item" style="  text-align: none !important;">
                                    <h1>
                                        <?= $name ?>

                                    </h1>
                                    <div class="product_details-feedback">
                                        <div class="icon">
                                            <i class="fa-sharp fa-solid fa-star"></i><i
                                                class="fa-sharp fa-solid fa-star"></i><i
                                                class="fa-sharp fa-solid fa-star"></i><i
                                                class="fa-sharp fa-solid fa-star"></i><i
                                                class="fa-sharp fa-solid fa-star"></i>
                                        </div>
                                        <div class="feedback">
                                            <span>1014</span>
                                            <span>Đánh Giá</span>
                                        </div>
                                        <div class="feedbacklike">
                                            <span>890</span>
                                            <span>số lượng Thích</span>
                                        </div>
                                    </div>
                                    <div class="product_details-price">
                                        <span>
                                            <?=
                                                number_format($money, 0, ",", ".")
                                                ?>đ
                                        </span>

                                    </div>
                                    <div class="product_details-color">
                                        <span>Màu</span>

                                        <img class="product_details-color-white active_item_size"
                                            src="./product/img/whitenau.jpg" title="1" alt="">
                                        <img class="product_details-color-white " title="2" src="./product/img/black.jpg"
                                            alt="">
                                        <img class="product_details-color-white " title="3" src="./product/img/xam.jpg"
                                            alt="">
                                        <img class="product_details-color-white " title="4" src="./product/img/nau.jpg"
                                            alt="">
                                    </div>
                                    <div class="product_details-size">
                                        <span>Kích Thước</span>
                                        <div class="product_details-size-item">


                                            <span class="item_size active_item_size">36</span>
                                            <span class="item_size ">37</span>
                                            <span class="item_size ">38</span>
                                            <span class="item_size ">39</span>
                                            <span class="item_size ">40</span>
                                        </div>
                                    </div>
                                    <div class="product_details-buy">
                                        <button type="submit" name="addgiohang"
                                            style="border: none; cursor: pointer; color:white;">
                                            <div class="product_details-btn-buy">
                                                Giỏ Hàng
                                            </div>
                                        </button>
                                        <!-- hidden value -->
                                        <input type="hidden" name="img" value="<?= $img ?>">
                                        <input type="hidden" name="name" value="<?= $name ?>">
                                        <input type="hidden" name="money" value="<?= $money ?>">
                                        <input type="hidden" id="size" name="size" value="<?= $size ?> ">
                                        <input type="hidden" id="color" name="color" value="<?= $color ?>">

                                        <div class="product_details-btn-buycard">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                            Xem Thông Tin Chi Tiết Sản Phẩm
                                        </div>
                                    </div>
                                    <div class="product_details-contact">
                                        <div class="product_details-contact-item">
                                            <img src="https://img.mwc.com.vn/files/Icon/icon3.jpg" alt="">
                                            <p>Bảo hành keo vĩnh viễn
                                            </p>
                                        </div>
                                        <div class="product_details-contact-item">
                                            <img src="https://img.mwc.com.vn/files/Icon/icon4.jpg" alt="">
                                            <p>Miễn phí vận chuyển toàn quốc
                                                cho đơn hàng từ 150k</p>
                                        </div>
                                        <div class="product_details-contact-item">
                                            <img src="https://img.mwc.com.vn/files/Icon/icon5.jpg" alt="">
                                            <p>Đổi trả dễ dàng
                                                (trong vòng 7 ngày nếu lỗi nhà sản xuất)</p>
                                        </div>
                                    </div>
                                    <div class="product_details-contact">
                                        <div class="product_details-contact-item">
                                            <img src="https://img.mwc.com.vn/files/Icon/icon2.jpg" alt="">
                                            <p>Hotline 1900.633.349
                                                hỗ trợ từ 8h30-21h30
                                            </p>
                                        </div>
                                        <div class="product_details-contact-item">
                                            <img src="https://img.mwc.com.vn/files/Icon/icon1.jpg" alt="">
                                            <p>Giao hàng tận nơi,
                                                nhận hàng xong thanh toán</p>
                                        </div>
                                        <div class="product_details-contact-item">
                                            <img src="https://img.mwc.com.vn/files/Icon/icon3.jpg" alt="">
                                            <p>Ưu đãi tích điểm và
                                                hưởng quyền lợi thành viên từ MWC</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </form>
                </div>
            </article>
        </section>

        <!-- sp liên quan  -->
        <section>
            <div class="container">
                <p class="container_title">Sản Phẩm Liên Quan</p>
                <div class="grid wide">
                    <div class="row" id="product_print2">
                        <?php


                        $product = new products();
                        $rows = $product->selectbyidcategory($category_id);
                        foreach ($rows as $row) {
                            extract($row)
                                ?>
                            <div class="col l-3 m-6 c-12">
                                <div class="item_product">
                                    <a href="/index.php?pages=product_detail&action=layout&html=chitiet&id=<?= $id ?>"
                                        class="item_product_img">
                                        <img src="../adminnew/img/<?= $img ?>" alt="" />
                                    </a>
                                    <a href="/index.php?pages=product_detail&action=layout&html=chitiet"
                                        class="item_product_content">
                                        <div class="item_product_detail">
                                            <p class="title">
                                                <?= $name ?>
                                            </p>
                                            <div class="price">
                                                <?= number_format($money, 0, ",", ".") ?>đ
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <?php
                        }
                        ;

                        ?>


                    </div>
                    <a href="./html/balo.php" class="seenall_product">XEM TẤT CẢ</a>
                </div>
            </div>
        </section>
        <?php
                }
                ;

                ?>
</div>
</div>

<?php
if ($_SESSION["dangky"] ?? "") { ?>


    <div class="comment">
        <ol class="timeline">
            <li class="timeline-item">
                <span class="timeline-item-icon | avatar-icon">
                    <i class="avatar">
                        <img src="https://assets.codepen.io/285131/hat-man.png" />
                    </i>
                </span>
                <div class="new-comment">
                    <?php
                    $idproduct = $_GET["id"];
                    ?>
                    <form action="/index.php?pages=product_detail&action=layout&html=comment" method="post" id="addcmt">

                        <input type="hidden" name="idproduct" value="<?= $idproduct ?>" id="idproduct">
                        <input type="hidden" name="iduser" value="<?= $userid ?>" id="iduser">
                        <input type="text" id="content" style="width: 65%;
                        padding: 14px;
                        
                        outline: none;
    " name="content" placeholder="Add a comment..." />
                        <button type="submit" id="themcmt" name="submit" style="background-color: #fe5f54;
                                                width: 100px;
                                                height: 40px;
                                                outline: none;
                                                border-radius: 20px;
                                                border: none;
                                                color: white;
                                                cursor: pointer !important;">Gửi</button>
                    </form>
                </div>
            </li>
            <!-- select_all_mahanghoa -->
            <div id="inne"></div>
            <?php
            $editcmtuser = $comment->editcmtdetail_user($userid);
            $resultCMT = $comment->select_all_mahanghoa($idproduct);

            foreach ($resultCMT as $row) {

                ?>
                <li class="timeline-item | extra-space tchomnone">
                    <span class="timeline-item-icon | filled-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path fill="currentColor"
                                d="M6.455 19L2 22.5V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H6.455zM7 10v2h2v-2H7zm4 0v2h2v-2h-2zm4 0v2h2v-2h-2z" />
                        </svg>
                    </span>
                    <div class="timeline-item-wrapper">
                        <div class="timeline-item-description">
                            <i class="avatar | small">
                                <img src="https://assets.codepen.io/285131/hat-man.png" />
                            </i>
                            <span><a href="#">

                                    <?= $row["name"] ?? "" ?>
                                </a> Bình luận <time datetime="20-01-2021">
                                    <?= $row["creat_at"] ?? "" ?>
                                </time></span>
                        </div>
                        <div class="comment">
                            <p>
                                <?= $row["content"] ?? "" ?>
                            </p>
                            <?php

                            if ($row['user_id'] == $userid) {
                                ?>
                                <!-- button  -->
                                <div class="main_edit" style="display: flex;">
                                    <button type="button" class="edit_cmt_user" style="border: 1px ;
                                    background-color: transparent; width: 50px;
                                    ">Edit</button>
                                    <form action="/index.php?pages=product_detail&action=layout&html=comment" method="post">
                                        <input type="hidden" value="<?php echo $row["id"] ?>" name="user_id">
                                        <input type="hidden" value="<?php echo $row["product_id"] ?>" name="product_id">
                                        <button type="submit" name="Deletecmd" class="edit_cmt_user" style="border: 1px ;
                                    background-color: transparent; width: 70px;
                                    ">DELETE</button>
                                    </form>

                                    <div class="edit_cmt_user_from none">
                                        <form action="/index.php?pages=product_detail&action=layout&html=comment" method="post">
                                            <input id="iduser" type="hidden" value="<?php echo $row["id"] ?>" name="user_id">
                                            <input id="productid" type="hidden" value="<?php echo $row["product_id"] ?>"
                                                name="product_id">
                                            <input type="text" id="content" name="content" class="inputcmt">
                                            <button type="submit" id="editcmt" name="editcmduser">xác nhận</button>
                                        </form>
                                    </div>

                                </div>
                                <?php
                            } else {
                                echo "";
                            }
                            ?>

                        </div>

                </li>
            <?php } ?>
        </ol>
    </div>
<?php } else { ?>
    <div style="text-align: center;">

        <a href="/index.php?pages=product_detail&action=layout&html=login">

            <div class="login">Đăng Nhập Để Bình Luận </div>
        </a>
    </div>


<?php } ?>



<!-- <script type="text/javascript" src="../js/chitietsanpham.js" defer></script> -->