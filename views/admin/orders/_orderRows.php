<?php
//require_once 'core/helper.php';
//require_once 'core/const.php';
$orders=$data['orders'];

foreach ($data['orders'] as $order) {
    switch ($order['status']) {
        case 'PENDING':
            $badgeClass = 'bg-secondary';
            break;
        case 'REVIEWING':
            $badgeClass = 'bg-warning';
            break;
        case 'IN_PROGRESS':
            $badgeClass = 'bg-primary';
            break;
        case 'COMPLETED':
            $badgeClass = 'bg-success';
            break;
        case 'CANCELED':
            $badgeClass = 'bg-danger';
            break;
    }
    ?>
    <tr>

        <td><?= htmlspecialchars($order['tracking_code']) ?></td>

        <td><?= htmlspecialchars($order['full_name']) ?></td>

        <td><?= htmlspecialchars($order['order_title']) ?></td>

        <td> <?= htmlspecialchars(constant($order['service_type'])) ?>

            <?php if (!empty($order['project_type'])): ?>
                <br> <?=htmlspecialchars(constant($order['project_type'])) ?>
            <?php endif; ?>
        </td>

        <td>  <?= htmlspecialchars(
                Helper::jaliliDate(
                    Helper::MiladiTojalili(
                        date('Y-m-d', strtotime($order['submission_date']))
                    )
                )) ?></td>

        <td>
            <span class="badge <?= $badgeClass ?>">

                <?= htmlspecialchars(constant($order['status'])) ?>

            </span>
        </td>

        <td>

            <a href="<?= URL ?>admin/orders/details/<?= $order['id'] ?? '' ?>" class="table-action">

                <i class="bi bi-eye"></i>

            </a>

            <a href="<?= URL ?>admin/orders/edit/<?= $order['id'] ?? '' ?>" class="table-action">

                <i class="bi bi-pencil-square"></i>

            </a>

            <a href="<?= URL ?>admin/orders/delete/<?= $order['id'] ?? '' ?>" class="table-action text-danger">

                <i class="bi bi-trash"></i>

            </a>

        </td>

    </tr>

<?php } ?>


