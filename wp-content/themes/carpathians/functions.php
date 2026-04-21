<?php
require_once get_template_directory() . '/inc/vite.php';
require_once get_template_directory() . '/inc/acf-fields.php';
require_once get_template_directory() . '/inc/cpt.php';

add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );

register_nav_menus( [
    'main' => __( 'Main Navigation', 'carpathians' ),
] );

add_filter( 'block_categories_all', function( $categories ) {
    return array_merge( [
        [
            'slug'  => 'carpathians',
            'title' => 'Carpathians',
        ],
    ], $categories );
} );

add_action( 'acf/init', function() {
    if ( function_exists( 'acf_register_block_type' ) ) {
        $blocks = glob( get_template_directory() . '/blocks/*/block.json' );
        foreach ( $blocks as $block_json ) {
            $config = json_decode( file_get_contents( $block_json ), true );
            $dir    = dirname( $block_json );

            if ( ! empty( $config['acf']['renderTemplate'] ) ) {
                $config['render_template'] = $dir . '/' . basename( $config['acf']['renderTemplate'] );
            }

            if ( ! empty( $config['acf']['mode'] ) ) {
                $config['mode'] = $config['acf']['mode'];
            }

            acf_register_block_type( $config );
        }
    }
}, 5 );

add_action( 'wp_head', function() {
    $logo_id = get_theme_mod( 'custom_logo' );
    if ( $logo_id ) {
        $logo_url = wp_get_attachment_image_url( $logo_id, 'full' );
        if ( $logo_url ) {
            echo '<link rel="preload" as="image" href="' . esc_url( $logo_url ) . '" fetchpriority="high">' . "\n";
        }
    }

    $post = get_post();
    if ( ! $post ) return;

    $blocks = parse_blocks( $post->post_content );
    foreach ( $blocks as $block ) {
        if ( $block['blockName'] === 'acf/carpathians-hero' ) {
            $image_id = $block['attrs']['data']['image'] ?? null;
            if ( $image_id ) {
                $url = wp_get_attachment_image_url( $image_id, 'full' );
                if ( $url ) {
                    echo '<link rel="preload" as="image" href="' . esc_url( $url ) . '" fetchpriority="high">' . "\n";
                }
            }
            break;
        }
    }
}, 1 );

add_filter( 'upload_mimes', function( $mimes ) {
    $mimes['svg']  = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
} );


if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page( [
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug'  => 'theme-options',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ] );
}
