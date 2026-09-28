<?php


class model_faq extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getFaqs($status)
    {

        switch ($status) {
            case "all" :
                $sql = "SELECT * FROM faqs ORDER BY sort_order ASC,id ASC";
                break;
            case "active" :
                $sql = "SELECT * FROM faqs Where is_active=1 ORDER BY sort_order ASC,id ASC";
                break;
            case "nonActive" :
                $sql = "SELECT * FROM faqs Where is_active=0 ORDER BY sort_order ASC,id ASC";
                break;
            default:
                $sql = "";

        }

        return $this->myFetchAll($sql);
    }

    function add($post)
    {

        try {
            $sort_order = $this->myFetch("select COALESCE(MAX(sort_order), 0) + 1 
             as sort_order from faqs")['sort_order'];

            $sql = "insert into faqs (question,answer,is_active,sort_order) values (?,?,?,?)";
            $this->doQuery($sql, [$post['question'], $post['answer'], $post['is_active'], $sort_order]);
            return [
                'type' => 'success',
                'title' => 'عملیات موفق',
                'message' => ' سوال با موفقیت ثبت شد.'
            ];
        } catch (Exception $e) {

            // برای توسعه موقتاً:
            error_log($e->getMessage());
            return [
                'type' => 'error',
                'title' => 'عملیات ناموفق',
                'message' => 'عملیات افزودن سوال با خطا مواجه شد.'
            ];
        }


    }

    function edit($post)
    {

        try {

            $sql = "update faqs set question=?, answer=? where id=?";
            $this->doQuery($sql, [$post['question'], $post['answer'], $post['id']]);
            return [
                'type' => 'success',
                'title' => 'عملیات موفق',
                'message' => ' سوال با موفقیت ویرایش شد.'
            ];
        } catch (Exception $e) {

            // برای توسعه موقتاً:
            error_log($e->getMessage());
            return [
                'type' => 'error',
                'title' => 'عملیات ناموفق',
                'message' => 'عملیات ویرایش سوال با خطا مواجه شد.'
            ];
        }


    }

    function delete($id)
    {

        try {

            $sql = "delete from faqs where id=?";
            $this->doQuery($sql, [$id]);
            return [
                'type' => 'success',
                'title' => 'عملیات موفق',
                'message' => ' سوال با موفقیت حذف شد.'
            ];
        } catch (Exception $e) {

            // برای توسعه موقتاً:
            error_log($e->getMessage());
            return [
                'type' => 'error',
                'title' => 'عملیات ناموفق',
                'message' => 'عملیات حذف سوال با خطا مواجه شد.'
            ];
        }


    }

    public function saveSortOrder($items)
    {

        self::$conn->beginTransaction();

        try {

            foreach ($items as $item) {

                $sql = "UPDATE faqs SET sort_order=?  WHERE id=?";
                $this->doQuery($sql, [$item['sort_order'], $item['id']]);
            }

            self::$conn->commit();

        } catch (Exception $e) {

            if (self::$conn->inTransaction()) {
                self::$conn->rollBack();
            }

            throw $e;

        }

    }

    function changeActiveState($post,$id){
        $sql="update faqs set is_active=? where id=?";
        $this->doQuery($sql,[$post['value'],$id]);
    }

}
