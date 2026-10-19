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
       $sql="select title, short_description , tags ,cover_image , category
        from projects  where is_featured=1 order by display_order";
       return $this->myFetchAll($sql);
    }
}
