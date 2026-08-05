<?php


class model_faq extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getAllFaqs()
    {
        $sql = "SELECT * FROM faqs WHERE is_active=1
        ORDER BY sort_order ASC,id ASC";
        return  $this->myFetchAll($sql);
    }
}
