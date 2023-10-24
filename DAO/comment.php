<?php

class comment
{
    var $id = null;
    var $user_id = null;

    var $product_id = null;

    var $content = null;
    var $create_at = null;
    var $comment_id = null;





    function comment_count()
    {
        $db = new connect();
        $select = " SELECT COUNT(id) as number FROM comment_detail;";
        return $db->pdo_query_one($select);
    }

    function comment_insert($product_id, $create_at)
    {
        $db = new connect();
        $select = "INSERT INTO comment(product_id,creat_at) VALUES(?,?) ";
        return $db->pdo_execute($select, $product_id, $create_at);
    }
    function comment_detail_insert($comment_id, $user_id, $content, $create_at)
    {
        $db = new connect();
        $select = "INSERT INTO comment_detail(comment_id ,user_id ,content,created_at) VALUES(?,?,?,?) ";
        return $db->pdo_execute($select, $comment_id, $user_id, $content, $create_at);
    }

    public function delete_comment($id)
    {
        $db = new connect();

        $select = "DELETE FROM comment where id = ? ";
        $result = $db->pdo_execute($select, $id);
        return $result;
    }
    public function delete_commentdetail($id)
    {
        $db = new connect();

        $select = " DELETE FROM comment_detail where id = ?";
        $result = $db->pdo_execute($select, $id);
        return $result;
    }

    public function update_comment($product_id, $create_at, $id)
    {
        $db = new connect();

        $select = "UPDATE comment SET product_id = ?,creat_at= ?,
         where id = ?";
        $result = $db->pdo_execute($select, $product_id, $create_at, $id);
        return $result;
    }
    public function update_comment_detail($content, $create_at, $id)
    {
        $db = new connect();

        $select = "UPDATE comment_detail SET content = ? , created_at = ? 
         where id = ?";
        $result = $db->pdo_execute($select, $content, $create_at, $id);
        return $result;
    }
    // show tất cả các bình luận 1 hàng hóa 
    public function select_all_mahanghoa($product_id)
    {
        $db = new connect();

        $select = "SELECT cd.content as content , cd.user_id as user_id   , 
        cd.created_at as creat_at , u.username as name , c.product_id as product_id 
        , cd.id as id
        from comment_detail cd, comment c ,
         users u ,products p where cd.comment_id = c.id and cd.user_id = u.id 
         and c.product_id = p.id and c.product_id =  ? ORDER BY creat_at DESC ";
        $result = $db->pdo_query($select, $product_id);
        return $result;
    }

    public function selectall_comment()
    {
        $db = new connect();

        $select = "SELECT DISTINCT p.name AS name , c.product_id as product_id, c.see_comment as see_comment,
        c.id as id
        FROM comment c, products p WHERE c.product_id = p.id";
        $result = $db->pdo_query($select);
        return $result;
    }
    // $select = "SELECT DISTINCT c.product_id as product_id , 
    // p.name as name , c.creat_at as creat_at from comment c ,products p where c.product_id = p.id";

    // đếm số lượng comment
    public function select_product_id($id_product)
    {
        $db = new connect();

        $select = "SELECT DISTINCT COUNT(*) AS comment_count from comment c ,
        products p  where c.product_id = p.id and c.product_id ='$id_product'";
        $result = $db->pdo_query($select);
        return $result;
    }
    public function list_see_chitiet_insert($product_id)
    {
        $db = new connect();

        $select = "UPDATE comment
        SET see_comment = see_comment + 1
        WHERE product_id  = '$product_id'";
        $result = $db->pdo_execute($select);
        return $result;
    }
    // anh quang 
    public function duplicateColumcmt($product_id)
    {
        $db = new connect();

        $select = "SELECT * FROM comment where product_id = '$product_id'";
        $result = $db->pdo_query($select);
        foreach ($result as $row) {
            return $row["id"];
        }
    }
    public function duplicateColum($product_id)
    {
        $db = new connect();

        $select = "SELECT * FROM comment";
        $result = $db->pdo_query($select);
        foreach ($result as $row) {
            $bien = $row["product_id"];
            if ($product_id == $bien) {
                return true;
            }
        }
    }

    public function addcmtdetail($product_id, $user_id, $content, $create_at)
    {
        $db = new connect();
        $id = $this->duplicateColumcmt($product_id);
        $newid = intval($id);
        $select = "INSERT INTO comment_detail(comment_id ,user_id ,content,created_at) VALUES(?,?,?,?) ";
        $result = $db->pdo_execute($select, $newid, $user_id, $content, $create_at);
        return $result;
    }
    public function editcmtdetail_user($user_id)
    {
        $db = new connect();
        $select = " SELECT cd.content as content , c.creat_at as creat_at , u.username as name , 
        c.product_id as product_id ,cd.user_id as user_id from comment_detail cd, 
        comment c , users u ,products p where cd.comment_id = c.id and cd.user_id = u.id 
        and c.product_id = p.id and cd.user_id = ?";
        $result = $db->pdo_query($select, $user_id);

        foreach ($result as $row) {
            return $row["user_id"];
        }
        return $result;
    }

    public function count_tungloaisanpham($product_id)
    {
        $db = new connect();
        $select = " SELECT COUNT(cd.comment_id) as comment_id  from comment c , 
        comment_detail cd where cd.comment_id = c.id and 
        c.product_id = ? ";
        $result = $db->pdo_query_one($select, $product_id);
        return $result;
    }

    public function ngaymoinhat_cmt($id)
    {
        $db = new connect();
        $select = "SELECT product_id, MAX(created_at) AS latest_date FROM comment_detail cd ,
         comment c where c.id =cd.comment_id and c.product_id = ? GROUP BY product_id";
        $result = $db->pdo_query_one($select, $id);
        return $result;
    }

}

?>