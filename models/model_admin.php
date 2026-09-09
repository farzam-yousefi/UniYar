<?php

class model_admin extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function setLogin($post)
    {
        if ((isset($post['username']))&&($post['username'] )&&( $post['password'])) {
            $sql = "select id,username,password, full_name from admins where username=?";
            $result = $this->myFetch($sql, [$post['username']]);
            if (($result) && (password_verify($post['password'], $result['password'])))
                return $result;
            return null;
        } else
            return null;
    }

    function getCurrentUserPass($adminId){
        $sql="select password from admins where id=?";
        return $this->myFetch($sql,[$adminId]);
    }

    function changePassword($newPassword, $adminId)
    {
        try {
            $hashedPassword =password_hash($newPassword, PASSWORD_BCRYPT);
            $sql="update admins set password=? where id=? ";
            $this->doQuery($sql,[$hashedPassword,$adminId]);
            return true;

        } catch (PDOException $e) {

            // ثبت خطا برای خودم
            error_log($e->getMessage());

            // پیام مناسب برای کاربر
            return false;

        } catch (Exception $e) {

            error_log($e->getMessage());

            return false;
        }
    }

    function updateLastLogin($adminId){
        $sql="update admins set last_login_at=? where id=?";
        $currentDate=date("Y-m-d H:i:s");
        $this->doQuery($sql,[$currentDate,$adminId]);
    }

}
