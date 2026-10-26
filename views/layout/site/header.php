<link rel="stylesheet" href="<?= URL ?>public/css/header.css">

<?php
Model::sessionInit('UNIYAR_SITE');
$errors =
    $_SESSION['trackingCode_errors'] ?? [];

$openTrackingModal =
    $_SESSION['open_trackingModal'] ?? false;

unset($_SESSION['trackingCode_errors']);
unset($_SESSION['open_trackingModal']);

if ($openTrackingModal): ?>

    <script>
        let err = "<?=$errors?>";
        document.addEventListener('DOMContentLoaded', function () {

            const modalElement =
                document.getElementById('trackingModal');

            const modal =
                bootstrap.Modal.getOrCreateInstance(modalElement);
            const trackingError = document.getElementById("trackingError");
            trackingError.innerHTML = err;
            modal.show();

        });
    </script>

<?php endif; ?>


<body>

<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">


            <!-- Hamburger -->
            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mainMenu"
                    aria-controls="mainMenu"
                    aria-expanded="false"
                    aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <!-- Logo -->
            <a class="navbar-brand" href="<?= URL ?>index">
                <img src="<?= URL ?>public/images/logo.png" alt="logo" class="logo">
            </a>


            <!-- Menu -->
            <div class="collapse navbar-collapse" id="mainMenu">

                <ul class="navbar-nav mx-lg-auto gap-lg-3">

                    <li class="nav-item"><a class="nav-link" href="<?= URL ?>index">خانه</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= URL ?>service">خدمات</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= URL ?>portfolio">نمونه‌کارها</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= URL ?>faq">سوالات متداول</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= URL ?>about">درباره ما</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= URL ?>contact">تماس با ما</a></li>

                </ul>
            </div>
            <div class="d-flex gap-2 mt-3 mt-lg-0 navbar-orders-btns">
                <a class="btn btn-main p-2" href="<?= URL ?>order#orderForm">
                    ثبت درخواست
                </a>
                <button
                        type="button"

                        class="btn btn-outline-main tracking-btn p-2"

                        data-bs-toggle="modal"
                        data-bs-target="#trackingModal">

                    <i class="bi bi-search me-2"></i>

                    پیگیری/ویرایش

                </button>
            </div>
        </div>


    </nav>
</header>
<?php include ROOT_PATH . '/views/shared/loadingOverlay.php'; ?>

<!--==================================
Tracking Request Modal
===================================-->

<div class="modal fade"
     id="trackingModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content tracking-modal">

            <div class="modal-body d-flex flex-column align-items-center text-center">

                <!--==============================
                Step 1
                ==============================-->

                <div id="trackingStep1">
                    <form method="get" action="<?= URL ?>order/edit"
                          id="editByTrackingCode">

                        <input type="hidden"
                               name="return_url"
                               value="<?= htmlspecialchars($_SERVER['REQUEST_URI'] ?? '') ?>">

                        <div class="tracking-icon">

                            <i class="bi bi-search"></i>
                            <h4 class="d-inline-block">

                                پیگیری درخواست

                            </h4>

                        </div>

                        <div class="form-group mt-4">

                            <input
                                    id="trackingCode"
                                    name="trackingCode"
                                    class="form-control-custom text-center"
                                    placeholder="مثال : UY-34258741">
                        </div>
                        <div
                                id="trackingError"
                                class="tracking-error form-error">

                        </div>
                        <button
                                id="trackingSearchBtn" type="button"
                                class="btn btn-main mt-4 ms-2 px-5">
                            جستجو
                        </button>

                        <button
                                type="submit"

                                class="btn btn-main mt-4 px-5">

                            ویرایش
                        </button>

                    </form>
                </div>

                <!--==============================
                Loading
                ==============================-->

                <div
                        id="trackingLoading"
                        class="d-none">

                    <div class="tracking-icon">

                        <div
                                class="spinner-border text-success"
                                role="status">

                        </div>

                    </div>

                    <h3>

                        در حال بررسی...

                    </h3>

                    <p>

                        لطفاً چند لحظه صبر کنید.

                    </p>

                </div>

                <!--==============================
   Result
   ==============================-->

                <div id="trackingResult" class="d-none">

                    <div class="tracking-icon">

                        <i class="bi bi-check-circle-fill"></i>

                    </div>

                    <h3>

                        وضعیت درخواست

                    </h3>

                    <div class="tracking-result-card my-4">

                        <div class="row g-3">

                            <div class="col-md-6">

                                <div class="tracking-item">

                                    <strong>کد پیگیری</strong>

                                    <span id="rTrackingCode">

                                    </span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="tracking-item">

                                    <strong>نوع خدمت</strong>

                                    <span id="rService">
                                    </span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="tracking-item">

                                    <strong>تاریخ ثبت</strong>

                                    <span id="rDate">
                                    </span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="tracking-item">

                                    <strong>وضعیت</strong>

                                    <span id="rStatus"
                                          class="badge tracking-status">
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div id="rDescription"
                         class="tracking-description text-primary">
                    </div>

                    <div class="tracking-actions mt-2">

                        <button
                                type="button"
                                class="btn btn-main"
                                data-bs-dismiss="modal">

                            بستن

                        </button>

                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

<script>

    /*==================================================
         SEARCH SECTION
         ==================================================*/
    function showStep(step) {

        document
            .getElementById("trackingStep1")
            .classList
            .add("d-none");

        document
            .getElementById("trackingLoading")
            .classList
            .add("d-none");

        document
            .getElementById("trackingResult")
            .classList
            .add("d-none");

        document
            .getElementById("trackingError")
            .innerHTML = "";

        document
            .getElementById(step)
            .classList
            .remove("d-none");

    }

    document
        .getElementById("trackingSearchBtn")
        .addEventListener("click", function () {

            const tracking =
                document.getElementById("trackingCode").value.trim();
            const trackingError = document.getElementById("trackingError");

            trackingError.textContent = "";


            if (tracking === "") {
                trackingError.textContent = "لطفاً کد پیگیری را وارد کنید.";
                return;
            }


            // -------------------
            // Ajax اینجا
            // -------------------


            $.ajax({
                type: "GET",
                dataType: "json",//text or json
                url: "<?= URL ?>order/getOrderByTrackingCode/" + encodeURIComponent(tracking),

                beforeSend: function () {
                    showStep("trackingLoading");
                    //$('#imgSpinner1').show();

                },

                success: function (data) {

                    if (!data.success) {
                        showStep("trackingStep1");
                        trackingError.textContent =
                            data.message || "کد پیگیری معتبر نیست.";
                        trackingError.classList.remove("d-none");
                        return;
                    }

                    let status = data.status || "";
                    let service = data.service || "";
                    let category = data.category || "";
                    let bgStatus = '';
                    switch (status) {
                        case 'PENDING':
                            bgStatus = 'bg-secondary';
                            break;
                        case 'REVIEWING':
                            bgStatus = 'bg-warning';
                            break;
                        case 'IN_PROGRESS':
                            bgStatus = 'bg-primary';
                            break;
                        case 'COMPLETED':
                            bgStatus = 'bg-success';
                            break;
                        case 'CANCELED':
                            bgStatus = 'bg-danger';
                            break;

                    }
                    document.getElementById("rTrackingCode").textContent =
                        data.tracking || "";

                    document.getElementById("rService").textContent =
                        SERVICE_TYPE[data.service] + ' ' +
                        PROJECT_TYPE[data.category];


                    document.getElementById("rDate").textContent =
                        data.date || "";

                    document.getElementById("rStatus").classList.add(bgStatus);
                    document.getElementById("rStatus").textContent =
                        ORDER_STATUS[data.status];

                    document.getElementById("rDescription").textContent =
                        'درخواست شما توسط کارشناسان ما ' +
                        ORDER_STATUS[data.status] +
                        ' است.'
                    ;


                    showStep("trackingResult");

                },

                error: function (xhr) {

                    showStep("trackingStep1");

                    if (xhr.status === 404) {
                        trackingError.textContent =
                            "کد پیگیری معتبر نیست.";
                    } else {
                        trackingError.textContent =
                            "خطایی در ارتباط با سرور رخ داد. لطفاً دوباره تلاش کنید.";
                    }

                    trackingError.classList.remove("d-none");
                }

            });


            //for testing
            // showStep("trackingLoading");
            //
            // setTimeout(function () {
            //
            //     showStep("trackingResult");
            //
            // }, 2500);

        });


    //for delete previous search info
    const trackingModal = document.getElementById("trackingModal");

    trackingModal.addEventListener("hidden.bs.modal", function () {

        // نمایش مرحله اول
        showStep("trackingStep1");

        // پاک کردن ورودی
        document.getElementById("trackingCode").value = "";

        // پاک کردن پیام خطا
        document.getElementById("trackingError").innerHTML = "";

        // پاک کردن اطلاعات نتیجه
        document.getElementById("rTrackingCode").innerHTML = "";
        document.getElementById("rService").innerHTML = "";
        document.getElementById("rDate").innerHTML = "";
        document.getElementById("rStatus").innerHTML = "";
        document.getElementById("rDescription").innerHTML = "";

    });


    /*==================================================
         EDIT SECTION
         ==================================================*/
    const form = document.getElementById("editByTrackingCode");

    form.addEventListener("submit", function (e) {

        const trackingCode =
            document.getElementById("trackingCode").value.trim();
        const trackingError = document.getElementById("trackingError");

        if (trackingCode === "") {

            trackingError.textContent =
                "لطفا کد پیگیری را وارد کنید.";
            e.preventDefault();
            return;
        }
        trackingError.innerHTML = "";

    });


    const ORDER_STATUS = {
        PENDING: <?= json_encode(PENDING, JSON_UNESCAPED_UNICODE) ?>,
        REVIEWING: <?= json_encode(REVIEWING, JSON_UNESCAPED_UNICODE) ?>,
        CANCELED: <?= json_encode(CANCELED, JSON_UNESCAPED_UNICODE) ?>,
        IN_PROGRESS: <?= json_encode(IN_PROGRESS, JSON_UNESCAPED_UNICODE) ?>,
        COMPLETED: <?= json_encode(COMPLETED, JSON_UNESCAPED_UNICODE) ?>
    };

    const SERVICE_TYPE = {
        PROJECT: <?= json_encode(PROJECT, JSON_UNESCAPED_UNICODE) ?>,
        TEACH: <?= json_encode(TEACH, JSON_UNESCAPED_UNICODE) ?>,
        DEBUG: <?= json_encode(DEBUG, JSON_UNESCAPED_UNICODE) ?>,
        CONSULT: <?= json_encode(CONSULT, JSON_UNESCAPED_UNICODE) ?>
    };
    const PROJECT_TYPE = {
        WEBSITE: <?= json_encode(WEBSITE, JSON_UNESCAPED_UNICODE) ?>,
        DATABASE: <?= json_encode(DATABASE, JSON_UNESCAPED_UNICODE) ?>,
        PROGRAMMING: <?= json_encode(PROGRAMMING, JSON_UNESCAPED_UNICODE) ?>,
        RESEARCH: <?= json_encode(RESEARCH, JSON_UNESCAPED_UNICODE) ?>
    };

</script>
