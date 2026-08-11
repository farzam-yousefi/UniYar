<?php
if (isset($data['adminId']))
    $adminId = $data['adminId'];
else
    $adminId = null;
?>
<style>
    /*==================================
Login Page
===================================*/

    .admin-login-page{

        min-height:100vh;

        background:#F6F8FB;

        display:flex;

        justify-content:center;

        align-items:center;

        padding:30px;

    }

    /*==================================
    Card
    ===================================*/

    .login-card{

        width:100%;
        max-width:460px;

        background:#fff;

        border-radius:24px;

        padding:45px;

        box-shadow:0 15px 40px rgba(0,0,0,.06);

    }

    /*==================================
    Login box
    ===================================*/

    .login{

        text-align:center;

        margin-bottom:40px;

    }


    .login h2{

        color:#17335C;

        font-weight:700;

        margin-bottom:10px;

    }

    .login p{

        color:#7A8797;

    }

    /*==================================
    Labels
    ===================================*/

    .login-card label{

        font-weight:600;

        color:#17335C;

        margin-bottom:10px;

    }

    /*==================================
    Remember
    ===================================*/

    .login-options{

        display:flex;

        justify-content:space-between;

        align-items:center;

    }

    .error-message {
        color: red;
        font-size: 14px;
        margin-top: 5px;
        margin-bottom: 0;
    }

    .is-invalid {
        border-color: red !important;
    }
</style>




    <main class="admin-content">

        <div class="admin-login-page">

            <div class="login-card">

                <div class="login">

                    <h2>
                        پنل مدیریت

                    </h2>
                    <p>
                        لطفاً برای ادامه وارد شوید.

                    </p>

                </div>

                <form id="loginForm" novalidate
                    action="<?= URL ?>admin/login"
                    method="post">

                    <div class="form-group">

                        <label>

                            نام کاربری

                        </label>

                        <input
                                type="text"
                                id="username"
                                name="username"
                                class="form-control-custom">
                        <p id="usernameError" class="error-message"></p>

                    </div>

                    <div class="form-group mt-4">

                        <label>

                            رمز عبور

                        </label>

                        <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control-custom">
                        <p id="passwordError" class="error-message"></p>
                        <p id="errorMessage" class="error-message">
                            <?= ($adminId) ? ('اطلاعات نامعتبر است') : ''
                            ?>
                        </p>



                    </div>

                    <div class="login-options mt-4">

                        <div class="form-check">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="remember">

                            <label
                                class="form-check-label"
                                for="remember">

                                مرا به خاطر بسپار

                            </label>

                        </div>

                    </div>

                    <button
                        type="submit"
                        class="btn btn-main w-100 mt-4">

                        ورود به پنل

                    </button>

                </form>


            </div>

        </div>

    </main>
<script>
    const form = document.getElementById("loginForm");

    form.addEventListener("submit", function (e) {
        let isValid = true;

        // Clear previous errors
        document.querySelectorAll(".error-message").forEach(error => {
            error.textContent = "";
        });
        document.querySelectorAll(".is-invalid").forEach(field => {
            field.classList.remove("is-invalid");
        });

        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;

        if (!username) {
            document.getElementById("username").classList.add("is-invalid");
            document.getElementById("usernameError").textContent = "لطفا نام کاربری را وارد کنید";
            isValid = false;
        }
        if (!password) {
            document.getElementById("password").classList.add("is-invalid");
            document.getElementById("passwordError").textContent = "لطفا رمز عبور را وارد کنید";
            isValid = false;
        }
        if (!isValid) {
            e.preventDefault();
        }
    });
</script>

