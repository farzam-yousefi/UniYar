<?php

class messages extends Controller
{
    function __construct()
    {
        $this->loadModel("contact");
        Model::sessionInit('UNIYAR_ADMIN');
        if (!Model::isAdminLoggedIn('UNIYAR_ADMIN')) {
            header("Location:" . URL . "admin");
        }

    }

    function index()
    {
        $result = $this->model->getInitialInfo();
        $data['totalCount'] = $result['totalCount'];
        $data['messages'] = $result['messages'];
        $data['newCount'] = $result['newCount'];
        $data['expectingCount'] = $result['expectingCount'];
        $data['repliedCount'] = $result['repliedCount'];
        $this->view("admin/messages/index", $data,
            "admin", "admin");
    }

    function getMessages($type, $mode, $page)
    {
        $result = $this->model->getMessages($type, $mode, $page);
        $data['totalCount'] = $result['totalCount'];
        $data['messages'] = $result['messages'];
        ob_start();
        $this->view("admin/messages/_messageRows", $data, "admin",
            "admin", false, false, false, false);
        $html = ob_get_clean();

        echo json_encode([
            'messages' => $html,
            'totalCount' => $result['totalCount']
        ], JSON_UNESCAPED_UNICODE);

    }

    function delete($id)
    {
        $this->model->delete($id);
        header("Location:" . URL . "admin/messages");
    }

    function changeMessageStatus($status, $id)
    {
        $this->model->changeMessageStatus($status, $id);


    }

    function sendReply()
    {

        $post = $_POST;
        $errors = [];
        // پاک سازی

        $post['replySubject'] = Helper::sanitize($post['replySubject'] ?? '');
        $post['replyMessage'] = Helper::sanitize($post['replyMessage'] ?? '');


// اعتبارسنجی فیلدهای ضروری

        if ($post['replySubject'] === '') {
            $errors['replySubject'] = 'موضوع پیام الزامی است.';
        }
        if ($post['replyMessage'] === '') {
            $errors['replyMessage'] = 'متن پاسخ الزامی است.';
        }

        if (!empty($errors)) {
                echo json_encode([
                    'type' => 'validation',
                    'errors' => $errors
                ], JSON_UNESCAPED_UNICODE);

                return;


        } else {


            // ارسال از طریق SMTP
            $body = MailTemplates::adminReply(
                $post['full_name'],
                $post['replyMessage']
            );

            $adminId= Model::sessionGet("adminId");

            $result = $this->model->saveReplyAndSendEmail($post,$body,$adminId);

            if (!$result) {

                echo json_encode([
                    'type' => 'error',
                    'message' => 'ارسال پاسخ انجام نشد. لطفاً دوباره تلاش کنید.'
                ], JSON_UNESCAPED_UNICODE);

                return;
            }

            echo json_encode([
                'type' => 'success',
                'message' => 'پاسخ با موفقیت ارسال شد.'
            ], JSON_UNESCAPED_UNICODE);


        }
    }
}
