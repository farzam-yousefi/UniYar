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

    .filter-new.active {

        background: rgb(13, 202, 240);
    !important;

        border-color: rgb(13, 202, 240);
    !important;

        color: #fff !important;

    }

    .filter-expecting.active {

        background: #F59E0B !important;

        border-color: #F59E0B !important;

        color: #fff !important;

    }

    .filter-replied.active {

        background: #18A66E !important;

        border-color: #18A66E !important;

        color: #fff !important;

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
        color: white;
    !important;

    }

    .bg-success {

        background: #18A66E !important;
        color: white;
    !important;
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

    .message-status {
        width: 100px;
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
<pre>
<?php
$totalCount = $data['totalCount'] ?? 0;

if (!empty($data['openResponseModal'])): ?>

    <script>
document.addEventListener('DOMContentLoaded', () => {
    new bootstrap.Modal(
        document.getElementById('responseModal')
    ).show();
});
</script>
<?php endif;
?>
</pre>
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

                        <?= $totalCount ?>

                    </h3>

                </div>


                <div class="stat-card">

                    <span>

                        جدید(خوانده نشده)

                    </span>

                    <h3 id="newCount">

                        <?= $data['newCount'] ?? '' ?>

                    </h3>

                </div>


                <div class="stat-card">

                    <span>

                        در انتظار پاسخ

                    </span>

                    <h3 id="expectingCount">

                        <?= $data['expectingCount'] ?? '' ?>

                    </h3>

                </div>

                <div class="stat-card">

                    <span>

                        پاسخ داده شده

                    </span>

                    <h3 id="repliedCount">

                        <?= $data['repliedCount'] ?? '' ?>

                    </h3>

                </div>

            </div>


            <!--==============================
            Toolbar
            ==============================-->

            <div class="card shadow-sm border-0 mb-4">

                <div class="card-body toolbar-wrapper">

                    <div class="messages-filter">

                        <button type="button"

                                class="filter-btn active"

                                data-filter="all">

                            همه

                        </button>

                        <button type="button"

                                class="filter-btn filter-new"

                                data-filter="NEW">

                            جدید(خوانده نشده)

                        </button>

                        <button type="button"

                                class="filter-btn filter-expecting"

                                data-filter="EXPECTING">

                            درانتظار پاسخ

                        </button>

                        <button type="button"

                                class="filter-btn filter-replied"

                                data-filter="REPLIED">

                            پاسخ داده شده

                        </button>

                    </div>


                    <div class="messages-sort">

                        <label>

                            مرتب سازی

                        </label>

                        <select class="form-control-custom" id="message-sort">

                            <option value="newest">

                                جدیدترین

                            </option>

                            <option value="oldest">

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

                        <tbody id="messageTableBody">

                        <!--========================-->
                        <?php require "views/admin/messages/_messageRows.php"; ?>
                        <!--========================-->


                        </tbody>

                    </table>
                    <div id="messagesPagination">
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

                <button type="button"

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

                               value=""

                               readonly>

                    </div>

                    <div class="col-md-6">

                        <label>

                            ایمیل

                        </label>

                        <input id="msgEmail"
                               class="form-control"

                               value=""

                               readonly>

                    </div>

                    <div class="col-md-6">

                        <label>

                            موبایل

                        </label>

                        <input id="msgPhone"
                               class="form-control"

                               value=""

                               readonly>

                    </div>

                    <div class="col-md-6">

                        <label>

                            تاریخ

                        </label>

                        <input
                                id="msgDate"
                                class="form-control"

                                value=""

                                readonly>

                    </div>

                    <div class="col-12">

                        <label>

                            موضوع

                        </label>

                        <input id="msgSubject"

                               class="form-control"

                               value=""

                               readonly>

                    </div>

                    <div class="col-12">

                        <label>

                            متن پیام

                        </label>

                        <textarea id="msgBody"
                                  rows="7"

                                  class="form-control"

                                  readonly></textarea>

                    </div>
                    <div id="replySection" class="d-none">
                        <div class="col-12">
                            <label>
                                پاسخ داده شده در:
                            </label>

                            <input id="replyDate"

                                   class="form-control"

                                   value=""

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

                <button id="replyEmailBtn"
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#responseModal"
                        class="btn btn-success">
                    پاسخ با ایمیل
                </button>

                <button type="button"

                        class="btn btn-outline-secondary"

                        data-bs-dismiss="modal">

                    بستن

                </button>

            </div>

        </div>

    </div>

</div>


<!--=========================================
Response Modal
==========================================-->
<div

        class="modal fade"

        id="responseModal"

        tabindex="-1">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    پاسخ پیام

                </h5>
                <button type="button"

                        class="btn-close"

                        data-bs-dismiss="modal">

                </button>

            </div>
            <form id="responseForm">
                <div class="modal-body">

                    <div class="mb-3">
                        <label>گیرنده</label>
                        <input id="replyTo" name="replyTo"
                               class="form-control"
                               readonly
                        >
                    </div>

                    <div class="mb-3">
                        <label>موضوع</label>
                        <input id="replySubject" name="replySubject"
                               class="form-control"
                               data-required="موضوع"
                               data-action="پر کنید"

                        >

                    </div>

                    <div class="mb-3">
                        <label>متن پاسخ</label>
                        <textarea id="replyMessage" name="replyMessage"
                                  data-required="متن پاسخ"
                                  data-action="پر کنید"
                                  class="form-control"
                                  rows="8"></textarea>

                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button"
                            id="sendReplyBtn"
                            class="btn btn-success">
                        ارسال پاسخ
                    </button>

                    <button type="button"

                            class="btn btn-outline-secondary"

                            data-bs-dismiss="modal">

                        بستن

                    </button>

                </div>
            </form>
        </div>
    </div>
</div>


<script>
    /*==================================
Pagination
==================================*/
    let currentMode = "newest";
    let currentType = "all";

    let currentMessageRow = null;
    // ====================
    const paginationElement =
        document.querySelector(
            ".pagination-wrapper"
        );


    const messagesPagination =
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

        changeMessages(currentType, currentMode, page)

    }

    /*==================================
      Initial State
    ==================================*/

    messagesPagination.update();


    function changeMessages(type, currentMode, page) {

        let url = "<?= URL ?>admin/messages/getMessages/"
            + type + "/" + currentMode + "/" + page;
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",//text or json


            beforeSend: function () {
                //$('#imgSpinner1').show();

            },
            error: function (jqXHR, textStatus, errorThrown) {


                myAlert.error(
                    'خطا',
                    'دریافت پیامها با خطا مواجه شد.'
                );

            },
            success: function (data) {

                $("#messageTableBody").html(data.messages);

                const totalPages = Math.max(
                    1,
                    Math.ceil(
                        data.totalCount / <?= ItemsPerPage ?>
                    )
                );

                messagesPagination.setTotalPages(totalPages);

            }
        });


    }

    document.addEventListener("DOMContentLoaded", function () {

        /*==========================================
        Filter
        ==========================================*/

        const filterButtons = document.querySelectorAll(".filter-btn");

        filterButtons.forEach(btn => {

            btn.addEventListener("click", function () {

                filterButtons.forEach(x => x.classList.remove("active"));

                this.classList.add("active");

                currentType = this.dataset.filter;
                messagesPagination.setPage(1);
                changeMessages(currentType, currentMode, 1)

            });
        });

        /*==========================================
       select oldest/newest MODE
       ==========================================*/
        $(document).on('change', '#message-sort', function () {
            currentMode = this.value;
            messagesPagination.setPage(1);
            changeMessages(currentType, currentMode, 1)
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

    $(document).on('click', '.btn-view-message', function () {

        const row = this.closest(".message-row");

        currentMessageRow = row;

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

            encodeURIComponent(row.dataset.subject);

        const status = row.dataset.status;

        if (status === "REPLIED") {

            replySection.classList.remove("d-none");

            txtResponse.value = row.dataset.response;

            replyDate.value = row.dataset.repdate;

            replyBtn.classList.add("d-none");

        }
        else {

            replySection.classList.add("d-none");

            txtResponse.value = "";
            replyDate.value = "";
            $('#replyTo').val(row.dataset.email);
            $('#replySubject').val('پاسخ به: ' + row.dataset.subject);

            replyBtn.classList.remove("d-none");

        }
        /*======================================
        Change Status
        ======================================*/

        if (row.dataset.status === "NEW") {

            let newStatus = "EXPECTING";
            row.dataset.status = newStatus;
            const id = row.dataset.id;

            $.ajax({
                url: "<?= URL ?>admin/messages/changeMessageStatus/" + newStatus
                + "/" + id,
                type: "POST",
                dataType: "text",//text or json


                beforeSend: function () {
                    //$('#imgSpinner1').show();

                },
                error: function (jqXHR, textStatus, errorThrown) {


                    myAlert.error(
                        'خطا',
                        'عملیات با خطا مواجه شد.'
                    );

                },
                success: function () {
                    const badge = row.querySelector(".message-status");

                    badge.className =

                        "badge bg-warning text-dark message-status";

                    badge.innerText = "درانتظار پاسخ";

                    $('#newCount').text((parseInt($('#newCount').text()) || 0) - 1);
                    $('#expectingCount').text((parseInt($('#expectingCount').text()) || 0) + 1);
                }
            });


        }
    });
    /*==========================================
    send Response
    ==========================================*/

    $('#sendReplyBtn').on('click', function () {
        const row = currentMessageRow;

        if (!row) {
            return;
        }
        const form = document.getElementById('responseForm');
        if (validateMessageForm(form)) {

            $.ajax({
                url: "<?= URL ?>admin/messages/sendReply",
                type: "POST",
                dataType: "json",
                data: {
                    id: row.dataset.id,
                    email: $('#replyTo').val(),
                    full_name: row.dataset.name,
                    replySubject: $('#replySubject').val(),
                    replyMessage: $('#replyMessage').val()
                },
                beforeSend: function () {
                    $('#sendReplyBtn')
                        .prop('disabled', true);
                    LoadingOverlay.show('در حال ارسال پاسخ...');
                    //$('#imgSpinner1').show();

                },
                error: function (jqXHR, textStatus, errorThrown) {

                    console.log('textStatus:', textStatus);
                    console.log('errorThrown:', errorThrown);
                    console.log('status:', jqXHR.status);
                    console.log('response:', jqXHR.responseText);

                    myAlert.error(
                        'خطا',
                        'عملیات ارسال پاسخ با خطا مواجه شد.'
                    );

                },

                success: function (data) {

                    if (data.type === 'validation') {

                        // حذف خطاهای قبلی
                        $('#responseForm .form-error').remove();

                        if (data.errors.replySubject) {
                            $('#replySubject').after(
                                '<div class="form-error general-form-error">' +
                                data.errors.replySubject +
                                '</div>'
                            );
                        }

                        if (data.errors.replyMessage) {
                            $('#replyMessage').after(
                                '<div class="form-error general-form-error">' +
                                data.errors.replyMessage +
                                '</div>'
                            );
                        }

                        return;
                    }

                    if (data.type === 'success') {

                        myAlert.success(
                            'عملیات موفق',
                            data.message
                        );
                        const badge = row.querySelector(".message-status");

                        badge.className =

                            "badge bg-success text-dark message-status";

                        badge.innerText = "پاسخ داده شده";

                        $('#expectingCount').text((parseInt($('#expectingCount').text()) || 0) - 1);
                        $('#repliedCount').text((parseInt($('#repliedCount').text()) || 0) + 1);

                        // بستن responseModal
                        const responseModal =
                            bootstrap.Modal.getInstance(
                                document.getElementById('responseModal')
                            );

                        if (responseModal) {
                            responseModal.hide();
                        }

                        // بستن messageModal
                        const messageModal =
                            bootstrap.Modal.getInstance(
                                document.getElementById('messageModal')
                            );

                        if (messageModal) {
                            messageModal.hide();
                        }

                    }

                },
                complete: function () {

                    $('#sendReplyBtn')
                        .prop('disabled', false);
                    LoadingOverlay.hide();
                }

            });
        }

    });


    $('#responseModal').on('hidden.bs.modal', function () {

        const form = document.getElementById('responseForm');

        form.reset();

        form.querySelectorAll('.form-error')
            .forEach(error => error.remove());

        $('#replyTo').val('');
        $('#replySubject').val('');
        $('#replyMessage').val('');
    });

    /*==========================================
    Delete
    ==========================================*/
    $(document).on('click', '.btn-delete-message', function (e) {

        e.preventDefault();

        myAlert.delete(this.href);

    });


</script>