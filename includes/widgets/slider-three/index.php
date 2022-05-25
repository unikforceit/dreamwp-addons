<?php

namespace Elementor;
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class  dreamwp_slider3 extends Widget_Base
{

    public function get_name()
    {
        return 'dreamwp_slider3';
    }

    public function get_title()
    {
        return __('Slider Three', 'dreamwp');
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
                'default' => 5,
            ]
        );
        $this->add_control(
            'item2',
            [
                'label' => __('Item Per Slide 2', 'dreamwp'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 5,
            ]
        );
        $repeater = new \Elementor\Repeater();
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
        $this->add_control(
            'sliders',
            [
                'label' => __('Sliders', 'dreamwp'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],


                ],
            ]
        );

        $repeater2 = new \Elementor\Repeater();
        $repeater2->add_control(
            'image2',
            [
                'label' => __( 'Image', 'moda' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'sliders2',
            [
                'label' => __('Sliders 2', 'dreamwp'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'image2' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image2' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image2' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image2' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
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
        $options1 = [
                'item' => $settings['item'],
        ];
        $options2 = [
                'item2' => $settings['item2'],
        ];
        ?>
        <div class="brandSlider-area">
                <div class="brandSlider-rotate">
                    <div class="brandSlider-wrap" data-dreamwp='<?php echo wp_json_encode($options1);?>'>
                        <div class="swiper-wrapper">
                            <?php
                            if ($settings['sliders']){
                                foreach ($settings['sliders'] as $slider){
                                    ?>
                                        <div class="swiper-slide">
                                                    <div class="brand-item"><?php echo dreamwp_get_that_image($slider['image']);?></div>
                                                </div>
                                <?php }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="brandSlider-wrap2" data-dreamwp2='<?php echo wp_json_encode($options2);?>'>
                        <div class="swiper-wrapper">

                            <?php
                            if ($settings['sliders2']){
                                foreach ($settings['sliders2'] as $slider2){
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="brand-item"><?php echo dreamwp_get_that_image($slider2['image2']);?></div>
                                    </div>
                                <?php }
                            }
                            ?>

                        </div>
                    </div>
                </div>
        </div>

        <?php

    }
}

Plugin::instance()->widgets_manager->register(new dreamwp_slider3());