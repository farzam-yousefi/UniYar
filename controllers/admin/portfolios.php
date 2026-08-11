<?php
require_once 'core/helper.php';

class portfolios extends Controller
{
    function __construct()
    {
        Model::sessionInit();
        if (!Model::isAdminLoggedIn()) {
            header("Location:" . URL . "admin");
        }
    }

    function index()
    {
        $this->loadModel("portfolio");
        $result = $this->model->getAllPortfolios();
        $data['portfolios']=$result[0];
        $data['totalCount']=$result[1]['totalCount'];
        $data['completedCount']=$result[2]['completedCount'];
        $this->view("admin/portfolios/index", $data,
            "admin", "admin");
    }

      function getPortfolios($status)
    {

        $this->loadModel("portfolio");
        $data['portfolios'] = $this->model->getPortfolios($status);
        $this->view("admin/portfolios/_portfolios_cards", $data, "admin", "adimn",
            false, false, false, false);
    }

    function changeBeingActiveFeatured($id)
    {
        $this->loadModel("portfolio");
        $this->model->changeBeingActiveFeatured($_POST, $id);
    }

    function delete($id)
    {
        $this->loadModel("portfolio");
        $this->model->delete($id);
        header("Location:" . URL . "admin/portfolios");

    }

    function sort()
    {
        $this->loadModel("portfolio");
        $data['portfolios'] = $this->model->getAllPortfolios("display_order", "asc");
        $this->view("admin/portfolios/sort", $data,
            "admin", "admin");

    }

    public function saveSort()
    {

        print_r($_POST);
        if (!isset($_POST['sortData'])) {

            header("Location:" . URL . "admin/portfolios");

            exit;

        }
        $this->loadModel("portfolio");

        $items = json_decode($_POST['sortData'], true);
        print_r($items);

        $this->model->saveSortOrder($items);

        header("Location:" . URL . "admin/portfolios/sort");

        exit;

    }

    function add()
    {
        $data['mode'] = "add";
        $this->view("admin/portfolios/add-edit", $data,
            "admin", "admin");
    }

    function action($mode)
    {
        if ($mode == "add")
            $this->insert($_POST, $_FILES);
        if ($mode == "edit")
            $this->update($_POST, $_FILES,$_POST['portfolioId']);
    }

    function insert($post, $files)
    {
        $data['mode'] = "add";
        $postResult =$this-> validator($post);

        $imageResult = [
            'success' => true,
            'filename' => null,
            'errors' => []
        ];

        if (isset($files['cover_image']) &&
            $files['cover_image']['error'] !== UPLOAD_ERR_NO_FILE)
            $imageResult = $this->validatorImage($files['cover_image']);

        $errors = array_merge(
            $postResult['errors'],
            $imageResult['errors'] ?? []
        );


        if (!empty($errors)) {

            $data['errors'] = $errors;
            $data['portfolio'] = $postResult['data'];

            $this->view("admin/portfolios/add-edit", $data,
                "admin", "admin");

            return;
        }


        // اینجا یعنی همه چیز درست است
        $post = $postResult['data'];

        $imageName = $imageResult['filename'];

        // ذخیره در دیتابیس
        $adminId = $this->getCurrentAdminId();
        $this->loadModel("portfolio");

        $_SESSION['alert-resultOperation'] = $this->model->addFromAdmin($post, $imageName, $adminId);
        $_SESSION['operation'] = "add";
        header("Location:" . URL . "admin/portfolios");
    }


    function edit($id)
    {
        $data['mode'] = "edit";
        $this->loadModel("portfolio");
        $data['portfolio'] = $this->model->getPortfolioById($id);
        $this->view("admin/portfolios/add-edit", $data,
            "admin", "admin");

    }

    function update($post, $files,$id)
    {
        echo "fsdf";
        $data['mode'] = "edit";
        $postResult =$this-> validator($post);

        $imageResult = [
            'success' => true,
            'filename' => null,
            'errors' => []
        ];

        if (isset($files['cover_image']) &&
            $files['cover_image']['error'] !== UPLOAD_ERR_NO_FILE)
            $imageResult =$this-> validatorImage($files['cover_image']);

        $errors = array_merge(
            $postResult['errors'],
            $imageResult['errors'] ?? []
        );


        if (!empty($errors)) {

            $data['errors'] = $errors;
            $data['portfolio'] = $postResult['data'];

            $this->view("admin/portfolios/add-edit", $data,
                "admin", "admin");

            return;
        }


        // اینجا یعنی همه چیز درست است
        $post = $postResult['data'];

        $imageName = $imageResult['filename'];

        // ویرایش در دیتابیس
        $adminId = $this->getCurrentAdminId();
        $this->loadModel("portfolio");

        $_SESSION['alert-resultOperation'] = $this->model->editFromAdmin($post, $imageName, $adminId, $id);
        $_SESSION['operation'] = "edit";
        header("Location:" . URL . "admin/portfolios/index");
    }

    /* ======================
  validation
  ====================== */

    function validator($post)
    {
        $errors = [];


        // پاک سازی
        $post['title'] = Helper::sanitize($post['title'] ?? '');
        $post['category'] = Helper::sanitize($post['category'] ?? '');
        $post['level'] = Helper::sanitize($post['level'] ?? '');
        $post['project_url'] = Helper::sanitize($post['project_url'] ?? '');


        $post['short_description'] = Helper::cleanTechDescription(
            $post['short_description'] ?? ''
        );

        $post['description'] = Helper::cleanTechDescription(
            $post['description'] ?? ''
        );


        // اعتبارسنجی فیلدهای ضروری

        if ($post['title'] === '') {
            $errors['title'] = 'عنوان نمونه کار الزامی است.';
        }


        if ($post['category'] === '') {
            $errors['category'] = 'دسته بندی را انتخاب کنید.';
        }


        if ($post['level'] === '') {
            $errors['level'] = 'مقطع را انتخاب کنید.';
        }


        if ($post['short_description'] === '') {
            $errors['short_description'] = 'توضیح کوتاه الزامی است.';
        }


        if ($post['description'] === '') {
            $errors['description'] = 'توضیحات پروژه الزامی است.';
        }

        if ($post['started_date'] === '') {
            $errors['started_date'] = 'تاریخ ثبت الزامی است.';
        }


        if ($post['completed_date'] === '') {
            $errors['completed_date'] = 'تاریخ تحویل الزامی است.';
        }

        $startedAt = $post['started_date'] ?? '';
        $completedAt = $post['completed_date'] ?? '';

        if ($startedAt !== '' && $completedAt !== '') {

            $startedAtMiladi = Helper::jaliliToMiladi($startedAt);
            $completedAtMiladi = Helper::jaliliToMiladi($completedAt);

            if ($startedAtMiladi > $completedAtMiladi) {
                $errors['completed_date'] =
                    'تاریخ تحویل باید بعد از تاریخ ثبت باشد.';
            }
        }
        if ($post['started_date'] !== '')
            $post['started_date'] = Helper::jaliliToMiladi($post['started_date']);
        if ($post['completed_date'] !== '')
            $post['completed_date'] = Helper::jaliliToMiladi($post['completed_date']);


        return [
            'data' => $post,
            'errors' => $errors
        ];
    }

    function validatorImage($image)
    {
        //********************
        //if picture is required
        //***********************
        // if pic is required
//        if (!isset($files['cover_image']) ||
//            $files['cover_image']['error'] == UPLOAD_ERR_NO_FILE) {
//            $err = 'تصویر نمونه کار الزامی است.';
//        return [
//            'success' => false,
//            'filename' => null,
//            'errors' => $err ?? ''
//        ];

//        } else

        $dir = "public/images/portfolio/";
        return Helper::uploadFile($image, $dir, ['img'], 20);


    }



}
