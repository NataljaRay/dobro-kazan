console.log("SLICK-INIT MODULE LOADED");

// import $ from "jquery";
// import "slick-carousel";

/**
 * Универсальная безопасная инициализация Slick
 * Работает в Telegram WebView, iOS WebView и Android WebView
 */
function initSlickSafe(selector, settings) {
    const $slider = $(selector);

    if (!$slider.length) return;

    // если уже инициализирован — выходим
    if ($slider.hasClass("slick-initialized")) return;

    function safeInit() {
        try {
            console.log("SLICK INIT ->", selector);

            // Удаление текстовых нод (Telegram WebView fix)
            $slider.contents().filter(function() {
                return this.nodeType === 3;
            }).remove();

            $slider.slick(settings);

            console.log("SLICK OK ->", selector);
        } catch (e) {
            console.error("SLICK ERROR ->", selector, e);
            console.log("Ошибка slick в " + selector + ":\n" + e.message);
        }
    }

    function tryInit() {
        if ($slider.hasClass("slick-initialized")) return;

        const width = $slider.width();

        // Telegram WebView часто даёт width = 0 в первые 200–500 мс
        if (!width || width < 50) {
            setTimeout(tryInit, 150);
            return;
        }

        // ждём загрузки картинок
        const $imgs = $slider.find("img");
        let loaded = 0;

        if ($imgs.length === 0) {
            safeInit(); // <<< ИНИЦИАЛИЗАЦИЯ ЗДЕСЬ
            return;
        }

        $imgs.each(function () {
            if (this.complete) {
                loaded++;
                if (loaded === $imgs.length) {
                    safeInit(); // <<< ИНИЦИАЛИЗАЦИЯ ЗДЕСЬ
                }
            } else {
                $(this).one("load", function () {
                    loaded++;
                    if (loaded === $imgs.length) {
                        safeInit(); // <<< ИНИЦИАЛИЗАЦИЯ ЗДЕСЬ
                    }
                });
            }
        });
    }

    // Первичная попытка инициализации
    tryInit();

    // Дополнительный setPosition (Telegram WebView slow render fix)
    setTimeout(() => {
        if ($slider.hasClass("slick-initialized")) {
            $slider.slick("setPosition");
        } else {
            // tryInit();
        }
    }, 700);
}

export { initSlickSafe };
