<style>
    /*=====================================
Dashboard
=====================================*/

    .dashboard-card{

        background:#fff;

        border-radius:24px;

        padding:35px;

        box-shadow:0 8px 30px rgba(0,0,0,.04);

    }


    /*=====================================
    Welcome
    =====================================*/

    .dashboard-welcome h2{

        color:#17335C;

        font-size:1.8rem;

        font-weight:700;

        margin-bottom:10px;

    }

    .dashboard-welcome p{

        margin:0;

        color:#6B7280;

    }


    /*=====================================
    Statistics
    =====================================*/

    .stat-card{

        height:100%;

        display:flex;

        align-items:center;

        gap:18px;

        background:#F8FBFF;

        border-radius:18px;

        padding:22px;

        transition:.25s;

    }

    .stat-card:hover{

        transform:translateY(-3px);

        box-shadow:0 10px 20px rgba(0,0,0,.05);

    }

    .stat-icon{

        width:58px;

        height:58px;

        border-radius:16px;

        display:flex;

        align-items:center;

        justify-content:center;

    }

    .stat-icon i{

        font-size:1.6rem;

        color:#17335C;

    }

    .stat-title{

        display:block;

        color:#6B7280;

        font-size:.9rem;

        margin-bottom:5px;

    }

    .stat-card h3{

        margin:0;

        color:#17335C;

        font-weight:700;

    }


    /*=====================================
    Section
    =====================================*/

    .dashboard-section{

        margin-top:45px;

    }

    .section-header{

        display:flex;

        justify-content:space-between;

        align-items:center;

        margin-bottom:18px;

    }

    .section-header h4{

        margin:0;

        color:#17335C;

        font-weight:700;

    }


    /*=====================================
    Table
    =====================================*/

    .latest-table{

        margin:0;

    }

    .latest-table thead{

        background:#F8FBFF;

    }

    .latest-table th{

        color:#17335C;

        font-weight:600;

        border:none;

        white-space:nowrap;

    }

    .latest-table td{

        vertical-align:middle;

    }


    /*=====================================
    Responsive
    =====================================*/

    @media(max-width:768px){

        .dashboard-card{

            padding:22px;

        }

        .dashboard-welcome h2{

            font-size:1.45rem;

        }

    }
</style>
<div class="admin-layout">

    <?php require "views/layout/adminPanel/sidebar.php"; ?>

       <main class="admin-content">

            <div class="dashboard-card">

                <!--=========================
                Welcome
                =========================-->

                <div class="dashboard-welcome">

                    <div>

                        <h5>

                            سلام،
                            👋
                            به پنل مدیریت UniYar خوش آمدید.
                            امروز
                            <?= jdate("Y/m/d"); ?>
                        </h5>



                    </div>

                </div>

                <!--=========================
                Statistics
                =========================-->

                <div class="row g-4 mt-2">

                    <div class="col-xl-3 col-md-6">

                        <div class="stat-card">

                            <div class="stat-icon bg-primary-subtle">

                                <i class="bi bi-envelope-paper"></i>

                            </div>

                            <div>

                        <span class="stat-title">

                            درخواست‌های جدید

                        </span>

                                <h3>

                                    12

                                </h3>

                            </div>

                        </div>

                    </div>

                    <div class="col-xl-3 col-md-6">

                        <div class="stat-card">

                            <div class="stat-icon bg-warning-subtle">

                                <i class="bi bi-hourglass-split"></i>

                            </div>

                            <div>

                        <span class="stat-title">

                            در حال بررسی

                        </span>

                                <h3>

                                    8

                                </h3>

                            </div>

                        </div>

                    </div>

                    <div class="col-xl-3 col-md-6">

                        <div class="stat-card">

                            <div class="stat-icon bg-success-subtle">

                                <i class="bi bi-check-circle"></i>

                            </div>

                            <div>

                        <span class="stat-title">

                            انجام شده

                        </span>

                                <h3>

                                    125

                                </h3>

                            </div>

                        </div>

                    </div>

                    <div class="col-xl-3 col-md-6">

                        <div class="stat-card">

                            <div class="stat-icon bg-info-subtle">

                                <i class="bi bi-people"></i>

                            </div>

                            <div>

                        <span class="stat-title">

                            کاربران

                        </span>

                                <h3>

                                    324

                                </h3>

                            </div>

                        </div>

                    </div>

                </div>

                <!--=========================
                Latest Orders
                =========================-->

                <div class="dashboard-section mt-5">

                    <div class="section-header">

                        <h4>

                            آخرین درخواست‌ها

                        </h4>

                        <a
                                href="<?=URL?>adminOrder"
                                class="btn btn-outline-main btn-sm">

                            مشاهده همه

                        </a>

                    </div>

                    <div class="table-responsive">

                        <table class="table align-middle latest-table">

                            <thead>

                            <tr>

                                <th>

                                    کد

                                </th>

                                <th>

                                    نام

                                </th>

                                <th>

                                    خدمت

                                </th>

                                <th>

                                    وضعیت

                                </th>

                                <th>

                                    تاریخ

                                </th>

                            </tr>

                            </thead>

                            <tbody>

                            <tr>

                                <td>

                                    UY-258741

                                </td>

                                <td>

                                    علی رضایی

                                </td>

                                <td>

                                    پروژه برنامه‌نویسی

                                </td>

                                <td>

                            <span class="badge bg-warning">

                                درحال بررسی

                            </span>

                                </td>

                                <td>

                                    1406/05/20

                                </td>

                            </tr>

                            <tr>

                                <td>

                                    UY-258742

                                </td>

                                <td>

                                    سارا احمدی

                                </td>

                                <td>

                                    رفع اشکال

                                </td>

                                <td>

                            <span class="badge bg-success">

                                انجام شد

                            </span>

                                </td>

                                <td>

                                    1406/05/20

                                </td>

                            </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </main>

</div>