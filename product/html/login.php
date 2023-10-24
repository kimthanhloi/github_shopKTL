<?php
// if (isset($_COOKIE["user"]) && isset($_COOKIE["pass"])) {

// }
if (isset($_POST["addUser"])) {
    $usernmae = $_POST["username"];
    // $userpassword = $_POST["userpassword"];
    $userEmail = $_POST["userEmail"];
    $phone = $_POST["userPhone"];
    $userpassword = password_hash($_POST["userpassword"], PASSWORD_DEFAULT);

    if (
        !empty($usernmae) && !empty($userpassword) && !empty($userEmail) && !empty($phone) && $phone >= 0
        && is_numeric($phone) && preg_match('/^[a-zA-Z0-9._%+-]+@gmail\.com$/', $userEmail)
    ) {
        $user = new user();


        $rows = $user->newusers($usernmae, $userpassword, $userEmail, 2, $phone);


        $message = "Đăng Kí Thành Công";

    } else {
        $message_error = 'đăng ký thất bại';
    }
}
// đăng nhập
if (isset($_POST['loginuser'])) {
    $name = $_POST["user_name"] ?? "";
    $password = $_POST["user_password"] ?? "";
    $ghinho = $_POST["ghinho"] ?? "";

    if (!isset($_SESSION['dangky'])) {
        $_SESSION['dangky'] = [];
    }
    // $password = password_hash($_POST["user_password"], PASSWORD_DEFAULT) ?? "";


    if (!empty($name) && !empty($password)) {
        $user = new user();

        if ($user->loginuser($name)) {

            $getpass = $user->loginuser($name);
            if (password_verify($password, $getpass["password"])) {
                echo "1";

                $valueloginuser = $user->checkUser($name, $getpass["password"]);
                // var_dump($getpass["password"]);
                // echo $valueloginuser;


                if ($valueloginuser) {



                    array_push($_SESSION['dangky'], $getpass["id"]);
                    $array = [
                        "id" => $getpass["id"] ?? "",
                        "name" => $getpass["username"] ?? "",
                        "password" => $getpass["password"] ?? ""
                    ];
                    $_SESSION["dangky"] = $array;

                    // handle cookie 

                    if (isset($ghinho)) {
                        // tồn tại 7 ngày
                        setcookie("user", $name, time() + (86400 * 7));
                        setcookie("pass", $password, time() + (86400 * 7));
                    }

                    if ($_SESSION["dangky"]) {
                        ?>

                        <script>
                            window.location.href = '/index.php?pages=product_detail&action=layout&html=giohang'
                        </script>

                        <?php
                    } else {
                        ?>

                        <script>
                            alert("sai tài khoản")
                            window.location.href = '/index.php?pages=product_detail&action=layout&html=login'
                        </script>

                        <?php
                    }

                }

                exit();
            } else {
                $message_login = "Đăng Nhập Không Thành Công";
            }




        } else {
            $message_login = "Đăng Nhập Không Thành Công";
        }



    } else {
        $message_login = "Đăng Nhập Không Thành Công";
    }
}

?>




<div class="container">
    <!-- header -->

    <!-- login -->
    <section class="login_page">
        <div class="grid wide">
            <div class="row">
                <div class="col l-6 m-6 c-12">
                    <div class="container_login">

                        <form action="" method="post">
                            <div class="form_ground_login">
                                <label for="" class="login_title">
                                    ĐĂNG NHẬP
                                </label>
                            </div>
                            <div class="form_ground_login">
                                <label for="user_name">Tên Đăng Nhập <span>*</span> </label>
                                <input type="text" name="user_name" class="user_name"
                                    value="<?php echo $_COOKIE["user"] ?? "" ?>">
                                <span class="mess-login"></span>
                            </div>
                            <div class="form_ground_login">
                                <label for="">Mật Khẩu <span>*</span></label>
                                <input type="password" name="user_password" class="user_password"
                                    value="<?php echo $_COOKIE["pass"] ?? "" ?>">
                                <span class="mess-login-password"></span>
                                <br>
                                <?= $message_login ?? "" ?>
                            </div>
                            <div class="">
                                <input type="checkbox" name="ghinho" id="ghinho">
                                <label for="">Ghi Nhớ. </label>
                                <label for="">
                                    <a style="text-decoration: none;"
                                        href="/index.php?pages=product_detail&action=layout&html=forgotpass">Quên Mật
                                        Khẩu</a>
                                </label>
                            </div>
                            <div class="form_ground_login">
                                <button type="submit" name="loginuser" class="submid_login">Đăng Nhập</button>
                            </div>
                        </form>
                        <div class="container_login_note">
                            <p>Nếu Quý khách có vấn đề gì thắc mắc hoặc cần hỗ trợ gì thêm có thể liên hệ:</p>
                            <p>Hotline: 0967 027 393</p>
                            <p>
                                Hoặc Inbox Facebook

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col l-6 m-6 c-12">
                    <div class="containee_register">
                        <form method="post">
                            <div class="form_ground_register">
                                <div class="register_title">
                                    ĐĂNG KÝ
                                </div>
                            </div>
                            <div class="form_ground_register">
                                <label for="username">Tên Đăng Nhập <span>*</span></label>
                                <input type="text" name="username" id="username">
                                <span class="mess-username"></span>
                            </div>
                            <div class="form_ground_register">
                                <label for="userpassword">Mật Khẩu<span>*</span></label>
                                <input type="password" name="userpassword" id="userpassword">
                                <i class="fa-solid fa-eye show_eye"></i>
                                <i class="fa-solid fa-eye-slash hidden_eye"></i>
                                <span class="mess-userpassword"></span>

                            </div>
                            <div class="form_ground_register">
                                <label for="userEmail">Email<span>*</span></label>
                                <input type="text" name="userEmail" id="userEmail">
                                <span class="mess-userEmail"></span>

                            </div>
                            <div class="form_ground_register">
                                <label for="userPhone">Số Điện Thoại<span>*</span></label>
                                <input type="number" name="userPhone" id="userPhone">
                                <span class="mess-userPhone"></span>
                                <?= $message ?? '' ?>
                                <?= $message_error ?? "" ?>
                            </div>
                            <div class="form_ground_register">
                                <button type="submit" name="addUser">Đăng Ký</button>
                            </div>
                        </form>
                        <p>Thông tin cá nhân của bạn sẽ được dùng để điền vào hóa đơn, giúp bạn thanh toán nhanh
                            chóng và dễ dàng</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>