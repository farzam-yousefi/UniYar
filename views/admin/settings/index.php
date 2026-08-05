<style>
    /*==========================================
    Settings Tabs
    ==========================================*/

    .settings-tabs{

        display:flex;

        gap:8px;

        border-bottom:1px solid #E5E7EB;

        margin-bottom:30px;

        padding-bottom:8px;

    }

    .settings-tabs .nav-item{

        margin:0;

    }

    .settings-tabs .nav-link{

        border:none;

        border-radius:12px;

        background:#F8FAFC;

        color:#64748B;

        font-weight:600;

        font-size:15px;

        padding:12px 24px;

        transition:.25s;

        display:flex;

        align-items:center;

        gap:8px;

    }

    .settings-tabs .nav-link:hover{

        background:#EEF8F4;

        color:#18A66E;

    }

    .settings-tabs .nav-link.active{

        background:#18A66E;

        color:#fff;

        box-shadow:0 8px 18px rgba(24,166,110,.20);

    }

    .settings-tabs .nav-link i{

        font-size:16px;

    }

    .settings-tabs .nav-link:focus{

        box-shadow:none;

    }


    /*==========================================
    Responsive
    ==========================================*/

    @media (max-width:768px){

        .settings-tabs{

            flex-wrap:nowrap;

            overflow-x:auto;

            scrollbar-width:none;

        }

        .settings-tabs::-webkit-scrollbar{

            display:none;

        }

        .settings-tabs .nav-link{

            white-space:nowrap;

            padding:10px 18px;

            font-size:14px;

        }

    }
</style>
<div class="admin-layout">

    <?php require "views/layout/adminPanel/sidebar.php"; ?>

    <main class="admin-content">

        <div class="container-fluid">

            <!--==============================
            Header
            ==============================-->

            <div class="portfolio-header">

                <div>

                    <h2>

                        تنظیمات سایت

                    </h2>

                    <p>

                        مدیریت اطلاعات تماس و تنظیمات سیستم

                    </p>

                </div>

            </div>


            <!--==============================
            Tabs
            ==============================-->

            <ul class="nav settings-tabs mb-4">

                <li class="nav-item">

                    <button

                        class="nav-link active"

                        data-bs-toggle="tab"

                        data-bs-target="#general">
                        <i class="bi bi-gear"></i>
                        تنظیمات عمومی


                    </button>

                </li>

                <li class="nav-item">

                    <button

                        class="nav-link"

                        data-bs-toggle="tab"

                        data-bs-target="#smtp">
                        <i class="bi bi-envelope"></i>
                        ایمیل

                    </button>

                </li>

            </ul>


            <!--==============================
            Tab Contents
            ==============================-->

            <div class="tab-content">

                <!-- General -->

                <?php require "views/admin/settings/general.php"; ?>


                <!-- SMTP -->

                <?php require "views/admin/settings/email.php"; ?>

            </div>

        </div>

    </main>

</div>