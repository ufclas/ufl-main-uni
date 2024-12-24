<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();


$ufl_nav_menu_show = get_post_meta($post->ID, 'ufl_nav_menu_show', true);

if ($ufl_nav_menu_show === "0" || $ufl_nav_menu_show === "") {
  the_breadcrumb($post, true);
}






?>

<div id="content" class="site-content">
  <div id="primary" class="content-area">
    <!-- Hook to add something nice -->
    <?php bs_after_primary(); ?>
    <?php parse_blocks( $post->post_content ); ?>
        <main id="main" class="site-main">
            <?php the_content(); ?>
        </main>
    </div>
</div>
<?php
get_footer();