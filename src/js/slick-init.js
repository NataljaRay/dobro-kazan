// console.log("SLICK-INIT MODULE LOADED");

/**
 * Безопасная инициализация Slick
 * Работает в Telegram WebView, iOS WebView и Android WebView
 */
function initSlickSafe(selector, settings) {
    const $slider = $(selector);

    if (!$slider.length) return;

    // если уже инициализирован — выходим
    if ($slider.hasClass("slick-initialized")) return;

    function safeInit() {
        try {
            // console.log("SLICK INIT ->", selector);

            // Telegram WebView fix — удаление текстовых нод
            $slider.contents().filter(function() {
                return this.nodeType === 3;
            }).remove();

            $slider.slick(settings);

            // console.log("SLICK OK ->", selector);
        } catch (e) {
            // console.error("SLICK ERROR ->", selector, e);
            // console.log("Ошибка slick в " + selector + ":\n" + e.message);
        }
    }

    function tryInit() {
        if ($slider.hasClass("slick-initialized")) return;

        const width = $slider.width();

        // Telegram часто выдаёт width = 0 некоторое время
        if (!width || width < 50) {
            setTimeout(tryInit, 150);
            return;
        }

        // ждём загрузки всех картинок
        const $imgs = $slider.find("img");
        let loaded = 0;

        if ($imgs.length === 0) {
            safeInit();
            return;
        }

        $imgs.each(function () {
            if (this.complete) {
                loaded++;
                if (loaded === $imgs.length) safeInit();
            } else {
                $(this).one("load", function () {
                    loaded++;
                    if (loaded === $imgs.length) safeInit();
                });
            }
        });
    }

    tryInit();

    // дополнительная попытка
    setTimeout(() => {
        if ($slider.hasClass("slick-initialized")) {
            $slider.slick("setPosition");
        }
    }, 700);
}

export { initSlickSafe };
