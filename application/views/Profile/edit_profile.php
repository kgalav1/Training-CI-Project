<?php $this->load->view('layout/header'); ?>
<title>Project - Edit Profile</title>
</head>

<body>

    <?php $this->load->view('layout/sidebar');
     print_r($data['data'][0]);die;
    ?>

    <div class="container rounded bg-white mt-2 mb-2">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src=""><span class="font-weight-bold"><?php echo strtoupper($data['data'][0]['name']) ?>
                    </span><span class="text-black-50"><?php echo $data['data'][0]['email'] ?></span><span>
                    </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 pt-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Full Name</label><input type="text" class="form-control" placeholder="full name" value="<?php echo strtoupper($data['data'][0]['name']) ?>" readonly></div>
                        <!-- <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="" placeholder="surname"></div> -->
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value="<?php echo $data['data'][0]['email'] ?>" readonly></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Phone Number</label><input type="text" class="form-control" placeholder="enter phone number" value="<?php echo $data['data'][0]['phone'] ?>" readonly></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address" value="<?php echo $data['data'][0]['phone'] ?>" name="address"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Job Role</label><input type="text" class="form-control" placeholder="designation" value="" name="designation"></div>
                        <div class="col-md-6"><label class="labels">Gender</label>
                            <select class="form-select" id="gender" aria-label="Default select example">
                                <option selected disabled>-- select --</option>
                                <option value="Male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value="" name="country"></div>
                        <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state" name="state"></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save
                            Profile</button></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 pt-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit
                            Social Media</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Details</span></div><br>

                    <div class="col-md-12"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                            <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                        </svg><label class="labels">Twitter</label><input type="text" class="form-control" placeholder="twitter" value=""></div> <br>

                    <div class="col-md-12"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg><label class="labels">Instagram</label><input type="text" class="form-control" placeholder="instagram" value=""></div> <br>

                    <div class="col-md-12"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg><label class="labels">Facebook</label><input type="text" class="form-control" placeholder="facebook" value=""></div>
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
            $("#side_profile").addClass("active");
        });
    </script>

</body>

</html>