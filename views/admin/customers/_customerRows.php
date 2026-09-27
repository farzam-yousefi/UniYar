<?php
$customers = $data['customers'] ?? [];
foreach ($customers as $customer) {
    ?>
    <tr>

        <td>

            <?= htmlspecialchars($customer['full_name']) ?>

        </td>

        <td>

            <?= htmlspecialchars($customer['mobile']) ?>

        </td>

        <td>

            <?= htmlspecialchars($customer['email']) ?>

        </td>

        <td>

            <a href="<?= URL ?>admin/orders/getCustomerOrders/<?=$customer['id']?>"
               class="request-count">

                <?= htmlspecialchars($customer['customer_orders_count']) ?> درخواست

            </a>

        </td>

        <td>
            <?= htmlspecialchars(
                Helper::jaliliDate(
                    Helper::MiladiTojalili(
                        date('Y-m-d', strtotime($customer['created_at']))
                    )
                )) ?>
        </td>

        <td>

            ---------

        </td>

    </tr>
    <?php
}
?>