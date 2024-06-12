<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // If this file is called directly, abort.

class Widget_Text_Roll extends Widget_Base
{

    public function get_name()
    {
        return 'text-roll';
    }

    public function get_title()
    {
        return esc_html__('Text loop slider', 'webalive23-core');
    }

    public function get_script_depends()
    {
        return [
            'webalive23-public'
        ];
    }

    public function get_icon()
    {
        return 'fa fa-slideshare';
    }

    public function get_categories()
    {
        return ['webalive23-for-elementor'];
    }

    protected function register_controls()
    {
        /**
         * Content Settings
         */
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content Settings', 'webalive23-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'title', [
                'label' => __('text', 'webalive23-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Enter Text Here', 'webalive23-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'hero_slides',
            [
                'label' => __('Testimonial Slides', 'webalive23-core'),
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
        <style>
            .loop-container {
                overflow: hidden;
                white-space: nowrap;
                width: 100%; /* Adjust the width as needed */
                position: relative;
            }

            .loop-content {
                display: inline-block;
                white-space: nowrap;
            }

            .loop-item {
                display: inline-block;
                padding: 0 10px; /* Adjust padding as needed */
                min-width: 200px; /* Adjust to your needs */
                box-sizing: border-box;
                background-color: #f1f1f1; /* Add a background color for visibility */
                margin: 5px;
            }


        </style>
        <!-- Add Markup Starts -->
        <div class="loop-container ">
            <div class="loop-content">

                <?php $counter = 1;
                foreach ($marco['hero_slides'] as $slide) { ?>
                    <div class="loop-item"><?php echo $slide['title']; ?></div>

                    <?php
                    $counter = $counter + 1;
                } ?>

            </div>
        </div>
        <!-- Add Markup Ends -->
        <?php
    }

    protected function content_template()
    {
    }
}


Plugin::instance()->widgets_manager->register_widget_type(new Widget_Text_Roll());