<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // If this file is called directly, abort.

class Widget_Grid_Animation extends Widget_Base
{

    public function get_name()
    {
        return 'grid-animation';
    }

    public function get_title()
    {
        return esc_html__('grid Animation', 'aptc23-core');
    }

    public function get_script_depends()
    {
        return [
            'aptc23-public'
        ];
    }

    public function get_icon()
    {
        return 'fa fa-slideshare';
    }

    public function get_categories()
    {
        return ['aptc23-for-elementor'];
    }

    protected function register_controls()
    {
        /**
         * Content Settings
         */
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content Settings', 'aptc23-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'title', [
                'label' => __('Title', 'aptc23-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Enter Text Here', 'aptc23-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'description', [
                'label' => __('Description', 'aptc23-core'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('Enter Text Here', 'aptc23-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'hero_slides',
            [
                'label' => __('Testimonial Slides', 'aptc23-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),

            ]
        );

        $this->end_controls_section();


        /**
         * Style Tab
         */
        $this->style_tab();

    }

    private function style_tab()
    {
    }

    protected function render()
    {
        $marco = $this->get_settings_for_display();

        ?>
        <!-- Add Markup Starts -->

        <div class="row row-cols-2 mb-4 par-sec">
            <?php $counter = 1;
            foreach ($marco['hero_slides'] as $slide) { ?>
                <div class="col-md-6 box<?=$counter?>">
                    <h2 class="title"><?php echo $slide['title']; ?></h2>
                    <div class="dis"><?php echo $slide['description']; ?></div>
                </div>
                <?php
                $counter = $counter + 1;
            } ?>
        </div>
        <!-- Add Markup Ends -->
        <?php
    }

    protected function content_template()
    {
    }
}


Plugin::instance()->widgets_manager->register_widget_type(new Widget_Grid_Animation());