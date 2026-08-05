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

                                type="text"

                                class="form-control-custom"

                                name="phone"

                                value="<?= $settings['phone'] ?? '' ?>">

                        </div>

                        <div class="mb-4">

                            <label class="form-label">

                                ایمیل سایت

                            </label>

                            <input

                                type="email"

                                class="form-control-custom"

                                name="email"

                                value="<?= $settings['email'] ?? '' ?>">

                        </div>

                        <div>

                            <label class="form-label">

                                آدرس

                            </label>

                            <textarea

                                class="form-control-custom"

                                rows="5"

                                name="address"><?= $settings['address'] ?? '' ?></textarea>

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

                                value="<?= $settings['instagram'] ?? '' ?>">

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

                                value="<?= $settings['telegram'] ?? '' ?>">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                واتساپ

                            </label>

                            <input

                                type="text"

                                class="form-control-custom"

                                placeholder="98912xxxxxxx"

                                name="whatsapp"

                                value="<?= $settings['whatsapp'] ?? '' ?>">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                ایتا

                            </label>

                            <input

                                type="text"

                                class="form-control-custom"

                                placeholder="uniyar"

                                name="eitaa"

                                value="<?= $settings['eitaa'] ?? '' ?>">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                بله

                            </label>

                            <input

                                type="text"

                                class="form-control-custom"

                                placeholder="uniyar"

                                name="bale"

                                value="<?= $settings['bale'] ?? '' ?>">

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

                                value="<?= $settings['linkedin'] ?? '' ?>">

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