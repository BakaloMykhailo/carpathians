<?php

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
    return;
}

acf_add_local_field_group( [
    'key'      => 'group_theme_options_socials',
    'title'    => 'Socials',
    'fields'   => [
        [
            'key'          => 'field_socials_repeater',
            'label'        => 'Social Links',
            'name'         => 'socials',
            'type'         => 'repeater',
            'required'     => 0,
            'min'          => 0,
            'max'          => 0,
            'layout'       => 'table',
            'button_label' => 'Add Social',
            'sub_fields'   => [
                [
                    'key'      => 'field_socials_link',
                    'label'    => 'Link',
                    'name'     => 'link',
                    'type'     => 'url',
                    'required' => 1,
                ],
                [
                    'key'           => 'field_socials_icon',
                    'label'         => 'Icon',
                    'name'          => 'icon',
                    'type'          => 'image',
                    'required'      => 1,
                    'return_format' => 'array',
                    'preview_size'  => 'thumbnail',
                    'library'       => 'all',
                    'mime_types'    => 'svg',
                ],
            ],
        ],
    ],
    'location' => [
        [
            [
                'param'    => 'options_page',
                'operator' => '==',
                'value'    => 'theme-options',
            ],
        ],
    ],
] );
