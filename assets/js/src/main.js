import Basic from './core/basic';

(() => {
    "use strict";

    $(document).ready(() => {
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
        }
    })

})();