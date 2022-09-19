<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?= base_url() ?>/public/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>/public/assets/jquery/jquery-confirm/css/jquery-confirm.css">
        <link rel="stylesheet" href="<?= base_url() ?>/public/assets/jquery/jquery-ui/jquery-ui.css">
        <link rel="stylesheet" href="<?= base_url() ?>/public/assets/password/css/jquery.passwordRequirements.css" />
        <!-- <link rel="stylesheet" href="<?= base_url() ?>/public/assets/loader/dist/Overlay.min.css" /> -->
        <link rel="stylesheet" href="<?= base_url() ?>/public/assets/sidebar/style.css" />
        <link rel="stylesheet" href="<?= base_url() ?>/public/assets/common/comman.css" />
        <link rel="stylesheet" href="<?= base_url() ?>/public/assets/common/logincss.css" />

        <title>hu</title>
    </head>

    <body>



        <?= $this->renderSection("body"); ?>


        <!-- </div>
        <div data-overlay="overlay"> -->
        <!-- <a href="https://www.jqueryscript.net/tags.php?/Animated/">Animated</a> cube -->
        <!-- <div class="cssload-container">
                <div class="cssload-cube">
                    <div class="cssload-half1">
                        <div class="cssload-side cssload-s1"></div>
                        <div class="cssload-side cssload-s2"></div>
                        <div class="cssload-side cssload-s5"></div>
                    </div>
                    <div class="cssload-half2">
                        <div class="cssload-side cssload-s3"></div>
                        <div class="cssload-side cssload-s4"></div>
                        <div class="cssload-side cssload-s6"></div>
                    </div>
                </div>
            </div> -->
        <!-- Overlay message -->
        <!-- <span data-overlay-msg></span>
            <br>
            <br>
        </div> -->

        <!-------------------------------------------- FOOTER LINKS ----------------------------------------------------------->

        <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->

        <script src="<?= base_url() ?>/public/assets/jquery/jquery/dist/jquery.js"></script>
        <script src="<?= base_url() ?>/public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>/public/assets/jquery/jquery/dist/jquery.min.js"></script>
        <script src="<?= base_url() ?>/public/assets/jquery/autocomplete.js"></script>
        <script src="<?= base_url() ?>/public/assets/jquery/jquery-ui/jquery-ui.js"></script>
        <script src="<?= base_url() ?>/public/assets/jquery/jquery-confirm/dist//jquery-confirm.min.js"></script>
        <script src="https://kit.fontawesome.com/783d42a885.js" crossorigin="anonymous"></script>
        <script src="<?= base_url() ?>/public/assets/common/commanjs.js"></script>
        <script src="<?= base_url() ?>/public/assets/common/validation.js"></script>
        <script src="<?= base_url() ?>/public/assets/jquery/popper.min.js"></script>
        <script src="<?= base_url() ?>/public/assets/bootstrap/js//bootstrap.min.js"></script>

        <script src="<?= base_url() ?>/public/assets/sidebar/main.js"></script>
        <script src="<?= base_url() ?>/public/assets/jquery/notify.js"></script>
        <script src="<?= base_url() ?>/public/assets/password/js/jquery.passwordRequirements.min.js"></script>
        <!-- <script src="<?= base_url() ?>/public/assets/loader/dist/Overlay.min.js"></script> -->

        <?= $this->renderSection("footer"); ?>


    </body>

</html>