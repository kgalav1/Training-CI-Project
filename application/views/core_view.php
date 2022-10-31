<?php $this->load->view('layout/header'); ?>
<title>Project - User Master</title>
</head>

<body>

    <?php $this->load->view('layout/sidebar'); ?>

    <!------------------------------ Tabs Code ------------------------------->
    <div class="mybox" style="border-radius: 10px;">

        <!------------------------------ All Users Form ------------------------------->


        <div class="form mt-3">
            <div class="mybox" style="padding: 1%; border-radius: 10px; height: 90vh;">
                <iframe src="http://localhost/Project/loginsystem/login.php" title="W3Schools Free Online Web Tutorials" style="width: 100%; height:100%">
                </iframe>
            </div>
        </div>

        <?php $this->load->view('layout/footer'); ?>

        <script>
            $(document).ready(function() {
                $(".sub-menu").addClass("active");
                $("#side_embed").addClass("active");
            });
        </script>

</body>

</html>