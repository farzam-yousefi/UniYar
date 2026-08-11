<style>
/*==================================
FAQ Hero
===================================*/

.faq-hero{

position:relative;
overflow:hidden;
padding:50px 0 30px;
background:linear-gradient(180deg,#ffffff,#F8FBFC);

}

.faq-hero::before{

content:"";
position:absolute;

width:420px;
height:420px;

border-radius:50%;

background:rgba(14,164,122,.05);

top:-120px;
left:-120px;

}

.faq-image{

max-width:500px;

}



.faq-hero p{

max-width:850px;

margin:auto;

color:#6B7280;

line-height:2;

font-size:20px;

}

@media(max-width:992px){

.faq-hero{

text-align:center;

}

.faq-image{

margin-top:35px;
max-width:420px;

}

}

@media(max-width:576px){

.faq-hero p{

font-size:15px;

}
    .faq-image{

        margin-top:25px;
        max-width:320px;

    }

}
/*==================================
FAQ Accordion
===================================*/

.faq-section{

    padding:20px 0 80px;

}

.faq-section .accordion-item{

    border:1px solid #E8ECEF;
    border-radius:18px !important;

    overflow:hidden;

    margin-bottom:18px;

    box-shadow:0 4px 14px rgba(0,0,0,.04);

    transition:.3s;

}

.faq-section .accordion-button{

    background:#fff;

    color:#17335C;

    font-weight:700;

    font-size:17px;

    padding:22px 26px;

    box-shadow:none;

}

.faq-section .accordion-button:not(.collapsed){

    background:#fff;

    color:#17335C;

    border-right:4px solid #0EA47A;

}

.faq-section .accordion-button:focus{

    box-shadow:none;

}

.faq-section .accordion-body{

    color:#6B7280;

    line-height:2;

    font-size:15px;

    padding:0 26px 24px;

}

/* فلش */

.faq-section .accordion-button::after{

    transition:.3s;

}

.faq-section .accordion-button:not(.collapsed)::after{

    filter:
            invert(47%)
            sepia(86%)
            saturate(580%)
            hue-rotate(118deg)
            brightness(90%)
            contrast(92%);

}

@media(max-width:576px){

    .faq-section .accordion-button{

        font-size:15px;

        padding:18px;

    }

    .faq-section .accordion-body{

        padding:0 18px 18px;

    }

}
/*==================================
CTA Section
===================================*/

.cta-section{

    padding:30px 0 90px;

}

.cta-box{

    position:relative;

    overflow:hidden;

    border-radius:28px;

    padding:60px 40px;

    text-align:center;

    background:linear-gradient(135deg,#0EA47A 0%,#0B8A67 100%);

    box-shadow:0 18px 45px rgba(14,164,122,.22);

}

/* هاله‌های پس‌زمینه */

.cta-box::before{

    content:"";

    position:absolute;

    width:280px;

    height:280px;

    border-radius:50%;

    background:rgba(255,255,255,.08);

    top:-120px;

    right:-100px;

}

.cta-box::after{

    content:"";

    position:absolute;

    width:220px;

    height:220px;

    border-radius:50%;

    background:rgba(255,255,255,.05);

    bottom:-120px;

    left:-80px;

}

.cta-box>*{

    position:relative;

    z-index:2;

}

.cta-box h2{

    color:#fff;

    font-size:34px;

    font-weight:800;

    margin-bottom:18px;

}

.cta-box p{

    color:rgba(255,255,255,.92);

    font-size:17px;

    line-height:2;

    max-width:650px;

    margin:0 auto 35px;

}

/* دکمه سفید */

.cta-box .btn{

    background:#fff;

    color:#0EA47A;

    border-radius:50px;

    padding:14px 34px;

    font-weight:700;

    transition:.3s;

}

.cta-box .btn:hover{

    background:#F4F8F7;

    color:#0B8A67;

    transform:translateY(-2px);

}

@media(max-width:768px){

    .cta-box{

        padding:45px 24px;

    }

    .cta-box h2{

        font-size:28px;

    }

    .cta-box p{

        font-size:15px;

    }

}
</style>
<!--==================================
FAQ Hero
===================================-->

<section class="faq-hero">

    <div class="container">

        <div class="row align-items-center gy-5">

            <!-- Text -->

            <div class="col-lg-6 order-2 order-lg-1">

                <span class="section-badge">

                    سوالات متداول

                </span>

                <h2 class="section-title mt-3">

                    پاسخ سوالاتی که بیشتر از ما می‌پرسید

                </h2>

                <p class="section-desc text-justify">

                    ممکن است قبل از ثبت درخواست یا شروع همکاری، سؤال‌هایی برایتان پیش آمده باشد.
                    در این بخش تلاش کرده‌ایم رایج‌ترین پرسش‌ها را پاسخ دهیم تا با اطمینان بیشتری تصمیم بگیرید.

                    اگر همچنان پاسخ سؤال خود را پیدا نکردید، کافیست با ما در ارتباط باشید.

                </p>

            </div>

            <!-- Illustration -->

            <div class="col-lg-6 text-center order-1 order-lg-2">

                <img src="<?= URL ?>public/images/faq/hero-faq.png"
                     alt="FAQ"
                     class="img-fluid faq-image">

            </div>

        </div>

    </div>

</section>

<section class="faq-section">

    <div class="container">

        <div class="accordion" id="faqAccordion">

            <?php foreach($data['faqs'] as $index=>$faq): ?>

                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button
                                class="accordion-button <?=($index!=0)?'collapsed':''?>"

                                data-bs-toggle="collapse"

                                data-bs-target="#faq<?=$faq['id']?>">

                            <?=$faq['question']?>

                        </button>

                    </h2>

                    <div
                            id="faq<?=$faq['id']?>"

                            class="accordion-collapse collapse <?=($index==0)?'show':''?>"

                            data-bs-parent="#faqAccordion">

                        <div class="accordion-body text-justify">

                            <?=$faq['answer']?>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>

<!--==================================
FAQ CTA
===================================-->

<section class="cta-section">

    <div class="container">

        <div class="cta-box">

            <h2>

                هنوز سوالی دارید؟

            </h2>

            <p>

                اگر پاسخ سؤال خود را پیدا نکردید،
                کارشناسان UniYar آماده پاسخگویی به شما هستند.

            </p>

            <a href="<?= URL ?>contact"

               class="btn">

                ارتباط با ما

            </a>

        </div>

    </div>

</section>