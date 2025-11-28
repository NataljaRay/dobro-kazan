// map-nko-cluster.js
// Упрощённая кластеризация + автоцентрирование для Yandex Maps v3

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
                      <div class="map-popup__info-row info" id="info"></div>
                      <div class="map-popup__info-row when" id="when"></div>
                      <div class="map-popup__info-row time" id="time"></div>
                      <div class="map-popup__info-row address" id="address"></div>
                    </div>
                </div>

                <div class="map-popup__text">
                    <div class="map-popup__text-content">${event.text}</div>
                </div>
            </div>
        `).join("");

        popupList.innerHTML = popupHtmlBase;

        const popupInfoWhen = document.querySelector('.map-popup__info-row.when');
        const popupInfoTime = document.querySelector('.map-popup__info-row.time');
        const popupInfoAddress = document.querySelector('.map-popup__info-row.address');

        if (eventsArray[0].when) {
            popupInfoWhen.innerHTML = 'Когда: <span>' + eventsArray[0].when + '</span>';
        }

        if (eventsArray[0].time) {
            popupInfoTime.innerHTML = 'Во сколько: <span>' + eventsArray[0].time + '</span>';
        }

        if (eventsArray[0].address) {
            popupInfoAddress.innerHTML = 'Где: <span>' + eventsArray[0].address + '</span>';
        }

        if (!eventsArray[0].when && !eventsArray[0].time && !eventsArray[0].address && eventsArray[0].info) {
            popupInfoWhen.innerHTML = eventsArray[0].info;
        }

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

        markerEl.innerHTML = `
            <div class="map-point__inner">
                <span class="map-point__counter">${markerData.events.length}</span>
            </div>
        `;

        const marker = new YMapMarker(
            { coordinates: markerData.coords },
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
        console.log(zoom)
        // Чем меньше зум, тем больше радиус — тем сильнее "схлопываем".
        if (zoom <= 5) return 2.0;    // очень далеко
        if (zoom <= 6) return 1.0;
        if (zoom <= 7) return 0.5;
        if (zoom <= 8) return 0.25;
        if (zoom <= 9) return 0.12;
        if (zoom <= 10) return 0.06;
        if (zoom <= 11) return 0.03;
        if (zoom <= 12) return 0.01;
        // return 0.03;                  // почти не группируем
        return 0;                  // почти не группируем
    }

    function buildClusters(markers, zoom) {
        const radius = getClusterRadius(zoom);
        const clusters = [];

        markers.forEach(src => {
            const [lon, lat] = src.coords;
            let targetCluster = null;

            for (const cluster of clusters) {
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
                };
                clusters.push(targetCluster);
            }

            // Добавляем все события в кластер
            targetCluster.events = targetCluster.events.concat(src.events);
        });

        return clusters;
    }

    function renderMarkersForZoom(zoom) {
        // Удаляем старые маркеры
        renderedMarkers.forEach(m => map.removeChild(m));
        renderedMarkers.length = 0;

        const clusters = buildClusters(MARKERS, zoom);

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

    // ------------------------
    // 8. Слушатель изменений карты (зум / перемещение)
    // ------------------------

    const listener = new YMapListener({
        layer: 'any',
        onUpdate: ({ location }) => {
            const zoom = location.zoom;
            renderMarkersForZoom(zoom);
        }
    });

    map.addChild(listener);

    // На всякий случай — первая отрисовка (если onUpdate по каким-то причинам не вызвался сразу)
    renderMarkersForZoom(8);
}

/* =======================================================
      АВТО-ЦЕНТРИРОВАНИЕ ЯНДЕКС КАРТЫ V3 ПО МАРКЕРАМ
========================================================= */

function fitMapToMarkers(map, markers) {
    if (!markers.length) return;

    const coords = markers.map(m => m.coords);

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
