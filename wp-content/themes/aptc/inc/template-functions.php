<?php
/**
 * Options value
 */
$aptc_options = aptc_theme_options();

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package aptc
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function aptc_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'aptc_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function aptc_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'aptc_pingback_header' );

/**
 * aptc Main Menu
 */
function aptc_menu() {
	$menu_type = 'inline'; // Fetch the Menu Type Value Here Form Customizer / Theme Option

	if( 'inline' == $menu_type ) {
		echo get_template_part( 'template-parts/menu/content', 'inline-menu' );
	}else if( 'inline-stretch' == $menu_type ) {
		echo get_template_part( 'template-parts/menu', 'inline-stretch' );
	}else if( 'stack' == $menu_type ) {
		echo get_template_part( 'template-parts/menu', 'stack-menu' );
	}else if( 'classic' == $menu_type ) {
		echo get_template_part( 'template-parts/menu', 'classic-menu' );
	}else if( 'off-canvas' == $menu_type ) {
		echo get_template_part( 'template-parts/menu', 'off-canvas-menu' );
	}else {
		return;
	}
}

/**
 * aptc Custom Logo
 */
function aptc_custom_logo() {
	$aptc_custom_logo_id = get_theme_mod('custom_logo');
	$logo = wp_get_attachment_image_src( $aptc_custom_logo_id, 'full' );

	if( has_custom_logo() ) {
		echo '<img src="'.esc_url($logo[0]).'">';
	}else {
		echo bloginfo( 'name' ); 
	}
}

/**
 * aptc Page Header
 */
if( ! function_exists( 'aptc_page_header' ) ) :
	function aptc_page_header() {
		global $post;
		?>
		<div class="aptc-page-header">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php  
						/**
						 * aptc_before_page_header_title hook
						 */
						do_action( 'aptc_before_page_header_title' );
						?>
						<h1 class="page-title"><?php echo get_the_title( $post->ID ); ?></h1>
						<?php  
						/**
						 * aptc_after_page_header_title hook
						 * 
						 * aptc_entry_meta - 10
						 */
						do_action( 'aptc_after_page_header_title' );
						?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
	if( 'large' == $aptc_options['aptc_header_type'] ) {
		add_action( 'aptc_after_header_menu', 'aptc_page_header', 10 );
	}
endif;