<div class="tab-pane fade"
     id="smtp">

    <form action="<?= URL ?>admin/settings/saveEmail"

          method="post"

          autocomplete="off">

        <div class="row g-4">

            <!--==========================================
            SMTP
            ==========================================-->

            <div class="col-lg-8">

                <div class="card shadow-sm border-0">

                    <div class="card-header bg-white">

                        <h5 class="mb-0">

                            تنظیمات SMTP

                        </h5>

                    </div>

                    <div class="card-body">

                        <div class="row g-3">

                            <div class="col-md-8">

                                <label class="form-label">

                                    SMTP Host

                                </label>

                                <input

                                    type="text"

                                    class="form-control-custom"

                                    name="smtp_host"

                                    value="<?= $settings['smtp_host'] ?? '' ?>">

                            </div>

                            <div class="col-md-4">

                                <label class="form-label">

                                    Port

                                </label>

                                <input

                                    type="number"

                                    class="form-control-custom"

                                    name="smtp_port"

                                    value="<?= $settings['smtp_port'] ?? '587' ?>">

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">

                                    Username

                                </label>

                                <input

                                    type="text"

                                    class="form-control-custom"

                                    name="smtp_username"

                                    value="<?= $settings['smtp_username'] ?? '' ?>">

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">

                                    Password

                                </label>

                                <input

                                    type="password"

                                    class="form-control-custom"

                                    name="smtp_password"

                                    value="<?= $settings['smtp_password'] ?? '' ?>">

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">

                                    From Name

                                </label>

                                <input

                                    type="text"

                                    class="form-control-custom"

                                    name="from_name"

                                    value="<?= $settings['from_name'] ?? 'UniYar' ?>">

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">

                                    From Email

                                </label>

                                <input

                                    type="email"

                                    class="form-control-custom"

                                    name="from_email"

                                    value="<?= $settings['from_email'] ?? '' ?>">

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">

                                    Encryption

                                </label>

                                <select

                                    class="form-control-custom"

                                    name="smtp_secure">

                                    <option value="tls"

                                        <?= (($settings['smtp_secure'] ?? '') == 'tls') ? 'selected' : '' ?>>

                                        TLS

                                    </option>

                                    <option value="ssl"

                                        <?= (($settings['smtp_secure'] ?? '') == 'ssl') ? 'selected' : '' ?>>

                                        SSL

                                    </option>

                                    <option value="none"

                                        <?= (($settings['smtp_secure'] ?? '') == 'none') ? 'selected' : '' ?>>

                                        None

                                    </option>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!--==========================================
            Test Email
            ==========================================-->

            <div class="col-lg-4">

                <div class="card shadow-sm border-0 h-100">

                    <div class="card-header bg-white">

                        <h5 class="mb-0">

                            تست ارسال ایمیل

                        </h5>

                    </div>

                    <div class="card-body d-flex flex-column">

                        <p class="text-muted mb-3">

                            پس از ذخیره تنظیمات، برای اطمینان از صحت اطلاعات می‌توانید یک ایمیل آزمایشی ارسال کنید.

                        </p>

                        <label class="form-label">

                            ایمیل مقصد

                        </label>

                        <input

                            type="email"

                            id="testEmail"

                            class="form-control-custom mb-4"

                            placeholder="example@gmail.com">

                        <button

                            type="button"

                            id="btnTestEmail"

                            class="btn btn-outline-success mt-auto">

                            <i class="bi bi-envelope-check ms-2"></i>

                            ارسال ایمیل آزمایشی

                        </button>

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

                ذخیره تنظیمات

            </button>

        </div>

    </form>

</div>
<script>
    document
        .getElementById("btnTestEmail")
        ?.addEventListener("click", function () {

            let email = document.getElementById("testEmail").value.trim();

            if (email === "") {

                myAlert.warning(

                    "ایمیل مقصد وارد نشده است.",

                    "ابتدا یک ایمیل معتبر وارد کنید."

                );

                return;

            }

            // بعداً Ajax
            console.log(email);

        });
</script>