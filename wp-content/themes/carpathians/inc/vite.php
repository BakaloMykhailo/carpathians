<?php

function carpathians_enqueue_assets() {
    $is_dev = defined( 'WP_DEBUG' ) && WP_DEBUG;

    if ( $is_dev ) {
        wp_enqueue_script( 'carpathians-vite', 'http://localhost:3000/@vite/client', [], null, true );
        wp_enqueue_script( 'carpathians-main', 'http://localhost:3000/src/main.js', [], null, true );
    } else {
        $manifest_path = get_template_directory() . '/dist/.vite/manifest.json';

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
}
add_action( 'wp_enqueue_scripts', 'carpathians_enqueue_assets' );

add_filter( 'script_loader_tag', function( $tag, $handle ) {
    if ( in_array( $handle, [ 'carpathians-vite', 'carpathians-main' ] ) ) {
        return str_replace( '<script ', '<script type="module" ', $tag );
    }
    return $tag;
}, 10, 2 );
