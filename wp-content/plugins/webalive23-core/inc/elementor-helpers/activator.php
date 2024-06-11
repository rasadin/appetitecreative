<?php

function webalive23_elements_activator() {
	require_once WAE_PLUGIN_PATH . '/elements/hero-carousel.php';
	require_once WAE_PLUGIN_PATH . '/elements/box-animation.php';
	require_once WAE_PLUGIN_PATH . '/elements/text-loop.php';
	require_once WAE_PLUGIN_PATH . '/elements/grid-animation.php';
	require_once WAE_PLUGIN_PATH . '/elements/logo-loop.php';
}
add_action('elementor/widgets/widgets_registered','webalive23_elements_activator');

