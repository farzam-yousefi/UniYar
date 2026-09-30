<style>
    /*==================================
 Header
 ==================================*/

    .users-header {

        display: flex;

        justify-content: space-between;

        align-items: center;

        margin-bottom: 25px;

        gap: 20px;

    }

    .users-title h2 {

        color: #17335C;

        font-weight: 700;

        margin: 0;

    }

    .users-title p {

        margin-top: 6px;

        color: #6C757D;

    }

    /*==================================
    Stats
    ==================================*/

    .users-stats {

        display: flex;

        gap: 18px;

    }

    .stat-card {

        min-width: 170px;

        background: #fff;

        border: 1px solid #E8ECEF;

        border-radius: 16px;

        padding: 18px 22px;

    }

    .stat-card span {

        display: block;

        color: #6C757D;

        font-size: .9rem;

    }

    .stat-card h3 {

        margin-top: 8px;

        color: #0EA47A;

        font-size: 1.8rem;

        font-weight: 700;

    }

    /*==================================
    Sort
    ==================================*/

    .users-sort {

        display: flex;

        align-items: center;

        gap: 15px;

    }

    .users-sort label {

        margin: 0;

        color: #17335C;

        font-weight: 600;

    }

    .users-sort select {

        width: 220px;

    }

    /*==================================
    Table
    ==================================*/

    .admin-table th {

        white-space: nowrap;

    }

    .admin-table td {

        vertical-align: middle;

    }

    .request-count {

        color: #0EA47A;

        font-weight: 600;

        text-decoration: none;

    }

    .request-count:hover {

        text-decoration: underline;

    }

    #todayCustomers :hover {
        cursor: pointer;
    }

    .todayCustomers :hover {
        color: #0EA47A;
        font-weight: bold;
        font-size: large;
    }

    /*==================================
    Responsive
    ==================================*/

    @media (max-width: 992px) {

        .users-header {

            flex-direction: column;

            align-items: flex-start;

        }

    }

    @media (max-width: 576px) {

        .users-stats {

            width: 100%;

            flex-direction: column;

        }

        .stat-card {

            width: 100%;

        }

        .users-sort {

            flex-direction: column;

            align-items: flex-start;

        }

        .users-sort select {

            width: 100%;

        }

    }
</style>
<title> کاربران </title>
<div class="admin-layout">

    <?php require "views/layout/adminPanel/sidebar.php"; ?>
    <main class="admin-content">


        <div class="container-fluid">

            <!--==================================
            Header
            ===================================-->

            <div class="users-header">

                <div class="users-title">

                    <h2>

                        کاربران

                    </h2>

                    <p>

                        مدیریت کاربران ثبت‌نام‌شده

                    </p>

                </div>

                <div class="users-stats">

                    <div class="stat-card">

                    <span>

                        کل کاربران

                    </span>

                        <h3>

                            <?= htmlspecialchars($data['totalCount'] ?? '') ?>

                        </h3>

                    </div>

                    <div class="stat-card todayCustomers" id="todayCustomers" >

                    <span>

                        ثبت‌نام امروز

                    </span>

                            <h3>

                                <?= htmlspecialchars($data['newCount'] ?? '') ?>

                            </h3>

                    </div>

                </div>

            </div>


            <!--==================================
            Sort
            ===================================-->

            <div class="card shadow-sm border-0 mb-4">

                <div class="card-body">

                    <div class="users-sort">

                        <label>

                            مرتب سازی

                        </label>

                        <select class="form-control-custom" id="customer-sort">

                            <option value="newest">

                                جدیدترین

                            </option>

                            <option value="oldest">

                                قدیمی‌ترین

                            </option>

                            <option value="most_orders">

                                بیشترین سفارش

                            </option>

                        </select>

                    </div>

                </div>

            </div>


            <!--==================================
            Table
            ===================================-->

            <div class="card shadow-sm border-0">

                <div class="table-responsive">

                    <table class="table admin-table align-middle">

                        <thead>

                        <tr>

                            <th>

                                نام کاربر

                            </th>

                            <th>

                                موبایل

                            </th>

                            <th>

                                ایمیل

                            </th>

                            <th>

                                تعداد درخواست

                            </th>

                            <th>

                                تاریخ عضویت

                            </th>

                            <th>

                                آخرین ورود

                            </th>

                        </tr>

                        </thead>

                        <tbody id="customerTableBody">

                        <?php require "views/admin/customers/_customerRows.php"; ?>
                        </tbody>

                    </table>

                </div>
                <div id="customersPagination">
                    <?php
                    $totalPages = max(1, (int)ceil($data['totalCount'] / ItemsPerPage));
                    $currentPage = 1;
                    $windowSize = PaginationWindowSize;
                    require "views/shared/pagination.php";
                    ?>
                </div>

            </div>

        </div>

    </main>


</div>
<script>

    /*==================================
  Pagination
==================================*/
    let currentMode = "newest";

    // ====================
    const paginationElement =
        document.querySelector(
            ".pagination-wrapper"
        );


    const customersPagination =
        new Pagination(
            paginationElement
        );


    paginationElement.addEventListener(
        "pagination:change",
        function (event) {

            changePage(event.detail.page);

        }
    );

    /*==================================
      Change Page
    ==================================*/

    function changePage(page) {

        changeCustomers(currentMode, page)

    }

    /*==================================
      Initial State
    ==================================*/

    customersPagination.update();


    /*==========================================
    select oldest/newest Filter
   ==========================================*/
    $(document).on('change', '#customer-sort', function () {
        currentMode = this.value;
        customersPagination.setPage(1);
        changeCustomers(currentMode, 1)
    });

    $(document).on('click','#todayCustomers',function () {
        currentMode = 'todayCustomers';
        customersPagination.setPage(1);
        changeCustomers(currentMode, 1)

    });

    function changeCustomers(currentMode, page) {

      let url;
        if(currentMode=='todayCustomers')
          url="admin/customers/getTodayCustomers/"  + page;
        else
            url= "admin/customers/getCustomers/" + currentMode + "/" + page;

        $.ajax({
            url :url,
            type: "GET",
            dataType: "json",//text or json


            beforeSend: function () {
                //$('#imgSpinner1').show();

            },
            error: function (jqXHR, textStatus, errorThrown) {



                myAlert.error(
                    'خطا',
                    'دریافت اطلاعات کاربران با خطا مواجه شد.'
                );

            },
            success: function (data) {

                $("#customerTableBody").html(data.customers);

                const totalPages = Math.max(
                    1,
                    Math.ceil(
                        data.totalCount / <?= ItemsPerPage ?>
                    )
                );

                customersPagination.setTotalPages(totalPages);

            }
        });


    }

</script>