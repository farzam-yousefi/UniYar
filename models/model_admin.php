<?php

class model_admin extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function setLogin($post)
    {
        if ($post['username'] && $post['password']) {
            $sql = "select id,username,password, full_name from admins where username=?";
            $result = $this->myFetch($sql, [$post['username']]);
            if(($result)&& (password_verify($post['password'], $result['password'])))
                return $result;
            return null;
        } else
            return null;
    }
}
