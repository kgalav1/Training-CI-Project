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
                            <form class="mt-4 fw-bold" id="suser">
                                <div class="mb-3 mx-3 d-inline-block" id="siddiv">
                                    <label for="name" class="form-label">Log id</label>
                                    <input type="text" class="form-control" id="sid" name="sid" aria-describedby="emailHelp" maxlength="5" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>

                                <div class="mb-3 mx-3 d-inline-block" id="stypediv">
                                    <label for="type" class="form-label">Type</label>
                                    <input type="text" class="form-control" id="stype" name="stype" aria-describedby="emailHelp" maxlength="50">
                                </div>

                                <div class="mb-3 mx-3 d-inline-block" id="snamediv">
                                    <label for="phone" class="form-label">User Name</label>
                                    <input type="text" class="form-control" id="sname" name="sname" aria-describedby="emailHelp" maxlength="10"/>
                                </div>

                                <div class="mb-4 mx-3 d-inline-block">
                                    <input type="hidden" name="action" id="action" value="logs" />
                                    <button type="button" name="search" id="search" class="btn btn-primary" onclick="log_search(); clickME();"> <i class="fa-solid fa-magnifying-glass me-2"></i>Search
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
                            <select id='list' name='list' onchange="user_search()">
                                <option value='50'>50</option>
                                <option value='100'>100</option>
                                <option value='500'>500</option>
                            </select>
                        </div>
                        <div>
                            <div class="table-container" style="height: 350px; overflow:auto">
                                <table class="table table-striped">
                                    <thead class="tr">
                                        <tr class="table-primary">
                                            <th><a href="javascript:void(0);" class="asc" onclick="sort(`asc`,`id`)">S
                                                    No.
                                                    <i class="fa fa-sort-asc d-asc" aria-hidden="true" style="display: none"></i></a>
                                                <a href="javascript:void(0);" class="desc" onclick="sort(`desc`, `id`)" style="display: none">S No.
                                                    <i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                                            </th>
                                            <th><a href="javascript:void(0);" class="asc" onclick="sort(`asc`, `log_id`)">
                                                    Log Id<i class="fa fa-sort-asc d-asc" aria-hidden="true" style="display: none; "></i></a>
                                                <a href="javascript:void(0);" class="desc" onclick="sort(`desc`, `log_id`)" style="display: none;">Log Id
                                                    <i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                                            </th>
                                            <th><a href="javascript:void(0);" class="asc" onclick="sort(`asc`, `master`)">Activity Place
                                                    <i class="fa fa-sort-asc d-asc" aria-hidden="true" style="display: none; "></i></a>
                                                <a href="javascript:void(0);" class="desc" onclick="sort(`desc`, `master`)" style="display: none;">Activity Place
                                                    <i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                                            </th>
                                            <th><a href="javascript:void(0);" class="asc" onclick="sort(`asc`, `user_id`)">User
                                                    <i class="fa fa-sort-asc d-asc" aria-hidden="true" style="display: none; "></i></a>
                                                <a href="javascript:void(0);" class="desc" onclick="sort(`desc`, `user_id`)" style="display: none;">User
                                                    <i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                                            </th>
                                            <th><a href="javascript:void(0);" class="asc" onclick="sort(`asc`, `message`)">Message
                                                    <i class="fa fa-sort-asc d-asc" aria-hidden="true" style="display: none; "></i></a>
                                                <a href="javascript:void(0);" class="desc" onclick="sort(`desc`, `message`)" style="display: none;">Message
                                                    <i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                                            </th>
                                            <th>IP Address
                                            </th>
                                            <th><a href="javascript:void(0);" class="asc" onclick="sort(`asc`, `datetime`)">DateTime
                                                    <i class="fa fa-sort-asc d-asc" aria-hidden="true" style="display: none; "></i></a>
                                                <a href="javascript:void(0);" class="desc" onclick="sort(`desc`, `datetime`)" style="display: none;">DateTime
                                                    <i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                                            </th>
                                        </tr>

                                    </thead>
                                    <tbody id="data"></tbody>
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
                log_search(page_id);
            })

            log_search();
            // getCountry();
            $("#side_logs").addClass("active");
        });
    </script>

</body>

</html>