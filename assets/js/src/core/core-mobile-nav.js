import $ from 'jquery'; // eslint-disable-line no-unused-vars

export default class MobileNav {
    
    constructor() {
        this.trigger = null;
        this.nav = null;
        this.close = null;

        this.init();
    }

    init() {
        const self = this;
        const trigger = $('[data-mobile-nav-trigger]');
        const nav     = $('[data-mobile-nav-panel]');
        const close   = $('[data-mobile-nav-close]');

        if(trigger.length){
            this.trigger = trigger;
        }

        if(nav.length){
            this.nav = nav;
        }

        if(close.length){
            this.close = close;
        }

        if(trigger && nav && close){
            self.setObservers();
        }
    }

    setObservers() {
        const self = this;

        self.trigger.on('click', (e) => {
            e.preventDefault();

            self.openNav();
        });

        self.close.on('click', (e) => {
            e.preventDefault();

            self.closeNav();
        });
    }

    openNav() {
        const self = this;

        $('body').addClass('locked');
        self.nav.addClass('active');
    }

    closeNav() {
        const self = this;

        $('body').removeClass('locked');
        self.nav.removeClass('active');
    }
}
