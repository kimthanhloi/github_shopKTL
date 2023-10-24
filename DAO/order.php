<?php

class order
{
    var $id = null;

    var $username = null;

    var $phone = null;
    var $address = null;

    var $tinh = null;
    var $quan = null;
    var $phuong = null;

    var $create_at = null;

    var $updated_at = null;
    var $total = null;

    var $user_id = null;



    function getAll_ordercount()
    {
        $db = new connect();
        $select = "SELECT COUNT(id) as number FROM user_order_detail";
        return $db->pdo_query_one($select);
    }
    function getAll()
    {
        $db = new connect();
        $select = "SELECT p.id as id ,
        p.username as usernamep,
        p.phone as phone,
        p.address as address,
        p.tinh as tinh,
        c.username as username,
        p.quan as quan,
        p.phuong as phuong,
        p.total as total,
         p.user_id as userid
        from user_order p, users c
        where p.user_id = c.id";
        return $db->pdo_query($select);
    }

    public function newproduct($username, $phone, $address, $tinh, $quan, $phuong, $total, $user_id)
    {
        $db = new connect();

        $select = "INSERT INTO user_order(username,phone,address,tinh,quan,phuong,total,user_id) VALUES 
        (?, ?,?,?,?,?,?,?)";
        $result = $db->pdo_execute($select, $username, $phone, $address, $tinh, $quan, $phuong, $total, $user_id);
        return $result;
    }
    public function deleteproduct($UserID)
    {
        $db = new connect();

        $select = "DELETE FROM user_order where id = ? ";
        $result = $db->pdo_execute($select, $UserID);
        return $result;
    }
    public function deleteorder_detail($UserID)
    {
        $db = new connect();

        $select = "DELETE FROM user_order_detail where id = ?  ";
        $result = $db->pdo_execute($select, $UserID);
        return $result;
    }
    public function editproduct($username, $phone, $address, $tinh, $quan, $phuong, $total, $user_id, $updated_at, $id)
    {
        $db = new connect();

        $select = "UPDATE user_order SET username = ?,phone= ?, `address` = ?,total=?
        ,quan = ? , updated_at=? , tinh=? , phuong=?, user_id = ? where id = ?";
        $result = $db->pdo_execute($select, $username, $phone, $address, $total, $quan, $updated_at, $tinh, $phuong, $user_id, $id);
        return $result;
    }
    public function updateUser_order($total, $id)
    {
        $db = new connect();

        $select = "UPDATE user_order SET total= ?  where id = ?";
        $result = $db->pdo_execute($select, $total, $id);
        return $result;
    }
    public function order_detail($id)
    {
        $db = new connect();

        $select = "SELECT
        o.username as username , 
        p.name as name , 
        p.money as money,
        od.qty as qty ,
        od.order_code as order_code,
        od.transfer_money as transfer_money
        from user_order o, products p , user_order_detail od
        where od.order_id = o.id AND  od.product_id = p.id and o.id= ?";
        $result = $db->pdo_query($select, $id);
        return $result;
    }
    public function getidlast_order()
    {
        $db = new connect();
        $select = " SELECT Max(id) as LastID FROM users";
        $result = $db->pdo_query_one($select);
        return $result;

    }

    public function insert_orderdetail($last_id, $id, $qty, $money, $code_cart, $pay)
    {
        $db = new connect();

        $select = "INSERT INTO user_order_detail(order_id ,product_id,qty,price,order_code,transfer_money ) VALUES 
        (?,? ,?,?,?,?)";
        $result = $db->pdo_execute($select, $last_id, $id, $qty, $money, $code_cart, $pay);
        return $result;
    }

    public function setting_orderuser($userid)
    {
        $db = new connect();

        $select = "SELECT
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
        where od.order_id = o.id AND  od.product_id = p.id AND o.user_id = u.id and  u.id = '$userid'";
        $result = $db->pdo_query($select);
        return $result;
    }




}

?>