<?php $this->load->view('layout/header'); ?>
<title>Project - LogIn Status</title>
</head>

<body>

    <?php $this->load->view('layout/sidebar'); ?>

    <!------------------------------ Tabs Code ------------------------------->
    <div class="mybox animated" style="border-radius: 10px;">
        <div class="container-fluid bg-light p-3 rounded">

            <div class="tab-content" id="nav-tabContent">

                <!------------------------------ All Users Form ------------------------------->

                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                    <div class="form mt-3">
                        <div class="mybox" style="padding: 1%; border-radius: 10px;">
                            <form class="mt-4 fw-bold" id="suser">
                                <div class="mb-3 mx-3 d-inline-block" id="snamediv">
                                    <label for="phone" class="form-label">User Name</label>
                                    <!-- <input type="text" class="form-control" id="sname" name="sname" aria-describedby="emailHelp" maxlength="10"/> -->
                                    <select id="sname" name="sname" class="drop">
                                        <option selected disabled value="0">--select--</option>
                                        <?php foreach ($users['users'] as $value) { ?>
                                            <option value="<?= $value['sno'] ?>"><?= ucfirst($value['name']) ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                                <div class="mb-3 mx-3 d-inline-block" id="sloginstatusdiv">
                                    <label for="phone" class="form-label">Login Status</label>
                                    <select id="sloginstatus" name="sloginstatus" class="drop">
                                        <option selected disabled value="0">--select--</option>
                                        <option value="1">Logged In</option>
                                        <option value="0">Not Logged In</option>

                                    </select>
                                </div>

                                <div class="mb-4 mx-3 d-inline-block">
                                    <input type="hidden" name="action" id="action" value="login_status" />
                                    <button type="button" name="search" id="search" class="btn btn-primary" onclick="loginstatus_search();"> <i class="fa-solid fa-magnifying-glass me-2"></i>Search
                                    </button>
                                    <button type="button" name="reset" id="reset" class="btn btn-success ms-2" onclick="clear_val('logs');"> <i class="fa-solid fa-rotate-right me-2"></i>Reset
                                    </button>
                                    <!-- <button type="button" name="excel" id="excel" class="btn btn-success ms-2"> <i class="fa-solid fa-rotate-right me-2"></i>Excel
                                    </button> -->
                                </div>
                            </form>
                        </div>
                    </div>


                    <!-----------------------Table to fetch data--------------------------->


                    <div class="mybox mt-2" style="padding: 1%; border-radius: 10px;">
                        <div class="mb-1 ps-1">
                            <label for='number-dd'><b>No. of records :</b></label>
                            <select id='list' name='list' onchange="loginstatus_search()">
                                <option value='10'>10</option>
                                <option value='20'>20</option>
                                <option value='30'>30</option>
                            </select>
                        </div>
                        <div>
                            <div class="table-container" style="height: 350px; overflow:auto">
                                <table class="table table-striped">
                                    <thead class="tr">
                                        <tr class="trcolor">
                                            <th class="text-center">S No.</th>
                                            <th class="text-center">User</th>
                                            <th class="text-left">Status</th>
                                            <th colspan="2" class="text-center">Action</th>
                                        </tr>

                                    </thead>
                                    <tbody id="data" class="tableanimation"></tbody>
                                </table>
                            </div>
                            <div id="pagin" class="d-flex justify-content-start"></div>
                        </div>
                        <input type="hidden" id="sort_field" value="">
                        <input type="hidden" id="sort_type" value="">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('layout/footer'); ?>

    <script>
        $(document).ready(function() { // datatable code       
            $(document).on("click", "#pagi a", function(e) {
                e.preventDefault();
                var page_id = $(this).attr("id");
                loginstatus_search(page_id);
            })

            loginstatus_search();
            // getCountry();
            $(".user_role").addClass("active");
            $("#side_loggedinstatus").addClass("active");
        });

        function logoutbyid(sno) {
            var sno = sno;
            $.ajax({
                url: "<?= base_url() ?>Logout/logoutbyid",
                type: 'POST',
                dataType: "json",
                async: "false",
                mode: "abort",
                asyn: false,
                data: {
                    sno: sno
                },
                success: function(responce) {
                    if (responce == "2") {
                        $.notify("User Logout Successfully", {
                            globalPosition: 'bottom right',
                            className: 'success'
                        });
                        updateActivity();
                    }
                }
            });
        }
    </script>

</body>

</html>