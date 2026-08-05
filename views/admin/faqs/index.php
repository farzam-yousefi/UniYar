<style>
    .accordion-header{

        overflow:hidden;

    }
    .drag-handle{

        width:55px;

        display:flex;

        justify-content:center;

        align-items:center;

        cursor:grab;
        user-select:none;
    }
    .faq-header{

        display:flex;

        align-items:stretch;

    }


    .drag-handle:active{

        cursor:grabbing;

    }
    .faq-ghost{

        opacity:.4;

    }

    .faq-chosen{

        background:#eef7ff;

    }

    .faq-drag{

        box-shadow:0 10px 25px rgba(0,0,0,.2);

    }

    .faq-header {

        display: flex;

        align-items: stretch;
    }
    .accordion-button{
        background:#E7F1FF;
        padding:16px 0px  16px 10px;
    }
    .drag-handle : hover{
        background: #E7F1FF;

    }
</style>
<div class="admin-layout">

    <?php require "views/layout/adminPanel/sidebar.php"; ?>
    <main class="admin-content">


        <div class="container-fluid">


    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="mb-1 fw-bold">
                سوالات متداول
            </h3>

            <p class="text-muted mb-0">
                مدیریت سوالات متداول سایت
            </p>
        </div>

        <button
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#addFaqModal">

            <i class="bi bi-plus-circle me-1"></i>

            افزودن سوال

        </button>

    </div>



    <!-- Filters -->

    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <div class="row g-3">

                <div class="col-lg-8">

                    <div class="position-relative">

                        <input
                            type="text"
                            class="form-control pe-5"
                            placeholder="جستجو...">

                        <i class="bi bi-search position-absolute top-50 end-0 translate-middle-y me-3 text-secondary"></i>

                    </div>

                </div>

                <div class="col-lg-4">

                    <select class="form-select">

                        <option>همه وضعیت ها</option>

                        <option>فعال</option>

                        <option>غیرفعال</option>

                    </select>

                </div>

            </div>

        </div>

    </div>




    <!-- FAQ LIST -->

    <div
        class="accordion"
        id="faqAccordion">



        <!-- item -->

        <div class="accordion-item shadow-sm mb-3" data-id="15">

            <h2 class="accordion-header">

                <div class="d-flex align-items-center">


                    <!-- Accordion -->
                    <button
                        class="accordion-button collapsed"

                        data-bs-toggle="collapse"

                        data-bs-target="#faq1">

                        <i class="bi bi bi-justify drag-handle"></i>


                        چگونه سفارش ثبت کنم؟

                    </button>

                </div>

            </h2>

            <div

                id="faq1"

                class="accordion-collapse collapse"

                data-bs-parent="#faqAccordion">

                <div class="accordion-body">

                    <p class="mb-4">

                        ابتدا فرم ثبت درخواست را تکمیل کرده و سپس اطلاعات لازم را وارد نمایید.
                        پس از بررسی، کارشناسان با شما تماس خواهند گرفت.

                    </p>



                    <hr>



                    <div class="row align-items-center gy-3">

                        <div class="col-md-4 col-sm-6">

                            <strong>

                                وضعیت

                            </strong>

                            <br>

                            <div class="form-check form-switch mt-2">

                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    checked>

                            </div>

                        </div>



                        <div class="col-md-4 col-sm-6">

                            <strong>

                                آخرین بروزرسانی

                            </strong>

                            <br>

                            <span class="text-muted">

                                1405/05/11

                            </span>

                        </div>



                        <div class="col-md-4">

                            <div
                                class="
                                    d-flex
                                    flex-wrap
                                    justify-content-lg-end
                                    gap-2">

                                <button
                                    class="btn btn-warning"

                                    data-bs-toggle="modal"

                                    data-bs-target="#editFaqModal">
                                    ویرایش

                                    <i class="bi bi-pen"></i>


                                </button>



                                <button
                                    class="btn btn-danger"

                                    data-bs-toggle="modal"

                                    data-bs-target="#deleteFaqModal">

                                    حذف
                                    <i class="bi bi-trash"></i>

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>





        <!-- item -->

        <div class="accordion-item shadow-sm mb-3" data-id="16">

            <h2 class="accordion-header">

                <button
                    class="accordion-button collapsed"

                    data-bs-toggle="collapse"

                    data-bs-target="#faq2">

                    <i class="bi bi bi-justify drag-handle"></i>


                    هزینه پروژه چگونه محاسبه می‌شود؟

                </button>

            </h2>

            <div

                id="faq2"

                class="accordion-collapse collapse"

                data-bs-parent="#faqAccordion">

                <div class="accordion-body">

                    هزینه هر پروژه بر اساس زمان، حجم کار و تخصص مورد نیاز تعیین می‌شود.

                    <hr>

                    <div class="row align-items-center gy-3">

                        <div class="col-md-4 col-sm-6">

                            <strong>

                                وضعیت

                            </strong>

                            <br>

                            <div class="form-check form-switch mt-2">

                                <input
                                    class="form-check-input"
                                    type="checkbox">

                            </div>

                        </div>



                        <div class="col-md-4 col-sm-6">

                            <strong>

                                آخرین بروزرسانی

                            </strong>

                            <br>

                            <span class="text-muted">

                                1405/05/09

                            </span>

                        </div>



                        <div class="col-md-4">

                            <div
                                class="
                                    d-flex
                                    flex-wrap
                                    justify-content-lg-end
                                    gap-2">

                                <button
                                    class="btn btn-warning"

                                    data-bs-toggle="modal"

                                    data-bs-target="#editFaqModal">

                                    ویرایش
                                    <i class="bi bi-pen"></i>
                                </button>



                                <button
                                    class="btn btn-danger"

                                    data-bs-toggle="modal"

                                    data-bs-target="#deleteFaqModal">

                                    حذف
                                    <i class="bi bi-trash"></i>
                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>




    </div>



    <!-- Footer Buttons -->

    <div
        class="
            position-sticky
            bottom-0
            bg-white
            border-top
            py-3
            mt-4">

        <div
            class="
                d-flex
                justify-content-end
                gap-2">

            <button class="btn btn-main-cancel">

                انصراف

            </button>

            <button class="btn btn-success">

                ذخیره تغییرات

            </button>

        </div>

    </div>

</div>

    </main>

</div>

<!-- Add FAQ Modal -->

<div
    class="modal fade"
    id="addFaqModal"
    tabindex="-1"
    aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

            <form>

                <div class="modal-header">

                    <h5 class="modal-title">

                        افزودن سوال جدید

                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>


                <div class="modal-body">

                    <div class="mb-3">

                        <label class="form-label">

                            سوال

                        </label>

                        <input
                            type="text"
                            class="form-control">

                    </div>


                    <div class="mb-3">

                        <label class="form-label">

                            پاسخ

                        </label>

                        <textarea
                            rows="6"
                            class="form-control"></textarea>

                    </div>


                    <div>

                        <label class="form-label">

                            وضعیت

                        </label>

                        <select class="form-select">

                            <option value="1">

                                فعال

                            </option>

                            <option value="0">

                                غیرفعال

                            </option>

                        </select>

                    </div>

                </div>


                <div class="modal-footer">

                    <button
                        class="btn btn-main-cancel"
                        data-bs-dismiss="modal">

                        انصراف

                    </button>


                    <button
                        type="submit"
                        class="btn btn-primary">

                        ذخیره

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<!-- Edit FAQ Modal -->

<div
    class="modal fade"
    id="editFaqModal"
    tabindex="-1"
    aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

            <form>

                <div class="modal-header">

                    <h5 class="modal-title">

                        ویرایش سوال

                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>



                <div class="modal-body">

                    <div class="mb-3">

                        <label class="form-label">

                            سوال

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="چگونه سفارش ثبت کنم؟">

                    </div>


                    <div>

                        <label class="form-label">

                            پاسخ

                        </label>

                        <textarea
                            rows="6"
                            class="form-control">

ابتدا فرم ثبت درخواست را تکمیل نمایید...

                        </textarea>

                    </div>

                </div>



                <div class="modal-footer">

                    <button
                        class="btn btn-main-cancel"
                        data-bs-dismiss="modal">

                        انصراف

                    </button>


                    <button
                        class="btn btn-warning">

                        ذخیره تغییرات

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<!-- Delete FAQ Modal -->

<div
    class="modal fade"
    id="deleteFaqModal"
    tabindex="-1"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    حذف سوال

                </h5>

                <button
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>



            <div class="modal-body text-center">

                <i
                    class="fa-solid fa-circle-exclamation
                        text-danger
                        fs-1
                        mb-3">
                </i>

                <h5>

                    آیا از حذف این سوال اطمینان دارید؟

                </h5>

                <p class="text-muted mb-0">

                    این عملیات قابل بازگشت نخواهد بود.

                </p>

            </div>



            <div class="modal-footer justify-content-center">

                <button
                    class="btn btn-main-cancel"
                    data-bs-dismiss="modal">

                    انصراف

                </button>


                <button
                    class="btn btn-danger">

                    حذف

                </button>

            </div>

        </div>

    </div>

</div>

<script>
    const faqList = document.getElementById("faqAccordion");

    new Sortable(faqList, {

        animation: 200,

        handle: ".drag-handle",

        draggable: ".accordion-item",

        ghostClass: "faq-ghost",

        chosenClass: "faq-chosen",

        dragClass: "faq-drag"

    });

    const order = [];

    document
        .querySelectorAll(".accordion-item")
        .forEach(item=>{

            order.push(item.dataset.id);

        });

    console.log(order);
</script>