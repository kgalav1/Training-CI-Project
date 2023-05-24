<?php

if ($result['total'] > 0) {

    if ($result['count'] > 0) {
        $sno = 1;
        $currentNumber = ($result['page'] - 1) * $result['limit'] + $sno;
        // print_r($result);die;
        foreach ($result['rows'] as $row) {
            $sno = $sno + 1;  ?>

            <tr>
                <td align="center"><?= $currentNumber++ ?></td>
                <td align="center"><?= $row->name ?></td>
                <?php if($row->is_login == '1'){ ?>

                    <td align="left"> <div> <p class="online"></p> <span class="fw-bold">Logged IN</span><div></td>
                    <td align="center"><p class="btn-custom shadow" style="background-color: off-white;" onclick="logoutbyid('<?php echo $row->sno ?>')"><i class="fa-solid fa-power-off me-1"></i>Logout</p></td>
                <?php } ?>
                <?php if($row->is_login == '0'){ ?>

                    <td align="left"><div><p class="offline"></p> <span class="fw-bold">Not Logged IN</span><div></td>
                    <td align="center"><a href="" type="button" class="btn-custom shadow" style="background-color: off-white; pointer-events:none; cursor: default;"><i class="fa-solid fa-power-off me-1"></i>Logout</a></td>
                <?php } ?>
               
              <td align="center"> <a href="<?= base_url() ?>Userlogs" type="button" class="btn-custom shadow" style="background-color: lightskyblue;" >Activity Logs</a></td>
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