<?php
require_once get_template_directory() . '/inc/acf-fields.php';

function carpathians_enqueue_assets() {
    $dist = get_template_directory() . '/dist';
    $manifest_path = $dist . '/.vite/manifest.json';

    if ( is_file( $manifest_path ) ) {
        $manifest = json_decode( file_get_contents( $manifest_path ), true );
        $entry = $manifest['src/main.js'] ?? null;

        if ( $entry ) {
            $base = get_template_directory_uri() . '/dist/';
            wp_enqueue_style( 'carpathians-style', $base . $entry['css'][0], [], null );
            wp_enqueue_script( 'carpathians-main', $base . $entry['file'], [], null, true );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'carpathians_enqueue_assets' );

add_theme_support( 'custom-logo' );

if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page( [
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug'  => 'theme-options',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ] );
}
