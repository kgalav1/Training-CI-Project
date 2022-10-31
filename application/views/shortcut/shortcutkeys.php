<?php $this->load->view('layout/header'); ?>
<title>Project - Shortcut Keys</title>
</head>

<body>

    <?php $this->load->view('layout/sidebar'); ?>

    <!------------------------------ Tabs Code ------------------------------->
    <div class="mybox" style="border-radius: 10px;">
        <div class="container-fluid bg-light p-3 rounded">

            <div class="tab-content" id="nav-tabContent">

                <!------------------------------ All Users Form ------------------------------->

                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


                    <!-----------------------Table to fetch data--------------------------->


                    <div class="mybox mt-2" style="padding: 1%; border-radius: 10px;">
                        <div>
                            <div class="table-container" style="height: 550px; overflow:auto">
                                <table class="table table-striped">
                                    <thead class="tr">
                                        <tr class="table-primary">
                                            <th>Sr No.</th>
                                            <th>Command</th>
                                            <th>Keybinding</th>
                                            <!-- <th>When</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = array(
                                            array('commmand' => 'Dashboard Search Menu focus', 'key' => 'ALT +  S', 'when' => ''),
                                            array('commmand' => 'For User Master', 'key' => 'CTRL + SHIFT + U', 'when' => ''),
                                            array('commmand' => 'For Client Master', 'key' => 'CTRL + SHIFT + C', 'when' => ''),
                                            array('commmand' => 'For Item Master', 'key' => 'ALT + SHIFT + O', 'when' => ''),
                                            array('commmand' => 'For Invoice Master', 'key' => 'CTRL + I', 'when' => ''),
                                        );
                                        foreach ($result as $key => $value) {
                                        ?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><?php echo $value['commmand']; ?></td>
                                                <td><?php echo $value['key']; ?></td>
                                                <!-- <td><?php echo $value['when']; ?></td> -->
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('layout/footer'); ?>

    <script>
        $(document).ready(function() {
            $(".sub-menu").addClass("active");
            $("#side_shortcut").addClass("active");
        });
    </script>

</body>

</html>