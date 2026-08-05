<style>
    /*==========================================
Messages Header
==========================================*/

    .page-header {

        display: flex;

        justify-content: space-between;

        align-items: center;

        gap: 24px;

        margin-bottom: 28px;

    }

    .page-header h2 {

        margin: 0;

        color: #17335C;

        font-weight: 700;

    }

    .page-header p {

        margin-top: 6px;

        color: #6B7280;

    }

    /*==========================================
    Statistics
    ==========================================*/

    .dashboard-stats {

        display: flex;

        gap: 20px;

        margin-bottom: 28px;

    }

    .dashboard-stats .stat-card {

        flex: 1;

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

    .messages-filter {

        display: flex;

        flex-wrap: wrap;

        gap: 10px;

    }

    .filter-unread.active{

        background:#EF4444!important;

        border-color:#EF4444!important;

        color:#fff!important;

    }

    .filter-waiting.active{

        background:#F59E0B!important;

        border-color:#F59E0B!important;

        color:#fff!important;

    }

    .filter-answered.active{

        background:#18A66E!important;

        border-color:#18A66E!important;

        color:#fff!important;

    }

    .messages-sort {

        display: flex;

        align-items: center;

        gap: 12px;

    }

    .messages-sort label {

        margin: 0;

        font-weight: 600;

        color: #17335C;

    }

    /*==========================================
    Table
    ==========================================*/

    .table {

        margin: 0;

    }

    .table thead th {

        background: #F8FAFC;

        color: #17335C;

        font-weight: 700;

        border-bottom: 2px solid #E5E7EB;

        white-space: nowrap;

    }

    .table tbody td {

        vertical-align: middle;

        border-color: #EEF2F4;

    }

    .table tbody tr {

        transition: .2s;

    }

    .table tbody tr:hover {

        background: #FAFCFD;

    }

    /*==========================================
    Preview
    ==========================================*/

    .message-preview {

        max-width: 420px;

        white-space: nowrap;

        overflow: hidden;

        text-overflow: ellipsis;

        color: #6B7280;

    }

    /*==========================================
    Status
    ==========================================*/

    .badge {

        padding: 7px 14px;

        border-radius: 30px;

        font-weight: 600;

    }

    .bg-danger {

        background: #EF4444 !important;

    }

    .bg-warning {

        background: #F59E0B !important;

    }

    .bg-success {

        background: #18A66E !important;

    }

    /*==========================================
    Actions
    ==========================================*/

    .table-actions {

        display: flex;

        justify-content: center;

        gap: 8px;

    }

    .table-actions .btn {

        width: 36px;

        height: 36px;

        display: flex;

        justify-content: center;

        align-items: center;

        padding: 0;

    }

    .table-actions i {

        font-size: 15px;

    }

    .status-span{
        width:100px;
    }

    /*==========================================
    Modal
    ==========================================*/

    .modal-content {

        border: none;

        border-radius: 18px;

        width: 700px;

        height: auto;

    }

    .modal-header {

        border-bottom: 1px solid #EEF2F4;

    }

    .modal-title {

        color: #17335C;

        font-weight: 700;

    }

    .modal-body label {

        display: block;

        margin-bottom: 8px;

        color: #475569;

        font-weight: 600;

    }

    .modal-body input,
    .modal-body textarea {

        background: #F8FAFC;

    }

    .modal-footer {

        border-top: 1px solid #EEF2F4;

    }

    /*==========================================
    Responsive
    ==========================================*/

    @media (max-width: 992px) {

        .page-header {

            flex-direction: column;

            align-items: flex-start;

        }

        .dashboard-stats {

            flex-wrap: wrap;

        }

        .toolbar-wrapper {

            flex-direction: column;

            align-items: flex-start;

        }

        .messages-sort {

            width: 100%;

        }

    }

    @media (max-width: 768px) {

        .message-preview {

            max-width: 220px;

        }

    }

    @media (max-width: 576px) {

        .dashboard-stats {

            flex-direction: column;

        }

        .messages-sort {

            flex-direction: column;

            align-items: flex-start;

        }

        .messages-sort select {

            width: 100%;

        }

    }
</style>
<div class="admin-layout">

    <?php require "views/layout/adminPanel/sidebar.php"; ?>

    <main class="admin-content">

        <div class="container-fluid">

            <!--==============================
            Header
            ==============================-->

            <div class="page-header">

                <div>

                    <h2>

                        پیام‌های دریافتی

                    </h2>

                    <p>

                        مدیریت پیام‌های ارسال شده از فرم تماس سایت

                    </p>

                </div>

            </div>


            <!--==============================
            Statistics
            ==============================-->

            <div class="dashboard-stats">

                <div class="stat-card">

                    <span>

                        کل پیام‌ها

                    </span>

                    <h3>

                        58

                    </h3>

                </div>


                <div class="stat-card">

                    <span>

                        خوانده نشده

                    </span>

                    <h3>

                        7

                    </h3>

                </div>


                <div class="stat-card">

                    <span>

                        پاسخ داده شده

                    </span>

                    <h3>

                        33

                    </h3>

                </div>

            </div>


            <!--==============================
            Toolbar
            ==============================-->

            <div class="card shadow-sm border-0 mb-4">

                <div class="card-body toolbar-wrapper">

                    <div class="messages-filter">

                        <button

                                class="filter-btn active"

                                data-filter="all">

                            همه

                        </button>

                        <button

                                class="filter-btn filter-unread"

                                data-filter="new">

                            خوانده نشده

                        </button>

                        <button

                                class="filter-btn filter-waiting"

                                data-filter="waiting">

                            بدون پاسخ

                        </button>

                        <button

                                class="filter-btn filter-answered"

                                data-filter="answered">

                            پاسخ داده شده

                        </button>

                    </div>


                    <div class="messages-sort">

                        <label>

                            مرتب سازی

                        </label>

                        <select class="form-control-custom">

                            <option>

                                جدیدترین

                            </option>

                            <option>

                                قدیمی‌ترین

                            </option>

                        </select>

                    </div>

                </div>

            </div>


            <!--==============================
            Messages Table
            ==============================-->

            <div class="card shadow-sm border-0">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead>

                        <tr>

                            <th width="180">

                                نام

                            </th>

                            <th width="220">

                                موضوع

                            </th>

                            <th>

                                متن پیام

                            </th>

                            <th width="140">

                                تاریخ

                            </th>

                            <th width="170">

                                وضعیت

                            </th>

                            <th width="130">

                                عملیات

                            </th>

                        </tr>

                        </thead>

                        <tbody>

                        <!--========================-->

                        <tr class="message-row"

                            data-status="new"

                            data-name="علی رضایی"

                            data-email="ali@gmail.com"

                            data-phone="09121234567"

                            data-subject="درخواست همکاری"

                            data-date="1405/05/18"

                            data-body="متن کامل پیام"
                            data-response=""
                            data-repdate=""
                        >

                            <td>

                                علی رضایی

                            </td>

                            <td>

                                درخواست همکاری

                            </td>

                            <td class="message-preview">

                                سلام

                                برای طراحی سایت فروشگاهی

                                نیاز به مشاوره داشتم...

                            </td>

                            <td>

                                1405/05/18

                            </td>

                            <td>

                                <span class="badge bg-danger status-span">

                                    خوانده نشده

                                </span>

                            </td>

                            <td>

                                <div class="table-actions">

                                    <button

                                            class="btn btn-sm btn-outline-primary btn-view-message"

                                            data-bs-toggle="modal"

                                            data-bs-target="#messageModal">

                                        <i class="bi bi-eye"></i>

                                    </button>
                                    <a

                                            href="<?= URL ?>admin/messages/delete/15"

                                            class="btn btn-sm btn-outline-danger btn-delete-message">

                                        <i class="bi bi-trash"></i>

                                    </a>

                                </div>

                            </td>

                        </tr>


                        <!--========================-->

                        <tr class="message-row"

                            data-status="waiting"

                            data-name="مریم احمدی"

                            data-email="matr@gmail.com"

                            data-phone="09121234567"

                            data-subject="قیمت پروژه"

                            data-date="1405/05/18"

                            data-body="متن کامل پیام"
                            data-response=""
                            data-repdate=""
                        >

                            <td>

                                مریم احمدی

                            </td>

                            <td>

                                قیمت پروژه

                            </td>

                            <td class="message-preview">

                                لطفا هزینه انجام پروژه

                                مدیریت انبار را اعلام بفرمایید...

                            </td>
                            <td>

                                1405/05/15

                            </td>

                            <td>

                                <span class="badge bg-warning text-dark status-span">

                                   در انتظار پاسخ

                                </span>

                            </td>

                            <td>

                                <div class="table-actions">

                                    <button

                                            class="btn btn-sm btn-outline-primary btn-view-message"

                                            data-bs-toggle="modal"

                                            data-bs-target="#messageModal">

                                        <i class="bi bi-eye"></i>

                                    </button>
                                    <a

                                            href="<?= URL ?>admin/messages/delete/15"

                                            class="btn btn-sm btn-outline-danger btn-delete-message">

                                        <i class="bi bi-trash"></i>

                                    </a>

                                </div>

                            </td>

                        </tr>


                        <!--========================-->

                        <tr class="message-row"

                            data-status="answered"

                            data-name="رضا محمدی"

                            data-email="ali@gmail.com"

                            data-phone="09121234567"

                            data-subject="سوال فنی"

                            data-date="1405/10/08"

                            data-body="متن کاملدر مورد اتصال درگاه پرداخت

                               در مورد اتصال درگاه پرداخت

                               در مورد اتصال درگاه پرداخت

                               در مورد اتصال درگاه پرداخت

                               در مورد اتصال درگاه پرداخت

                               در مورد اتصال درگاه پرداخت

                               در مورد اتصال درگاه پرداخت

                                پیام"
                            data-response="در مورد اتصال درگ pg an offjefenf
                                ferferf
                                vrfref
                                اه پردا                                "
                            data-repdate="1405/05/12 - 14:30">
                            <td>

                                رضا محمدی

                            </td>

                            <td>

                                سوال فنی

                            </td>

                            <td class="message-preview">

                                در مورد اتصال درگاه پرداخت

                                سوال داشتم...

                            </td>

                            <td>

                                1405/05/10

                            </td>

                            <td>

                                <span class="badge bg-success status-span">

                                    پاسخ داده شده

                                </span>

                            </td>

                            <td>

                                <div class="table-actions">

                                    <button

                                            class="btn btn-sm btn-outline-primary btn-view-message"

                                            data-bs-toggle="modal"

                                            data-bs-target="#messageModal">

                                        <i class="bi bi-eye"></i>

                                    </button>
                                    <a

                                            href="<?= URL ?>admin/messages/delete/15"

                                            class="btn btn-sm btn-outline-danger btn-delete-message">

                                        <i class="bi bi-trash"></i>

                                    </a>
                                </div>

                            </td>

                        </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </main>

</div>


<!--=========================================
Message Modal
==========================================-->

<div

        class="modal fade"

        id="messageModal"

        tabindex="-1">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    مشاهده پیام

                </h5>

                <button

                        class="btn-close"

                        data-bs-dismiss="modal">

                </button>

            </div>

            <div class="modal-body">

                <div class="row g-4">

                    <div class="col-md-6">

                        <label>

                            نام

                        </label>

                        <input id="msgName"

                               class="form-control"

                               value="علی رضایی"

                               readonly>

                    </div>

                    <div class="col-md-6">

                        <label>

                            ایمیل

                        </label>

                        <input id="msgEmail"
                               class="form-control"

                               value="ali@gmail.com"

                               readonly>

                    </div>

                    <div class="col-md-6">

                        <label>

                            موبایل

                        </label>

                        <input id="msgPhone"
                               class="form-control"

                               value="0912..."

                               readonly>

                    </div>

                    <div class="col-md-6">

                        <label>

                            تاریخ

                        </label>

                        <input
                                id="msgSubject"
                                class="form-control"

                                value="1405/05/18"

                                readonly>

                    </div>

                    <div class="col-12">

                        <label>

                            موضوع

                        </label>

                        <input id="msgDate"

                               class="form-control"

                               value="درخواست همکاری"

                               readonly>

                    </div>

                    <div class="col-12">

                        <label>

                            متن پیام

                        </label>

                        <textarea id="msgBody"
                                  rows="7"

                                  class="form-control"

                                  readonly>متن کامل پیام...</textarea>

                    </div>
                    <div id="replySection" class="d-none">
                        <div class="col-12">
                            <label>
                                پاسخ داده شده در:
                            </label>

                            <input id="replyDate"

                                   class="form-control"

                                   value="sdsd"

                                   readonly>
                        </div>

                        <div class="col-12 mt-4">
                            <label>

                                پاسخ مدیر

                            </label>

                            <textarea
                                    id="msgReply"
                                    class="form-control"
                                    rows="7"
                                    readonly>

                         </textarea>
                        </div>

                    </div>


                </div>

            </div>

            <div class="modal-footer">

                <a id="replyEmailBtn"
                   href="mailto:ali@gmail.com"

                   class="btn btn-success">

                    پاسخ با ایمیل

                </a>

                <button

                        class="btn btn-outline-secondary"

                        data-bs-dismiss="modal">

                    بستن

                </button>

            </div>

        </div>

    </div>

</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {

        /*==========================================
        Filter
        ==========================================*/

        const filterButtons = document.querySelectorAll(".filter-btn");

        const rows = document.querySelectorAll(".message-row");

        filterButtons.forEach(btn => {

            btn.addEventListener("click", function () {

                filterButtons.forEach(x => x.classList.remove("active"));

                this.classList.add("active");

                const filter = this.dataset.filter;

                rows.forEach(row => {

                    if (

                        filter === "all" ||

                        row.dataset.status === filter

                    ) {

                        row.style.display = "";

                    } else {

                        row.style.display = "none";

                    }

                });

            });

        });


        /*==========================================
        Modal
        ==========================================*/

        const modal = document.getElementById("messageModal");

        const txtName = modal.querySelector("#msgName");

        const txtEmail = modal.querySelector("#msgEmail");

        const txtPhone = modal.querySelector("#msgPhone");

        const txtSubject = modal.querySelector("#msgSubject");

        const txtDate = modal.querySelector("#msgDate");

        const txtBody = modal.querySelector("#msgBody");

        const replySection = document.getElementById("replySection");

        const txtResponse = document.getElementById("msgReply");

        const replyDate = document.getElementById("replyDate");

        const replyBtn = document.getElementById("replyEmailBtn");

        document.querySelectorAll(".btn-view-message").forEach(btn => {

            btn.addEventListener("click", function () {

                const row = this.closest(".message-row");


                txtName.value = row.dataset.name;

                txtEmail.value = row.dataset.email;

                txtPhone.value = row.dataset.phone;

                txtSubject.value = row.dataset.subject;

                txtDate.value = row.dataset.date;

                txtBody.value = row.dataset.body;


                replyBtn.href =

                    "mailto:" +

                    row.dataset.email +

                    "?subject=" +

                    encodeURIComponent(row.dataset.subject)

                const status = row.dataset.status;

                if (status === "answered") {

                    replySection.classList.remove("d-none");

                    txtResponse.value = row.dataset.response;

                    replyDate.value = row.dataset.repdate;

                    replyBtn.classList.add("d-none");

                }
                else {

                    replySection.classList.add("d-none");

                    txtResponse.value = "";
                    replyDate.value = "";

                    replyBtn.classList.remove("d-none");

                }
                /*======================================
                Change Status
                ======================================*/

                if (row.dataset.status === "new") {

                    row.dataset.status = "waiting";

                    const badge = row.querySelector(".message-status");

                    badge.className =

                        "badge bg-warning text-dark message-status";

                    badge.innerText = "بدون پاسخ";

                }

            });

        });


        /*==========================================
        Delete
        ==========================================*/

        document.querySelectorAll(".btn-delete-message").forEach(btn => {

            btn.addEventListener("click", function (e) {

                e.preventDefault();

                myAlert.delete(this.href);

            });

        });

    });
</script>