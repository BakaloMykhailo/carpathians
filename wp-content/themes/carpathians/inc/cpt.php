<?php

add_action( 'init', function() {
    register_post_type( 'service', [
        'labels' => [
            'name'          => 'Services',
            'singular_name' => 'Service',
            'add_new_item'  => 'Add New Service',
            'edit_item'     => 'Edit Service',
        ],
        'public'       => true,
        'show_in_rest' => true,
        'supports'     => [ 'title', 'thumbnail' ],
        'menu_icon'    => 'dashicons-hammer',
        'has_archive'  => false,
        'rewrite'      => [ 'slug' => 'services' ],
    ] );

    register_post_type( 'faq', [
        'labels' => [
            'name'          => 'FAQ',
            'singular_name' => 'FAQ Item',
            'add_new_item'  => 'Add New FAQ Item',
            'edit_item'     => 'Edit FAQ Item',
        ],
        'public'             => true,
        'publicly_queryable' => false,
        'show_in_rest'       => false,
        'supports'           => [ 'title' ],
        'menu_icon'          => 'dashicons-editor-help',
        'has_archive'        => false,
        'rewrite'            => false,
    ] );
} );
