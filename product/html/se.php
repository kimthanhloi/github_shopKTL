<?php
// session_start();


if (!empty($_SESSION["dangky"])) {
    $userid = $_SESSION["dangky"]["id"];
    // echo $userid;
    if (!empty($userid)) {


        $user = new user();



        $getid = $user->select_iduser($userid);


    }

}
?>

<div class="container">



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
                    <div class="profile-main" id="profile-acc">
                        <div class="profile-main__acount" role="main">
                            <div class="profile-main__account-inner">
                                <form action="/index.php?pages=product_detail&action=layout&html=handledelete_order"
                                    method="post" enctype="multipart/form-data" id="form_login">
                                    <div class="profile-main__account-header">
                                        <h1 class="profile-main__account-header__title">Hồ sơ của tôi</h1>
                                        <div class="profile-main__account-header__des">
                                            Quản lý thông tin hồ sơ
                                            để bảo mật tài khoản
                                        </div>
                                    </div>
                                    <div class="profile-main__account-body">

                                        <div class="profile-main__account-body__info">
                                            <div class="profile-account__custom-form__group">
                                                <div class="profile-account__custom-form__items">
                                                    <div class="profile-account__custom-form__label">
                                                        <label>Tên đăng nhập</label>
                                                    </div>
                                                    <div class="profile-account__custom-form__form">
                                                        <div class="input-with-validator-wrapper">
                                                            <div class="input-with-validator">
                                                                <input id="UserName" name="UserName" type="text" value="<?=
                                                                    $getid["username"];
                                                                ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="profile-account__custom-form__group">
                                                <div class="profile-account__custom-form__items">
                                                    <div class="profile-account__custom-form__label">
                                                        <label>Mật Khẩu</label>
                                                    </div>
                                                    <div class="profile-account__custom-form__form">
                                                        <div class="input-with-validator-wrapper">
                                                            <div class="input-with-validator">
                                                                <input id="password" name="password"
                                                                    placeholder="password" type="password" value="<?=
                                                                        $getid["password"];
                                                                    ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="profile-account__custom-form__group">
                                                <div class="profile-account__custom-form__items">
                                                    <div class="profile-account__custom-form__label">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="profile-account__custom-form__form">
                                                        <div class="input-with-validator-wrapper">
                                                            <div class="input-with-validator">
                                                                <input id="Email" name="Email" placeholder="Email"
                                                                    type="email" value="<?=
                                                                        $getid["email"];
                                                                    ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="profile-account__custom-form__group">
                                                <div class="profile-account__custom-form__items">
                                                    <div class="profile-account__custom-form__label">
                                                        <label>Số điện thoại *</label>
                                                    </div>
                                                    <div class="profile-account__custom-form__form">
                                                        <div class="input-with-validator-wrapper">
                                                            <div class="input-with-validator">
                                                                <input id="Phone" name="Phone"
                                                                    placeholder="Số điện thoại" required="true"
                                                                    type="number" value="<?=
                                                                        $getid["phone"];
                                                                    ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="" style="display: flex; justify-content: end; ">
                                                <button type="submit" style="border:1px solid black ;"
                                                    class="btn btn-solid-primary btn--m btn--inline"
                                                    name="update_settinguser">
                                                    Lưu
                                                </button>
                                            </div>



                                        </div>
                                        <div class="profile-main__account-body__right">
                                            <div class="profile-main__account-body__right-avatar">
                                                <div class="profile-main__account-body__right-avatar__thumb">
                                                    <div class="profile-main__account-body__right-avatar__img"
                                                        style="background-color: #f5f5f5;">
                                                        <img class="shopee-avatar__img"
                                                            src="https://img.mwc.com.vn/giay-thoi-trang?w=100&amp;h=100&amp;FileInput="
                                                            id="avatar">


                                                    </div>
                                                </div>
                                                <input id="fileImport" name="file" type="file" accept=".jpg,.jpeg,.png">
                                                <button type="button" data-btn-file-trigger="#fileImport"
                                                    class="btn btn-light btn--m btn--inline">
                                                    Chọn ảnh
                                                </button>
                                                <div class="profile-account__upload-note">
                                                    <div class="profile-account__upload-note__item">
                                                        Dụng lượng
                                                        file tối đa 1 MB
                                                    </div>
                                                    <div class="profile-account__upload-note__item">
                                                        Định
                                                        dạng:.JPEG, .PNG
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>


</div>