<?php
include './config/config.php';



if (isset($_GET['pages'])) {
    switch ($_GET['pages']) {
        case "admin":
            include "./adminnew/index.php";
            break;

        case 'login':
            include "./DAO/PDO.php";
            include "./DAO/user.php";
            include "./golobal.php";

            include './adminnew/login.php';
            break;
        case 'handlelogin':
            include "./DAO/PDO.php";
            include "./DAO/user.php";
            // include "./golobal.php";


            include './adminnew/handlelogin.php';
            break;
        case 'forgetpassword':
            include "./golobal.php";

            include './adminnew/forget-pass.php';
            break;
        case 'logout':
            include "./adminnew/logout.php";


            break;
        case 'addcmt':
            include "./DAO/PDO.php";
            include "./DAO/comment.php";
            include "./product/handler/addcmt.php";


            break;
        case 'editcmt':
            include "./DAO/PDO.php";
            include "./DAO/comment.php";
            include "./product/handler/editcmt.php";


            break;
        case 'rendercmt':
            include "./DAO/PDO.php";
            include "./DAO/comment.php";
            include "./DAO/user.php";
            include "./DAO/products.php";
            include "./product/handler/rendercmt.php";


            break;
        // table 
        // end table  
        case 'product_detail':
            switch ($_GET['action']) {
                case 'layout':


                    ?>

                    <?php
                    include './product/layout.php';

                    break;
                case 'sreach':


                    ?>

                    <?php
                    include './product/layout.php';
                    // include './product/html/serach.php';
                    break;
            }
            break;
        // case 'handle':
        //     switch ($_GET['act']) {
        //         case 'buy':
        //             include "./product/handler/buy.php";

        //             break;
        //         case 'handledelete_order':
        //             include "./product/handler/buy.php";
        //             break;
        //         case 'logout':
        //             include "./product/handler/buy.php";
        //             break;
        //         default:
        //             # code...
        //             break;
        //     }
        default:
            // Header('Location: /index.php?pages=product_detail&action=layout&html=home');

            // include "/index.php?pages=product_detail&action=layout&html=home";
            break;
    }

}
// else {
// Header('Location: /index.php?pages=product_detail&action=layout&html=home');
// }
?>