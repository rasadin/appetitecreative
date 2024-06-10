<?php 
/**
 * @link            https://www.webalive.com.au/
 * @since           1.0.0
 * @package         Webalive23 Core
 * 
 * Plugin Name:     Webalive23 Core
 * Plugin URI:      https://www.webalive.com.au/
 * Description:     Core plguin for the WebAlive2023
 * Version:         1.0.0 
 * Author:          WebAlive
 * Author URI:      https://www.webalive.com.au/webalive
 * License:         Webalive 
 * License URI:     https://www.webalive.com.au/product-license
 * Text Domain:     webalive-core
 */

if( !defined( 'ABSPATH' ) ) exit();

define( 'WAE_PLUGIN_URL', plugins_url( '/', __FILE__ ) );
define( 'WAE_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

require_once WAE_PLUGIN_PATH .'/inc/elementor-helpers/helper.php';
require_once WAE_PLUGIN_PATH .'/inc/elementor-helpers/activator.php';

/**
 * Init Styles and Scripts
 */
add_action( 'wp_enqueue_scripts', 'batside_elementor_core_scripts_styles' );
function batside_elementor_core_scripts_styles() {
    wp_enqueue_style('webalive23-owl-carousel', plugins_url('/assets/css/owl.carousel.min.css', __FILE__), '', rand());
    wp_enqueue_script('webalive23-owl-carousel', plugins_url('/assets/js/owl.carousel.min.js', __FILE__), array('jquery'), rand(), true);

    // Enqueue GSAP and ScrollMagic scripts from CDN
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/gsap.min.js', array(), null, true);
    wp_enqueue_script('scrollmagic', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js', array(), null, true);
    wp_enqueue_script('scrollmagic-gsap', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js', array('gsap', 'scrollmagic'), null, true);


    wp_enqueue_style('webalive23-public', plugins_url('/assets/css/public.css', __FILE__), '', rand());
    wp_enqueue_script('webalive23-public', plugins_url('/assets/js/public.js', __FILE__), array('jquery'), rand(), true);


    $options = array(
        'admin_url'         => admin_url(''),
        'ajax_url'          => admin_url('admin-ajax.php'),
        'ajax_nonce'        => wp_create_nonce('ah3jhlk(765%^&ksk!@45'),
    );
    wp_localize_script('webalive23-public', 'public_localizer', $options);
}
