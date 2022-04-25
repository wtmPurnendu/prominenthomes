<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

    <!-------- footer area start --------->
    <footer class="footer-area">
        <div class="footer-body">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-lg-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="footer-logo"><img src="<?php echo get_template_directory_uri(); ?>/images/footer-logo.png" alt="#" title="" /></div>
                                <div class="footer-awerd"><img src="<?php echo get_template_directory_uri(); ?>/images/footer-awerd.png" alt="#" title="" /></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="footer-box">
                                    <h3>Quick <strong>Links</strong></h3>
                                    <ul>
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Communities</a></li>
                                        <li><a href="#">Resources</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="footer-box">
                                    <h3>Others <strong>Links</strong></h3>
                                    <ul>
                                        <li><a href="#">Resources</a></li>
                                        <li><a href="#">Warranty</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="footer-box">
                                    <h3>Contact <strong>Us</strong></h3>
                                    <div class="footer-address">
                                        <h4>Location :</h4>
                                        <a href="#" target="_blank">4962 Roper Road NW , Edmonton T6B 3T7</a>
                                    </div>
                                    <div class="footer-address">
                                        <h4>Phone :</h4>
                                        <a href="tel:+17807610790" target="_blank">+1 780-761-0790</a>
                                    </div>
                                    <div class="footer-address">
                                        <h4>Email :</h4>
                                        <a href="mailto:hello@prominenthomes.ca">hello@prominenthomes.ca</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <p class="copyright-text">Copyright @ 2021 <a href="#">Prominent Homes</a> | All Rights Reserved</p>
                    <ul class="footer-social">
                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-behance"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-------- footer area stop --------->
   
<?php wp_footer(); ?>
 <script>
        new WOW().init();
    </script>
    <script type="text/javascript">
jQuery('.counter-count').each(function () {
jQuery(this).prop('Counter',0).animate({
Counter: jQuery(this).text()
}, {

//chnage count up speed here
duration: 4000,
easing: 'swing',
step: function (now) {
jQuery(this).text(Math.ceil(now));
}
});
});
</script>
<script type="text/javascript">
    jQuery(document).ready(function(){
  jQuery('.gallery-item').isotope(function(){
      itemSelector:'.item'
    });



  jQuery('.gallery-menu ul li').click(function(){
   jQuery('.gallery-menu ul li').removeClass('active');
    jQuery(this).addClass('active');


    var selector = jQuery(this).attr('data-filter');
     jQuery('.gallery-item').isotope({
        filter: selector
      })
      return false;
  });
});
</script>

<script>
    jQuery("#button_1").click(function() {
    jQuery("INPUT[name=type]").val(['1']);
});

jQuery("#button_2").click(function() {
    jQuery("INPUT[name=type]").val(['2']);
});
    </script>
</body>
</html>
