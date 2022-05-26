<?php

namespace Elementor;
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class  dreamwp_slider1 extends Widget_Base
{

    public function get_name()
    {
        return 'dreamwp_slider1';
    }

    public function get_title()
    {
        return __('Slider One', 'dreamwp');
    }

    public function get_icon()
    {
        return 'eicon-form-horizontal';
    }

    public function get_categories()
    {
        return ['dreamwp-addons'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'dreamwp'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'item',
            [
                'label' => __('Item Per Slide', 'dreamwp'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 2,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'btn',
            [
                'label' => __('Button Text', 'dreamwp'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Get your free email marketing plan', 'dreamwp'),
            ]
        );
        $repeater->add_control(
            'image',
            [
                'label' => __( 'Image', 'moda' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'link', [
                'label' => __('Link', 'dreamwp'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'sliders',
            [
                'label' => __('Sliders', 'dreamwp'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'btn' => __('Get your free email marketing plan', 'dreamwp'),
                    ],
                    [
                        'btn' => __('Get your free email marketing plan', 'dreamwp'),
                    ],
                    [
                        'btn' => __('Get your free email marketing plan', 'dreamwp'),
                    ],
                    [
                        'btn' => __('Get your free email marketing plan', 'dreamwp'),
                    ],

                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_settings',
            [
                'label' => __('General', 'dreamwp'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'brand_bg_color_1',
            [
                'label' => __('Button Background Color', 'dreamwp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .get-btn' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __('Button Typography', 'dreamwp'),
                'selector' => '{{WRAPPER}} .get-btn',
            ]
        );
        $this->add_control(
            'post_titlea_colodfr',
            [
                'label' => __('Button Text Color', 'dreamwp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .get-btn' => 'color: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_radius',
            [
                'label' => esc_html__('Button Radius', 'softim-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .get-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings();
        $options = [
            'item' => $settings['item'],
        ];
        ?>
        <div class="projectSlider-area" data-dreamwp='<?php echo wp_json_encode($options);?>'>
                <div class="projectSliider-wrap">
                    <div class="projectSwiper-container projectSlider_One">
                        <div class="swiper-wrapper">
                            <?php
                            if ($settings['sliders']){
                            foreach ($settings['sliders'] as $slider){
                                ?>
                            <div class="swiper-slide">
                                <div class="projectSlider-content">
                                    <a <?php echo dreamwp_get_that_link($slider['link']);?> >
                                        <?php echo dreamwp_get_that_image($slider['image']);?>
                                    </a>
                                    <a <?php echo dreamwp_get_that_link($slider['link']);?> class="get-btn"><?php echo esc_html($slider['btn'])?></a>
                                </div>
                            </div>
                          <?php }
                            }
                            ?>
                        </div>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev swiper-button-white"></div>
                    <div class="swiper-button-next swiper-button-white"></div>
            </div>
        </div>
        <?php

    }
}

Plugin::instance()->widgets_manager->register(new dreamwp_slider1());