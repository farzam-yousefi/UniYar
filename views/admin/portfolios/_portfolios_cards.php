<?php


if (isset($data['portfolios'])) {
    $portfolios = $data['portfolios'];
    foreach ($portfolios as &$portfolio) {

        $portfolio['started_date'] =
            Helper::MiladiTojalili((string)$portfolio['started_date'] ?? '', '-');

        $portfolio['completed_date'] =
            Helper::MiladiTojalili((string)$portfolio['completed_date'] ?? '', '-');
    }

    unset($portfolio);
} else
    $portfolios = [];
?>
<!--==============================
               Portfolios Grid
               ==============================-->


<?php foreach ($portfolios as $portfolio) {
    $cat = strtolower($portfolio['category'] ?? '');
    ?>

    <div class="portfolio-item <?= $cat ?>"
        <?php
        $started = Helper::jaliliToMiladi($portfolio['started_date'] ?? '')
        ?>

         data-started-at="<?= $started ?>  "
         data-display-order="<?= $portfolio['display_order'] ?? '' ?>">
        <div class="portfolio-card card-<?= $cat ?>"
            <?php
            $created = Helper::jaliliToMiladi($portfolio['started_date'] ?? '')
            ?>

             data-createdAt="<?= $created ?>"
             data-category="<?= $cat ?>">
            <?php if ($portfolio['cover_image'] != null) {
                ?>

                <img src="<?= URL ?>public/images/portfolios/<?= $portfolio['category'] ?>/<?= $portfolio['cover_image'] ?>">
                <?php
            }
            ?>

            <div class="portfolio-body">

                             <span class="portfolio-category">
                                 <?= constant($portfolio['category'] ?? '') ?>
                             </span>

                <div class="portfolio-title-desc">
                    <h5>
                        <?= htmlspecialchars(
                            $portfolio['title'] ?? '',
                            ENT_QUOTES,
                            'UTF-8') ?>
                    </h5>
                    <p>
                        <?= htmlspecialchars(
                            $portfolio['short_description'] ?? '',
                            ENT_QUOTES,
                            'UTF-8') ?>

                    </p>
                </div>


                <div class="portfolio-dates-row portfolio-meta-theme">

                    <div class="date-item">

                        <div class="date-title">

                            <i class="bi bi-calendar-plus"></i>

                            <span>ثبت:</span>

                        </div>

                        <div class="date-value">

                            <?= $portfolio['started_date'] ?? '' ?>

                        </div>

                    </div>

                    <div class="date-item">

                        <div class="date-title-deliver">

                            <i class="bi bi-calendar-check"></i>

                            <span>تحویل:</span>

                        </div>

                        <div class="date-value">

                            <?= $portfolio['completed_date'] ?? '' ?>

                        </div>

                    </div>

                </div>


                <div class="portfolio-bottom-row">

                    <a href="https://example.com"
                       target="_blank"
                       class="portfolio-link">

                        <i class="bi bi-link-45deg"></i>

                        مشاهده پروژه

                    </a>

                    <span class="badge
                                        <?= ($portfolio['status'] ?? '' === 'COMPLETED') ? 'bg-success' : 'bg-secondary' ?>
                                        ">

                                     <?= constant($portfolio['status'] ?? '') ?>

                                  </span>

                </div>
                <div class="portfolio-switches">

                    <div class="switch-item">

                        <label>

                            فعال

                        </label>

                        <label class="form-switch">

                            <input
                                    type="checkbox"

                                    class="portfolio-switch"

                                    data-id="<?= $portfolio['id'] ?>"

                                    data-field="is_active"

                                <?= ($portfolio['is_active'] === 1) ? 'checked' : '' ?>

                            >

                            <span></span>

                        </label>

                    </div>

                    <div class="switch-item">

                        <label>

                            ممتاز

                        </label>

                        <label class="form-switch">

                            <input
                                    type="checkbox"

                                    class="portfolio-switch featured-switch"

                                    data-id="<?= $portfolio['id'] ?>"

                                    data-field="is_featured"
                                <?= ($portfolio['is_featured'] === 1) ? 'checked' : '' ?>
                            >

                            <span></span>

                        </label>

                    </div>

                </div>

                <!-- Tags form user -->
                <div class="mt-3  portfolio-tags d-none">
                    <label class="form-label">
                        تگ‌ها (حداکثر ۴ تگ و جداشده با -)
                    </label>

                    <input
                            data-required="تگ‌های پروژه"
                            data-action="پر کنید"
                            type="text"
                            name="tags"
                            class="form-control tags"
                            value="<?= htmlspecialchars(
                                $portfolio['tags'] ?? '',
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>"
                            placeholder="مثلاً  : mvc - php">

                    <?php if (isset($errors['tags'])): ?>
                        <div class="form-error general-form-error">
                            <?= $errors['tags'] ?>
                        </div>
                    <?php endif; ?>
                    <div class="align-items-center d-flex justify-content-around pt-2">
                        <button type="button" class="bg bg-primary save-tags"> ثبت</button>
                        <button type="button" class="bg bg-secondary cancel-tags"> انصراف</button>
                    </div>
                </div>

                <!-- Tags form DATA BASE -->
                <div class="mt-3  portfolio-tech <?= empty($portfolio['tags']) ? 'd-none' : '' ?>">
                    <?php
                    if(!empty($portfolio['tags'])) {
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


            <div class="portfolio-footer">

                <a href="<?= URL ?>admin/portfolios/edit/<?= $portfolio['id'] ?>">

                    <i class="bi bi-pencil-square"></i>

                    ویرایش

                </a>


                <a href="<?= URL ?>admin/portfolios/delete/<?= $portfolio['id'] ?>"
                   class="text-danger btn-delete">
                    <i class="bi bi-trash"></i>

                    حذف

                </a>

            </div>

        </div>
    </div>
    <?php
}
?>

<!--<script>-->
<!--    /*==========================================-->
<!--      Delete-->
<!--      ==========================================*/-->
<!--    $(document).on('click', '.btn-delete', function (event) {-->
<!---->
<!--        event.preventDefault();-->
<!---->
<!--        myAlert.delete(this.href);-->
<!---->
<!--    });-->
<!---->
<!--    $(document).on('change', '.featured-switch', function () {-->
<!--        const card = $(this).closest('.portfolio-card');-->
<!--        const tags = card.find('.portfolio-tags');-->
<!---->
<!--        tags.toggleClass('d-none', !this.checked);-->
<!--    });-->
<!--</script>-->




