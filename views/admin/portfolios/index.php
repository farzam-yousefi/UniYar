<style>
    /*==========================================
Portfolio Header
==========================================*/

    .portfolio-header {

        display: flex;

        justify-content: space-between;

        align-items: center;

        gap: 10px;

        margin-bottom: 28px;

    }

    .portfolio-header h2 {

        margin: 0;

        color: #17335C;

        font-weight: 700;

    }

    .portfolio-header p {

        margin-top: 6px;

        color: #6B7280;

    }

    /*==========================================
    Statistics
    ==========================================*/

    .stat-card {

        flex: 1;

        display: flex;

        flex-direction: column;

        justify-content: center;

        text-decoration: none;

        background: #fff;

        border: 1px solid #E5E7EB;

        border-radius: 18px;

        padding: 22px;

        transition: .25s;

    }

    .stat-card:hover {

        transform: translateY(-4px);

        box-shadow: 0 10px 30px rgba(0, 0, 0, .08);

    }

    .stat-card span {

        color: #6B7280;

        font-size: .9rem;

    }

    .stat-card h3 {

        margin-top: 10px;

        color: #18A66E;

        font-weight: 700;

    }

    /*==========================================
    Toolbar
    ==========================================*/

    .toolbar-wrapper {

        display: flex;

        justify-content: space-between;

        align-items: center;

        gap: 24px;

    }

    .portfolio-filter {

        display: flex;

        flex-wrap: wrap;

        gap: 10px;

    }

    .portfolio-title-desc {
        height: 150px;
    }

    .portfolio-sortCats {

        display: flex;

        align-items: center;

        gap: 12px;

    }

    .portfolio-sortCats label {

        margin: 0;

        color: #17335C;

        font-weight: 600;

    }

    .flex-items {
        display: flex;
    }

    /*==========================================
    Grid
    ==========================================*/

    .portfolio-grid {

        display: grid;

        grid-template-columns: repeat(3, 1fr);

        gap: 24px;

    }

    /*==========================================
    Footer
    ==========================================*/

    .portfolio-footer {

        display: flex;

        justify-content: space-between;

        align-items: center;

        padding: 16px 22px;

        border-top: 1px solid #EEF2F4;

    }

    .portfolio-footer a {

        text-decoration: none;

        font-weight: 600;

    }

    .portfolio-footer i {

        margin-left: 6px;

    }

    .portfolio-dates-row, .portfolio-bottom-row {

        align-items: center;

        display: flex;

        justify-content: space-between;

        margin: 18px 0;

    }

    .date-title-deliver {
        padding-left: 15px;
    }

    .date-title i {

        color: #D9A404;

        font-size: 16px;

    }

    .date-value {

        color: #6B7280;

        font-size: 15px;

    }

    .portfolio-switches {

        display: flex;

        justify-content: space-between;

        gap: 20px;

        padding-top: 15px;

        border-top: 1px solid #EEF2F4;

    }

    .switch-item {

        display: flex;

        align-items: center;

        gap: 10px;

    }

    .switch-item label:first-child {

        margin: 0;

        font-size: 14px;

        font-weight: 600;

        color: #475569;

    }

    .form-switch {

        position: relative;

        display: inline-block;

        width: 46px;

        height: 24px;

        margin: 0;

    }

    .form-switch input {

        display: none;

    }

    .form-switch span {

        position: absolute;

        inset: 0;

        background: #CBD5E1;

        border-radius: 30px;

        transition: .25s;

        cursor: pointer;

    }

    .form-switch span::before {

        content: "";

        position: absolute;

        width: 18px;

        height: 18px;

        left: 3px;

        top: 3px;

        background: #fff;

        border-radius: 50%;

        transition: .25s;

        box-shadow: 0 2px 6px rgba(0, 0, 0, .15);

    }

    .form-switch input:checked + span {

        background: #18A66E;

    }

    .form-switch input:checked + span::before {

        transform: translateX(22px);

    }

    /*==========================================
    Responsive
    ==========================================*/

    @media (max-width: 1200px) {

        .portfolio-grid {

            grid-template-columns: repeat(3, 1fr);

        }

    }

    @media (max-width: 992px) {

        .toolbar-wrapper {

            flex-direction: column;

            align-items: flex-start;

        }

        .portfolio-sortCats {

            width: 100%;

        }

        .portfolio-sortCats select {

            width: 120px;

        }

        .portfolio-grid {

            grid-template-columns: repeat(2, 1fr);

        }

    }

    @media (max-width: 576px) {
        .portfolio-header {

            flex-direction: column;

            align-items: flex-start;

        }

        .portfolio-grid {

            grid-template-columns: 1fr;

        }

        .portfolio-title-desc {
            height: auto;
        }

        .portfolio-sortCats {

            flex-direction: column;

            align-items: flex-start;

        }

        .portfolio-sortCats select {

            width: 100%;

        }

    }
</style>

<?php if (isset($_SESSION['alert-resultOperation'])): ?>
    <script>
        <?php if ($_SESSION['alert-resultOperation']){
        if ($_SESSION['operation'] === "add"){
        ?>

        myAlert.success(
            "عملیات موفق",
            "نمونه کار با موفقیت ثبت شد."
        );
        <?php
        }else{
        ?>

        myAlert.success(
            "عملیات موفق",
            "نمونه کار با موفقیت ویرایش شد."
        );
        <?php
        }}
        else{ ?>

        myAlert.error(
            "عملیات ناموفق",
            "ثبت نمونه کار با خطا مواجه شد."
        );

        <?php }
        $_SESSION['alert-resultOperation'] = null;
        $_SESSION['operation'] = null;
        ?>
    </script>

<?php endif; ?>
<?php
require_once 'core/const.php';

if (isset($data['portfolios'])) {
    $portfolios = $data['portfolios'];
    $totalCount= $data['totalCount'];
    $competedCount=$data['completedCount'];
    $inProgressCount=$totalCount-$competedCount;
    foreach ($portfolios as &$portfolio) {

        $portfolio['started_date'] =
            Helper::MiladiTojalili((string)$portfolio['started_date'], '-');

        $portfolio['completed_date'] =
            Helper::MiladiTojalili((string)$portfolio['completed_date'], '-');
    }

    unset($portfolio);
} else
    $portfolios = [];


?>
<title>نمونه کارها</title>
<div class="admin-layout">

    <?php require "views/layout/adminPanel/sidebar.php"; ?>

    <main class="admin-content">

        <div class="container-fluid">

            <!--==============================
            Header
            ==============================-->

            <div class="portfolio-header">

                <div>

                    <h2>

                        نمونه کارها

                    </h2>

                    <p>

                        مدیریت نمونه‌کارهای نمایش داده شده در سایت

                    </p>

                </div>
                <div class="flex-items gap-1">
                    <a href="<?= URL ?>admin/portfolios/sort"

                       class="btn btn-main">

                        <i class="bi bi-sort-down-alt ms-2"></i>

                        ترتیب نمایش

                    </a>
                    <a href="<?= URL ?>admin/portfolios/add"

                       class="btn btn-main">

                        <i class="bi bi-plus-circle ms-2"></i>

                        افزودن نمونه کار

                    </a>
                </div>
            </div>


            <!--==============================
            Statistics
            ==============================-->
            <div class="row g-3">

                <div class="col-lg-4 col-md-6 stats">
                    <a href="<?= URL ?>admin/portfolios/getPortfolios/all"

                       class="stat-card static-filter"
                    >

                <span>

                    کل نمونه کارها

                </span>

                        <h3>

                            <?= $totalCount ?? 0 ?>

                        </h3>

                    </a>
                </div>
                <div class="col-lg-4 col-md-6 stats">
                    <a href="<?= URL ?>admin/portfolios/getPortfolios/COMPLETED"

                       class="stat-card static-filter">

                <span>

                    منتشر شده

                </span>

                        <h3>

                            <?= $competedCount ?? 0 ?>


                        </h3>

                    </a>
                </div>
                <div class="col-lg-4 col-md-6 stats">


                    <a href="<?= URL ?>admin/portfolios/getPortfolios/IN_PROGRESS"

                       class="stat-card static-filter">

                    <span>

                    پیش نویس

                    </span>

                        <h3>

                            <?= $inProgressCount ?? 0 ?>


                        </h3>

                    </a>
                </div>
            </div>
            <!--==============================
            Toolbar
            ==============================-->

            <div class="card shadow-sm border-0 m-4">

                <div class="card-body toolbar-wrapper">

                    <div class="portfolio-filter">

                        <button class="filter-btn active"
                                id="all-btn" data-filter="all">

                            همه

                        </button>

                        <button class="filter-btn filter-website"

                                data-filter="website">

                            وب سایت

                        </button>

                        <button class="filter-btn filter-database"

                                data-filter="database">

                            پایگاه داده

                        </button>

                        <button class="filter-btn filter-programming"

                                data-filter="programming">

                            برنامه نویسی

                        </button>

                    </div>


                    <div class="portfolio-sortCats">

                        <label>

                            مرتب سازی

                        </label>
                        <div>

                            <select class="form-control-custom" id="portfolio-sort">

                                <option value="newest">

                                    جدیدترین

                                </option>

                                <option value="oldest">

                                    قدیمی‌ترین

                                </option>

                                <option value="displayOrder">

                                    اولویت نمایش

                                </option>

                            </select>
                        </div>

                    </div>

                </div>

            </div>


            <!--==============================
            Portfolios Grid
            ==============================-->

            <div id="portfolio-grid"
                 class="portfolio-grid">

                <?php foreach ($portfolios as $portfolio) {
                    $cat = strtolower($portfolio['category']);
                    ?>

                    <div class="portfolio-item <?= $cat ?>"
                        <?php
                        $started = Helper::jaliliToMiladi($portfolio['started_date'])
                        ?>

                         data-started-at="<?= $started ?>  "

                         data-display-order="<?= $portfolio['display_order'] ?>">

                        <div class="portfolio-card card-<?= $cat ?>"

                             data-category="<?= $cat ?>">

                            <img src="<?= URL ?>public/images/portfolio/<?= $portfolio['cover_image'] ?>">


                            <div class="portfolio-body">

                             <span class="portfolio-category"> <?= constant($portfolio['category']) ?>
                             </span>

                                <div class="portfolio-title-desc">
                                    <h5>
                                        <?= $portfolio['title'] ?>
                                    </h5>
                                    <p>
                                        <?= $portfolio['short_description'] ?>

                                    </p>
                                </div>


                                <div class="portfolio-dates-row portfolio-meta-theme">

                                    <div class="date-item">

                                        <div class="date-title">

                                            <i class="bi bi-calendar-plus"></i>

                                            <span>ثبت:</span>

                                        </div>

                                        <div class="date-value">

                                            <?= $portfolio['started_date'] ?>

                                        </div>

                                    </div>

                                    <div class="date-item">

                                        <div class="date-title-deliver">

                                            <i class="bi bi-calendar-check"></i>

                                            <span>تحویل:</span>

                                        </div>

                                        <div class="date-value">

                                            <?= $portfolio['completed_date'] ?>

                                        </div>

                                    </div>

                                </div>


                                <div class="portfolio-bottom-row">

                                    <a href="https://example.com"
                                       target="_blank"
                                       class="portfolio-link">

                                        <i class="bi bi-link-45deg"></i>

                                        مشاهده پروژه

                                    </a>

                                    <span class="badge
                                        <?= ($portfolio['status'] === 'COMPLETED') ? 'bg-success' : 'bg-secondary' ?>
                                        ">

                                     <?= constant($portfolio['status']) ?>

                                  </span>

                                </div>
                                <div class="portfolio-switches">

                                    <div class="switch-item">

                                        <label>

                                            فعال

                                        </label>

                                        <label class="form-switch">

                                            <input
                                                    type="checkbox"

                                                    class="portfolio-switch"

                                                    data-id="<?= $portfolio['id'] ?>"

                                                    data-field="is_active"

                                                <?= ($portfolio['is_active'] === 1) ? 'checked' : '' ?>

                                            >

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

                                                    class="portfolio-switch"

                                                    data-id="<?= $portfolio['id'] ?>"

                                                    data-field="is_featured"
                                                <?= ($portfolio['is_featured'] === 1) ? 'checked' : '' ?>
                                            >

                                            <span></span>

                                        </label>

                                    </div>

                                </div>

                            </div>


                            <div class="portfolio-footer">

                                <a href="<?= URL ?>admin/portfolios/edit/<?= $portfolio['id'] ?>">

                                    <i class="bi bi-pencil-square"></i>

                                    ویرایش

                                </a>


                                <a href="<?= URL ?>admin/portfolios/delete/<?= $portfolio['id'] ?>"
                                   class="text-danger btn-delete">

                                    <i class="bi bi-trash"></i>

                                    حذف

                                </a>

                            </div>

                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>

        </div>

    </main>
</div>
<script>
    /*==========================================
     transfer data from php to js
     ==========================================*/

    //let portfolios = null;
    //
    //portfolios =<?//= json_encode(
    //    $portfolios,
    //    JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
    //) ?>//;
    //console.log(portfolios);

    /*==========================================
     select oldest/newest Filter
    ==========================================*/
    $(document).on('change', '#portfolio-sort', function () {

        const container = document.getElementById('portfolio-grid');


        const items = [...container.querySelectorAll('.portfolio-item')];

        if (this.value === 'newest') {

            items.sort((a, b) => {
                return new Date(b.dataset.startedAt)
                    - new Date(a.dataset.startedAt);
            });

        }

        if (this.value === 'oldest') {

            items.sort((a, b) => {
                return new Date(a.dataset.startedAt)
                    - new Date(b.dataset.startedAt);
            });

        }

        if (this.value === 'displayOrder') {

            items.sort((a, b) => {
                return Number(a.dataset.displayOrder)
                    - Number(b.dataset.displayOrder);
            });

        }

        items.forEach(item => {
            container.appendChild(item);
        });
    });

    /*==========================================
 STATIC FILTER AJAX
 ==========================================*/
    jQuery('.static-filter').click(function (event) {
        event.preventDefault();
        let url = this.href;

        var data_;
        $.ajax({
            url: url,
            type: "GET",
            dataType: "html",//'text or json


            beforeSend: function () {
                //$('#imgSpinner1').show();

            },
            error: function (jqXHR, textStatus, errorThrown) {

                console.error(jqXHR.status, errorThrown);

                myAlert.error(
                    'خطا',
                    'دریافت نمونه کارها انجام نشد.'
                );

            },
            success: function (data) {
                data_ = data;
            },
            complete: function () {

                //imporrrrrrtaaaaaaaanttttttttttt
                var TargetBox = '.portfolio-grid';
                $(TargetBox).html('');
                $(TargetBox).html(data_);
                $('.filter-btn').removeClass('active');
                $('#all-btn').addClass('active');


            },
        });
    });


    /*==========================================
     Portfolio Filter
    ==========================================*/

    $(document).on("click", ".filter-btn", function (event) {

        event.preventDefault();

        const button = this;

        if (button.classList.contains("active")) return;

        const buttons = document.querySelectorAll(".filter-btn");
        const cards = document.querySelectorAll(".portfolio-item");

        buttons.forEach(btn => {
            btn.classList.remove("active");
        });

        button.classList.add("active");

        const filter = button.dataset.filter;

        cards.forEach(card => {

            card.classList.add("fade-out");

        });

        setTimeout(() => {

            cards.forEach(card => {

                card.classList.remove("fade-out");

                card.classList.add("hide");

                if (
                    filter === "all" ||
                    card.classList.contains(filter)
                ) {

                    card.classList.remove("hide");

                    card.classList.add("fade-in");

                }

            });

            requestAnimationFrame(() => {

                cards.forEach(card => {

                    if (!card.classList.contains("hide")) {

                        card.classList.remove("fade-in");

                        card.classList.add("show");

                    }

                });

            });

        }, 250);

    });
    // $(document).on('click', '.filter-btn', function () {
    //
    //     // document.addEventListener("DOMContentLoaded", () => {

    /*==========================================
status switch
==========================================*/
    //**** rebind after ajax by delegation
    $(document).on('change', '.portfolio-switch', function () {

        const id = this.dataset.id;
        const field = this.dataset.field;
        const value = this.checked ? 1 : 0;


        $.ajax({
            url: "<?= URL ?>admin/portfolios/changeBeingActiveFeatured/" + id,
            type: "POST",
            dataType: "text",//'text or json
            data: {value: value, field: field},

            beforeSend: function () {
                //$('#imgSpinner1').show();

            },
            error: function (jqXHR, textStatus, errorThrown) {

                console.error(jqXHR.status, errorThrown);

                myAlert.error(
                    'خطا',
                    'تغییر وضعیت با خطا مواجه شد .دوباره تلاش کنید.'
                );

            },
            success: function (data) {

            },

        });

    });
    /*==========================================
       Delete
       ==========================================*/
    $(document).on('click', '.btn-delete', function (event) {

        event.preventDefault();

        myAlert.delete(this.href);

    });


</script>


