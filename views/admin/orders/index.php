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

    .gray{
        color: gray;!important;
    }
    .gray ::selection{
        color: gray;!important;
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
if (isset($_SESSION['alert-resultOperationFromAdmin'])) {

    $operationResult =
        $_SESSION['alert-resultOperationFromAdmin'] ?? null;

    if ( $operationResult['type'] === 'success'){ ?>
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
                                    name="tracking"
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
                                    name="full_name"
                                    class="form-control-custom"
                                    placeholder="نام کاربر...">

                        </div>

                        <div class="col-lg-3 col-md-6">

                            <label class="filter-label">

                                نوع خدمت

                            </label>

                            <select
                                    id="serviceSearch"
                                    name="service"
                                    class="form-control-custom">

                                <option class="gray" value="ALL" >

                                    نوع خدمت .....

                                </option>

                                <option value="PROJECT">

                                    انجام پروژه

                                </option>

                                <option value="TEACH">

                                    تدریس خصوصی

                                </option>

                                <option value="DEBUG">

                                    رفع اشکال

                                </option>

                                <option value="CONSULT">

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

                    <div id="ordersPagination">
                        <?php
                        $totalPages = max(1, (int)ceil($data['totalCount'] / ItemsPerPage));
                        $currentPage = 1;
                        $windowSize = PaginationWindowSize;
                        require "views/shared/pagination.php";
                        ?>
                    </div>

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

    function searchOrders(page = 1, search) {
        const params = new URLSearchParams({
            tracking: search.tracking,
            user: search.user,
            service: search.service
        });


       // فقط اطلاعات جستجو ارسال شود
        let url = "admin/orders/searchOrders/" + page + "?" + params.toString();

        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",//text or json

            beforeSend: function () {
                //$('#imgSpinner1').show();
            },
            error: function (jqXHR, textStatus, errorThrown) {

                console.error(jqXHR.status, errorThrown);
                console.error("HTTP Status:", jqXHR.status);
                console.error("Text Status:", textStatus);
                console.error("Error:", errorThrown);
                console.error("Response:", jqXHR.responseText);
                myAlert.error(
                    'خطا',
                    'دریافت درخواست ها با خطا مواجه شد.'
                );
            },
            success: function (data) {
                if (data.type == 'success') {
                    $("#ordersTableBody").html(data.orders);
                    const totalPages = Math.max(
                        1,
                        Math.ceil(
                            data.totalCount / <?= ItemsPerPage ?>
                        )
                    );
                    ordersPagination.setTotalPages(totalPages);
                }
                else{
                    myAlert.error('خطا', data.errorMsg);
                }
            }
        });

    }

    document.getElementById("btnSearch")
        .addEventListener("click", function () {

            currentMode = 'search';

            currentSearch = {
                tracking: document.getElementById("trackingSearch").value.trim(),
                user: document.getElementById("userSearch").value.trim(),
                service: document.getElementById("serviceSearch").value
            };
            if(currentSearch.tracking==''
            && currentSearch.user=='' && currentSearch.service=='ALL')
                myAlert.error( 'خطا',"برای جستجو باید حداقل یک فیلد را پر کنید.")

                else
            {
                ordersPagination.setPage(1);
                searchOrders(1, currentSearch);
            }
        });

    /*==================================
   Status Filter
   ==================================*/

    function filterOrders(page = 1, status) {

        let url = "admin/orders/getOrdersByStatus/" + status + "/" + page;

        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",//text or json


            beforeSend: function () {
                //$('#imgSpinner1').show();

            },
            error: function (jqXHR, textStatus, errorThrown) {

                console.error(jqXHR.status, errorThrown);
                console.error("HTTP Status:", jqXHR.status);
                console.error("Text Status:", textStatus);
                console.error("Error:", errorThrown);
                console.error("Response:", jqXHR.responseText);

                myAlert.error(
                    'خطا',
                    'دریافت درخواست ها با خطا مواجه شد.'
                );

            },
            success: function (data) {

                $("#ordersTableBody").html(data.orders);

                const totalPages = Math.max(
                    1,
                    Math.ceil(
                        data.totalCount / <?= ItemsPerPage ?>
                    )
                );

                ordersPagination.setTotalPages(totalPages);

            }
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
            ordersPagination.setPage(1);
            filterOrders(1, currentStatus);
        });
    });

    /*==================================
  Pagination
==================================*/

    //   let currentPage = 1;
    //   let pageStart = 1;

    // ====================
    const paginationElement =
        document.querySelector(
            ".pagination-wrapper"
        );


    const ordersPagination =
        new Pagination(
            paginationElement
        );


    paginationElement.addEventListener(
        "pagination:change",
        function (event) {

            changePage(
                event.detail.page
            );

        }
    );

    /*==================================
      Change Page
    ==================================*/

    function changePage(page) {

        if (currentMode === "search") {

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

    ordersPagination.update();

</script>