<?php

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
    return;
}

acf_add_local_field_group( [
    'key'    => 'group_hero',
    'title'  => 'Hero',
    'fields' => [
        [
            'key'      => 'field_hero_heading_top',
            'label'    => 'Heading Top',
            'name'     => 'heading_top',
            'type'     => 'text',
            'required' => 1,
        ],
        [
            'key'      => 'field_hero_heading_bottom',
            'label'    => 'Heading Bottom',
            'name'     => 'heading_bottom',
            'type'     => 'text',
            'required' => 1,
        ],
        [
            'key'           => 'field_hero_cta',
            'label'         => 'CTA',
            'name'          => 'cta',
            'type'          => 'link',
            'return_format' => 'array',
            'required'      => 0,
        ],
        [
            'key'           => 'field_hero_image',
            'label'         => 'Image',
            'name'          => 'image',
            'type'          => 'image',
            'required'      => 0,
            'return_format' => 'array',
            'preview_size'  => 'medium',
        ],
    ],
    'location' => [
        [
            [
                'param'    => 'block',
                'operator' => '==',
                'value'    => 'acf/carpathians-hero',
            ],
        ],
    ],
] );
