<?php 
namespace Elementor;

function webalive23_elementor_init(){
    Plugin::instance()->elements_manager->add_category(
        'webalive23-for-elementor',
        [
            'title'     => 'Webalive Custom Elements',
            'icon'      => 'font'
        ],
        1
    );
}
add_action('elementor/init', 'Elementor\webalive23_elementor_init');