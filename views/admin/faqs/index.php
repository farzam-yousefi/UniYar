<style>
    .accordion-header {

        overflow: hidden;

    }

    .drag-handle {

        width: 55px;

        display: flex;

        justify-content: center;

        align-items: center;

        cursor: grab;
        user-select: none;
    }

    .faq-header {

        display: flex;

        align-items: stretch;

    }

    .drag-handle:active {

        cursor: grabbing;

    }

    .faq-ghost {

        opacity: .4;

    }

    .faq-chosen {

        background: #eef7ff;

    }

    .faq-drag {

        box-shadow: 0 10px 25px rgba(0, 0, 0, .2);

    }

    .faq-header {

        display: flex;

        align-items: stretch;
    }

    .accordion-button {
        background: #E7F1FF;
        padding: 16px 0px 16px 10px;
    }

    .drag-handle:hover {
        background: #E7F1FF;

    }

    .aNonLink {
        text-decoration: none;
        color: white;
    }

    .cancel-btn:hover {
        background: rgb(75, 75, 75);
    }


</style>
<?php
$faqs = $data['faqs'] ?? [];
if (isset($_SESSION['alert-resultOperation'])) { ?>
    <script>
        myAlert.<?= $_SESSION['alert-resultOperation']['type'] ?>(
            <?= json_encode($_SESSION['alert-resultOperation']['title']) ?>,
            <?= json_encode($_SESSION['alert-resultOperation']['message']) ?>
        );

    </script>

    <?php
    unset($_SESSION['alert-resultOperation']);
    unset($_SESSION['operation']);
}
?>

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
                <div class="d-flex gap-2">

                    <button type="button" class="btn btn-primary" id="sort-faqs"
                            data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-html="true"
                            data-bs-title="جهت مرتب سازی سوالات را با کمک آیکن
                            <i class='bi bi-justify'></i>
                             جابجا کنید و در انتها دکمه ذخیره ترتیب را بزنید."
                    >
                        <i class="bi bi-sort-numeric-down me-1"></i>

                        مرتب سازی
                    </button>

                    <button type="button"
                            class="btn btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#addFaqModal">

                        <i class="bi bi-plus-circle me-1"></i>

                        افزودن سوال

                    </button>
                </div>
            </div>


            <!-- Filters -->

            <div class="card shadow-sm mb-4">

                <div class="card-body">

                    <div class="row g-3">

                        <div class="col-lg-8">
                            <form id="faqSearchForm">
                                <div class="position-relative">

                                    <input
                                            type="search" id="faqSearch" name="search"
                                            class="form-control pe-5"
                                            placeholder="جستجو...">
                                    <button
                                            type="submit"
                                            class="btn position-absolute top-50 end-0 translate-middle-y me-2 p-0 border-0">
                                        <i class="bi bi-search text-secondary"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="col-lg-4">

                            <select class="form-select" id="statusFilter">

                                <option value="all">همه وضعیت ها</option>

                                <option value="active">فعال</option>

                                <option value="nonActive">غیرفعال</option>

                            </select>

                        </div>

                    </div>

                </div>

            </div>


            <!-- FAQ LIST -->
            <form action="<?= URL ?>admin/faqs/saveSort"
                  method="post" id="sortForm">
                <input type="hidden" name="sortData" id="sortData">

                <div
                        class="accordion"
                        id="faqAccordion">

                    <?php
                    foreach ($faqs as $faq) {
                        ?>
                        <!-- item -->

                        <div class="accordion-item shadow-sm mb-3"
                             data-status="<?= $faq['is_active'] ? 'active' : 'nonActive' ?>"
                             data-id="<?= $faq['id'] ?>">

                            <h2 class="accordion-header">

                                <div class="d-flex align-items-center">


                                    <!-- Accordion -->
                                    <button type="button"
                                            class="accordion-button collapsed"

                                            data-bs-toggle="collapse"

                                            data-bs-target="#faq-<?= $faq['id'] ?>">

                                        <i class="bi bi bi-justify drag-handle"></i>

                                        <?= htmlspecialchars($faq['question'] ?? '') ?>

                                    </button>

                                </div>

                            </h2>

                            <div

                                    id="faq-<?= $faq['id'] ?>"
                                    data-bs-parent="#faqAccordion"
                                    class="accordion-collapse collapse"

                            >

                                <div class="accordion-body">

                                    <p class="mb-4">
                                        <?= htmlspecialchars($faq['answer'] ?? '') ?>
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
                                                    <?= (($faq['is_active'] ?? '') == 1) ? 'checked' : '' ?>
                                                        data-id="<?= $faq['id'] ?>"
                                                >

                                            </div>

                                        </div>


                                        <div class="col-md-4 col-sm-6">

                                            <strong>

                                                آخرین بروزرسانی

                                            </strong>

                                            <br>

                                            <span class="text-muted">

                                <?= htmlspecialchars(
                                    Helper::jaliliDate(
                                        Helper::MiladiTojalili(
                                            date('Y-m-d', strtotime($faq['updated_at'] ?? ''))
                                        )
                                    )) ?>

                            </span>

                                        </div>


                                        <div class="col-md-4">

                                            <div
                                                    class="
                                    d-flex
                                    flex-wrap
                                    justify-content-lg-end
                                    gap-2">

                                                <button type="button"
                                                        data-id="<?= $faq['id'] ?>"
                                                        data-question="<?= htmlspecialchars($faq['question'] ?? '', ENT_QUOTES) ?>"
                                                        data-answer="<?= htmlspecialchars($faq['answer'] ?? '', ENT_QUOTES) ?>"


                                                        class="btn btn-warning edit-faq-btn"

                                                        data-bs-toggle="modal"

                                                        data-bs-target="#editFaqModal">
                                                    ویرایش

                                                    <i class="bi bi-pen"></i>


                                                </button>


                                                <button data-id="<?= $faq['id'] ?>" type="button"
                                                        class="btn btn-danger delete-faq-btn"

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
                        <?php
                    }
                    ?>


                </div>


                <!-- Footer Buttons -->

                <div class="position-sticky  bottom-0 bg-white border-top py-3 mt-4">

                    <div class="justify-content-end d-flex gap-2">


                        <a href="<?= URL ?>admin/faqs"
                           class="aNonLink btn btn-secondary cancel-btn">
                            انصراف
                        </a>

                        <button class="btn btn-success" type="submit">

                            ذخیره ترتیب سوالات

                        </button>

                    </div>

                </div>
            </form>
        </div>

    </main>

</div>

<!-- Add FAQ Modal -->

<div
        class="modal fade faq-modal"
        id="addFaqModal"
        tabindex="-1"
        aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

            <form id="addForm" novalidate data-validate
                  action="<?= URL ?>admin/faqs/add" method="post">

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

                        <input data-required="متن سوال"
                               data-action="پر کنید"
                               type="text" name="question"
                               class="form-control">
                        <?php if (isset($errors['add']['question'])): ?>

                            <div class="form-error general-form-error">
                                <?= $errors['add']['question'] ?>
                            </div>

                        <?php endif; ?>
                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            پاسخ

                        </label>

                        <textarea name="answer" data-required="پاسخ سوال"
                                  data-action="پر کنید"
                                  rows="6"
                                  class="form-control"></textarea>
                        <?php if (isset($errors['add']['answer'])): ?>

                            <div class="form-error general-form-error">
                                <?= $errors['add']['answer'] ?>
                            </div>

                        <?php endif; ?>

                    </div>


                    <div>

                        <label class="form-label">

                            وضعیت

                        </label>

                        <select class="form-select" name="is_active">

                            <option value="1" selected>

                                فعال

                            </option>

                            <option value="0">

                                غیرفعال

                            </option>

                        </select>

                    </div>

                </div>


                <div class="modal-footer">

                    <button type="button"
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
        class="modal fade faq-modal"
        id="editFaqModal"
        tabindex="-1"
        aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

            <form id="editForm" novalidate data-validate
                  action="<?= URL ?>admin/faqs/edit" method="post">

                <input name="id" type="hidden"
                       id="editFaqId">

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

                        <input data-required="متن سوال"
                               data-action="پر کنید"
                               id="editFaqQuestion"
                               type="text" name="question"
                               class="form-control"
                        >

                    </div>
                    <?php if (isset($errors['edit']['question'])): ?>

                        <div class="form-error general-form-error">
                            <?= $errors['edit']['question'] ?>
                        </div>

                    <?php endif; ?>

                    <div>

                        <label class="form-label">

                            پاسخ

                        </label>

                        <textarea data-required="پاسخ سوال"
                                  data-action="پر کنید"
                                  id="editFaqAnswer"
                                  rows="6" name="answer"
                                  class="form-control"></textarea>

                        <?php if (isset($errors['edit']['answer'])): ?>

                            <div class="form-error general-form-error">
                                <?= $errors['edit']['answer'] ?>
                            </div>

                        <?php endif; ?>
                    </div>

                </div>


                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-main-cancel"
                            data-bs-dismiss="modal">

                        انصراف

                    </button>


                    <button type="submit"
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
                        class="btn-close" type="button"
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

                <button type="button"
                        class="btn btn-secondary cancel-btn"
                        data-bs-dismiss="modal">
                    انصراف

                </button>


                <button
                        type="button"
                        class="btn btn-danger">
                    <a id="target" class="aNonLink">
                        حذف
                    </a>
                </button>

            </div>

        </div>

    </div>

</div>

<script>
    /*==================================================
SORT
==================================================*/

    document.addEventListener("DOMContentLoaded", function () {

        const faqList = document.getElementById("faqAccordion");

        new Sortable(faqList, {

            animation: 200,

            handle: ".drag-handle",

            draggable: ".accordion-item",

            ghostClass: "faq-ghost",

            chosenClass: "faq-chosen",

            dragClass: "faq-drag"

        });
        document.getElementById("sortForm").addEventListener("submit", function () {
            let result = [];

            document.querySelectorAll(".accordion-item").forEach(function (item, index) {

                result.push({
                    id: item.dataset.id,
                    sort_order: index + 1
                });
            });

            document.getElementById("sortData").value = JSON.stringify(result);
        });

    });

    const sortFaqs = document.getElementById('sort-faqs');
    const sortTooltip = new bootstrap.Tooltip(sortFaqs, {
        boundary: document.body
    });

    /*==================================================
   APPLY BOTH OF SEARCH AND STATUS
   ==================================================*/
    function applyFaqFilters() {

        const statusValue =
            document.getElementById('statusFilter').value;

        const searchValue =
            normalizePersian(
                document.getElementById('faqSearch').value
            );

        document.querySelectorAll('#faqAccordion .accordion-item')
            .forEach(item => {

                const statusMatch =
                    statusValue === 'all' ||
                    item.dataset.status === statusValue;

                const text =
                    normalizePersian(item.textContent);

                const searchMatch =
                    text.includes(searchValue);

                item.style.display =
                    statusMatch && searchMatch
                        ? ''
                        : 'none';
            });
    }

    /*==================================================
  STATUS FILTER
  ==================================================*/
    const statusFilter = document.querySelector('#statusFilter');

    statusFilter.addEventListener('change', applyFaqFilters);
    /*==================================================
     SEARCH
     ==================================================*/

    document.getElementById('faqSearchForm')
        .addEventListener('submit', function (e) {

            e.preventDefault();

            applyFaqFilters();
        });

    /*==================================================
ADD/EDIT/DELETE FAQ
==================================================*/
    document.addEventListener('DOMContentLoaded', function () {

        document.querySelectorAll(
            '#addForm, #editForm'
        ).forEach(form => {

            form.addEventListener('submit', function (e) {

                if (!validateFaqForm(form)) {
                    e.preventDefault();
                }

            });

        });

    });

    $(document).on('click', '.edit-faq-btn', function () {

        document.getElementById('editFaqId').value =
            this.dataset.id;

        document.getElementById('editFaqQuestion').value =
            this.dataset.question;

        document.getElementById('editFaqAnswer').value =
            this.dataset.answer;

    });

    $(document).on('show.bs.modal', '.faq-modal', function () {

        this.querySelectorAll('.form-error')
            .forEach(error => error.remove());

        this.querySelectorAll('.is-invalid')
            .forEach(input => input.classList.remove('is-invalid'));

    });

    $(document).on('show.bs.modal', '#addFaqModal', function () {

        document.getElementById('addForm').reset();

    });

    $(document).on('click', '.delete-faq-btn', function () {
        document.getElementById('target').href =
            "<?= URL ?>admin/faqs/delete/" + this.dataset.id;

    });

    /*==================================================
CHANGING STATUS(IS_ACTIVE) of FAQS
==================================================*/
    $(document).on('change', '.form-check-input', function () {

        const checkbox = this;
        const id = checkbox.dataset.id;
        const value = checkbox.checked ? 1 : 0;

        $.ajax({
            url: "<?= URL ?>admin/faqs/changeActiveState/" + id,
            type: "POST",
            dataType: "text",//'text or json
            data: {value: value},

            beforeSend: function () {
                //$('#imgSpinner1').show();

            },
            error: function (jqXHR, textStatus, errorThrown) {

                console.error(jqXHR.status, errorThrown);
                // برگرداندن checkbox به وضعیت قبلی
                checkbox.checked = !checkbox.checked;
                myAlert.error(
                    'خطا',
                    'تغییر وضعیت با خطا مواجه شد .دوباره تلاش کنید.'
                );

            },
            success: function (data) {
                const item = checkbox.closest('.accordion-item');

                item.dataset.status =
                    value === 1 ? 'active' : 'nonActive';

                applyFaqFilters();
            },

        });

    });
</script>