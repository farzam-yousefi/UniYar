<?php


class model_about extends Model
{

    function __construct()
    {
        parent::__construct();
    }
    function test(){
        $sql="select * from admins";
        return $this->myFetch($sql);
    }
}

