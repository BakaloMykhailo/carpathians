import './style.css'

function initTabs() {
    document.querySelectorAll( '[data-tabs]' ).forEach( tabs => {
        const panels = tabs.closest( 'section' ).querySelector( '[data-tab-panels]' );

        tabs.querySelectorAll( '[data-tab]' ).forEach( tab => {
            tab.addEventListener( 'click', () => {
                const index = tab.dataset.tab;

                tabs.querySelectorAll( '[data-tab]' ).forEach( t => {
                    t.style.backgroundColor = '';
                    t.classList.remove( 'is-active' );
                } );
                tab.style.backgroundColor = tab.style.getPropertyValue( '--hover-color' );
                tab.classList.add( 'is-active' );

                panels.querySelectorAll( '[data-tab-panel]' ).forEach( panel => {
                    const isActive = panel.dataset.tabPanel === index;
                    panel.classList.toggle( 'hidden', !isActive );
                    panel.classList.toggle( 'mobile-active', isActive );
                    panel.classList.toggle( 'is-active', isActive );
                    if ( isActive ) {
                        panel.style.backgroundColor = panel.style.getPropertyValue( '--hover-color' );
                    }
                } );
            } );
        } );

        const firstTab = tabs.querySelector( '[data-tab]' );
        if ( firstTab ) firstTab.click();
    } );
}

function resetTabs() {
    document.querySelectorAll( '[data-tab-panel]' ).forEach( panel => {
        panel.classList.remove( 'hidden', 'mobile-active', 'is-active' );
        panel.style.backgroundColor = '';
    } );
    document.querySelectorAll( '[data-tab]' ).forEach( t => {
        t.style.backgroundColor = '';
        t.classList.remove( 'is-active' );
    } );
}

document.addEventListener( 'DOMContentLoaded', () => {
    const mq = window.matchMedia( '(min-width: 680px)' );

    if ( !mq.matches ) initTabs();

    mq.addEventListener( 'change', e => {
        if ( e.matches ) {
            resetTabs();
        } else {
            initTabs();
        }
    } );
} );
