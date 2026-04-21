import './style.css'

document.addEventListener( 'DOMContentLoaded', () => {
    const mq = window.matchMedia( '(min-width: 680px)' );

    function setTabImages( el, active ) {
        el.querySelector( '[data-default-img]' )?.classList.toggle( 'opacity-0', active );
        el.querySelector( '[data-hover-img]' )?.classList.toggle( 'opacity-0', !active );
    }

    function initTabs() {
        document.querySelectorAll( '[data-tabs]' ).forEach( tabs => {
            const panels = tabs.parentElement.querySelector( '[data-tab-panels]' )?.querySelectorAll( '[data-tab-panel]' );

            tabs.querySelectorAll( '[data-tab]' ).forEach( tab => {
                tab.addEventListener( 'click', () => {
                    const index = tab.dataset.tab;

                    tabs.querySelectorAll( '[data-tab]' ).forEach( t => {
                        t.style.backgroundColor = '';
                        setTabImages( t, false );
                    } );
                    tab.style.backgroundColor = tab.style.getPropertyValue( '--hover-color' );
                    setTabImages( tab, true );

                    panels?.forEach( panel => {
                        const isActive = panel.dataset.tabPanel === index;
                        panel.classList.toggle( 'hidden', !isActive );
                        panel.classList.toggle( 'flex', isActive );
                        if ( isActive ) {
                            panel.style.backgroundColor = panel.style.getPropertyValue( '--hover-color' );
                        }
                        setTabImages( panel, isActive );
                    } );
                } );
            } );

        } );
    }

    if ( !mq.matches ) initTabs();

    mq.addEventListener( 'change', e => {
        if ( !e.matches ) initTabs();
    } );
} );
