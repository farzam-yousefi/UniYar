<?php
require_once  'core/Mailer.php';
require_once  'core/MailTemplates.php';

class model_contact extends Model
{
    private const MESSAGE_LIST_QUERY = "select messages.id,subject,message,messages.email,
        status,is_read,response,replied_at,messages.created_at,full_name,mobile from 
        messages inner join customers on  messages.customer_id=customers.id";

    function __construct()
    {
        parent::__construct();
    }

    function add($post)
    {

        try {
            //<!--=========================
            //fetch or create customer
            //=========================-->
            self::$conn->beginTransaction();
            $sqlSearchUser = "select id, full_name from customers where mobile=?";
            $customer = $this->myFetch($sqlSearchUser, [$post['mobile']]);
            if (!empty($customer)) {
                if ($customer['full_name'] === $post['full_name'])
                    $customerId = $customer['id'];
                else {
                    self::$conn->rollBack();

                    return [
                        'type' => 'error',
                        'title' => 'عملیات ناموفق',
                        'message' => 'این شماره موبایل قبلا به نام دیگری ثبت شده است.',
                    ];
                }
            } else {
                $sql = "insert into customers (full_name, mobile,email) values (?,?,?)";
                $this->doQuery($sql, [$post['full_name'], $post['mobile'], $post['email']]);
                $customerId = Model::lastInsertId();
            }


            $sql = "insert into messages (subject,message,email,customer_id) values (?,?,?,?)";
            $this->doQuery($sql, [$post['subject'], $post['message'], $post['email'], $customerId]);
            self::$conn->commit();
            return [
                'type' => 'success',
                'title' => 'عملیات موفق',
                'message' => ' پیام شما با موفقیت ثبت شد.'
            ];
        } catch (Exception $e) {

            // برای توسعه موقتاً:
            //error_log($e->getMessage());
            return [
                'type' => 'error',
                'title' => 'عملیات ناموفق',
                'message' => 'عملیات ثبت پیام با خطا مواجه شد.'
            ];
        }

    }


    function getInitialInfo()
    {
        $totalCount = $this->myFetch("select count(*) as totalCount from messages")['totalCount'];
        $newCount = $this->myFetch("select count(*)  as newCount from messages
             where status='NEW'")['newCount'];
        $expectingCount = $this->myFetch("select count(*)  as expectingCount from messages
             where status='EXPECTING'")['expectingCount'];
        $repliedCount = $this->myFetch("select count(*)  as repliedCount from messages
             where status='REPLIED'")['repliedCount'];

        $sql = "select messages.id,subject,message,messages.email,status,is_read,response,
        replied_at,messages.created_at,full_name,mobile from messages inner join customers on 
        messages.customer_id=customers.id ORDER BY messages.created_at DESC limit " . ItemsPerPage;
        $messages = $this->myFetchAll($sql);

        return
            [
                'totalCount' => $totalCount,
                'newCount' => $newCount,
                'repliedCount' => $repliedCount,
                'expectingCount' => $expectingCount,
                'messages' => $messages

            ];
    }

    function getMessages($type = 'all', $mode = 'newest', $page)
    {

        $offset = ($page - 1) * ItemsPerPage;
        $totalCount = $this->myFetch("select count(*) as totalCount from messages")['totalCount'];

        if ($mode == 'newest')
            $sortMode = "DESC";
        else
            $sortMode = "";


        if ($type == 'all') {

            $sql = self::MESSAGE_LIST_QUERY . " ORDER BY messages.created_at " . $sortMode .
                " limit " . ItemsPerPage . " OFFSET " . $offset;
            $messages = $this->myFetchAll($sql);

        } else {
            $sql = "select messages.id,subject,message,messages.email,status,is_read,response,
         replied_at,messages.created_at,full_name,mobile from messages inner join customers on 
        messages.customer_id=customers.id where status=? ORDER BY messages.created_at " . $sortMode .
                " limit " . ItemsPerPage . " OFFSET " . $offset;

            $messages = $this->myFetchAll($sql, [$type]);
        }
        return
            [
                'totalCount' => $totalCount,
                'messages' => $messages

            ];

    }

    function delete($id)
    {
        $this->doQuery("delete from messages where id=?", [$id]);
    }

    function changeMessageStatus($status, $id)
    {
        $this->doQuery("update messages set status=?, is_read=1 where id=?", [$status, $id]);
    }

    function replyMessage($response, $adminId, $id)
    {
        try {
            $sql = "update messages set response=? , handled_by_admin_id=?, replied_at=?,status=?
        where id=?";
            $this->doQuery($sql, [$response, $adminId, date('Y-m-d H:i:s'), "REPLIED", $id]);
            return true;

        } catch (Exception $e) {

            return false;
        }
    }

    function saveReplyAndSendEmail($post, $body, $adminId)
    {

        self::$conn->beginTransaction();

        try {

            // 1. ذخیره پاسخ
            $result = $this->replyMessage($post['replyMessage'], $adminId, $post['id']);

            if (!$result) {
                throw new Exception('Database error');
            }


            // 2. ارسال ایمیل
            $emailSent = Mailer::send($post['email'], $post['replySubject'], $body);

            if (!$emailSent) {
                throw new Exception('Email sending failed');
            }


            // 3. همه چیز موفق
            self::$conn->commit();
            return true;

        } catch (Exception $e) {

            // اگر Transaction باز است
            if (self::$conn->inTransaction()) {
                self::$conn->rollBack();
            }

            error_log(
                'UniYar reply error: ' . $e->getMessage()
            );

            return false;
        }
    }


}
