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

    /*==============================
    rules
    ==============================*/

    .rules-link{

        margin-right:12px;

        color:#0EA47A;

        text-decoration:none;

        font-weight:600;

    }

    .rules-link:hover{

        text-decoration:underline;

    }

    .modal-content{

        border-radius:22px;

        border:none;

    }

    .modal-header{

        border-bottom:1px solid #E8ECEF;

    }

    .modal-title{

        color:#17335C;

        font-weight:700;

    }

    .modal-body{

        line-height:2.2;

        color:#5E6E82;

    }

    .modal-body h6{

        color:#17335C;

        margin-bottom:15px;

    }

    .modal-body ul{

        padding-right:20px;

    }
    .btn-main:disabled{

        opacity:.45;

        cursor:not-allowed;

    }
    .form-check-input{

        width:1.2rem;

        height:1.2rem;

        border:2px solid #9AA5B1;

    }

    .form-check-input:checked{

        background-color:#0EA47A;

        border-color:#0EA47A;

    }

    .form-check-input:focus{

        box-shadow:0 0 0 .15rem rgba(14,164,122,.18);

    }

    /*==================================
Success Modal
===================================*/

    .success-modal{

        border:none;

        border-radius:24px;

        overflow:hidden;

    }

    .success-modal .modal-body{

        padding:45px 35px;

        text-align:center;

    }

    .success-icon{

        width:90px;

        height:90px;

        margin:0 auto 25px;

        border-radius:50%;

        background:#ECFDF5;

        display:flex;

        align-items:center;

        justify-content:center;

    }

    .success-icon i{

        font-size:48px;

        color:#0EA47A;

    }

    .success-modal h3{

        color:#17335C;

        font-weight:700;

        margin-bottom:15px;

    }

    .success-modal p{

        color:#6B7280;

        margin-bottom:30px;

    }

    .tracking-box{

        background:#F8FBFF;

        border:1px solid #E8ECEF;

        border-radius:18px;

        padding:18px;

    }

    .tracking-box small{

        display:block;

        color:#7A869A;

        margin-bottom:10px;

    }

    .tracking-code{

        display:flex;

        justify-content:center;

        align-items:center;

        gap:15px;

    }

    .tracking-code span{

        font-size:24px;

        font-weight:700;

        color:#17335C;

        letter-spacing:2px;

    }

    .copy-btn{

        width:42px;

        height:42px;

        border:none;

        border-radius:12px;

        background:#0EA47A;

        color:#fff;

        transition:.25s;

    }

    .copy-btn:hover{

        background:#0B8A67;

    }

    .alert-light{

        background:#F8FBFF;

        border:1px solid #E8ECEF;

        border-radius:16px;

        color:#5E6E82;

    }
    /*==================================
Success Animation
===================================*/

    @keyframes successPop{

        0%{

            transform:scale(.4);

            opacity:0;

        }

        60%{

            transform:scale(1.15);

        }

        80%{

            transform:scale(.95);

        }

        100%{

            transform:scale(1);

            opacity:1;

        }

    }

    .success-icon{

        animation:successPop .65s ease-out;

    }
    @keyframes fadeUp{

        from{

            opacity:0;

            transform:translateY(18px);

        }

        to{

            opacity:1;

            transform:none;

        }

    }

    .tracking-box{

        animation:fadeUp .55s ease .35s both;

    }

    .copy-btn.copied{

        background:#28A745;

    }
    .tracking-code span{

        font-size:24px;

        letter-spacing:3px;

        font-weight:700;

        color:#17335C;

        user-select:all;

    }
    .success-modal{

        transform:scale(.95);

        transition:.25s;

    }

    .modal.show .success-modal{

        transform:scale(1);

    }
</style>
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
                        src="public/images/order/order-hero.png"
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
            require "views/order/orderForm.php";
            ?>


        </div>

    </div>
</section>


<!--==========================
MODAL
===========================-->
<div class="modal fade"
     id="rulesModal"
     tabindex="-1">

    <div class="modal-dialog modal-lg modal-dialog-scrollable">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    قوانین و مقررات UniYar

                </h5>

                <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <h6>ثبت درخواست</h6>

                <ul>

                    <li>اطلاعات وارد شده باید صحیح و واقعی باشد.</li>

                    <li>مسئولیت صحت فایل‌ها و توضیحات بر عهده کاربر است.</li>

                    <li>هزینه نهایی پس از بررسی درخواست اعلام می‌شود.</li>

                    <li>زمان تحویل پس از توافق نهایی مشخص خواهد شد.</li>

                    <li>UniYar متعهد به حفظ محرمانگی اطلاعات کاربران است.</li>

                </ul>

                <hr>

                <h6>حفظ حریم خصوصی</h6>

                <ul>

                    <li>اطلاعات تماس کاربران محرمانه باقی می‌ماند.</li>

                    <li>فایل‌های ارسالی فقط برای انجام همان درخواست استفاده می‌شوند.</li>

                    <li>اطلاعات کاربران در اختیار شخص ثالث قرار نخواهد گرفت.</li>

                </ul>

            </div>

        </div>

    </div>

</div>


<!--==================================
Success Modal
===================================-->

<div class="modal fade"
     id="successRequestModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content success-modal">

            <div class="modal-body">

                <div class="success-icon">

                    <i class="bi bi-check-circle-fill"></i>

                </div>

                <h3>

                    درخواست شما با موفقیت ثبت شد.

                </h3>

                <p>

                    کارشناسان UniYar در اولین فرصت درخواست شما را بررسی خواهند کرد.

                </p>

                <div class="tracking-box">

                    <small>

                        کد پیگیری

                    </small>

                    <div class="tracking-code">

                        <span id="trackingCode">

                            UY-258741

                        </span>

                        <button
                                id="copyTracking"
                                class="copy-btn"
                                type="button">

                            <i class="bi bi-copy"></i>

                        </button>

                    </div>

                </div>

                <div class="alert alert-light mt-4">

                    لطفاً این کد را ذخیره کنید.

                    <br>

                    از طریق دکمه
                    <strong>«پیگیری درخواست»</strong>
                    می‌توانید وضعیت درخواست خود را مشاهده کنید.

                </div>

                <div class="mt-4">

                    <button
                            class="btn btn-main px-5"
                            data-bs-dismiss="modal">

                        متوجه شدم

                    </button>

                </div>

            </div>

        </div>

    </div>

</div>




<script>
const checkbox = document.getElementById("acceptRules");
const submitBtn = document.getElementById("submitOrderBtn");

checkbox.addEventListener("change", function () {

submitBtn.disabled = !this.checked;

});


const input = document.getElementById("projectFiles");
const list = document.getElementById("selectedFiles");

let selectedFiles = [];

/*==========================
Add Files
==========================*/

input.addEventListener("change", function () {

    const newFiles = Array.from(this.files);

    newFiles.forEach(file => {

        const exists = selectedFiles.some(f =>
            f.name === file.name &&
            f.size === file.size &&
            f.lastModified === file.lastModified
        );

        if (!exists) {

            selectedFiles.push(file);

        }

    });

    updateInputFiles();

    renderFiles();

});


/*==========================
Update Input
==========================*/

function updateInputFiles(){

    const dt = new DataTransfer();

    selectedFiles.forEach(file => dt.items.add(file));

    input.files = dt.files;

}


/*==========================
Render Files
==========================*/

function renderFiles(){

    list.innerHTML = "";

    selectedFiles.forEach((file,index)=>{

        const ext = file.name.split(".").pop().toLowerCase();

        let icon = "bi-file-earmark";

        if(["pdf"].includes(ext))
            icon = "bi-file-earmark-pdf";

        else if(["doc","docx"].includes(ext))
            icon = "bi-file-earmark-word";

        else if(["xls","xlsx"].includes(ext))
            icon = "bi-file-earmark-excel";

        else if(["zip","rar","7z"].includes(ext))
            icon = "bi-file-earmark-zip";

        else if(["png","jpg","jpeg","gif","webp"].includes(ext))
            icon = "bi-file-earmark-image";

        const item = document.createElement("div");

        item.className = "file-item";

        item.innerHTML = `

            <div class="file-info">

                <i class="bi ${icon} file-icon"></i>

                <div>

                    <div class="file-name">

                        ${file.name}

                    </div>

                    <div class="file-size">

                        ${(file.size/1024/1024).toFixed(2)} MB

                    </div>

                </div>

            </div>

            <button
                type="button"
                class="file-remove"
                data-index="${index}">

                <i class="bi bi-x-lg"></i>

            </button>

        `;

        list.appendChild(item);

    });

}


/*==========================
Remove File
==========================*/

list.addEventListener("click",function(e){

    const btn = e.target.closest(".file-remove");

    if(!btn) return;

    const index = Number(btn.dataset.index);

    selectedFiles.splice(index,1);

    updateInputFiles();

    renderFiles();

});

/*==========================
// success modal actions//open modal
==========================*/
function myfunc() {


    const modal = new bootstrap.Modal(
        document.getElementById("successRequestModal")
    );

    document.getElementById("trackingCode").innerText = response.tracking;

    modal.show();

}
/*==========================
// success modal actions//copy code//
==========================*/
document
    .getElementById("copyTracking")
    .addEventListener("click",function(){

        const code =
            document.getElementById("trackingCode").innerText;

        navigator.clipboard.writeText(code);

        this.innerHTML =
            '<i class="bi bi-check-lg"></i>';

        setTimeout(()=>{

            this.innerHTML =
                '<i class="bi bi-copy"></i>';

        },1500);

    });


</script>