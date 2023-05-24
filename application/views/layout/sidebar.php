<?php
if (!$this->session->has_userdata("loginSession")) {
    redirect("http://localhost/ciproject/Logout/index");
}
?>
<!-- -----------Navbar Content---------------->
<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar" class="shadow">
        <div>
            <div class="logoarea pt-3 mb-5">
                <a href="#" class="d-flex justify-content-center">
                    <img src="<?= base_url() ?>assets/images/sidebarlogo.png" style="width: 230px;" class="sidebar_logo">
                </a>
            </div>

            <div class="mt-3" id="side_search">
                <a class="InputSearch" style="position: relative; border-bottom: 1px solid #b9adad87;">
                    <!-- <img src="<?= base_url() ?>assets/images/search.png" style="width: 23px; top: 12px; left: 14px; " alt="" class="position-absolute" align="center"> -->
                    <input type="text" id="myinput" placeholder="Search Menu (Alt+S)" class="side_search" onkeyup="searchside()" maxlength="15">
                </a>
            </div>
            <ul class="list-unstyled components mt-2" id="sideul">
                <li class="" id="side_dashboard">
                    <a href="<?= base_url() ?>Dashboard" class="px-3"><img src="<?= base_url() ?>assets/images/dashbaord-icon.png" style="width: 20px; margin-right: 10px">Dashboard</a>
                </li>
                <li class="" id="side_user">
                    <a href="<?= base_url() ?>Usermaster" id="user" class="px-3"><img src="<?= base_url() ?>assets/images/user-icon.png" style="width: 20px; margin-right: 10px">User Master</a>
                </li>
                <li class="" id="side_client">
                    <a href="<?= base_url() ?>Clientmaster" id="client" class="px-3"><img src="<?= base_url() ?>assets/images/user-group-icon.png" style="width: 20px; margin-right: 10px">Client
                        Master</a>
                </li>
                <li class="" id="side_item">
                    <a href="<?= base_url() ?>Itemmaster" id="item" class="px-3"><img src="<?= base_url() ?>assets/images/company-icon.png" style="width: 20px; margin-right: 10px">Item Master</a>
                </li>
                <li class="" id="side_invoice">
                    <a href="<?= base_url() ?>Invoicemaster" id="invoice" class="px-3"><img src="<?= base_url() ?>assets/images/report-icon.png" style="width: 20px; margin-right: 10px">Invoice</a>
                </li>

                <li class="" id="side_shortcut">
                    <a href="<?= base_url() ?>Shortcut" class="px-3"><img src="<?= base_url() ?>assets/images/keyboard.png" style="width: 20px; margin-right: 10px">Shortcut Keys</a>
                </li>

                <li class='sub-menu'><a href="#user_role" style="cursor: pointer;" class="px-3"><img src="<?= base_url() ?>assets/images/programmer.png" style="width: 20px; margin-right: 10px">
                        Users & Roles<div class='fa fa-caret-down right' style="margin-left: 71px;"></div></a>
                    <ul style="padding-left: 0px !important; margin-left: 0px;" id="user_role" class="">

                        <li class="" id="side_logs">
                            <a href="<?= base_url() ?>Userlogs" id="logs" class="ps-5 pe-3"><img src="<?= base_url() ?>assets/images/log-file.png" style="width: 20px; margin-right: 10px">User Logs</a>
                        </li>
                        <li class="" id="side_loggedinstatus">
                            <a href="<?= base_url() ?>Loginstatus" id="login_status" class="ps-5 pe-3"><img src="<?= base_url() ?>assets/images/loginstatus.png" style="width: 20px; margin-right: 10px">Login Status</a>
                        </li>

                    </ul>
                </li>


                <li class='sub-menu'><a href="#settings" style="cursor: pointer;" class="px-3"><img src="<?= base_url() ?>assets/images/settings.png" style="width: 20px; margin-right: 10px">
                        Settings<div class='fa fa-caret-down right' style="margin-left: 105px;"></div></a>
                    <ul style="padding-left: 0px !important; margin-left: 0px;" id="side_settings" class="">

                        <li class="" id="side_embed">
                            <a href="<?= base_url() ?>Embed" class="ps-5 pe-3"><img src="<?= base_url() ?>assets/images/core.png" style="width: 20px; margin-right: 10px">Core Project</a>
                        </li>
                        <li class="" id="side_profile">
                            <a href="<?= base_url() ?>Profile" id="profile" class="ps-5 pe-3"><img src="<?= base_url() ?>assets/images/user-master-icon.png" style="width: 20px; margin-right: 10px">Edit Profile</a>
                        </li>
                        <li>
                            <a style="cursor: pointer;" class="ps-5 pe-3" onclick="darkMode()"> <span class="fa-solid fa-toggle-off me-2" id="dark"></span>
                                Drak Mode</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a onclick="logout();" style="cursor: pointer;" class="px-3"> <span class="fa-solid fa-right-from-bracket me-2"></span>
                        Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="">

        <nav class="navbar navbar-expand-lg" id="upper_navbar">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn" style="background-color: whitesmoke;">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <ul class="navbar-nav float-right" style="position: relative; left: 950px; top: 10px; font-size: 28px;">
                    <!-- Search -->

                    <!-- Change Theme Button -->
                    <li class="nav-item dropdown" style="list-style: none;">
                        <!-- User profile and search -->
                        <a class="nav-link waves-effect waves-dark pro-pic" title="Change Theme" href="#" id="dropdownMenuButton1" data-bs-toggle="dropdown" style="border:0px; bottom: 8px; position: relative;">
                            <i class="fa-solid fa-palette" style="color: #fff"></i>
                        </a>
                        <div class="dropdown-menu" id="droptheme" aria-labelledby="dropdownMenuButton1">
                            <a class="dropdown-item colorup" href="javascript:void(0)" onclick="changecolor(this);myFunction_set()" style="column-rule-color: #8691CD; color: black; border-color: #B1B9DF; text-decoration-color: #fff;">
                                <i class="fa fa-square fa-lg" aria-hidden="true" style="color: #8691CD;"></i>
                                &nbsp;&nbsp;&nbsp;&nbsp;Purple
                            </a>
                            <div class="border-top"> </div>
                            <a class="dropdown-item colorup" href="javascript:void(0)" onclick="changecolor(this);myFunction_set()" style="column-rule-color: #72CA88; color: black; border-color: #A5DDB3; text-decoration-color: #fff;">
                                <i class="fa fa-square fa-lg" aria-hidden="true" style="color: #72CA88;"></i>
                                &nbsp;&nbsp;&nbsp;&nbsp;Light Green
                            </a>
                            <div class="border-top"> </div>
                            <a class="dropdown-item colorup" href="javascript:void(0)" onclick="changecolor(this);myFunction_set()" style="column-rule-color: #3aa576; color: black; border-color: #8ed7b7; text-decoration-color: #fff;">
                                <i class="fa fa-square fa-lg" aria-hidden="true" style="color: #3aa576;"></i>
                                &nbsp;&nbsp;&nbsp;&nbsp;Green
                            </a>
                            <div class="border-top"> </div>
                            <a class="dropdown-item colorup" href="javascript:void(0)" onclick="changecolor(this);myFunction_set()" style="column-rule-color: rgb(79,131,209); color: black; border-color: #A6C1E7; text-decoration-color: White;">
                                <i class="fa fa-square fa-lg" aria-hidden="true" style="color: rgb(79,131,209);"></i>
                                &nbsp;&nbsp;&nbsp;&nbsp;Blue
                            </a>
                            <div class="border-top"> </div>
                            <a class="dropdown-item colorup" href="javascript:void(0)" onclick="changecolor(this);myFunction_set()" style="column-rule-color: #00B4B5; color: black; border-color: #5CCFD0; text-decoration-color: White;">
                                <i class="fa fa-square fa-lg" aria-hidden="true" style="color: #00B4B5;"></i>
                                &nbsp;&nbsp;&nbsp;&nbsp;Iris Blue
                            </a>
                            <div class="border-top"> </div>
                            <a class="dropdown-item colorup" href="javascript:void(0)" onclick="changecolor(this);myFunction_set()" style="column-rule-color: #E0A4B3; color: black; border-color: #EBC5CE; text-decoration-color: #fff;">
                                <i class="fa fa-square fa-lg" aria-hidden="true" style="color: #E0A4B3;"></i>
                                &nbsp;&nbsp;&nbsp;&nbsp;Blossom
                            </a>
                            <div class="border-top"> </div>
                            <a class="dropdown-item colorup" href="javascript:void(0)" onclick="changecolor(this);myFunction_set()" style="column-rule-color: #DD6B34; color: black; border-color: #E9A17D; text-decoration-color: White;">
                                <i class="fa fa-square fa-lg" aria-hidden="true" style="color: #DD6B34;"></i>
                                &nbsp;&nbsp;&nbsp;&nbsp;Orange
                            </a>
                            <div class="border-top"> </div>
                            <a class="dropdown-item colorup" href="javascript:void(0)" id="randomColor" onclick="randomColor();" value>
                                <i class="fa fa-square fa-lg rand" aria-hidden="true"></i>
                                &nbsp;&nbsp;&nbsp;&nbsp;Random
                            </a>
                        </div>
                    </li>
                </ul>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link text-light mt-1" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 16px; font-weight:500px;"> <img src="<?= base_url() ?>assets/images/user-image.png" style="width: 33px; margin-right:5px;">
                                <span> <?php echo ucfirst($this->session->userdata['loginSession']['name']) ?></span>
                                <span class="fa fa-angle-down ml-2" style="color: white;"></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <!-- <li> <a class="dropdown-item" href="#"><span class="fa-solid fa-toggle-on me-2"></span> Dark Mode</a></li> -->
                                <li>
                                    <div class="row prof">
                                        <div class="col-md-4">
                                            <img src="<?= base_url() ?>assets/images/user-image.png" style="width: 70px;">
                                        </div>
                                        <div class="col-md-8 ps-4">
                                            <div>
                                                <?php echo ucfirst($this->session->userdata['loginSession']['name']) ?>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-danger btn-sm"> <a href="<?= base_url() ?>Profile/View">View Profile</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li id="udropdown"><a class="dropdown-item" onclick="logout();" href="#"><span class="fa-solid fa-right-from-bracket me-2"></span>Logout</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>