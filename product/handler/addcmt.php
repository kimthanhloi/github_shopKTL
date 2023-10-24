<?php


$idproduct = $_POST['idproduct'];
$content = $_POST['content'];
$iduser = $_POST['iduser'];
if (!empty($content)) {



    $comment = new comment();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $update_at = date('Y-m-d H:i:s');

    if ($comment->duplicateColum($idproduct)) {

        $comment->addcmtdetail($idproduct, $iduser, $content, $update_at);



        //    in nè


        $editcmtuser = $comment->editcmtdetail_user($iduser);
        $resultCMT = $comment->select_all_mahanghoa($idproduct);

        foreach ($resultCMT as $row) {
            extract($row);
            echo '
<li class="timeline-item | extra-space">
    <span class="timeline-item-icon | filled-icon">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
            <path fill="none" d="M0 0h24v24H0z" />
            <path fill="currentColor"
                d="M6.455 19L2 22.5V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H6.455zM7 10v2h2v-2H7zm4 0v2h2v-2h-2zm4 0v2h2v-2h-2z" />
        </svg>
    </span>
    <div class="timeline-item-wrapper">
        <div class="timeline-item-description">
            <i class="avatar | small">
                <img src="https://assets.codepen.io/285131/hat-man.png" />
            </i>
            <span><a href="#">

                    ' . $name . '
                </a> Bình luận <time datetime="20-01-2021">
                    <?= $creat_at ?? "" ?>
</time></span>
</div>
<div class="comment">
    <p>
        ' . $content . '

    </p>
    ';

            if ($user_id == $iduser) {
                echo '
    <div class="main_edit" style="display: flex;">
        <button type="button" class="edit_cmt_user" style="border: 1px ;
                            background-color: transparent; width: 50px;
                            ">Edit</button>
        <form action="/index.php?pages=product_detail&action=layout&html=comment" method="post">
            <input type="hidden" value="' . $id . '" name="user_id">
            <input type="hidden" value="' . $product_id . '" name="product_id">
            <button type="submit" name="Deletecmd" class="edit_cmt_user" style="border: 1px ;
                            background-color: transparent; width: 70px;
                            ">DELETE</button>
        </form>

        <div class="edit_cmt_user_from " style="display: none;">
            <form action="/index.php?pages=product_detail&action=layout&html=comment" id="editcmt">
                <input type="hidden" value="' . $id . '" name="user_id" id="iduser">
                <input type="hidden" value="' . $product_id . '" name="product_id" id="productid">
                <input type="text" id="inputcmt" name="contentuser" class="inputcmt" id="content">
                <button type="submit" name="editcmduser">xác nhận</button>
            </form>
        </div>

    </div>
    ';



            } else {
                echo "";
            }
            echo '
</div>

</li>';




        }


        ;

    } else {
        // Câu SQL Insert
        $user = new connect();
        $conn = $user->pdo_get_connection();
        $sql = "INSERT INTO comment(product_id,creat_at) VALUES('$idproduct','$update_at') ";

        $conn->exec($sql);
        // Thực hiện thêm record

        $comment_id = $conn->lastInsertId();
        // echo "chào" . $comment_id;


        $comment->comment_detail_insert($comment_id, $iduser, $content, $update_at);



        // in ne

        // in nè


        $editcmtuser = $comment->editcmtdetail_user($iduser);
        $resultCMT = $comment->select_all_mahanghoa($idproduct);

        foreach ($resultCMT as $row) {
            extract($row);
            echo '
<li class="timeline-item | extra-space">
    <span class="timeline-item-icon | filled-icon">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
            <path fill="none" d="M0 0h24v24H0z" />
            <path fill="currentColor"
                d="M6.455 19L2 22.5V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H6.455zM7 10v2h2v-2H7zm4 0v2h2v-2h-2zm4 0v2h2v-2h-2z" />
        </svg>
    </span>
    <div class="timeline-item-wrapper">
        <div class="timeline-item-description">
            <i class="avatar | small">
                <img src="https://assets.codepen.io/285131/hat-man.png" />
            </i>
            <span><a href="#">

                    ' . $name . '
                </a> Bình luận <time datetime="20-01-2021">
                    <?= $creat_at ?? "" ?>
                </time></span>
        </div>
        <div class="comment">
            <p>
                ' . $content . '

            </p>
            ';

            if ($user_id == $iduser) {
                echo '
            <div class="main_edit" style="display: flex;">
                <button type="button" class="edit_cmt_user" style="border: 1px ;
                            background-color: transparent; width: 50px;
                            ">Edit</button>
                <form action="/index.php?pages=product_detail&action=layout&html=comment" method="post">
                    <input type="hidden" value="' . $id . '" name="user_id">
                    <input type="hidden" value="' . $product_id . '" name="product_id">
                    <button type="button" name="Deletecmd" class="edit_cmt_user" style="border: 1px ;
                            background-color: transparent; width: 70px;
                            ">DELETE</button>
                </form>

                <div class="edit_cmt_user_from " style="display: none;">
                    <form action="/index.php?pages=product_detail&action=layout&html=comment" method="post">
                        <input type="hidden" value="' . $id . '" name="user_id">
                        <input type="hidden" value="' . $product_id . '" name="product_id">
                        <input type="text" id="inputcmt" name="contentuser" class="inputcmt">
                        <button type="submit" name="editcmduser">xác nhận</button>
                    </form>
                </div>

            </div>
            ';



            } else {
                echo "123";
            }
            echo '
        </div>

</li>';




        }

        ;

    }


}