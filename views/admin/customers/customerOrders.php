<style>
    .page-header h2 {

        font-weight: 700;

        color: #17335C;

    }

    .page-header p {

        color: #7B8794;

        margin-top: 6px;

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
</style>
<title> سفارشات کاربر </title>

<div class="admin-layout">

    <?php require "views/layout/adminPanel/sidebar.php"; ?>

    <main class="admin-content">

        <div class="container-fluid">

            <!-- Page Title -->

            <div class="page-header mb-4 ">


                <h2>درخواست‌های کاربر <?=$data['orders'][0]['full_name'] ?? '' ?></h2>


            </div>
            <!-- Table -->
            <div class="card border-0 shadow-sm">

                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table admin-table align-middle mt-3">

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


                </div>

            </div>
        </div>
    </main>
</div>