initMap();

async function initMap() {
    console.log('initmap')
    // Промис `ymaps3.ready` будет зарезолвлен, когда загрузятся все компоненты основного модуля API
    await ymaps3.ready;

    // const {YMap, YMapDefaultSchemeLayer} = ymaps3;
    const {YMap, YMapDefaultSchemeLayer, YMapDefaultFeaturesLayer, YMapMarker} = ymaps3;

    // Иницилиазируем карту
    const map = new YMap(

        // Передаём ссылку на HTMLElement контейнера
        document.getElementById('map'),

        // Передаём параметры инициализации карты
        {
            location: {
                // Координаты центра карты
                // center: [49.106414, 55.796127],
                center: [49.145081, 55.806951],
                // center: [49.120607, 55.822028], - четаева 50
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
}