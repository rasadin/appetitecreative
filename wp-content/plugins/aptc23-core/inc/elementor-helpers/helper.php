<?php 
namespace Elementor;

function aptc23_elementor_init(){
    Plugin::instance()->elements_manager->add_category(
        'aptc23-for-elementor',
        [
            'title'     => 'aptc Custom Elements',
            'icon'      => 'font'
        ],
        1
    );
}
add_action('elementor/init', 'Elementor\aptc23_elementor_init');