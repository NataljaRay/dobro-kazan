import { initSlickSafe } from "./slick-init";

// /* ============================
//    🔍 DETECT TELEGRAM WEBVIEW
// ============================ */
// function isTelegramWebview() {
//     return /Telegram/i.test(navigator.userAgent);
// }
//
// /* ============================
//    🟢 TELEGRAM DEBUG PANEL
//    (видна только в Telegram)
// ============================ */
// function logTG(msg, data = "") {
//     // if (!isTelegramWebview()) return; // скрываем для всех, кроме Telegram
//
//     let box = document.getElementById('debug-log');
//     if (!box) {
//         box = document.createElement('div');
//         box.id = 'debug-log';
//         box.style = `
//             position: fixed;
//             bottom: 0; left: 0; right: 0;
//             max-height: 160px;
//             overflow-y: auto;
//             background: rgba(0,0,0,0.75);
//             color: #0f0;
//             font-size: 12px;
//             z-index: 999999;
//             padding: 6px;
//             font-family: monospace;
//             white-space: pre-wrap;
//         `;
//         document.body.appendChild(box);
//     }
//
//     const line = document.createElement('div');
//     line.textContent = msg + (data !== "" ? (" " + JSON.stringify(data)) : "");
//     box.appendChild(line);
// }

/* ============================
   🟡 Ожидание реального DOM
============================ */
function waitForRealDOM(selector, callback) {
    const immediate = document.querySelector(selector);

    // console.log("CHECK DOM:", selector, immediate);
    // logTG("CHECK DOM " + selector, immediate ? "FOUND" : "undefined");

    if (immediate) {
        // console.log("FOUND instantly:", selector);
        // logTG("FOUND instantly " + selector);
        callback();
        return;
    }

    // console.log("WAITING for element:", selector);
    // logTG("WAITING for element " + selector);

    const observer = new MutationObserver(() => {
        const el = document.querySelector(selector);
        if (el) {
            // console.log("FOUND via MutationObserver:", selector);
            // logTG("FOUND via MutationObserver " + selector);
            observer.disconnect();
            callback();
        }
    });

    observer.observe(document.body, {
        childList: true,
        subtree: true,
    });
}

/* ============================
   🚀 ОСНОВНОЙ КОД
============================ */

window.addEventListener("DOMContentLoaded", () => {

    // console.log("DOM loaded");
    // logTG("DOM loaded (Telegram)");

    /* === Попап участия === */
    const html = document.querySelector('html');
    const participationPopupWrapper = document.querySelector('#participation-popup');
    const participationPopup = participationPopupWrapper.querySelector('.participation-popup');
    const participationPopupContent = participationPopupWrapper.querySelector('.map-popup__content');
    const participationPopupClose = participationPopupWrapper.querySelector('.map-popup__close');
    const participationBtn = document.querySelector('#participation-btn');

    participationBtn.addEventListener('click', function() {
        setTimeout(() => {
            html.classList.add('is-lock');
            participationPopupWrapper.classList.remove('participation-popup-wrapper--hidden');
        }, 200);
        setTimeout(() => {
            participationPopup.classList.remove('participation-popup--hidden');
        }, 300);
        participationPopupContent.scrollTop = 0;
    });

    function closeParticipationPopup() {
        participationPopupWrapper.classList.add('participation-popup-wrapper--hidden');
        participationPopup.classList.add('participation-popup--hidden');
        html.classList.remove('is-lock');
    }

    participationPopupClose.addEventListener('click', () => closeParticipationPopup());
    participationPopup.addEventListener('click', e => e.stopPropagation());
    document.body.addEventListener('click', () => closeParticipationPopup());

    /* === Настройки слайдеров === */

    const nkoSettings = {
        dots: false,
        arrows: true,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            { breakpoint: 1386, settings: { slidesToShow: 3 }},
            { breakpoint: 1060, settings: { slidesToShow: 2 }},
            { breakpoint: 767,  settings: { slidesToShow: 1 }},
        ]
    };

    const bookSettings = {
        dots: false,
        arrows: true,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500,
    };

    const artSettings = {
        dots: false,
        arrows: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            { breakpoint: 1024, settings: { slidesToShow: 2 }},
            { breakpoint: 768, settings: { slidesToShow: 1 }},
        ]
    };

    const guidesSettings = {
        dots: false,
        arrows: true,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            { breakpoint: 1386, settings: { slidesToShow: 3 }},
            { breakpoint: 1060, settings: { slidesToShow: 2 }},
            { breakpoint: 767,  settings: { slidesToShow: 1 }},
        ]
    };

    const volunteersSettings = {
        dots: false,
        arrows: true,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            { breakpoint: 1386, settings: { slidesToShow: 3 }},
            { breakpoint: 1060, settings: { slidesToShow: 2 }},
            { breakpoint: 767, settings: { slidesToShow: 1 }},
        ]
    };

    /* === Ининциализация слайдеров с ТГ-логом === */

    waitForRealDOM('#nko-carousel', () => {
        // logTG("INIT nko-carousel");
        initSlickSafe('#nko-carousel', nkoSettings);
    });

    waitForRealDOM('#book-carousel', () => {
        // logTG("INIT book-carousel");
        initSlickSafe('#book-carousel', bookSettings);
    });

    waitForRealDOM('#art-carousel', () => {
        // logTG("INIT art-carousel");
        initSlickSafe('#art-carousel', artSettings);
    });

    waitForRealDOM('#guides-carousel', () => {
        // logTG("INIT guides-carousel");
        initSlickSafe('#guides-carousel', guidesSettings);
    });

    waitForRealDOM('#volunteers-carousel', () => {
        // logTG("INIT volunteers-carousel");
        initSlickSafe('#volunteers-carousel', volunteersSettings);
    });

});
