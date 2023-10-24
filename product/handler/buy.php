<div class="main buy" style="margin-top: 65px;">
    <h2>Bạn Chưa Nhập Thông Tin Nhận Hàng</h2>
    <a style="display: block;margin-left: 40px; " href="/index.php?pages=product_detail&action=layout&html=giohang">Quay
        Lại Giỏ Hàng Xác
        Nhận Thông Tin</a>
</div>
<?php





if (isset($_POST['buy'])) {

    $name = $_POST['username_info_customer_buy'];
    $address = $_POST['Addressinfo_customer_buy'];
    $phone = $_POST['phone_info_customer_buy'];
    $city = $_POST['provinceOptionsinfo_customer_buy'];
    $quan = $_POST['districtSelect_info_customer_buy'];
    $phuong = $_POST['ward_info_customer_buy'];
    $total_bill = $_POST['total_bill'];
    $pay = $_POST['bankCode']; // phương thức thanh toán  

    if ($pay == "tienmat") {
        if (
            !empty($name) && !empty($address) && !empty($phone) &&
            !empty($city) && !empty($quan) && !empty($phuong)
        ) {
            $id_user = $_SESSION["dangky"]["id"];
            $sql = "INSERT INTO user_order(username,phone,address,tinh,quan,phuong,total,user_id  ) VALUES 
                ('$name', '$phone','$address','$city','$quan','$phuong','$total_bill','$id_user')";

            // $user = new order();


            // $rows = $user->newproduct($name, $phone, $address, $city, $quan, $phuong, $total_bill, $id_user);
            // get id order mới nhất  
            // $last_id = $user->getidlast_order();
            // $lastid = $last_id["LastID"];

            // Câu SQL Insert
            $user = new connect();
            $conn = $user->pdo_get_connection();

            // Thực hiện thêm record
            $conn->exec($sql);
            // Thực hiện thêm record
            // $conn->exec($sql);

            $last_id = $conn->lastInsertId();
            echo "chào" . $last_id;
            // lấy id vừa insert vào ;

            $code_cart = rand(1, 10000);
            // echo $lastid, $code_cart, $pay;
            order_detail($last_id, $code_cart, $pay);

        } else {

            // echo '<div class="popup">
            //     <div class="popup-inner">
            //         <h1>Bạn Xác Nhận Thông Tin Không Thành Công</h1>
            //         <p >
            //         <a  style="margin: 0 20px;
            //         padding: 0 10px;"
            //         href="index.php?pages=product_detail&action=giohang">quay Lại Trang Giỏ Hàng
            //         </a>
            //         .</p>
            //     </div>
            // </div>';
        }
    } else {
        if (
            !empty($name) && !empty($address) && !empty($phone) &&
            !empty($city) && !empty($quan) && !empty($phuong)
        ) {

            // database mình

            $id_user = $_SESSION["dangky"]["id"];
            $sql = "INSERT INTO user_order(username,phone,address,tinh,quan,phuong,total,user_id  ) VALUES 
             ('$name', '$phone','$address','$city','$quan','$phuong','$total_bill','$id_user')";
            $user = new connect();
            $conn = $user->pdo_get_connection();
            $conn->exec($sql);
            $last_id = $conn->lastInsertId();
            $code_cart = rand(1, 10000);

            //   order_detail($last_id, $code_cart, $pay);
            // thêm id_detail order
            $user = new order();

            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $productId) {
                    $name = $productId["name"];
                    $id = $productId["id"];
                    $money = $productId["money"];
                    $qty = $productId["qty"];
                    echo $name, $id, $money, $qty, $last_id, $code_cart, $pay;

                    $user->insert_orderdetail($last_id, $id, $qty, $money, $code_cart, $pay);



                }
            }



            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
            date_default_timezone_set('Asia/Ho_Chi_Minh');


            $vnp_TxnRef = rand(1, 10000); //Mã giao dịch thanh toán tham chiếu của merchant
            $vnp_Amount = $_POST['amount']; // Số tiền thanh toán
            $vnp_Locale = $_POST['language']; //Ngôn ngữ chuyển hướng thanh toán
            $vnp_BankCode = $_POST['bankCode']; //Mã phương thức thanh toán
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $total_bill * 100,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => "Thanh toan GD:" + $vnp_TxnRef,
                "vnp_OrderType" => "other",
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
                "vnp_ExpireDate" => $expire
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }

            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;

            }


            header('Location: ' . $vnp_Url);
            die();
        }
    }

}
function order_detail($last_id, $code_cart, $pay)
{
    $user = new order();

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $productId) {
            $name = $productId["name"];
            $id = $productId["id"];
            $money = $productId["money"];
            $qty = $productId["qty"];
            echo $name, $id, $money, $qty, $last_id, $code_cart, $pay;
            // $sql = "INSERT INTO user_order_detail(order_id ,product_id,qty,price,order_code,transfer_money ) VALUES 
            // ('$last_id', '$id','$qty','$money','$code_cart','$pay')";
            $user->insert_orderdetail($last_id, $id, $qty, $money, $code_cart, $pay);
            ?>
            <script>
                alert("Đặt Hàng Thành Công Vui Lòng Kiểm tra Lịch sử Đơn Hàng")
                window.location.href = '/index.php?pages=product_detail&action=layout&html=giohang'
            </script>
            <?php
            // Header('Location: /index.php?pages=product_detail&action=layout&html=giohang');

        }
    }
}
?>