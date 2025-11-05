async function initMap() {
    // Дожидаемся загрузки API
    await ymaps3.ready;

    // Импортируем модули
    const { YMap, YMapDefaultSchemeLayer, YMapDefaultFeaturesLayer } = ymaps3;
    const { YMapPopupMarker } = await ymaps3.import('@yandex/ymaps3-default-ui-theme');

    // Создаём карту
    const map = new YMap(document.getElementById('map'), {
        location: {
            center: [37.618423, 55.751244], // Москва
            zoom: 10,
        },
    });

    // Добавляем слои
    map.addChild(new YMapDefaultSchemeLayer());
    map.addChild(new YMapDefaultFeaturesLayer());

    // Пример: добавим popup marker
    const popup = new YMapPopupMarker(
        {
            coordinates: [37.618423, 55.751244],
        },
        {
            content: 'Привет, мир!',
        }
    );

    map.addChild(popup);
}

initMap();



// initMap();
//
// async function initMap() {
//     await ymaps3.ready;
//
//     // ✅ Правильная регистрация CDN для Yandex Maps 3
//     // ymaps3.import.registerCdn(
//     //     'https://cdn.jsdelivr.net/npm/{package}@latest',
//     //     ['@yandex/ymaps3-default-ui-theme']
//     // );
//     // ymaps3.import.registerCdn(
//     //     'https://cdn.jsdelivr.net/npm/{package}',
//     //     '@yandex/ymaps3-default-ui-theme@latest'
//     // );
//
//     // // ✅ Правильная регистрация CDN — убираем "@yandex/"
//     // ymaps3.import.registerCdn(
//     //     'https://cdn.jsdelivr.net/npm/{package}@{version}/dist/esm',
//     //     {
//     //         packages: {
//     //             'ymaps3-default-ui-theme': '0.0.19'
//     //         }
//     //     }
//     // );
//
//     // // ✅ Правильная регистрация CDN по документации 2025
//     // ymaps3.import.registerCdn(
//     //     // Шаблон должен содержать {package}, {version} и {path}
//     //     'https://cdn.jsdelivr.net/npm/{package}@{version}/{path}',
//     //     {
//     //         packages: {
//     //             '@yandex/ymaps3-default-ui-theme': '0.0.19'
//     //         }
//     //     }
//     // );
//     // ✅ Правильная регистрация CDN по документации 2025
//     // ymaps3.import.registerCdn(
//     //     // Шаблон должен содержать {package}, {version} и {path}
//     //     'https://cdn.jsdelivr.net/npm/{package}@{version}/{path}',
//     //     {
//     //         package: {
//     //             '@yandex/ymaps3-default-ui-theme': '0.0.19'
//     //         }
//     //     }
//     // );
//     // ymaps3.import.registerCdn(
//     //     'https://cdn.jsdelivr.net/npm/{package}@{version}/{path}',
//     //     {
//     //         packages: {
//     //             // ⛔ нельзя просто строкой
//     //             // ✅ нужно объектом с ключом version
//     //             '@yandex/ymaps3-default-ui-theme': {
//     //                 version: '0.0.19'
//     //             }
//     //         }
//     //     }
//     // );
//     // ymaps3.import.registerCdn(
//     //     // Шаблон, поддерживающий {package}, {version}, {path}
//     //     'https://cdn.jsdelivr.net/npm/{package}@{version}/{path}',
//     //     {
//     //         packages: {
//     //             '@yandex/ymaps3-default-ui-theme': {
//     //                 version: '0.0.19',         // ✅ обязательно
//     //                 path: 'dist/esm'           // ✅ теперь нужно указывать явно
//     //             }
//     //         }
//     //     }
//     // );
//
//     // ymaps3.import.registerCdn('https://cdn.jsdelivr.net/npm/{package}', '@yandex/ymaps3-default-ui-theme@latest');
//     // ymaps3.import.registerCdn('https://cdn.jsdelivr.net/npm/{package}', [
//     //     '@yandex/ymaps3-default-ui-theme@latest'
//     // ]);
//     // // ✅ Импорт пакета по новому названию
//     // const { YMapPopupMarker } = await ymaps3.import('ymaps3-default-ui-theme');
//     // Подключаем компоненты
//     const {
//         YMap,
//         YMapDefaultSchemeLayer,
//         YMapDefaultFeaturesLayer
//     } = ymaps3;
//
//     // // Загружаем тему
//     // const {
//     //     YMapPopupMarker
//     // } = await ymaps3.import('@yandex/ymaps3-default-ui-theme');
//
//
//     // Импортируем пакет темы
//     const { YMapPopupMarker } = await ymaps3.import('@yandex/ymaps3-default-ui-theme');
//
//     // Создаем карту
//     const map = new YMap(document.getElementById('map'), {
//         location: { center: [49.145081, 55.806951], zoom: 14 }
//     });
//
//     map.addChild(new YMapDefaultSchemeLayer());
//     map.addChild(new YMapDefaultFeaturesLayer());
//
//     // Создаем элемент маркера
//     const markerElement = document.createElement('div');
//     markerElement.className = 'marker-class';
//     markerElement.innerText = "I'm marker!";
//
//     // ✅ Создаем PopupMarker
//     const popupMarker = new YMapPopupMarker(
//         {
//             coordinates: [49.120607, 55.822028],
//             draggable: true,
//             mapFollowsOnDrag: true
//         },
//         markerElement
//     );
//
//     map.addChild(popupMarker);
// }
