<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // If this file is called directly, abort.

class Widget_Logo_Loop extends Widget_Base
{

    public function get_name()
    {
        return 'logo-loop';
    }

    public function get_title()
    {
        return esc_html__('Logo loop', 'webalive23-core');
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
            'logo', [
                'label' => __('LOGO', 'webalive23-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
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
        <!-- Add Markup Starts -->
        <section class="brands-section">
            <div class="text">BRANDS WE WORK WITH</div>
            <div class="logos">

                <?php $counter = 1;
                foreach ($marco['hero_slides'] as $slide) { ?>
                    <div class="logo">
                        <img src="<?php echo $slide['logo']['url']; ?>" alt="Amazon Logo">
                    </div>
                    <?php
                    $counter = $counter + 1;
                } ?>
            </div>
        </section>
        <!-- Add Markup Ends -->

        <style>
            .brands-section {
                display: flex;
                align-items: center;
                overflow: hidden;
                background-color: black;
                padding: 20px;
                position: relative;
            }

            .text {
                color: white;
                font-size: 36px;
                font-weight: bold;
                flex-shrink: 0;
                transition: opacity 0.5s ease;
                z-index: 1; /* Ensure text is on top */
            }

            .logos {
                display: flex;
                position: absolute;
                left: 100%;
                white-space: nowrap;
            }

            .logo {
                display: inline-block;
                min-width: 100px; /* Adjust this value as needed */
                padding: 0 10px;
            }

            .logo img {
                width: 100%;
            }

        </style>


        <?php
    }

    protected function content_template()
    {
    }
}


Plugin::instance()->widgets_manager->register_widget_type(new Widget_Logo_Loop());