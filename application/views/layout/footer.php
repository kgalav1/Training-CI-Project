</div>
<div data-overlay="overlay">
    <a href="https://www.jqueryscript.net/tags.php?/Animated/">Animated</a> cube
    <div class="cssload-container">
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
    </div>
    <!-- Overlay message -->
    <span data-overlay-msg></span>
    <br>
    <br>
</div>

<!-------------------------------------------- FOOTER LINKS ----------------------------------------------------------->

<!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<!-- <script src="<?= base_url() ?>assets/jquery/jquery/dist/jquery.js"></script> -->
<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/jquery/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/jquery/autocomplete.js"></script>
<script src="<?= base_url() ?>assets/jquery/jquery-ui/jquery-ui.js"></script>
<script src="<?= base_url() ?>assets/jquery/jquery-confirm/dist//jquery-confirm.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
<script src="https://kit.fontawesome.com/783d42a885.js" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>assets/common/commanjs.js"></script>
<script src="<?= base_url() ?>assets/common/validation.js"></script>
<script src="<?= base_url() ?>assets/jquery/popper.min.js"></script>
<script src="<?= base_url() ?>assets/bootstrap/js//bootstrap.min.js"></script>

<script src="<?= base_url() ?>assets/sidebar/main.js"></script>
<script src="<?= base_url() ?>assets/jquery/notify.js"></script>
<script src="<?= base_url() ?>assets/password/js/jquery.passwordRequirements.min.js"></script>
<script src="<?= base_url() ?>assets/loader/dist/Overlay.min.js"></script>

<script>
    $(document).ready(function() {
        anime({
            targets: '.animated',
            translateX: [1500, 0],
            duration: 1000,
            easing: 'easeInOutExpo'
        });
    });

    function animt() {
        anime({
            targets: '.tableanimation',
            translateY: [1000, 0],
            duration: 1000,
            easing: 'easeInOutExpo'
        });
    }
</script>