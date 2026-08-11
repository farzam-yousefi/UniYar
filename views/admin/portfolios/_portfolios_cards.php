<?php
require_once 'core/const.php';

if (isset($data['portfolios'])) {
    $portfolios = $data['portfolios'];
    foreach ($portfolios as &$portfolio) {

        $portfolio['started_date'] =
            Helper::MiladiTojalili((string)$portfolio['started_date'], '-');

        $portfolio['completed_date'] =
            Helper::MiladiTojalili((string)$portfolio['completed_date'], '-');
    }

    unset($portfolio);
} else
    $portfolios = [];
?>
<!--==============================
               Portfolios Grid
               ==============================-->



        <?php foreach ($portfolios as $portfolio) {
            $cat = strtolower($portfolio['category']);
            ?>

            <div class="portfolio-item <?= $cat ?>"
                <?php
                $started=Helper::jaliliToMiladi($portfolio['started_date'] )
                ?>

                data-started-at="<?=$started?>  "
                 data-display-order="<?= $portfolio['display_order'] ?>">
                <div class="portfolio-card card-<?= $cat ?>"
                    <?php
                    $created = Helper::jaliliToMiladi($portfolio['started_date'])
                    ?>

                     data-createdAt="<?= $created ?>"
                     data-category="<?= $cat ?>">

                    <img src="<?= URL ?>public/images/portfolio/<?= $portfolio['cover_image'] ?>">


                    <div class="portfolio-body">

                             <span class="portfolio-category">
                                 <?= constant($portfolio['category']) ?>
                             </span>

                        <div class="portfolio-title-desc">
                            <h5>
                                <?= $portfolio['title'] ?>
                            </h5>
                            <p>
                                <?= $portfolio['short_description'] ?>

                            </p>
                        </div>


                        <div class="portfolio-dates-row portfolio-meta-theme">

                            <div class="date-item">

                                <div class="date-title">

                                    <i class="bi bi-calendar-plus"></i>

                                    <span>ثبت:</span>

                                </div>

                                <div class="date-value">

                                    <?= $portfolio['started_date'] ?>

                                </div>

                            </div>

                            <div class="date-item">

                                <div class="date-title-deliver">

                                    <i class="bi bi-calendar-check"></i>

                                    <span>تحویل:</span>

                                </div>

                                <div class="date-value">

                                    <?= $portfolio['completed_date'] ?>

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
                                        <?= ($portfolio['status'] === 'COMPLETED') ? 'bg-success' : 'bg-secondary' ?>
                                        ">

                                     <?= constant($portfolio['status']) ?>

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

                                            data-id="15"

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

                                            class="portfolio-switch"

                                            data-id="15"

                                            data-field="is_featured"
                                        <?= ($portfolio['is_featured'] === 1) ? 'checked' : '' ?>
                                    >

                                    <span></span>

                                </label>

                            </div>

                        </div>

                    </div>


                    <div class="portfolio-footer">

                        <a href="<?= URL ?>admin/portfolios/edit/15">

                            <i class="bi bi-pencil-square"></i>

                            ویرایش

                        </a>


                        <a href="#"

                           class="text-danger">

                            <i class="bi bi-trash"></i>

                            حذف

                        </a>

                    </div>

                </div>
            </div>
            <?php
        }
        ?>




