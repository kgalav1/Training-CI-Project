<?php

if ($result['total'] > 0) {
    $total_page = ceil($result['total'] / $result['limit']); ?>

    <div id="pagi">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <li class="me-3 mt-1 fw-500">Showing <?= $result['offset']  + '1' ?> - <?= $result['offset'] + $result['count'] ?> records out of <?= $result['total'] ?> </li>

                <?php for ($i = 1; $i <= $total_page; $i++) {
                    if ($i == $result['page']) {
                        $active = "active";
                    } else {
                        $active = "";
                    } ?>
                    <li class="page-item <?= $active ?>"><a class="page-link" id="<?= $i ?>" href="" onclick="animt()"><?= $i ?></a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
<?php } ?>
   