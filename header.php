<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 * 
 * @version 5.2.0.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/favicon-blue_1.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/favicon-blue_1.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/favicon-blue_1.png">
  <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=647a2dd340353a0019caf1f9&product=inline-share-buttons&source=platform" async="async"></script>
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <?php wp_body_open(); ?>
  <?php 
    $post_id = get_queried_object_id();
    $second_featured_image = get_post_meta($post_id, 'second_featured_image', true);
    $custom_text = get_post_meta($post_id, 'custom_text', true);
    $header_link_new_tab = get_theme_mod('header_link_new_tab');
    $header_link_2_new_tab = get_theme_mod('header_link_2_new_tab');
    ?>

  <div id="page" class="site">
    
  <div class="top-alert">
  <?php if (is_active_sidebar('top-nav')) { 
                 dynamic_sidebar('top nav');
        } else {
            $blocks = parse_blocks( get_the_content() );
            foreach ( $blocks as $block ) {
            if ( 'create-block/alert' === $block['blockName'] ) {
                echo render_block( $block );
                break;
            }
        }
    } ?>
    </div>
    <div id="search-modal" class="search-modal">
        <script src="https://www.google.com/jsapi"></script>
        <script src="https://cse.google.com/cse.js?cx=014080162503224819692:afbeo7xiquu"></script>
        <div class="gcse-search" enableOrderBy="true" data-as_sitesearch="<?php echo get_option( 'same_site_search' ) ? $_SERVER['SERVER_NAME'] : ''; ?>"></div>
        <button id="close-search-button" class="close-search" onclick="hideSearchModal();"><img class="search-icon" alt="close search" src="/wp-content/themes/ufl-main-uni/img/x.PNG"></button>
    </div>

    <header id="masthead" class="header header-wrapper fixed-header w-100">
    <!-- START FULL WIDTH TOP NAV CONTAINER (LOGO + TOP NAV)-->

    <div class="container-fluid header-container">
        <div class="row justify-content-between header-row">
            <a class="visually-hidden-focusable" href="#content">Skip to main content</a>
            <!-- START LOGO COL-->
            <div class="col-sm-8 col-md-6 col-logo">

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
    <?php } else {
        the_custom_logo();
        echo '<span class="visually-hidden">School Logo Link</span>';
    } ?>
</div>
               

            <!-- END LOGO COL-->


            <!-- START MOBILE ONLY SEARCH AND TOGGLE-->
            <div class="mobile-nav">
                <div class="mobile-search mobile-only-search">
                  <button id="search-button" class="search-button" onclick="displaySearchModal();">
                    <img class="search-icon" alt="search" src="/wp-content/themes/ufl-main-uni/img/search_icon.png">
                  </button>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span style="margin-bottom: 10px;margin-top: -10px;">MENU</span>
                    <span class="navbar-icon-wrapper">
                        <span class="navbar-toggler-icon"></span>
                    </span>
                </button>
            </div>
            <!-- END MOBILE ONLY SEARCH AND TOGGLE-->

            <!-- START DESKTOP ONLY TOP MENU ITEMS & DROPDOWNS-->
            <div class="col-md-6 d-md-flex justify-content-end mb-md-0 mb-3 flex-column audience-nav-col">
                <!-- Optional Offsite and UFL Header Links-->
                <div class="offsite-links d-flex justify-content-end">
                    <?php if (get_theme_mod('header_link') ) { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'header_link' ) ); ?>" <?php if ($header_link_new_tab) echo 'target="_blank"'; ?> class="optional-offsite-link"><?php echo get_theme_mod( 'header_link_text'); ?></a>
                    <?php } ?>
                    <?php if (get_theme_mod('header_link_2') ) { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'header_link_2' ) ); ?>" <?php if ($header_link_2_new_tab) echo 'target="_blank"'; ?> class="ufl-main-link"><?php echo get_theme_mod( 'header_link_2_text'); ?></a>
                    <?php } ?>
                </div>
                <!-- END Optional Offsite and UFL Header Links-->



                <!-- Audience Nav Dropdown Links-->
                <div class="audience-nav-links d-flex justify-content-end">

                    <?php 
                        if (has_nav_menu('resources-menu') || has_nav_menu('other-menu')) {
                            echo '<div class="desk-only-search">';
                        } else {
                            echo '<div class="desk-only-search search-no-menus">';
                        }
                    ?>

                        <button id="search-button" class="search-button" onclick="displaySearchModal();">
                            <img class="search-icon" alt="search" src="/wp-content/themes/ufl-main-uni/img/search_icon.png">
                        </button>
                    </div>

                    <?php 
                        $locations = get_nav_menu_locations();
                    ?>

                    <?php if ( has_nav_menu( 'information-menu' ) ) {
                        $infoMenu = wp_get_nav_menu_object( $locations['information-menu'] );
                        $infomenuTitle = $infoMenu->name;
                        ?>
                    <div class="dropdown">
                        <div class="dropdown-hover position-relative">
                            <a class="nav-link dropdown-toggle-top" href="#" role="button" id="infoMenuLink" aria-expanded="false"><?= $infomenuTitle ?></a>
                            <span class="mobile-menu-toggle"></span>
                            <?php
                                wp_nav_menu(array(
                                'theme_location' => 'information-menu',
                                'container' => false,
                                'menu' => 'Information menu', 
                                'menu_class' => '',
                                'fallback_cb' => '__return_false',
                                'items_wrap' => '<ul class="dropdown-menu animate slideIn dropdown-menu-lg-end" aria-labelledby="infoMenuLink">%3$s</ul>',
                                'depth' => 0,
                                'after' => '',
                                'walker' => new bootstrap_5_wp_nav_menu_walker()
                                ));
                            ?>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if ( has_nav_menu( 'resources-menu' ) ) { 
                        $resourceMenu = wp_get_nav_menu_object( $locations['resources-menu'] );
                        $resourcemenuTitle = $resourceMenu->name;
                        ?>
                    <div class="dropdown">
                        <div class="dropdown-hover position-relative"> 
                            <a class="nav-link dropdown-toggle-top" href="#" role="button" id="resourcesMenuLink" aria-expanded="false"><?= $resourcemenuTitle ?></a>
                                <span class="mobile-menu-toggle"></span>
                                        <?php
                                wp_nav_menu(array(
                                'theme_location' => 'resources-menu',
                                'container' => false,
                                'menu' => 'Resources menu', 
                                'menu_class' => '',
                                'fallback_cb' => '__return_false',
                                'items_wrap' => '<ul class="dropdown-menu animate slideIn dropdown-menu-lg-end" aria-labelledby="resourcesMenuLink">%3$s</ul>',
                                'depth' => 0,
                                'after' => '',
                                'walker' => new bootstrap_5_wp_nav_menu_walker()
                                ));
                                ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- END DESKTOP ONLY TOP MENU ITEMS & DROPDOWNS-->
        </div>
    </div>
    <!-- END FULL WIDTH TOP NAV CONTAINER (LOGO + TOP NAV)-->
    <!-- START FULL WIDTH MAIN NAV CONTAINER -->
    <nav class="navbar main_navbar pt-0 pb-0 navbar-expand-xxl" id="main-navbar">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- START MOBILE ONLY LINKS + MOBILE MENU ACTIVE TOGGLE -->
                <div class="mobile-offsite-toggle-wrapper"> <span class="mobile-offsite-links"></span> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span style="margin-bottom: 10px;margin-top: -10px;">MENU</span> <span class="navbar-icon-wrapper"> <span class="navbar-toggler-icon"></span> </span> </button> </div>
                <!-- END MOBILE ONLY LINKS + MOBILE MENU ACTIVE TOGGLE -->
                <?php
                wp_nav_menu(array(
                  'theme_location' => 'main-menu',
                  'container' => false,
                  'menu_class' => '',
                  'fallback_cb' => '__return_false',
                  'items_wrap' => '<ul class="navbar-nav d-md-flex m-auto justify-content-evenly flex-wrap w-100" id="main-nav-ul">%3$s</ul>',
                  'depth' => 0,
                  'after' => '<span class="mobile-menu-toggle"></span>',
                  'walker' => new bootstrap_5_wp_nav_menu_walker()
                ));
                ?>
                <div class="mobile-secondary-dropdown">
                </div>
            </div>
        </div>
    </nav>

    <!-- END FULL WIDTH MAIN NAV CONTAINER -->


    </header><!-- #masthead -->
    