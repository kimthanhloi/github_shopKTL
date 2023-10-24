<?php


if (isset($_POST['deletedata'])) {
    $userid = $_POST['id'];
    // lấy id order 
    $order_id = $_POST['order_id'];
    $tongtien = $_POST["tongtien"];
    $user = new order();
    $user->deleteorder_detail($userid);
    echo $userid . $order_id;

    $user->updateUser_order($tongtien, $order_id);

    Header('Location: /index.php?pages=product_detail&action=layout&html=orderuser_setting');



    // nếu xóa hóa đơn chi tiết hết thì xóa lun hóa đơn gốc  
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

    if ($stmt->rowCount() <= 0) {
        $resultnew = $user->deleteproduct($order_id);
        Header('Location: /index.php?pages=product_detail&action=layout&html=orderuser_setting');

    }



}
// handle update user
if (isset($_POST['update_settinguser'])) {
    $userid = $_SESSION["dangky"]["id"];

    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];
    $UserName = $_POST['UserName'];
    $date = date('Y-m-d H:i:s'); // lấy thời gian hiện tại
    if (
        !empty($userid) && !empty($UserName) &&
        !empty($Email) && !empty($Phone)
        && $Phone >= 0
        && is_numeric($Phone) && preg_match('/^[a-zA-Z0-9._%+-]+@gmail\.com$/', $Email)
    ) {

        $user = new user();


        $rows = $user->edituser_setting($UserName, $Email, $date, 2, $Phone, $userid);

        Header('Location: /index.php?pages=product_detail&action=layout&html=setting');


    } else {
        ?>
        <script>
            alert("Vui Lòng Không Được Để trống hoặc ko nhập đúng định dạng email và ko đc nhập số âm");
            window.location.href = '/index.php?pages=product_detail&action=layout&html=setting'
        </script>
        <?php
    }
}
// handle change pass user
if (isset($_POST['update_pass'])) {
    $userid = $_SESSION["dangky"]["id"];
    $user = $_SESSION["dangky"];
    $PasswordOld = $_POST['PasswordOld'];
    $newPassword = $_POST['PasswordNew'];
    $PasswordNewConfirm = $_POST['PasswordNewConfirm'];
    $date = date('Y-m-d H:i:s'); // lấy thời gian hiện tại
    if (
        !empty($PasswordOld) && !empty($newPassword) &&
        !empty($PasswordNewConfirm)
    ) {

        $user = new user();


        $rows = $user->select_id_user($userid);
        // echo $rows["password"];
        //





        if (password_verify($PasswordOld, $rows["password"])) {
            // echo $userid;
            if ($newPassword === $PasswordNewConfirm) {
                $newpassmahoa = password_hash($PasswordNewConfirm, PASSWORD_DEFAULT);

                $valuepassnew = $user->change_pass($newpassmahoa, $userid);


                ?>
                <script>
                    alert("Cập Nhập Thành Công")
                    window.location.href = '/index.php?pages=product_detail&action=layout&html=changePassword_se'
                </script>
                <?php
                // Header('Location: /index.php?pages=product_detail&action=layout&html=changePassword_se');



            } else {
                ?>
                <script>
                    alert("mật khẩu không trùng khớp")
                    window.location.href = '/index.php?pages=product_detail&action=layout&html=changePassword_se'
                </script>
                <?php
            }



        } else {
            ?>
            <script>
                alert("Mật Khẩu Của Bạn Ko chích xác")
                window.location.href = '/index.php?pages=product_detail&action=layout&html=changePassword_se'
            </script>
            <?php
        }




    } else {
        ?>
        <script>
            alert("Vui Lòng nhập dữ liệu")
            window.location.href = '/index.php?pages=product_detail&action=layout&html=changePassword_se'
        </script>
        <?php

    }
}



if (isset($_POST['forgotpass'])) {
    // $userid = $_SESSION["dangky"]["id"];
    $email = $_POST['email'] ?? "";
    $users = new user();
    if (!empty($email) && preg_match('/^[a-zA-Z0-9._%+-]+@gmail\.com$/', $email)) {
        if ($users->checkUser_email($email)) {
            $newpass = rand(0, 9999999);


            $mahoapass = password_hash($newpass, PASSWORD_DEFAULT);

            $users->update_email_pass($mahoapass, $email);
            $mailler = new Mailer();
            $mailler->sendEmail($newpass, $email);
            ?>
            <script>
                alert("Gửi Email Thành Công  ")
                window.location.href = '/index.php?pages=product_detail&action=layout&html=forgotpass'
            </script>
            <?php

        } else {
            ?>
            <script>
                alert("Emai Bạn Không Đúng ")
                window.location.href = '/index.php?pages=product_detail&action=layout&html=forgotpass'
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("vui lòng nhập thông tin và đúng định dạng")
            window.location.href = '/index.php?pages=product_detail&action=layout&html=forgotpass'
        </script>
        <?php

    }
}
?>