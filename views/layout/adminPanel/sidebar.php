<aside class="admin-sidebar">

    <ul class="admin-menu">

        <li>
            <a class="<?= Model::isActiveMenu('admin/dashboard'); ?>"
               href="<?= URL ?>admin/dashboard">

                <i class="bi bi-speedometer2"></i>

                داشبورد

            </a>

        </li>

        <li>

            <a class="<?= Model::isActiveMenu('admin/orders'); ?>"
               href="<?= URL ?>admin/orders">

                <i class="bi bi-folder2-open"></i>

                مدیریت درخواست‌ها

            </a>

        </li>

        <li>

            <a class="<?= Model::isActiveMenu('admin/customers'); ?>"
               href="<?= URL ?>admin/customers">
                <i class="bi bi-people"></i>

                کاربران

            </a>

        </li>

        <li>

            <a class="<?= Model::isActiveMenu('admin/portfolios'); ?>"
               href="<?= URL ?>admin/portfolios">

                <i class="bi bi-images"></i>

                نمونه کارها

            </a>

        </li>

        <li>

            <a class="<?= Model::isActiveMenu('admin/faqs'); ?>"
               href="<?= URL ?>admin/faqs">

                <i class="bi bi-question-circle"></i>

                سوالات متداول

            </a>

        </li>

        <li>

            <a class="<?= Model::isActiveMenu('admin/contacts'); ?>"
               href="<?= URL ?>admin/messages">

                <i class="bi bi-envelope"></i>

                پیام‌های تماس

            </a>

        </li>

        <li>

            <a class="<?= Model::isActiveMenu('admin/settings'); ?>"
               href="<?= URL ?>admin/settings">
                <i class="bi bi-gear"></i>

                تنظیمات

            </a>

        </li>

    </ul>

</aside>