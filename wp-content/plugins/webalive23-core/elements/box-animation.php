<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // If this file is called directly, abort.

class Widget_Box_animation_2 extends Widget_Base
{

    public function get_name()
    {
        return 'box-animation-2';
    }

    public function get_title()
    {
        return esc_html__('2 Card Slider', 'webalive23-core');
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
                'label' => __('Title', 'webalive23-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Enter Text Here', 'webalive23-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'description', [
                'label' => __('Description', 'webalive23-core'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('Enter Text Here', 'webalive23-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'image', [
                'label' => __('Image', 'webalive23-core'),
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
        <div class="scroll-container ">
            <div class="scroll-content row">

                <?php $counter = 1;
                foreach ($marco['hero_slides'] as $slide) { ?>
                    <div class="scroll-box box<?= $counter ?>  col">
                        <div class="card" style="width: 18rem;">
                            <img src="<?php echo $slide['image']['url']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $slide['title']; ?> </h5>
                                <p class="card-text"><?php echo $slide['description']; ?></p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                <?php
                    $counter = $counter+1;
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


Plugin::instance()->widgets_manager->register_widget_type(new Widget_Box_animation_2());