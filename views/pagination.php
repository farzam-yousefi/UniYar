<?php

?>
<div class="d-flex justify-content-center my-2">

    <nav aria-label="صفحه‌بندی درخواست‌ها">

        <ul class="pagination mb-0">

            <!-- First -->
            <li class="page-item">
                <a href="#"
                   class="page-link pagination-first"
                   aria-label="اولین صفحه">

                    <i class="bi bi-chevron-double-right"></i>

                </a>
            </li>

            <!-- Previous -->
            <li class="page-item">
                <a href="#"
                   class="page-link pagination-prev"
                   aria-label="صفحه قبلی">

                    <i class="bi bi-chevron-right"></i>

                </a>
            </li>


            <!-- Page Numbers -->

            <?php for ($i = 1; $i <=PaginationWindowSize; $i++): ?>

                <li class="page-item" >

                    <a href="#"
                       class="page-link page-btn <?=($i==1) ? 'active' : ''?>"
                       data-page="<?= $i ?>">

                        <?= $i ?>
                    </a>

                </li>

            <?php endfor; ?>


            <!-- Next -->
            <li class="page-item">

                <a href="#"
                   class="page-link pagination-next"
                   aria-label="صفحه بعدی">

                    <i class="bi bi-chevron-left"></i>

                </a>

            </li>


            <!-- Last -->
            <li class="page-item">

                <a href="#"
                   class="page-link pagination-last"
                   aria-label="آخرین صفحه">

                    <i class="bi bi-chevron-double-left"></i>

                </a>

            </li>

        </ul>

    </nav>

</div>

