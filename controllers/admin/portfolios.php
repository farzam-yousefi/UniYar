<?php
require_once 'core/helper.php';
require_once 'core/const.php';

class portfolios extends Controller
{
    function __construct()
    {
        Model::sessionInit('UNIYAR_ADMIN');
        if (!Model::isAdminLoggedIn()) {
            header("Location:" . URL . "admin");
        }
    }

    function index()
    {
        $this->loadModel("portfolio");
        $result = $this->model->getAllPortfolios();
        $data['portfolios'] = $result[0];
        $data['totalCount'] = $result[1]['totalCount'];
        $data['completedCount'] = $result[2]['completedCount'];
        $this->view("admin/portfolios/index", $data,
            "admin", "admin");
    }

    function getPortfolios($status)
    {

        $this->loadModel("portfolio");
        $data['portfolios'] = $this->model->getPortfolios(strtoupper($status));
        $this->view("admin/portfolios/_portfolios_cards", $data, "admin", "admin",
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

        if (!isset($_POST['sortData'])) {

            header("Location:" . URL . "admin/portfolios");

            exit;

        }
        $this->loadModel("portfolio");

        $items = json_decode($_POST['sortData'], true);
        //print_r($items);

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

    function edit($id)
    {
        $data['mode'] = "edit";
        $this->loadModel("portfolio");
        $data['portfolio'] = $this->model->getPortfolioById($id);
        $this->view("admin/portfolios/add-edit", $data,
            "admin", "admin");

    }

    function action($mode)
    {
        if ($mode == "add")
            $this->insert($_POST, $_FILES);
        if ($mode == "edit")
            $this->update($_POST, $_FILES, $_POST['portfolioId']);
    }

    function insert($post, $files)
    {
        $data['mode'] = "add";
        $postResult = $this->validator($post);
        $subDir = "portfolios/" . $post['category'];
        $itemName = 'نمونه کار';
        $item = 'cover_image';
        $imgIsRequired = false;

        /*
   ==========================================
   Default image result
   ==========================================
   */

        $imageResult = [
            'success' => true,

            'data' => [
                'filename' => null
            ],

            'errors' => []
        ];

            if (!empty($files)) {
                $imageResult = Helper::validatorImage($files['cover_image'], $subDir, $item,
                    $itemName, $imgIsRequired);


            } elseif ($imgIsRequired) {

                $imageResult = Helper::validatorImage([],$subDir, $item,$itemName,
                    true
                );
            }
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

            $imageName = $imageResult['data']['filename'];

            // ذخیره در دیتابیس
            $adminId = $this->getCurrentAdminId();
            $this->loadModel("portfolio");

            $result = $this->model->addFromAdmin($post, $imageName, $adminId);
            if ($result)
                $_SESSION['alert-resultOperation'] = [
                    'type' => 'success',
                    'title' => 'عملیات موفق',
                    'message' => 'نمونه کار با موفقیت ثبت شد.'
                ];
            else
                $_SESSION['alert-resultOperation'] = [
                    'type' => 'error',
                    'title' => 'عملیات ناموفق',
                    'message' => 'عملیات ثبت نمونه کار با خطا مواجه شد.'
                ];
            $_SESSION['operation'] = "addPortfolioFromAdmin";
            header("Location:" . URL . "admin/portfolios");
        }

        function update($post, $files, $id)
        {
            $this->loadModel("portfolio");
            $data['mode'] = "edit";
            $subDir = "portfolios/" . $post['category'];
            $itemName = 'نمونه کار';
            $item = 'cover_image';
            $imgIsRequired = false;

            $postResult = $this->validator($post);

    // تصویر قبلی
            $oldPortfolio = $this->model->getPortfolioById($id);

            if (!$oldPortfolio) {
                // نمونه کار وجود ندارد
                return;
            }

            // اگر تصویر جدید انتخاب شده
            if (
                isset($files['cover_image']) &&
                $files['cover_image']['error'] !== UPLOAD_ERR_NO_FILE
            ) {
                $imageResult = Helper::validatorImage($files['cover_image'], $subDir, $item, $itemName, $imgIsRequired);
            } else {
                // تصویر قبلی را حفظ کن
                $imageResult = [
                    'success' => true,
                    'data' => [
                        'filename' => $oldPortfolio['cover_image'],
                    ],
                    'errors' => []
                ];
            }

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

            $imageName = $imageResult['data']['filename'];

            // ویرایش در دیتابیس
            $adminId = $this->getCurrentAdminId();


            $result = $this->model->editFromAdmin($post, $imageName, $adminId, $id);
            if ($result)
                $_SESSION['alert-resultOperation'] = [
                    'type' => 'success',
                    'title' => 'عملیات موفق',
                    'message' => 'نمونه کار با موفقیت ویرایش شد.'
                ];
            else
                $_SESSION['alert-resultOperation'] = [
                    'type' => 'error',
                    'title' => 'عملیات ناموفق',
                    'message' => 'عملیات ویرایش نمونه کار با خطا مواجه شد.'
                ];
            $_SESSION['operation'] = "editPortfolioFromAdmin";
            header("Location:" . URL . "admin/portfolios/index");
        }

        /* ======================
      validation
      ====================== */

        function validator($post)
        {
            $errors = [];


            // پاک سازی فیلد های متنی
            $post['title'] = Helper::sanitize($post['title'] ?? '');
            $post['short_description'] = Helper::cleanTechDescription(
                $post['short_description'] ?? ''
            );
            $post['description'] = Helper::cleanTechDescription(
                $post['description'] ?? ''
            );

            //فیلدهای select
            $post['category'] = trim($post['category']) ?? '';
            $post['level'] = trim($post['level']) ?? '';
            $post['status'] = strtoupper(trim($post['status'])) ?? '';

            if ($post['category'] === '') {
                $errors['category'] = 'دسته بندی را انتخاب کنید.';
            } else if (!in_array($post['category'], ALLOWED_CATEGORIES, true)) {
                $errors['category'] = 'دسته بندی انتخاب شده معتبر نیست.';
            }


            if ($post['level'] === '') {
                $errors['level'] = 'مقطع را انتخاب کنید.';
            } else if (!in_array($post['level'], ALLOWED_LEVELS, true)) {
                $errors['level'] = 'مقطع انتخاب شده معتبر نیست.';
            }

            if ($post['status'] === '') {
                $errors['status'] = 'وضعیت را انتخاب کنید.';
            } else if (!in_array($post['status'], ALLOWED_STATUSES, true)) {
                $errors['status'] = 'وضعیت انتخاب شده معتبر نیست.';
            }

//فیلد های سوییچ/چک باکس
            $post['is_featured'] = isset($post['is_featured']) ? 1 : 0;
            $post['is_active'] = isset($post['is_active']) ? 1 : 0;


            //آدرس ها
            $post['project_url'] = trim($_POST['project_url'] ?? '');

            if ($post['project_url'] !== '') {

                if (!filter_var($post['project_url'], FILTER_VALIDATE_URL))
                    $errors['project_url'] = 'آدرس پروژه معتبر نیست.';
                else {
                    $scheme = strtolower(
                        parse_url($post['project_url'], PHP_URL_SCHEME) ?? ''
                    );

                    if (!in_array($scheme, ['http', 'https'], true)) {
                        $errors['project_url'] =
                            'آدرس پروژه باید با http یا https باشد.';
                    }

                }
            }


            // اعتبارسنجی فیلدهای ضروری

            if ($post['title'] === '') {
                $errors['title'] = 'عنوان نمونه کار الزامی است.';
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

            $startedAt = trim($post['started_date']) ?? '';
            $completedAt = trim($post['completed_date']) ?? '';

            if ($startedAt !== '' && $completedAt !== '') {

                $startedAtMiladi = Helper::jaliliToMiladi($startedAt);
                $completedAtMiladi = Helper::jaliliToMiladi($completedAt);

                if ($startedAtMiladi > $completedAtMiladi) {
                    $errors['completed_date'] =
                        'تاریخ تحویل باید بعد از تاریخ ثبت باشد.';
                }
            }
            if ($post['started_date'] !== '')
                $post['started_date'] = Helper::jaliliToMiladi(trim($post['started_date']));
            if ($post['completed_date'] !== '')
                $post['completed_date'] = Helper::jaliliToMiladi(trim($post['completed_date']));


            return [
                'data' => $post,
                'errors' => $errors
            ];
        }


    }
