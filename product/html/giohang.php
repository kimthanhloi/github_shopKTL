<?php

// Kiểm tra nếu giỏ hàng không tồn tại, tạo một giỏ hàng mới
// print_r($_SESSION["dangky"]);

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Thêm vào giỏ hàng
if (isset($_POST['addgiohang'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $img = $_POST['img'];
    $money = $_POST['money'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $qty = 1;

    $product = [
        "id" => $id,
        "name" => $name,
        "img" => $img,
        "money" => $money,
        "size" => $size,
        "color" => $color,
        "qty" => $qty
    ];

    // Biến tìm nếu không tìm thấy là fales tìm thấy là true
    $found = false;

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $productId) {
            if ($id == $productId['id']) {
                $_SESSION['cart']["$id"]['qty']++;
                $found = true;
                break;
            }
        }
    }
    // Đoạn mã này kiểm tra xem sản phẩm có tồn tại trong giỏ hàng hay không.
    // Nếu sản phẩm không tồn tại trong giỏ hàng, nó sẽ được thêm vào giỏ hàng với số lượng là 1.
    if (!$found) {
        $_SESSION['cart']["$id"] = $product;
    }

}

// Xóa item khỏi giỏ hàng
if (isset($_SESSION['cart'])) {
    // Khi người dùng click remove
    if (isset($_POST['removecart'])) {
        $id = $_POST['removecart'];
        echo $id;
        foreach ($_SESSION['cart'] as $productId) {
            if ($id == $productId['id']) {
                unset($_SESSION['cart']["$id"]);
                header('Location: /index.php?pages=product_detail&action=layout&html=giohang');
                break;
            }
        }
    }
}
// Chỉnh sửa số lượng của item
if (isset($_SESSION['cart'])) {
    // khi người dùng click cập nhập
    $id = $_POST['id'] ?? "";
    if (isset($_POST['editqty'])) {
        $qtyedit = $_POST['editqty'];
        foreach ($_SESSION['cart'] as $productId) {
            if ($id == $productId['id']) {
                $_SESSION['cart']["$id"]['qty'] = $qtyedit;
                header('Location: /index.php?pages=product_detail&action=layout&html=giohang');
            }
        }
    }
}
// print_r($_SESSION['cart']);
?>



<div class="container">

    <section>
        <!-- link mobile nav  -->
    </section>
    <section>
        <!-- header -->
    </section>

    <section class="nav-cart">
        <nav class="grid wide">
            Giỏ Hàng <br>
            <?php



            ?>
        </nav>
        <div class="grid wide ">
            <div class="cart__listheader">
                <div class="cart__listheader-name">
                    Sản Phẩm
                </div>
                <div class="cart__listheader-price">
                    Đơn Giá
                </div>
                <div class="cart__listheader-quantity">
                    Số Lượng

                </div>
                <div class="cart__listheader-money">
                    Số Tiền

                </div>
                <div class="cart__listheader-control">
                    Thao Tác

                </div>
            </div>
        </div>
        <div class="grid wide">
            <?php if (isset($_SESSION['cart'])): ?>
                <?php
                // if (is_numeric($_SESSION['cart'])) {
                $total_product = 0;
                $total_bill = 0;


                ?>
                <?php foreach ($_SESSION['cart'] as $item): ?>
                    <?php
                    $total_product = ($item['money'] * $item['qty']);
                    $total_bill += $total_product;

                    ?>
                    <form method="post">
                        <div class="cart__listbody">
                            <div class="cart__listbody-name">
                                <img src="../../adminnew/img/<?= $item['img'] ?>" alt="">
                                <a href="">
                                    <?= $item['name'] ?>

                                </a>
                                <div><span> Màu:
                                        <strong>
                                            <?php if ($item['color'] == 1) {
                                                echo 'Trắng';
                                            } else if ($item['color'] == 2) {
                                                echo 'Đen';
                                            } else if ($item['color'] == 3) {
                                                echo 'Xám';
                                            } else if ($item['color'] == 4) {
                                                echo 'Nâu';
                                            } ?>
                                        </strong>

                                    </span>
                                    , Kích thước:

                                    <span>
                                        <strong>
                                            <?php if ($item['size'] == 1) {
                                                echo '36';
                                            } else if ($item['size'] == 2) {
                                                echo '37';
                                            } else if ($item['size'] == 3) {
                                                echo '38';
                                            } else if ($item['size'] == 4) {
                                                echo '39';
                                            } else if ($item['size'] == 5) {
                                                echo '40';
                                            } ?>;

                                        </strong>

                                    </span>
                                </div>
                            </div>
                            <div class=" cart__listbody-price">
                                <span>
                                    <?= number_format($item['money'], 0, ",", ".") ?>
                                </span>đ
                            </div>
                            <div>
                                <!-- <button>-</button> -->
                                <div>
                                    <input style="text-align: center;padding: 0px;width: 49px" min="1" name="editqty"
                                        type="number" class="form-control text-center" value="<?= $item['qty']

                                            ?>">
                                    <button type="submit">cập nhật</button>
                                </div>

                                <!-- <button>+</button> -->

                            </div>
                            <div class="cart__listbody-money">
                                <span>
                                    <?= number_format($total_product, 0, ",", ".") ?>
                                </span>đ

                            </div>
                            <div class="cart__listbody-control">
                                <button name="removecart" type="submit" value="<?= $item['id'] ?>"
                                    style=" border: none;background: transparent;cursor: pointer;">
                                    Xóa</button>
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            </div>
                        </div>

                    <?php endforeach; ?>
            </div>
        </section>
        </form>
        <div class=" border-bottom grid wide">
        </div>
        <section class="cart_totalmoney grid wide">
            <div class="row">
                <div class="cart_totalmoney-item col l-6 m-12 c-12"></div>
                <div class="cart_totalmoney-item col l-6 m-12 c-12">
                    <div class="cart_totalmoney-item--product">
                        <span>Tổng tiền hàng
                        </span>
                        <span>
                            <?= isset($total_bill) ? (number_format($total_bill, 0, ",", ".")) : "" ?>

                            <span>đ</span>
                        </span>
                    </div>
                    <div class="cart_totalmoney-item--sale">
                        <span>Giảm giá sản phẩm</span>
                        <span>- 00 đ</span>

                    </div>
                    <div class="cart_totalmoney-item--ship">
                        <span>Phí vận chuyển</span>
                        <span>00 đ</span>
                    </div>
                    <div class="border-bottom grid wide"></div>
                    <div class="cart_totalmoney-item--totalproduct">
                        <span>TỔNG</span>
                        <span>
                            <?= isset($total_bill) ? (number_format($total_bill, 0, ",", ".")) : "" ?>
                            <span>đ</span>
                        </span>
                    </div>
                    <?php ?>
                </div>
            <?php endif; ?>
            <div style="margin: 4px 0 ; color: #ee4d2d; font-weight: bolder;" class="col l-12 m-12 c-12">
                THÔNG TIN VẬN CHUYỂN

            </div>
        </div>
    </section>

    <!-- info customer buy -->
    <?php
    $_SESSION["dangky"] ?? "";
    if ($_SESSION["dangky"] ?? "") { ?>
        <form class="info_customer_buy" method="post" action="/index.php?pages=product_detail&action=layout&html=buy"
            id="frmCreateOrder">
            <div class="grid wide">
                <div class="row">
                    <input type="hidden" value="<?= $total_bill ?>" name="total_bill">
                    <div class="col  l-4 m-4 c-12 form_buy_info">
                        <input type="text" name="username_info_customer_buy" placeholder="Họ Tên">
                    </div>
                    <div class="col  l-4 m-4 c-12 form_buy_info">
                        <input type="number" name="phone_info_customer_buy" placeholder="SĐT">

                    </div>
                    <div class="col  l-4 m-4 c-12">

                    </div>
                    <div class="col  l-12 m-12 c-12 form_buy_info">
                        <textarea type="text" class="form-control" id="Address" name="Addressinfo_customer_buy"
                            placeholder="Địa chỉ nhận hàng"></textarea>
                    </div>
                    <div class="col  l-4 m-4 c-12 form_buy_info">
                        <select style="border: 1px solid #ced4da !important;" class="form-select" id="provinceOptions"
                            name="provinceOptionsinfo_customer_buy">
                            <option value="">-- Chọn tỉnh --</option>
                            <option value="70">TP Hồ Chí Minh</option>
                            <option value="90">TP Cần Thơ</option>
                            <option value="81">Đồng Nai</option>
                            <option value="82">Bình Dương</option>
                            <option value="83">Bình Phước</option>
                            <option value="84">Tây Ninh</option>
                            <option value="85">Long An</option>
                            <option value="86">Tiền Giang</option>
                            <option value="87">Đồng Tháp</option>
                            <option value="79">Bà Rịa Vũng Tàu</option>
                            <option value="80">Bình Thuận</option>
                            <option value="88">An Giang</option>
                            <option value="89">Vĩnh Long</option>
                            <option value="91">Hậu Giang</option>
                            <option value="92">Kiên Giang</option>
                            <option value="93">Bến Tre</option>
                            <option value="94">Trà Vinh</option>
                            <option value="95">Sóc Trăng</option>
                            <option value="96">Bạc Liêu</option>
                            <option value="97">Cà Mau</option>
                            <option value="67">Lâm Đồng</option>
                            <option value="66">Ninh Thuận</option>
                            <option value="65">Khánh Hoà</option>
                            <option value="64">Đắk Nông</option>
                            <option value="63">Đắk Lăk</option>
                            <option value="62">Phú Yên</option>
                            <option value="60">Gia Lai</option>
                            <option value="59">Bình Định</option>
                            <option value="58">Kon Tum</option>
                            <option value="10"> TP Hà Nội</option>
                            <option value="16">Hưng Yên</option>
                            <option value="17">Hải Dương</option>
                            <option value="18"> TP Hải Phòng</option>
                            <option value="20">Quảng Ninh</option>
                            <option value="22">Bắc Ninh</option>
                            <option value="23">Bắc Giang</option>
                            <option value="24">Lạng Sơn</option>
                            <option value="25">Thái Nguyên</option>
                            <option value="26">Bắc Kạn</option>
                            <option value="27">Cao Bằng</option>
                            <option value="28">Vĩnh Phúc</option>
                            <option value="29">Phú Thọ</option>
                            <option value="30">Tuyên Quang</option>
                            <option value="31">Hà Giang</option>
                            <option value="32">Yên Bái</option>
                            <option value="33">Lào Cai</option>
                            <option value="35">Hoà Bình</option>
                            <option value="36">Sơn La</option>
                            <option value="38">Điện Biên</option>
                            <option value="39">Lai Châu</option>
                            <option value="40">Hà Nam</option>
                            <option value="41">Thái Bình</option>
                            <option value="42">Nam Định</option>
                            <option value="43">Ninh Bình</option>
                            <option value="44">Thanh Hoá</option>
                            <option value="46">Nghệ An</option>
                            <option value="48">Hà Tĩnh</option>
                            <option value="51">Quảng Bình</option>
                            <option value="52">Quảng Trị</option>
                            <option value="53">Thừa Thiên Huế</option>
                            <option value="55">TP Đà Nẵng</option>
                            <option value="56">Quảng Nam</option>
                            <option value="57">Quảng Ngãi</option>
                        </select>
                    </div>
                    <div class="col  l-4 m-4 c-12 form_buy_info">
                        <select style="border: 1px solid #ced4da !important;" class="form-select" id="districtSelect"
                            name="districtSelect_info_customer_buy">
                            <option value="">--Chọn Quận/huyện--</option>
                            <option value="1">Quận 1</option>
                            <option value="2">Quận 2</option>
                            <option value="3">Quận 3</option>
                            <option value="4">Quận 4</option>
                            <option value="5">Quận 5</option>
                            <option value="6">Quận 6</option>
                            <option value="7">Quận 7</option>
                            <option value="8">Quận 8</option>
                            <option value="9">Quận 9</option>
                            <option value="10">Quận 10</option>
                        </select>
                    </div>
                    <div class="col  l-4 m-4 c-12 form_buy_info">
                        <select style="border: 1px solid #ced4da !important;" class="form-select" id="ward"
                            name="ward_info_customer_buy">
                            <option value="">--Chọn Phường--</option>
                            <option value="1">phường 1</option>
                            <option value="2">phường 2</option>
                            <option value="3">phường 3</option>
                            <option value="4">phường 4</option>
                            <option value="5">phường 5</option>
                            <option value="6">phường 6</option>
                            <option value="7">phường 7</option>
                            <option value="8">phường 8</option>
                            <option value="9">phường 9</option>
                            <option value="10">phường 10</option>
                        </select>
                    </div>
                    <div style=" justify-content: end;
                                display: flex;
                            
                                margin-top: 15px;
                                width: 100%;">
                        <div class="form-group">
                            <h5>Chọn Phương thức thanh toán thanh toán:</h5>
                            <div class="">
                                <input type="radio" id="bankCode" name="bankCode" Checked="True" value="VNBANK">
                                <label for=" chuyenkhoan">Chuyển Khoản VNPAY</label>
                            </div>
                            <div>
                                <input type="radio" name="bankCode" id="tienmat" value="tienmat">
                                <label for=" tienmat">Tiền Mặt</label>
                            </div>

                        </div>
                        <br>
                        <div class="form-group">
                            <h5>Chọn ngôn ngữ giao diện thanh toán:</h5>
                            <input type="radio" id="language" Checked="True" name="language" value="vn">
                            <label for="language">Tiếng việt</label><br>
                            <input type="radio" id="language" name="language" value="en">
                            <label for="language">Tiếng anh</label><br>

                        </div>
                    </div>
                    <div class="col l-12 m-12 c-12 form_buy_info_submit" style="text-align: right;">
                        <button type="submit" name="buy" class="cart_totalmoney-item--btn-confrim">
                            Đặt Hàng
                        </button>
                    </div>

                </div>
            </div>
        </form>
    <?php } else {
        echo '
          <a href="/index.php?pages=product_detail&action=layout&html=login">Vui lòng nhập Tài Khoản để xác nhận mua hàng</a>
          ';
    } ?>
    <section>
        <!-- paginnation -->
    </section>
</div>
<!-- icon cart -->


<section>
    <!-- ft -->

</section>
</div>
<!-- <script src="../js/giohang.js"></script> -->