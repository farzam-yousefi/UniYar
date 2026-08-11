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

                        تدریس خصوصی، حضوری و آنلاین

                    </h3>

                    <p class="section-desc">

                        اگر در یادگیری یک درس احساس ضعف می‌کنید یا برای امتحان،
                        پروژه یا کنکور نیاز به آموزش هدفمند دارید،
                        مدرسین UniYar با برنامه‌ای متناسب با سطح شما،
                        مسیر یادگیری را سریع‌تر و ساده‌تر می‌کنند.

                    </p>

                    <div class="service-features">

                        <div class="feature-item">

                            <div class="feature-icon">

                                <i class="fas fa-user-graduate"></i>

                            </div>

                            <div>

                                <h5>

                                    مدرسین متخصص

                                </h5>

                                <p>

                                    آموزش توسط مدرسین با تجربه و متخصص هر درس.

                                </p>

                            </div>

                        </div>

                        <div class="feature-item">

                            <div class="feature-icon">

                                <i class="fas fa-laptop-house"></i>

                            </div>

                            <div>

                                <h5>

                                    حضوری یا آنلاین

                                </h5>

                                <p>

                                    برگزاری کلاس‌ها متناسب با شرایط و زمان شما.

                                </p>

                            </div>

                        </div>

                        <div class="feature-item">

                            <div class="feature-icon">

                                <i class="fas fa-route"></i>

                            </div>

                            <div>

                                <h5>

                                    برنامه آموزشی شخصی

                                </h5>

                                <p>

                                    متناسب با سطح علمی، هدف و زمان شما.

                                </p>

                            </div>

                        </div>

                        <div class="feature-item">

                            <div class="feature-icon">

                                <i class="fas fa-chart-line"></i>

                            </div>

                            <div>

                                <h5>

                                    یادگیری مؤثر

                                </h5>

                                <p>

                                    تمرکز بر درک مفاهیم، حل تمرین و آمادگی برای امتحان.

                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="hero-buttons">

                        <a href="#"

                           class="btn btn-main">

                            درخواست تدریس خصوصی

                            <i class="fas fa-chevron-left"></i>

                        </a>

                    </div>

                </div>

                <!-- Image -->

                <div class="col-lg-6 text-center order-1 order-lg-2">

                    <img src="<?= URL ?>public/images/services/private-teaching-hero.png"
                         class="img-fluid hero-image"
                         alt="تدریس خصوصی">

                </div>

            </div>

        </div>

    </section>>
</main>