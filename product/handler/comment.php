<?php
// require "./DAO/comment.php";

if (isset($_POST['submit'])) {
    $idproduct = $_POST['idproduct'];
    $content = $_POST['content'];
    $iduser = $_POST['iduser'];
    if (!empty($content)) {


        // echo $iduser;
        $comment = new comment();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $update_at = date('Y-m-d H:i:s');

        if ($comment->duplicateColum($idproduct)) {
            echo "1";

            // $comment->addcmtdetail($idproduct, $iduser, $content);
            $comment->addcmtdetail($idproduct, $iduser, $content, $update_at);
            ?>
            <script>
                window.location.href = "/index.php?pages=product_detail&action=layout&html=chitiet&id=<?= $idproduct ?>"
            </script>
            <?php

        } else {
            // Câu SQL Insert
            $user = new connect();
            $conn = $user->pdo_get_connection();
            $sql = "INSERT INTO comment(product_id,creat_at) VALUES('$idproduct','$update_at') ";

            $conn->exec($sql);
            // Thực hiện thêm record

            $comment_id = $conn->lastInsertId();
            echo "chào" . $comment_id;


            $comment->comment_detail_insert($comment_id, $iduser, $content, $update_at);
            ?>
            <script>
                window.location.href = "/index.php?pages=product_detail&action=layout&html=chitiet&id=<?= $idproduct ?>"
            </script>
            <?php
        }


    } else {
        ?>
        <script>
            alert("vui nhập nội dung")
            window.location.href = "/index.php?pages=product_detail&action=layout&html=chitiet&id=<?= $idproduct ?>"
        </script>
        <?php
    }



}

if (isset($_POST['editcmduser'])) {
    $user_id = $_POST["user_id"];
    $content = $_POST["content"];
    $product_id = $_POST["product_id"];
    if (!empty($content)) {
        $comment = new comment();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $update_at = date('Y-m-d H:i:s');
        echo $user_id, $content;

        $comment->update_comment_detail($content, $update_at, $user_id);
        ?>
        <script>
            window.location.href = "/index.php?pages=product_detail&action=layout&html=chitiet&id=<?= $product_id ?>"
        </script>
        <?php


    } else {

        ?>
        <script>
            alert("vui lòng nhập");
            window.location.href = "/index.php?pages=product_detail&action=layout&html=chitiet&id=<?= $product_id ?>"
        </script>
        <?php

    }

}

if (isset($_POST['Deletecmd'])) {
    $user_id = $_POST["user_id"];

    $product_id = $_POST["product_id"];
    if (!empty($user_id)) {
        $comment = new comment();
        echo $user_id;

        $comment->delete_commentdetail($user_id);
        ?>
        <script>
            window.location.href = "/index.php?pages=product_detail&action=layout&html=chitiet&id=<?= $product_id ?>"
        </script>
        <?php


    } else {

        ?>
        <script>
            window.location.href = "/index.php?pages=product_detail&action=layout&html=chitiet&id=<?= $product_id ?>"
        </script>
        <?php

    }

}