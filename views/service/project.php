<?php
$serviceTitle= $data['serviceTitle'] ?? '' ;
?>
<title>
    <?= $serviceTitle ?>
</title>
<style>

/*==================================
        Portfolio
===================================*/

.portfolio-section{

    padding:50px 0;

    background:#F8FBFC;

}

.portfolio-card{

    background:#fff;

    border-radius:22px;

    overflow:hidden;

    border:1px solid #E8ECEF;

    transition:.25s;

    height:100%;

}

.portfolio-card:hover{

    transform:translateY(-8px);

    box-shadow:0 15px 35px rgba(0,0,0,.08);

}

.portfolio-card img{

    width:100%;

    height:220px;

    object-fit:cover;

}

.portfolio-body{

    padding:25px;

}

.portfolio-category{

    display:inline-block;

    background:#E8FAF4;

    color:#0EA47A;

    padding:6px 14px;

    border-radius:30px;

    font-size:13px;

    font-weight:600;

    margin-bottom:15px;

}

.portfolio-body h5{

    color:#17335C;

    font-weight:700;

    margin-bottom:12px;

}

.portfolio-body p{

    color:#6B7280;

    line-height:1.9;

    margin:0;

}

@media(max-width:768px){

    .portfolio-card img{

        height:200px;

    }

}
</style>
<main>
<!--    /*====================================-->
<!--    Breadcrumb-->
<!--    =====================================*/-->
    <section class="breadcrumb-section">

        <div class="container">

            <div class="breadcrumb-box">

                <nav aria-label="breadcrumb">

                    <ol class="breadcrumb mb-0">

                        <li class="breadcrumb-item">

                            <a href="<?=URL?>">

                                <i class="fas fa-home me-1"></i>

                                خانه

                            </a>

                        </li>

                        <li class="breadcrumb-item">

                            <a href="<?=URL?>service">

                                خدمات

                            </a>

                        </li>

                        <li class="breadcrumb-item active" aria-current="page">

                            <?= $serviceTitle ?>

                        </li>

                    </ol>

                </nav>

            </div>

        </div>

    </section>

<!--    /*==========================-->
<!--    Service Hero-->
<!--    ==========================*/-->
    <section class="service-hero">

        <div class="container">

            <div class="row align-items-center gy-5">

                <!-- Text -->

                <div class="col-lg-6 order-2 order-lg-1">
                <span class="service-badge">

                    خدمات پروژه یونییار

                </span>

                    <h3 class="service-title">

                        انجام انواع پروژه‌های دانشگاهی

                    </h3>


                    <p class="section-desc">

                        از پروژه‌های برنامه‌نویسی و طراحی سایت گرفته تا پروژه‌های تحقیقاتی و پایگاه داده،
                        همه با کیفیت بالا، مستندسازی کامل و پشتیبانی تا پایان تحویل انجام می‌شوند.

                    </p>

                    <div class="service-features">

                        <div class="feature-item">
                            <div class="feature-icon">

                                <i class="fas fa-clock"></i>

                            </div>

                            <div>

                                <h5>تحویل دقیق در زمان مقرر</h5>

                                <p>

                                    پروژه‌ها دقیقاً طبق زمان توافق شده تحویل داده می‌شوند.

                                </p>

                            </div>

                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">

                                <i class="fas fa-user-graduate"></i>

                            </div>

                            <div>

                                <h5>پشتیبانی تا پایان دفاع</h5>

                                <p>

                                    حتی بعد از پایان نیز در کنار شما تا تحویل و ارائه خواهیم بود.

                                </p>

                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">

                                <i class="fas fa-shield-alt"></i>

                            </div>

                            <div>

                                <h5>                            کدنویسی استاندارد و مستندسازی
                                </h5>

                                <p>

                                    تمام پروژه‌ها قبل از تحویل بررسی و کنترل کیفیت می‌شوند.

                                </p>

                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">

                                <i class="fas fa-comments"></i>

                            </div>

                            <div>

                                <h5>ارتباط مستقیم</h5>

                                <p>

                                    در تمام مراحل انجام پروژه از روند کار مطلع خواهید بود.

                                </p>

                            </div>
                        </div>
                    </div>

                    <div class="hero-buttons justify-content-center" >

                        <a href="#" class="btn btn-main">

                            ثبت درخواست
                            <i class="fas fa-chevron-left"></i>

                        </a>



                    </div>

                </div>

                <!-- Image -->

                <div class="col-lg-6 text-center order-1 order-lg-2">
                    <img src="<?= URL ?>public/images/services/project-hero.png"

                         class="hero-image"

                         alt="Project Service">

                </div>

            </div>

        </div>

    </section>
<!--    /*==================================-->
<!--    Portfolio-->
<!--    ===================================*/-->
    <section id="portfolio" class="portfolio-section">

        <div class="container">

            <div class="text-center mb-5">

            <span class="section-badge">

                نمونه کارها

            </span>

                <h2 class="section-title mt-3">

                    برخی از پروژه‌های انجام‌شده

                </h2>

                <p class="section-desc">

                    تنها بخشی از پروژه‌هایی که توسط تیم UniYar انجام شده‌اند.

                </p>

            </div>

            <div class="row g-4">

                <!-- Card -->

                <div class="col-lg-4 col-md-6">

                    <div class="portfolio-card">

                        <img src="<?= URL ?>public/images/portfolio/project1.jpg"
                             alt="">

                        <div class="portfolio-body">

                        <span class="portfolio-category">

                            برنامه‌نویسی

                        </span>

                            <h5>

                                سیستم مدیریت کتابخانه

                            </h5>

                            <p>

                                پروژه PHP و MySQL همراه با پنل مدیریت.

                            </p>

                        </div>

                    </div>

                </div>

                <!-- Card -->

                <div class="col-lg-4 col-md-6">

                    <div class="portfolio-card">

                        <img src="<?= URL ?>public/images/portfolio/project2.jpg"
                             alt="">

                        <div class="portfolio-body">

                        <span class="portfolio-category">

                            طراحی سایت

                        </span>

                            <h5>

                                فروشگاه اینترنتی

                            </h5>

                            <p>

                                طراحی با Bootstrap و PHP به همراه سبد خرید.

                            </p>

                        </div>

                    </div>

                </div>

                <!-- Card -->

                <div class="col-lg-4 col-md-6 mx-md-auto">

                    <div class="portfolio-card">

                        <img src="<?= URL ?>public/images/portfolio/project3.jpg"
                             alt="">

                        <div class="portfolio-body">

                        <span class="portfolio-category">

                            پایگاه داده

                        </span>

                            <h5>

                                سیستم مدیریت دانشگاه

                            </h5>

                            <p>

                                طراحی و پیاده‌سازی بانک اطلاعاتی SQL Server.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <div class="text-center mt-5">

                <a href="<?= URL ?>portfolio"
                   class="btn  btn-main px-4">

                    مشاهده همه نمونه کارها

                </a>

            </div>

        </div>

    </section>
</main>