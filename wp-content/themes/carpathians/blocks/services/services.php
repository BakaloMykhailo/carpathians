<?php
    $heading  = get_field( 'heading' );
    $services = (array) get_field( 'services' );
?>

<section class="bg-black text-white tracking-tight">
    <?php if ( $heading ) : ?>
        <h2 class="text-2.5xl font-tactic-sans font-bold uppercase px-10 py-7.5 leading-5"><?php echo esc_html( $heading ); ?></h2>
    <?php endif; ?>

    <?php if ( $services ) : ?>

        <?php /* Mobile */ ?>
        <div class="md:hidden">
            <div class="flex flex-nowrap" data-tabs>
                <?php foreach ( $services as $index => $service ) : ?>
                    <?php
                        $title       = get_the_title( $service );
                        $color       = get_field( 'color', $service->ID );
                        $thumbnail   = get_the_post_thumbnail_url( $service->ID, 'full' );
                        $hover_image = get_field( 'hover_image', $service->ID );
                    ?>
                    <div
                        class="p-3.5 basis-0 grow flex items-center justify-center cursor-pointer transition-colors duration-300"
                        style="--hover-color: <?php echo esc_attr( $color ?: '#000' ); ?>; <?php echo $index === 0 ? 'background-color: ' . esc_attr( $color ?: '#000' ) . ';' : ''; ?>"
                        role="tab"
                        data-tab="<?php echo $index; ?>"
                    >
                        <div class="max-h-12 max-w-12 relative">
                            <?php if ( $thumbnail ) : ?>
                                <img src="<?php echo esc_url( $thumbnail ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="object-cover w-full h-full transition-opacity duration-300<?php echo $index === 0 ? ' opacity-0' : ''; ?>" data-default-img>
                            <?php endif; ?>
                            <?php if ( $hover_image ) : ?>
                                <img src="<?php echo esc_url( $hover_image['url'] ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="object-cover w-full h-full absolute inset-0 transition-opacity duration-300<?php echo $index === 0 ? '' : ' opacity-0'; ?>" data-hover-img>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div data-tab-panels>
                <?php foreach ( $services as $index => $service ) : ?>
                    <?php
                        $title       = get_the_title( $service );
                        $description = get_field( 'description', $service->ID );
                        $color       = get_field( 'color', $service->ID );
                        $thumbnail   = get_the_post_thumbnail_url( $service->ID, 'full' );
                        $hover_image = get_field( 'hover_image', $service->ID );
                    ?>
                    <div
                        class="p-10 min-h-97.5 <?php echo $index === 0 ? 'flex' : 'hidden'; ?> items-center justify-center"
                        style="--hover-color: <?php echo esc_attr( $color ?: '#000' ); ?>; <?php echo $index === 0 ? 'background-color: ' . esc_attr( $color ?: '#000' ) . ';' : ''; ?>"
                        data-tab-panel="<?php echo $index; ?>"
                    >
                        <div class="relative max-h-40 max-w-40">
                            <?php if ( $thumbnail ) : ?>
                                <img src="<?php echo esc_url( $thumbnail ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="object-cover w-full h-full transition-opacity duration-300<?php echo $index === 0 ? ' opacity-0' : ''; ?>" data-default-img>
                            <?php endif; ?>
                            <?php if ( $hover_image ) : ?>
                                <img src="<?php echo esc_url( $hover_image['url'] ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="object-cover w-full h-full absolute inset-0 transition-opacity duration-300<?php echo $index === 0 ? '' : ' opacity-0'; ?>" data-hover-img>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <?php /* Desktop */ ?>
        <div class="hidden md:flex flex-nowrap border-gray border-t border-b">
            <?php foreach ( $services as $service ) : ?>
                <?php
                    $title       = get_the_title( $service );
                    $description = get_field( 'description', $service->ID );
                    $color       = get_field( 'color', $service->ID );
                    $thumbnail   = get_the_post_thumbnail_url( $service->ID, 'full' );
                    $hover_image = get_field( 'hover_image', $service->ID );
                ?>
                <div
                    class="group border-r border-r-gray last:border-r-0 p-10 basis-0 grow min-h-151 lg:min-h-188.5 flex items-center justify-center transition-all duration-300 hover:hover-color hover:basis-1/5 cursor-pointer"
                    style="--hover-color: <?php echo esc_attr( $color ?: '#000' ); ?>;"
                >
                    <div class="relative max-h-40 max-w-40 aspect-square">
                        <?php if ( $thumbnail ) : ?>
                            <img src="<?php echo esc_url( $thumbnail ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="object-cover w-full h-full transition-opacity duration-300 group-hover:opacity-0">
                        <?php endif; ?>
                        <?php if ( $hover_image ) : ?>
                            <img src="<?php echo esc_url( $hover_image['url'] ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="object-cover w-full h-full absolute inset-0 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                        <?php endif; ?>
                    </div>
                    <div class="opacity-0 absolute text-center">
                        <p class="text-sm"><?php echo esc_html( $description ); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>
</section>
