<?php

/**
 * Created by PhpStorm.
 * User: stephen
 * Date: 2019-02-01
 * Time: 1:47 PM
 */
class ucf_college_huge_title_acf_pro_fields {

    const shortcode = 'ucf_college_huge_title';

    function __construct() {
        add_action( 'acf/init', array( 'ucf_college_huge_title_acf_pro_fields', 'create_fields' ) );
    }

    static function create_fields() {
        if ( function_exists( 'acf_add_local_field_group' ) ) {

            acf_add_local_field_group(
                array(
                    'key'                   => 'group_5c59f7549cc54',
                    'title'                 => 'Huge Title',
                    'fields'                => array(
                        array(
                            'key'               => 'field_5c59f76dd011c',
                            'label'             => 'Title Text',
                            'name'              => 'title_text',
                            'type'              => 'text',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => array(
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ),
                            'default_value'     => '',
                            'placeholder'       => '',
                            'prepend'           => '',
                            'append'            => '',
                            'maxlength'         => '',
                        ),
                        array(
                            'key'               => 'field_5c59f790d011d',
                            'label'             => 'Button Text',
                            'name'              => 'button_text',
                            'type'              => 'text',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => array(
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ),
                            'default_value'     => '',
                            'placeholder'       => '',
                            'prepend'           => '',
                            'append'            => '',
                            'maxlength'         => '',
                        ),
                        array(
                            'key'               => 'field_5c59f796d011e',
                            'label'             => 'Button URL',
                            'name'              => 'button_url',
                            'type'              => 'url',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => array(
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ),
                            'default_value'     => '',
                            'placeholder'       => '',
                        ),
                    ),
                    'location'              => array(
                        array(
                            array(
                                'param'    => 'post_taxonomy',
                                'operator' => '==',
                                'value'    => 'ucf_college_shortcode_category:' . self::shortcode,
                            ),
                        ),
                    ),
                    'menu_order'            => 0,
                    'position'              => 'normal',
                    'style'                 => 'default',
                    'label_placement'       => 'top',
                    'instruction_placement' => 'label',
                    'hide_on_screen'        => '',
                    'active'                => 1,
                    'description'           => '',
                ) );
        }
    }
}

new ucf_college_huge_title_acf_pro_fields();