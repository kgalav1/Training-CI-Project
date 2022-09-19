<?php

if ($result['total'] > 0) {

    if ($result['count'] > 0) {
        $sno = 1;
        $currentNumber = ($result['page'] - 1) * $result['limit'] + $sno;
        foreach ($result['rows'] as $row) {
            $sno = $sno + 1;  ?>

            <tr>
            <td><?= $currentNumber++ ?></td>
            <td onclick = 'clientEdit(<?php echo $row->sno ?>);' style='cursor:pointer;'><?= $row->client_name ?></td>
            <td><?= $row->email ?></td>
            <td><?= $row->phone ?></td>
            <td><?= $row->address ?></td>
            <td><?= $row->city ?></td>
            <td><?= $row->state ?></td>
            <td> <button type='button' class='edit bremove'><img onclick = 'clientEdit(<?= $row->sno ?>);'style='width:22px' src='<?= base_url() ?>assets/images/edit.png' alt='edit'></button>
            <button type='button' value=<?= $row->sno ?> class='delete bremove'><img style='width:22px' src='<?= base_url() ?>assets/images/delete.png' alt='delete'></button></td>
            </tr>
        <?php  }
    } else { ?>
        <tr>
            <td colspan='8' style='text-align:center;'>NO DATA FOUND</td>
        </tr>
    <?php }
} else { ?>
    <tr>
        <td colspan='5' style='text-align:center;'>NO DATA FOUND</td>
    </tr>
<?php } ?>