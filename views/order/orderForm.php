<style>
    /*==============================
Upload Box
==============================*/

    .upload-box{

        border:2px dashed #D6DEE8;

        border-radius:18px;

        background:#FAFCFE;

        transition:.25s;

    }

    .upload-box:hover{

        border-color:#0EA47A;

        background:#F4FCF8;

    }

    .upload-label{

        display:flex;

        flex-direction:column;

        align-items:center;

        justify-content:center;

        text-align:center;

        cursor:pointer;

        padding:45px 20px;

        margin:0;

    }

    .upload-label i{

        font-size:42px;

        color:#0EA47A;

        margin-bottom:18px;

    }

    .upload-label h5{

        color:#17335C;

        font-weight:700;

        margin-bottom:8px;

    }

    .upload-label p{

        color:#6B7280;

        margin-bottom:10px;

    }

    .upload-label small{

        color:#9AA5B1;

        line-height:1.9;

    }

    /*==============================
    Selected Files
    ==============================*/
    .selected-files{

        margin-top:20px;

    }

    .file-item{

        display:flex;

        justify-content:space-between;

        align-items:center;

        padding:14px 18px;

        margin-bottom:12px;

        border:1px solid #E8ECEF;

        border-radius:14px;

        background:#F8FBFF;

    }

    .file-info{

        display:flex;

        align-items:center;

        gap:14px;

    }

    .file-icon{

        font-size:28px;

        color:#0EA47A;

    }

    .file-name{

        color:#17335C;

        font-weight:600;

        margin-bottom:4px;

    }

    .file-size{

        color:#7A869A;

        font-size:.88rem;

    }

    .file-remove{

        width:38px;

        height:38px;

        border:none;

        border-radius:50%;

        background:#FFECEC;

        color:#DC3545;

        transition:.2s;

    }

    .file-remove:hover{

        background:#DC3545;

        color:#fff;

    }

    .file-remove i{

        pointer-events:none;

    }


</style>

<form class="order-form">

    <!-- اطلاعات شخصی -->

    <div class="form-section mb-1">

        <h3 class="form-section-title">

            اطلاعات شخصی

        </h3>

        <div class="row g-4">

            <div class="col-lg-4 col-md-6">

                <div class="form-group">

                    <label>نام و نام خانوادگی *</label>

                    <input
                        type="text"
                        class="form-control-custom"
                        placeholder="مثلاً: علی رضایی">

                </div>

            </div>

            <div class="col-lg-4 col-md-6">

                <div class="form-group">

                    <label>شماره موبایل *</label>

                    <input
                        type="text"
                        class="form-control-custom"
                        placeholder="09xxxxxxxxx">

                </div>

            </div>

            <div class="col-lg-4 col-md-6">

                <div class="form-group">

                    <label>ایمیل</label>

                    <input
                        type="email"
                        class="form-control-custom"
                        placeholder="example@email.com">

                </div>

            </div>

        </div>

    </div>


    <!-- اطلاعات درخواست -->

    <div class="form-section">

        <h3 class="form-section-title">

            اطلاعات درخواست

        </h3>

        <div class="row g-4">

            <div class="col-lg-4 col-md-6">

                <div class="form-group">

                    <label>نوع خدمت *</label>

                    <select class="form-select-custom">

                        <option>انتخاب کنید</option>

                        <option>انجام پروژه</option>

                        <option>رفع اشکال</option>

                        <option>تدریس خصوصی</option>

                        <option>مشاوره</option>

                    </select>

                </div>

            </div>

            <div class="col-lg-4 col-md-6">

                <div class="form-group">

                    <label>رشته *</label>

                    <select class="form-select-custom">

                        <option>انتخاب کنید</option>

                    </select>

                </div>

            </div>

            <div class="col-lg-4 col-md-6">

                <div class="form-group">

                    <label>مقطع *</label>

                    <select class="form-select-custom">

                        <option>انتخاب کنید</option>

                    </select>

                </div>

            </div>

        </div>

    </div>


    <!-- جزئیات -->

    <div class="form-section">

        <h3 class="form-section-title">

            جزئیات درخواست

        </h3>

        <div class="row g-4">

            <div class="col-12">

                <div class="form-group">

                    <label>عنوان درخواست *</label>

                    <input
                        type="text"
                        class="form-control-custom"
                        placeholder="عنوان پروژه یا درخواست">

                </div>

            </div>

            <div class="col-12">

                <div class="form-group">

                    <label>توضیحات *</label>

                    <textarea
                        rows="7"
                        class="form-control-custom"
                        placeholder="جزئیات درخواست خود را بنویسید..."></textarea>

                </div>

            </div>

            <div class="col-lg-4 col-md-6">

                <div class="form-group">

                    <label>زمان تحویل</label>

                    <input
                        type="date"
                        class="form-control-custom">

                </div>

            </div>

            <div class="col-lg-4 col-md-6">

                <div class="form-group">

                    <label>بودجه تقریبی</label>

                    <input
                        type="number"
                        class="form-control-custom"
                        placeholder="مثلاً 1500000">

                </div>

            </div>

            <div class="col-12">

                <div class="form-group">

                    <label>

                        فایل‌های پروژه

                    </label>

                    <div class="upload-box">

                        <input
                            type="file"
                            id="projectFiles"
                            name="projectFiles[]"
                            multiple
                            hidden>

                        <label
                            class="upload-label"
                            for="projectFiles">

                            <i class="bi bi-cloud-arrow-up"></i>

                            <h5>

                                فایل‌های خود را اینجا انتخاب کنید

                            </h5>

                            <p>

                                یا روی این قسمت کلیک کنید

                            </p>

                            <small>

                                PDF • Word • ZIP • Image

                                <br>

                                حداکثر 30MB برای هر فایل

                            </small>

                        </label>

                    </div>

                    <div
                        id="selectedFiles"
                        class="selected-files">

                    </div>

                </div>

            </div>

        </div>

    </div>

    <?php
    if($data['mode']=="add") {
        ?>

        <div class="form-check ">

            <input
                class="form-check-input fw-bold"
                type="checkbox"
                id="acceptRules">

            <label
                class="form-check-label"
                for="acceptRules">

                قوانین و مقررات را مطالعه کرده‌ام.

            </label>

            <a href="#"
               data-bs-toggle="modal"
               data-bs-target="#rulesModal"
               class="rules-link">

                مطالعه قوانین

            </a>

        </div>
<div class="flex text-center mt-4">
        <button
            id="submitOrderBtn"
            class="btn btn-main px-5 mt-lg-2" onclick="myfunc()"
            disabled>

            ثبت درخواست

        </button>
    <a class="nonLink" href="service">
        <button
                id="cancelOrderChangeBtn" type="button"
                class="btn btn-main-cancel px-5 mt-lg-2" onclick=""
        >

            انصراف
        </button>
    </a>
</div>
        <?php
    }
    if($data['mode']=="edit") {
        ?>
    <div class="flex text-center">
        <button
            id="saveOrderChangeBtn"
            class="btn btn-main px-5 mt-lg-2" onclick=""
            >

            ذخیره

        </button>
        <a class="nonLink" href="order">
        <button
            id="cancelOrderChangeBtn" type="button"
            class="btn btn-main-cancel px-5 mt-lg-2" onclick=""
            >

                انصراف
        </button>
        </a>
    </div>
        <?php
    }
    ?>

</form>
