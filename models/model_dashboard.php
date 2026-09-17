<?php

class model_dashboard extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getInitialInfo()
    {
        $newOrdersCount = $this->myFetch("select count(*) as 'newOrdersCount' from orders 
 where status = ?", ['PENDING'])['newOrdersCount'];
        $reviewingOrdersCount = $this->myFetch("select count(*) as 'reviewingOrdersCount' from orders 
 where status = ?", ['REVIEWING'])['reviewingOrdersCount'];
        $completedOrdersCount = $this->myFetch("select count(*) as 'completedOrdersCount' from orders 
 where status = ?", ['COMPLETED'])['completedOrdersCount'];

        $customerCount = $this->myFetch("select count(*) as 'totalCustomers' from customers")['totalCustomers'];

        $sql = "select full_name ,tracking_code,services.type as 'service_type',
         service_items.title as 'project_type' ,status , orders.created_at as 'submission_date'
         from orders INNER JOIN customers on orders.customer_id=customers.id
          INNER JOIN services on orders.service_id=services.id 
           LEFT  JOIN service_items on orders.service_items_id=service_items.id
          ORDER BY orders.created_at DESC limit 10";

        $last10Orders = $this->myFetchAll($sql);
        return [
            'newOrdersCount'=>$newOrdersCount,
            'reviewingOrdersCount'=>$reviewingOrdersCount,
            'completedOrdersCount'=>$completedOrdersCount,
            'customerCount'=>$customerCount,
            'last10Orders'=>$last10Orders];

    }

}
