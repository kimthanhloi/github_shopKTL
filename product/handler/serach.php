<?php
if (isset($_POST["search"])) {
    $s = $_POST["search"];
    if (!empty($s)) {
        // $ss = str_replace($s);
        $products = new products();
        $rows = $products->serach_product(preg_replace('/\s+/', '', $s));

    } else {
        Header('Location: /index.php?pages=product_detail&action=layout&html=home');
    }
} else {
    Header('Location: /index.php?pages=product_detail&action=layout&html=home');
}
?>