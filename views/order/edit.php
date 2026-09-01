<title> ویرایش درخواست </title>
<!--==========================
Form
===========================-->

<section class="order-wrapper">

    <div class="container">
        <div class="flex align-items-center text-center  my-3">
            <h3> اطلاعات درخواست شماره
                <?=  $data['order']['tracking_code']?>
            </h3>
        </div>
        <div class="order-card">

            <?php
            $data['mode']="edit";
            require "views/order/add-editOrderForm.php";
            ?>

        </div>

    </div>
</section>






