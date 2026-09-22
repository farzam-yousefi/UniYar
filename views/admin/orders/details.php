<style>
    /*==================================================
Page Header
==================================================*/

    .page-header h2 {

        margin: 0;

        color: #17335C;

        font-weight: 700;

    }

    .page-header p {

        margin-top: 6px;

        color: #6C757D;

        font-size: .95rem;

    }

    /*==================================================
    Cards
    ==================================================*/

    .card {

        border-radius: 18px;

    }

    .card-header {

        border-bottom: 1px solid #EDF1F5;

        padding: 18px 22px;

    }

    .card-header h5 {

        margin: 0;

        font-size: 1.05rem;

        color: #17335C;

        font-weight: 700;

    }

    .card-body {

        padding: 22px;

    }

    /*==================================================
    Top Summary
    ==================================================*/

    .detail-box {

        background: #F8FBFF;

        border: 1px solid #E5EDF4;

        border-radius: 14px;

        padding: 18px;

        height: 100%;

    }

    .detail-box label {

        display: block;

        margin-bottom: 10px;

        color: #6C757D;

        font-size: .85rem;

        font-weight: 600;

    }

    .detail-box div {

        color: #17335C;

        font-size: 1rem;

        font-weight: 700;

    }

    /*==================================================
    Inputs
    ==================================================*/

    input:read-only, textarea:read-only, select:disabled {

        background: #F5F7FA;

        color: #6C757D;

        border-color: #E5E7EB;

        cursor: not-allowed;

    }

    .form-label {

        margin-bottom: 8px;

        color: #17335C;

        font-weight: 600;

    }

    /*==================================================
    Attachment
    ==================================================*/

    .attachment-list {

        display: flex;

        flex-direction: column;

        gap: 14px;

    }

    .attachment-item {

        display: flex;

        justify-content: space-between;

        align-items: center;

        border: 1px solid #E5EDF4;

        border-radius: 14px;

        padding: 14px 18px;

        transition: .25s;

    }

    .attachment-item:hover {

        background: #F8FBFF;

    }

    .attachment-item div {

        display: flex;

        align-items: center;

        gap: 10px;

        color: #17335C;

        font-weight: 600;

    }

    .attachment-item i {

        color: #0EA47A;

        font-size: 1.25rem;

    }

    /*==================================================
    Badge
    ==================================================*/

    .badge {

        padding: 8px 16px;

        border-radius: 30px;

        font-size: .85rem;

    }

    /*==================================================
    Buttons
    ==================================================*/

    .btn-outline-main {

        border-radius: 12px;

    }

    .btn-main {

        border-radius: 12px;

    }

    .return-btn a {
        color: white;
        text-decoration: none;

    }

    .return-btn {
        border-radius: 12px;
    }

    /*==================================================
    Responsive
    ==================================================*/

    @media (max-width: 992px) {

        .page-header {

            flex-direction: column;

            align-items: flex-start !important;

            gap: 15px;

        }

    }

    @media (max-width: 768px) {

        .card-body {

            padding: 18px;

        }

        .detail-box {

            padding: 15px;

        }

        .attachment-item {

            flex-direction: column;

            align-items: flex-start;

            gap: 15px;

        }

        .attachment-item .btn {

            width: 100%;

        }

    }

    @media (max-width: 576px) {

        .page-header h2 {

            font-size: 1.35rem;

        }

        .card-header {

            padding: 16px;

        }

        .card-body {

            padding: 16px;

        }

        .form-control-custom {

            font-size: .95rem;

        }

    }

    /*==================================
Admin Management
==================================*/

    .card-header {

        display: flex;

        align-items: center;

        justify-content: space-between;

    }

    .card-header h5 {

        font-size: 1.05rem;

        font-weight: 700;

        color: #17335C;

    }

    textarea.form-control-custom {

        resize: vertical;

        min-height: 170px;

    }

    input[type="date"].form-control-custom {

        cursor: pointer;

    }

    /*==================================
    Buttons
    ==================================*/

    .btn-danger {

        border-radius: 12px;

    }

    .btn-danger:hover {

        transform: translateY(-2px);

    }

    /*==================================
    Responsive
    ==================================*/

    @media (max-width: 768px) {

        .card-body .d-flex {

            flex-direction: column;

        }

        .card-body .d-flex > div {

            width: 100%;

        }

        .card-body .btn {

            width: 100%;

        }

    }
</style>
<script src="<?= URL ?>public/js/validation.js"></script>

<?php
if (isset($_SESSION['alert-resultOperationFromAdmin'])) {

    $operationResult =
        $_SESSION['alert-resultOperationFromAdmin'] ?? null;

    if ($operationResult['type'] !== 'success') { ?>
        <script>

            myAlert.<?= $operationResult['type'] ?>(
                <?= json_encode($operationResult['title']) ?>,
                <?= json_encode($operationResult['message']) ?>
            );

        </script>

        <?php
    }
    unset($_SESSION['alert-resultOperationFromAdmin']);
    unset($_SESSION['OperationFromAdmin']);
}
?>



<?php
$mode = $data['mode'];

$disabled = ($mode == "view") ? "disabled" : "";
$readOnly = ($mode == "view") ? "readonly" : "";
$title = ($mode == "view") ? "جزییات درخواست" : "ویرایش درخواست";

if (isset($data['errors'])) {
    $errors = $data['errors'];
    ?>
    <script>
        myAlert.error('خطا' , 'لطفا فیلدهای خطادار را تصحیح کنید')
    </script>
<?php
}

if (isset($data['files']))
    $files = $data['files'];

if (isset($data['order'])) {
    $order = $data['order'];
    switch ($order['status']) {
        case 'PENDING':
            $badgeClass = 'bg-secondary';
            break;
        case 'REVIEWING':
            $badgeClass = 'bg-warning';
            break;
        case 'IN_PROGRESS':
            $badgeClass = 'bg-primary';
            break;
        case 'COMPLETED':
            $badgeClass = 'bg-success';
            break;
        case 'CANCELED':
            $badgeClass = 'bg-danger';
            break;
    }
}
?>

<title><?= $title ?></title>
<div class="admin-layout">
    <?php require "views/layout/adminPanel/sidebar.php"; ?>
    <main class="admin-content">

        <div class="container-fluid">

            <!--==================================
            Page Header
            ===================================-->

            <div class="page-header my-4 d-flex justify-content-between align-items-center">

                <div>

                    <h2>

                        جزئیات درخواست

                    </h2>

                    <p>

                        مشاهده و مدیریت اطلاعات درخواست

                    </p>

                </div>

                <a href="<?= URL ?>admin/orders"
                   class="btn btn-outline-primary me-5">

                    <i class="bi bi-arrow-right ms-2"></i>

                    بازگشت

                </a>

            </div>


            <!--==================================
            Top Card
            ===================================-->

            <div class="card shadow-sm border-0 mb-4">

                <div class="card-body">

                    <div class="row g-4">

                        <div class="col-lg-3 col-md-6">

                            <div class="detail-box">

                                <label>

                                    کد پیگیری

                                </label>

                                <div>

                                    <?= htmlspecialchars($order['tracking_code'] ?? '') ?>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-3 col-md-6">

                            <div class="detail-box">

                                <label>

                                    تاریخ ثبت

                                </label>

                                <div>

                                    <?= htmlspecialchars(
                                        Helper::jaliliDate(
                                            Helper::MiladiTojalili(
                                                date('Y-m-d', strtotime($order['submission_date'] ?? ''))
                                            )
                                        )) ?>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-3 col-md-6">

                            <div class="detail-box">

                                <label>

                                    نوع خدمت

                                </label>

                                <div>
                                    <?= htmlspecialchars(constant($order['service_type'] ?? '')) ?>

                                    <?php if (!empty($order['project_type'])): ?>
                                        - <?= htmlspecialchars(constant($order['project_type'] ?? '')) ?>
                                    <?php endif; ?>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-3 col-md-6">

                            <div class="detail-box">

                                <label>

                                    وضعیت

                                </label>

                                <span class="badge <?= $badgeClass ?>">
                                     <?php if (isset($errors['status'])) { ?>

                                         مقدار نامعتبر
                                         <?php
                                     } else {

                                         echo htmlspecialchars(constant($order['status'] ?? ''));
                                     } ?>

                            </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!--==================================
            User Info
            ===================================-->

            <div class="user-info card shadow-sm border-0 mb-4 ">

                <div class="card-header bg-white">

                    <h5>

                        اطلاعات کاربر

                    </h5>

                </div>

                <div class="card-body">

                    <div class="row g-4">

                        <div class="col-md-4">

                            <label class="form-label">

                                نام و نام خانوادگی

                            </label>

                            <input
                                    type="text"
                                    class="form-control-custom"
                                    value="<?= htmlspecialchars($order['full_name'] ?? '') ?>"
                                    readonly>

                        </div>

                        <div class="col-md-4">

                            <label class="form-label">

                                شماره تماس

                            </label>

                            <input
                                    type="text"
                                    class="form-control-custom"
                                    value="<?= htmlspecialchars($order['mobile'] ?? '') ?>"
                                    readonly>

                        </div>
                        <div class="col-md-4">
                            <label class="form-label">

                                ایمیل

                            </label>

                            <input
                                    type="text"
                                    class="form-control-custom"
                                    value="<?= htmlspecialchars($order['email'] ?? '') ?>"
                                    readonly>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">

                                رشته

                            </label>

                            <input
                                    type="text"
                                    class="form-control-custom"
                                    value="<?= htmlspecialchars($order['major'] ?? '') ?>"
                                    readonly>

                        </div>
                        <div class="col-md-6">
                            <label class="form-label">

                                مقطع

                            </label>
                            <select
                                    id="serviceSearch"
                                    class="form-control-custom"
                                    disabled
                            >
                                <option value="ASSOCIATE"
                                    <?= ($order['level'] ?? '') === 'ASSOCIATE' ? 'selected' : '' ?>>
                                    کاردانی

                                </option>


                                <option value="BACHELOR"
                                    <?= ($order['level'] ?? '') === 'BACHELOR' ? 'selected' : '' ?>>
                                    کارشناسی

                                </option>


                                <option value="MASTER"
                                    <?= ($order['level'] ?? '') === 'MASTER' ? 'selected' : '' ?>>
                                    کارشناسی ارشد

                                </option>

                                <option value="PHD"
                                    <?= ($order['level'] ?? '') === 'PHD' ? 'selected' : '' ?>>
                                    دکترا

                                </option>

                                <option value="OTHER"
                                    <?= ($order['level'] ?? '') === 'OTHER' ? 'selected' : '' ?>>
                                    سایر

                                </option>
                            </select>

                        </div>

                    </div>

                </div>

            </div>


            <!--==================================
            Project Info
            ===================================-->
            <form action="admin/orders/manageOrderByAdmin/<?= $order['id'] ?>"
                  id="manageOrderForm" method="post">
                <input type="hidden" value="<?=$order['service_type']?>" name="service_type" />
                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-header bg-white">

                        <h5>

                            اطلاعات پروژه

                        </h5>

                    </div>

                    <div class="card-body">

                        <div class="row g-4">

                            <div class="col-lg-12">

                                <label class="form-label">

                                    عنوان پروژه

                                </label>

                                <input
                                        type="text" name="title"
                                        class="form-control-custom"
                                        value="<?= htmlspecialchars($order['order_title'] ?? '') ?>"
                                    <?= $readOnly ?>
                                >

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">

                                    بودجه

                                </label>

                                <input
                                        type="number" name="first_price" min="0"
                                        class="form-control-custom"
                                        placeholder="مثلاً 3500000"
                                        value="<?=($order['first_price']!==0)  ?
                                         htmlspecialchars($order['first_price'] ?? '')
                                        :
                                            ''
                                        ?>"
                                    <?php
                                    if ($order['service_type'] !== "DEBUG")
                                        echo "readonly";
                                    ?>
                                >
                                <?php if (isset($errors['first_price'])): ?>

                                    <div class="form-error general-form-error">
                                        <?= $errors['first_price'] ?>
                                    </div>

                                <?php endif; ?>
                            </div>

                            <div class="col-md-6">

                                <label class="form-label">

                                    زمان تحویل

                                </label>

                                <input
                                        type="text" name="delivery_date"
                                        class="form-control-custom first-jalali-date"
                                        value="<?= $order['delivery_date'] !== null
                                            ? htmlspecialchars(
                                                Helper::jaliliDate(
                                                    Helper::MiladiTojalili(
                                                        date('Y-m-d', strtotime($order['delivery_date']))
                                                    )
                                                )
                                            )
                                            : null
                                        ?>"
                                        placeholder="-----"
                                    <?php
                                    if ($order['service_type'] !== "DEBUG")
                                        echo "readonly";
                                    ?> >
                                <?php if (isset($errors['delivery_date'])): ?>

                                    <div class="form-error general-form-error">
                                        <?= $errors['delivery_date'] ?>
                                    </div>

                                <?php endif; ?>

                            </div>


                        </div>

                    </div>

                </div>


                <!--==================================
                Description
                ===================================-->

                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-header bg-white">

                        <h5>

                            شرح درخواست

                        </h5>

                    </div>

                    <div class="card-body">

                <textarea
                        class="form-control-custom" name="description"
                        rows="8"
                    <?= $readOnly ?>
                ><?= htmlspecialchars($order['description'] ?? '') ?>
                </textarea>

                    </div>

                </div>


                <!--==================================
                Attachments
                ===================================-->

                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-header bg-white">

                        <h5>

                            فایل‌های پیوست

                        </h5>

                    </div>

                    <div class="card-body">

                        <div class="attachment-list">

                            <?php
                            if (!empty($files))
                                foreach ($files as $file) {
                                    ?>

                                    <div class="attachment-item">

                                        <div>
                                            <i class="bi <?= Helper::getFileIcon($file['original_name']) ?> file-icon"></i>

                                            <?= htmlspecialchars($file['original_name'] ?? '') ?>

                                        </div>

                                        <a href="<?= URL ?>admin/orders/downloadOrderFile/<?= $file['id'] ?>"
                                           class="btn btn-outline-main btn-sm">

                                            دانلود

                                        </a>

                                    </div>

                                    <?php
                                }
                            ?>
                        </div>

                    </div>

                </div>
                <!--==================================
                Admin Management
                ===================================-->

                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-header bg-white">

                        <h5>

                            مدیریت درخواست

                        </h5>

                    </div>

                    <div class="card-body">

                        <div class="row g-4">

                            <!-- Status -->

                            <div class="col-md-4">

                                <label class="form-label">

                                    وضعیت درخواست

                                </label>

                                <select name="status" id="status"
                                        class="form-control-custom"
                                    <?= $disabled ?>
                                >
                                    <option value="PENDING"
                                        <?= ($order['status'] ?? '') === 'PENDING' ? 'selected' : '' ?>>
                                        در انتظار
                                    </option>
                                    <option value="REVIEWING"
                                        <?= ($order['status'] ?? '') === 'REVIEWING' ? 'selected' : '' ?>>
                                        در حال بررسی

                                    </option>


                                    <option value="IN_PROGRESS"
                                        <?= ($order['status'] ?? '') === 'IN_PROGRESS' ? 'selected' : '' ?>>
                                        در حال انجام

                                    </option>


                                    <option value="COMPLETED"
                                        <?= ($order['status'] ?? '') === 'COMPLETED' ? 'selected' : '' ?>>
                                        تکمیل شده
                                    </option>

                                    <option value="CANCELED"
                                        <?= ($order['status'] ?? '') === 'CANCELED' ? 'selected' : '' ?>>
                                        لغو شده
                                    </option>
                                    <?php if (isset($errors['status'])): ?>
                                        <option value="" selected>
                                            مقدار نامعتبر
                                        </option>
                                    <?php endif; ?>
                                </select>
                                <?php if (isset($errors['status'])): ?>

                                    <div class="form-error general-form-error">
                                        <?= $errors['status'] ?>
                                    </div>

                                <?php endif; ?>
                            </div>

                            <!-- Expert -->

                            <div class="col-md-4">

                                <label class="form-label">

                                    کارشناس مسئول

                                </label>

                                <select
                                        class="form-control-custom"
                                    <?= $disabled ?>
                                >

                                    <option>

                                        انتخاب کارشناس...

                                    </option>

                                    <option>

                                        علی رضایی

                                    </option>

                                    <option>

                                        محمد احمدی

                                    </option>

                                    <option>

                                        سارا کریمی

                                    </option>

                                </select>

                            </div>

                            <!-- Agreed Price -->

                            <div class="col-md-4">
                                <label class="form-label">

                                    درصد پیشرفت

                                </label>

                                <select name="progress_percent"
                                        class="form-control-custom" <?= $disabled ?> >

                                    <option value="0%"
                                        <?= ($order['progress_percent'] ?? '') === '0%' ? 'selected' : '' ?>>
                                        0%
                                    </option>
                                    <option value="25%"
                                        <?= ($order['progress_percent'] ?? '') === '25%' ? 'selected' : '' ?>>
                                        25%
                                    </option>
                                    <option value="50%"
                                        <?= ($order['progress_percent'] ?? '') === '50%' ? 'selected' : '' ?>>
                                        50%
                                    </option>
                                    <option value="75%"
                                        <?= ($order['progress_percent'] ?? '') === '75%' ? 'selected' : '' ?>>
                                        75%
                                    </option>
                                    <option value="100%"
                                        <?= ($order['progress_percent'] ?? '') === '100%' ? 'selected' : '' ?>>
                                        100%
                                    </option>
                                    <?php if (isset($errors['progress_percent'])): ?>
                                        <option value="" selected>
                                            مقدار نامعتبر
                                        </option>
                                    <?php endif; ?>
                                </select>
                                <?php if (isset($errors['progress_percent'])): ?>

                                    <div class="form-error general-form-error">
                                        <?= $errors['progress_percent'] ?>
                                    </div>

                                <?php endif; ?>


                            </div>

                            <!-- Deadline -->

                            <div class="col-md-6">

                                <label class="form-label">

                                    تاریخ تحویل نهایی (پایان سفارش)

                                </label>

                                <input id="final_delivery_date"
                                       type="text" name="final_delivery_date"
                                       class="form-control-custom jalali-date"
                                       value="<?= $order['final_delivery_date'] !== null
                                           ? htmlspecialchars(
                                               Helper::jaliliDate(
                                                   Helper::MiladiTojalili(
                                                       date('Y-m-d', strtotime($order['final_delivery_date']))
                                                   )
                                               )
                                           )
                                           : null
                                       ?>"
                                       placeholder="-----"
                                    <?= $readOnly ?>
                                >
                                <?php if (isset($errors['final_delivery_date'])): ?>

                                    <div class="form-error general-form-error">
                                        <?= $errors['final_delivery_date'] ?>
                                    </div>

                                <?php endif; ?>
                            </div>

                            <!-- Progress -->

                            <div class="col-md-6">

                                <label class="form-label">

                                    قیمت توافقی (تومان)

                                </label>

                                <input
                                        type="number" name="agreed_price" min="0"
                                        class="form-control-custom"
                                        placeholder="مثلاً 3500000"
                                        value="<?=($order['agreed_price']!==0)  ?
                                            htmlspecialchars($order['agreed_price'] ?? '')
                                            :
                                            ''
                                        ?>"
                                    <?= $readOnly ?>
                                >
                                <?php if (isset($errors['agreed_price'])): ?>

                                    <div class="form-error general-form-error">
                                        <?= $errors['agreed_price'] ?>
                                    </div>

                                <?php endif; ?>
                            </div>

                            <!-- Manager Note -->

                            <div class="col-12">

                                <label class="form-label">

                                    توضیحات مدیر

                                </label>

                                <textarea
                                        rows="6" name="admin_note"
                                        class="form-control-custom"
                                        placeholder="یادداشت داخلی مدیر..."
                                    <?= $readOnly ?>
                                ><?= htmlspecialchars($order['admin_note'] ?? '') ?>
                            </textarea>

                            </div>

                        </div>

                    </div>

                </div>

                <!--==================================
                Action Buttons
                ===================================-->

                <div class="card shadow-sm border-0">

                    <div class="card-body">

                        <div class="d-flex flex-wrap justify-content-between gap-3">

                            <div class="d-flex gap-2">
                                <?php
                                if ($mode == 'edit') {
                                    ?>
                                    <button type="submit"
                                            class="btn btn-main px-4">

                                        <i class="bi bi-check-lg ms-2"></i>

                                        ذخیره تغییرات

                                    </button>
                                    <?php
                                }
                                ?>


                                <button class="btn btn-primary return-btn px-4" type="button">
                                    <a href="<?= URL ?>admin/orders">
                                        بازگشت
                                        <i class="bi bi-arrow-return-right ms-2 align-middle"></i>
                                    </a>
                                </button>
                            </div>

                        </div>

                    </div>

                </div>

            </form>
        </div>

    </main>
</div>

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const form = document.getElementById('manageOrderForm');

        form.addEventListener('submit', function (e) {
            if (!validationAdminOrderForm(form)) {

                e.preventDefault();
            }
        });
    });

    const textareas = document.querySelectorAll('textarea');

    textareas.forEach(textarea => {

        textarea.addEventListener('click', function () {

            this.setSelectionRange(0, 0);

        });

    });

    $(function () {

        $(".jalali-date").persianDatepicker({
            format: "YYYY/MM/DD",
            autoClose: true,
            initialValue: false
        });

        $(".first-jalali-date").persianDatepicker({
            format: "YYYY/MM/DD",
            autoClose: true,
            initialValue: false
        });


    });

</script>