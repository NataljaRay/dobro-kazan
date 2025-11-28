// import { FIRST_MARKER_PROPS, SECOND_MARKER_PROPS, LOCATION } from 'map/variables';
import { InfoMessage } from 'map/common';

window.map = null;

main();

async function main() {
    await ymaps3.ready;

    const { YMap, YMapDefaultSchemeLayer, YMapDefaultFeaturesLayer, YMapControls, YMapMarker } = ymaps3;

    // ------------------------
    // 1. Загружаем данные из JSON
    // ------------------------

    // const MARKERS = await fetch('map/events-nko.json').then(r => r.json());
    const MARKERS = window.MARKERS_FROM_BITRIX;
    // console.log('MARKERS', MARKERS)

    // ------------------------
    // 2. Создаём карту
    // ------------------------

    const isMobile = window.matchMedia('(max-width: 480px)').matches;
    const isIpad = window.matchMedia('(max-width: 1023px)').matches;

    const mapCenter = isMobile ? [50.575081, 55.796951] : (isIpad ? [50.445081, 55.796951] : [50.805081, 55.799951]);
    const mapZoom   = isMobile ? 6 : (isIpad ? 7 : 8);


    const map = new YMap(
        document.getElementById('map'),
        {
            location: { center: mapCenter, zoom: mapZoom }
        },
        [
            new YMapDefaultSchemeLayer(),
            new YMapDefaultFeaturesLayer()
        ]
    );

    // ------------------------
    // 3. InfoMessage — контейнер для попапа
    // ------------------------

    const infoMessage = new InfoMessage({ text: '' });

    map.addChild(
        new YMapControls({ position: 'top right' }).addChild(infoMessage)
    );

    const mapContainer = document.getElementById('map');

    // ------------------------
    // 4. Создаём единственный попап
    // ------------------------

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

    // ------------------------
    // 5. Рендер мероприятий в попап
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
                      <div id="when"></div>
                      <div id="time"></div>
                      <div id="address"></div>
                    </div>
                </div>

                <div class="map-popup__text">
                    <div class="map-popup__text-content">${event.text}</div>
                </div>
            </div>
        `).join("");

        popupList.innerHTML = popupHtmlBase;

        const popupInfoWhen = document.querySelector('#when');
        const popupInfoTime = document.querySelector('#time');
        const popupInfoAddress = document.querySelector('#address');

        if(eventsArray[0].when && (eventsArray[0].when != '')){
            popupInfoWhen.innerHTML = 'Когда: <span>' + eventsArray[0].when + '</span>';
        }

        if(eventsArray[0].time && (eventsArray[0].time != '')){
            popupInfoTime.innerHTML = 'Во сколько: <span>' + eventsArray[0].time + '</span>';
        }

        if(eventsArray[0].address && (eventsArray[0].address != '')){
            popupInfoAddress.innerHTML = 'Где: <span>' + eventsArray[0].address + '</span>';
        }

        popupElement.classList.remove('map-popup--hidden');

        // сброс скролла наверх
        popupContent.scrollTop = 0;
    }

    function closeInfo() {
        popupElement.classList.add('map-popup--hidden');
        changePointColor();
    }

    // ------------------------
    // 6. Обработчики закрытия попапа
    // ------------------------

    closeButton.addEventListener('click', (e) => {
        e.stopPropagation();
        closeInfo();
    });

    popupElement.addEventListener('click', e => e.stopPropagation());
    mapContainer.addEventListener('click', closeInfo);

    // ------------------------
    // 7. Создание маркера
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
    // 8. Добавляем маркеры
    // ------------------------

    MARKERS.forEach(markerData => {
        map.addChild(createCustomMarker(markerData));
    });
}
