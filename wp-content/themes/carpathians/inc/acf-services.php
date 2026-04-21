<?php

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
    return;
}

acf_add_local_field_group( [
    'key'    => 'group_service',
    'title'  => 'Service Fields',
    'fields' => [
        [
            'key'      => 'field_service_description',
            'label'    => 'Description',
            'name'     => 'description',
            'type'     => 'textarea',
            'required' => 0,
        ],
        [
            'key'           => 'field_service_color',
            'label'         => 'Color',
            'name'          => 'color',
            'type'          => 'color_picker',
            'required'      => 0,
            'return_format' => 'string',
        ],
        [
            'key'           => 'field_service_hover_image',
            'label'         => 'Hover Image',
            'name'          => 'hover_image',
            'type'          => 'image',
            'required'      => 0,
            'return_format' => 'array',
            'preview_size'  => 'medium',
        ],
    ],
    'location' => [
        [
            [
                'param'    => 'post_type',
                'operator' => '==',
                'value'    => 'service',
            ],
        ],
    ],
] );

acf_add_local_field_group( [
    'key'    => 'group_block_services',
    'title'  => 'Services Block',
    'fields' => [
        [
            'key'      => 'field_services_heading',
            'label'    => 'Heading',
            'name'     => 'heading',
            'type'     => 'text',
            'required' => 0,
        ],
        [
            'key'           => 'field_services_items',
            'label'         => 'Services',
            'name'          => 'services',
            'type'          => 'post_object',
            'post_type'     => [ 'service' ],
            'multiple'      => 1,
            'return_format' => 'object',
            'ui'            => 1,
            'required'      => 0,
        ],
    ],
    'location' => [
        [
            [
                'param'    => 'block',
                'operator' => '==',
                'value'    => 'acf/carpathians-services',
            ],
        ],
    ],
] );
