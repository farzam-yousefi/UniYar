<?php
$messages = $data['messages'] ?? [];
$totalCount = $data['totalCount'] ?? 0;$totalCount = $data['totalCount'] ?? 0;
?>

<?php
foreach ($messages as $message) {
    switch ($message['status']) {
        case "NEW":
            $badgeClass = 'bg-info';
            break;
        case "EXPECTING":
            $badgeClass = 'bg-warning';
            break;
        case "REPLIED":
            $badgeClass = 'bg-success';
            break;

        default :
            $badgeClass = 'bg-secondary';
            break;
    }
    ?>
    <tr class="message-row"

        data-id="<?= (int)$message['id'] ?>"
        data-status="<?= htmlspecialchars($message['status'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
        data-name="<?= htmlspecialchars($message['full_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
        data-email="<?= htmlspecialchars($message['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
        data-phone="<?= htmlspecialchars($message['mobile'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
        data-subject="<?= htmlspecialchars($message['subject'] ?? '', ENT_QUOTES, 'UTF-8') ?>"

        data-date="<?= Helper::jaliliDate(
            Helper::MiladiTojalili(
                date('Y-m-d', strtotime($message['created_at'] ?? ''))))
        ?>"

        data-body="<?= htmlspecialchars($message['message'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
        data-response="<?= htmlspecialchars($message['response'] ?? '', ENT_QUOTES, 'UTF-8') ?>"

        data-repdate="<?= ($message['replied_at'] !== null) ?
            Helper::jaliliDate(
                Helper::MiladiTojalili(
                    date('Y-m-d', strtotime($message['replied_at'] ?? ''))))
            : '------'
        ?>"
    >

        <td>

            <?= htmlspecialchars($message['full_name'] ?? '') ?>

        </td>

        <td>

            <?= htmlspecialchars($message['subject'] ?? '') ?>

        </td>

        <td class="message-preview">

            <?= htmlspecialchars(
                mb_strlen($message['message'] ?? '') > 50
                    ? mb_substr($message['message'], 0, 50) . '...'
                    : ($message['message'] ?? '')
            ) ?>

        </td>

        <td>

            <?= htmlspecialchars(Helper::jaliliDate(
                Helper::MiladiTojalili(
                    date('Y-m-d', strtotime($message['created_at'] ?? '')
                    ))))
            ?>


        </td>

        <td>

                                <span class="badge <?= $badgeClass ?> message-status">

                                    <?= constant(htmlspecialchars($message['status'] ?? '')) ?>

                                </span>

        </td>

        <td>

            <div class="table-actions">

                <button type="button"

                        class="btn btn-sm btn-outline-primary btn-view-message"

                        data-bs-toggle="modal"

                        data-bs-target="#messageModal">

                    <i class="bi bi-eye"></i>

                </button>
                <a

                    href="<?= URL ?>admin/messages/delete/<?= (int)$message['id'] ?>"

                    class="btn btn-sm btn-outline-danger btn-delete-message">

                    <i class="bi bi-trash"></i>

                </a>

            </div>

        </td>

    </tr>


    <?php
}
?>
