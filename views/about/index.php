<?php
print_r($data);
?>
<style>

    /*==========================
ABOUT HERO
===========================*/

    .hero-section{

        background:#F8FBFF;

    }



    /*==========================
    ABOUT STORY
    ===========================*/

    .about-story{

        background:#fff;

    }

    .section-badge{

        display:inline-block;

        background:#EAF8F3;

        color:#0EA47A;

        padding:8px 18px;

        border-radius:50px;

        font-weight:600;

    }

    .section-title h2{

        color:#17335C;

        font-weight:800;

    }

    .story-card{

        background:#fff;

        border:1px solid #E8ECEF;

        border-radius:22px;

        padding:20px;

        box-shadow:0 10px 35px rgba(16,42,67,.05);

    }

    .story-card p{

        color:#5E6E82;

        font-size:1.08rem;

        line-height:2.2;

        margin-bottom:22px;

    }

    .story-card p:last-child{

        margin-bottom:0;

    }


    /*==========================
    Responsive
    ===========================*/

    @media(max-width:991px){

        .hero-title{

            font-size:2rem;

        }

        .story-card{

            padding:30px;

        }

    }

    /*================================
About Timeline
================================*/

    .about-features{

        background:#fff;

    }

    .section-desc{

        max-width:700px;

        margin:auto;

        color:#6B7280;

    }


    .timeline{

        position:relative;

        max-width:900px;

        margin:auto;

        padding-right:35px;

    }


    .timeline::before{

        content:"";

        position:absolute;

        top:0;

        right:17px;

        width:3px;

        height:100%;

        background:#E5E7EB;

    }


    .timeline-item{

        position:relative;

        display:flex;

        align-items:flex-start;

        gap:28px;

        padding-bottom:45px;

    }


    .timeline-item:last-child{

        padding-bottom:0;

    }


    .timeline-icon{

        width:38px;

        height:38px;

        border-radius:50%;

        background:#0EA47A;

        color:#fff;

        display:flex;

        align-items:center;

        justify-content:center;

        font-size:18px;

        flex-shrink:0;

        position:relative;

        z-index:2;

    }

    .timeline-icon-larger{
        font-size:24px;
    }


    .timeline-content{

        flex:1;

        padding-bottom:25px;

        border-bottom:1px solid #E8ECEF;

    }


    .timeline-item:last-child .timeline-content{

        border:none;

    }


    .timeline-content h4{

        color:#17335C;

        font-weight:700;

        margin-bottom:8px;

    }


    .timeline-content p{

        margin:0;

        color:#6B7280;

    }
    /*==========================
About Statistics
===========================*/

    .about-stats{

        padding:70px 0;

        background:#F8FBFF;

        border-top:1px solid #EEF3F7;

        border-bottom:1px solid #EEF3F7;

    }

    .stat-item{

        position:relative;

    }

    /* خط جداکننده بین ستون‌ها */

    .stat-item::after{

        content:"";

        position:absolute;

        left:0;

        top:50%;

        transform:translateY(-50%);

        width:1px;

        height:65px;

        background:#E2E8F0;

    }

    .col-lg-3:last-child .stat-item::after{

        display:none;

    }

    .stat-item h2{

        font-size:42px;

        font-weight:800;

        color:#0EA47A;

        margin-bottom:10px;

    }

    .stat-item span{

        color:#5E6E82;

        font-size:17px;

        font-weight:500;

    }

    @media(max-width:991px){

        .stat-item::after{

            display:none;

        }

        .stat-item h2{

            font-size:34px;

        }

    }
</style>
<!--/*==========================-->
<!--ABOUT HERO-->
<!--===========================*/-->
<section class="hero-section py-5">
    <div class="container">

        <div class="row align-items-center gy-5">

            <!-- Text -->
            <div class="col-lg-6">

                <span class="hero-badge">
                    درباره یونیار
                </span>

                <h1 class="hero-title mt-3">
                    همراه مطمئن مسیر موفقیت دانشگاهی
                </h1>

                <p class="hero-desc mt-4 text-justify">

                    UniYar بستری برای اتصال دانشجویان، متخصصان و اساتید است تا
                    انجام پروژه‌های دانشگاهی، یادگیری و دریافت مشاوره تخصصی،
                    سریع‌تر، مطمئن‌تر و باکیفیت‌تر انجام شود.

                </p>

            </div>


            <!-- Illustration -->

            <div class="col-lg-6 text-center">

                <img
                        src="public/images/about/about-hero.png"
                        class="img-fluid hero-image mt-2"
                        alt="UniYar About">

            </div>

        </div>

    </div>
</section>

<!--/*==========================-->
<!--ABOUT STORY-->
<!--===========================*/-->
<section class="about-story py-2">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-10">

                <div class="section-title text-center mb-3">

                    <span class="section-badge">

                        داستان UniYar

                    </span>

                    <h2 class="mt-3">

                        چرا UniYar شکل گرفت؟

                    </h2>

                </div>


                <div class="story-card text-justify">

                    <p>

                        UniYar با هدف ساده‌تر کردن مسیر انجام پروژه‌های دانشگاهی،
                        یادگیری و دریافت خدمات تخصصی ایجاد شده است.
                        ما باور داریم هر دانشجو باید بتواند در کوتاه‌ترین زمان،
                        به متخصص مناسب دسترسی داشته باشد و بدون دغدغه،
                        مسیر یادگیری یا انجام پروژه خود را مدیریت کند.

                    </p>

                    <p>

                        تمرکز ما بر کیفیت خدمات، شفافیت فرآیندها،
                        حفظ محرمانگی اطلاعات و ایجاد تجربه‌ای مطمئن برای کاربران است.
                        از ثبت درخواست تا پایان همکاری،
                        تلاش می‌کنیم همراهی قابل اعتماد برای دانشجویان باشیم.

                    </p>

                    <p>

                        امروز UniYar تنها یک پلتفرم انجام پروژه نیست؛
                        بلکه فضایی برای یادگیری، مشاوره و رشد علمی است
                        تا هر دانشجو بتواند با اطمینان بیشتری به اهداف آموزشی خود برسد.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!--/*==========================-->
<!--WHY US-->
<!--===========================*/-->
<section class="about-features py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-badge">
                چرا UniYar؟
            </span>

            <h2 class="mt-3">
                چرا کاربران UniYar را انتخاب می‌کنند؟
            </h2>

            <p class="section-desc">
                ما تلاش می‌کنیم تجربه‌ای مطمئن، سریع و حرفه‌ای برای دانشجویان فراهم کنیم.
            </p>

        </div>


        <div class="timeline">

            <div class="timeline-item">

                <div class="timeline-icon">
                    🎯
                </div>

                <div class="timeline-content">

                    <h4>کیفیت خدمات</h4>

                    <p>
                        متخصصان منتخب با تجربه واقعی
                    </p>

                </div>

            </div>


            <div class="timeline-item">

                <div class="timeline-icon">
                    ⚡
                </div>

                <div class="timeline-content">

                    <h4>تحویل به‌موقع</h4>

                    <p>
                        متعهد به زمان‌بندی توافق‌شده
                    </p>

                </div>

            </div>


            <div class="timeline-item">

                <div class="timeline-icon timeline-icon-larger">
                    🤝
                </div>

                <div class="timeline-content">

                    <h4>پشتیبانی واقعی</h4>

                    <p>
                        تا پایان مسیر همراه شما هستیم
                    </p>

                </div>

            </div>


            <div class="timeline-item">

                <div class="timeline-icon">
                    🔒
                </div>

                <div class="timeline-content">

                    <h4>حفظ محرمانگی</h4>

                    <p>
                        اطلاعات شما کاملاً محفوظ خواهد ماند.
                    </p>

                </div>

            </div>


            <div class="timeline-item">

                <div class="timeline-icon">
                    💬
                </div>

                <div class="timeline-content">

                    <h4>ارتباط مستقیم</h4>

                    <p>
                        شفاف، سریع و بدون پیچیدگی
                    </p>

                </div>

            </div>


            <div class="timeline-item">

                <div class="timeline-icon">
                    ✨
                </div>

                <div class="timeline-content">

                    <h4>تنوع خدمات</h4>

                    <p>
                        پروژه، آموزش، مشاوره و رفع اشکال
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!--==========================
Statistics
===========================-->

<section class="about-stats py-5">

    <div class="container">

        <div class="row text-center gy-4">

            <div class="col-6 col-lg-3">

                <div class="stat-item">

                    <h2>500+</h2>

                    <span>پروژه انجام‌شده</span>

                </div>

            </div>

            <div class="col-6 col-lg-3">

                <div class="stat-item">

                    <h2>300+</h2>

                    <span>دانشجو</span>

                </div>

            </div>

            <div class="col-6 col-lg-3">

                <div class="stat-item">

                    <h2>50+</h2>

                    <span>متخصص</span>

                </div>

            </div>

            <div class="col-6 col-lg-3">

                <div class="stat-item">

                    <h2>98%</h2>

                    <span>رضایت کاربران</span>

                </div>

            </div>

        </div>

    </div>

</section>