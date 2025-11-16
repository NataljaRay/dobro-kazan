import { FIRST_MARKER_PROPS, SECOND_MARKER_PROPS, LOCATION } from 'map/variables';
import { InfoMessage } from 'map/common';

window.map = null;

main();

async function main() {
    await ymaps3.ready;

    const { YMap, YMapDefaultSchemeLayer, YMapDefaultFeaturesLayer, YMapControls, YMapMarker } = ymaps3;

    // --- создаем карту ---
    const map = new YMap(
        document.getElementById('map'),
        { location: LOCATION },
        [
            new YMapDefaultSchemeLayer(),
            new YMapDefaultFeaturesLayer()
        ]
    );

    // --- создаем InfoMessage (в правом верхнем углу) ---
    const infoMessage = new InfoMessage({
        text: ''
    });

    map.addChild(
        new YMapControls({ position: 'top right' }).addChild(infoMessage)
    );

    const mapContainer = document.getElementById('map');

    // --- данные для попапов ---
    const popupData1 = {
        id: 1,
        title: 'Новый год в каждый дом',
        image: 'img/map/dk-1.png',
        imageAlt: 'Изображение',
        info: '<div>Когда: <span>03.12.2025</span></div><div>Во сколько: <span>14:00 - 18:00</span></div><div>Где: <span>ул. Баумана, 18</span></div>',
        text: 'Щедрый Вторник — ежегодный день благотворительности. В этот день миллионы людей рассказывают, как и кому они помогают. Мы решили расширить в Татарстане этот день и назвать его Щедрый Щак-Щак.'
    };

    const popupData2 = {
        id: 2,
        title: 'Праздник в парке',
        image: 'img/map/dk-2.png',
        imageAlt: 'Изображение',
        info: '<div>Когда: <span>05.12.2025</span></div><div>Во сколько: <span>10:00 - 12:00</span></div><div>Где: <span>ул. Кремлёвская, 3</span></div>',
        text: 'Праздничная программа с музыкой и угощениями для всей семьи!'
    };

    // --- создаём попап ---
    const popupElement = document.createElement('div');
    popupElement.classList.add('map-popup', 'map-popup--hidden');

    popupElement.innerHTML = `
        <div class="map-popup__content">
            <div class="map-popup__title"></div>
            <div class="map-popup__info">
                <div class="map-popup__info-img-wrap">
                    <img class="map-popup__info-img" src="" alt="">
                </div>
                <div class="map-popup__info-text"></div>
            </div>
            <div class="map-popup__text">
                <div class="map-popup__text-content"></div>
            </div>
            <button class="map-popup__close">Закрыть</button>
        </div>
    `;

    // --- вставляем попап в InfoMessage ---
    infoMessage.updateContent(popupElement);

    // --- находим элементы внутри ---
    const titleEl = popupElement.querySelector('.map-popup__title');
    const imgEl = popupElement.querySelector('.map-popup__info-img');
    const infoEl = popupElement.querySelector('.map-popup__info-text');
    const textEl = popupElement.querySelector('.map-popup__text-content');
    const closeButton = popupElement.querySelector('.map-popup__close');

    // --- функция для возврата к начальному состоянию ---
    function closeInfo() {
        titleEl.textContent = '';
        imgEl.src = '';
        imgEl.alt = '';
        infoEl.innerHTML = '';
        textEl.textContent = '';

        // скрыть попап
        popupElement.classList.add('map-popup--hidden');

        changePointColor();
    }

    // --- обновление содержимого попапа ---
    function updatePopup(data) {
        titleEl.textContent = data.title;
        imgEl.src = data.image;
        imgEl.alt = data.imageAlt;
        infoEl.innerHTML = data.info;
        textEl.textContent = data.text;

        // показать попап
        popupElement.classList.remove('map-popup--hidden');
    }

    // --- закрытие попапа ---
    closeButton.addEventListener('click', (e) => {
        e.stopPropagation();
        popupElement.classList.add('map-popup--hidden');
        setTimeout(closeInfo, 100);
    });

    // --- предотвращаем всплытие кликов из попапа в контейнер карты ---
    popupElement.addEventListener('click', (e) => e.stopPropagation());

    // --- клик по карте — закрывает попап ---
    mapContainer.addEventListener('click', () => {
        popupElement.classList.add('map-popup--hidden');
        setTimeout(closeInfo, 100);
    });

    // --- функция создания кастомного маркера ---
    function createCustomMarker(coords, popupData) {
        const markerEl = document.createElement('div');
        markerEl.className = 'map-point';
        markerEl.id = popupData.id;
        markerEl.innerHTML = '<div class="map-point__inner"></div>';

        const marker = new YMapMarker({ coordinates: coords }, markerEl);

        markerEl.addEventListener('click', (e) => {
            e.stopPropagation();
            changePointColor();
            markerEl.classList.add('map-point--current');
            updatePopup(popupData);
        });

        return marker;
    }

    function changePointColor() {
        const points = document.querySelectorAll('.map-point');
        points.forEach(point => {
            point.classList.remove('map-point--current')
        })
    }

    // --- создаем и добавляем оба маркера ---
    const marker1 = createCustomMarker(FIRST_MARKER_PROPS.coordinates, popupData1);
    const marker2 = createCustomMarker(SECOND_MARKER_PROPS.coordinates, popupData2);

    map.addChild(marker1);
    map.addChild(marker2);
}