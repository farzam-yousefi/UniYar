<?php

$paginationTotalPages =
    max(1, (int)($totalPages ?? 1));

$paginationCurrentPage =
    max(1, (int)($currentPage ?? 1));

$paginationWindowSize =
    max(1, (int)($windowSize ?? 5));

?>

<div
    class="d-flex justify-content-center my-2 pagination-wrapper"
    data-total-pages="<?= $paginationTotalPages ?>"
    data-current-page="<?= $paginationCurrentPage ?>"
    data-window-size="<?= $paginationWindowSize ?>"
>

    <nav aria-label="صفحه‌بندی">

        <ul class="pagination mb-0">

            <li class="page-item">
                <a
                    href="#"
                    class="page-link pagination-first"
                    data-pagination-action="first"
                    aria-label="اولین صفحه"
                >
                    <i class="bi bi-chevron-double-right"></i>
                </a>
            </li>

            <li class="page-item">
                <a
                    href="#"
                    class="page-link pagination-prev"
                    data-pagination-action="prev"
                    aria-label="صفحه قبلی"
                >
                    <i class="bi bi-chevron-right"></i>
                </a>
            </li>


            <?php for (
                $i = 1;
                $i <= $paginationWindowSize;
                $i++
            ): ?>

                <li class="page-item">

                    <a
                        href="#"
                        class="page-link page-btn"
                        data-pagination-page="<?= $i ?>"
                    >
                        <?= $i ?>
                    </a>

                </li>

            <?php endfor; ?>


            <li class="page-item">

                <a
                    href="#"
                    class="page-link pagination-next"
                    data-pagination-action="next"
                    aria-label="صفحه بعدی"
                >
                    <i class="bi bi-chevron-left"></i>
                </a>

            </li>


            <li class="page-item">

                <a
                    href="#"
                    class="page-link pagination-last"
                    data-pagination-action="last"
                    aria-label="آخرین صفحه"
                >
                    <i class="bi bi-chevron-double-left"></i>
                </a>

            </li>

        </ul>

    </nav>

</div>