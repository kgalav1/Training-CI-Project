<?php $this->load->view('layout/header'); ?>

<title>Forgot Password</title>

</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="<?= base_url() ?>assets/images/draw2.webp" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <input type="hidden" name="hiddenemail" id="hiddenemail">
                    <form id="forgot">
                        <!-- Email input -->
                        <div class="form-outline mb-4" id="box">
                            <label class="form-label" for="form3Example3" id="label">Email address <span style="color: red;">*</span></label> <span class="formerror"></span>
                            <input type="text" id="forgot_email" name="email" class="form-control form-control-lg" placeholder="Enter Your valid Email Id" maxlength="40" />
                        </div>

                        <div class="mt-4 pt-2" id="btndiv">
                            <input type="hidden" name="form_action" id="form_action" value="sendemail" />
                            <button type="submit" class="btn btn-primary btn-lg" id="sendemail" name="submit">Send Email</button>
                            <button type="submit" class="btn btn-primary btn-lg" id="sendotp" name="submit" style="display: none;" onclick="sendOtp()">Send OTP</button>
                            <button type="submit" class="btn btn-primary btn-lg" id="resetpwd" name="submit" style="display: none;" onclick="resetPwd()">Reset Password</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-2 px-4 px-xl-5 bg-dark">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
                Copyright © 2020. All rights reserved.
            </div>
            <!-- Copyright -->

            <!-- Right -->
            <div>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#!" class="text-white">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
            <!-- Right -->
        </div>
    </section>

    <?php $this->load->view('layout/footer'); ?>


    <script>
        function validateForgot() {
            clearErrors();
            var returnval = true;
            var emaildat = document.getElementById('forgot_email').value;

            if (emaildat.length == 0) {
                seterror("box", " *Enter your valid email id");
                returnval = false;
            }
            return returnval;
        }

        $('#forgot').on('submit', function(event) {
            event.preventDefault();
            var email = $("#forgot_email").val();
            var data = new FormData(this);
            var valueuser = validateEmail();
            if (valueuser == true) {
                Overlay.show('overlay', 'Sending you an email...');
                $.ajax({
                    url: "<?= base_url() ?>Forgot/email",
                    method: "POST",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(data) {
                        Overlay.hide('overlay');
                        if (data.statuscode == "400") {
                            $.notify(data.msg, {
                                globalPosition: 'bottom right',
                                className: 'success'
                            });
                            $("#label").html("Enter OTP");
                            $("#sendemail").hide();
                            $("#sendotp").show();
                            $("#forgot_email").val("");
                            $("#form_action").val("sendotp");
                            $("#hiddenemail").val(email);
                            $("#forgot_email").attr("maxlength", "6");
                            $("#forgot_email").attr("placeholder", "Enter Your Valid 6 Digit OTP");

                        }
                        if (data.statuscode == "420") {
                            $.notify(data.msg, {
                                globalPosition: 'bottom right',
                                className: 'error'
                            });
                        }
                        if (data.statuscode == "100") {
                            $.notify(data.msg, {
                                globalPosition: 'bottom right',
                                className: 'error'
                            });
                        }
                    }
                });
            } else {
                return false;
            }
        });

        function sendOtp() {
            event.preventDefault();
            var otp = $("#forgot_email").val();
            var email = $("#hiddenemail").val();

            var valueuser = validateOtp();
            if (valueuser == true) {
                $.ajax({
                    url: "<?= base_url() ?>Forgot/otp",
                    method: "POST",
                    data: {
                        otp: otp,
                        email: email
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.statuscode == "400") {
                            $.notify(data.msg, {
                                globalPosition: 'bottom right',
                                className: 'success'
                            });
                            $("#label").html("Enter New Password");
                            $("#sendemail").hide();
                            $("#sendotp").hide();
                            $("#resetpwd").show();
                            $("#forgot_email").val("");
                            $("#form_action").val("sendotp");
                            $("#hiddenemail").val(email);
                            $("#box").clone().attr('id', 'box2').insertAfter("#box");
                            $("#box2").find("#forgot_email").attr("id", "forgot_pwd");
                            $("#box2").find("#label").attr("id", "label2");
                            $("#box2").find("#label2").html("Enter Confrim Password");
                            $("#forgot_email").attr("placeholder", "Password");
                            $("#forgot_pwd").attr("placeholder", "Confirm Password");
                            $("#forgot_email").attr("maxlength", "20");
                            $("#forgot_pwd").attr("maxlength", "20");
                            $("#forgot_email").attr("type", "password");
                            $("#forgot_pwd").attr("type", "password");
                            // $("#box2").after($(document.createElement('input')).prop({
                            //     id: 'checkBox',
                            //     name: 'check',
                            //     type: 'checkbox'
                            // }));
                            $("#box2").append('<input id="checkBox" name="check" type="checkbox" onclick="showpwd()">');
                            $("#checkBox").after($(document.createElement('label')).prop({
                                for: 'checkBox',
                                class: 'text'
                            }).html('Show Password'));
                            $("#btndiv").removeClass("mt-4");

                            if (data.statuscode == "420") {
                                $.notify(data.msg, {
                                    globalPosition: 'bottom right',
                                    className: 'error'
                                });
                            }
                        }
                    }
                });
            } else {
                return false;
            }
        }


        function resetPwd() {
            event.preventDefault();
            var password = $("#forgot_email").val();
            var cpassword = $("#forgot_pwd").val();
            var email = $("#hiddenemail").val();

            var valueuser = validateConfirm();
            if (valueuser == true) {
                $.ajax({
                    url: "<?= base_url() ?>Forgot/confirmPwd",
                    method: "POST",
                    data: {
                        password: password,
                        cpassword: cpassword,
                        email: email
                    },
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        if (data.statuscode == "400") {
                            $.notify(data.msg, {
                                globalPosition: 'bottom right',
                                className: 'success'
                            });
                            setTimeout(function() {
                                window.location.href = '<?= base_url() ?>Welcome';
                            }, 2000);

                        }
                        if (data.statuscode == "420") {
                            $.notify(data.msg, {
                                globalPosition: 'bottom right',
                                className: 'error'
                            });
                        }
                    }
                });
            } else {
                return false;
            }
        }

        function showpwd() {
            // var check = document.getElementById("checkBox").checked;
            var pwd = document.getElementById("forgot_pwd").type;
            var cpwd = document.getElementById("forgot_pwd").type;

            if (pwd == "password" && cpwd == "password") {
                document.getElementById("forgot_email").type = "text";
                document.getElementById("forgot_pwd").type = "text";
            } else {
                document.getElementById("forgot_email").type = "password";
                document.getElementById("forgot_pwd").type = "password";
            }
        }
    </script>


</body>

</html>