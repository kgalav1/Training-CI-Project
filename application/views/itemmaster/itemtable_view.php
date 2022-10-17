<?php

if ($result['total'] > 0) {

    if ($result['count'] > 0) {
        $sno = 1;
        $currentNumber = ($result['page'] - 1) * $result['limit'] + $sno;
        foreach ($result['rows'] as $row) {
            $sno = $sno + 1;  ?>

<tr>
        <td><?= $currentNumber++ ?></td>
        <td onclick = 'itemEdit(<?= $row->sno ?>);' style='cursor:pointer;'><?= $row->name ?></td>
        <td><?= $row->desc ?></td>
        <td><?= $row->price ?></td>
        <td> <img class='image' src="<?= base_url("$row->image") ?>"> </td>
        <td> <button type='button' class='edit bremove'><img onclick = 'itemEdit(<?= $row->sno ?>);'style='width:22px' src='<?= base_url() ?>assets/images/edit.png' alt='edit'></button>
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