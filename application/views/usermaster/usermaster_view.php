<?php $this->load->view('layout/header'); ?>
<title>Project - User Master</title>
</head>

<body>

    <?php $this->load->view('layout/sidebar'); ?>

    <!------------------------------ Tabs Code ------------------------------->
    <div class="mybox" style="border-radius: 10px;">
        <div class="container-fluid bg-light p-3 rounded">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true" onclick="userhide()">All
                        Users</button>

                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Add User</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">

                <!------------------------------ All Users Form ------------------------------->

                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                    <div class="form mt-3">
                        <div class="mybox" style="padding: 1%; border-radius: 10px;">
                            <form class="mt-4 fw-bold" id="suser">
                                <div class="mb-3 mx-3 d-inline-block" id="snamediv">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="sname" name="sname" aria-describedby="emailHelp" maxlength="15" oninput=" this.value = this.value.replace(/[^A-za-z\s]/g, '');">
                                </div>

                                <div class="mb-3 mx-3 d-inline-block" id="semaildiv">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="semail" name="semail" aria-describedby="emailHelp" maxlength="50">
                                </div>

                                <div class="mb-3 mx-3 d-inline-block" id="sphonediv">
                                    <label for="phone" class="form-label">Phone No.</label>
                                    <input type="text" class="form-control" id="sphone" name="sphone" aria-describedby="emailHelp" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                </div>

                                <div class="mb-4 mx-3 d-inline-block">
                                    <input type="hidden" name="action" id="action" value="user" />
                                    <button type="button" name="search" id="search" class="btn btn-primary" onclick="user_search()"> <i class="fa-solid fa-magnifying-glass me-2"></i>Search
                                    </button>
                                    <button type="button" name="reset" id="reset" class="btn btn-success ms-2" onclick="clear_val('user')"> <i class="fa-solid fa-rotate-right me-2"></i>Reset
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
                                <option value='5'>5</option>
                                <option value='10'>10</option>
                                <option value='15'>15</option>
                            </select>
                        </div>
                        <div>
                            <div class="table-container">
                                <table class="table table-striped">
                                    <thead class="tr">
                                        <tr class="table-primary">
                                            <th><a href="javascript:void(0);" class="asc" onclick="sort(`asc`,`sno`)">S
                                                    No.
                                                    <i class="fa fa-sort-asc d-asc" aria-hidden="true" style="display: none"></i></a>
                                                <a href="javascript:void(0);" class="desc" onclick="sort(`desc`, `sno`)" style="display: none">S No.
                                                    <i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                                            </th>
                                            <th><a href="javascript:void(0);" class="asc" onclick="sort(`asc`, `name`)">
                                                    Name<i class="fa fa-sort-asc d-asc" aria-hidden="true" style="display: none; "></i></a>
                                                <a href="javascript:void(0);" class="desc" onclick="sort(`desc`, `name`)" style="display: none;">Name
                                                    <i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                                            </th>
                                            <th><a href="javascript:void(0);" class="asc" onclick="sort(`asc`, `email`)">Email
                                                    <i class="fa fa-sort-asc d-asc" aria-hidden="true" style="display: none; "></i></a>
                                                <a href="javascript:void(0);" class="desc" onclick="sort(`desc`, `email`)" style="display: none;">Email
                                                    <i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                                            </th>
                                            <th><a href="javascript:void(0);" class="asc" onclick="sort(`asc`, `phone`)">Phone
                                                    <i class="fa fa-sort-asc d-asc" aria-hidden="true" style="display: none; "></i></a>
                                                <a href="javascript:void(0);" class="desc" onclick="sort(`desc`, `phone`)" style="display: none;">Phone
                                                    <i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                                            </th>
                                            <th>Action</th>
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

                <!------------------------------ Add Users Form ------------------------------->

                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                    <div class="form mt-3" id="addblock">
                        <div class="mybox" style="padding: 1%; border-radius: 10px;">
                            <form id="usermaster" class="mt-4 fw-bold">
                                <input type="hidden" class="snoEdit" name="snoEdit" id="snoEdit">
                                <div class="mb-3 mx-3 d-inline-block" id="namediv">
                                    <label for="name" class="form-label">Name<span style="color: red;">*</span></label>
                                    <span class="formerror"></span>
                                    <input type="text" class="form-control" id="aname" name="name" aria-describedby="emailHelp" maxlength="30" oninput=" this.value = this.value.replace(/[^A-za-z\s]/g, '');">
                                </div>

                                <div class="mb-3 mx-3 d-inline-block" id="emaildiv">
                                    <label for="email" class="form-label">Email<span style="color: red;">*</span></label>
                                    <span class="formerror"></span>
                                    <input type="email" class="form-control" id="aemail" name="email" aria-describedby="emailHelp" maxlength="50">
                                </div>

                                <div class="mb-3 mx-3 d-inline-block" id="phonediv">
                                    <label for="phone" class="form-label">Phone No.<span style="color: red;">*</span></label>
                                    <span class="formerror"></span>
                                    <input type="text" class="form-control" id="aphone" name="phone" aria-describedby="emailHelp" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                </div>

                                <div class="mb-3 mx-3 d-inline-block" id="passworddiv">
                                    <label for="password" class="form-label">Password<span style="color: red;">*</span></label>
                                    <span class="formerror"></span>
                                    <input type="hidden" name="hiddenpassword" id="hiddenpassword">
                                    <input type="password" class="form-control pr-password" id="apassword" name="password" aria-describedby="emailHelp" maxlength="20">
                                </div>
                                <div class="mb-5 mx-3 d-inline-block">
                                    <input type="hidden" name="form_action" id="form_action" value="insert" />
                                    <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Save" />
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

            $(document).on("click", "#pagi a", function(e) {
                e.preventDefault();
                var page_id = $(this).attr("id");
                user_search(page_id);
            })
            user_search();
            findDark();
            apply();

            $("#side_user").addClass("active");
            $('form:first *:input[type!=hidden]:first').focus();


        });
        $(function() {
            $(".pr-password").passwordRequirements();

        });

        //--------------------------- User submit and edit -------------------------------

        $('#usermaster').on('submit', function(event) {
            event.preventDefault();
            var data = new FormData(this);
            data.append('type', "addupdate");
            var passdol = pass();
            var valueuser = validateUser();
            if (valueuser == true && passdol == true) {

                $.ajax({
                    url: "<?= base_url() ?>Usermaster/addupdate",
                    method: "POST",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(data) {
                        if (data == "89") {
                            $.notify("All Feilds Required", {
                                globalPosition: 'bottom right',
                                className: 'error'
                            });
                        }
                        if (data == "600") {
                            $.notify("Invalid Email", {
                                globalPosition: 'bottom right',
                                className: 'error'
                            });
                        }
                        if (data == "700") {
                            $.notify("Incomplete Mobile no.", {
                                globalPosition: 'bottom right',
                                className: 'error'
                            });
                        }
                        if (data.statusCode == 400) {
                            $.notify(data.error, {
                                globalPosition: 'bottom right',
                                className: 'error'
                            });
                        }
                        if (data == "2") {
                            $.notify("Record Saved Successfully", {
                                globalPosition: 'bottom right',
                                className: 'success'
                            });
                            setTimeout("window.location.reload()", 1500);
                        }
                        if (data == "1") {
                            $.notify("Alredy Exists", {
                                globalPosition: 'bottom right',
                                className: 'error'
                            });
                        }
                        if (data == "3") {
                            $.notify("Record Edit Successfully", {
                                globalPosition: 'bottom right',
                                className: 'success'
                            });
                            setTimeout("window.location.reload()", 1500);
                        }
                    }
                });
            } else {
                return false;
            }
        });


        // ------------------------------ User edit--------------------------------

        function userEdit(id) {
            var edit_id = id;
            $.ajax({
                url: "<?= base_url() ?>Usermaster/editDetailsFill",
                type: 'POST',
                dataType: "json",
                async: "false",
                mode: "abort",
                asyn: false,
                data: {
                    type: "editdetailsfill",
                    edit_id: edit_id
                },
                success: function(responce) {
                    TabShow();
                    $("#snoEdit").val(responce.sno);
                    $('#aname').val(responce.name)
                    $('#aemail').val(responce.email)
                    $('#aphone').val(responce.phone)
                    $('#apassword').val(responce.password)
                    $('#hiddenpassword').val(responce.password)
                    $('#form_action').val("edit");
                    $('#submit').val("Update");
                    $("#nav-profile-tab").html("Edit User");

                }
            });
        }
        // ------------------------------ User Delete--------------------------------

        $(document).on('click', '.delete', function() {
            var delete_id = $(this).val();
            $.confirm({
                title: '',
                content: 'Are You Sure Want To Delete ?',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Confirm',
                        btnClass: 'btn-red',
                        action: function() {
                            $.ajax({
                                url: "<?= base_url() ?>Usermaster/deleteuser",
                                type: 'POST',
                                dataType: "json",
                                async: "false",
                                mode: "abort",
                                asyn: false,
                                data: {
                                    type: "deleteuser",
                                    delete_id: delete_id
                                },
                                success: function(responce) {
                                    if (responce == 4) {
                                        $.notify("Record Deleted Successfully", {
                                            globalPosition: 'bottom right',
                                            className: 'success'
                                        });
                                        setTimeout("window.location.reload()", 1500);
                                    }
                                }
                            });
                        }
                    },
                    close: function() {}
                }
            });
        });

        $("#excel").on('click', function() {
                    alert();
                    var page = $("#pagi li.active a").attr("id");
                    var action = $("#action").val();
                    var name = $("#sname").val();
                    var email = $("#semail").val();
                    var phone = $("#sphone").val();
                    var limit = $("#list").val();
                    var sort_field = $("#sort_field").val() == "" ? "sno" : $("#sort_field").val();
                    var sort_type = $("#sort_type").val() == "" ? "asc" : $("#sort_type").val();
                    $.ajax({
                        type: "POST",
                        url: "http://localhost/ciproject/Usermaster/action",
                        data: {
                            action: action,
                            name: name,
                            email: email,
                            phone: phone,
                            limit: limit,
                            page: page,
                            sort_field: sort_field,
                            sort_type: sort_type
                        },
                        dataType: 'Json',
                        success: function(data) {
                            $("#data").html(data.table_data);
                            $("#pagin").html(data.pagination);
                        },
                    });
                });
    </script>
</body>

</html>