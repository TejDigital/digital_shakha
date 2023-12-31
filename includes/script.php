<script src="./assets/js/jquery.js"></script>
<script src="./sweetalert2/sweetalert2.all.min.js"></script>
<script src="./assets/js/validate.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script src="./assets/js/calender.js"></script>
<script src="./assets/js/ajax.js"></script>
<script src="./assets/fontawesome-free-6.4.2-web/js/all.min.js"></script>
<script src="./assets/splide-4.1.3/dist/js/splide.min.js"></script>
<script src="./assets/paroller.js-master/dist/jquery.paroller.min.js"></script>
<script src="./assets/OwlCarousel2/dist/owl.carousel.min.js"></script>
<script src="./assets/js/main.js"></script>
<script src="./assets/js/gsap/gsap.min.js"></script>
<script src="./assets/js/gsap/gsap_scrollTrigger.min.js"></script>
<script src="./assets/js/gsap/gsap_animation.js"></script>
<script src="./assets/aos-master/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var percentage = 0;

        function updatePercentage() {
            document.querySelector('.preloader1 .count span').textContent = percentage + '%';
        }

        function simulateLoading() {
            var interval = setInterval(function() {
                if (percentage >= 100) {
                    clearInterval(interval);
                    document.querySelector('.preloader1 .count').style.display = 'none';
                    document.querySelector('.preloader2').style.display = 'flex';
                    setTimeout(function() {
                        document.querySelector('.preloader').style.display = 'none';
                    }, 1000);
                } else {
                    percentage += 1;
                    updatePercentage();
                }
            }, 8);
        }

        setTimeout(function() {
            document.querySelector('.preloader1').style.display = 'flex';
            simulateLoading();
        }, 2);
    });
</script>
<!-- <script>
    $(document).ready(function() {
        // Add click event handler to the clicked-link class
        $('.clicked-link').click(function() {
            // Toggle the visibility of the dropdown item
            $(this).siblings('.drop-item').slideToggle();
        });
    });
</script> -->
<script>
    $(document).ready(function() {
        $(".nav_link_toggle_btn").click(function() {
            // Close all other toggle_content elements
            $(".nav_content_toggle_content").slideUp();
            $(".nav_link_toggle_btn").removeClass("nav_active_toggle_content");
            // $(".plus").show();
            // $(".minus").hide();

            // Toggle the clicked toggle_content
            var panel = $(this).next(".nav_content_toggle_content");
            $(this).toggleClass("nav_active_toggle_content");

            if (panel.is(":hidden")) {
                panel.slideDown();
                // $(this).find('.plus').hide();
                // $(this).find('.minus').show();
            } else {
                panel.slideUp();
                // $(this).find('.plus').show();
                // $(this).find('.minus').hide();
            }
        });
    });
</script>