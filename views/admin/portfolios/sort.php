<style>
    /*==========================================
Sort Header
==========================================*/

    .sort-header {

        display: flex;

        justify-content: space-between;

        align-items: center;

        margin-bottom: 28px;

    }

    .sort-header h2 {

        margin: 0;

        color: #17335C;

        font-weight: 700;

    }

    .sort-header p {

        margin-top: 6px;

        color: #6B7280;

    }

    /*==========================================
    Sortable Cards
    ==========================================*/

    .sort-card {

        display: flex;

        align-items: center;

        gap: 20px;

        padding: 18px 22px;

        border: 1px solid #E5E7EB;

        border-radius: 16px;

        background: #fff;

        transition: .25s;

        margin-bottom: 16px;

        cursor: default;
        vertical-align: middle;

    }

    .sort-card:last-child {

        margin-bottom: 0;

    }

    .sort-card:hover {

        box-shadow: 0 10px 25px rgba(0, 0, 0, .06);

    }

    .sort-card.sortable-ghost {

        opacity: .35;

    }

    .sort-card.sortable-chosen {

        background: #F5FCF9;

        border-color: #18A66E;

    }

    /*==========================================
    Drag Handle
    ==========================================*/

    .sort-handle {

        width: 48px;

        height: 48px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 12px;

        background: #F8FAFC;

        border: 1px solid #E5E7EB;

        cursor: grab;

        flex-shrink: 0;

    }

    .sort-handle:active {

        cursor: grabbing;

    }

    .sort-handle i {

        font-size: 22px;

        color: #64748B;

    }

    /*==========================================
    Body
    ==========================================*/

    .sort-body {

        flex: 1;

    }

    .sort-title {

        font-size: 18px;

        font-weight: 700;

        color: #17335C;

        margin-bottom: 10px;

    }

    /*==========================================
    Meta
    ==========================================*/

    .sort-meta {

        display: flex;

        flex-wrap: wrap;

        gap: 10px;

    }

    .badge-website {

        background: #FFF7DB;

        color: #D97706;

    }

    .badge-programming {

        background: #E6F8F0;

        color: #0EA47A;

    }

    .badge-database {

        background: #EEE9FF;

        color: #8B5CF6;

    }

    .star-badge-color{
        background-color: #ffeb39;!important;
    }

    /*==========================================
    Footer
    ==========================================*/

    .sort-footer {

        display: flex;

        justify-content: space-between;

        align-items: center;

        padding: 20px 24px;

    }

    /*==========================================
    Responsive
    ==========================================*/

    @media (max-width: 768px) {

        .sort-card {

            padding: 16px;

            gap: 14px;

        }

        .sort-title {

            font-size: 16px;
            /*padding-top: 5px;*/

        }

        .sort-meta {

            gap: 8px;

        }

        .sort-footer {

            flex-direction: column-reverse;

            gap: 14px;

        }

        .sort-footer .btn {

            width: 100%;

        }

    }
</style>
<title>مرتب سازی نمونه کارها</title>
<div class="admin-layout">

    <?php require "views/layout/adminPanel/sidebar.php"; ?>

    <main class="admin-content">

        <div class="container-fluid">

            <!--==============================
            Header
            ==============================-->

            <div class="sort-header">

                <div>

                    <h2>

                        مرتب سازی نمونه کارها

                    </h2>

                    <p>

                        برای تغییر ترتیب نمایش نمونه کارها آنها را بکشید و در محل جدید رها کنید.

                    </p>

                </div>

            </div>


            <!--==============================
            Sort List
            ==============================-->

            <div class="card shadow-sm border-0">
                <form action="<?=URL?>admin/portfolios/saveSort"
                        method="post" id="sortForm">

                    <input type="hidden"  name="sortData" id="sortData">

                <div class="card-body p-4">

                    <div id="portfolioSortable">


                        <!-- item -->

                        <div class="sort-card"

                             data-id="15">

                            <div class="sort-handle">

                                <i class="bi bi-grip-vertical"></i>

                            </div>

                            <div class="sort-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">

                                <h5 class="mb-md-0 fw-bold sort-title">
                                    طراحی فروشگاه اینترنتی
                                </h5>

                                <div class="sort-meta d-flex flex-wrap gap-2">
                                    <span class="badge star-badge-color text-dark">
                                        ممتاز
                                     <i class="bi bi-star-half"></i>
                                    </span>

                                    <span class="badge badge-website">

                                        وبسایت

                                    </span>

                                    <span class="badge bg-success">

                                        منتشر شده

                                    </span>

                                </div>

                            </div>

                        </div>


                        <!-- item -->

                        <div class="sort-card"

                             data-id="18">

                            <div class="sort-handle">

                                <i class="bi bi-grip-vertical"></i>

                            </div>

                            <div class="sort-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">

                                <div class="sort-title mb-md-0 fw-bold">

                                    سیستم مدیریت انبار

                                </div>

                                <div class="sort-meta d-flex flex-wrap gap-2 ">

                                    <span class="badge badge-database">

                                        پایگاه داده

                                    </span>

                                    <span class="badge bg-secondary">

                                        پیش نویس

                                    </span>

                                </div>

                            </div>

                        </div>


                        <!-- item -->

                        <div class="sort-card"

                             data-id="22">

                            <div class="sort-handle">

                                <i class="bi bi-grip-vertical"></i>

                            </div>

                            <div class="sort-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">

                                <div class="sort-title mb-md-0 fw-bold">

                                    سامانه مدیریت آموزش

                                </div>

                                <div class="sort-meta d-flex flex-wrap gap-2">

                                    <span class="badge badge-programming">

                                        برنامه نویسی

                                    </span>

                                    <span class="badge bg-success">

                                        منتشر شده

                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <!--==============================
                Footer
                ==============================-->

                <div class="card-footer sort-footer">

                    <a href="<?= URL ?>admin/portfolios"

                       class="btn btn-main-cancel">

                        <i class="bi bi-arrow-return-right ms-2"></i>

                        انصراف

                    </a>


                    <button  type="submit"

                            id="saveSort"

                            class="btn btn-main">

                        <i class="bi bi-check2-circle ms-2"></i>

                        ذخیره ترتیب

                    </button>

                </div>
                </form>
            </div>

        </div>

    </main>

</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {

        const sortable = new Sortable(

            document.getElementById("portfolioSortable"),

            {

                animation:250,

                handle:".sort-handle"

            }

        );



        document

            .getElementById("sortForm")

            .addEventListener("submit", function () {

                let result=[];

                let cards=document.querySelectorAll("#portfolioSortable .sort-card");



                cards.forEach(function(card,index){

                    result.push({

                        id:card.dataset.id,

                        order:index+1

                    });

                });



                document

                    .getElementById("sortData")

                    .value=JSON.stringify(result);

            });

    });
</script>