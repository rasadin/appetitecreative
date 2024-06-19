<?php
/**
 * aptc functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aptc
 */

if ( ! function_exists( 'aptc_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function aptc_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on aptc, use a find and replace
		 * to change 'aptc' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'aptc', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'aptc' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'aptc_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Add Post Format Support
		 */
		add_theme_support( 'post-formats', array( 
			'audio',
			'aside', 
			'gallery', 
			'image',
			'link',
			'video',
		) );

		/**
		 * WooCommerce Support
		 */
		add_theme_support( 'woocommerce' );
	}
endif;
add_action( 'after_setup_theme', 'aptc_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aptc_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'aptc_content_width', 640 );
}
add_action( 'after_setup_theme', 'aptc_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aptc_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'aptc' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'aptc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	// Footer Widget 1
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 1', 'aptc' ),
		'id'            => 'footer-widget-1',
		'description'   => esc_html__( 'Add widgets here.', 'aptc' ),
		'before_widget' => '<div id="%1$s" class="widget aptc-footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	// Footer Widget 2
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 2', 'aptc' ),
		'id'            => 'footer-widget-2',
		'description'   => esc_html__( 'Add widgets here.', 'aptc' ),
		'before_widget' => '<div id="%1$s" class="widget aptc-footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	// Footer Widget 3
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 3', 'aptc' ),
		'id'            => 'footer-widget-3',
		'description'   => esc_html__( 'Add widgets here.', 'aptc' ),
		'before_widget' => '<div id="%1$s" class="widget aptc-footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	// Footer Widget 4
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 4', 'aptc' ),
		'id'            => 'footer-widget-4',
		'description'   => esc_html__( 'Add widgets here.', 'aptc' ),
		'before_widget' => '<div id="%1$s" class="widget aptc-footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	// Copyright Widget 1
	register_sidebar( array(
		'name'          => esc_html__( 'Copyright Widget 1', 'aptc' ),
		'id'            => 'copyright-widget-1',
		'description'   => esc_html__( 'Add widgets here.', 'aptc' ),
		'before_widget' => '<div id="%1$s" class="widget aptc-copyright-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	// Copyright Widget 2
	register_sidebar( array(
		'name'          => esc_html__( 'Copyright Widget 2', 'aptc' ),
		'id'            => 'copyright-widget-2',
		'description'   => esc_html__( 'Add widgets here.', 'aptc' ),
		'before_widget' => '<div id="%1$s" class="widget aptc-copyright-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'aptc_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function aptc_public_scripts() {
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
    wp_enqueue_style( 'aptc', get_template_directory_uri() . '/assets/css/theme.css' );
    wp_enqueue_style( 'aptc-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
    wp_enqueue_style( 'aptc-style', get_stylesheet_uri() );

    wp_enqueue_script( 'aptc-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'aptc-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '20180708', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('popper'), '20180708', true );
	wp_enqueue_script( 'aptc', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), '20180708', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aptc_public_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Bootstrap 4 Navwalkers
 */
require get_template_directory() . '/navwalkers.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce/aptc-woocommerce.php';
	require get_template_directory() . '/inc/woocommerce/aptc-woocommerce-template-hooks.php';
	require get_template_directory() . '/inc/woocommerce/aptc-woocommerce-functions.php';
}

/**
 * TGM Plugin Activation
 */
require get_template_directory() . '/inc/plugins/tgm-plugin-activation.php';


/**
 * Change the defualt WP login logo
 */
function aptc_login_screen_logo() {
	echo '<style type="text/css">
	.login h1 a {background-image: url('.get_bloginfo( 'template_directory' ).'/assets/img/login-screen.png) !important; height: auto !important; }
	</style>';
}
add_action( 'login_head', 'aptc_login_screen_logo' );

function aptc_login_head_url( $url ) {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'aptc_login_head_url' );

/**
 * A function that contains all options value
 */
function aptc_theme_options() {
	return $aptc_options = array(
		'aptc_header_type' => 'default', // Options: default, large, minimal, none
	);
}