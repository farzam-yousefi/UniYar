
<?php
$settingsInfo = $data['settings'] ?? [];
$settings = [];
foreach ($settingsInfo as $row) {
    $settings[$row['setting_key']] = $row['setting_value'];
}
?>

<div class="tab-pane fade show active"
     id="general">

    <form action="<?= URL ?>admin/settings/saveGeneral"

          method="post"

          autocomplete="off">

        <div class="row g-4">

            <!--==========================================
            Contact
            ==========================================-->

            <div class="col-lg-6">

                <div class="card shadow-sm border-0 h-100">

                    <div class="card-header bg-white">

                        <h5 class="mb-0">

                            اطلاعات تماس

                        </h5>

                    </div>

                    <div class="card-body">

                        <div class="mb-4">

                            <label class="form-label">

                                شماره تماس

                            </label>

                            <input
                                    name="phone"
                                    type="text"
                                    minlength="11" maxlength="11"
                                    class="form-control-custom"

                                    value="<?= htmlspecialchars($settings['phone'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                            >
                        </div>

                        <div class="mb-4">

                            <label class="form-label">

                                ایمیل سایت

                            </label>

                            <input
                                    name="email"

                                    type="email"

                                    class="form-control-custom"

                                    value="<?= htmlspecialchars($settings['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

                        </div>

                        <div>

                            <label class="form-label">

                                آدرس

                            </label>

                            <textarea name="address"

                                    class="form-control-custom"

                                    rows="5"

                                    ><?= htmlspecialchars($settings['address'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>

                        </div>

                    </div>

                </div>

            </div>


            <!--==========================================
            Social Networks
            ==========================================-->

            <div class="col-lg-6">

                <div class="card shadow-sm border-0 h-100">

                    <div class="card-header bg-white">

                        <h5 class="mb-0">

                            شبکه‌های اجتماعی

                        </h5>

                    </div>

                    <div class="card-body">

                        <div class="mb-3">

                            <label class="form-label">

                                اینستاگرام

                            </label>

                            <input

                                    type="text"

                                    class="form-control-custom"

                                    placeholder="uniyar"

                                    name="instagram"

                                    value="<?= htmlspecialchars($settings['instagram'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                تلگرام

                            </label>

                            <input

                                    type="text"

                                    class="form-control-custom"

                                    placeholder="uniyar"

                                    name="telegram"

                                    value="<?= htmlspecialchars($settings['telegram'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                واتساپ

                            </label>

                            <input name="whatsapp"

                                    type="text"

                                   minlength="11" maxlength="11"
                                    class="form-control-custom"

                                    placeholder="98912xxxxxxx"

                                    value="<?= htmlspecialchars($settings['whatsapp'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                            >

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                ایتا

                            </label>

                            <input name="eitaa"

                                    type="text"

                                    class="form-control-custom"

                                    placeholder="uniyar"

                                    value="<?= htmlspecialchars($settings['eitaa'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                            >

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                بله

                            </label>

                            <input name="bale"

                                    type="text"

                                    class="form-control-custom"

                                    placeholder="uniyar"

                                    value="<?= htmlspecialchars($settings['bale'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                            >

                        </div>

                        <div>

                            <label class="form-label">

                                لینکدین

                            </label>

                            <input

                                    type="url"

                                    class="form-control-custom"

                                    placeholder="https://linkedin.com/in/..."

                                    name="linkedin"

                                    value="<?= htmlspecialchars($settings['linkedin'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                            >

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!--==========================================
        Save
        ==========================================-->

        <div class="text-end mt-4">

            <button

                    type="submit"

                    class="btn btn-main px-5">

                <i class="bi bi-check-circle ms-2"></i>

                ذخیره تغییرات

            </button>

        </div>

    </form>

</div>