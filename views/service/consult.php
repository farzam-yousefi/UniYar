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
                    خدمات مشاوره یونیار
                </span>

                    <h3 class="service-title">
                        مشاوره تخصصی،
                         گام اول موفقیت شما
                    </h3>

                    <p class="section-desc">

                        اگر برای انتخاب موضوع پروژه، مسیر یادگیری،
                        فناوری مناسب یا حتی برنامه‌ریزی تردید دارید،
                        مشاوران متخصص یونیار در کنر شما هستند تا بتوانید بر اساس شرایط خودتان، بهترین تصمیم را بگیرید.

                    </p>

                    <div class="service-features">

                        <div class="feature-item">

                            <div class="feature-icon">
                                <i class="fas fa-user-graduate"></i>
                            </div>

                            <div>

                                <h5>بررسی نیاز ها و شرایط شما</h5>

                                <p>

                                    متناسب با رشته، ترم، سطح دانش و هدفتان بهترین راهکار را  پیشنهاد می‌کنیم.

                                </p>

                            </div>

                        </div>

                        <div class="feature-item">

                            <div class="feature-icon">
                                <i class="fas fa-route"></i>
                            </div>

                            <div>

                                <h5>انتخاب مسیر و فن آوری مناسب</h5>

                                <p>

                                    مناسب‌ترین مسیر برای یادگیری و انجام پروژه را به شما معرفی خواهیم کرد.

                                </p>

                            </div>

                        </div>

                        <div class="feature-item">

                            <div class="feature-icon">
                                <i class="fas fa-lightbulb"></i>
                            </div>

                            <div>

                                <h5>انتخاب موضوع پروژه</h5>

                                <p>

                                    کمک در انتخاب موضوعی جدید، کاربردی، قابل دفاع و متناسب با توانایی شما.

                                </p>

                            </div>

                        </div>

                        <div class="feature-item">

                            <div class="feature-icon">
                                <i class="fas fa-comments"></i>
                            </div>

                            <div>

                                <h5>پاسخ به سوالات تخصصی</h5>

                                <p>

                                    رفع ابهام و ارائه راهکار مناسب توسط تیمی از متخصصان با تجربه.

                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="hero-buttons justify-content-center">

                        <a href="#" class="btn btn-main">

                            ثبت درخواست مشاوره
                            <i class="fas fa-chevron-left"></i>
                        </a>

                    </div>

                </div>

                <!-- Image -->

                <div class="col-lg-6 text-center order-1 order-lg-2">

                    <img
                            src="public/images/services/consult-hero.png"
                            class=" hero-image"
                            alt="مشاوره آموزشی">

                </div>

            </div>

        </div>

    </section>
</main>