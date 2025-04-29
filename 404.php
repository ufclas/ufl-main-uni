<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Bootscore
 */

get_header();
?>
<div id="content" class="site-content container py-5 mt-5">
  <div id="primary" class="content-area">

    <main id="main" class="site-main">

      <section class="error-404 not-found">
        <div class="page-404">

          <!-- Remove this line and place some widgets -->
          <!-- 404 Widget -->
          <?php if (is_active_sidebar('404-page')) : ?>
            <div><?php dynamic_sidebar('404-page'); ?></div>
          <?php endif; ?>
          
        </div>
      </section><!-- .error-404 -->

    </main><!-- #main -->

  </div><!-- #primary -->
</div><!-- #content -->

<?php
get_footer();
