// src/map/map3.js
export async function yandexMap() {
    // Ждём загрузки ядра API
    await ymaps3.ready;

    // ✅ 1. Сначала регистрируем CDN — обязательно до любых импортов
    ymaps3.import.registerCdn(
        'https://cdn.jsdelivr.net/npm/{package}@{version}/{path}',
        {
            packages: {
                '@yandex/ymaps3-default-ui-theme': {
                    version: '0.0.19',
                    path: 'dist/esm/',
                },
            },
        },
    );

    // ✅ 2. Теперь можно использовать ymaps3.import
    const { YMap, YMapDefaultSchemeLayer, YMapDefaultFeaturesLayer } = ymaps3;
    const { YMapPopupMarker } = await ymaps3.import('@yandex/ymaps3-default-ui-theme');

    // ✅ 3. Создаём карту
    const map = new YMap(document.getElementById('map'), {
        location: {
            center: [37.618423, 55.751244],
            zoom: 10,
        },
    });

    map.addChild(new YMapDefaultSchemeLayer());
    map.addChild(new YMapDefaultFeaturesLayer());

    // ✅ 4. Добавляем popup marker
    const popup = new YMapPopupMarker(
        { coordinates: [37.618423, 55.751244] },
        { content: '<b>Привет, Москва!</b><br>Popup работает 🚀' },
    );

    map.addChild(popup);
}

// Для автоинициализации, если на странице есть карта
if (document.getElementById('map')) {
    yandexMap();
}
console.log('ymaps3 version:', ymaps3);
