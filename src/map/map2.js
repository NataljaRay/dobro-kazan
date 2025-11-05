initMap();

async function initMap() {
    console.log('initmap')


    // Промис `ymaps3.ready` будет зарезолвлен, когда загрузятся все компоненты основного модуля API
    await ymaps3.ready;
    // console.log('ymaps3 version:', ymaps3.VERSION);
    console.log('ymaps3:', ymaps3);
    // console.log('ymaps3:', ymaps3.import);
    // добавляем loader для пакета, где указываем из какого CDN загружать
    // ymaps3.import.registerCdn('https://cdn.jsdelivr.net/npm/{package}', [
    //     '@yandex/ymaps3-default-ui-theme@0.0.19'
    // ]);
    // ymaps3.import.registerCdn('https://cdn.jsdelivr.net/npm/{@yandex/ymaps3-default-ui-theme}', [
    //     '@yandex/ymaps3-default-ui-theme'
    // ]);

    // const {YMapClusterer, clusterByGrid} = await ymaps3.import('@yandex/ymaps3-clusterer');
    // const {YMapPopupMarker} = await ymaps3.import('@yandex/ymaps3-default-ui-theme');

    const {YMap, YMapDefaultSchemeLayer, YMapDefaultFeaturesLayer, YMapMarker, YMapLayer, YMapFeatureDataSource} = ymaps3;
    // const {YMap, YMapDefaultSchemeLayer, YMapMarker, YMapLayer, YMapFeatureDataSource} = ymaps3;
    // const pkg = await ymaps3.import('@yandex/ymaps3-default-ui-theme');
    // const {YMapPopupMarker} = (await ymaps3.import('@yandex/ymaps3-default-ui-theme'));

    // const {YMapClusterer, clusterByGrid} = await ymaps3.import('@yandex/ymaps3-clusterer');

    // Иницилиазируем карту
    const map = new YMap(

        // Передаём ссылку на HTMLElement контейнера
        document.getElementById('map'),

        // Передаём параметры инициализации карты
        {
            location: {
                // Координаты центра карты
                center: [49.145081, 55.806951],
                // Уровень масштабирования
                zoom: 14
            }
        }
    );

    //  слой для отображения схематической карты - слой с дорогами и зданиями
    map.addChild(new YMapDefaultSchemeLayer());

    /** маркеры **/
    //  слой для маркеров
    map.addChild(new YMapDefaultFeaturesLayer());

    //  DOM-элемент для содержимого маркера.
// Важно это сделать до инициализации маркера!
// Элемент можно создавать пустым. Добавить HTML-разметку внутрь можно после инициализации маркера.
    const content = document.createElement('div');
    // content.classList.add('.marker')

// Инициализируйте маркер
    const marker = new YMapMarker(
        {
            coordinates: [49.120607, 55.822028],
            // draggable: true
        },
        content
    );

// Добавьте маркер на карту
    map.addChild(marker);

// Добавьте произвольную HTML-разметку внутрь содержимого маркера
    content.innerHTML = '<div class="point"></div>';

    //
    // /** попап **/
    // const markerElement = document.createElement('div');
    // markerElement.className = 'marker-class';
    // markerElement.innerText = "I'm marker!";
    //
    // const marker = new YMapPopupMarker(
    //     {
    //         source: 'markerSource',
    //         coordinates: [49.120607, 55.822028],
    //         draggable: true,
    //         mapFollowsOnDrag: true
    //     },
    //     markerElement
    // );
    //
    // map.addChild(marker);

}