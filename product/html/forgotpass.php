<div class="container">
    <!-- header -->

    <div id="main" style="margin-top: 70px;">
        <section class="page-breadcrumb">
            <div class="container">
                <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="/">Quên Mật Khẩu</a>
                    <span class="breadcrumb-item active" aria-current="page">Thành viên</span>
                </nav>
            </div>
        </section>
        <section class="user-page">
            <div class="container">
                <div class="profile-layout">
                    <?php
                    // include "./product/includes/slidebar_setting.php" 
                    ?>
                    <div class="profile-main">
                        <div class="profile-main__acount" role="main">
                            <form action="/index.php?pages=product_detail&action=layout&html=handledelete_order"
                                method="post">
                                <div class="account-forgot-password-form">
                                    <div class="account-forgot-password-header">
                                        <h1 class="account-forgot-password-header-title">Quên Mật Khẩu</h1>
                                        <div class="account-forgot-password-header-des">Để bảo mật tài khoản, vui lòng
                                            không chia sẻ mật khẩu cho người khác</div>
                                    </div>

                                    <div class="account-forgot-password-body">
                                        <div class="account-forgot-password-group">
                                            <div class="account-forgot-password-item">
                                                <div class="account-forgot-password-item-flex">
                                                    <div class="account-forgot-password-label"><label
                                                            class="account-forgot-password-label-text"
                                                            for="password">Nhập Email:</label></div>
                                                    <div class="account-forgot-password-input-full-area">
                                                        <input autocomplete="off"
                                                            class="account-forgot-password-input account-forgot-password-input-full"
                                                            id="email" name="email" required="true" type="text"
                                                            value="">
                                                    </div>
                                                    <button class="account-forgot-password-item-link">Quên mật
                                                        khẩu?</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="account-forgot-password-group">
                                            <div class="account-forgot-password-left-space"></div>
                                            <div class="account-forgot-password-right-space">
                                                <button type="submit" class="btn btn-solid-primary btn--m btn--inline"
                                                    name="forgotpass" aria-disabled="true">Xác nhận</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>


</div>