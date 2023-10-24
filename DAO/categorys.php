<?php

class category
{
    var $id = null;

    var $name = null;

    var $note = null;
    var $create_at = null;

    var $update_at = null;




    function getAll()
    {
        $db = new connect();
        $select = "SELECT * FROM category";
        return $db->pdo_query($select);
    }

    public function newproduct($name, $note)
    {
        $db = new connect();

        $select = "INSERT INTO category(name,note)  VALUES(?,?)";
        $result = $db->pdo_execute($select, $name, $note);
        return $result;
    }
    public function deleteproduct($UserID)
    {
        $db = new connect();

        $select = "DELETE FROM category where id = ? ";
        $result = $db->pdo_execute($select, $UserID);
        return $result;
    }
    public function editproduct($name, $note, $id)
    {
        $db = new connect();

        $select = "UPDATE category SET name = ?,note= ? where id = ?";
        $result = $db->pdo_execute($select, $name, $note, $id);
        return $result;
    }


}

?>