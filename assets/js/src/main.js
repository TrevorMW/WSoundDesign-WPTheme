import Basic from './core/basic';
import MobileNav from './core/core-mobile-nav';

(() => {
    "use strict";

    $(document).ready(() => {
        new MobileNav();

        const topThreshold = 10;
        const nav = document.getElementById('header');

        if (nav) {
            window.addEventListener("scroll", () => {
                if (window.scrollY > topThreshold) {
                    nav.classList.add("active");
                } else {
                    nav.classList.remove("active");
                }
            })

            window.addEventListener("load", () => {
                if (window.scrollY > topThreshold) {
                    nav.classList.add("active");
                } else {
                    nav.classList.remove("active");
                }
            })
        }
    })

})();