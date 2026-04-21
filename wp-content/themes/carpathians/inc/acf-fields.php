<?php

add_action( 'acf/init', function() {
    require_once __DIR__ . '/acf-theme-options.php';
    require_once __DIR__ . '/acf-hero.php';
    require_once __DIR__ . '/acf-services.php';
    require_once __DIR__ . '/acf-faq.php';
} );
