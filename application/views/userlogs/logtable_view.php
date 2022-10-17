<?php

if ($result['total'] > 0) {

    if ($result['count'] > 0) {
        $sno = 1;
        $currentNumber = ($result['page'] - 1) * $result['limit'] + $sno;
        // print_r($result);die;
        foreach ($result['rows'] as $row) {
            $sno = $sno + 1;  ?>

            <tr>
                <td><?= $currentNumber++ ?></td>
                <td>#<?= $row->id ?></td>
                <td><?= $row->master ?></td>
                <td><?= $row->name ?></td>
                <td><?= $row->message ?></td>
                <td><?= $row->remote_ip ?></td>
                <td><?= $row->datetime ?></td>
            </tr>
        <?php  }
    } else { ?>
        <tr>
            <td colspan='8' style='text-align:center;'>NO DATA FOUND</td>
        </tr>
    <?php }
} else { ?>
    <tr>
        <td colspan='8' style='text-align:center;'>NO DATA FOUND</td>
    </tr>
<?php } ?>