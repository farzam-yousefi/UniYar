<?php
$serviceTitle= $data['serviceTitle'] ?? '' ;
?>
<title>
    <?= $serviceTitle ?>
</title>

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
                    خدمات UniYar
                </span>

                    <h3 class="service-title">
                        رفع اشکال پروژه‌ها و کدهای برنامه‌نویسی
                    </h3>

                    <p class="section-desc">

                        اگر پروژه‌ات اجرا نمی‌شود، خطاهای عجیب دریافت می‌کنی
                        یا بخشی از کد را متوجه نمی‌شوی،
                        متخصصان UniYar در کوتاه‌ترین زمان مشکل را پیدا کرده،
                        رفع می‌کنند و دلیل آن را نیز برایت توضیح می‌دهند.

                    </p>

                    <div class="service-features">

                        <div class="feature-item">

                            <div class="feature-icon">
                                <i class="fas fa-bug"></i>
                            </div>

                            <div>

                                <h5>عیب‌یابی دقیق</h5>

                                <p>
                                    بررسی کامل پروژه و پیدا کردن ریشه خطاها.
                                </p>

                            </div>

                        </div>

                        <div class="feature-item">

                            <div class="feature-icon">
                                <i class="fas fa-code"></i>
                            </div>

                            <div>

                                <h5>توضیح کد</h5>

                                <p>
                                    فقط رفع اشکال نیست؛ دلیل خطا و راه‌حل را هم یاد می‌گیری.
                                </p>

                            </div>

                        </div>

                        <div class="feature-item">

                            <div class="feature-icon">
                                <i class="fas fa-rocket"></i>
                            </div>

                            <div>

                                <h5>بهینه‌سازی پروژه</h5>

                                <p>
                                    افزایش سرعت، خوانایی و کیفیت کدنویسی.
                                </p>

                            </div>

                        </div>

                        <div class="feature-item">

                            <div class="feature-icon">
                                <i class="fas fa-stopwatch"></i>
                            </div>

                            <div>

                                <h5>پاسخ سریع</h5>

                                <p>
                                    رفع اشکال در کوتاه‌ترین زمان ممکن.
                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="hero-buttons">

                        <a href="<?= URL ?>order" class="btn btn-main">

                            درخواست رفع اشکال

                            <i class="fas fa-chevron-left"></i>

                        </a>

                    </div>

                </div>

                <!-- Image -->

                <div class="col-lg-6 text-center order-1 order-lg-2">

                    <img src="<?= URL ?>public/images/services/debug-hero.png"
                         class="img-fluid hero-image"
                         alt="رفع اشکال">

                </div>

            </div>

        </div>

    </section>
</main>