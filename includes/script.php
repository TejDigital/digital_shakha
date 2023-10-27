<script src="./assets/js/jquery.js"></script>
<script src="./bootstrap/js/bootstrap.js"></script>
<script src="./assets/js/main.js"></script>
<script src="./assets/js/ajax.js"></script>
<script src="./assets/fontawesome-free-6.4.2-web/js/all.js"></script>
<script src="./assets/splide-4.1.3/dist/js/splide.min.js"></script>
<script src="./assets/paroller.js-master/dist/jquery.paroller.min.js"></script>
<!-- <script src="./assets/js/preloadingJS/modernizr.custom.js"></script> -->
<!-- <script src="./assets/js/preloadingJS/preload.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    window.onload = function() {
        setTimeout(function() {
            document.querySelector('.preloader1').style.display = 'none';
            document.querySelector('.preloader2').style.display = 'flex';
            setTimeout(function() {
                document.querySelector('.preloader2').style.display = 'none';

            }, 500);
        }, 1000);
    }
</script>