<?php $this->load->view('layout/header'); ?>
<title>Project - User Logs</title>
</head>

<body>

    <?php $this->load->view('layout/sidebar'); ?>

    <!------------------------------ Tabs Code ------------------------------->
    <div class="mybox" style="border-radius: 10px;">
        <div class="container-fluid bg-light p-3 rounded">

            <div class="tab-content" id="nav-tabContent">

                <!------------------------------ All Users Form ------------------------------->

                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                    <div class="form mt-3">
                        <div class="mybox" style="padding: 1%; border-radius: 10px;">
                            <form id="colormaster" class="mt-4 fw-bold">
                                <div class="row mb-5 mt-2">
                                    <div class="mb-3 col-md-4" style="display: flex; justify-content:center; align-items:center;">
                                        <label for="favcolor" class="form-label" style="margin-bottom: 0px;">Select Color For Navbar: &nbsp;</label>
                                        <input type="color" id="nav_color" name="navcolor" value="<?php echo $color[0]->nav ?>">
                                    </div>

                                    <div class="mb-3 col-md-4" style="display: flex; justify-content:start; align-items:center;">
                                        <label for="favcolor" class="form-label" style="margin-bottom: 0px;">Select Color For Sidebar: &nbsp;</label>
                                        <input type="color" id="side_color" name="sidecolor" value="<?php echo $color[0]->side ?>">
                                    </div>
                                    <div class="mb-3 col-md-4" style="display: flex; justify-content:start; align-items:center;">
                                        <label for="favcolor" class="form-label" style="margin-bottom: 0px;">Select Color For Table Header: &nbsp;</label>
                                        <input type="color" id="th_color" name="thcolor" value="<?php echo $color[0]->th ?>">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="display:flex; justify-content:end;">
                                        <!-- <button type="submit" id="done" class="btn btn-primary btn-sm">Done</button> -->
                                    </div>
                                </div>
                            </form>
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
            $("#side_theme").addClass("active");
        });


        // $('#colormaster').on('submit', function(event) {
        //     event.preventDefault();
        //     let data = new FormData(this);
        //     $.ajax({
        //         url: "<?= base_url() ?>Theme/update",
        //         method: "POST",
        //         data: data,
        //         contentType: false,
        //         cache: false,
        //         processData: false,
        //         success: function(data) {
        //             if (data == "11") {
        //                 $.notify("Please Refresh to see changes", {
        //                     globalPosition: 'bottom right',
        //                     className: 'success'
        //                 });
        //             }
        //         }
        //     });

        // });
    </script>

</body>

</html>