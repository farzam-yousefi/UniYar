<link rel="stylesheet" href="<?= URL ?>public/css/admin.css">
<link rel="stylesheet" href="<?= URL ?>public/css/main.css">
<link rel="stylesheet" href="<?= URL ?>public/css/mainAdmin.css">


<style>

    /*==================================================
Admin Header
==================================================*/

    .admin-header {

        height: 72px;

        background: #fff;

        border-bottom: 1px solid #E8ECEF;

        position: sticky;

        top: 0;

        z-index: 1050;

    }

    .admin-header-wrapper {

        height: 72px;

        display: flex;

        align-items: center;

        justify-content: space-between;

    }

    /*==================================================
    Left
    ==================================================*/

    .admin-header-left {

        display: flex;

        align-items: center;

        gap: 18px;

    }

    .sidebar-toggle {

        width: 44px;

        height: 44px;

        border: none;

        background: #F8FBFF;

        border-radius: 12px;

        color: #17335C;

        font-size: 1.4rem;

        transition: .25s;

    }

    .sidebar-toggle:hover {

        background: #0EA47A;

        color: #fff;

    }

    .admin-logo {

        display: flex;

        align-items: center;

        gap: 12px;

        text-decoration: none;

    }

    .admin-logo img {

        width: 100px;

    }

    .panelTitle {

        color: #17335C;

        font-size: 1.15rem;

        font-weight: 700;

    }

    /*==================================================
    Right
    ==================================================*/

    .admin-header-right {

        display: flex;

        align-items: center;

    }

    .admin-user {

        display: flex;

        align-items: center;

        gap: 12px;

        border: none;

        background: none;

        color: #17335C;

        font-weight: 600;

    }

    .admin-user img {

        width: 42px;

        height: 42px;

        border-radius: 10%;

        object-fit: cover;

        border: 2px solid #E8ECEF;

    }

    /*==================================================
    Dropdown
    ==================================================*/

    .dropdown-menu {

        min-width: 220px;

        border: none;

        border-radius: 18px;

        box-shadow: 0 10px 30px rgba(0, 0, 0, .08);

        padding: 10px;

    }

    .dropdown-item {

        border-radius: 12px;

        padding: 10px 14px;

    }

    .dropdown-item i {

        margin-left: 10px;

        color: #0EA47A;

    }

    .change-password-modal {

        border-radius: 20px;

        border: none;

        padding: 10px;

    }

    .change-password-modal .modal-title {

        color: #17335C;

        font-weight: 700;

    }

    .change-password-modal label {

        color: #17335C;

        font-weight: 600;

        margin-bottom: 8px;

        display: block;

    }
</style>
<?php
require_once('core/lib/changePass.php');
?>
<body>

<header class="admin-header">

    <div class="container-fluid">

        <div class="admin-header-wrapper">

            <!-- Left -->

            <div class="admin-header-left">

                <button
                        id="sidebarToggle"
                        class="navbar-toggler sidebar-toggle"
                        type="button">

                    <i class="bi bi-list"></i>

                </button>

                <a href="<?= URL ?>index"
                   class="admin-logo">

                    <img
                            src="<?= URL ?>public/images/logo.png"
                            class="logo"
                            alt="UniYar">
                </a>
                <span class="panelTitle">

                        پنل مدیریت یونیار

                    </span>

            </div>

            <!-- Right -->
            <?php
            if (isset($_SESSION['adminId'])) {

                $adminName = $_SESSION['adminUser'];

                ?>

                <div class="admin-header-right">

                    <div class="dropdown">

                        <button
                                class="admin-user dropdown-toggle"
                                data-bs-toggle="dropdown">

                            <img
                                    src="<?= URL ?>public/images/admin-avatar.svg"
                                    alt="admin">

                            <span>

                          <?= $adminName ?>
                        </span>

                        </button>

                        <ul class="dropdown-menu">

                            <li>

                                <a class="dropdown-item"
                                   href="#">

                                    <i class="bi bi-person"></i>

                                    پروفایل

                                </a>

                            </li>
                            <li>

                                <a class="dropdown-item"
                                   href="#"
                                   data-bs-toggle="modal"
                                   data-bs-target="#changePasswordModal">

                                    <i class="bi bi-key"></i>

                                    تغییر رمز عبور

                                </a>

                            </li>

                            <li>

                                <hr class="dropdown-divider">

                            </li>

                            <li>

                                <a class="dropdown-item text-danger"
                                   href="<?= URL ?>admin/logout">

                                    <i class="bi bi-box-arrow-right"></i>

                                    خروج

                                </a>

                            </li>

                        </ul>

                    </div>

                </div>
                <?php
            } else {
                ?>

                <span>

                            مدیریت سیستم

                        </span>
                <?php
            }
            ?>
        </div>

    </div>

</header>

