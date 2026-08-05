<link rel="stylesheet" href="public/css/header.css">
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
            <a class="navbar-brand" href="index">
                <img src="public/images/logo.png" alt="logo" class="logo">
            </a>


            <!-- Menu -->
            <div class="collapse navbar-collapse" id="mainMenu">

                <ul class="navbar-nav mx-lg-auto gap-lg-3">

                    <li class="nav-item"><a class="nav-link" href="index">خانه</a></li>
                    <li class="nav-item"><a class="nav-link" href="service">خدمات</a></li>
                    <li class="nav-item"><a class="nav-link" href="portfolio">نمونه‌کارها</a></li>
                    <li class="nav-item"><a class="nav-link" href="faq">سوالات متداول</a></li>
                    <li class="nav-item"><a class="nav-link" href="about">درباره ما</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact">تماس با ما</a></li>

                </ul>
                <div class="d-flex gap-2 mt-3 mt-lg-0">
                <a class="btn btn-main px-4" href="order">
                    ثبت درخواست
                </a>
                    <button
                            type="button"

                            class="btn btn-outline-main px-4"

                            data-bs-toggle="modal"
                            data-bs-target="#trackingModal">

                        <i class="bi bi-search me-2"></i>

                        پیگیری/ویرایش

                    </button>
                </div>
            </div>

        </div>
    </nav>
</header>

<!--==================================
Tracking Request Modal
===================================-->

<div class="modal fade"
     id="trackingModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content tracking-modal">

            <div class="modal-body d-flex flex-column align-items-center text-center">

                <!--==============================
                Step 1
                ==============================-->

                <div id="trackingStep1">

                    <div class="tracking-icon">

                        <i class="bi bi-search"></i>
                        <h4 class="d-inline-block">

                            پیگیری درخواست

                        </h4>

                    </div>



                    <p>

                        کد پیگیری خود را وارد کنید.

                    </p>

                    <div class="form-group mt-4">

                        <input
                                id="trackingInput"
                                type="text"
                                class="form-control-custom text-center"
                                placeholder="مثال : UY-258741">

                    </div>

                    <div
                            id="trackingError"
                            class="tracking-error">

                    </div>

                    <button
                            id="trackingSearchBtn"
                            class="btn btn-main mt-4 ms-2 px-5">

                        جستجو

                    </button>
                    <a  class="nonLink" href="order/edit/24">
                    <button
                            type="button"
                            id="trackingSearchBtn"
                            class="btn btn-main mt-4 px-5">

                            ویرایش
                    </button>
                    </a>
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

                        UY-258741

                    </span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="tracking-item">

                                    <strong>نوع خدمت</strong>

                                    <span id="rService">

                        پروژه برنامه نویسی

                    </span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="tracking-item">

                                    <strong>تاریخ ثبت</strong>

                                    <span id="rDate">

                        1405/05/20

                    </span>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="tracking-item">

                                    <strong>وضعیت</strong>

                                    <span id="rStatus"
                                          class="badge bg-primary tracking-status">

                        در حال بررسی

                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div id="rDescription"
                         class="tracking-description">

                        درخواست شما توسط کارشناسان در حال بررسی است.

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
    function showStep(step){

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
                document.getElementById("trackingInput").value.trim();

            if(tracking===""){

                document.getElementById("trackingError").innerHTML =
                    "کد پیگیری را وارد کنید.";

                return;
            }

            showStep("trackingLoading");

            // -------------------
            // Ajax اینجا
            // -------------------

            /*
            $.ajax({

                ...

                success:function(data){

                    document.getElementById("rTrackingCode").innerHTML=data.tracking;

                    document.getElementById("rService").innerHTML=data.service;

                    document.getElementById("rDate").innerHTML=data.date;

                    document.getElementById("rStatus").innerHTML=data.status;

                    document.getElementById("rDescription").innerHTML=data.description;

                    showStep("trackingResult");

                },

                error:function(){

                    showStep("trackingStep1");

                    document.getElementById("trackingError").innerHTML =
                        "کد پیگیری معتبر نیست.";

                }

            });

            */
            //for testing
            showStep("trackingLoading");

            setTimeout(function(){

                showStep("trackingResult");

            },2500);

        });


    //for delete previous search info
    const trackingModal = document.getElementById("trackingModal");

    trackingModal.addEventListener("hidden.bs.modal", function () {

        // نمایش مرحله اول
        showStep("trackingStep1");

        // پاک کردن ورودی
        document.getElementById("trackingInput").value = "";

        // پاک کردن پیام خطا
        document.getElementById("trackingError").innerHTML = "";

        // پاک کردن اطلاعات نتیجه
        document.getElementById("rTrackingCode").innerHTML = "";
        document.getElementById("rService").innerHTML = "";
        document.getElementById("rDate").innerHTML = "";
        document.getElementById("rStatus").innerHTML = "";
        document.getElementById("rDescription").innerHTML = "";

    });
</script>
