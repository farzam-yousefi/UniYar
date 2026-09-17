<style>
    /*========================================
Page
========================================*/

    .page-header h2 {

        font-weight: 700;

        color: #17335C;

    }

    .page-header p {

        color: #7B8794;

        margin-top: 6px;

    }

    .page-header > div:last-child {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    /*==================================
    Search Area
    ==================================*/

    .filter-label {

        display: block;

        margin-bottom: 8px;

        font-size: .9rem;

        font-weight: 600;

        color: #17335C;

    }

    /*==================================
    Status Filter
    ==================================*/

    .filter-buttons {

        display: flex;

        gap: 10px;

        flex-wrap: wrap;

    }

    .filter-btn {

        min-width: 95px;

    }

    .filter-btn.active {

        background: #0EA47A;

        color: #fff;

        border-color: #0EA47A;

    }

    .filter-btn.active:hover {

        background: #0C8C68;

        border-color: #0C8C68;

        color: #fff;

    }

    /*==================================
    Responsive
    ==================================*/

    @media (max-width: 992px) {

        .filter-buttons {

            justify-content: center;

        }

    }

    /*========================================
    Table
    ========================================*/

    .admin-table thead {

        background: #F8FBFF;

    }

    .admin-table thead th {

        color: #17335C;

        font-weight: 700;

        padding: 18px;

    }

    .admin-table tbody td {

        padding: 18px;

        vertical-align: middle;

        border: none;

    }

    .admin-table tbody tr {

        transition: .25s;

    }

    .admin-table tbody tr:hover {

        background: #FAFCFD;

    }

    .table-action {

        color: #17335C;

        font-size: 1.15rem;

        margin-left: 12px;

        text-decoration: none;

    }

    .table-action:hover {

        color: #0EA47A;

    }

    span.badge {
        width: 90px;
        padding-top: 7px;
        align-content: baseline;
    }

    /*========================================
    Responsive
    ========================================*/

    @media (max-width: 992px) {

        .filter-buttons {

            justify-content: flex-start;

            margin-top: 15px;

        }

    }
</style>

<?php
$data['totalPages'] = max(1, ceil($data['totalCount'] / ItemsPerPage));
?>
<title> سفارشات </title>
<div class="admin-layout">

    <?php require "views/layout/adminPanel/sidebar.php"; ?>

    <main class="admin-content">

        <div class="container-fluid">

            <!-- Page Title -->

            <div class="page-header mb-4 d-flex justify-content-sm-between ps-md-2 pe-md-4 gap-sm-2 gap-4">
                <div>

                    <h2>مدیریت درخواست‌ها</h2>

                    <p>
                        مشاهده، جستجو و مدیریت درخواست‌های کاربران
                    </p>
                </div>

                <div>
                    <span>

                        <h6>همه</h6>

                        <h3><?= $data['totalCount'] ?></h3>

                    </span>
                    <div class="stat-icon bg-info">

                        <i class="bi bi-folder2-open"></i>

                    </div>

                </div>


            </div>

            <!-- Statistics -->

            <div class="row g-4 mb-4">

                <div class="col-lg-3 col-md-6">

                    <div class="stat-card">

                        <div class="stat-icon bg-secondary">

                            <i class="bi bi-hourglass-split"></i>

                        </div>

                        <div>

                            <h6>درانتظار (جدید)</h6>

                            <h3><?= $data['pendingCount'] ?></h3>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6">

                    <div class="stat-card">

                        <div class="stat-icon bg-warning">

                            <i class="bi bi-clock-fill"></i>

                        </div>

                        <div>

                            <h6>درحال بررسی</h6>

                            <h3><?= $data['reviewingCount'] ?></h3>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6">

                    <div class="stat-card">

                        <div class="stat-icon bg-primary">

                            <i class="bi bi-gear"></i>

                        </div>

                        <div>

                            <h6>در حال انجام</h6>

                            <h3><?= $data['inProgressCount'] ?></h3>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6">

                    <div class="stat-card">

                        <div class="stat-icon bg-success">

                            <i class="bi bi-check2-circle"></i>

                        </div>

                        <div>

                            <h6>تکمیل شده</h6>

                            <h3><?= $data['completedCount'] ?></h3>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Search & Filters -->

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-body">

                    <div class="row g-3 align-items-end">

                        <div class="col-lg-3 col-md-6">

                            <label class="filter-label">

                                کد پیگیری

                            </label>

                            <input
                                    type="text"
                                    id="trackingSearch"
                                    class="form-control-custom"
                                    placeholder="کد پیگیری...">

                        </div>

                        <div class="col-lg-3 col-md-6">

                            <label class="filter-label">

                                نام کاربر

                            </label>

                            <input
                                    type="text"
                                    id="userSearch"
                                    class="form-control-custom"
                                    placeholder="نام کاربر...">

                        </div>

                        <div class="col-lg-3 col-md-6">

                            <label class="filter-label">

                                نوع خدمت

                            </label>

                            <select
                                    id="serviceSearch"
                                    class="form-control-custom">

                                <option value="">

                                    همه خدمات

                                </option>

                                <option>

                                    انجام پروژه

                                </option>

                                <option>

                                    تدریس خصوصی

                                </option>

                                <option>

                                    رفع اشکال

                                </option>

                                <option>

                                    مشاوره

                                </option>


                            </select>

                        </div>

                        <div class="col-lg-3 col-md-6">

                            <button
                                    id="btnSearch"
                                    class="btn btn-main w-100">

                                <i class="bi bi-search ms-2"></i>

                                جستجو

                            </button>

                        </div>

                    </div>

                    <hr class="my-4">

                    <div class="filter-buttons">

                        <button class="btn btn-main btn-sm filter-btn active"
                                data-status="ALL">
                            همه
                        </button>

                        <button class="btn btn-outline-main btn-sm filter-btn"
                                data-status="PENDING">

                            درانتظار

                        </button>

                        <button class="btn btn-outline-main btn-sm filter-btn"
                                data-status="REVIEWING">

                            درحال بررسی

                        </button>

                        <button class="btn btn-outline-main btn-sm filter-btn"
                                data-status="IN_PROGRESS">
                            در حال انجام

                        </button>

                        <button class="btn btn-outline-main btn-sm filter-btn"
                                data-status="COMPLETED">
                            تکمیل شده
                        </button>

                        <button class="btn btn-outline-main btn-sm filter-btn"
                                data-status="CANCELED">

                            لغو شده

                        </button>

                    </div>

                </div>

            </div>
            <!-- Table -->

            <div class="card border-0 shadow-sm">

                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table admin-table align-middle mb-0">

                            <thead>

                            <tr>

                                <th>کد پیگیری</th>

                                <th>کاربر</th>

                                <th>عنوان پروژه</th>

                                <th>نوع خدمت</th>

                                <th>تاریخ ثبت</th>

                                <th>وضعیت</th>

                                <th width="130">عملیات</th>

                            </tr>

                            </thead>

                            <tbody id="ordersTableBody">
                            <?php require "views/admin/orders/_orderRows.php"; ?>


                            </tbody>

                        </table>

                    </div>

                    <?php require "views/pagination.php"; ?>


                </div>

            </div>

        </div>

    </main>
</div>

<script>

    let currentSearch = {
        tracking: '',
        user: '',
        service: ''
    };
    let currentMode = 'filter';
    let currentStatus = 'ALL';


    /*==================================
   Search Section
   ==================================*/

    function searchOrders(page, search) {

        // فقط اطلاعات جستجو ارسال شود
    }

    document.getElementById("btnSearch")
        .addEventListener("click", function () {

            currentMode = 'search';

            currentSearch = {
                tracking: document.getElementById("trackingSearch").value.trim(),
                user: document.getElementById("userSearch").value.trim(),
                service: document.getElementById("serviceSearch").value
            };

            currentPage = 1;
            pageStart = 1;

            updatePages();
            updatePagination();

            searchOrders(1, currentSearch);
        });

    /*==================================
   Status Filter
   ==================================*/

    function filterOrders(page = 1, status) {

        let url = "admin/orders/getOrdersByStatus/" + status + "/" + page;

        $.ajax({
            url: url,
            type: "GET",
            dataType: "text",//'text or json


            beforeSend: function () {
                //$('#imgSpinner1').show();

            },
            error: function (jqXHR, textStatus, errorThrown) {

                console.error(jqXHR.status, errorThrown);

                myAlert.error(
                    'خطا',
                    'دریافت درخواست ها با خطا مواجه شد.'
                );

            },
            success: function (data) {
                $("#ordersTableBody").html(data);
                updatePages();
                updatePagination();
            },

        });

    }

    const filterButtons = document.querySelectorAll(".filter-btn");

    filterButtons.forEach(btn => {

        btn.addEventListener("click", function () {

            currentMode = 'filter';

            filterButtons.forEach(item => {
                item.classList.remove("btn-main", "active");
                item.classList.add("btn-outline-main");
            });

            this.classList.remove("btn-outline-main");
            this.classList.add("btn-main", "active");

            currentStatus = this.dataset.status;

            currentPage = 1;
            pageStart = 1;

            updatePages();
            updatePagination();

            filterOrders(1, currentStatus);
        });
    });

    /*==================================
  Pagination
==================================*/

    let currentPage = 1;
    let totalPages = <?= $data['totalPages']?>;
    let pageStart = 1;


    /*==================================
      Update Previous / Next
    ==================================*/
    function updatePagination() {

        const first = document.querySelector(".pagination-first").parentElement;
        const prev = document.querySelector(".pagination-prev").parentElement;

        const next = document.querySelector(".pagination-next").parentElement;
        const last = document.querySelector(".pagination-last").parentElement;


        // First / Previous

        const atFirstPage = currentPage === 1;

        first.classList.toggle("disabled", atFirstPage);
        prev.classList.toggle("disabled", atFirstPage);


        // Next / Last

        const atLastPage = currentPage === totalPages;

        next.classList.toggle("disabled", atLastPage);
        last.classList.toggle("disabled", atLastPage);

    }


    function updatePages() {

        const buttons = document.querySelectorAll(".page-btn");

        buttons.forEach((btn, index) => {

            const page = pageStart + index;

            btn.dataset.page = page;
            btn.textContent = page;

            if (page <= totalPages) {

                btn.parentElement.style.display = "";

            } else {

                btn.parentElement.style.display = "none";

            }

            btn.classList.toggle(
                "active",
                page === currentPage
            );

        });
    }

    function updatePageWindow() {

        // اگر به ابتدای لیست رسیده‌ایم
        if (currentPage <= 3) {

            pageStart = 1;

        }

        // اگر به انتهای لیست نزدیک شده‌ایم
        else if (currentPage >= totalPages - 2) {

            pageStart = Math.max(
                1,
                totalPages - <?=PaginationWindowSize?> + 1
            );

        }

        // حالت عادی: صفحه جاری وسط پنجره باشد
        else {

            pageStart = currentPage - 2;

        }

    }

    /*==================================
      Page Buttons
    ==================================*/

    document.querySelectorAll(".page-btn")
        .forEach(btn => {

            btn.addEventListener("click", function (e) {

                e.preventDefault();

                const page = Number(this.dataset.page);

                if (page < 1 || page > totalPages) {
                    return;
                }

                currentPage = page;

                updatePageWindow();
                updatePages();
                updatePagination();

                changePage(currentPage);

            });

        });

    /*==================================
      Previous
    ==================================*/

    document.querySelector(".pagination-prev")
        .addEventListener("click", function (e) {

            e.preventDefault();

            if (currentPage === 1) {
                return;
            }

            currentPage--;

            updatePageWindow();
            updatePages();
            updatePagination();

            changePage(currentPage);

        });

    /*==================================
      Next
    ==================================*/

    document.querySelector(".pagination-next")
        .addEventListener("click", function (e) {

            e.preventDefault();

            if (currentPage === totalPages) {
                return;
            }

            currentPage++;

            updatePageWindow();
            updatePages();
            updatePagination();

            changePage(currentPage);

        });

    /*==================================
     First
   ==================================*/
    document.querySelector(".pagination-first")
        .addEventListener("click", function (e) {

            e.preventDefault();

            if (currentPage === 1) {
                return;
            }

            currentPage = 1;

            updatePageWindow();
            updatePages();
            updatePagination();

            changePage(currentPage);

        });

    /*==================================
     Last
   ==================================*/
    document.querySelector(".pagination-last")
        .addEventListener("click", function (e) {

            e.preventDefault();

            if (currentPage === totalPages) {
                return;
            }

            currentPage = totalPages;

            updatePageWindow();
            updatePages();
            updatePagination();

            changePage(currentPage);

        });

    /*==================================
      Change Page
    ==================================*/

    function changePage(page) {

        if (currentMode === 'search') {

            searchOrders(
                page,
                currentSearch
            );

        } else {

            filterOrders(
                page,
                currentStatus
            );

        }

    }


    /*==================================
      Initial State
    ==================================*/

    updatePageWindow();
    updatePages();
    updatePagination();

</script>