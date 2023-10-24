<?php
// session_start();

// print_r($_SESSION['dangky']);

if (!empty($_SESSION['dangky'])) {
    $userid = $_SESSION['dangky']["id"];
    $user = new order();




}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MWC</title>
    <style>
    a {
        text-decoration: none !important;
    }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- link css -->
</head>

<body>
    <div class="container">


        <body>
            <!-- header -->

            <div id="main" style="margin-top: 70px;">
                <section class="page-breadcrumb">
                    <div class="container">
                        <nav class="breadcrumb">
                            <a class="breadcrumb-item" href="/">Trang chủ</a>

                            <span class="breadcrumb-item active" aria-current="page">Thành viên</span>
                        </nav>
                    </div>
                </section>
                <section class="user-page">
                    <div class="container">
                        <div class="profile-layout">
                            <?php include "./product/includes/slidebar_setting.php" ?>
                            <div class="profile-main profile-main--no-border">
                                <div class="orders-page">
                                    <div class="custom-tab-nav">
                                        <a class="custom-tab-nav-item custom-tab-nav-item--active" href="#"
                                            onclick="allPurchase()" data-target="#order-tab-all">
                                            <span class="_0rjE9m">Sản Phẩm</span>
                                        </a>
                                        <a class="custom-tab-nav-item" href="#" data-target="#order-tab-pending-confirm"
                                            onclick="confirmPurchase()">
                                            <span class="_0rjE9m">Số Lượng</span>
                                        </a>
                                        <a class="custom-tab-nav-item" href="#" data-target="#order-tab-pending-pick"
                                            onclick="pickPurchase()">
                                            <span class="_0rjE9m">Giá Gốc</span>
                                        </a>
                                        <!-- <a class="custom-tab-nav-item" href="#" data-target="#order-tab-process"
                                            onclick="processPurchase()">
                                            <span class="_0rjE9m">Tổng Tiền </span>
                                        </a> -->
                                        <a class="custom-tab-nav-item" href="#" data-target="#order-tab-done"
                                            onclick="donePurchase()">
                                            <span class="_0rjE9m">Thanh Toán</span>
                                        </a>
                                        <a class="custom-tab-nav-item" href="#" data-target="#order-tab-cancel"
                                            onclick="cancelPurchase()">
                                            <span class="_0rjE9m">Đã Hủy</span>
                                        </a>
                                    </div>
                                    <?php

                                    // $getid = $user->setting_orderuser($userid);
                                    $db = new connect();
                                    $conn = $db->pdo_get_connection();
                                    $stmt = $conn->prepare("SELECT
                                    o.username as username , 
                                    o.total as total ,
                                    o.id as orderid,
                                    p.name as name , 
                                    p.money as money,
                                    od.id as id ,
                                    od.qty as qty ,
                                    od.order_code as order_code,
                                    od.transfer_money as transfer_money
                                    from user_order o, products p , user_order_detail od , users u 
                                    where od.order_id = o.id AND  od.product_id = p.id AND o.user_id = u.id and  u.id = '$userid'");
                                    $stmt->execute();
                                    // var_dump($stmt) ;
                                    if ($stmt->rowCount() > 0) {
                                        $total_product = 0;
                                        $total_bill = 0;
                                        foreach ($stmt as $row) {
                                            extract($row);
                                            $total_product = ($money * $qty);
                                            $total_bill += $total_product;

                                            ;
                                            ?>
                                    <div class="custom-tab-contents">
                                        <div class="custom-tab-content-item custom-tab-content-item--active"
                                            id="order-tab-all">
                                            <div class="custom-tab-nav">
                                                <a class="custom-tab-nav-item " href="#" style="font-size: 0.950rem;
                                                                        color: black;
                                                                        max-width: 21%;
                                                                        display: block;
                                                                        text-align: center;
                                                                        overflow: hidden;
                                                                        -o-text-overflow: ellipsis; 
                                                                        text-overflow: ellipsis;
                                                                        white-space: nowrap;">
                                                    <?= $name ?? "" ?>

                                                </a>
                                                <a class="custom-tab-nav-item" href="#"
                                                    data-target="#order-tab-pending-confirm">
                                                    <span class="_0rjE9m">
                                                        <?= $qty ?? "" ?>
                                                    </span>
                                                </a>
                                                <a class="custom-tab-nav-item" href="#"
                                                    data-target="#order-tab-pending-pick">
                                                    <span class="_0rjE9m">
                                                        <?=
                                                                    number_format($money ?? "", 0, ",", ".")
                                                                    ?>
                                                    </span>
                                                </a>
                                                <!-- <a class="custom-tab-nav-item" href="#"
                                                    data-target="#order-tab-process">
                                                    <span class="_0rjE9m">

                                                    </span>
                                                </a> -->
                                                <a class="custom-tab-nav-item" href="#" data-target="#order-tab-done">
                                                    <span class="_0rjE9m">
                                                        <?= $transfer_money ?? "" ?>
                                                    </span>
                                                </a>
                                                <a class="custom-tab-nav-item" href="#" data-target="#order-tab-cancel">
                                                    <span class="_0rjE9m">
                                                        <button type="button"
                                                            onclick="getId([<?= $id ?>, '<?= $orderid ?>' ,'<?= $total ?>','<?= $money ?>','<?= $qty ?>'])"
                                                            class=" btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal">
                                                            Xóa Đơn
                                                        </button>

                                                    </span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <?php }
                                    }
                                    //  else {
                                    
                                    //     $getid = $user->deleteproduct($userid);
                                    
                                    // }
                                    ?>
                                    <h3>Tổng Tiền</h3>
                                    <h3>
                                        <?php

                                        if (isset($total_bill)) {

                                            echo number_format($total_bill, 0, ",", ".") ?? "";
                                        }
                                        ?>
                                    </h3>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

            </div>
        </body>

</html>
</div>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Đơn Hàng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                Bạn Có Chắc xóa Đơn Hàng không
            </div>
            <form action="/index.php?pages=product_detail&action=layout&html=handledelete_order" method="post">

                <input class="inputvalue card-header " type="text" name="tongtien" id="tongtien" placeholder="id:">
                <input class="inputvalue card-header product_id" type="hidden" name="id" id="product_id"
                    placeholder="id:">
                <input class="inputvalue card-header " type="hidden" name="order_id" id="order_id" placeholder="id:">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary" name="deletedata">Xác Nhận</button>
                </div>
            </form>

        </div>
    </div>
</div>



</body>

</html>