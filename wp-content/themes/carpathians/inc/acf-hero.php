<?php

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
    return;
}

acf_add_local_field_group( [
    'key'    => 'group_hero',
    'title'  => 'Hero',
    'fields' => [
        [
            'key'      => 'field_hero_heading',
            'label'    => 'Heading',
            'name'     => 'heading',
            'type'     => 'text',
            'required' => 1,
        ],
        [
            'key'      => 'field_hero_text',
            'label'    => 'Text',
            'name'     => 'text',
            'type'     => 'textarea',
            'required' => 0,
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
