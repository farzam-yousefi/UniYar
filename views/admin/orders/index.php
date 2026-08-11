<style>
    /*========================================
Page
========================================*/

    .admin-main {

        padding: 35px;

    }

    .page-header h2 {

        font-weight: 700;

        color: #17335C;

    }

    .page-header p {

        color: #7B8794;

        margin-top: 6px;

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

        border: none;

        padding: 18px;

    }

    .admin-table tbody td {

        padding: 18px;

        vertical-align: middle;

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

    /*========================================
    Responsive
    ========================================*/

    @media (max-width: 992px) {

        .admin-main {

            padding: 20px;

        }

        .filter-buttons {

            justify-content: flex-start;

            margin-top: 15px;

        }

    }
</style>
<title> سفارشات </title>
<div class="admin-layout">

    <?php require "views/layout/adminPanel/sidebar.php"; ?>

    <main class="admin-content">

        <div class="container-fluid">

            <!-- Page Title -->

            <div class="page-header mb-4">

                <h2>مدیریت درخواست‌ها</h2>

                <p>
                    مشاهده، جستجو و مدیریت درخواست‌های کاربران
                </p>

            </div>

            <!-- Statistics -->

            <div class="row g-4 mb-4">

                <div class="col-lg-3 col-md-6">

                    <div class="stat-card">

                        <div class="stat-icon bg-primary">

                            <i class="bi bi-folder2-open"></i>

                        </div>

                        <div>

                            <h6>همه</h6>

                            <h3>152</h3>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6">

                    <div class="stat-card">

                        <div class="stat-icon bg-warning">

                            <i class="bi bi-hourglass-split"></i>

                        </div>

                        <div>

                            <h6>در انتظار</h6>

                            <h3>18</h3>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6">

                    <div class="stat-card">

                        <div class="stat-icon bg-success">

                            <i class="bi bi-gear"></i>

                        </div>

                        <div>

                            <h6>در حال انجام</h6>

                            <h3>37</h3>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6">

                    <div class="stat-card">

                        <div class="stat-icon bg-secondary">

                            <i class="bi bi-check2-circle"></i>

                        </div>

                        <div>

                            <h6>تکمیل شده</h6>

                            <h3>97</h3>

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
                                data-status="all">

                            همه

                        </button>

                        <button class="btn btn-outline-main btn-sm filter-btn"
                                data-status="waiting">

                            در انتظار

                        </button>

                        <button class="btn btn-outline-main btn-sm filter-btn"
                                data-status="doing">

                            در حال انجام

                        </button>

                        <button class="btn btn-outline-main btn-sm filter-btn"
                                data-status="done">

                            تکمیل شده

                        </button>

                        <button class="btn btn-outline-main btn-sm filter-btn"
                                data-status="cancel">

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

                            <tbody>

                            <tr>

                                <td>UY258741</td>

                                <td>علی رضایی</td>

                                <td>طراحی سایت فروشگاهی</td>

                                <td>برنامه نویسی</td>

                                <td>1405/05/20</td>

                                <td>

                                <span class="badge bg-warning">

                                    در انتظار

                                </span>

                                </td>

                                <td>

                                    <a href="<?= URL ?>admin/orders/details/4" class="table-action">

                                        <i class="bi bi-eye"></i>

                                    </a>

                                    <a href="<?= URL ?>admin/orders/edit/4" class="table-action">

                                        <i class="bi bi-pencil-square"></i>

                                    </a>

                                    <a href="<?= URL ?>admin/orders/delete/4" class="table-action text-danger">

                                        <i class="bi bi-trash"></i>

                                    </a>

                                </td>

                            </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </main>
</div>

<script>
    /*==================================
   Status Filter
   ==================================*/
    document
        .getElementById("btnSearch")
        .addEventListener("click", function () {

            let tracking = document
                .getElementById("trackingSearch")
                .value
                .trim();

            let user = document
                .getElementById("userSearch")
                .value
                .trim();

            let service = document
                .getElementById("serviceSearch")
                .value;

            let status = document
                .querySelector(".filter-btn.active")
                .dataset
                .status;

            console.log(tracking, user, service, status);

            /*
                Ajax

                tracking
                user
                service
                status

            */

        });

    /*==================================
   Status Filter
   ==================================*/

    const filterButtons = document.querySelectorAll(".filter-btn");

    filterButtons.forEach(btn => {

        btn.addEventListener("click", function () {

            // حذف حالت فعال از همه
            filterButtons.forEach(item => {

                item.classList.remove("btn-main", "active");
                item.classList.add("btn-outline-main");

            });

            // فعال کردن دکمه انتخاب شده
            this.classList.remove("btn-outline-main");
            this.classList.add("btn-main", "active");

            let status = this.dataset.status;

            console.log(status);

            // Ajax

        });

    });


</script>