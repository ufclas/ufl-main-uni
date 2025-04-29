<?php

/**
 * UFL Main functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package UFL Main
 */


// Register Bootstrap 5 Nav Walker
if (!function_exists('register_navwalker')) :
  function register_navwalker() {
    require_once('inc/class-bootstrap-5-navwalker.php');
    require_once('inc/default-class-bootstrap-5-navwalker.php');
    // Register Menus
    register_nav_menu('main-menu', 'Main menu');
    register_nav_menu('footer-menu', 'Footer menu');
    register_nav_menu('information-menu', 'Information menu');
    register_nav_menu('resources-menu', 'Resources menu');
  }
endif;
add_action('after_setup_theme', 'register_navwalker');
// Register Bootstrap 5 Nav Walker END
require_once('inc/second-featured-image.php');


// Register Comment List
if (!function_exists('register_comment_list')) :
  function register_comment_list() {
    // Register Comment List
    require_once('inc/comment-list.php');
  }
endif;
add_action('after_setup_theme', 'register_comment_list');
// Register Comment List END


if (!function_exists('ufl_stamats_setup')) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function ufl_stamats_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
    */
    load_theme_textdomain('ufl_stamats', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
    */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
    */
    add_theme_support('post-thumbnails');

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
    */
    add_theme_support('html5', array(
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ));

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');
  }
endif;
add_action('after_setup_theme', 'ufl_stamats_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ufl_stamats_content_width() {
  // This variable is intended to be overruled from themes.
  $GLOBALS['content_width'] = apply_filters('ufl_stamats_content_width', 1640);
}
add_action('after_setup_theme', 'ufl_stamats_content_width', 0);


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// Widgets
if (!function_exists('ufl_stamats_widgets_init')) :

  function ufl_stamats_widgets_init() {

    // Top Nav
    register_sidebar(array(
      'name'          => esc_html__('Global Alert', 'ufl_stamats'),
      'id'            => 'top-nav',
      'description'   => esc_html__('Add widgets here.', 'ufl_stamats'),
      'before_widget' => '<div>',
      'after_widget'  => '</div>',
      'before_title'  => '<div class="widget-title d-none">',
      'after_title'   => '</div>'
    ));
    // Top Nav End

    // Top Nav Search
    register_sidebar(array(
      'name'          => esc_html__('Top Nav Search', 'ufl_stamats'),
      'id'            => 'top-nav-search',
      'description'   => esc_html__('Add widgets here.', 'ufl_stamats'),
      'before_widget' => '<div class="top-nav-search">',
      'after_widget'  => '</div>',
      'before_title'  => '<div class="widget-title d-none">',
      'after_title'   => '</div>'
    ));
    // Top Nav Search End

    // Sidebar
    register_sidebar(array(
      'name'          => esc_html__('Sidebar', 'ufl_stamats'),
      'id'            => 'sidebar-1',
      'description'   => esc_html__('Add widgets here.', 'ufl_stamats'),
      'before_widget' => '<section id="%1$s" class="widget %2$s card card-body mb-4 bg-light border-0">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title card-title border-bottom py-2">',
      'after_title'   => '</h2>',
    ));
    // Sidebar End

    // Top Footer
    register_sidebar(array(
      'name'          => esc_html__('Footer Contact Column', 'ufl_stamats'),
      'id'            => 'top-footer',
      'description'   => esc_html__('Add widgets here.', 'ufl_stamats'),
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>'
    ));
    // Top Footer End

    // Social Footer
    register_sidebar(array(
      'name'          => esc_html__('Footer Social Icons', 'ufl_stamats'),
      'id'            => 'footer-social-icons',
      'description'   => esc_html__('Add widgets here.', 'ufl_stamats'),
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>'
    ));
    // Social Footer End

    // Footer 1
    register_sidebar(array(
      'name'          => esc_html__('Footer Link Column 1', 'ufl_stamats'),
      'id'            => 'footer-1',
      'description'   => esc_html__('Add widgets here.', 'ufl_stamats'),
      'before_title'  => '<h2 class="widget-title h4">',
      'after_title'   => '</h2>'
    ));
    // Footer 1 End

    // Footer 2
    register_sidebar(array(
      'name'          => esc_html__('Footer Link Column 2', 'ufl_stamats'),
      'id'            => 'footer-2',
      'description'   => esc_html__('Add widgets here.', 'ufl_stamats'),
      'before_title'  => '<h2 class="widget-title h4">',
      'after_title'   => '</h2>'
    ));
    // Footer 2 End

    // Footer 3
    register_sidebar(array(
      'name'          => esc_html__('Footer Link Column 3', 'ufl_stamats'),
      'id'            => 'footer-3',
      'description'   => esc_html__('Add widgets here.', 'ufl_stamats'),
      'before_title'  => '<h2 class="widget-title h4">',
      'after_title'   => '</h2>'
    ));
    // Footer 3 End

    // Footer 4
    register_sidebar(array(
      'name'          => esc_html__('Footer Link Column 4', 'ufl_stamats'),
      'id'            => 'footer-4',
      'description'   => esc_html__('Add widgets here.', 'ufl_stamats'),
      'before_title'  => '<h2 class="widget-title h4">',
      'after_title'   => '</h2>'
    ));
    // Footer 4 End

    // Copyright
    register_sidebar(array(
      'name'          => esc_html__('Copyright', 'ufl_stamats'),
      'id'            => 'footer-copyright',
      'description'   => esc_html__('Add widgets here.', 'ufl_stamats'),
      'before_title'  => '<div class="widget-title d-none">',
      'after_title'   => '</div>'
    ));
    // Copyright End

    // 404 Page
    register_sidebar(array(
      'name'          => esc_html__('404 Page', 'ufl_stamats'),
      'id'            => '404-page',
      'description'   => esc_html__('Add widgets here.', 'ufl_stamats'),
      'before_widget' => '<div class="mb-4">',
      'after_widget'  => '</div>',
      'before_title'  => '<h1 class="widget-title">',
      'after_title'   => '</h1>'
    ));
    // 404 Page End

  }
  add_action('widgets_init', 'ufl_stamats_widgets_init');


endif;
// Widgets END


// Shortcode in HTML-Widget
add_filter('widget_text', 'do_shortcode');
// Shortcode in HTML-Widget End



//Enqueue scripts and styles
function ufl_stamats_scripts() {
  // Get modification time. Enqueue files with modification date to prevent browser from loading cached scripts and styles when file content changes.
  $modificated_bootscoreCss = (file_exists(get_template_directory() . '/css/main.css')) ? date('YmdHi', filemtime(get_template_directory() . '/css/main.css')) : 1;
  $modificated_styleCss = date('YmdHi', filemtime(get_stylesheet_directory() . '/style.css'));
  $modificated_themeJs = date('YmdHi', filemtime(get_template_directory() . '/js/theme.js'));
  // bootScore
  require_once 'inc/scss-compiler.php';
  ufl_stamats_compile_scss();
  wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css', array(), $modificated_bootscoreCss);
  // Style CSS
  wp_enqueue_style('bootscore-style', get_stylesheet_uri(), array(), $modificated_styleCss);
  // Theme JS
  wp_enqueue_script('bootscore-script', get_template_directory_uri() . '/js/theme.js', array('jquery'), $modificated_themeJs, true);

  // IE Warning
  wp_localize_script('bootscore-script', 'ufl_stamats', array(
    'ie_title'                 => __('Internet Explorer detected', 'ufl_stamats'),
    'ie_limited_functionality' => __('This website will offer limited functionality in this browser.', 'ufl_stamats'),
    'ie_modern_browsers_1'     => __('Please use a modern and secure web browser like', 'ufl_stamats'),
    'ie_modern_browsers_2'     => __(' <a href="https://www.mozilla.org/firefox/" target="_blank">Mozilla Firefox</a>, <a href="https://www.google.com/chrome/" target="_blank">Google Chrome</a>, <a href="https://www.opera.com/" target="_blank">Opera</a> ', 'ufl_stamats'),
    'ie_modern_browsers_3'     => __('or', 'ufl_stamats'),
    'ie_modern_browsers_4'     => __(' <a href="https://www.microsoft.com/edge" target="_blank">Microsoft Edge</a> ', 'ufl_stamats'),
    'ie_modern_browsers_5'     => __('to display this site correctly.', 'ufl_stamats'),
  ));
  // IE Warning End

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'ufl_stamats_scripts');
//Enqueue scripts and styles END



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}

// Pagination Categories
if (!function_exists('ufl_stamats_pagination')) :

  function ufl_stamats_pagination($pages = '', $range = 2) {
    $showitems = ($range * 2) + 1;
    global $paged;
    // default page to one if not provided
    if(empty($paged)) $paged = 1;
    if ($pages == '') {
      global $wp_query;
      $pages = $wp_query->max_num_pages;

      if (!$pages)
        $pages = 1;
    }

    if (1 != $pages) {
      echo '<nav aria-label="Page navigation" role="navigation">';
      echo '<span class="sr-only">Page navigation</span>';
      echo '<ul class="pagination justify-content-center ft-wpbs mb-4">';


      if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
        echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link(1) . '" aria-label="First Page">&laquo;</a></li>';

      if ($paged > 1 && $showitems < $pages)
        echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($paged - 1) . '" aria-label="Previous Page">&lsaquo;</a></li>';

      for ($i = 1; $i <= $pages; $i++) {
        if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems))
          echo ($paged == $i) ? '<li class="page-item active"><span class="page-link"><span class="sr-only">Current Page </span>' . $i . '</span></li>' : '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($i) . '"><span class="sr-only">Page </span>' . $i . '</a></li>';
      }

      if ($paged < $pages && $showitems < $pages)
        echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link(($paged === 0 ? 1 : $paged) + 1) . '" aria-label="Next Page">&rsaquo;</a></li>';

      if ($paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages)
        echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($pages) . '" aria-label="Last Page">&raquo;</a></li>';

      echo '</ul>';
      echo '</nav>';
      // Uncomment this if you want to show [Page 2 of 30]
      // echo '<div class="pagination-info mb-5 text-center">[ <span class="text-muted">Page</span> '.$paged.' <span class="text-muted">of</span> '.$pages.' ]</div>';	 	
    }
  }

endif;
//Pagination Categories END


// Pagination Buttons Single Posts
add_filter('next_post_link', 'post_link_attributes');
add_filter('previous_post_link', 'post_link_attributes');

function post_link_attributes($output) {
  $code = 'class="page-link"';
  return str_replace('<a href=', '<a ' . $code . ' href=', $output);
}
// Pagination Buttons Single Posts END


// Excerpt to pages
add_post_type_support('page', 'excerpt');
// Excerpt to pages END


// Breadcrumb
if (!function_exists('the_breadcrumb')) :
function the_breadcrumb($post, $displayCurrent) {

	$count = 1;
	$postAncestors = get_post_ancestors($post);
	$sortedAncestorArray = array();
	foreach ($postAncestors as $ancestor){
		$sortedAncestorArray[] = $ancestor;
	}
	krsort($sortedAncestorArray); // Sort an array by key in reverse order
  echo '<nav aria-label="breadcrumb" class="breadcrumb-wrapper"><ol class="breadcrumb">';
  echo '<li class="breadcrumb-item"><a href="' . home_url() . '">' . 'Home' . '</a></li>';
	foreach ($sortedAncestorArray as $ancestor){
		echo "<li class='breadcrumb-item'><a class='breadcrumb-link-". $count ."' href='". esc_url(get_permalink($ancestor)) ."' title='". get_the_title($ancestor) ."'>". get_the_title($ancestor) ."</a></li>";
		$count++;
	}
	if($displayCurrent){ //If TRUE - output the current page title
		echo "<li class='breadcrumb-item active' aria-current='page'>". get_the_title($post) ."</li>";
	}

  echo '</ol></nav>';

}
add_filter('breadcrumbs', 'breadcrumbs');
endif;
// Breadcrumb END


// Comment Button
if (!function_exists('ufl_stamats_comment_button')) :
  function ufl_stamats_comment_button($args) {
    $args['class_submit'] = 'btn btn-outline-primary'; // since WP 4.1    
    return $args;
  }
  add_filter('comment_form_defaults', 'ufl_stamats_comment_button');
endif;
// Comment Button END


// Password protected form
if (!function_exists('ufl_stamats_pw_form')) :
  function ufl_stamats_pw_form() {
    $output = '
        <form action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post" class="form-inline">' . "\n"
      . '<input name="post_password" type="password" size="" class="form-control me-2 my-1" placeholder="' . __('Password', 'ufl_stamats') . '"/>' . "\n"
      . '<input type="submit" class="btn btn-outline-primary my-1" name="Submit" value="' . __('Submit', 'ufl_stamats') . '" />' . "\n"
      . '</p>' . "\n"
      . '</form>' . "\n";
    return $output;
  }
  add_filter("the_password_form", "ufl_stamats_pw_form");
endif;
// Password protected form END


// Allow HTML in term (category, tag) descriptions
foreach (array('pre_term_description') as $filter) {
  remove_filter($filter, 'wp_filter_kses');
  if (!current_user_can('unfiltered_html')) {
    add_filter($filter, 'wp_filter_post_kses');
  }
}

foreach (array('term_description') as $filter) {
  remove_filter($filter, 'wp_kses_data');
}
// Allow HTML in term (category, tag) descriptions END


// Allow HTML in author bio
remove_filter('pre_user_description', 'wp_filter_kses');
add_filter('pre_user_description', 'wp_filter_post_kses');
// Allow HTML in author bio END


// Hook after #primary
function bs_after_primary() {
  do_action('bs_after_primary');
}
// Hook after #primary END


// Open links in comments in new tab
if (!function_exists('bs_comment_links_in_new_tab')) :
  function bs_comment_links_in_new_tab($text) {
    return str_replace('<a', '<a target="_blank" rel=”nofollow”', $text);
  }
  add_filter('comment_text', 'bs_comment_links_in_new_tab');
endif;
// Open links in comments in new tab END





// style and scripts
add_action('wp_enqueue_scripts', 'bootscore_child_enqueue_styles_uni');
function bootscore_child_enqueue_styles_uni() {
  // style.css
  //wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
  // Compiled main.css
  //$modified_bootscoreChildCss = date('YmdHi', filemtime(get_stylesheet_directory() . '/css/main.css'));
 // wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css', array('parent-style'), $modified_bootscoreChildCss);
  // custom.js
  wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', false, '', true);
}



add_action('wp_enqueue_scripts', 'firstwd_enqueue');
function firstwd_enqueue() {
  $modificated_bootstrapJs = date('YmdHi', filemtime(get_template_directory() . '/js/lib/bootstrap.bundle.min.js'));
  // Bootstrap JS
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/lib/bootstrap.bundle.min.js', array(), $modificated_bootstrapJs, true);
    wp_enqueue_script('lightbox-js', get_template_directory_uri() . '/js/lightbox.js', false, '', true);
    wp_enqueue_script('directional-hover-js', get_template_directory_uri() . '/js/jquery.directional-hover.min.js', false, '', true);
	wp_enqueue_style( 'slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
	wp_enqueue_style( 'slick-theme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1' );
	wp_enqueue_script( 'slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array( 'jquery' ), '1.8.1', true );
    wp_enqueue_script( 'isotope', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', array( 'jquery' ), '', true );
}

function ufl_custom_logo_setup() {
	$defaults = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => false, 
		'class'                => 'img-fluid',
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'ufl_custom_logo_setup' );


function custom_theme_customize_register( $wp_customize ) {
  // Add a setting for the footer image upload
  $wp_customize->add_setting( 'footer_image', array(
	'default' => '',
	'transport' => 'refresh',
	'type'    => 'theme_mod',
	'sanitize_callback' => 'absint', // Use this for image IDs
) );

// Add a control for the footer image upload
$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'footer_image', array(
	'label' => __( 'Footer Image', 'ufl_stamats' ),
	'section' => 'title_tagline',
	'mime_type' => 'image',
) ) );

// Add Optional Offsite Header Links and Text

$wp_customize->add_setting('header_link', array(
	'default' => '',
	'type' => 'theme_mod',
  ));
  
  $wp_customize->add_setting('header_link_text', array(
	'default' => '',
	'type' => 'theme_mod',
  ));
  
  $wp_customize->add_setting('header_link_new_tab', array(
	'default' => false,
	'type' => 'theme_mod',
  ));
  
  $wp_customize->add_control('header_link', array(
	'label' => __('Optional Offsite Link', 'custom-theme'),
	'section' => 'title_tagline',
	'type' => 'text',
  ));
  
  $wp_customize->add_control('header_link_text', array(
	'label' => __('Optional Offsite Link Text', 'custom-theme'),
	'section' => 'title_tagline',
	'type' => 'text',
  ));
  
  $wp_customize->add_control('header_link_new_tab', array(
	'label' => __('Open link in new tab', 'custom-theme'),
	'section' => 'title_tagline',
	'type' => 'checkbox',
  ));


  $wp_customize->add_setting('header_link_2', array(
	'default' => '',
	'type' => 'theme_mod',
  ));
  
  $wp_customize->add_setting('header_link_2_text', array(
	'default' => '',
	'type' => 'theme_mod',
  ));
  
  $wp_customize->add_setting('header_link_2_new_tab', array(
	'default' => false,
	'type' => 'theme_mod',
  ));
  
  $wp_customize->add_control('header_link_2', array(
	'label' => __('Optional Offsite Link', 'custom-theme'),
	'section' => 'title_tagline',
	'type' => 'text',
  ));
  
  $wp_customize->add_control('header_link_2_text', array(
	'label' => __('Optional Offsite Link Text', 'custom-theme'),
	'section' => 'title_tagline',
	'type' => 'text',
  ));
  
  $wp_customize->add_control('header_link_2_new_tab', array(
	'label' => __('Open link in new tab', 'custom-theme'),
	'section' => 'title_tagline',
	'type' => 'checkbox',
  ));
  

// Add Alternate Logo Section 
$wp_customize->add_section( 'mytheme_section', array(
	'title'    => __( 'Alternate Logo Section', 'custom-theme' ),
	'priority' => 30,
) );
// Add a checkbox control
$wp_customize->add_setting( 'display_header_content', array(
	'default'           => false,
	'sanitize_callback' => 'sanitize_checkbox',
) );
$wp_customize->add_control( 'display_header_content', array(
	'label'    => __( 'Display Alternate Logo', 'custom-theme' ),
	'section'  => 'mytheme_section',
	'type'     => 'checkbox',
) );
$wp_customize->add_setting( 'alternate_logo_text', array(
'default' => '',
'type'    => 'theme_mod',
) );
$wp_customize->add_control( 'alternate_logo_text', array(
'label'   => __( 'Alternate Logo Text', 'custom-theme' ),
'section' => 'mytheme_section',
'type'    => 'text',
) );
// Add a setting for the alternate_logo image upload
$wp_customize->add_setting( 'alternate_logo', array(
	'default' => '',
	'transport' => 'refresh',
	'type'    => 'theme_mod',
	'sanitize_callback' => 'absint', // Use this for image IDs
) );
// Add a control for the alternate_logo image upload
$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'alternate_logo', array(
	'label' => __( 'Alternate Logo Image', 'custom-theme' ),
	'section' => 'mytheme_section',
	'mime_type' => 'image',
) ) );

}
add_action( 'customize_register', 'custom_theme_customize_register' );


function sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function lr_theme_features() {
  // Add support for block styles.
  add_theme_support( 'wp-block-styles' );
  // Enqueue editor styles.
  add_editor_style( '/css/main.css' );
}
add_action('after_setup_theme', 'lr_theme_features');

function lr_theme_features_old() {
  // Enqueue editor styles
  // Borrowed from TwentyTwentyToTheme
  add_editor_style( 'style.css' );
  add_theme_support('editor-styles');
}

add_action('after_setup_theme', 'lr_theme_features_old');
	// -- Disable Custom Colors
	// add_theme_support( 'disable-custom-colors' );
	// -- Editor Color Palette
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Blue', 'ufl_stamats' ),
			'slug'  => 'blue',
			'color'	=> '#0021a5',
		),
		array(
			'name'  => __( 'White', 'ufl_stamats' ),
			'slug'  => 'white',
			'color' => '#fff',
		),
		array(
			'name'  => __( 'Orange', 'ufl_stamats' ),
			'slug'  => 'orange',
			'color' => '#e8552f',
		),
		array(
			'name'	=> __( 'Light Gray', 'ufl_stamats' ),
			'slug'	=> 'light-gray',
			'color'	=> '#f4f6f6',
		),
	) );


function be_gutenberg_scripts() {
	wp_enqueue_script( 'be-editor', get_template_directory_uri() . '/assets/js/editor.js', array( 'wp-blocks', 'wp-dom' ), filemtime( get_stylesheet_directory() . '/assets/js/editor.js' ), true );
}
add_action( 'enqueue_block_editor_assets', 'be_gutenberg_scripts' );

function get_the_top_ancestor_id() {
	global $post;
	if ( $post->post_parent ) {
		$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
		return $ancestors[0];
	} else {
		return $post->ID;
	}
}


// Single News Filtering

function get_posts_years_array() {
	global $wpdb;
	$result = array();
	$years = $wpdb->get_results(
	  "SELECT YEAR(post_date) FROM {$wpdb->posts} WHERE post_status = 'publish' GROUP BY YEAR(post_date) DESC",
	  ARRAY_N
	);
	if (is_array($years) && count($years) > 0) {
	  foreach ($years as $year) {
		$result[] = $year[0];
	  }
	}
	return $result;
  }
  

add_action( 'wp_enqueue_scripts', 'misha_script_and_styles');

function misha_script_and_styles() {
	// absolutely need it, because we will get $wp_query->query_vars and $wp_query->max_num_pages from it.
	global $wp_query;
	// when you use wp_localize_script(), do not enqueue the target script immediately
	wp_register_script( 'misha_scripts', get_template_directory_uri() . '/js/ajax-script.js', array('jquery') );
	// passing parameters here
	// actually the <script> tag will be created and the object "misha_loadmore_params" will be inside it 
	wp_localize_script( 'misha_scripts', 'misha_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => $wp_query->query_vars['paged'] ? $wp_query->query_vars['paged'] : 1,
		'max_page' => $wp_query->max_num_pages
	) );
 	wp_enqueue_script( 'misha_scripts' );
}

add_action('wp_ajax_loadmorebutton', 'misha_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmorebutton', 'misha_loadmore_ajax_handler');
 
function misha_loadmore_ajax_handler(){
	// prepare our arguments for the query
	$params = json_decode( stripslashes( $_POST['query'] ), true ); // query_posts() takes care of the necessary sanitization 
	$params['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$params['post_status'] = 'publish';
 
	// it is always better to use WP_Query but not here
	query_posts( $params );
 
	if( have_posts() ) :
 
		// run the loop
		while( have_posts() ): the_post();
 
			    get_template_part( 'template-parts/content-post');

		endwhile;
	endif;
	die; // here we exit the script and even no wp_reset_query()
}
add_action('wp_ajax_mishafilter', 'misha_filter_function'); 
add_action('wp_ajax_nopriv_mishafilter', 'misha_filter_function');
 
function misha_filter_function(){
	if(isset($_POST['datefilter']) && $_POST['datefilter'] != '') {
		$datefilter = $_POST['datefilter'];
	}
	if(isset($_POST['categoryfilter']) && $_POST['categoryfilter'] != '') {
		$catfilter = $_POST['categoryfilter'];
	}

	if( $datefilter && $catfilter ) {
		// if categoryfilter is set and not empty
		$params = array(
			'posts_per_page' => 15,
			'tax_query' => array(
				array(
					'taxonomy' => 'category',
					'field' => 'id',
					'terms' => $_POST['categoryfilter']
				)
			), 
			'date_query' => array(
				array(
					'year' => $_POST['datefilter']
				)
			)
		);
	  } 

	  if( $datefilter && !$catfilter ) {
		// if categoryfilter is set and not empty
		$params = array(
			'posts_per_page' => 15,
			'date_query' => array(
				array(
					'year' => $_POST['datefilter']
				)
			)
		);
	  } 
	  
	  if( !$datefilter && $catfilter ) {
		// if categoryfilter is set and not empty
		$params = array(
			'posts_per_page' => 15,
			'tax_query' => array(
				array(
					'taxonomy' => 'category',
					'field' => 'id',
					'terms' => $_POST['categoryfilter']
				)
			), 
		);
	  } 
	  if( !$datefilter && !$catfilter ) {
		// if categoryfilter is set and not empty
		// if both are not set or empty
		$params = array(
			'posts_per_page' => 15,
		);
	  } 
	query_posts( $params );
 
	global $wp_query;
 
	if( have_posts() ) :
 
 		ob_start(); // start buffering because we do not need to print the posts now
 
		while( have_posts() ): the_post();
 
			  get_template_part( 'template-parts/content-post');
 
		endwhile;
 
 		$posts_html = ob_get_contents(); // we pass the posts to variable
   		ob_end_clean(); // clear the buffer
	else:
		$posts_html = '<p>Nothing found for your criteria.</p>';
	endif;
	// no wp_reset_query() required
 	echo json_encode( array(
		'posts' => json_encode( $wp_query->query_vars ),
		'max_page' => $wp_query->max_num_pages,
		'found_posts' => $wp_query->found_posts,
		'content' => $posts_html
	) );
 
	die();
}


//========> Custom Meta Box for Dropdown Menu
add_action( 'add_meta_boxes', 'ufl_menu_metaBox' );
function ufl_menu_metaBox($post){
	add_meta_box('ufl_menu_id', 'Disable Breadcrumb', 'ufl_crt_metaBox_menu', 'page', 'side' , 'low');
}

function ufl_crt_metaBox_menu($post){
	$ufl_nav_menu_show = get_post_meta($post->ID, 'ufl_nav_menu_show', true);
?>
	<p class="ufl_checkbox">
    	<span>Disable Breadcrumb on Page</span>
        <input type="checkbox" name="ufl_nav_menu_show" id="ufl_nav_menu_show" value="1" <?php echo ($ufl_nav_menu_show == 1) ? 'checked="checked"' : ''; ?> />
    </p>


<?php
}
add_action('save_post', 'ufl_save_menu_metaBox');
function ufl_save_menu_metaBox(){
	global $post;
	$ufl_nav_menu_show = [];
	$ufl_nav_menu_show = isset( $_POST['ufl_nav_menu_show'] ) ? $_POST['ufl_nav_menu_show'] : '';
	if ($ufl_nav_menu_show ) {
		update_post_meta($post->ID, 'ufl_nav_menu_show', $ufl_nav_menu_show);
	}

}

//========> Admin CSS
add_action("admin_head", "ufl_admin_css");
function ufl_admin_css() {
?>
	<style type="text/css">
    .ufl_checkbox {
        font-weight: bold;
		border-bottom: 1px solid #EEE;
		padding-bottom: 8px;
    }
	.ufl_checkbox span {
		padding-right: 30px;
	}
	select.ufl_opt_select {
		border: 1px solid #EEE;
		border-radius: 4px;
		width: 94%;
	}
</style>
<?php
}

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );




function socialFeed(){
  $content = '';
  try {
      $socialText = '';
      $socialImg = '';
      $socialLink = '';
      $i = 1;

      $ch1 = curl_init();
      $ch2 = curl_init();

  // curl_setopt($ch1, CURLOPT_URL, 'https://api.twitter.com/2/users/44168607/tweets?max_results=5&media.fields=preview_image_url%2Curl%2Ctype&user.fields=name%2Cusername%2Centities&tweet.fields=attachments%2Centities&expansions=attachments.media_keys');
  curl_setopt($ch1, CURLOPT_URL, 'https://api.twitter.com/2/users/44168607/tweets?exclude=replies,retweets&max_results=5&tweet.fields=text,attachments,entities&user.fields=url,entities&media.fields=preview_image_url,url&expansions=attachments.media_keys,referenced_tweets.id'); 
  curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch1, CURLOPT_HTTPHEADER, array(
          'Authorization: Bearer AAAAAAAAAAAAAAAAAAAAAHUqXwEAAAAAtXcrjHJd5MTaFKkd1jx9rDcxfxY%3DWcuplTA3ekhZsN4Mk77ltFTcaGMA5kQlk7aW32ga9DrUsUZulI'
      ));
      curl_setopt($ch1, CURLOPT_CONNECTTIMEOUT, 10);

      //save for instagram when you get new key

      curl_setopt($ch2, CURLOPT_URL, 'https://graph.instagram.com/me/media?fields=id,media_type,media_url,thumbnail_url,timestamp,permalink,caption&access_token=IGQVJYZA3BDbzJQcDUtTGVEVmo3eHFKNU9NN1RHYzU4ZADhWcmpHVHV1eld4MV95YkppY0FpZAzVLNnc4ZATZA5cmUxallFS3gxeGx4RWJjRVROVG9mbVNhVV9PbEhBSkxpS19zSVBEeFhFdllma3B6a0RGRgZDZD&limit=4');
      curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch2, CURLOPT_CONNECTTIMEOUT, 20);


      // curl_setopt($ch2, CURLOPT_URL, 'https://graph.facebook.com/v13.0/me?fields=feed%7Bmessage%2Cfull_picture%2Cstatus_type%2Cattachments%7Burl%7D%7D&access_token=EAAFhGlb02yIBADihqNRLYgSQwGUBI4ubca32rZCbV2xZAPr85L64QV0bDGjGqrYX3BncezcReUBMlTgCopB4J1vKxZCorHeFMkb9BPZCyLd8mb2AZCWnXqWISVjFZCGXzAVhfm5iiB19Js34EndZAiSHnJxmoxWhRZBTeqXy53suQBDVLwt6zQRP');
      // curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($ch2, CURLOPT_CONNECTTIMEOUT, 10);


      $mh = curl_multi_init();
      curl_multi_add_handle($mh,$ch1);
      curl_multi_add_handle($mh,$ch2);
      $error = false;
      do {
          $status = curl_multi_exec($mh, $active);
          if ($active) {
              curl_multi_select($mh);
          }

      } while ($active && $status == CURLM_OK);

      curl_multi_remove_handle($mh, $ch1);
      curl_multi_remove_handle($mh, $ch2);
      curl_multi_close($mh);


      $response_1 = curl_multi_getcontent($ch1);
      $response_2 = curl_multi_getcontent($ch2);

      var_dump($response_2);
      $json1 = json_decode($response_1);
      $json2 = json_decode($response_2);
      
      $content .= '<div class="social-feed row">';
  
      if(!array_key_exists('error',(array)json_decode($response_1)) && !array_key_exists('error',(array)json_decode($response_2)))
      {
      
          /*instagram 1*/

          $content .= '<div class="col-xl-3 col-md-6 col-12 soc-container">';
          $content .= '<a href="'.$json2->data[0]->permalink.'" target="_blank" class="social-item m-insta ';
          if($json2->data[0]->media_type == 'IMAGE'){
              if($json2->data[0]->media_url != ''){
                  $content .= 'social-overlay" style="background-image:url('.$json2->data[0]->media_url.');">';
              } 
          }elseif($json2->data[0]->media_type == 'VIDEO'){
              if($json2->data[0]->thumbnail_url != ''){
                  $content .= 'social-overlay" style="background-image:url('.$json2->data[0]->thumbnail_url.');">';
              } 
          }
          else{
              $content .= '">';
          }
          $content .= '<span class="social-text">'.substr($json2->data[0]->caption, 0, 130);
          if(strlen($json2->data[0]->caption) > 130){
              $content .= '...';
          }
          $content .= '<span class="social-icon"><img src="/wp-content/themes/ufl-theme/assets/img/icon-instagram.png" alt="Instagram Icon" /></span>';
          $content .= '</span>';
          $content .= '</a></div>';

          /*end instagram 1*/

      
          /*twitter 1 & 2*/
          for($i = 0; $i<2; $i++){
              $content .= '<div class="col-xl-3 col-md-6 col-12 tweet-c soc-container">';
              $socialText = substr($json1->data[$i]->text,0,130);
              $socialImg = '';
              $socialLink = $json1->data[$i]->entities->urls[0]->url;

              if(strlen($json1->data[$i]->text) > 130){
                  $socialText .= '...';
              }
              
              $content .= '<a href="'.$socialLink.'" target="_blank" class="social-item ';
              //loop thru the media items
              if($json1->data[$i]->attachments->media_keys[0] != null)
              {
                  foreach($json1->includes->media as $mediaItem){
                      if($mediaItem->media_key == $json1->data[$i]->attachments->media_keys[0])
                      {
                          $socialImg = $mediaItem->preview_image_url;
                      }
                  }

              }

              if($socialImg != ''){
                  $content .= 'social-overlay" style="background-image:url('.$socialImg.');">';
              } 
              else{
                  $content .= 'no-overlay">';
              }

              $content .= '<span class="social-text">'.$socialText;
              $content .= '<span class="social-icon"><img src="/wp-content/themes/ufl-theme/assets/img/icon-twitter.png" alt="Twitter Icon" /> <span class="social-handle">@UF</span></span>';
              $content .= '</span>';
              $content .= '</a></div>';
          }
          
          /* end twitter 1 & 2 */



          /*instagram 2*/

          $content .= '<div class="col-xl-3 col-md-6 col-12 soc-container">';
          $content .= '<a href="'.$json2->data[1]->permalink.'" target="_blank" class="social-item m-insta ';
          if($json2->data[1]->media_type == 'IMAGE'){
              if($json2->data[1]->media_url != ''){
                  $content .= 'social-overlay" style="background-image:url('.$json2->data[1]->media_url.');">';
              } 
          }elseif($json2->data[1]->media_type == 'VIDEO'){
              if($json2->data[1]->thumbnail_url != ''){
                  $content .= 'social-overlay" style="background-image:url('.$json2->data[1]->thumbnail_url.');">';
              } 
          }
          else{
              $content .= '">';
          }
          $content .= '<span class="social-text">'.substr($json2->data[1]->caption,0,130).($json2->data[1]->caption>130?'...':'');
          if(strlen($json2->data[1]->caption) > 130){
              $content .= '...';
          }
          
          $content .= '<span class="social-icon"><img src="/wp-content/themes/ufl-theme/assets/img/icon-instagram.png" alt="Instagram Icon" /></span>';
          $content .= '</span>';
          $content .= '</a></div>';

          /*end instagram 2*/

      }
      $content .= '</div>';

  }
  catch (Exception $e) {
      $content .= '<span style="display:none;">'.strval($e).'</span>';
  }
  return $content;
}

add_shortcode('socialFeed', 'socialFeed');

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

add_filter( 'wp_kses_allowed_html', function( $tags ) {


  $tags['button'] = array(
    'aria-expanded' => array(),
    'aria-controls' => array(),
    'class' => array(),
    'className' => array(),
    'type' => array(),
    'data-bs-toggle' => array(),
    'data-bs-target' => array(),
    'data-name' => array(),
    'id' => array(),
    'tabindex' => array(),
    'tabIndex' => array(),
    'data-bs-dismiss'=> array(),
    'aria-label' => array(),
);

  $tags['svg'] = array(
      'xmlns' => array(),
      'fill' => array(),
      'viewbox' => array(),
      'role' => array(),
      'aria-hidden' => array(),
      'class' => array(),
      'className' => array(),
      'height' => array(),
      'width' => array(),
      'ellipse' => array(),
      'path' => array(),
  );
  $tags['path'] = array(
      'd' => array(),
      'g' => array(),
      'fill' => array(),
      'stroke' => array(),
      'stroke-width' => array(),
      'data-name' => array(),
  );
  $tags['g'] = array(
    'd' => array(),
    'g' => array(),
    'fill' => array(),
    'stroke' => array(),
    'stroke-width' => array(),
    'data-name' => array(),
    'ellipse' => array(),
);
  $tags['ellipse'] = array(
    'cx' => array(),
    'cy' => array(),
    'rx' => array(),
    'stroke' => array(),
    'ry' => array(),
    'fill' => array(),
);
  $tags['source'] = array(
    'src' => array(),
    'type' => array(),
);

  return $tags;

}, 10, 2);

add_theme_support( 'responsive-embeds' );

// Step 1: Create a function to register the theme options page
function theme_options_menu() {
  add_theme_page(
      'Theme Options',
      'Theme Options',
      'manage_options',
      'theme-options',
      'theme_options_page'
  );
}
add_action('admin_menu', 'theme_options_menu');

// Step 2: Create the callback function for the theme options page
function theme_options_page() {
  ?>
  <div class="wrap">
      <h1>Theme Options</h1>
      <form method="post" action="options.php">
          <?php
          settings_fields('theme_options');
          do_settings_sections('theme_options');
          submit_button();
          ?>
      </form>
  </div>
  <?php
}

// Step 3: Register the checkbox and Instagram feed options and settings
function theme_settings_init() {
  register_setting('theme_options', 'enable_feature');
  /* register_setting('theme_options', 'instagram_username');
  register_setting('theme_options', 'instagram_token'); 
*/
  add_settings_section(
      'theme_options_section',
      'General Settings',
      'section_callback',
      'theme_options'
  );

  add_settings_field(
      'enable_feature',
      'Keep Displayed Section Navigation',
      'checkbox_callback',
      'theme_options',
      'theme_options_section'
  );
  
}
add_action('admin_init', 'theme_settings_init');

// Step 4: Define the callback functions for the section, checkbox, and Instagram feed
function section_callback() {
  echo '<p>Configure your theme options below:</p>';
}

function checkbox_callback() {
  $enable_feature = get_option('enable_feature');
  echo '<input type="checkbox" name="enable_feature" value="yes" ' . checked("yes", $enable_feature, false) . '>';
}


// Start session
function start_custom_session() {
  if (!session_id()) {
      session_start();
  }
}
add_action('init', 'start_custom_session');

add_action('wp_ajax_nav_display_action', 'nav_display_action_callback');
add_action('wp_ajax_nopriv_nav_display_action', 'nav_display_action_callback');

function nav_display_action_callback(){
if (isset($_POST['variableValue'])) {
      // Set the session variable
      $_SESSION['nav_display'] = $_POST['variableValue'];
      echo "Session variable set successfully!".$_SESSION['nav_display'];
  } else {
      echo "Invalid request. Missing data.";
  }

wp_die();
} 

function pixelnet_bootstrap_pagination( $wp_query = false, $echo = true, $args = array() ) {
  //Fallback to $wp_query global variable if no query passed
  if ( false === $wp_query ) {
      global $wp_query;
  }
   
  //Set Defaults
  $defaults = array(
      'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
      'format'       => '?paged=%#%',
      'current'      => max( 1, get_query_var( 'paged' ) ),
      'total'        => $wp_query->max_num_pages,
      'type'         => 'array',
      'show_all'     => false,
      'end_size'     => 2,
      'mid_size'     => 1,
      'prev_text'    => __( '« Prev' ),
      'next_text'    => __( 'Next »' ),
      'add_fragment' => '',
  );
   
  //Merge the defaults with passed arguments
  $merged = wp_parse_args( $args, $defaults );
   
  //Get the paginated links
  $lists = paginate_links($merged);

  if ( is_array( $lists ) ) {
       
      $html = '<nav><ul class="pagination justify-content-center">';

      foreach ( $lists as $list ) {
          $html .= '<li class="page-item' . (strpos($list, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link text-dark', $list) . '</li>';
      }

      $html .= '</ul></nav>';

      if ( $echo ) {
          echo $html;
      } else {
          return $html;
      }
  }
   
  return false;
}

// Add Meta Box
function add_featured_post_meta_box() {
  add_meta_box(
      'featured_post_meta_box',  // Unique ID
      'Featured Post',           // Box title
      'featured_post_meta_box_callback',  // Content callback function
      'post',                    // Post type
      'side',                    // Context (normal, advanced, side)
      'default'                  // Priority (high, core, default, low)
  );
}
add_action('add_meta_boxes', 'add_featured_post_meta_box');

// Meta Box Content
function featured_post_meta_box_callback($post) {
  // Add a nonce field so we can check for it later
  wp_nonce_field('featured_post_nonce', 'featured_post_nonce');

  // Retrieve current value of 'featured_post' meta field
  $featured_post = get_post_meta($post->ID, 'featured_post', true);

  // Display checkbox
  ?>
  <label for="featured_post">
      <input type="checkbox" name="featured_post" id="featured_post" <?php echo checked($featured_post, 'on'); ?>>
      Mark this post as Featured
  </label>
  <?php
}

// Save Meta Box Data
function save_featured_post_meta_box_data($post_id) {
  // Check if nonce is set
  if (!isset($_POST['featured_post_nonce'])) {
      return;
  }

  // Verify that the nonce is valid
  if (!wp_verify_nonce($_POST['featured_post_nonce'], 'featured_post_nonce')) {
      return;
  }

  // If autosave, do nothing
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return;
  }

  // Check if the user has the 'edit_post' capability
  if (!current_user_can('edit_post', $post_id)) {
      return;
  }

  // Update the meta field in the database
  $featured_post = isset($_POST['featured_post']) ? 'on' : 'off';
  update_post_meta($post_id, 'featured_post', $featured_post);
}
add_action('save_post', 'save_featured_post_meta_box_data');

// Make the meta box available in the REST API
function enable_featured_post_meta_rest() {
  register_meta('post', 'featured_post', array(
      'show_in_rest' => true,
      'single'       => true,
      'type'         => 'string',
  ));
}
add_action('init', 'enable_featured_post_meta_rest');


function liveWhale($atts){ 
  
$atts = shortcode_atts(
    array(
        'id' => '2', // Default id
    ), 
    $atts, 
    'LiveWhale' 
);

$lwCode = '
<section class="event-shell">
  <div class="event-shell-wrapper">
      <div class="col-12 text-center">
          <h2>College Events</h2> 
      </div>
<div class="lwcw slick event-shell-carousel py-5" data-options="id='.$atts['id'].'&format=html" /> 
<script type="text/javascript" id="lw_lwcw" src="https://ufl.lwcal.com/livewhale/theme/core/scripts/lwcw.js" defer></script>
</div></div>
</section>'; 

return $lwCode; 
} 
add_shortcode('LiveWhale', 'liveWhale');

// Same Site Search Setting

function add_same_site_search_setting() {
  add_settings_section(
      'search_settings',
      __( 'Search Settings' ),
      'search_settings_callback',
      'general'
  );

  add_settings_field(
      'same_site_search',
      __( 'Same Site Search' ),
      'same_site_search_callback',
      'general',
      'search_settings'
  );

  register_setting( 'general', 'same_site_search' );
}

function search_settings_callback() {}

function same_site_search_callback() {
  $options = get_option( 'same_site_search' );
  echo '<input type="checkbox" id="same_site_search" name="same_site_search" value="1" ' . checked( 1, $options, false ) . '/>';
  echo '<label for="same_site_search">' . __( 'Limit search results to the current site' ) . '</label>';
}

add_action( 'admin_init', 'add_same_site_search_setting' );
