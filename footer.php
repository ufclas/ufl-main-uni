<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 *
 * @version 5.2.0.0
 */

 $post_id = get_queried_object_id();
 $second_featured_image = get_post_meta($post_id, 'second_featured_image', true);
 $custom_text = get_post_meta($post_id, 'custom_text', true);
?>




<!-- START FOOTER WRAPPER -->
<div class="footer-wrapper position-relative">
  <div id="footerTopBorder" style="width: 1%;"></div>
    <!-- Footer -->
    <footer class="footer m-0 footer-title pb-4 text-lg-start text-white">
      <!-- Grid container -->
      <div class="container-fluid p-4 pb-0">
        <!-- Section: Links -->
        <section class="footer-section">

          <!--Grid row-->
          <div class="row">

            <div class="col-12 col-md-6 footer-col-logo pb-5">
        
            <?php if ( get_theme_mod( 'display_header_content', false ) && !$second_featured_image )  {
                $alternate_logo = get_theme_mod( 'alternate_logo' );
                $alternate_logo_text = get_theme_mod( 'alternate_logo_text' );
                $alternate_logo_url = wp_get_attachment_image_url( $alternate_logo, 'full' ); ?>
              <!-- Display content when the checkbox is checked -->
              <a class="navbar-brand navbar-brand-alternate" href="<?= home_url(); ?>" tabindex="0" alt="Home">
                <span class="alt-logo">
                  <img src="<?= $alternate_logo_url; ?>" alt="Logo" title="school-logo" />
                  <span class="visually-hidden">School Logo Link</span>
                </span>
                <span class="alt-logo-txt">
                  <?php echo $alternate_logo_text; ?>
                </span>
              </a>
            <?php }  
        elseif ($second_featured_image || get_theme_mod( 'display_header_content', false ) ) { ?>
        <a class="navbar-brand navbar-brand-alternate" href="<?= home_url(); ?>" tabindex="0" alt="Home">
          <span class="alt-logo">
                <img src="<?= $second_featured_image ?>" alt="Logo" title="logo" />
                </span>
              <span class="alt-logo-txt">
                <?= $custom_text; ?>
            </span>
        </a>
    <?php } else { ?>
              <a class="navbar-brand" href="<?= home_url(); ?>" alt="Home">
              <span><?php     
                $footer_image_id = get_theme_mod( 'footer_image' );
                  if ( $footer_image_id ) {
                      // Display the footer image
                      echo wp_get_attachment_image( $footer_image_id, 'full' );
                  } else {
                  the_custom_logo();
                  echo '<span class="visually-hidden">School Logo Link</span>';
                }?></span>
              </a>
    <?php } ?>
  </div>

            <div class="col-12 col-md-5 footer-col-social">
              <?php if (is_active_sidebar('footer-social-icons')) : 
                  dynamic_sidebar('footer-social-icons'); 
                endif; ?>
            </div>
          </div><!--END TOP Grid row-->
          <!--Start Link Grid row-->
          <div class="row">
            <!-- Grid column -->
            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 mx-auto my-4 footer-address-col">
              <div class="footer_widget mb-4">
                <?php if (is_active_sidebar('top-footer')) : 
                  dynamic_sidebar('top footer'); 
                endif; ?>
              </div>
            </div>
            <!-- END Grid column -->
  
            
  
            <!-- Grid column -->
            <div class="col-sm-6 col-md-6 col-lg-2 col-xl-2 mx-auto my-4 footer-col">
            <div class="footer_widget mb-4">
              <?php if (is_active_sidebar('footer-1')) : ?>
                <?php dynamic_sidebar('footer-1'); ?>
              <?php endif; ?>
              </div>
            </div>
            <!-- END Grid column -->
  
            
  
            <!-- Grid column -->
            <div class="col-sm-6 col-md-6 col-lg-2 col-xl-2 mx-auto my-4 footer-col">
            <div class="footer_widget mb-4">
            <?php if (is_active_sidebar('footer-2')) : ?>
                <?php dynamic_sidebar('footer-2'); ?>
              <?php endif; ?>
            </div>
            </div>
            <!-- END Grid column -->
            
  
            <!-- Grid column -->
            <div class="col-sm-6 col-md-6 col-lg-2 col-xl-2 mx-auto my-4 footer-col">
            <div class="footer_widget mb-4">
            <?php if (is_active_sidebar('footer-3')) : ?>
                <?php dynamic_sidebar('footer-3'); ?>
              <?php endif; ?>
            </div>
              </div>
              <!-- END Grid column -->

              <!-- Grid column -->
              <div class="col-sm-6 col-md-6 col-lg-2 col-xl-2 mx-auto my-4 footer-col">
              <div class="footer_widget mb-4">
              <?php if (is_active_sidebar('footer-4')) : ?>
                <?php dynamic_sidebar('footer-4'); ?>
              <?php endif; ?>
              </div>
              </div>
            <!-- END Grid column -->
          </div>
          <!--END Grid row-->
        </section>
        <!-- Section: Links -->
  

        <!-- Section: Copyright NEED TO TWEAK -->
        <section class="copyright-section">
          <div class="row">
            <!-- Grid column -->

            <div class="col-12 copyright-col">
              <span id="footer-copyright">
              <!-- Copyright -->
              <?php if (is_active_sidebar('footer-copyright')) : ?>
                <?php dynamic_sidebar('footer-copyright'); ?>
              <?php endif; ?>
              <!-- Copyright -->
              </span>
              </div>
          </div>
        </section>
        <!-- Section: Copyright -->
      
      </div>
      <!-- Grid container -->

    <!-- Footer -->
  </div>
<!-- END FOOTER WRAPPER -->
<?php wp_footer(); ?>

<?php get_template_part('template-parts/content', 'offcanvas-search'); ?>
<?php
$enable_feature = get_option('enable_feature');
$nav_display = isset($_SESSION['nav_display']) ? $_SESSION['nav_display'] : ''; 
if($enable_feature == 'yes' && (!isset($_SESSION['nav_display']))){
	
?>
<script>
jQuery(document).ready(function(){
	
    var click_tm = 0;	
		jQuery('.section-navigation .section-navigation-inner').addClass('menu-active');
		jQuery('.section-navigation .section-menu-btn').addClass('menu-enabled');
		jQuery('.section-navigation .section-menu-btn .open-btn').css('display', 'none');
		jQuery('.section-navigation .section-menu-btn .close-btn').css('display', 'block');
		jQuery('.section-navigation .section-menu-btn').click(function(){
				if(click_tm == 0){
					jQuery.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>", // Replace with your server-side script URL
				data: { action: 'nav_display_action', variableValue: 1 },
                success: function(response) {
                    
                    click_tm = 1;
					jQuery('.section-navigation .section-navigation-inner').removeClass('menu-active');
					jQuery('.section-navigation .section-menu-btn').removeClass('menu-enabled');
					jQuery('.section-navigation .section-menu-btn .open-btn').css('display', 'block');
					jQuery('.section-navigation .section-menu-btn .close-btn').css('display', 'none');
					}
				});
				}
				else {
					if(jQuery(this).hasClass("menu-enabled")) {
						console.log(jQuery(this).attr('class'));
								jQuery('.section-navigation .section-menu-btn .open-btn').css('display', 'none');
								jQuery('.section-navigation .section-menu-btn .close-btn').css('display', 'block');
								jQuery('.section-navigation .section-navigation-inner').addClass('menu-active');
								jQuery('.section-navigation .section-menu-btn').addClass('menu-enabled');
					}
					else{
								jQuery('.section-navigation .section-menu-btn .close-btn').css('display', 'none');
								jQuery('.section-navigation .section-menu-btn .open-btn').css('display', 'block');
								jQuery('.section-navigation .section-navigation-inner').removeClass('menu-active');
								jQuery('.section-navigation .section-menu-btn').removeClass('menu-enabled');
					}
				}
			
		});

});

</script>
<?php } elseif (isset($_SESSION['nav_display']) && $_SESSION['nav_display'] == 1 ) { ?>
	<script>
	jQuery(document).ready(function(){
		
    var session_nav  = <?php echo json_encode($_SESSION['nav_display']); ?>;
		console.log("Session Value "+session_nav);
		jQuery('.section-navigation .section-navigation-inner').removeClass('menu-active');
		jQuery('.section-navigation .section-menu-btn').removeClass('menu-enabled');
		jQuery('.section-navigation .section-menu-btn .open-btn').css('display', 'block');
		jQuery('.section-navigation .section-menu-btn .close-btn').css('display', 'none');
		jQuery('.section-navigation .section-menu-btn').click(function(){
				
					if(jQuery(this).hasClass("menu-enabled")) {
						console.log(jQuery(this).attr('class'));
								jQuery('.section-navigation .section-menu-btn .open-btn').css('display', 'none');
								jQuery('.section-navigation .section-menu-btn .close-btn').css('display', 'block');
								jQuery('.section-navigation .section-navigation-inner').addClass('menu-active');
								jQuery('.section-navigation .section-menu-btn').addClass('menu-enabled');
					}
					else{
								jQuery('.section-navigation .section-menu-btn .close-btn').css('display', 'none');
								jQuery('.section-navigation .section-menu-btn .open-btn').css('display', 'block');
								jQuery('.section-navigation .section-navigation-inner').removeClass('menu-active');
								jQuery('.section-navigation .section-menu-btn').removeClass('menu-enabled');
					}
			
		});
			
	
});	
</script>
<?php } else{ ?>
			<script>
	jQuery(document).ready(function(){
		
    var session_nav  = <?php if(isset($_SESSION['nav_display'])) {echo json_encode($_SESSION['nav_display']);} ?>;
		
		jQuery('.section-navigation .section-navigation-inner').removeClass('menu-active');
		jQuery('.section-navigation .section-menu-btn').removeClass('menu-enabled');
		jQuery('.section-navigation .section-menu-btn .open-btn').css('display', 'block');
		jQuery('.section-navigation .section-menu-btn .close-btn').css('display', 'none');
		
		jQuery('.section-navigation .section-menu-btn').click(function(){
				
					if(jQuery(this).hasClass("menu-enabled")) {
						
								jQuery('.section-navigation .section-menu-btn .open-btn').css('display', 'none');
								jQuery('.section-navigation .section-menu-btn .close-btn').css('display', 'block');
								jQuery('.section-navigation .section-navigation-inner').addClass('menu-active');
								jQuery('.section-navigation .section-menu-btn').addClass('menu-enabled');
					}
					else{
								jQuery('.section-navigation .section-menu-btn .close-btn').css('display', 'none');
								jQuery('.section-navigation .section-menu-btn .open-btn').css('display', 'block');
								jQuery('.section-navigation .section-navigation-inner').removeClass('menu-active');
								jQuery('.section-navigation .section-menu-btn').removeClass('menu-enabled');
					}
			
		});
});	
</script>
<?php }

?>
</body>
</html>