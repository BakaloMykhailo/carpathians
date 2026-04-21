<?php
    $heading_top = get_field( 'heading_top' );
    $heading_bottom = get_field( 'heading_bottom' );
    $cta = get_field( 'cta' );
    $image = get_field( 'image' );

?>

<section class="relative h-screen overflow-hidden px-4 py-10 md:py-14 lg:p-6 flex items-center justify-center text-white">
    <?php if ( $image ) : ?>
        <img
            src="<?php echo esc_url( $image['url'] ); ?>"
            alt="<?php echo esc_attr( $image['alt'] ); ?>"
            width="<?php echo esc_attr( $image['width'] ); ?>"
            height="<?php echo esc_attr( $image['height'] ); ?>"
            fetchpriority="high"
            decoding="async"
            class="absolute inset-0 w-full h-full object-cover pointer-none"
        />
    <?php endif; ?>

    <div class="mt-auto flex justify-center lg:mt-0 lg:grid lg:grid-cols-2 w-full relative z-10">
        <?php wp_nav_menu( [
            'theme_location' => 'main',
            'container'      => 'nav',
            'container_class' => 'mr-auto lg:flex items-center hidden -ml-2',
            'menu_class'     => 'flex-col text-md text-white font-firs-neue font-bold flex [&_a]:inline-block [&_a]:p-2 [&_a]:hover:bg-red [&_a]:transition-colors uppercase',
        ] ); ?>

        <div class="md:max-w-160 lg:max-w-114 xl:max-w-170 text-left flex flex-col gap-8">
            <?php if ( $heading_top || $heading_bottom ) : ?>
                <h1 class="relative font-firs-neue font-semibold text-6xl md:text-100 lg:text-80 xl:text-8.5xl md:leading-18 lg:leading-14 leading-12 xl:leading-21 uppercase flex flex-col gap-3 -left-1 xl:-left-1.5 tracking-tight">
                    <?php if ( $heading_top ) : ?>
                        <span><?php echo esc_html( $heading_top ); ?></span>
                    <?php endif; ?>
                    <?php if ( $heading_bottom ) : ?>
                        <span><?php echo esc_html( $heading_bottom ); ?></span>
                    <?php endif; ?>
                </h1>
            <?php endif; ?>
    
            <?php if ( $cta ) : ?>
                <div class="pr-0 md:pr-3 xl:pr-4">
                    <a
                        class="font-firs-neue block font-bold text-lg leading-4 uppercase bg-white text-black p-5 text-center w-full hover:bg-red transition-colors"
                        href="<?php echo esc_url( $cta['url'] ); ?>"
                        <?php if ( $cta['target'] ) : ?>
                            target="<?php echo esc_attr( $cta['target'] ); ?>"
                        <?php endif; ?>
                    >
                        <?php echo esc_html( $cta['title'] ); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

</section>
