<style>
    /*==================================
    Meta
    ==================================*/

    .portfolio-meta{

        display:flex;

        flex-wrap:wrap;

        gap:18px;

        margin-top:18px;

    }

    .portfolio-meta span{

        display:flex;

        align-items:center;

        gap:6px;

        color:#6B7280;

        font-size:14px;

    }
</style>
<main>
    <section class="portfolio-intro py-5">

        <div class="container text-center">

        <span class="section-badge">

            نمونه پروژه‌ها

        </span>

            <h2 class="section-title mt-3">

                بخشی از پروژه‌های انجام‌شده

            </h2>

            <p class="section-desc mx-auto" style="max-width:760px;">

                در این صفحه بخشی از پروژه‌های انجام‌شده توسط تیم UniYar را مشاهده می‌کنید.
                این نمونه‌ها تنها گوشه‌ای از تجربه ما در انجام پروژه‌های دانشگاهی در حوزه
                برنامه‌نویسی، طراحی سایت و پایگاه داده هستند.

            </p>

        </div>

    </section>
    <!--    /*==========================-->
    <!--    portfolio-filter-->
    <!--    ==========================*/-->
    <section class="portfolio-filter py-4">

        <div class="container">

            <ul class="nav nav-pills justify-content-center gap-2">

                <li class="nav-item">
                    <button class="nav-link active filter-btn"
                            data-filter="all">
                        همه
                    </button>
                </li>

                <li class="nav-item">
                    <button class="nav-link filter-btn  filter-website"
                            data-filter="website">
                        طراحی سایت
                    </button>
                </li>

                <li class="nav-item">
                    <button class="nav-link filter-btn filter-programming"
                            data-filter="programming">
                        برنامه‌نویسی
                    </button>
                </li>



                <li class="nav-item">
                    <button class="nav-link filter-btn filter-database"
                            data-filter="database">
                        پایگاه داده
                    </button>
                </li>

            </ul>

        </div>

    </section>

    <!--==============================
Portfolio Grid
===============================-->

    <section class="portfolio-section pb-5">

        <div class="container">

            <div class="row g-4">

                <!-- Programming -->

                <div class="col-lg-4 col-md-6 portfolio-item programming">

                    <div class="portfolio-card card-programming">

                        <img src="public/images/portfolio/project1.jpg">

                        <div class="portfolio-body">

                         <span class="portfolio-category">

برنامه‌نویسی
                         </span>

                            <h5>

                                سیستم مدیریت کتابخانه

                            </h5>

                            <p>

                                پیاده سازی سیستم مدیریت کتابخانه با PHP و MySQL

                            </p>

                            <div class="portfolio-meta portfolio-meta-theme">

                               <span>

                                <i class="fas fa-clock"></i>

۴ روز

                                 </span>

                                <span>

                                 <i class="fas fa-graduation-cap"></i>

کارشناسی

                                    </span>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- Website -->

                <div class="col-lg-4 col-md-6 portfolio-item website">

                    <div class="portfolio-card card-website">

                        <img src="public/images/portfolio/project2.jpg">

                        <div class="portfolio-body">

                           <span class="portfolio-category">

                              طراحی سایت

                             </span>

                            <h5>

                                فروشگاه اینترنتی

                            </h5>

                            <p>

                                طراحی سایت فروشگاهی واکنش‌گرا

                            </p>

                            <div class="portfolio-meta portfolio-meta-theme">

                                <span>

                               <i class="fas fa-clock"></i>

۶ روز

                                  </span>

                                <span>

                            <i class="fas fa-graduation-cap"></i>

کارشناسی

                                     </span>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- Database -->

                <div class="col-lg-4 col-md-6 portfolio-item database">

                    <div class="portfolio-card card-database">

                        <img src="public/images/portfolio/project3.jpg">

                        <div class="portfolio-body">

                          <span class="portfolio-category">

                             پایگاه داده

                          </span>

                            <h5>

                                سیستم مدیریت دانشگاه

                            </h5>

                            <p>

                                طراحی بانک اطلاعاتی SQL Server

                            </p>

                            <div class="portfolio-meta portfolio-meta-theme">

                                <span>

                                 <i class="fas fa-clock"></i>

۳ روز

                                  </span>

                                <span>

                                 <i class="fas fa-graduation-cap"></i>

کارشناسی ارشد

                                 </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
</main>
<script>

    document.addEventListener("DOMContentLoaded", () => {

        const buttons = document.querySelectorAll(".filter-btn");

        const cards = document.querySelectorAll(".portfolio-item");

        buttons.forEach(button => {

            button.addEventListener("click", () => {

                if (button.classList.contains("active")) return;

                buttons.forEach(btn => btn.classList.remove("active"));

                button.classList.add("active");

                const filter = button.dataset.filter;

                cards.forEach(card => {

                    card.classList.add("fade-out");

                });

                setTimeout(() => {

                    cards.forEach(card => {

                        card.classList.remove("fade-out");

                        card.classList.add("hide");

                        if (

                            filter === "all" ||

                            card.classList.contains(filter)

                        ) {

                            card.classList.remove("hide");

                            card.classList.add("fade-in");

                        }

                    });

                    requestAnimationFrame(() => {

                        cards.forEach(card => {

                            if (!card.classList.contains("hide")) {

                                card.classList.remove("fade-in");

                                card.classList.add("show");

                            }

                        });

                    });

                }, 250);

            });

        });

    });

</script>