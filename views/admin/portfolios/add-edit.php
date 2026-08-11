<style>

    .portfolio-form-header {

        margin-bottom: 30px;

    }

    .portfolio-form-header h2 {

        color: #17335C;
        font-weight: 700;

    }

    .portfolio-form-card {

        background: #fff;
        border-radius: 18px;
        border: 1px solid #E5E7EB;
        padding: 30px;

    }

    .form-label {

        color: #17335C;
        font-weight: 600;

    }

    .image-preview {

        width: 220px;
        height: 150px;
        border-radius: 15px;
        overflow: hidden;
        border: 1px dashed #CBD5E1;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #94A3B8;
    }

    .image-preview img {

        width: 100%;
        height: 100%;
        object-fit: cover;

    }


</style>

<?php
$mode = $data['mode'];
//print_r($data['portfolio']);
if (isset($data['portfolio'])) {
    $portfolio = $data['portfolio'];
    $started_date = Helper::jaliliDate(Helper::MiladiTojalili($portfolio['started_date'], '-'));
    $completed_date = Helper::jaliliDate(Helper::MiladiTojalili($portfolio['completed_date'], '-'));

}
if (isset($data['errors']))
    $errors = $data['errors'];

?>
<title> <?= $title = ($mode == "add") ? "افزودن نمونه کار" : "ویرایش نمونه کار" ?> </title>

<div class="admin-layout">

    <?php require "views/layout/adminPanel/sidebar.php"; ?>


    <main class="admin-content">


        <div class="container-fluid">


            <div class="portfolio-form-header">

                <h2>

                    <?= $title = ($mode !== "add") ? "ویرایش نمونه کار" : "افزودن نمونه کار" ?>

                </h2>

                <p class="text-muted">

                    اطلاعات نمونه کاری که در سایت نمایش داده می‌شود را مدیریت کنید

                </p>

            </div>


            <form action="<?= URL ?>admin/portfolios/action/<?= $mode ?>" method="post" novalidate
                  enctype="multipart/form-data" data-validate id="adminPortfolioForm">

                <input type="hidden" name="portfolioId" value="<?= $portfolio['id'] ?? '' ?>">
                <div class="portfolio-form-card">


                    <div class="row g-4">


                        <div class="col-md-6">


                            <label class="form-label">

                                عنوان نمونه کار

                            </label>


                            <input
                                    data-required="عنوان نمونه کار"
                                    data-action="پر کنید"
                                    type="text"
                                    name="title"
                                    class="form-control"
                                    value="<?= $portfolio['title'] ?? '' ?>"
                                    placeholder="مثلا طراحی فروشگاه اینترنتی">
                            <?php if (isset($errors['title'])): ?>

                                <div class="form-error general-form-error">
                                    <?= $errors['title'] ?>
                                </div>

                            <?php endif; ?>

                        </div>


                        <div class="col-md-3">


                            <label class="form-label">

                                دسته بندی

                            </label>


                            <select name="category" class="form-control" required
                                    data-required="دسته بندی"
                                    data-action="انتخاب کنید">


                                <option value="" selected disabled>

                                    لطفا انتخاب کنید

                                </option>
                                <option value="WEBSITE"
                                    <?= ($portfolio['category'] ?? '') === 'WEBSITE' ? 'selected' : '' ?>>
                                    وب سایت
                                </option>


                                <option value="DATABASE"
                                    <?= ($portfolio['category'] ?? '') === 'DATABASE' ? 'selected' : '' ?>>


                                    پایگاه داده

                                </option>


                                <option value="PROGRAMMING"
                                    <?= ($portfolio['category'] ?? '') === 'PROGRAMMING' ? 'selected' : '' ?>>


                                    برنامه نویسی

                                </option>


                            </select>
                            <?php if (isset($errors['category'])): ?>

                                <div class="form-error general-form-error">
                                    <?= $errors['category'] ?>
                                </div>

                            <?php endif; ?>

                        </div>

                        <div class="col-md-3">


                            <label class="form-label">

                                مقطع

                            </label>


                            <select name="level" class="form-control" required
                                    data-required="مقطع"
                                    data-action="انتخاب کنید">
                                <option value="" selected disabled>

                                    لطفا انتخاب کنید

                                </option>

                                <option value="ASSOCIATE"
                                    <?= ($portfolio['level'] ?? '') === 'ASSOCIATE' ? 'selected' : '' ?>>

                                    کاردانی

                                </option>


                                <option value="BACHELOR"
                                    <?= ($portfolio['level'] ?? '') === 'BACHELOR' ? 'selected' : '' ?>>


                                    کارشناسی

                                </option>


                                <option value="MASTER"
                                    <?= ($portfolio['level'] ?? '') === 'MASTER' ? 'selected' : '' ?>>


                                    کارشناسی ارشد

                                </option>

                                <option value="PHD"
                                    <?= ($portfolio['level'] ?? '') === 'PHD' ? 'selected' : '' ?>>


                                    دکترا

                                </option>

                                <option value="OTHER"
                                    <?= ($portfolio['level'] ?? '') === 'OTHER' ? 'selected' : '' ?>>


                                    سایر

                                </option>


                            </select>

                            <?php if (isset($errors['level'])): ?>

                                <div class="form-error general-form-error">
                                    <?= $errors['level'] ?>
                                </div>

                            <?php endif; ?>
                        </div>


                        <div class="col-md-12">


                            <label class="form-label">

                                توضیح کوتاه

                            </label>


                            <textarea data-required="توضیح کوتاه"
                                      data-action="پر کنید"
                                      name="short_description"
                                      rows="3"
                                      class="form-control"
                                      placeholder="توضیح مختصر درباره پروژه"><?= $portfolio['short_description'] ?? '' ?>
                            </textarea>
                            <?php if (isset($errors['short_description'])): ?>

                                <div class="form-error general-form-error">
                                    <?= $errors['short_description'] ?>
                                </div>

                            <?php endif; ?>

                        </div>


                        <div class="col-md-12">


                            <label class="form-label">

                                توضیحات کامل پروژه

                            </label>


                            <textarea data-required="توضیحات کامل"
                                      data-action="پر کنید"
                                      name="description"
                                      rows="7"
                                      class="form-control"><?= $portfolio['description'] ?? '' ?>
                            </textarea>
                            <?php if (isset($errors['description'])): ?>

                                <div class="form-error general-form-error">
                                    <?= $errors['description'] ?>
                                </div>

                            <?php endif; ?>

                        </div>


                        <div class="col-md-6">


                            <label class="form-label">

                                لینک پروژه

                            </label>


                            <input
                                    type="url"
                                    name="project_url"
                                    class="form-control"
                                    value="<?= $portfolio['project_url'] ?? '' ?>"
                                    placeholder="https://example.com">


                        </div>


                        <div class="col-md-3">


                            <label class="form-label">

                                تاریخ ثبت

                            </label>


                            <input data-required="تاریخ ثبت"
                                   data-action="انتخاب کنید"
                                   data-type="start_date"
                                   type="text" readonly
                                   name="started_date"
                                   class="form-control validation-required jalali-date date"
                                   value="<?= $started_date ?? '' ?>">
                            <?php if (isset($errors['started_date'])): ?>

                                <div class="form-error">
                                    <?= $errors['started_date'] ?>
                                </div>

                            <?php endif; ?>

                        </div>


                        <div class="col-md-3">


                            <label class="form-label">

                                تاریخ تحویل

                            </label>


                            <input data-required="تاریخ تحویل"
                                   data-action="انتخاب کنید"
                                   data-type="end_date"
                                   type="text" readonly
                                   name="completed_date"
                                   class="form-control validation-required jalali-date date"
                                   value="<?= $completed_date ?? '' ?>"
                            >
                            <?php if (isset($errors['completed_date'])): ?>

                                <div class="form-error">
                                    <?= $errors['completed_date'] ?>
                                </div>

                            <?php endif; ?>
                        </div>


                        <div class="col-md-6">


                            <label class="form-label">

                                تصویر نمونه کار

                            </label>


                            <input
                                    type="file"
                                    name="cover_image"
                                    id="image"
                                    class="form-control">
                            <?php if (isset($errors['picture'])): ?>

                                <div class="form-error">
                                    <?php
                                    foreach ($err as $errors['picture']) {
                                        ?>
                                        <ul>
                                            <li><?= $err ?></li>
                                        </ul>
                                        <?php
                                    }
                                    ?>
                                </div>

                            <?php endif; ?>

                        </div>


                        <div class="col-md-6">


                            <div class="image-preview">

                                <?php if ($mode == "edit"): ?>

                                    <?php if (!empty($portfolio['cover_image'])): ?>

                                        <img id="preview"
                                             src="<?= URL ?>public/images/portfolio/<?= $portfolio['cover_image'] ?>">

                                    <?php else: ?>

                                        <span id="no-image">
                                     تصویر انتخاب نشده
                                       </span>

                                        <img id="preview"
                                             width="200"
                                             style="display:none">

                                    <?php endif; ?>


                                <?php elseif ($mode == "add"): ?>

                                    <img id="preview"
                                         width="200"
                                         style="display:none">

                                <?php endif; ?>

                            </div>

                        </div>


                    </div>


                    <hr class="my-4">

                    <div class="row align-items-center">

                        <!-- Switches -->
                        <div class="col-12 col-md-6">

                            <div class="d-flex gap-4">

                                <div class="d-flex align-items-center mt-2 mb-3 gap-2">

                                    <label>
                                        فعال
                                    </label>

                                    <label class="form-switch">
                                        <input
                                                type="checkbox"
                                                name="is_active"
                                                value="1"
                                            <?= ((isset($portfolio)) && ($portfolio['is_active'])) ? 'checked' : '' ?>
                                        >
                                        <span></span>
                                    </label>

                                </div>

                                <div class="d-flex align-items-center mt-2 mb-3 gap-2">

                                    <label>
                                        ممتاز
                                    </label>

                                    <label class="form-switch">
                                        <input
                                                type="checkbox"
                                                name="is_featured"
                                                value="1"
                                            <?= ((isset($portfolio)) && ($portfolio['is_featured'])) ? 'checked' : '' ?>
                                        >
                                        <span></span>
                                    </label>

                                </div>

                            </div>

                        </div>


                        <!-- Status -->
                        <div class="col-12 col-md-6 mt-3 mt-md-0">

                            <div class="d-flex align-items-center mt-md-2 mt-sm-0 mb-3 mb-sm-4 gap-3">

                                <label for="status">
                                    وضعیت
                                </label>

                                <select
                                        id="status"
                                        name="status"
                                        class="form-control w-50">

                                    <option value="IN_PROGRESS"
                                        <?= ($portfolio['status'] ?? '') === 'IN_PROGRESS' ? 'selected' : '' ?>>
                                        پیش نویس
                                    </option>

                                    <option value="DONE"
                                        <?= ($portfolio['status'] ?? '') === 'DONE' ? 'selected' : '' ?>>
                                        منتشر شده
                                    </option>

                                </select>

                            </div>

                        </div>

                    </div>


                    <button class="btn btn-main" type="submit">


                        <i class="bi bi-check-circle ms-2"></i>

                        ذخیره


                    </button>


                    <a href="<?= URL ?>admin/portfolios"
                       class="btn btn-main-cancel">


                        انصراف


                    </a>


                </div>

            </form>


        </div>


    </main>


</div>
<script>

    $(function () {
        // transfer data from php to js
        let mode = "<?= $mode ?>";

        let initialVal = null;
        initialVal = (mode === "edit") ? false : true;

        $(".jalali-date").persianDatepicker({
            format: "YYYY/MM/DD",
            autoClose: true,
            initialValue: initialVal

        });
    });

    document.addEventListener('DOMContentLoaded', function () {


        const form = document.getElementById('adminPortfolioForm');


        form.addEventListener('submit', function (e) {


            if (!validateAdminPortfolioForm(form))

                e.preventDefault();

        });
    });
</script>