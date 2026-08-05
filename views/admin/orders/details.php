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
<?php
$mode = $data['mode'];
$disabled = ($mode == "view") ? "disabled" : "";
$readOnly = ($mode == "view") ? "readonly" : "";
$title=($mode == "view") ? "جزییات درخواست" : "ویرایش درخواست";
?>
<title><?=$title?></title>
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

                                    UY258741

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-3 col-md-6">

                            <div class="detail-box">

                                <label>

                                    تاریخ ثبت

                                </label>

                                <div>

                                    1405/05/21

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-3 col-md-6">

                            <div class="detail-box">

                                <label>

                                    نوع خدمت

                                </label>

                                <div>

                                    پروژه برنامه نویسی

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-3 col-md-6">

                            <div class="detail-box">

                                <label>

                                    وضعیت

                                </label>

                                <span class="badge bg-warning">

                                در حال بررسی

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

                        <div class="col-md-6">

                            <label class="form-label">

                                نام و نام خانوادگی

                            </label>

                            <input
                                    type="text"
                                    class="form-control-custom"
                                    value="علی رضایی"
                                    readonly>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">

                                شماره تماس

                            </label>

                            <input
                                    type="text"
                                    class="form-control-custom"
                                    value="09123456789"
                                    readonly>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">

                                ایمیل

                            </label>

                            <input
                                    type="text"
                                    class="form-control-custom"
                                    value="test@gmail.com"
                                    readonly>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">

                                رشته

                            </label>

                            <input
                                    type="text"
                                    class="form-control-custom"
                                    value="شبکه"
                                    readonly>

                        </div>

                    </div>

                </div>

            </div>


            <!--==================================
            Project Info
            ===================================-->

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
                                    type="text"
                                    class="form-control-custom"
                                    value="طراحی فروشگاه اینترنتی"
                                <?= $readOnly ?>
                            >

                        </div>

                        <div class="col-md-4">

                            <label class="form-label">

                                بودجه

                            </label>

                            <input
                                    type="text"
                                    class="form-control-custom"
                                    value="3,000,000"
                                <?= $readOnly ?>
                            >

                        </div>

                        <div class="col-md-4">

                            <label class="form-label">

                                زمان تحویل

                            </label>

                            <input
                                    type="text"
                                    class="form-control-custom"
                                    value="7 روز"
                                <?= $readOnly ?>
                            >

                        </div>

                        <div class="col-md-4">

                            <label class="form-label">

                                مقطع

                            </label>
                            <select
                                    id="serviceSearch"
                                    class="form-control-custom"
                                <?= $disabled ?>
                            >
                                <option value="">

                                    کاردانی

                                </option>

                                <option>

                                    کارشناسی

                                </option>

                                <option>

                                    کارشناسی ارشد

                                </option>

                                <option>

                                    دکترا

                                </option>

                                <option>

                                    سایر

                                </option>


                            </select>

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
                        class="form-control-custom"
                        rows="8"
                    <?= $readOnly ?>
                >

کاربر توضیحات پروژه را اینجا نوشته است...

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

                        <div class="attachment-item">

                            <div>

                                <i class="bi bi-file-earmark-word"></i>

                                project.docx

                            </div>

                            <a href="#"
                               class="btn btn-outline-main btn-sm">

                                دانلود

                            </a>

                        </div>

                        <div class="attachment-item">

                            <div>

                                <i class="bi bi-file-earmark-pdf"></i>

                                report.pdf

                            </div>

                            <a href="#"
                               class="btn btn-outline-main btn-sm">

                                دانلود

                            </a>

                        </div>

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

                            <select
                                    class="form-control-custom"
                                <?= $disabled ?>
                            >

                                <option>

                                    در انتظار بررسی

                                </option>

                                <option>

                                    در حال انجام

                                </option>

                                <option>

                                    تکمیل شده

                                </option>

                                <option>

                                    لغو شده

                                </option>

                            </select>

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

                                قیمت توافقی (تومان)

                            </label>

                            <input
                                    type="text"
                                    class="form-control-custom"
                                    placeholder="مثلاً 3500000"
                                <?= $readOnly ?>
                            >

                        </div>

                        <!-- Deadline -->

                        <div class="col-md-6">

                            <label class="form-label">

                                تاریخ تحویل نهایی

                            </label>

                            <input
                                    type="text"
                                    class="form-control-custom jalali-date"
                                <?= $readOnly ?>
                            >

                        </div>

                        <!-- Progress -->

                        <div class="col-md-6">

                            <label class="form-label">

                                درصد پیشرفت

                            </label>

                            <select
                                    class="form-control-custom"
                                <?= $disabled ?>
                            >

                                <option>0%</option>
                                <option>10%</option>
                                <option>20%</option>
                                <option>30%</option>
                                <option>40%</option>
                                <option>50%</option>
                                <option>60%</option>
                                <option>70%</option>
                                <option>80%</option>
                                <option>90%</option>
                                <option>100%</option>

                            </select>

                        </div>

                        <!-- Manager Note -->

                        <div class="col-12">

                            <label class="form-label">

                                توضیحات مدیر

                            </label>

                            <textarea
                                    rows="6"
                                    class="form-control-custom"
                                    placeholder="یادداشت داخلی مدیر..."
                                <?= $readOnly ?>
                            ></textarea>

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
                                <button
                                        class="btn btn-main px-4">

                                    <i class="bi bi-check-lg ms-2"></i>

                                    ذخیره تغییرات

                                </button>
                                <?php
                            }
                            ?>


                            <button class="btn btn-primary return-btn px-4">
                                <a href="<?= URL ?>admin/orders">
                                    بازگشت
                                    <i class="bi bi-arrow-return-right ms-2 align-middle"></i>
                                </a>
                            </button>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </main>
</div>

<script>
    $(function () {
        $(".jalali-date").persianDatepicker({
            format: "YYYY/MM/DD",
            autoClose: true
        });
    });
</script>