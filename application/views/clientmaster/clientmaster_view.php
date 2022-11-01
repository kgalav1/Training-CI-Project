<?php $this->load->view('layout/header'); ?>
<title>Project - Client Master</title>
</head>

<body>

    <?php $this->load->view('layout/sidebar'); ?>

    <!------------------------------ Tabs Code ------------------------------->
    <div class="mybo--x" style="border-radius: 10px;">
        <div class="container-fluid bg-light p-3 rounded">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true" onclick="hide()">All
                        Clients</button>

                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Add Clients</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">

                <!------------------------------ All Users Form ------------------------------->

                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                    <div class="form mt-3">
                        <div class="mybox" style="padding: 1%; border-radius: 10px;">
                            <form class="mt-4 fw-bold">
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
                                    <input type="hidden" name="action" id="action" value="client" />
                                    <button type="button" name="search" id="search" class="btn btn-primary" onclick="client_search()"> <i class="fa-solid fa-magnifying-glass me-2"></i>Search</button>
                                    <button type="button" name="reset" id="reset" class="btn btn-success ms-2" onclick="clear_val('client')"> <i class="fa-solid fa-rotate-right me-2"></i>Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- --------------Table to fetch data--------------- -->

                    <div class="mybox mt-2" style="padding: 1%; border-radius: 10px;">
                        <div class="mb-1 ps-1">
                            <label for='number-dd'><b>No. of records :</b></label>
                            <select id='list' name='list' onchange="client_search()">
                                <option value='5'>5</option>
                                <option value='10'>10</option>
                                <option value='15'>15</option>
                            </select>
                        </div>
                        <div>
                            <div class="table-container">
                                <table class="table table-striped">
                                    <thead class="tr">
                                        <tr class="trcolor">
                                            <th><a href="javascript:void(0);" class="asc" onclick="sort(`asc`,`sno`)">S
                                                    No.
                                                    <i class="fa fa-sort-asc d-asc" aria-hidden="true" style="display: none"></i></a>
                                                <a href="javascript:void(0);" class="desc" onclick="sort(`desc`, `sno`)" style="display: none">S No.
                                                    <i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                                            </th>
                                            <th><a href="javascript:void(0);" class="asc" onclick="sort(`asc`, `client_name`)">
                                                    Client Name<i class="fa fa-sort-asc d-asc" aria-hidden="true" style="display: none; "></i></a>
                                                <a href="javascript:void(0);" class="desc" onclick="sort(`desc`, `client_name`)" style="display: none;">Client
                                                    Name
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
                                            <th><a href="javascript:void(0);" class="asc" onclick="sort(`asc`, `address`)">Address
                                                    <i class="fa fa-sort-asc d-asc" aria-hidden="true" style="display: none; "></i></a>
                                                <a href="javascript:void(0);" class="desc" onclick="sort(`desc`, `address`)" style="display: none;">Address
                                                    <i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                                            </th>
                                            <th><a href="javascript:void(0);" class="asc" onclick="sort(`asc`, `city`)">City
                                                    <i class="fa fa-sort-asc d-asc" aria-hidden="true" style="display: none; "></i></a>
                                                <a href="javascript:void(0);" class="desc" onclick="sort(`desc`, `city`)" style="display: none;">City
                                                    <i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                                            </th>
                                            <th><a href="javascript:void(0);" class="asc" onclick="sort(`asc`, `state`)">State
                                                    <i class="fa fa-sort-asc d-asc" aria-hidden="true" style="display: none; "></i></a>
                                                <a href="javascript:void(0);" class="desc" onclick="sort(`desc`, `state`)" style="display: none;">State
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
                            <form class="mt-4 fw-bold" id="clientmaster">
                                <input type="hidden" class="snoEdit" name="snoEdit" id="snoEdit">
                                <div class="row mx-3">
                                    <div class="mb-3 col-md-3" id="namediv">
                                        <label for="name" class="form-label">Name<span style="color: red;">*</span></label>
                                        <span class="formerror"></span>
                                        <input type="text" class="form-control" id="aname" name="name" aria-describedby="emailHelp" maxlength="35" oninput=" this.value = this.value.replace(/[^A-za-z\s]/g, '').replace(/(\..*)\./g, '$1');">
                                    </div>

                                    <div class="mb-3 col-md-3" id="emaildiv">
                                        <label for="email" class="form-label">Email<span style="color: red;">*</span></label>
                                        <span class="formerror"></span>
                                        <input type="email" class="form-control" id="aemail" name="email" aria-describedby="emailHelp" maxlength="50">
                                    </div>

                                    <div class="mb-3 col-md-3" id="phonediv">
                                        <label for="phone" class="form-label">Phone No.<span style="color: red;">*</span></label>
                                        <span class="formerror"></span>
                                        <input type="text" class="form-control" id="aphone" name="phone" aria-describedby="emailHelp" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                    </div>

                                    <div class="mb-3 col-md-3" id="passworddiv">
                                        <label for="password" class="form-label">Password<span style="color: red;">*</span></label>
                                        <span class="formerror"></span>
                                        <input type="hidden" name="hiddenpassword" id="hiddenpassword">
                                        <input type="password" class="form-control" id="apassword" name="password" aria-describedby="emailHelp" maxlength="20">
                                    </div>
                                </div>
                                <div class="row mx-3">
                                    <div class="mb-3 col-md-3" id="addressdiv">
                                        <label for="address" class="d-block mb-2">Address<span style="color: red;">*</span><span class="formerror"></span></label>
                                        <input type="text" class="form-control" id="aaddress" name="address" aria-describedby="emailHelp" maxlength="50">
                                    </div>

                                    <div class="mb-3 col-md-3" id="countrydiv">
                                        <label for="country" class="d-block mb-2">Choose a country</label>
                                        <select id="country" name="country" class="drop">
                                            <option selected disabled value="0">Choose a country</option>
                                            <?php foreach ($country as $keys => $country_data) { ?>
                                                <option value="<?= $country_data['id'] ?>"><?= $country_data['name'] ?></option>
                                            <?php  } ?>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-3" id="statediv">
                                        <label for="state" class="d-block mb-2">Choose a state<span style="color: red;">*</span><span class="formerror"></span></label>
                                        <select id="state" name="state" class="drop">
                                        <option selected disabled value="0">Choose a state</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-3" id="citydiv">
                                        <label for="city" class="d-block mb-2">Choose a city<span style="color: red;">*</span><span class="formerror"></span></label>
                                        <select id="city" name="city" class="drop">
                                        <option selected disabled value="0">Choose a city</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mx-3 mb-1">
                                    <div class="col-md-12">
                                        <input type="hidden" name="form_action" id="form_action" value="insert" />
                                        <input type="submit" name="submit" id="submit" class="btn btn-primary float-end" value="Save" />
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
        $(document).ready(function() { // datatable code       
            $(document).on("click", "#pagi a", function(e) {
                e.preventDefault();
                var page_id = $(this).attr("id");
                client_search(page_id);
            })

            client_search();
            // getCountry();
            $("#side_client").addClass("active");
        });

        function hide() {
            $("#nav-profile").removeClass("active show");
            $("#nav-home").addClass("show active");
            $("#nav-profile-tab").removeClass("active");
            $("#nav-home-tab").addClass("active");
            $("#nav-profile-tab").html("Add Client");
            $('#form_action').val("insert");
            $('#submit').val("Save");
            $('input[type=text], input[type=email], input[type=password]').val("");
            $('#country').val("0");
            $('#state').val("0");
            $('#city').val("0");
            $("#passworddiv").removeClass("d-none");
            $("#countrydiv").removeClass("d-none");
            $("#statediv").removeClass("d-none");
            $("#citydiv").removeClass("d-none");
            document.getElementById("nav-home-tab").setAttribute('aria-selected', 'true');
            document.getElementById("nav-profile-tab").setAttribute('aria-selected', 'false');
        }

        //--------------------------- Client submit and edit -------------------------------

        $('#clientmaster').on('submit', function(event) {
            event.preventDefault();
            var valueclient = validateClient();
            if (valueclient == true) {

                var sno = $('#snoEdit').val();
                var name = $("#aname").val();
                var email = $("#aemail").val();
                var phone = $("#aphone").val();
                var password = $("#apassword").val();
                var hiddenpassword = $("#hiddenpassword").val();
                var address = $("#aaddress").val();
                var country = $("#country").val();
                var state = $("#state").val();
                var city = $("#city").val();
                var form_action = $('#form_action').val();
                $.ajax({
                    url: "<?= base_url() ?>Clientmaster/addUpdate",
                    method: "POST",
                    dataType: "json",
                    data: {
                        sno: sno,
                        name: name,
                        email: email,
                        phone: phone,
                        password: password,
                        hiddenpassword: hiddenpassword,
                        address: address,
                        country: country,
                        state: state,
                        city: city,
                        form_action: form_action,
                        type: "addupdate"
                    },
                    success: function(data) {
                        console.log(data.status, data.error);
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
                        if(data.statusCode == 400){
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


        function clientEdit(id) {
            var edit_id = id;
            $.ajax({
                url: "<?= base_url() ?>Clientmaster/editDetailsFill",
                type: 'POST',
                dataType: "json",
                async: "false",
                mode: "abort",
                asyn: false,
                data: {
                    type: "editdetailsfill",
                    edit_id: edit_id,
                },
                success: function(responce) {
                    TabShow();
                    $("#snoEdit").val(responce.sno);
                    $('#aname').val(responce.client_name)
                    $('#aemail').val(responce.email)
                    $('#aphone').val(responce.phone)
                    $('#aaddress').val(responce.address)
                    $('#apassword').val(responce.password)
                    $('#hiddenpassword').val(responce.password)
                    $('#form_action').val("edit");
                    $('#submit').val("Update");
                    $("#countrydiv").addClass("d-none");
                    $("#statediv").addClass("d-none");
                    $("#citydiv").addClass("d-none");
                    $("#nav-profile-tab").html("Edit Client");

                }
            });
        }

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
                                url: "<?= base_url() ?>Clientmaster/deleteclient",
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
                                        setTimeout("window.location.reload()", 2000);
                                    } else {
                                        $.notify("Client Have Invoice", {
                                            globalPosition: 'bottom right',
                                            className: 'error'
                                        });
                                    }
                                }
                            });
                        }
                    },
                    close: function() {}
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {

            $('#country').on('change', function() {
                var category_id = this.value;
               
                $.ajax({
                    url: "<?= base_url() ?>Clientmaster/getState",
                    type: "POST",
                    dataType: "json",
                    async: "false",
                    mode: "abort",
                    asyn: false,
                    data: {
                        category_id: category_id,
                        type: "statechange"
                    },
                    cache: false,
                    success: function(result) {
                        var select = document.getElementById('state');
                        $("#state").html('');
                        // $("#city").html('');
                        select.options[0] = new Option("Choose a state","");
                        for (var i = 0; i < (result.state).length; i++) {
                            select.options[select.options.length] = new Option(result.state[i]['name'],result.state[i]['id']);
                        }
                    }
                });
            });
            $('#state').on('change', function() {
                var category_id = this.value;
                $.ajax({
                    url: "<?= base_url() ?>Clientmaster/getCity",
                    type: "POST",
                    dataType: "json",
                    async: "false",
                    mode: "abort",
                    asyn: false,
                    data: {
                        category_id: category_id,
                        type: "citychange"
                    },
                    cache: false,
                    success: function(result) {
                        console.log(result.city);
                        // $("#city").html('');
                        var select = document.getElementById('city');
                        select.options[0] = new Option("Choose a city","");
                        for (var i = 0; i < (result.city).length; i++) {
                            select.options[select.options.length] = new Option(result.city[i]['name'],result.city[i]['id']);
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>