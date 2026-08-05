<style>

    .portfolio-form-header{

        margin-bottom:30px;

    }

    .portfolio-form-header h2{

        color:#17335C;
        font-weight:700;

    }

    .portfolio-form-card{

        background:#fff;
        border-radius:18px;
        border:1px solid #E5E7EB;
        padding:30px;

    }


    .form-label{

        color:#17335C;
        font-weight:600;

    }


    .image-preview{

        width:220px;
        height:150px;
        border-radius:15px;
        overflow:hidden;
        border:1px dashed #CBD5E1;
        display:flex;
        align-items:center;
        justify-content:center;
        color:#94A3B8;
    }


    .image-preview img{

        width:100%;
        height:100%;
        object-fit:cover;

    }


    .switch-group{

        display:flex;
        gap:30px;
        margin-top:20px;

    }

</style>

<?php
$mode = $data['mode'];
?>
<title> <?=$title=($mode=="add") ?"افزودن نمونه کار"   :"ویرایش نمونه کار" ?> </title>
<div class="admin-layout">

    <?php require "views/layout/adminPanel/sidebar.php"; ?>


    <main class="admin-content">


        <div class="container-fluid">


            <div class="portfolio-form-header">

                <h2>

                    <?= isset($portfolio) ? "ویرایش نمونه کار" : "افزودن نمونه کار" ?>

                </h2>

                <p class="text-muted">

                    اطلاعات نمونه کاری که در سایت نمایش داده می‌شود را مدیریت کنید

                </p>

            </div>



            <form action="" method="post" enctype="multipart/form-data">


                <div class="portfolio-form-card">


                    <div class="row g-4">


                        <div class="col-md-8">


                            <label class="form-label">

                                عنوان نمونه کار

                            </label>


                            <input
                                type="text"
                                name="title"
                                class="form-control"
                                value="<?= $portfolio['title'] ?? '' ?>"
                                placeholder="مثلا طراحی فروشگاه اینترنتی">


                        </div>



                        <div class="col-md-4">


                            <label class="form-label">

                                دسته بندی

                            </label>


                            <select name="category" class="form-control">


                                <option value="website">

                                    وبسایت

                                </option>


                                <option value="database">

                                    پایگاه داده

                                </option>


                                <option value="programming">

                                    برنامه نویسی

                                </option>


                            </select>


                        </div>



                        <div class="col-md-12">


                            <label class="form-label">

                                توضیح کوتاه

                            </label>


                            <textarea
                                name="short_description"
                                rows="3"
                                class="form-control"
                                placeholder="توضیح مختصر درباره پروژه">

<?= $portfolio['short_description'] ?? '' ?>

</textarea>


                        </div>



                        <div class="col-md-12">


                            <label class="form-label">

                                توضیحات کامل پروژه

                            </label>


                            <textarea
                                name="description"
                                rows="7"
                                class="form-control">

<?= $portfolio['description'] ?? '' ?>

</textarea>


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


                            <input
                                type="text"
                                name="created_at"
                                class="form-control jalali-date"
                                value="<?= $portfolio['created_at'] ?? '' ?>">



                        </div>




                        <div class="col-md-3">


                            <label class="form-label">

                                تاریخ تحویل

                            </label>


                            <input
                                type="text"
                                name="completed_at"
                                class="form-control jalali-date"
                                value="<?= $portfolio['completed_at'] ?? '' ?>">



                        </div>




                        <div class="col-md-6">


                            <label class="form-label">

                                تصویر نمونه کار

                            </label>


                            <input
                                type="file"
                                name="image"
                                class="form-control">


                        </div>



                        <div class="col-md-6">


                            <div class="image-preview">


                                <?php if(isset($portfolio['image'])): ?>

                                    <img src="<?= URL ?>public/images/portfolio/<?= $portfolio['image'] ?>">


                                <?php else: ?>

                                    تصویر انتخاب نشده


                                <?php endif; ?>


                            </div>


                        </div>




                    </div>



                    <hr class="my-4">



                    <div class="switch-group">


                        <div class="switch-item">


                            <label>

                                فعال

                            </label>


                            <label class="form-switch">


                                <input
                                    type="checkbox"
                                    name="is_active"
                                    value="1"
                                    checked>


                                <span></span>


                            </label>


                        </div>




                        <div class="switch-item">


                            <label>

                                ممتاز

                            </label>


                            <label class="form-switch">


                                <input
                                    type="checkbox"
                                    name="is_featured"
                                    value="1">


                                <span></span>


                            </label>


                        </div>


                    </div>




                    <div class="mt-4 d-flex gap-2">


                        <button class="btn btn-main">


                            <i class="bi bi-check-circle ms-2"></i>

                            ذخیره


                        </button>


                        <a href="<?= URL ?>admin/portfolios"
                           class="btn btn-main-cancel">


                            انصراف


                        </a>


                    </div>



                </div>


            </form>


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