<?php


class model_customer extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getInitialInfo()
    {
        $newCount = $this->myFetch("select count(*) as newCount from customers
          where date(created_at) = ?",
            [(new DateTime('today'))->format('Y-m-d')])['newCount'];
        $result = $this->getPageCustomers($page = 1, 'created_at', $sortType = 'DESC');

        return [
            'newCount' => $newCount,
            'totalCount' => $result['totalCount'],
            'customers' => $result['customers']
        ];

    }

    function getCustomers($mode, $page)
    {
        switch ($mode) {
            case 'newest':
                $result = $this->getPageCustomers($page, 'created_at', $sortType = 'DESC');
                break;
            case 'oldest' :
                $result = $this->getPageCustomers($page, 'created_at');
                break;
            case 'most_orders':
                $result = $this->getPageCustomers($page , 'customer_orders_count', $sortType = 'DESC');
                break;
            default:
                $result = [];
        }
        return $result;
    }

    function getPageCustomers($page = 1, $orderColumn, $sortType = '')
    {
        $offset = ($page - 1) * ItemsPerPage;
        $totalCount = $this->myFetch("select count(*) as totalCount from customers")['totalCount'];
        if ($orderColumn === 'customer_orders_count') {
            $column = 'customer_orders_count';
        } else {
            $column = 'customers.' . $orderColumn;
        }

        $sql = "select customers.id, full_name, mobile,email,customers.created_at, count(orders.id)
         as customer_orders_count from
        customers left outer join orders on customers.id=orders.customer_id group by customers.id
         ORDER BY " . $column . " " . $sortType . " limit " . ItemsPerPage . " OFFSET " . $offset;
        $customers = $this->myFetchAll($sql);
        return [
            'totalCount' => $totalCount,
            'customers' => $customers
        ];

    }

    function getTodayCustomers($page){

        $offset = ($page - 1) * ItemsPerPage;
        $newCount = $this->myFetch("select count(*) as newCount from customers
          where date(created_at) = ?",
            [(new DateTime('today'))->format('Y-m-d')])['newCount'];

        $sql="select customers.id, full_name, mobile,email,customers.created_at, count(orders.id)
         as customer_orders_count from
        customers left outer join orders on customers.id=orders.customer_id 
        where date(customers.created_at) = ? 
        group by customers.id
         ORDER BY customers.created_at DESC limit " . ItemsPerPage . " OFFSET " .$offset;
        $customers = $this->myFetchAll($sql,[(new DateTime('today'))->format('Y-m-d')]);
        return [
            'totalCount' => $newCount,
            'customers' => $customers
        ];

    }


}

