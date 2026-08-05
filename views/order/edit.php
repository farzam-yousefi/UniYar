<style>




</style>

<!--==========================
Form
===========================-->
<section class="order-wrapper">

    <div class="container">
        <div class="flex align-items-center text-center  my-3">
            <h3> اطلاعات درخواست شماره
                <?=  $data['trackingCode']?>
            </h3>
        </div>
        <div class="order-card">

            <?php
            $data['mode']="edit";
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