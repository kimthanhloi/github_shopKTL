<?php
if (isset($_POST["search"])) {
    $s = $_POST["search"] ?? "";
    if (!empty($s)) {
        $products = new products();
        $rows = $products->serach_product($s);

    } else {
        Header('Location: /index.php?pages=product_detail&action=layout&html=home');
    }





}


$low = $_POST["low_price"] ?? "";
if ($low === "low_price") {
    $products = new products();
    $rows = $products->lowprice();

}
if ($low === "expensive") {
    $products = new products();
    $rows = $products->expensive();
}
if ($low === "productnew") {
    $products = new products();
    $rows = $products->productnew();
}
?>


<!-- /index.php?pages=product_detail&action=layout&html=serach -->
<div class="container">

    <section>
        <article>
            <div class="container">
                <p class="container_title" style="margin-top: 60px;">Kết Quả Tìm Kiếm:
                    <strong>
                        <?= $s ?? "" ?>
                    </strong>


                </p>
                <div class="grid wide">
                    <div class="row" id="product_print1">
                        <?php
                        // $products = new products();
                        // $rows = $products->serach_product();
                        foreach ($rows as $row) {
                            extract($row)
                                ?>
                        <div class="col l-3 m-6 c-12">
                            <div class="item_product">
                                <a href="/index.php?pages=product_detail&action=layout&html=chitiet&id=<?= $id ?>"
                                    class="item_product_img">
                                    <img src="../adminnew/img/<?= $img ?>" alt="" />
                                </a>
                                <a href="/index.php?pages=product_detail&action=layout&html=chitiet&id=<?= $id ?>"
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

                </div>
            </div>
        </article>

    </section>


</div>