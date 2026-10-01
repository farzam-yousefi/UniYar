<link rel="stylesheet" href="<?= URL ?>public/css/footer.css">

<?php
$footerInfo= Model::sessionGet("footerInfo") ?? [];

$contactInfo = [];
foreach ($footerInfo as $row) {
    $contactInfo[$row['setting_key']] = $row['setting_value'];
}

?>

<footer class="footer">

    <div class="container">

        <div class="row gy-4 ">

            <!-- Logo -->

            <div class="col-lg-2 col-md-6 logo-slogan">

                <img src="<?= URL ?>public/images/logo-footer.png" class="footer-logo" alt="logo">

            </div>

            <!-- Quick Links -->

            <div class="col-lg-2 col-md-6">

                <h5>دسترسی سریع</h5>

                <ul class="footer-links">

                    <li><a href="<?= URL ?>index">خانه</a></li>

                    <li><a href="<?= URL ?>portfolio">نمونه کارها</a></li>

                    <li><a href="<?= URL ?>faq">سوالات متداول</a></li>

                    <li><a href="<?= URL ?>about">درباره ما</a></li>

                </ul>

            </div>

            <hr class="d-md-none">
            <!-- Services -->

            <div class="col-lg-2 d-none d-lg-block">
                <h5>خدمات</h5>

                <ul class="footer-links">

                    <li><a href="<?= URL ?>service/projectService">انجام پروژه</a></li>

                    <li><a href="<?= URL ?>service/privateTeachingService">تدریس خصوصی</a></li>

                    <li><a href="<?= URL ?>service/debugService">رفع اشکال</a></li>

                    <li><a href="<?= URL ?>service/consultService">مشاوره آموزشی</a></li>

                </ul>

            </div>



            <!-- Contact -->

            <div class="col-lg-3 col-md-6">

                <h5>ارتباط با ما</h5>

                <ul class="footer-contact footer-links">

                    <li>
                        <a href="">
                        <i class="bi bi-envelope"></i>
                            <span class="ps-1"><?=htmlspecialchars($contactInfo['email'] ?? '')?></span>
                        </a>
                    </li>

                    <li>

                        <i class="bi bi-telephone"></i>
                            <span class="ps-1"><?=htmlspecialchars($contactInfo['phone'] ?? '')?></span>

                    </li>
                    <li>
                        <i class="bi bi-clock"></i>
                        <?=htmlspecialchars($contactInfo['contact_time'] ?? '')?>
                    </li>
                    <li>
                        <i class="bi bi-pin-map"></i>
                        <?=htmlspecialchars($contactInfo['address'] ?? '')?>
                    </li>



                </ul>

            </div>

            <hr class="d-md-none">
            <div class="col-lg-3 col-md-6">

                <h5> شبکه های اجتماعی</h5>

                <ul class="footer-contact social-networks footer-links">

                    <li>
                        <a href="<?= Helper::socialUrl('telegram',
                            htmlspecialchars($contactInfo['telegram'] ?? '')) ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                        class="nonLink">
                            <i class="bi bi-telegram"></i>
                            <span class="ms-1">
                                <?= Helper::socialUrl('telegram',
                                    htmlspecialchars($contactInfo['telegram'] ?? '')) ?>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Helper::socialUrl('whatsapp',
                            htmlspecialchars($contactInfo['whatsapp'] ?? '')) ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                        class="nonLink">
                            <i class="bi bi-whatsapp"></i>
                            <span class="ms-1">
                                <?= Helper::socialUrl('whatsapp',
                                    htmlspecialchars($contactInfo['whatsapp'] ?? '')) ?>
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= Helper::socialUrl('instagram',
                            htmlspecialchars($contactInfo['instagram'] ?? '')) ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                        class="nonLink">
                            <i class="bi bi-instagram"></i>
                            <span class="ms-1">
                                <?= Helper::socialUrl('instagram',
                                    htmlspecialchars($contactInfo['instagram'] ?? '')) ?>
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= Helper::socialUrl('bale',
                            htmlspecialchars($contactInfo['bale'] ?? '')) ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="nonLink">
                            <img
                                    src="<?= URL ?>public/images/social/bale.png"
                                    class="social-icon"
                                    alt="Bale">
                            <span class="ms-1">
                                <?= Helper::socialUrl('bale',
                                    htmlspecialchars($contactInfo['bale'] ?? '')) ?>
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= Helper::socialUrl('eitaa',
                            htmlspecialchars($contactInfo['eitaa'] ?? '')) ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="nonLink">
                            <img
                                    src="<?= URL ?>public/images/social/green-eitaa.svg"
                                    class="social-icon"
                                    alt="Eitaa">
                            <span class="ms-1">
                                <?= Helper::socialUrl('eitaa',
                                    htmlspecialchars($contactInfo['eitaa'] ?? '')) ?>
                            </span>
                        </a>
                    </li>


                </ul>

            </div>

        </div>

        <hr>

        <div class="copyright">

            © 2026 UniYar | تمامی حقوق محفوظ است.

        </div>

    </div>

</footer>
</body>
</head>
</html>

