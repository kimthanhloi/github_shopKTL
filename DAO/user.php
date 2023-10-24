<?php

class user
{
    var $UserID = null;

    var $Username = null;

    var $password = null;
    var $email = null;

    var $phone = null;

    var $create_at = null;

    var $updated_at = null;
    var $role_id = null;



    function getUserAll()
    {
        $db = new connect();
        $select = "select * from users ";
        return $db->pdo_query($select);
    }
    function countall_user()
    {
        $db = new connect();
        $select = "SELECT COUNT(id) as number FROM users";
        return $db->pdo_query_one($select);
    }

    public function newusers($name, $pass, $email, $role_id, $phone)
    {
        $db = new connect();

        $select = "INSERT INTO users(username,password,email,role_id,phone) VALUES(?,?,?,?,?)";
        $result = $db->pdo_execute($select, $name, $pass, $email, $role_id, $phone);
        return $result;
    }
    public function deleteuser($UserID)
    {
        $db = new connect();

        $select = "DELETE FROM users WHERE id=?";
        $result = $db->pdo_execute($select, $UserID);
        return $result;
    }
    public function edituser($name, $pass, $email, $updated_at, $role_id, $phone, $UserID)
    {
        $db = new connect();

        $select = "UPDATE users SET username =? ,password=? , email =? ,
        updated_at=? , role_id=? , phone=?  where id =? ";
        $result = $db->pdo_execute($select, $name, $pass, $email, $updated_at, $role_id, $phone, $UserID);
        return $result;
    }
    public function change_pass($pass, $id)
    {
        $db = new connect();

        $select = "UPDATE users SET password=?  where id =? ";
        $result = $db->pdo_execute($select, $pass, $id);
        return $result;
    }
    public function edituser_setting($name, $email, $updated_at, $role_id, $phone, $UserID)
    {
        $db = new connect();

        $select = "UPDATE users SET username =? , email =? ,
        updated_at=? , role_id=? , phone=?  where id =? ";
        $result = $db->pdo_execute($select, $name, $email, $updated_at, $role_id, $phone, $UserID);
        return $result;
    }
    public function loginuser($name)
    {
        $db = new connect();

        $select = "SELECT * FROM users WHERE username = '$name'   and role_id = 2 ";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    public function select_id_user($id)
    {
        $db = new connect();

        $select = "SELECT * FROM users WHERE id = '$id'   and role_id = 2 ";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    public function checkUser($username, $password)
    {
        $db = new connect();
        $select = "select * from users where username='$username' and password ='$password' and role_id = 2 ";
        $result = $db->pdo_query_one($select, $username, $password);
        if ($result != null)
            return true;
        else
            return false;
    }
    public function loginuser_admin($name)
    {
        $db = new connect();

        $select = "SELECT * FROM users WHERE username = '$name'   and role_id = 1 ";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    public function checkUser_login($username, $password)
    {
        $db = new connect();
        $select = "select * from users where username='$username' and password ='$password' and role_id = 2 ";
        $result = $db->pdo_query_one($select, $username, $password);
        if ($result != null)
            return true;
        else
            return false;
    }
    public function checkUser_admin($username, $password)
    {
        $db = new connect();
        $select = "select * from users where username='$username' and password ='$password' and role_id = 1 ";
        $result = $db->pdo_query_one($select, $username, $password);
        if ($result != null)
            return true;
        else
            return false;
    }
    public function checkUser_email($email)
    {
        $db = new connect();
        $select = "select * from users where email ='$email'";
        $result = $db->pdo_query_one($select);
        if ($result != null)
            return true;
        else
            return false;
    }
    public function update_email_pass($password, $email)
    {
        $db = new connect();
        $select = "UPDATE users SET `password` = '$password' where email ='$email'";
        $result = $db->pdo_execute($select);
        return $result;
    }
    public function select_iduser($id)
    {
        $db = new connect();

        $select = "SELECT * FROM users WHERE id =  '$id' ";
        $result = $db->pdo_query_one($select);
        return $result;
    }
}

?>