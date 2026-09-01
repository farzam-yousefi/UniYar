<!--==================================
Change Password Modal
===================================-->
<script src="<?= URL ?>public/js/validation.js"></script>
<link rel="stylesheet" href="<?= URL ?>public/css/validation.css">


<?php if (isset($_SESSION['alert-resultOperation'])): ?>

<script>

    myAlert.<?= $_SESSION['alert-resultOperation']['type'] ?>(
        <?= json_encode($_SESSION['alert-resultOperation']['title']) ?>,
        <?= json_encode($_SESSION['alert-resultOperation']['message']) ?>
    );

</script>

<?php unset($_SESSION['alert-resultOperation']); ?>

<?php endif; ?>

<?php

$errors =
    $_SESSION['change_password_errors'] ?? [];

$openChangePassword =
    $_SESSION['open_change_password'] ?? false;

unset($_SESSION['change_password_errors']);
unset($_SESSION['open_change_password']);

if ($openChangePassword): ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const modalElement =
                document.getElementById('changePasswordModal');

            const modal =
                bootstrap.Modal.getOrCreateInstance(modalElement);

            modal.show();

        });
    </script>

<?php endif; ?>


<div class="modal fade"
     id="changePasswordModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content change-password-modal">

            <div class="modal-header border-0">

                <h5 class="modal-title">

                    <i class="bi bi-key text-success me-2"></i>

                    تغییر رمز عبور

                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                </button>

            </div>


            <div class="modal-body">
                <form action="<?= URL ?>admin/changePassword" method="post" novalidate
                      data-change-password>

                    <input type="hidden"
                           name="return_url"
                           value="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">

                    <div class="form-group mb-3">

                        <label>
                            رمز عبور فعلی
                        </label>

                        <input type="password"
                               class="form-control-custom validation-required"
                               name="oldPassword"
                               id="oldPassword"
                               data-required="رمز فعلی"
                               data-action="پر کنید"
                               placeholder="رمز فعلی خود را وارد کنید">

                    </div>


                    <div class="form-group mb-3">

                        <label>
                            رمز عبور جدید
                        </label>

                        <input type="password"
                               class="form-control-custom validation-required"
                               name="newPassword"
                               id="newPassword"
                               data-required="رمز جدید"
                               data-action="پر کنید"
                               minlength="8"
                               placeholder="حداقل ۸ کاراکتر(شامل حروف،ارقام و کاراکتر ویژه)">

                    </div>
                    <div class="form-group">

                        <label>
                            تکرار رمز عبور جدید
                        </label>

                        <input type="password"
                               class="form-control-custom validation-required"
                               name="reNewPassword"
                               id="reNewPassword"
                               data-required="تکرار رمز جدید"
                               data-action="پر کنید"
                               minlength="8"
                               placeholder="تکرار رمز جدید">


                    </div>
                    <?php if (!empty($errors)): ?>
                        <div class="errorList">

                            <ul>
                                <?php foreach ($errors as $error): ?>

                                    <li class="form-error">
                                        <?= $error ?>
                                    </li>

                                <?php endforeach; ?>


                            </ul>

                        </div>
                    <?php endif; ?>
                    <div class="flex text-center ">
                        <button type="submit" class="btn btn-main w-25  mt-4">

                            ذخیره
                        </button>
                        <button class="btn btn-main-cancel w-25 mt-4"
                                data-bs-dismiss="modal"
                                type="button">

                            انصراف

                        </button>
                    </div>
                </form>
            </div>

        </div>

    </div>

</div>
<script>

    document.addEventListener('submit', function (e) {

        const form = e.target;

        if (form.matches('[data-change-password]')) {

            if (!validateChangePassForm(form)) {
                e.preventDefault();
            }

        }

    });


</script>