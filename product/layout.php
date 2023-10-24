<?php
ob_start();

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:ital,wght@0,400;0,500;1,300&family=Montserrat:wght@200;300;400;500;600;700;800;900&family=Roboto:wght@300&family=Wix+Madefor+Display:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./product/css/responsive.css">
    <link rel="stylesheet" href="./product/css/basic.css">
    <link rel="stylesheet" href="./product/css/giaynam.css">
    <link rel="stylesheet" href="./product/css/grid.css">
    <link rel="stylesheet" href="./product/css/index.css">
    <link rel="stylesheet" href="./product/css/login.css">
    <!-- <script src="./product/js/index.js" ></script> -->

</head>

<body>
    <?php

    include './product/includes/header.php';
    include './product/includes/mobinav.php';
    include "./DAO/PDO.php";
    include "./DAO/categorys.php";
    require "./DAO/products.php";
    require "./DAO/user.php";
    require "./DAO/order.php";
    require "./DAO/comment.php";
    require "./mail/index.php";
    ?>

    <?php
    if (isset($_GET['pages'])) {
        switch ($_GET['pages']) {


            // end table  
            case 'product_detail':
                switch ($_GET['action']) {
                    case 'layout':
                        switch ($_GET['html']) {
                            case 'home':


                                include "./product/index.php";

                                break;
                            case 'serach':


                                include "./product/html/serach.php";

                                break;
                            case 'handler_serach':


                                include "./product/handler/serach.php";

                                break;
                            case 'chitiet':


                                include './product/html/chitietsanpham.php';

                                ?>


                                <link rel="stylesheet" href="./product/css/comment.css">
                                <script src="./handler/comment.js"></script>
                                <script src="./product/js/chitietsanpham.js"></script>
                                <?php

                                break;
                            case 'login':

                                include './product/html/login.php';


                                ?>

                                <script src="./product/js/login.js"></script>
                                <?php
                                break;
                            case 'logout':
                                include './product/handler/logout.php';

                                break;
                            case 'giohang':
                                include './product/html/giohang.php';


                                ?>

                                <!-- <script src="./product/js/giohang.js"></script> -->
                                <!-- <script src="./product/js/index.js"></script> -->

                                <?php

                                break;
                            case 'cart':
                                include './product/handler/cart.php';
                                break;
                            case 'addcmt':
                                include './product/handler/addcmt.php';

                                break;
                            case 'buy':
                                include "./product/handler/buy.php";

                                break;
                            case 'forgotpass':
                                include "./product/html/forgotpass.php";
                                ?>

                                <link rel="stylesheet" href="product/css/Setting.css">
                                <link rel="stylesheet" href="product/css/settingbootraps.css">
                                <script src="./product/js/setting.js"></script>

                                <?php

                                break;
                            case 'logout':
                                include "./product/handler/buy.php";
                                break;
                            case 'setting':


                                include './product/html/se.php';

                                ?>

                                <link rel="stylesheet" href="product/css/Setting.css">
                                <link rel="stylesheet" href="product/css/settingbootraps.css">
                                <script src="./product/js/setting.js"></script>

                                <?php
                                break;
                            case 'orderuser_setting':


                                include './product/html/orderuser_setting.php';

                                ?>
                                <link rel="stylesheet" href="product/css/Setting.css">
                                <link rel="stylesheet" href="product/css/settingbootraps.css">


                                <script src="./product/js/setting.js"></script>
                                <script src="./product/js/orderdelete.js"></script>
                                <?php
                                break;
                            case 'changePassword_se':


                                include './product/html/changePassword_se.php';

                                ?>
                                <link rel="stylesheet" href="product/css/Setting.css">
                                <link rel="stylesheet" href="product/css/settingbootraps.css">



                                <?php
                                break;
                            case 'handledelete_order':


                                include './product/handler/handledelete_order.php';
                                break;
                            case 'logout':


                                include './product/handler/logout.php';
                                break;
                            case 'comment':


                                include './product/handler/comment.php';
                                break;
                            case 'thanksorder':


                                include './product/html/thanks_order.php';
                                break;

                            default:
                                # code...
                                break;
                        }



                        ?>


                        <?php

                        break;







                    default:

                        break;
                }
                break;

            default:
                # code...
                break;
        }

    }
    ?>

    <?php
    include './product/includes/cart.php';
    include './product/includes/footer.php';
    ?>
    <script defer src="./product/js/index.js"></script>

</body>

</html>
<?php
ob_end_flush()
    ?>