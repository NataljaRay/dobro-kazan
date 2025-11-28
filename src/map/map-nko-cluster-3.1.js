// map-nko-cluster.js
// Упрощённая кластеризация + автоцентрирование для Yandex Maps v3 + онлайн маркеры

import { InfoMessage } from 'map/common';

window.map = null;

main();

async function main() {
    await ymaps3.ready;

    const {
        YMap,
        YMapDefaultSchemeLayer,
        YMapDefaultFeaturesLayer,
        YMapControls,
        YMapMarker,
        YMapListener,
    } = ymaps3;

    // ------------------------
    // 1. Загружаем данные
    // ------------------------

    // Для локального теста — из JSON
    const MARKERS = await fetch('map/events-nko-test.json').then(r => r.json());

    // Массив текущих маркеров на карте (кластеров)
    const renderedMarkers = [];
    // для вычисления кол-ва маркеров
    let lastClusterCount = null;

    // ------------------------
    // 2. Создаём карту
    // ------------------------

    const map = new YMap(
        document.getElementById('map'),
        {
            location: {
                center: [49.1, 55.8],
                zoom: 8,
            },
        },
        [
            new YMapDefaultSchemeLayer(),
            new YMapDefaultFeaturesLayer(),
        ]
    );

    window.map = map;

    // ------------------------
    // 3. Попап — InfoMessage
    // ------------------------
    const infoMessage = new InfoMessage({ text: '' });

    map.addChild(
        new YMapControls({ position: 'top right' }).addChild(infoMessage)
    );

    const popupElement = document.createElement('div');
    popupElement.classList.add('map-popup', 'map-popup--hidden');

    popupElement.innerHTML = `
        <div class="map-popup__content">
            <div class="map-popup__list"></div>
            <button class="map-popup__close">Закрыть</button>
        </div>
    `;

    infoMessage.updateContent(popupElement);

    const popupContent = popupElement.querySelector('.map-popup__content');
    const popupList = popupElement.querySelector('.map-popup__list');
    const closeButton = popupElement.querySelector('.map-popup__close');
    const mapContainer = document.getElementById('map');

    // ------------------------
    // 4. Рендер мероприятий в попап
    // ------------------------

    function updatePopup(eventsArray) {
        const popupHtmlBase = eventsArray.map(event => `
            <div class="map-popup__event" id="event-${event.eventId}">
                <div class="map-popup__title">${event.title}</div>

                <div class="map-popup__info">
                    <div class="map-popup__info-img-wrap">
                        <img class="map-popup__info-img"
                             src="${event.image}"
                             alt="${event.imageAlt}">
                    </div>
                    <div class="map-popup__info-text">
                      <div class="map-popup__info-row info"></div>
                      <div class="map-popup__info-row when"></div>
                      <div class="map-popup__info-row time"></div>
                      <div class="map-popup__info-row address"></div>
                    </div>
                </div>

                <div class="map-popup__text">
                    <div class="map-popup__text-content">${event.text}</div>
                </div>
            </div>
        `).join("");

        popupList.innerHTML = popupHtmlBase;

        // заполняем каждое событие отдельно
        const eventBlocks = popupList.querySelectorAll('.map-popup__event');

        eventBlocks.forEach((evBlock, index) => {
            const event = eventsArray[index];

            const whenEl = evBlock.querySelector('.when');
            const timeEl = evBlock.querySelector('.time');
            const addressEl = evBlock.querySelector('.address');
            const infoEl = evBlock.querySelector('.info');

            if (event.when) {
                whenEl.innerHTML = 'Когда: <span>' + event.when + '</span>';
            }

            if (event.time) {
                timeEl.innerHTML = 'Во сколько: <span>' + event.time + '</span>';
            }

            if (event.address) {
                addressEl.innerHTML = 'Где: <span>' + event.address + '</span>';
            }

            if (!event.when && !event.time && !event.address && event.info) {
                infoEl.innerHTML = event.info;
            }
        });


        popupElement.classList.remove('map-popup--hidden');
        popupContent.scrollTop = 0;
    }

    function closeInfo() {
        popupElement.classList.add('map-popup--hidden');
        changePointColor();
    }

    closeButton.addEventListener('click', (e) => {
        e.stopPropagation();
        closeInfo();
    });

    popupElement.addEventListener('click', e => e.stopPropagation());
    mapContainer.addEventListener('click', closeInfo);

    // ------------------------
    // 5. Создание маркера
    // ------------------------

    function createCustomMarker(markerData) {
        const markerEl = document.createElement('div');
        markerEl.className = 'map-point';
        markerEl.dataset.markerId = markerData.id;

        // если в кластере есть события без координат — отдельный класс
        if (markerData.hasNoCoords) {
            markerEl.classList.add('map-point--no-coords');
        }

        markerEl.innerHTML = `
            <div class="map-point__inner">
                <span class="map-point__counter">${markerData.events.length}</span>
            </div>
        `;

        const marker = new YMapMarker(
            { coordinates: markerData.coords || [] },
            markerEl
        );

        markerEl.addEventListener('click', (e) => {
            e.stopPropagation();

            changePointColor();
            markerEl.classList.add('map-point--current');

            updatePopup(markerData.events);
        });

        return marker;
    }

    function changePointColor() {
        document
            .querySelectorAll('.map-point')
            .forEach(p => p.classList.remove('map-point--current'));
    }

    // ------------------------
    // 6. Кластеризация
    // ------------------------

    function getClusterRadius(zoom) {
        // Чем меньше зум, тем больше радиус — тем сильнее "схлопываем".
        if (zoom <= 5)  return 2.0;   // очень далеко
        if (zoom <= 6)  return 1.0;
        if (zoom <= 7)  return 0.5;
        if (zoom <= 8)  return 0.25;
        if (zoom <= 9)  return 0.12;
        if (zoom <= 10) return 0.06;
        if (zoom <= 11) return 0.03;
        if (zoom <= 12) return 0.01;
        return 0;                     // не группируем
    }

    function buildClusters(markers, zoom) {
        const radius = getClusterRadius(zoom);
        const clusters = [];

        // отдельный кластер для всех маркеров без координат
        let noCoordsCluster = null;

        markers.forEach(src => {
            const hasCoords =
                Array.isArray(src.coords) &&
                src.coords.length === 2 &&
                Number.isFinite(src.coords[0]) &&
                Number.isFinite(src.coords[1]);

            // ---- 1) Маркеры БЕЗ координат → один общий кластер ----
            if (!hasCoords) {
                if (!noCoordsCluster) {
                    noCoordsCluster = {
                        id: 'no-coords',
                        coords: [],        // оставляем [], чтобы они вели себя как overlay
                        events: [],
                        hasNoCoords: true, // флаг для класса / стилизации
                    };
                    clusters.push(noCoordsCluster);
                }

                noCoordsCluster.events = noCoordsCluster.events.concat(src.events);
                return;
            }

            // ---- 2) Обычная логика кластеризации для нормальных координат ----
            const [lon, lat] = src.coords;
            let targetCluster = null;

            for (const cluster of clusters) {
                // пропускаем "no-coords" кластер в расчётах расстояний
                if (!Array.isArray(cluster.coords) || cluster.coords.length !== 2) {
                    continue;
                }

                const [clon, clat] = cluster.coords;
                if (Math.abs(lon - clon) <= radius && Math.abs(lat - clat) <= radius) {
                    targetCluster = cluster;
                    break;
                }
            }

            if (!targetCluster) {
                targetCluster = {
                    id: src.id,
                    coords: src.coords.slice(),
                    events: [],
                    hasNoCoords: false,
                };
                clusters.push(targetCluster);
            }

            // Добавляем все события в кластер
            targetCluster.events = targetCluster.events.concat(src.events);
        });

        return clusters;
    }

    function renderMarkersForZoom(zoom) {
        // Строим кластеры
        const clusters = buildClusters(MARKERS, zoom);

        // Проверяем — изменилось ли количество кластеров
        const currentCount = clusters.length;
        const countChanged = lastClusterCount !== currentCount;
        lastClusterCount = currentCount;

        if (countChanged) {
            // При изменении числа маркеров закрываем попап и снимаем выделение
            closeInfo();
        }

        // Удаляем старые маркеры
        renderedMarkers.forEach(m => map.removeChild(m));
        renderedMarkers.length = 0;

        // Добавляем новые
        clusters.forEach(clusterData => {
            const marker = createCustomMarker(clusterData);
            map.addChild(marker);
            renderedMarkers.push(marker);
        });
    }


    // ------------------------
    // 7. Авто-центрирование по всем маркерам
    // ------------------------

    fitMapToMarkers(map, MARKERS);

    // Запоминаем предыдущий зум, чтобы не пересчитывать кластеры при простом движении карты
    let lastZoom = null;

    // ------------------------
    // 8. Слушатель изменений карты (только зум)
    // ------------------------

    const listener = new YMapListener({
        layer: 'any',
        onUpdate: ({ location }) => {
            const zoom = location.zoom;

            // если зум не изменился — ничего не делаем
            if (zoom === lastZoom) {
                return;
            }

            lastZoom = zoom;
            renderMarkersForZoom(zoom);
        }
    });

    map.addChild(listener);

    // Первая отрисовка
    renderMarkersForZoom(8);
}


/* =======================================================
      АВТО-ЦЕНТРИРОВАНИЕ ЯНДЕКС КАРТЫ V3 ПО МАРКЕРАМ
========================================================= */

function fitMapToMarkers(map, markers) {
    if (!markers.length) return;

    // Берём только маркеры с валидными координатами
    const coords = markers
        .map(m => m.coords)
        .filter(arr =>
            Array.isArray(arr) &&
            arr.length === 2 &&
            Number.isFinite(arr[0]) &&
            Number.isFinite(arr[1])
        );

    if (!coords.length) {
        return; // все маркеры "без координат" — центрирование не имеет смысла
    }

    if (coords.length === 1) {
        map.update({
            location: {
                center: coords[0],
                zoom: 13,
            },
        });
        return;
    }

    let minLon = Infinity;
    let minLat = Infinity;
    let maxLon = -Infinity;
    let maxLat = -Infinity;

    coords.forEach(([lon, lat]) => {
        if (lon < minLon) minLon = lon;
        if (lat < minLat) minLat = lat;
        if (lon > maxLon) maxLon = lon;
        if (lat > maxLat) maxLat = lat;
    });

    const bounds = [
        [minLon, minLat],   // southwest
        [maxLon, maxLat],   // northeast
    ];

    map.update({
        location: {
            bounds: bounds,
        },
        behavior: {
            smooth: true,
        },
    });
}
