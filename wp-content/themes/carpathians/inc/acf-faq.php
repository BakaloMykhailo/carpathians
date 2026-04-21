<?php

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
    return;
}

acf_add_local_field_group( [
    'key'    => 'group_faq',
    'title'  => 'FAQ Fields',
    'fields' => [
        [
            'key'      => 'field_faq_answer',
            'label'    => 'Answer',
            'name'     => 'answer',
            'type'     => 'wysiwyg',
            'required' => 1,
        ],
    ],
    'location' => [
        [
            [
                'param'    => 'post_type',
                'operator' => '==',
                'value'    => 'faq',
            ],
        ],
    ],
] );

acf_add_local_field_group( [
    'key'    => 'group_block_faq',
    'title'  => 'FAQ Block',
    'fields' => [
        [
            'key'      => 'field_faq_heading',
            'label'    => 'Heading',
            'name'     => 'heading',
            'type'     => 'text',
            'required' => 0,
        ],
        [
            'key'          => 'field_faq_items',
            'label'        => 'FAQ Items',
            'name'         => 'faq_items',
            'type'         => 'post_object',
            'post_type'    => ['faq'],
            'multiple'     => 1,
            'return_format' => 'object',
            'required'     => 0,
        ],
    ],
    'location' => [
        [
            [
                'param'    => 'block',
                'operator' => '==',
                'value'    => 'acf/carpathians-faq',
            ],
        ],
    ],
] );
