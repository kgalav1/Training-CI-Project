<?php

if ($result['total'] > 0) {

    if ($result['count'] > 0) {
        $sno = 1;
        // print_r($result);die;
        $currentNumber = ($result['page'] - 1) * $result['limit'] + $sno;
        foreach ($result['rows'] as $row) {
            $sno = $sno + 1;  ?>

<tr>
        <td>#<?= $row->invoice_id ?></td>
        <td onclick = 'invoiceEdit(<?= $row->invoice_id ?>);' style='cursor:pointer;'><?= $row->client_name ?></td>
        <td><?= $row->email ?></td>
        <td><?= $row->phone ?></td>
        <td><?= $row->address ?></td> 
        <td><?= $row->grand_total ?></td> 
        <td> <button type='button' class='edit bremove'><img onclick = 'invoiceEdit(<?= $row->invoice_id ?>);'style='width:22px' src='<?= base_url() ?>assets/images/edit.png' alt='edit'></button></td>
        <td><button type='button' class='bremove'><img style='width:24px' src='<?= base_url() ?>assets/images/file.png' alt='pdf' onclick="Getpdf('<?=$row->invoice_id?>','<?=base_url('Invoicemaster/invoicepdf')?>')"></button></td>
        <td><button type='button' class='bremove' data-bs-toggle='modal' id='mail' data-bs-target='#exampleModal'><img style='width:24px;' src='<?= base_url() ?>assets/images/gmail.png' alt='send' ></button></td>
        
        </tr>
        <?php  }
    } else { ?>
        <tr>
            <td colspan='9' style='text-align:center;'>NO DATA FOUND</td>
        </tr>
    <?php }
} else { ?>
    <tr>
        <td colspan='9' style='text-align:center;'>NO DATA FOUND</td>
    </tr>
<?php } ?>