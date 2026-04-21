<?php
    $heading  = get_field( 'heading' );
    $faq_items = get_field( 'faq_items' );
?>

<section class="bg-black text-white">
    <?php if ( $heading ) : ?>
        <h2 class="text-2.5xl font-tactic-sans font-bold uppercase px-6 lg:px-10 py-6 lg:py-7.5 leading-5 tracking-tight"><?php echo esc_html( $heading ); ?></h2>
    <?php endif; ?>

    <?php if ( $faq_items ) : ?>
        <div class="grid lg:grid-cols-3 border-gray border-t border-b">
            <?php foreach ( $faq_items as $faq_item ) :
                    $faq_question = get_the_title( $faq_item );
                    $faq_answer   = get_field( 'answer', $faq_item->ID );
                ?>
                <div class="faq-item flex flex-col gap-6 p-6 lg:p-10 lg:border-r border-gray border-b -mb-px">
                    <?php if( $faq_question ) : ?>
                        <h4 class="faq-toggle flex justify-between gap-6 lg:block font-tactic-sans font-regular tracking-tight text-xl lg:text-2xl uppercase cursor-pointer lg:cursor-default">
                            <?php echo esc_html( $faq_question ); ?>

                            <div class="w-6 h-6 relative shrink-0 block lg:hidden">
                                <svg class="plus-icon absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.75 9.375C18.75 9.67337 18.6315 9.95952 18.4205 10.1705C18.2095 10.3815 17.9234 10.5 17.625 10.5H10.5V17.625C10.5 17.9234 10.3815 18.2095 10.1705 18.4205C9.95952 18.6315 9.67337 18.75 9.375 18.75C9.07663 18.75 8.79048 18.6315 8.5795 18.4205C8.36853 18.2095 8.25 17.9234 8.25 17.625V10.5H1.125C0.826631 10.5 0.540483 10.3815 0.329505 10.1705C0.118526 9.95952 0 9.67337 0 9.375C0 9.07663 0.118526 8.79048 0.329505 8.5795C0.540483 8.36853 0.826631 8.25 1.125 8.25H8.25V1.125C8.25 0.826631 8.36853 0.540483 8.5795 0.329505C8.79048 0.118526 9.07663 0 9.375 0C9.67337 0 9.95952 0.118526 10.1705 0.329505C10.3815 0.540483 10.5 0.826631 10.5 1.125V8.25H17.625C17.9234 8.25 18.2095 8.36853 18.4205 8.5795C18.6315 8.79048 18.75 9.07663 18.75 9.375Z" fill="white"/>
                                </svg>
                                <svg class="minus-icon hidden absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2" width="19" height="3" viewBox="0 0 19 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.75 1.125C18.75 1.42337 18.6315 1.70952 18.4205 1.92049C18.2095 2.13147 17.9234 2.25 17.625 2.25H1.125C0.826631 2.25 0.540483 2.13147 0.329505 1.92049C0.118526 1.70952 0 1.42337 0 1.125C0 0.826631 0.118526 0.540483 0.329505 0.329505C0.540483 0.118526 0.826631 0 1.125 0H17.625C17.9234 0 18.2095 0.118526 18.4205 0.329505C18.6315 0.540483 18.75 0.826631 18.75 1.125Z" fill="white"/>
                                </svg>

                            </div>
                        </h4>
                    <?php endif; ?>
                    <?php if( $faq_answer ) : ?>
                        <div class="faq-answer font-tektur text-md tracking-tight overflow-hidden max-h-0 lg:max-h-none transition-[max-height] duration-300 ease-in-out"><?php echo $faq_answer; ?></div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</section>
