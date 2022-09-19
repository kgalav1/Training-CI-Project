<?php $sess = $this->session->all_userdata();

if (!isset($sess)) {
    redirect('http://localhost/ciproject/logout');
}
?>
<!-- -----------Navbar Content-------------- -->
<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar" class="shadow">
        <div>
            <div class="logoarea pt-3 mb-5">
                <a href="#" class="d-flex justify-content-center">
                    <img src="<?= base_url() ?>assets/images/sidebarlogo.png" style="width: 230px;" class="sidebar_logo">
                </a>
            </div>
            <ul class="list-unstyled components mt-4" id="sideul">
                <li class="" id="side_search">
                    <a class="InputSearch">
                        <img src="<?= base_url() ?>assets/images/search.png" style="width: 23px; top: 114px; left: 14px; " alt="" class="position-absolute" align="center">
                        <input type="text" id="myinput" placeholder="Search here" class="px-5 side_se" onkeyup="searchside()" maxlength="15"></a>
                </li>
                <li class="" id="side_dashboard">
                    <a href="<?= base_url() ?>Dashboard" class="px-3"><img src="<?= base_url() ?>assets/images/dashbaord-icon.png" style="width: 20px; margin-right: 10px">Dashboard</a>
                </li>
                <li class="" id="side_user">
                    <a href="<?= base_url() ?>Usermaster" class="px-3"><img src="<?= base_url() ?>assets/images/user-icon.png" style="width: 20px; margin-right: 10px">User Master</a>
                </li>
                <li class="" id="side_client">
                    <a href="<?= base_url() ?>Clientmaster" class="px-3"><img src="<?= base_url() ?>assets/images/user-group-icon.png" style="width: 20px; margin-right: 10px">Client
                        Master</a>
                </li>
                <li class="" id="side_item">
                    <a href="<?= base_url() ?>Itemmaster" class="px-3"><img src="<?= base_url() ?>assets/images/company-icon.png" style="width: 20px; margin-right: 10px">Item Master</a>
                </li>
                <li class="" id="side_invoice">
                    <a href="<?= base_url() ?>Invoicemaster" class="px-3"><img src="<?= base_url() ?>assets/images/report-icon.png" style="width: 20px; margin-right: 10px">Invoice</a>
                </li>
                <li>
                    <a onclick="logout();" style="cursor: pointer;" class="px-3"> <span class="fa-solid fa-right-from-bracket me-2"></span>
                        Logout</a>
                </li>
                <li>
                    <a style="cursor: pointer;" class="px-3" onclick="darkMode()"> <span class="fa-solid fa-toggle-off me-2" id="dark"></span>
                        Drak Mode</a>
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

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link text-light mt-1" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 16px; font-weight:500px;"> <img src="<?= base_url() ?>assets/images/user-image.png" style="width: 33px; margin-right:5px;">
                                <span> <?php echo ($_SESSION['name']) ?></span>
                                <span class="fa fa-angle-down ml-2" style="color: white;"></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <!-- <li> <a class="dropdown-item" href="#"><span class="fa-solid fa-toggle-on me-2"></span> Dark Mode</a></li> -->
                                <li><a class="dropdown-item" onclick="logout();" href="#"><span class="fa-solid fa-right-from-bracket me-2"></span>Logout</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>