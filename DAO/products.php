<?php

class products
{
    var $id = null;

    var $name = null;

    var $money = null;
    var $quantity = null;

    var $color = null;
    var $size = null;

    var $create_at = null;
    var $updated_at = null;

    var $category_id = null;

    var $describe = null;
    var $img = null;
    var $result_product = null;
    var $offset = null;





    function getcountall()
    {
        $db = new connect();
        $select = " SELECT COUNT(id) as number FROM products";
        return $db->pdo_query_one($select);
    }
    function getAll()
    {
        $db = new connect();
        $select = "SELECT  p.id as id,
        p.name as nameP,
        p.money as price,
        p.quantity as quantity,
        p.img as img,
        c.name as nameC,
        p.describe as describeS,
        p.color as color,
        p.size as size
        from products p, category c
        where p.category_id = c.id ";
        return $db->pdo_query($select);
    }
    function serach_product($name)
    {
        $db = new connect();
        $select = "SELECT * FROM products WHERE name LIKE '%$name%'";
        return $db->pdo_query($select);
    }
    function lowprice()
    {
        $db = new connect();
        $select = "SELECT * FROM products ORDER BY money ASC";
        return $db->pdo_query($select);
    }
    function expensive()
    {
        $db = new connect();
        $select = "SELECT * FROM products ORDER BY money DESC";
        return $db->pdo_query($select);
    }
    function productnew()
    {
        $db = new connect();
        $select = "SELECT * FROM products ORDER BY create_at DESC LIMIT 5";
        return $db->pdo_query($select);
    }

    function getAllshoewoman()
    {
        $db = new connect();
        $select = "SELECT * FROM products where category_id = 2";
        return $db->pdo_query($select);
    }
    function getAllbag()
    {
        $db = new connect();
        $select = "SELECT * FROM products where category_id = 3 ";
        return $db->pdo_query($select);
    }
    function getAllshoemen()
    {
        $db = new connect();
        $select = "SELECT * FROM products where category_id = 1";
        return $db->pdo_query($select);
    }
    function selectbyid($id)
    {
        $db = new connect();
        $select = "SELECT * FROM products where id = '$id'";
        return $db->pdo_query($select, $id);
    }
    function selectbyidcategory($id)
    {
        $db = new connect();
        $select = "  SELECT * FROM products where category_id = '$id'";
        return $db->pdo_query($select, $id);
    }


    public function newproduct($name, $money, $quantity, $color, $size, $category_id, $describe, $img)
    {
        $db = new connect();

        $select = "INSERT INTO products(name,money,quantity,color,size,category_id,`describe`,img ) VALUES 
        (?,?,?,?,?,?,?,?)";
        $result = $db->pdo_execute($select, $name, $money, $quantity, $color, $size, $category_id, $describe, $img);
        return $result;
    }
    public function deleteproduct($id)
    {
        $db = new connect();

        $select = "DELETE FROM products WHERE id=?";
        $result = $db->pdo_execute($select, $id);
        return $result;
    }
    public function editproduct($name, $money, $quantity, $color, $size, $category_id, $describe, $img, $id)
    {
        $db = new connect();

        $select = "UPDATE products SET `name` = ? , `money` = ?, quantity = ?,
        color = ? , size = ?, category_id = ? , `describe` = ? ,img = ? where id  = ?";
        $result = $db->pdo_execute($select, $name, $money, $quantity, $color, $size, $category_id, $describe, $img, $id);
        return $result;
    }

}

?>