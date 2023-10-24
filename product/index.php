<div class="container">
    <section>
        <div class="banner">
            <img src="../adminnew/img/Banner_sale_14.2_(02).jpg" alt="" />
        </div>
    </section>
    <section>
        <article>
            <div class="container">
                <div class="body_header"
                    style="display: flex; justify-content: end ;align-item:center;margin-right: 100px;">
                    <!-- select optipon  -->
                    <div class="select">
                        <form id="myForm" method="post"
                            action="/index.php?pages=product_detail&action=layout&html=serach">
                            <select id="mySelect" name="low_price" style="width: 100%; height: 100%;">
                                <option selected disabled>Tùy Chọn</option>
                                <option value="low_price">Giá Thấp nhất đến cao nhất</option>
                                <option value="expensive">Giá Cao Nhất Đến Thấp Nhất</option>
                                <option value="productnew">5 Mặt Hàng Mới Nhất</option>

                            </select>

                        </form>

                    </div>
                </div>
                <p class="container_title">Giày Cao Gót Nữ</p>

                <div class="grid wide">
                    <div class="row" id="product_print1">
                        <?php
                        $products = new products();
                        $rows = $products->getAllshoewoman();
                        foreach ($rows as $row) {
                            extract($row)
                                ?>
                        <div class="col l-3 m-6 c-12">
                            <div class="item_product">
                                <a href=" /index.php?pages=product_detail&action=layout&html=chitiet&id=<?= $id ?>"
                                    class=" item_product_img">
                                    <img src="../adminnew/img/<?= $img ?>" alt="" />
                                </a>
                                <a href=" /index.php?pages=product_detail&action=layout&html=chitiet&id=<?= $id ?>"
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
                    <a href="./html/giaynu.php" class="seenall_product">XEM TẤT CẢ</a>
                </div>
            </div>
        </article>
        <article>
            <div class="container">
                <p class="container_title">BALO THỜI TRANG</p>
                <div class="grid wide">
                    <div class="row" id="product_print2">
                        <?php

                        $products = new products();
                        $rows = $products->getAllbag();
                        foreach ($rows as $row) {
                            extract($row)
                                ?>
                        <div class="col l-3 m-6 c-12">
                            <div class="item_product">
                                <a href="/index.php?pages=product_detail&action=layout&html=chitiet&id=<?= $id ?>"
                                    class=" item_product_img">
                                    <img src="../adminnew/img/<?= $img ?>" alt="" />
                                </a>
                                <a href=" /index.php?pages=product_detail&action=layout&html=chitiet&id=<?= $id ?>"
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
        </article>
        <article>
            <div class="container">
                <p class="container_title">GIÀY NAM</p>
                <div class="grid wide">
                    <div class="row" id="product_print3">

                        <?php

                        $products = new products();
                        $rows = $products->getAllshoemen();
                        foreach ($rows as $row) {
                            extract($row)
                                ?>
                        <div class="col l-3 m-6 c-12">
                            <div class="item_product">
                                <a href="/index.php?pages=product_detail&action=layout&html=chitiet&id=<?= $id ?>"
                                    class=" item_product_img">
                                    <img src="../adminnew/img/<?= $img ?>" alt="" />
                                </a>
                                <a href=" /index.php?pages=product_detail&action=layout&html=chitiet&id=<?= $id ?>"
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
                    <a href="./html/giaynam.php" class="seenall_product">XEM TẤT CẢ</a>
                </div>
            </div>
        </article>
    </section>


</div>