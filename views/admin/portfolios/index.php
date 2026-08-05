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


    .portfolio-dates-row,.portfolio-bottom-row{

        align-items: center;

        display:flex;

        justify-content:space-between;

        margin:18px 0;

    }

    .date-title-deliver{
        padding-left: 15px;
    }

    .date-title i{

        color:#D9A404;

        font-size:16px;

    }

    .date-value{

        color:#6B7280;

        font-size:15px;

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
                <div class="flex-items gap-1" >
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
                    <a href="<?= URL ?>admin/portfolio"

                       class="stat-card">

                <span>

                    کل نمونه کارها

                </span>

                        <h3>

                            28

                        </h3>

                    </a>
                </div>
                <div class="col-lg-4 col-md-6 stats">
                    <a href="<?= URL ?>admin/portfolio?status=published"

                       class="stat-card">

                <span>

                    منتشر شده

                </span>

                        <h3>

                            24

                        </h3>

                    </a>
                </div>
                <div class="col-lg-4 col-md-6 stats">


                    <a href="<?= URL ?>admin/portfolio?status=draft"

                       class="stat-card">

                    <span>

                    پیش نویس

                    </span>

                        <h3>

                            4

                        </h3>

                    </a>
                </div>
                <!--==============================
                Toolbar
                ==============================-->

                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-body toolbar-wrapper">

                        <div class="portfolio-filter">

                            <button class="filter-btn active filter-btn"
                                    data-filter="all">

                                همه

                            </button>

                            <button class="filter-btn filter-website"

                                    data-filter="website">

                                وبسایت

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

                                <select class="form-control-custom">

                                    <option>

                                        جدیدترین

                                    </option>

                                    <option>

                                        قدیمی‌ترین

                                    </option>

                                    <option>

                                        پربازدیدترین

                                    </option>

                                </select>
                            </div>

                        </div>

                    </div>

                </div>


                <!--==============================
                Portfolio Grid
                ==============================-->

                <div class="portfolio-grid">


                    <!--==============================
                    Website
                    ==============================-->
                    <div class="portfolio-item website">
                        <div class="portfolio-card card-website"

                             data-category="website">

                            <img src="<?= URL ?>public/images/portfolio/sample1.jpg">


                            <div class="portfolio-body">

                             <span class="portfolio-category">

                               وبسایت

                             </span>

                                <div class="portfolio-title-desc">
                                    <h5>
                                        طراحی فروشگاه اینترنتی
                                    </h5>
                                    <p>
                                        طراحی و پیاده‌سازی فروشگاه اینترنتی با پنل مدیریت، درگاه پرداخت و سیستم
                                        سفارشات.

                                    </p>
                                </div>



                                    <div class="portfolio-dates-row portfolio-meta-theme">

                                        <div class="date-item">

                                            <div class="date-title">

                                                <i class="bi bi-calendar-plus"></i>

                                                <span>ثبت:</span>

                                            </div>

                                            <div class="date-value">

                                                1405/08/12

                                            </div>

                                        </div>

                                        <div class="date-item">

                                            <div class="date-title-deliver">

                                                <i class="bi bi-calendar-check"></i>

                                                <span>تحویل:</span>

                                            </div>

                                            <div class="date-value">

                                                1405/10/02

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

                                    <span class="badge bg-success">

                                     منتشر شده

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

                                                    data-id="15"

                                                    data-field="is_active"

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

                                                    class="portfolio-switch"

                                                    data-id="15"

                                                    data-field="is_featured">

                                            <span></span>

                                        </label>

                                    </div>

                                </div>

                            </div>


                            <div class="portfolio-footer">

                                <a href="<?= URL ?>admin/portfolios/edit/15">

                                    <i class="bi bi-pencil-square"></i>

                                    ویرایش

                                </a>


                                <a href="#"

                                   class="text-danger">

                                    <i class="bi bi-trash"></i>

                                    حذف

                                </a>

                            </div>

                        </div>
                    </div>

                    <!--==============================
                    Database
                    ==============================-->
                    <div class="portfolio-item database">
                        <div class="portfolio-card card-database"

                             data-category="database">

                            <img src="<?= URL ?>public/images/portfolio/sample2.jpg">


                            <div class="portfolio-body">

                    <span class="portfolio-category">

                        پایگاه داده

                    </span>

                                <div class="portfolio-title-desc">
                                    <h5>

                                        سیستم مدیریت انبار

                                    </h5>


                                    <p>

                                        طراحی دیتابیس، گزارش گیری، مدیریت کالا و مدیریت موجودی.

                                    </p>
                                </div>
                                <div class="portfolio-dates-row portfolio-meta-theme">

                                    <div class="date-item">

                                        <div class="date-title">

                                            <i class="bi bi-calendar-plus"></i>

                                            <span>ثبت:</span>

                                        </div>

                                        <div class="date-value">

                                            1405/05/02

                                        </div>

                                    </div>

                                    <div class="date-item">

                                        <div class="date-title-deliver">

                                            <i class="bi bi-calendar-check"></i>

                                            <span>تحویل:</span>

                                        </div>

                                        <div class="date-value">

                                            1405/11/02

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

                                    <span class="badge bg-secondary">

                            پیش نویس

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

                                                    data-id="15"

                                                    data-field="is_active"

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

                                                    class="portfolio-switch"

                                                    data-id="15"

                                                    data-field="is_featured">

                                            <span></span>

                                        </label>

                                    </div>

                                </div>


                            </div>


                            <div class="portfolio-footer">

                                <a href="<?= URL ?>admin/portfolios/edit/18">

                                    <i class="bi bi-pencil-square"></i>

                                    ویرایش

                                </a>


                                <a href="#"

                                   class="text-danger">

                                    <i class="bi bi-trash"></i>

                                    حذف

                                </a>

                            </div>

                        </div>
                    </div>

                    <!--==============================
                    Programming
                    ==============================-->
                    <div class="portfolio-item programming">
                        <div class="portfolio-card card-programming"

                             data-category="programming">

                            <img src="<?= URL ?>public/images/portfolio/sample3.jpg">


                            <div class="portfolio-body">

                    <span class="portfolio-category">

                        برنامه نویسی

                    </span>

                                <div class="portfolio-title-desc">
                                    <h5>

                                        سامانه مدیریت آموزش

                                    </h5>


                                    <p>

                                        سیستم مدیریت دانشجویان، اساتید و برنامه هفتگی.

                                    </p>

                                </div>

                                <div class="portfolio-dates-row portfolio-meta-theme">

                                    <div class="date-item">

                                        <div class="date-title">

                                            <i class="bi bi-calendar-plus"></i>

                                            <span>ثبت:</span>

                                        </div>

                                        <div class="date-value">

                                            1405/06/01

                                        </div>

                                    </div>

                                    <div class="date-item">

                                        <div class="date-title-deliver">

                                            <i class="bi bi-calendar-check"></i>

                                            <span>تحویل:</span>

                                        </div>

                                        <div class="date-value">

                                            1405/09/02

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

                                    <span class="badge bg-success">

                                     منتشر شده

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

                                                    data-id="15"

                                                    data-field="is_active"

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

                                                    class="portfolio-switch"

                                                    data-id="15"

                                                    data-field="is_featured">

                                            <span></span>

                                        </label>

                                    </div>

                                </div>

                            </div>


                            <div class="portfolio-footer">

                                <a href="<?= URL ?>admin/portfolios/edit/22">

                                    <i class="bi bi-pencil-square"></i>

                                    ویرایش

                                </a>


                                <a href="#"

                                   class="text-danger">

                                    <i class="bi bi-trash"></i>

                                    حذف

                                </a>

                            </div>

                        </div>
                    </div>

                </div>

            </div>

    </main>
</div>
<script>
    /*==========================================
  Portfolio filter
  ==========================================*/
    document.addEventListener("DOMContentLoaded", () => {

        const buttons = document.querySelectorAll(".filter-btn");

        const cards = document.querySelectorAll(".portfolio-item");

        buttons.forEach(button => {

            button.addEventListener("click", () => {

                if (button.classList.contains("active")) return;

                buttons.forEach(btn => btn.classList.remove("active"));

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

        });

    });

    /*==========================================
status switch
==========================================*/

    document.querySelectorAll(".portfolio-switch").forEach(sw => {

        sw.addEventListener("change", function () {

            const id = this.dataset.id;

            const field = this.dataset.field;

            const value = this.checked ? 1 : 0;

            console.log(id, field, value);

            /*
            Ajax

            POST

            id

            field

            value
            */

        });

    });
</script>


