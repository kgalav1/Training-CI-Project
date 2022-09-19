<?php $this->load->view('layout/header'); ?>

<title><?=$title?></title>
</head>

<body>

    <?php $this->load->view('layout/sidebar'); ?>

    <div class="container mt-5">
        <section>
            <div class="row">
                <div class="col-xl-6 col-sm-12 col-12 mb-4">
                    <div class="card">
                        <a href="<?= base_url() ?>Usermaster" class="a">
                            <div class="card-body">
                                <div class="d-flex justify-content-between px-md-1 my-auto">
                                    <div class="align-self-center">
                                        <i> <img src="<?= base_url() ?>assets/images/user-master-icon.png" style="width: 80px;"> </i>
                                    </div>
                                    <div class="text-end">
                                        <h2> <?= $signupdetails ?> </h2>
                                        <p class="mb-0 fs-5" style="font-weight: 400;">User Master</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-6 col-sm-12 col-12 mb-4">
                    <div class="card">
                        <a href="<?= base_url() ?>Clientmaster" class="a">
                            <div class="card-body">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div class="align-self-center">
                                        <i> <img src="<?= base_url() ?>assets/images/user-group-icon.png" style="width: 80px;"> </i>
                                    </div>
                                    <div class="text-end">
                                        <h2><?= $clientmaster ?></h2>
                                        <p class="mb-0 fs-5" style="font-weight: 400;">Client Master</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-sm-12 col-12 mb-4">
                    <div class="card">
                        <a href="<?= base_url() ?>Itemmaster" class="a">
                            <div class="card-body">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div class="align-self-center">
                                        <i> <img src="<?= base_url() ?>assets/images/company-icon.png" style="width: 80px;"> </i>
                                    </div>
                                    <div class="text-end">
                                        <h2><?= $itemmaster ?></h2>
                                        <p class="mb-0 fs-5" style="font-weight: 400;">Item Master</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-6 col-sm-12 col-12 mb-4">
                    <div class="card">
                        <a href="<?= base_url() ?>Invoicemaster" class="a">
                            <div class="card-body">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div class="align-self-center">
                                        <i> <img src="<?= base_url() ?>assets/images/report-icon.png" style="width: 80px;"> </i>
                                    </div>
                                    <div class="text-end">
                                        <h2><?= $main_invoice ?></h2>
                                        <p class="mb-0 fs-5" style="font-weight: 400;">Invoice Master</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <?php $this->load->view('layout/footer'); ?>
            <script>
                $(document).ready(function() {
                    $("#side_dashboard").addClass("active");
                });
            </script>
</body>

</html>