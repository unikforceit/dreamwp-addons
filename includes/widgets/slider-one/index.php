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

    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'dreamwp'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
            'post_titlea_color',
            [
                'label' => __('Title Color', 'dreamwp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .page__left-sidebar .jump_title' => 'color: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __('Title Typography', 'dreamwp'),
                'selector' => '{{WRAPPER}} .page__left-sidebar .jump_title',
            ]
        );
        $this->add_control(
            'post_titlea_colodfr',
            [
                'label' => __('Item Color', 'dreamwp'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .page__left-sidebar .toc__items .toc__item a' => 'color: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttsdfih',
                'label' => __('Item Typography', 'dreamwp'),
                'selector' => '{{WRAPPER}} .page__left-sidebar .toc__items .toc__item a',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'backgrouncfbxd',
                'label' => esc_html__('Background', 'dreamwp'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .page__left-sidebar',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings();
        ?>
        <div class="projectSlider-area">
                <div class="projectSliider-wrap">
                    <div class="projectSwiper-container">
                        <div class="swiper-wrapper">
                            <?php
                            if ($settings['sliders']){
                            foreach ($settings['sliders'] as $slider){
                                ?>
                            <div class="swiper-slide">
                                <div class="projectSlider-content">
                                    <a <?php echo dreamwp_get_that_link($slider['link']);?>>
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