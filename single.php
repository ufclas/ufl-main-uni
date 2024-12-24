<?php
/**
 * Template Post Type: post
 */

get_header();  
?>

<div id="content" class="single-news">
    <!-- Hook to add something nice -->
    <?php bs_after_primary(); ?>
    <?php the_content(); ?>
    <div class="mobile-related single-news-related-content"></div>
  </div>
<?php
get_footer();