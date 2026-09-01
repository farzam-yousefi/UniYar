<style>
    /*==============================
 Hero
 ==============================*/

    .hero-section {

        padding: 40px 0 60px;

        background: #F8FBFF;

    }

    .hero-badge {

        display: inline-block;

        background: #E8F8F3;

        color: #0EA47A;

        padding: 8px 18px;

        border-radius: 50px;

        font-size: .9rem;

        font-weight: 600;

        margin-bottom: 22px;

    }

    .hero-title {

        color: #17335C;

        font-size: 2.7rem;

        font-weight: 800;

        line-height: 1.6;

        margin-bottom: 20px;

    }

    .hero-desc {

        color: #5E6E82;

        font-size: 1.08rem;

        line-height: 2.2;

        margin-bottom: 0;

    }

    .hero-image {

        max-width: 100%;

    }

    /*==============================
    Intro
    ==============================*/

    .section-intro {

        padding: 45px 0;

    }

    .section-intro h2 {

        color: #17335C;

        font-size: 2rem;

        font-weight: 700;

        margin-bottom: 20px;

    }

    .section-intro p {

        max-width: 720px;

        margin: auto;

        color: #5E6E82;

        line-height: 2.2;

    }

</style>

<title> ثبت درخواست </title>
<!--==========================
Hero
===========================-->

<section class="hero-section">

    <div class="container">

        <div class="row align-items-center gy-5">

            <!-- Text -->

            <div class="col-lg-6">

                <span class="hero-badge">

                    ثبت درخواست

                </span>

                <h1 class="hero-title">

                    پروژه یا نیاز آموزشی خود را ثبت کنید

                </h1>

                <p class="hero-desc">

                    درخواست خود را ثبت کنید تا در کوتاه‌ترین زمان
                    توسط کارشناسان UniYar بررسی شده و مناسب‌ترین متخصص
                    به شما معرفی شود.

                </p>

            </div>

            <!-- Illustration -->

            <div class="col-lg-6 text-center">

                <img
                        src="<?= URL ?>public/images/order/order-hero.png"
                        class="img-fluid hero-image"
                        alt="ثبت درخواست">

            </div>

        </div>

    </div>

</section>


<!--==========================
Intro
===========================-->

<section class="section-intro">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8 text-center">

                <h2>

                    ثبت درخواست تنها کمتر از ۲ دقیقه زمان می‌برد

                </h2>

                <p>

                    پس از ثبت درخواست، کارشناسان UniYar آن را بررسی کرده و
                    در سریع‌ترین زمان با شما تماس خواهند گرفت.

                </p>

            </div>

        </div>

    </div>

</section>

<!--==========================
Form
===========================-->
<section class="order-wrapper">

    <div class="container">

        <div class="order-card">
            <?php
            $data['mode']="add";
            require "views/order/add-editOrderForm.php";
            ?>


        </div>

    </div>
</section>




