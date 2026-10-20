<?php
$portfolios = [];
if (isset($data['isFeaturedPortfolios'])) {
    $portfolios = $data['isFeaturedPortfolios'];
}
?>
<main>

    <!--    /* ================= HERO-SERVICES ================= */-->

    <section class="hero">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6"><span class="badge-soft">
                        از ایده تا تحویل کنارتان می مانیم</span>
                    <h1 class="display-4 fw-bold mt-3">هر درخواست،<br>یک راه‌حل تخصصی</h1>
                    <p class="text-muted mt-3">انجام پروژه، تدریس خصوصی، رفع اشکال و مشاوره آموزشی.</p><a
                            class="btn btn-main px-4 py-2 mt-2" href="<?= URL ?>order#orderForm">ثبت درخواست</a></div>
                <div class="col-lg-6">


                    <!--                    services carts-->
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <div class="service-card text-center">
                                <i class="bi bi-mortarboard-fill"></i>
                                <h5
                                        class="mt-3">انجام پروژه</h5></div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="service-card text-center">
                                <i class="bi bi-person-video3"></i>                            <h5
                                        class="mt-3">تدریس خصوصی</h5></div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="service-card text-center">
                                <i class="bi bi-code-slash"></i>
                                <h5 class="mt-3">رفع اشکال
                                    کد</h5></div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="service-card text-center">
                                <i class="bi bi-chat-dots-fill"></i>
                                <h5 class="mt-3">
                                    مشاوره</h5></div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

    <!--    /* =============== SOME PORTFOLIO SECTION================= */-->
    <section class="portfolio-section py-5">

        <div class="container">

            <div class="text-center mb-5">

                <h2 class="section-title">
                    نمونه‌کارهای منتخب
                </h2>

                <p class="section-subtitle">
                    بخشی از پروژه‌ها و خدمات انجام‌شده توسط UniYar
                </p>

            </div>

            <div class="row g-4">

                <!-- Cards -->

                <?php
                foreach ($portfolios

                as $portfolio) {
                    ?>
                    <div class="col-md-6 col-lg-4">

                        <div class="portfolio-card">

                            <img src="<?= URL ?>public/images/portfolios/<?= $portfolio['category'] ?>/<?= $portfolio['cover_image'] ?>"
                                 class="img-fluid portfolio-image"
                                 alt="<?= $portfolio['title'] . '-picture' ?>">

                            <div class="portfolio-body">

                        <span class="portfolio-category">

                             <?=constant(htmlspecialchars($portfolio['category'] ?? ''))?>
                        </span>

                                <h5>

                                    <?= htmlspecialchars($portfolio['title'] ?? '') ?>

                                </h5>

                                <p>

                                    <?= htmlspecialchars($portfolio['short_description'] ?? '') ?>

                                </p>

                                <div class="portfolio-tech">

                                    <?php
                                    if (!empty($portfolio['tags'])) {
                                        $items = explode('-', $portfolio['tags']);
                                        foreach ($items as $item) {
                                            ?>
                                            <span><?= htmlspecialchars($item) ?></span>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>

                            </div>

                        </div>

                    </div>
                    <?php
                }
                ?>

            </div>

            <div class="text-center mt-5">

                <a href="<?= URL ?>portfolio" class="btn btn-outline-main">

                    مشاهده همه نمونه‌کارها

                </a>

            </div>

        </div>

    </section>

    <!--    /* =============== WHY-UNIYAR SECTION================= */-->
    <section class="why-section py-5">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="section-title">چرا UniYar؟</h2>
                <p class="section-subtitle">
                    ما فقط یک سفارش را انجام نمی‌دهیم؛
                    تا رسیدن به نتیجه کنار شما هستیم.
                </p>
            </div>

            <div class="row g-4">

                <div class="col-md-6 col-lg-3">
                    <div class="why-card h-100">

                        <div class="why-icon">
                            <i class="fas fa-headset"></i>
                        </div>

                        <h5>پشتیبانی تا پایان پروژه</h5>

                        <p>
                            حتی بعد از تحویل پروژه نیز در کنار شما هستیم و در صورت نیاز راهنمایی و اصلاحات لازم انجام
                            می‌شود.
                        </p>

                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="why-card h-100">

                        <div class="why-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>

                        <h5>حفظ محرمانگی</h5>

                        <p>
                            تمامی اطلاعات، فایل‌ها و پروژه‌های شما کاملاً محرمانه باقی خواهند ماند.
                        </p>

                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="why-card h-100">

                        <div class="why-icon">
                            <i class="fas fa-clock"></i>
                        </div>

                        <h5>تحویل به موقع</h5>

                        <p>
                            زمان‌بندی شفاف و تحویل سفارش در موعد توافق شده، یکی از اصول اصلی UniYar است.
                        </p>

                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="why-card h-100">

                        <div class="why-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>

                        <h5>همکاری با افراد متخصص</h5>

                        <p>
                            خدمات توسط مدرسین و متخصصین با تجربه انجام می‌شود تا بهترین کیفیت ارائه گردد.
                        </p>

                    </div>
                </div>

            </div>

        </div>
    </section>
</main>

