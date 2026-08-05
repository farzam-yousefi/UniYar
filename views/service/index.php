<title>
    خدمات

</title>
<style>

    /*=============================
        Service Hero
==============================*/

    .service-hero {

        padding: 50px 0;

        background: linear-gradient(180deg, #ffffff, #F8FBFC);

    }

    .service-badge {

        display: inline-block;

        background: #E8FAF4;

        color: #0EA47A;

        padding: 8px 18px;

        border-radius: 30px;

        font-size: 14px;

        font-weight: 600;

    }

    .service-hero h1 {

        font-size: 52px;

        color: #17335C;

        font-weight: 800;

        line-height: 1.4;

    }

    .service-hero p {

        margin: 25px 0;

        color: #6B7280;

        line-height: 2;

        font-size: 17px;

    }

    .service-hero-img {

        max-width: 500px;

    }

    /* Responsive */

    @media (max-width: 992px) {

        .service-hero {

            text-align: center;

            padding: 70px 0;

        }

        .service-hero h1 {

            font-size: 40px;

        }

        .service-hero-img {

            margin-top: 40px;

            max-width: 500px;

        }

    }

    @media (max-width: 576px) {

        .service-hero {

            padding: 55px 0;

        }

        .service-hero h1 {

            font-size: 31px;

        }

        .service-hero p {

            font-size: 15px;

        }

    }

    /*==========================
    Services
    ===========================*/

    .services-section {

        padding: 50px 0;

        background: #fff;

    }

    .service-box {
        display: flex;

        flex-direction: column;

        height: 100%;

        background: #fff;

        border-radius: 22px;

        border: 1px solid #E5E7EB;

        padding: 35px;

        transition: .3s;

    }

    .service-box:hover {

        transform: translateY(-8px);

        box-shadow: 0 15px 35px rgba(0, 0, 0, .08);

    }


    .service-box h3{

        text-align:center;

        font-weight:700;

        color:#17335C;

        margin-bottom:18px;

    }

    .service-box p{

        text-align:center;

        color:#6B7280;

        line-height:1.9;

        margin-bottom:20px;

    }


    .service-box ul {

        margin-top: 25px;

        margin-bottom: 30px;

        padding-right: 18px;

    }
    .service-list{

        list-style:none;

        padding:0;

        margin:25px 0;

    }

    .service-list li{

        display:flex;

        align-items:center;

        gap:10px;

        margin-bottom:12px;

        color:#555;

    }

    .service-list i{

        color:#11b77d;

        font-size:15px;

    }

    .service-box li {

        margin-bottom: 10px;

        color: #555;

    }


    .service-buttons{

        display:flex;

        gap:12px;

        margin-top:auto;

    }

    .service-buttons .btn{

        display:flex;
        align-items:center;
        justify-content:center;

        height:48px;

        font-size:15px;

        line-height:1;

        font-weight:600;
        flex:1;

        border-radius:12px;
     //   padding: 0 16px;

    }
    .btn-outline-main{

        background:#fff;

        border:2px solid #0EA47A;

        color:#0EA47A;

    }

    .btn-outline-main:hover{

        background:#0EA47A;

        color:#fff;

    }
    .btn-main{

        background:#0EA47A;

        color:#fff;

        border:none;



    }

    .btn-main:hover{

        background:#0b8f69;

        color:#fff;

    }
    .service-image{

        text-align:center;

        margin-bottom:20px;

    }

    .service-image img{

        width:200px;

        height:auto;

    }
    /* Responsive */

    @media (max-width: 768px) {

        .service-box {

            padding: 28px;

        }

        .service-buttons {

            flex-direction: column;

        }
        .service-buttons .btn {
            height: 48px;
        }
    }
    /*=========================
      Process Section
=========================*/

    .process-section{

        padding:40px 0;

        background:#F8FBFC;

    }

    .process-wrapper{

        display:flex;

        align-items:flex-start;

        justify-content:space-between;

    }

    .process-item{

        width:170px;

        text-align:center;

        position:relative;

    }

    .step-number{

        width:34px;

        height:34px;

        background:#0EA47A;

        color:#fff;

        border-radius:50%;

        display:flex;

        align-items:center;

        justify-content:center;

        margin:0 auto 18px;

        font-weight:bold;

    }

    .process-icon{

        width:85px;

        height:85px;

        border-radius:50%;

        background:#E8FAF4;

        color:#0EA47A;

        display:flex;

        justify-content:center;

        align-items:center;

        margin:auto;

        font-size:34px;

        transition:.3s;

    }

    .process-item:hover .process-icon{

        background:#0EA47A;

        color:#fff;

        transform:translateY(-6px);

        box-shadow:0 10px 25px rgba(14,164,122,.25);

    }

    .process-item h5{

        margin-top:18px;

        color:#17335C;

        font-weight:700;

        font-size:17px;

    }

    .process-arrow{

        color:#0EA47A;

        font-size:30px;

        margin-top:75px;

        opacity:.6;

    }
    @media(max-width:992px){

        .process-wrapper{

            flex-direction:column;

            align-items:center;

        }

        .process-arrow{

            transform:rotate(-90deg);

            margin:18px 0;

        }

        .process-item{

            width:100%;

            max-width:280px;

        }

    }
</style>
<main>
    <!--    /* ================= HERO-SERVICES ================= */-->

    <section class="service-hero">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-7">

                <span class="service-badge">
                    خدمات تخصصی UniYar
                </span>

                    <h1 class="mt-3">

                        هر مهارت،
                        یک راه‌حل تخصصی

                    </h1>

                    <p>

                        از انجام پروژه و تدریس خصوصی گرفته تا رفع اشکال و مشاوره آموزشی،
                        تیم UniYar در کنار شماست.

                    </p>


                </div>

                <div class="col-lg-5 text-center">

                    <img src="public/images/services/hero-service.png"
                         class="img-fluid service-hero-img"
                         alt="">

                </div>

            </div>

        </div>

    </section>

    <section class="process-section">

        <div class="container">

            <div class="text-center mb-5">

                <span class="section-badge">فرآیند همکاری</span>

                <h2 class="section-title mt-3">
                    تنها در ۵ مرحله تا انجام درخواست
                </h2>

                <p class="section-desc">
                    روند انجام خدمات در UniYar کاملاً شفاف، سریع و مرحله‌به‌مرحله است.
                </p>

            </div>

            <div class="process-wrapper">

                <div class="process-item">

                    <div class="step-number">1</div>

                    <div class="process-icon">
                        <i class="fas fa-file-signature"></i>
                    </div>

                    <h5>ثبت درخواست</h5>

                </div>

                <div class="process-arrow">
                    <i class="fas fa-angle-left"></i>
                </div>

                <div class="process-item">

                    <div class="step-number">2</div>

                    <div class="process-icon">
                        <i class="fas fa-search"></i>
                    </div>

                    <h5>بررسی توسط تیم</h5>

                </div>

                <div class="process-arrow">
                    <i class="fas fa-angle-left"></i>
                </div>

                <div class="process-item">

                    <div class="step-number">3</div>

                    <div class="process-icon">
                        <i class="fas fa-coins"></i>
                    </div>

                    <h5>اعلام هزینه</h5>

                </div>

                <div class="process-arrow">
                    <i class="fas fa-angle-left"></i>
                </div>

                <div class="process-item">

                    <div class="step-number">4</div>

                    <div class="process-icon">
                        <i class="fas fa-handshake"></i>
                    </div>

                    <h5>شروع همکاری</h5>

                </div>

                <div class="process-arrow">
                    <i class="fas fa-angle-left"></i>
                </div>

                <div class="process-item">

                    <div class="step-number">5</div>

                    <div class="process-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>

                    <h5>تحویل نهایی</h5>

                </div>

            </div>

        </div>

    </section>
    <!--    /* ================= -SERVICES ================= */-->

    <section class="services-section">

        <div class="container">

            <div class="row g-4">

                <!-- پروژه -->

                <div class="col-lg-3 col-md-6 col-sm-6">

                    <div class="service-box">

                        <div class="text-center service-image">

                            <img class="img-fluid "

                                 src="public/images/services/project.png" alt="project">


                            <h3 class="pt-2">

                                انجام پروژه

                            </h3>

                            <p>

                                انجام انواع پروژه‌های دانشگاهی، برنامه‌نویسی، پایگاه داده،
                                طراحی سایت و نرم‌افزار.

                            </p>

                            <ul class="service-list">

                                <li>
                                    <i class="fas fa-check"></i>
                                    پروژه برنامه نویسی
                                </li>

                                <li>
                                    <i class="fas fa-check"></i>
                                    پروژه پایگاه داده
                                </li>

                                <li>
                                    <i class="fas fa-check"></i>
                                    طراحی سایت
                                </li>

                            </ul>
                        </div>
                            <div class="service-buttons">

                                <a href="service/projectService"
                                   class="btn btn-outline-main">

                                    جزئیات

                                </a>

                                <a href="order" class="btn btn-main">

                                    ثبت درخواست

                                </a>

                            </div>


                    </div>

                </div>

                <!-- تدریس -->

                <div class="col-lg-3 col-md-6 col-sm-6">

                    <div class="service-box">

                        <div class="text-center service-image">

                            <img class="img-fluid "
                                 src="public/images/services/teach.png" alt="private teach">
                            <h3 class="pt-2">

                                تدریس خصوصی

                            </h3>

                            <p>

                                تدریس خصوصی حضوری و آنلاین توسط مدرسین مجرب دانشگاه.

                            </p>

                            <ul class="service-list">

                                <li>
                                <i class="fas fa-check"></i>
                                برنامه‌نویسی</li>
                                <li>
                                <i class="fas fa-check"></i>

                                ریاضی</li>
                                <li>
                                <i class="fas fa-check"></i>
                                دروس تخصصی</li>

                            </ul>
                        </div>
                            <div class="service-buttons">

                                <a href="service/privateTeachingService" class="btn btn-outline-main">

                                    جزئیات

                                </a>

                                <a href="order" class="btn btn-main">

                                    ثبت درخواست

                                </a>

                            </div>


                    </div>

                </div>

                <!-- رفع اشکال -->

                <div class="col-lg-3 col-md-6 col-sm-6">

                    <div class="service-box">

                        <div class="text-center service-image">

                            <img class="img-fluid " src="public/images/services/debug.png"
                                 alt="correct-code">


                            <h3 class="pt-2">

                                رفع اشکال

                            </h3>

                            <p>

                                بررسی و رفع اشکال پروژه‌ها، کدها و تمرین‌های دانشگاهی.

                            </p>

                            <ul class="service-list">

                                <li>
                                    <i class="fas fa-check"></i>

                                    Debug
                                </li>
                                <li><i class="fas fa-check"></i>

                                    بهینه‌سازی
                                </li>
                                <li>
                                <i class="fas fa-check"></i>

                                    توضیح کد
                                </li>

                            </ul>
                        </div>
                            <div class="service-buttons">

                                <a href="service/debugService" class="btn btn-outline-main">

                                    جزئیات

                                </a>

                                <a href="order" class="btn btn-main">

                                    ثبت درخواست

                                </a>

                            </div>


                    </div>

                </div>

                <!-- مشاوره -->

                <div class="col-lg-3 col-md-6 col-sm-6">

                    <div class="service-box">

                        <div class="text-center service-image">

                            <img class="img-fluid " src="public/images/services/consult.png"
                                 alt="consultance">


                            <h3 class="pt-2">

                                مشاوره آموزشی

                            </h3>

                            <p>

                                انتخاب موضوع پروژه، مسیر یادگیری و برنامه‌ریزی تحصیلی.

                            </p>

                            <ul class="service-list">

                                <li>
                                    <i class="fas fa-check"></i>

                                    انتخاب پروژه
                                </li>

                                <li>
                                    <i class="fas fa-check"></i>انتخاب مسیر یادگیری
                                </li>

                                <li>
                                    <i class="fas fa-check"></i>مشاوره تخصصی
                                </li>

                            </ul>
                        </div>
                            <div class="service-buttons">

                                <a href="service/consultService"
                                        class="btn btn-outline-main">

                                    جزئیات

                                </a>

                                <a href="order" class="btn btn-main">

                                    ثبت درخواست

                                </a>

                            </div>


                    </div>

                </div>

            </div>

        </div>

    </section>
</main>

