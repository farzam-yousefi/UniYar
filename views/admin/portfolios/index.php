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

    .filter-btn .badge {
        top: 0;
        left: 0;
        transform: translate(-50%, -50%);
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

        gap: 20px;

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

<?php if (isset($_SESSION['alert-resultOperation'])) {
    if (!($_SESSION['operation'] === 'editPortfolioFromAdmin' &&
        $_SESSION['alert-resultOperation']['type'] === 'error')) { ?>
        <script>

            myAlert.<?= $_SESSION['alert-resultOperation']['type'] ?>(
                <?= json_encode($_SESSION['alert-resultOperation']['title']) ?>,
                <?= json_encode($_SESSION['alert-resultOperation']['message']) ?>
            );

        </script>

        <?php
        unset($_SESSION['alert-resultOperation']);
        unset($_SESSION['operation']);
    }
}
?>

<?php
$totalCount = $data['totalCount'] ?? 0;
$competedCount = $data['completedCount'] ?? 0;
$inProgressCount = $totalCount - $competedCount;
if (isset($data['portfolios'])) {
    $portfolios = $data['portfolios'];
    foreach ($portfolios as &$portfolio) {

        $portfolio['started_date'] =
            Helper::MiladiTojalili((string)$portfolio['started_date'] ?? '');

        $portfolio['completed_date'] =
            Helper::MiladiTojalili((string)$portfolio['completed_date']);
    }

    unset($portfolio);
} else {

    $portfolios = [];
}

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

                        مدیریت نمونه‌کارها جهت نمایش در سایت

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

                <div class="col-lg-3 col-md-6 stats">
                    <a href="<?= URL ?>admin/portfolios/getPortfolios/completed"

                       class="stat-card static-filter">

                <span>

                    منتشر شده

                </span>

                        <h3>

                            <?= $competedCount ?? 0 ?>


                        </h3>

                    </a>
                </div>
                <div class="col-lg-3 col-md-6 stats">


                    <a href="<?= URL ?>admin/portfolios/getPortfolios/in_progress"

                       class="stat-card static-filter">

                    <span>

                    پیش نویس

                    </span>

                        <h3>

                            <?= $inProgressCount ?? 0 ?>


                        </h3>

                    </a>
                </div>

                <div class="col-lg-3 col-md-6 stats">
                    <a href="<?= URL ?>admin/portfolios/getPortfolios/active"

                       class="stat-card static-filter"
                    >

                <span>

                    فعال ها (قابل نمایش)

                </span>

                        <h3>

                            <?= $data['activeCount'] ?? 0 ?>

                        </h3>

                    </a>
                </div>

                <div class="col-lg-3 col-md-6 stats">
                    <a href="<?= URL ?>admin/portfolios/getPortfolios/featured"

                       class="stat-card static-filter"
                    >

                <span>

                    ممتازها (صفحه اصلی)

                </span>

                        <h3>

                            <?= $data['featuredCount'] ?? 0 ?>

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

                        <button class="filter-btn active position-relative"
                                id="all-btn" data-filter="all">

                            همه
                            <span class="position-absolute top-25 start-25 rounded-pill badge bg-warning">
                                  <?= $totalCount ?>
                            </span>
                        </button>

                        <button class="filter-btn filter-website position-relative"

                                data-filter="website">

                            وب سایت
                            <span class="position-absolute top-25 start-25 rounded-pill badge bg-warning">
                                  <?= $data['websiteCount'] ?? 0 ?>
                            </span>
                        </button>

                        <button class="filter-btn filter-database position-relative"

                                data-filter="database">

                            پایگاه داده
                            <span class="position-absolute top-25 start-25 rounded-pill badge bg-warning">
                                  <?= $data['databaseCount'] ?? 0 ?>
                            </span>
                        </button>

                        <button class="filter-btn filter-programming position-relative"

                                data-filter="programming">

                            برنامه نویسی
                            <span class="position-absolute top-25 start-25 rounded-pill badge bg-warning">
                                  <?= $data['programmingCount'] ?? 0 ?>
                            </span>
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

                            <img src="<?= URL ?>public/images/portfolios/<?= $portfolio['category'] ?>/<?= $portfolio['cover_image'] ?>">


                            <div class="portfolio-body">

                             <span class="portfolio-category"> <?= constant($portfolio['category']) ?>
                             </span>

                                <div class="portfolio-title-desc">
                                    <h5>
                                        <?= htmlspecialchars(
                                            $portfolio['title'] ?? '',
                                            ENT_QUOTES,
                                            'UTF-8') ?>
                                    </h5>
                                    <p>
                                        <?= htmlspecialchars(
                                            $portfolio['short_description'] ?? '',
                                            ENT_QUOTES,
                                            'UTF-8') ?>

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

                                                    class="portfolio-switch featured-switch"

                                                    data-id="<?= $portfolio['id'] ?>"

                                                    data-field="is_featured"
                                                <?= ($portfolio['is_featured'] === 1) ? 'checked' : '' ?>
                                            >

                                            <span></span>

                                        </label>

                                    </div>

                                </div>

                                <!-- Tags form user -->
                                <div class="mt-3  portfolio-tags d-none">
                                    <label class="form-label">
                                        تگ‌ها (حداکثر ۴ تگ و جداشده با -)
                                    </label>

                                    <input
                                            data-required="تگ‌های پروژه"
                                            data-action="پر کنید"
                                            type="text"
                                            name="tags"
                                            class="form-control tags"
                                            value="<?= htmlspecialchars(
                                                $portfolio['tags'] ?? '',
                                                ENT_QUOTES,
                                                'UTF-8'
                                            ) ?>"
                                            placeholder="مثلاً  : mvc - php">

                                    <?php if (isset($errors['tags'])): ?>
                                        <div class="form-error general-form-error">
                                            <?= $errors['tags'] ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="align-items-center d-flex justify-content-around pt-2">
                                        <button type="button" class="bg bg-primary save-tags"> ثبت</button>
                                        <button type="button" class="bg bg-secondary cancel-tags"> انصراف</button>
                                    </div>
                                </div>

                                <!-- Tags form DATA BASE -->
                                <div class="mt-3  portfolio-tech <?= empty($portfolio['tags']) ? 'd-none' : '' ?>">
                                    <?php
                                    if (!empty($portfolio['tags'])) {
                                        $items = explode('-', $portfolio['tags']);
                                        foreach ($items as $item) {
                                            ?>
                                            <span><?= htmlspecialchars($item) ?></span>
                                            <?php
                                        }
                                    }
                                    ?>

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

    //******
    $(document).on('change', '.portfolio-switch', function () {

        const id = $(this).data('id');
        const field = $(this).data('field');
        const value = $(this).prop('checked') ? 1 : 0;

        if (field === "is_featured") {
            const card = $(this).closest('.portfolio-card');
            const tags = card.find('.portfolio-tags');
            const techs = card.find('.portfolio-tech');

            tags.toggleClass('d-none', !this.checked);
            techs.addClass('d-none');
        }

        // سوییچ فعال (هر دو حالت یا ممتاز خاموش
        if ((field === 'is_active') || (field === "is_featured" && value === 0))
            updatePortfolioSwitch(id, field, value);


    });

    //save && cancel btn for tags section
    $(document).on('click', '.save-tags', function () {
        const $card = $(this).closest('.portfolio-card');
        const $tags = $card.find('.tags');
        const $switch = $card.find('.featured-switch');
        const id = $switch.data('id');
        const field = $switch.data('field');
        const value = $switch.prop('checked') ? 1 : 0;

        const tagsValue = $tags.val().trim();

        if (!tagsValue) {
            myAlert.error('خطا', 'برای پروژه ممتاز، تگ‌ها را وارد کنید.');
            $tags.trigger('focus');
            return;
        }
        updatePortfolioSwitch(id, field, value, tagsValue);

    });

    $(document).on('click', '.cancel-tags', function () {

        const $card = $(this).closest('.portfolio-card');
        const $tags = $card.find('.portfolio-tags');
        const $switch = $card.find('.featured-switch');

        // مخفی کردن بخش تگ‌ها
        $tags.addClass('d-none');

        // خاموش کردن سوییچ ممتاز
        $switch.prop('checked', false);

    });


    function updatePortfolioSwitch(id, field, value, tagsValue = null) {

        $.ajax({
            url: "<?= URL ?>admin/portfolios/changeBeingActiveFeatured/" + id,
            type: "POST",
            dataType: "json",
            data: {
                value: value,
                field: field,
                tags: tagsValue
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(jqXHR.status, errorThrown);

                const response = jqXHR.responseJSON;

                if (response && response.message) {
                    myAlert.error('خطا', response.message);
                    return;
                }

                myAlert.error(
                    'خطا',
                    'تغییر وضعیت با خطا مواجه شد. دوباره تلاش کنید.'
                );
            },
            success: function (data) {
                if (data.success && field === 'is_featured' && Number(value) === 1) {

                    myAlert.success(
                        'موفق',
                        'تگ‌ها با موفقیت اضافه و ذخیره شدند.'
                    );

                    const $card = $(`.portfolio-switch[data-id="${id}"]`)
                        .closest('.portfolio-card');

                    const $portfolioBody = $card.find('.portfolio-body');

                    // جداسازی تگ‌ها
                    const items = tagsValue
                        .split('-')
                        .map(tag => tag.trim())
                        .filter(tag => tag !== '');

                    // ساخت div تگ‌ها
                    const $techDiv = $('<div>', {
                        class: 'mt-3 portfolio-tech'
                    });

                    // ساخت span برای هر تگ
                    items.forEach(function (item) {
                        $('<span>')
                            .text(item)
                            .appendTo($techDiv);
                    });

                    // حذف تگ‌های قبلی، در صورت وجود
                    $portfolioBody.find('.portfolio-tech').remove();

                    // اضافه کردن تگ‌ها به انتهای portfolio-body
                    $portfolioBody.append($techDiv);
                    $portfolioBody.find('.portfolio-tags').addClass('d-none');

                }
            }
        });
    }

    /*==========================================
      Delete
      ==========================================*/
    $(document).on('click', '.btn-delete', function (event) {

        event.preventDefault();

        myAlert.delete(this.href);

    });

</script>


