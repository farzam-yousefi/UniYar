<style>

    /*==============================
Upload Box
==============================*/

    .upload-box {

        border: 2px dashed #D6DEE8;

        border-radius: 18px;

        background: #FAFCFE;

        transition: .25s;

    }

    .upload-box:hover {

        border-color: #0EA47A;

        background: #F4FCF8;

    }

    .upload-label {

        display: flex;

        flex-direction: column;

        align-items: center;

        justify-content: center;

        text-align: center;

        cursor: pointer;

        padding: 45px 20px;

        margin: 0;

    }

    .upload-label i {

        font-size: 42px;

        color: #0EA47A;

        margin-bottom: 18px;

    }

    .upload-label h5 {

        color: #17335C;

        font-weight: 700;

        margin-bottom: 8px;

    }

    .upload-label p {

        color: #6B7280;

        margin-bottom: 10px;

    }

    .upload-label small {

        color: #9AA5B1;

        line-height: 1.9;

    }

    /*==============================
    Selected Files
    ==============================*/
    .selected-files {

        margin-top: 20px;

    }

    .file-item {

        display: flex;

        justify-content: space-between;

        align-items: center;

        padding: 14px 18px;

        margin-bottom: 12px;

        border: 1px solid #E8ECEF;

        border-radius: 14px;

        background: #F8FBFF;

    }

    .file-info {

        display: flex;

        align-items: center;

        gap: 14px;

    }

    .file-icon {

        font-size: 28px;

        color: #0EA47A;

    }

    .file-name {

        color: #17335C;

        font-weight: 600;

        margin-bottom: 4px;

    }

    .file-size {

        color: #7A869A;

        font-size: .88rem;

    }

    .file-remove {

        width: 38px;

        height: 38px;

        border: none;

        border-radius: 50%;

        background: #FFECEC;

        color: #DC3545;

        transition: .2s;

    }

    .file-remove:hover {

        background: #DC3545;

        color: #fff;

    }

    .file-remove i {

        pointer-events: none;

    }

    /*==============================
    rules
    ==============================*/

    .rules-link {

        margin-right: 12px;

        color: #0EA47A;

        text-decoration: none;

        font-weight: 600;

    }

    .rules-link:hover {

        text-decoration: underline;

    }

    .modal-content {

        border-radius: 22px;

        border: none;

    }

    .modal-header {

        border-bottom: 1px solid #E8ECEF;

    }

    .modal-title {

        color: #17335C;

        font-weight: 700;

    }

    .modal-body {

        line-height: 2.2;

        color: #5E6E82;

    }

    .modal-body h6 {

        color: #17335C;

        margin-bottom: 15px;

    }

    .modal-body ul {

        padding-right: 20px;

    }

    .btn-main:disabled {

        opacity: .45;

        cursor: not-allowed;

    }

    .form-check-input {

        width: 1.2rem;

        height: 1.2rem;

        border: 2px solid #9AA5B1;

    }

    .form-check-input:checked {

        background-color: #0EA47A;

        border-color: #0EA47A;

    }

    .form-check-input:focus {

        box-shadow: 0 0 0 .15rem rgba(14, 164, 122, .18);

    }

    /*==================================
Success Modal
===================================*/

    .success-modal {

        border: none;

        border-radius: 24px;

        overflow: hidden;

    }

    .success-modal .modal-body {

        padding: 45px 35px;

        text-align: center;

    }

    .success-icon {

        width: 90px;

        height: 90px;

        margin: 0 auto 25px;

        border-radius: 50%;

        background: #ECFDF5;

        display: flex;

        align-items: center;

        justify-content: center;

    }

    .success-icon i {

        font-size: 48px;

        color: #0EA47A;

    }

    .success-modal h3 {

        color: #17335C;

        font-weight: 700;

        margin-bottom: 15px;

    }

    .success-modal p {

        color: #6B7280;

        margin-bottom: 30px;

    }

    .tracking-box {

        background: #F8FBFF;

        border: 1px solid #E8ECEF;

        border-radius: 18px;

        padding: 18px;

    }

    .tracking-box small {

        display: block;

        color: #7A869A;

        margin-bottom: 10px;

    }

    .tracking-code {

        display: flex;

        justify-content: center;

        align-items: center;

        gap: 15px;

    }

    .tracking-code span {

        font-size: 24px;

        font-weight: 700;

        color: #17335C;

        letter-spacing: 2px;

    }

    .copy-btn {

        width: 42px;

        height: 42px;

        border: none;

        border-radius: 12px;

        background: #0EA47A;

        color: #fff;

        transition: .25s;

    }

    .copy-btn:hover {

        background: #0B8A67;

    }

    .alert-light {

        background: #F8FBFF;

        border: 1px solid #E8ECEF;

        border-radius: 16px;

        color: #5E6E82;

    }

    /*==================================
Success Animation
===================================*/

    @keyframes successPop {

        0% {

            transform: scale(.4);

            opacity: 0;

        }

        60% {

            transform: scale(1.15);

        }

        80% {

            transform: scale(.95);

        }

        100% {

            transform: scale(1);

            opacity: 1;

        }

    }

    .success-icon {

        animation: successPop .65s ease-out;

    }

    @keyframes fadeUp {

        from {

            opacity: 0;

            transform: translateY(18px);

        }

        to {

            opacity: 1;

            transform: none;

        }

    }

    .tracking-box {

        animation: fadeUp .55s ease .35s both;

    }

    .copy-btn.copied {

        background: #28A745;

    }

    .tracking-code span {

        font-size: 24px;

        letter-spacing: 3px;

        font-weight: 700;

        color: #17335C;

        user-select: all;

    }

    .success-modal {

        transform: scale(.95);

        transition: .25s;

    }

    .modal.show .success-modal {

        transform: scale(1);

    }
</style>

<?php
if (isset($_SESSION['alert-resultOperationFromSite'])) {

    $operation =
        $_SESSION['operationFromSite'] ?? '';

    $operationResult =
        $_SESSION['alert-resultOperationFromSite'] ?? null;

    if (!($operation === 'addOrder' &&
        $operationResult['type'] === 'success')) { ?>
        <script>

            myAlert.<?= $operationResult['type'] ?>(
                <?= json_encode($operationResult['title']) ?>,
                <?= json_encode($operationResult['message']) ?>
            );

        </script>

        <?php
    }
    unset($_SESSION['alert-resultOperationFromSite']);
    unset($_SESSION['OperationFromSite']);
} ?>
<pre>

<?php

$mode = $data['mode'];
if (isset($data['service_type']))
    $service_type = $data['service_type'];
$hasErr = false;
if (isset($data['order'])) {

    $order = $data['order'];
    $hasErr = $data['hasErr'] ?? false;
    if (isset($order['delivery_date']))
        $delivery_date = Helper::jaliliDate(Helper::MiladiTojalili($order['delivery_date'], '-'));
}
if (isset($data['errors']))
    $errors = $data['errors'];
else
    $errors = [];
$hasError = !empty($errors) || $hasErr;

?>
    </pre>
<form action="<?= URL ?>order/action/<?= $mode ?>" method="post"
      novalidate class="order-form"
      enctype="multipart/form-data" data-validate id="addEditOrderForm">

    <input type="hidden" name="orderId" value="<?= $order['order_id'] ?? '' ?>">
    <input type="hidden" name="customerId" value="<?= $order['customer_id'] ?? '' ?>">

    <!-- اطلاعات شخصی -->

    <div class="form-section">

        <h3 class="form-section-title">

            اطلاعات شخصی

        </h3>

        <div class="row g-4">

            <div class="col-lg-4 col-md-6">

                <div class="form-group">

                    <label>نام و نام خانوادگی *</label>
                    <input
                            data-required="نام و نام خانوادگی"
                            data-action="پر کنید"
                            type="text"
                            name="full_name"
                            class="form-control-custom"
                            value="<?= htmlspecialchars($order['full_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                            placeholder="مثلاً: علی رضایی">

                    <?php if (isset($errors['full_name'])): ?>

                        <div class="form-error general-form-error">
                            <?= $errors['full_name'] ?>
                        </div>

                    <?php endif; ?>

                </div>

            </div>

            <div class="col-lg-4 col-md-6">

                <div class="form-group">

                    <label>شماره موبایل *</label>
                    <input
                            data-required="شماره موبایل"
                            data-action="پر کنید"
                            type="text"
                            name="mobile" id="mobile"
                            minlength="11" maxlength="11"
                            class="form-control-custom"
                            value="<?= htmlspecialchars($order['mobile'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                            placeholder="09xxxxxxxxx">

                    <?php if (isset($errors['mobile'])): ?>

                        <div class="form-error general-form-error">
                            <?= $errors['mobile'] ?>
                        </div>

                    <?php endif; ?>

                </div>

            </div>

            <div class="col-lg-4 col-md-6">

                <div class="form-group">

                    <label>ایمیل</label>
                    <input
                            type="email"
                            name="email"
                            id="email"
                            value="<?= htmlspecialchars($order['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                            class="form-control-custom"
                            placeholder="example@email.com">
                </div>

            </div>

        </div>

    </div>


    <!-- اطلاعات درخواست -->

    <div class="form-section">

        <h3 class="form-section-title">

            اطلاعات درخواست

        </h3>

        <div class="row g-4">

            <div class="col-lg-4 col-md-6">

                <div class="form-group">

                    <label>نوع خدمت *</label>

                    <div class="d-flex gap-2">

                        <!-- نوع خدمت -->
                        <select
                                id="service_id"
                                name="service_id"
                                class="form-select-custom flex-grow-1"
                                required
                                data-required="نوع خدمت"
                                data-action="انتخاب کنید"
                                data-place="grandparent">

                            <option value="" selected disabled>
                                لطفا انتخاب کنید
                            </option>

                            <option value="PROJECT"
                                <?= ($order['service_id'] ?? '') === 'PROJECT' ? 'selected' : '' ?>>
                                انجام پروژه
                            </option>

                            <option value="DEBUG"
                                <?= ($order['service_id'] ?? '') === 'DEBUG' ? 'selected' : '' ?>>
                                رفع اشکال
                            </option>

                            <option value="TEACH"
                                <?= ($order['service_id'] ?? '') === 'TEACH' ? 'selected' : '' ?>>
                                تدریس خصوصی
                            </option>

                            <option value="CONSULT"
                                <?= ($order['service_id'] ?? '') === 'CONSULT' ? 'selected' : '' ?>>
                                مشاوره
                            </option>

                        </select>
                        <!-- for backend validation -->
                        <?php if (isset($errors['service_id'])): ?>

                            <div class="form-error general-form-error">
                                <?= $errors['service_id'] ?>
                            </div>

                        <?php endif; ?>

                        <!-- نوع پروژه -->
                        <select
                                id="project_category"
                                name="project_category"
                                class="form-select-custom d-none ignore"
                                data-place="grandparent">

                            <option value="" selected disabled>
                                نوع پروژه
                            </option>

                            <option value="WEBSITE"
                                <?= ($order['project_category'] ?? '') === 'WEBSITE' ? 'selected' : '' ?>>
                                وب‌سایت
                            </option>

                            <option value="PROGRAMMING"
                                <?= ($order['project_category'] ?? '') === 'PROGRAMMING' ? 'selected' : '' ?>>
                                برنامه‌نویسی
                            </option>

                            <option value="DATABASE"
                                <?= ($order['project_category'] ?? '') === 'DATABASE' ? 'selected' : '' ?>>
                                پایگاه داده
                            </option>

                            <option value="RESEARCH"
                                <?= ($order['project_category'] ?? '') === 'RESEARCH' ? 'selected' : '' ?>>
                                تحقیقاتی
                            </option>

                        </select>
                        <!-- for backend validation -->
                        <?php if (isset($errors['project_category'])): ?>

                            <div class="form-error general-form-error">
                                <?= $errors['project_category'] ?>
                            </div>

                        <?php endif; ?>
                        <!-- for backend validation -->
                        <!-- نحوه برگزاری -->
                        <select
                                id="teaching_type"
                                name="teaching_type"
                                class="form-select-custom d-none ignore"
                                data-place="grandparent">

                            <option value="" selected disabled>
                                نحوه برگزاری
                            </option>

                            <option value="in_person"
                                <?= ($order['teaching_type'] ?? '') === 'in_person' ? 'selected' : '' ?>
                            >
                                حضوری
                            </option>

                            <option value="online"
                                <?= ($order['teaching_type'] ?? '') === 'online' ? 'selected' : '' ?>
                            >
                                آنلاین
                            </option>

                            <option value="agreement"
                                <?= ($order['teaching_type'] ?? '') === 'agreement' ? 'selected' : '' ?>
                            >
                                توافقی
                            </option>

                        </select>
                        <?php if (isset($errors['teaching_type'])): ?>

                            <div class="form-error general-form-error">
                                <?= $errors['teaching_type'] ?>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>

            </div>


            <div class="col-lg-4 col-md-6">

                <div class="form-group">

                    <label>رشته</label>

                    <input
                            type="text"
                            name="major"
                            class="form-control-custom"
                            placeholder="مثلاً: فن آوری اطلاعات"
                            value="<?= htmlspecialchars($order['major'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                    >
                </div>

            </div>

            <div class="col-lg-4 col-md-6">

                <div class="form-group">

                    <label>مقطع *</label>
                    <select name="level" class="form-select-custom" required
                            data-required="مقطع"
                            data-action="انتخاب کنید">
                        <option value="" selected disabled>

                            لطفا انتخاب کنید

                        </option>

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

                    <?php if (isset($errors['level'])): ?>

                        <div class="form-error general-form-error">
                            <?= $errors['level'] ?>
                        </div>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>


    <!-- جزئیات -->

    <div class="form-section">

        <h3 class="form-section-title">

            جزئیات درخواست

        </h3>

        <div class="row g-4">

            <div class="col-12">

                <div class="form-group">

                    <label>عنوان درخواست *</label>
                    <input
                            data-required="عنوان درخواست"
                            data-action="پر کنید"
                            type="text"
                            name="title"
                            class="form-control-custom"
                            value="<?= htmlspecialchars($order['title'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                            placeholder="عنوان پروژه یا درخواست">

                    <?php if (isset($errors['title'])): ?>

                        <div class="form-error general-form-error">
                            <?= $errors['title'] ?>
                        </div>

                    <?php endif; ?>

                </div>

            </div>

            <div class="col-12">

                <div class="form-group">

                    <label>توضیحات *</label>
                    <textarea data-required="توضیحات"
                              data-action="پر کنید"
                              name="description"
                              rows="7"
                              class="form-control-custom"
                              placeholder="جزئیات درخواست خود را بنویسید..."><?= htmlspecialchars($order['description'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                            </textarea>
                    <?php if (isset($errors['description'])): ?>

                        <div class="form-error general-form-error">
                            <?= $errors['description'] ?>
                        </div>

                    <?php endif; ?>


                </div>

            </div>


            <div id="service-specific-fields">

                <!-- =========================
                     پروژه
                ========================== -->
                <div id="project-fields" class="service-fields d-none">

                    <div class="row g-4">

                        <!-- زمان تحویل -->

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">

                                <label>زمان تحویل *</label>
                                <input type="text" readonly
                                       id="delivery_date"
                                       name="delivery_date"
                                       class="form-control-custom validation-required jalali-date date"
                                       value="<?= $delivery_date ?? '' ?>"
                                       placeholder="انتخاب تاریخ تحویل">

                                <?php if (isset($errors['delivery_date'])): ?>

                                    <div class="form-error">
                                        <?= $errors['delivery_date'] ?>
                                    </div>

                                <?php endif; ?>

                            </div>


                        </div>


                        <!-- بودجه -->
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">

                                <label>بودجه تقریبی(تومان)</label>
                                <input
                                        type="number"
                                        id="first_price"
                                        name="first_price"
                                        value="<?= htmlspecialchars($order['first_price'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                        class="form-control-custom"
                                        placeholder="مثلاً 5000000"
                                >

                            </div>
                        </div>


                        <!-- فایل -->
                        <div class="col-12">

                            <div class="form-group">

                                <label>

                                    فایل‌های پروژه

                                </label>

                                <div class="upload-box">

                                    <input
                                            type="file"
                                            id="projectFiles"
                                            name="projectFiles[]"
                                            multiple
                                            hidden
                                            class="form-control">

                                    <label
                                            class="upload-label"
                                            for="projectFiles">

                                        <i class="bi bi-cloud-arrow-up"></i>

                                        <h5>

                                            فایل‌های خود را اینجا انتخاب کنید

                                        </h5>

                                        <p>

                                            یا روی این قسمت کلیک کنید

                                        </p>

                                        <small>

                                            PDF • Word • ZIP • Image

                                            <br>

                                            حداکثر 40MB برای هر فایل

                                        </small>

                                    </label>

                                </div>

                                <div
                                        id="projectSelectedFiles"
                                        class="selected-files">

                                </div>
                                <?php if (!empty($errors['file'])): ?>

                                    <div class="form-error">

                                        <ul>
                                            <?php foreach ($errors['file'] as $error): ?>

                                                <li>
                                                    <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
                                                </li>

                                            <?php endforeach; ?>
                                        </ul>

                                    </div>

                                <?php endif; ?>


                            </div>

                        </div>

                    </div>

                </div>


                <!-- =========================
                     رفع اشکال
                ========================== -->
                <div id="debugging-fields" class="service-fields d-none">

                    <div class="col-12">

                        <div class="form-group">

                            <label>

                                فایل‌های پروژه

                            </label>

                            <div class="upload-box">

                                <input
                                        type="file"
                                        id="debugFiles"
                                        name="debugFiles[]"
                                        multiple
                                        hidden
                                        class="form-control">

                                <label
                                        class="upload-label"
                                        for="debugFiles">

                                    <i class="bi bi-cloud-arrow-up"></i>

                                    <h5>

                                        فایل‌های خود را اینجا انتخاب کنید

                                    </h5>

                                    <p>

                                        یا روی این قسمت کلیک کنید

                                    </p>

                                    <small>

                                        PDF • Word • ZIP • Image

                                        <br>

                                        حداکثر 30MB برای هر فایل

                                    </small>

                                </label>

                            </div>

                            <div
                                    id="debugSelectedFiles"
                                    class="selected-files">

                            </div>
                            <?php if (isset($errors['file'])): ?>

                                <div class="form-error">
                                    <ul>
                                        <?php
                                        foreach ($errors['file'] as $err) {
                                            ?>

                                            <li><?= $err ?></li>

                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>

                            <?php endif; ?>


                        </div>

                    </div>
                </div>


                <!-- =========================
                     مشاوره
                ========================== -->
                <div id="consulting-fields" class="service-fields d-none">

                    <!-- عمداً خالی -->

                </div>

            </div>

        </div>

    </div>

    <?php
    if ($data['mode'] == "add") {
        ?>

        <div class="form-check ">

            <input
                    class="form-check-input fw-bold"
                    type="checkbox"
                    id="acceptRules">

            <label
                    class="form-check-label"
                    for="acceptRules">

                قوانین و مقررات را مطالعه کرده‌ام.

            </label>

            <a href="#"
               data-bs-toggle="modal"
               data-bs-target="#rulesModal"
               class="rules-link">

                مطالعه قوانین

            </a>

        </div>
        <div class="flex text-center mt-4">
            <button
                    id="submitOrderBtn" type="submit"
                    class="btn btn-main px-5 mt-lg-2"
                    disabled>

                ثبت درخواست

            </button>
            <a class="nonLink" href="service">
                <button
                        id="cancelOrderChangeBtn" type="button"
                        class="btn btn-main-cancel px-5 mt-lg-2" onclick=""
                >

                    انصراف
                </button>
            </a>
        </div>
        <?php
    }
    if ($data['mode'] == "edit") {
        ?>
        <div class="flex text-center">
            <button
                    id="saveOrderChangeBtn" type="submit"
                    class="btn btn-main px-5 mt-lg-2"
            >

                ذخیره

            </button>
            <a class="nonLink" href="order">
                <button
                        id="cancelOrderChangeBtn" type="button"
                        class="btn btn-main-cancel px-5 mt-lg-2" onclick=""
                >

                    انصراف
                </button>
            </a>
        </div>
        <?php
    }
    ?>
    <input
            type="hidden"
            name="deleted_files"
            id="deletedFiles"
            value="[]">
</form>

<!--==========================
RULES MODAL
===========================-->
<div class="modal fade"
     id="rulesModal"
     tabindex="-1">

    <div class="modal-dialog modal-lg modal-dialog-scrollable">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    قوانین و مقررات UniYar

                </h5>

                <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <h6>ثبت درخواست</h6>

                <ul>

                    <li>اطلاعات وارد شده باید صحیح و واقعی باشد.</li>

                    <li>مسئولیت صحت فایل‌ها و توضیحات بر عهده کاربر است.</li>

                    <li>هزینه نهایی پس از بررسی درخواست اعلام می‌شود.</li>

                    <li>زمان تحویل پس از توافق نهایی مشخص خواهد شد.</li>

                    <li>UniYar متعهد به حفظ محرمانگی اطلاعات کاربران است.</li>

                </ul>

                <hr>

                <h6>حفظ حریم خصوصی</h6>

                <ul>

                    <li>اطلاعات تماس کاربران محرمانه باقی می‌ماند.</li>

                    <li>فایل‌های ارسالی فقط برای انجام همان درخواست استفاده می‌شوند.</li>

                    <li>اطلاعات کاربران در اختیار شخص ثالث قرار نخواهد گرفت.</li>

                </ul>

            </div>

        </div>

    </div>

</div>

<!--==================================
Success Modal
===================================-->

<div class="modal fade"
     id="successRequestModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content success-modal">

            <div class="modal-body">

                <div class="success-icon">

                    <i class="bi bi-check-circle-fill"></i>

                </div>

                <h3>

                    درخواست شما با موفقیت ثبت شد.

                </h3>

                <p>

                    کارشناسان UniYar در اولین فرصت درخواست شما را بررسی خواهند کرد.

                </p>

                <div class="tracking-box">

                    <small>

                        کد پیگیری

                    </small>

                    <div class="tracking-code">

                        <span id="modalTrackingCode">

                        </span>

                        <button
                                id="copyTracking"
                                class="copy-btn"
                                type="button">

                            <i class="bi bi-copy"></i>

                        </button>

                    </div>

                </div>

                <div class="alert alert-light mt-4">

                    لطفاً این کد را ذخیره کنید.

                    <br>

                    از طریق دکمه
                    <strong>«پیگیری درخواست»</strong>
                    می‌توانید وضعیت درخواست خود را مشاهده کنید.

                </div>

                <div class="mt-4">

                    <button
                            class="btn btn-main px-5"
                            data-bs-dismiss="modal">

                        متوجه شدم

                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

<!--//**********************************8-->
<script>
    $(function () {
        // transfer data from php to js
        let mode = "<?= $mode ?>";
        let hasError = "<?= $hasError ?>";
        console.log(hasError);

        let initialVal = null;
        if ((mode === "edit") || hasError)
            initialVal = false;
        else
            initialVal = true;

        $(".jalali-date").persianDatepicker({
            format: "YYYY/MM/DD",
            autoClose: true,
            initialValue: initialVal

        });
    });
    const checkbox = document.getElementById("acceptRules");
    const submitBtn = document.getElementById("submitOrderBtn");

    if (checkbox && submitBtn) {

        checkbox.addEventListener("change", function () {

            submitBtn.disabled = !this.checked;

        });

    }


    /* ==================================================
    FILE UPLOAD
    ================================================== */


    /*
    ==================================================
    DOM Elements
    ==================================================
    */

    const projectFilesInput =
        document.getElementById("projectFiles");

    const debugFilesInput =
        document.getElementById("debugFiles");

    const projectFilesList =
        document.getElementById("projectSelectedFiles");

    const debugFilesList =
        document.getElementById("debugSelectedFiles");

    const serviceSelect =
        document.getElementById("service_id");

    const deletedFilesInput =
        document.getElementById("deletedFiles");


    /*
    ==================================================
    Constants
    ==================================================
    */

    const MAX_FILE_SIZE =
        40 * 1024 * 1024;


    /*
    ==================================================
    File State
    ==================================================
    */

    /*
        Files already stored on server
    */
    let existingFiles = [];


    /*
        New files selected by user
    */
    let selectedFiles = [];


    /*
        Existing files removed by user
    */
    let deletedExistingFiles = [];


    /*
    ==================================================
    Get File List According To Input
    ==================================================
    */

    function getFileList(input) {

        if (input === projectFilesInput) {
            return projectFilesList;
        }

        if (input === debugFilesInput) {
            return debugFilesList;
        }

        return null;
    }


    /*
    ==================================================
    Get Current Input
    ==================================================
    */

    function getCurrentFileInput() {

        if (!serviceSelect) {
            return null;
        }

        const service =
            serviceSelect.value;

        if (service === "PROJECT") {
            return projectFilesInput;
        }

        if (service === "DEBUG") {
            return debugFilesInput;
        }

        return null;
    }


    /*
    ==================================================
    Get Current File List
    ==================================================
    */

    function getCurrentFileList() {

        if (!serviceSelect) {
            return null;
        }

        const service =
            serviceSelect.value;

        if (service === "PROJECT") {
            return projectFilesList;
        }

        if (service === "DEBUG") {
            return debugFilesList;
        }

        return null;
    }


    /*
    ==================================================
    Update Input Files
    ==================================================
    */

    /*
        IMPORTANT:

        Only NEW files are placed inside
        <input type="file">.

        Existing server files must NEVER be
        placed inside input.files.
    */

    function updateInputFiles(input) {

        if (!input) {
            return;
        }

        const dataTransfer =
            new DataTransfer();

        selectedFiles.forEach(file => {

            dataTransfer.items.add(file);

        });

        input.files =
            dataTransfer.files;
    }


    /*
    ==================================================
    Get File Icon
    ==================================================
    */

    function getFileIcon(filename) {

        const ext =
            filename
                .split(".")
                .pop()
                .toLowerCase();

        if (ext === "pdf") {
            return "bi-file-earmark-pdf";
        }

        if (["doc", "docx"].includes(ext)) {
            return "bi-file-earmark-word";
        }

        if (["xls", "xlsx"].includes(ext)) {
            return "bi-file-earmark-excel";
        }

        if (["zip", "rar", "7z"].includes(ext)) {
            return "bi-file-earmark-zip";
        }

        if (
            ["png", "jpg", "jpeg", "gif", "webp"]
                .includes(ext)
        ) {
            return "bi-file-earmark-image";
        }

        if (
            ["txt", "csv"]
                .includes(ext)
        ) {
            return "bi-file-earmark-text";
        }

        return "bi-file-earmark";
    }


    /*
    ==================================================
    Create Existing File Element
    ==================================================
    */

    function createExistingFileElement(
        file,
        index
    ) {

        const item =
            document.createElement("div");

        item.className =
            "file-item existing-file";

        item.dataset.filename =
            file.original_name;


        /*
        ------------------------------------------
        File Info
        ------------------------------------------
        */

        const fileInfo =
            document.createElement("div");

        fileInfo.className =
            "file-info";


        /*
        Icon
        */

        const icon =
            document.createElement("i");

        icon.className =
            `bi ${getFileIcon(file.original_name)} file-icon`;


        /*
        Details
        */

        const details =
            document.createElement("div");


        const fileName =
            document.createElement("div");

        fileName.className =
            "file-name";

        /*
            textContent is intentional.
            Do not use innerHTML for filename.
        */

        fileName.textContent =
            file.original_name;


        /*
        Existing file label
        */

        const fileStatus =
            document.createElement("div");

        fileStatus.className =
            "file-size";

        fileStatus.textContent =
            "فایل موجود";


        details.appendChild(fileName);
        details.appendChild(fileStatus);


        fileInfo.appendChild(icon);
        fileInfo.appendChild(details);


        /*
        ------------------------------------------
        Remove Button
        ------------------------------------------
        */

        const removeButton =
            document.createElement("button");

        removeButton.type =
            "button";

        removeButton.className =
            "file-remove existing-file-remove";

        removeButton.dataset.fileId =
            file.file_id;


        const removeIcon =
            document.createElement("i");

        removeIcon.className =
            "bi bi-x-lg";


        removeButton.appendChild(
            removeIcon
        );


        /*
        ------------------------------------------
        Build Item
        ------------------------------------------
        */

        item.appendChild(fileInfo);

        item.appendChild(removeButton);

        return item;
    }


    /*
    ==================================================
    Create New File Element
    ==================================================
    */

    function createSelectedFileElement(
        file,
        index
    ) {

        const item =
            document.createElement("div");

        item.className =
            "file-item new-file";


        /*
        ------------------------------------------
        File Info
        ------------------------------------------
        */

        const fileInfo =
            document.createElement("div");

        fileInfo.className =
            "file-info";


        /*
        Icon
        */

        const icon =
            document.createElement("i");

        icon.className =
            `bi ${getFileIcon(file.name)} file-icon`;


        /*
        Details
        */

        const details =
            document.createElement("div");


        const fileName =
            document.createElement("div");

        fileName.className =
            "file-name";

        fileName.textContent =
            file.name;


        const fileSize =
            document.createElement("div");

        fileSize.className =
            "file-size";

        fileSize.textContent =
            `${(
                file.size / 1024 / 1024
            ).toFixed(2)} MB`;


        details.appendChild(fileName);
        details.appendChild(fileSize);


        fileInfo.appendChild(icon);
        fileInfo.appendChild(details);


        /*
        ------------------------------------------
        Remove Button
        ------------------------------------------
        */

        const removeButton =
            document.createElement("button");

        removeButton.type =
            "button";

        removeButton.className =
            "file-remove new-file-remove";

        removeButton.dataset.index =
            index;


        const removeIcon =
            document.createElement("i");

        removeIcon.className =
            "bi bi-x-lg";


        removeButton.appendChild(
            removeIcon
        );


        /*
        ------------------------------------------
        Build Item
        ------------------------------------------
        */

        item.appendChild(fileInfo);

        item.appendChild(removeButton);

        return item;
    }


    /*
    ==================================================
    Render Files
    ==================================================
    */

    function renderFiles(list) {

        if (!list) {
            return;
        }

        list.innerHTML = "";


        /*
        ------------------------------------------
        Existing Files
        ------------------------------------------
        */

        existingFiles.forEach(
            (file, index) => {

                /*
                    If this file has already been
                    marked as deleted, don't render it.
                */

                if (
                    deletedExistingFiles.includes(
                        Number(file.file_id)
                    )
                ) {
                    return;
                }

                const item =
                    createExistingFileElement(
                        file,
                        index
                    );

                list.appendChild(item);
            }
        );


        /*
        ------------------------------------------
        New Selected Files
        ------------------------------------------
        */

        selectedFiles.forEach(
            (file, index) => {

                const item =
                    createSelectedFileElement(
                        file,
                        index
                    );

                list.appendChild(item);
            }
        );
    }


    /*
    ==================================================
    Handle File Change
    ==================================================
    */

    function handleFileChange(event) {

        const input =
            event.currentTarget;

        const list =
            getFileList(input);


        if (!input || !list) {
            return;
        }


        const newFiles =
            Array.from(input.files);


        newFiles.forEach(file => {


            /*
            --------------------------------------
            File Size
            --------------------------------------
            */

            if (file.size > MAX_FILE_SIZE) {

                myAlert.error(
                    "خطا",
                    "حجم مجاز هر فایل حداکثر 40 مگا بایت است."
                );

                return;
            }


            /*
            --------------------------------------
            Duplicate
            --------------------------------------
            */

            const exists =
                selectedFiles.some(
                    existingFile =>

                        existingFile.name ===
                        file.name &&

                        existingFile.size ===
                        file.size &&

                        existingFile.lastModified ===
                        file.lastModified
                );


            if (!exists) {

                selectedFiles.push(file);

            }

        });


        /*
        --------------------------------------
        Rebuild Input
        --------------------------------------
        */

        updateInputFiles(input);


        /*
        --------------------------------------
        Render
        --------------------------------------
        */

        renderFiles(list);
    }


    /*
    ==================================================
    Register File Inputs
    ==================================================
    */

    if (projectFilesInput) {

        projectFilesInput.addEventListener(
            "change",
            handleFileChange
        );

    }


    if (debugFilesInput) {

        debugFilesInput.addEventListener(
            "change",
            handleFileChange
        );

    }


    /*
    ==================================================
    Remove Existing File
    ==================================================
    */

    function handleRemoveExistingFile(button) {

        const fileId =
            Number(button.dataset.fileId);

        if (!fileId) {
            return;
        }


        /*
        ------------------------------------------
        Add file ID to deleted list
        ------------------------------------------
        */

        if (
            !deletedExistingFiles.includes(fileId)
        ) {

            deletedExistingFiles.push(fileId);

        }


        /*
        ------------------------------------------
        Update hidden input
        ------------------------------------------
        */

        updateDeletedFilesInput();


        /*
        ------------------------------------------
        Render
        ------------------------------------------
        */

        const list =
            getCurrentFileList();

        renderFiles(list);
    }

    /*
    ==================================================
    Remove New File
    ==================================================
    */

    function handleRemoveNewFile(button) {

        const index =
            Number(button.dataset.index);


        if (
            Number.isNaN(index) ||
            index < 0 ||
            index >= selectedFiles.length
        ) {
            return;
        }


        /*
        ------------------------------------------
        Remove From Array
        ------------------------------------------
        */

        selectedFiles.splice(
            index,
            1
        );


        /*
        ------------------------------------------
        Update Input
        ------------------------------------------
        */

        const input =
            getCurrentFileInput();

        updateInputFiles(input);


        /*
        ------------------------------------------
        Render
        ------------------------------------------
        */

        const list =
            getCurrentFileList();

        renderFiles(list);
    }


    /*
    ==================================================
    File Remove Event
    ==================================================
    */

    function handleRemoveFile(event) {

        const button =
            event.target.closest(
                ".file-remove"
            );


        if (!button) {
            return;
        }


        /*
        Existing server file
        */

        if (
            button.classList.contains(
                "existing-file-remove"
            )
        ) {

            handleRemoveExistingFile(
                button
            );

            return;
        }


        /*
        New selected file
        */

        if (
            button.classList.contains(
                "new-file-remove"
            )
        ) {

            handleRemoveNewFile(
                button
            );

        }
    }


    /*
    ==================================================
    Register File Lists
    ==================================================
    */

    if (projectFilesList) {

        projectFilesList.addEventListener(
            "click",
            handleRemoveFile
        );

    }


    if (debugFilesList) {

        debugFilesList.addEventListener(
            "click",
            handleRemoveFile
        );

    }


    /*
    ==================================================
    Update Deleted Files Input
    ==================================================
    */

    function updateDeletedFilesInput() {

        if (!deletedFilesInput) {
            return;
        }

        deletedFilesInput.value =
            JSON.stringify(
                deletedExistingFiles
            );
    }


    /*
    ==================================================
    Clear File State
    ==================================================
    */

    function clearFileState() {

        existingFiles = [];

        selectedFiles = [];

        deletedExistingFiles = [];


        /*
        ------------------------------------------
        Clear Inputs
        ------------------------------------------
        */

        if (projectFilesInput) {
            projectFilesInput.value = "";
        }

        if (debugFilesInput) {
            debugFilesInput.value = "";
        }


        /*
        ------------------------------------------
        Clear Lists
        ------------------------------------------
        */

        if (projectFilesList) {
            projectFilesList.innerHTML = "";
        }

        if (debugFilesList) {
            debugFilesList.innerHTML = "";
        }


        /*
        ------------------------------------------
        Clear Deleted Files
        ------------------------------------------
        */

        updateDeletedFilesInput();
    }


    /*
    ==================================================
    Service Change
    ==================================================
    */

    if (serviceSelect) {

        serviceSelect.addEventListener(
            "change",
            function () {

                clearFileState();

            }
        );

    }


    /*
    ==================================================
    Initialize Existing Files
    ==================================================
    */

    /*
        This function is called from PHP
        when editing an existing order.
    */

    function initializeExistingFiles(
        files,
        service
    ) {

        /*
        ------------------------------------------
        Reset Existing State
        ------------------------------------------
        */

        existingFiles =
            Array.isArray(files)
                ? files
                : [];

        deletedExistingFiles = [];

        updateDeletedFilesInput();


        /*
        ------------------------------------------
        Set Service
        ------------------------------------------
        */

        if (
            serviceSelect &&
            service
        ) {

            serviceSelect.value =
                service;

        }


        /*
        ------------------------------------------
        Find Correct List
        ------------------------------------------
        */

        const list =
            service === "PROJECT"
                ? projectFilesList
                : service === "DEBUG"
                ? debugFilesList
                : null;


        if (!list) {
            return;
        }


        /*
        ------------------------------------------
        Render
        ------------------------------------------
        */

        renderFiles(list);
    }

    <?php if (isset($order)): ?>

    initializeExistingFiles(
        <?= json_encode(
            $order['files'] ?? [],
            JSON_UNESCAPED_UNICODE
        ) ?>,
        <?= json_encode(
            $order['service_id'] ?? '',
            JSON_UNESCAPED_UNICODE
        ) ?>
    );

    <?php endif; ?>
    /*==========================
    // success modal actions//open modal
    ==========================*/
    $(function () {
        // transfer data from php to js
        let operation =
            <?= json_encode($operation ?? '') ?>;

        let operationResult =
            <?= json_encode($operationResult ?? '') ?>;

        if ((operation == 'addOrder') && (operationResult) &&
            (operationResult.type === 'success')) {
            const modal = new bootstrap.Modal(
                document.getElementById("successRequestModal")
            );

            document.getElementById("modalTrackingCode").innerHTML = operationResult.tracking;

            modal.show();
        }

    });


    /*==========================
    // success modal actions//copy code//
    ==========================*/
    document
        .getElementById("copyTracking")
        .addEventListener("click", function () {

            const code =
                document.getElementById("modalTrackingCode").innerText;

            navigator.clipboard.writeText(code);

            this.innerHTML =
                '<i class="bi bi-check-lg"></i>';

            setTimeout(() => {

                this.innerHTML =
                    '<i class="bi bi-copy"></i>';

            }, 1500);

        });
    document.addEventListener("DOMContentLoaded", function () {

        const serviceSelect =
            document.getElementById("service_id");

        const projectCategory =
            document.getElementById("project_category");

        const teachingType =
            document.getElementById("teaching_type");


        /*
        ==================================================
        SERVICE FIELDS
        ==================================================
        */

        const serviceFields = {

            PROJECT:
                document.getElementById("project-fields"),

            DEBUG:
                document.getElementById("debugging-fields"),

            CONSULT:
                document.getElementById("consulting-fields")

        };


        /*
        ==================================================
        CONDITIONAL FIELD
        ==================================================
        */

        function updateConditionalField(field, activeValue) {

            if (!field || !serviceSelect) {
                return;
            }

            const isActive =
                serviceSelect.value === activeValue;


            if (isActive) {

                field.classList.remove("d-none");

                field.classList.remove("ignore");

                field.setAttribute(
                    "required",
                    ""
                );

            } else {

                field.classList.add("d-none");

                field.classList.add("ignore");

                field.removeAttribute(
                    "required"
                );

                // پاک کردن مقدار قبلی
                field.value = "";

            }

        }


        /*
        ==================================================
        UPDATE ALL SERVICE FIELDS
        ==================================================
        */

        function updateServiceFields() {

            if (!serviceSelect) {
                return;
            }


            /*
            ----------------------------------------------
            1. مخفی کردن همه گروه‌های service
            ----------------------------------------------
            */

            Object.values(serviceFields).forEach(field => {

                if (field) {

                    field.classList.add("d-none");

                }

            });


            /*
            ----------------------------------------------
            2. نمایش گروه مربوط به service انتخاب شده
            ----------------------------------------------
            */

            const serviceType =
                serviceSelect.value;


            if (serviceFields[serviceType]) {

                serviceFields[serviceType]
                    .classList
                    .remove("d-none");

            }


            /*
            ----------------------------------------------
            3. فیلدهای وابسته
            ----------------------------------------------
            */

            updateConditionalField(
                projectCategory,
                "PROJECT"
            );


            updateConditionalField(
                teachingType,
                "TEACH"
            );

        }


        /*
        ==================================================
        EVENT
        ==================================================
        */

        if (serviceSelect) {

            serviceSelect.addEventListener(
                "change",
                updateServiceFields
            );


            /*
            ----------------------------------------------
            Edit / Initial State
            ----------------------------------------------
            */

            updateServiceFields();

        }

    });

    document.addEventListener('DOMContentLoaded', function () {

        const form = document.getElementById('addEditOrderForm');

        form.addEventListener('submit', function (e) {
            if (!validateOrderForm(form))
                e.preventDefault();
        });
    });

    const textareas = document.querySelectorAll('textarea');

    textareas.forEach(textarea => {

        textarea.addEventListener('click', function () {

            this.setSelectionRange(0, 0);

        });

    });

</script>