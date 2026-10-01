<?php


class model_index extends Model
{

    function __construct()
    {
        parent::__construct();
    }
    function getFooterInfo(){
        return $this->myFetchAll("select setting_key, setting_value from settings");
    }

    function getSelectedPortfolios(){

    }
}
