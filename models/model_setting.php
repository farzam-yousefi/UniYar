<?php


class model_setting extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getSettings()
    {
        return $this->myFetchAll("select setting_key, setting_value from settings");
    }

    function saveGeneral($post)
    {
        try {
            foreach ($post as $key => $value) {
                $sql = "update settings set  setting_value=? where setting_key=?";
                $this->doQuery($sql, [$value, $key]);
            }
            return true;
        } catch (Exception $e) {

            error_log($e->getMessage());

            return false;
        }
    }

}
