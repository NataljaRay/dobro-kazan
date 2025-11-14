import { FIRST_MARKER_PROPS, SECOND_MARKER_PROPS, LOCATION } from 'map/variables';
import { InfoMessage } from 'map/common';

window.map = null;

main();

async function main() {
    await ymaps3.ready;

    const { YMap, YMapDefaultSchemeLayer, YMapDefaultFeaturesLayer, YMapControls, YMapMarker } = ymaps3;

    // ------------------------
    // 1. ДАННЫЕ О МЕРОПРИЯТИЯХ
    // ------------------------

    const EVENTS = [
        {
            markerId: 1,
            title: "Новый год в каждый дом",
            image: "img/map/dk-1.png",
            imageAlt: "Изображение",
            info: `
                <div>Когда: <span>03.12.2025</span></div>
                <div>Во сколько: <span>14:00 - 18:00</span></div>
                <div>Где: <span>ул. Баумана, 18</span></div>
            `,
            text: 'Щедрый Вторник — ежегодный день благотворительности. В этот день миллионы людей рассказывают, как и кому они помогают. Мы решили расширить в Татарстане этот день и назвать его Щедрый Щак-Щак.'
        },
        {
            markerId: 1,
            title: "Вторая программа рядом",
            image: "img/streets/full/street-33.png",
            imageAlt: "Изображение",
            info: `
                <div>Когда: <span>04.12.2025</span></div>
                <div>Во сколько: <span>12:00 - 16:00</span></div>
                <div>Где: <span>ул. Баумана, 18</span></div>
            `,
            text: "Ещё одно мероприятие по этому же адресу."
        },
        {
            markerId: 2,
            title: "Праздник в парке",
            image: "img/map/dk-2.png",
            imageAlt: "Изображение",
            info: `
                <div>Когда: <span>05.12.2025</span></div>
                <div>Во сколько: <span>10:00 - 12:00</span></div>
                <div>Где: <span>ул. Кремлёвская, 3</span></div>
            `,
            text: "Праздничная программа для всей семьи!"
        },
        {
            markerId: 2,
            title: "Волшебное шоу",
            image: "img/streets/full/street-11.png",
            imageAlt: "Изображение",
            info: `
                <div>Когда: <span>06.12.2025</span></div>
                <div>Во сколько: <span>14:00 - 16:00</span></div>
                <div>Где: <span>ул. Кремлёвская, 3</span></div>
            `,
            text: "Фокусы, выступления артистов, конкурсы."
        },
        {
            markerId: 2,
            title: "Новогодняя ярмарка",
            image: "img/streets/full/street-22.png",
            imageAlt: "Ярмарка",
            info: `
                <div>Когда: <span>06.12.2025</span></div>
                <div>Во сколько: <span>18:00 - 20:00</span></div>
                <div>Где: <span>ул. Кремлёвская, 3</span></div>
            `,
            text: "Большая праздничная ярмарка."
        }
    ];

    // ------------------------
    // 2. СОЗДАЁМ КАРТУ
    // ------------------------

    const map = new YMap(
        document.getElementById('map'),
        { location: LOCATION },
        [
            new YMapDefaultSchemeLayer(),
            new YMapDefaultFeaturesLayer()
        ]
    );

    // ------------------------
    // 3. InfoMessage (контейнер попапа)
    // ------------------------

    const infoMessage = new InfoMessage({ text: '' });

    map.addChild(
        new YMapControls({ position: 'top right' }).addChild(infoMessage)
    );

    const mapContainer = document.getElementById('map');

    // ------------------------
    // 4. Попап — ОДИН на всю карту
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
    // 5. Рендер списка мероприятий в попап
    // ------------------------

    function updatePopup(eventsArray) {
        popupList.innerHTML = eventsArray.map(event => `
            <div class="map-popup__event">
                <div class="map-popup__title">${event.title}</div>

                <div class="map-popup__info">
                    <div class="map-popup__info-img-wrap">
                        <img class="map-popup__info-img" src="${event.image}" alt="${event.imageAlt}">
                    </div>
                    <div class="map-popup__info-text">${event.info}</div>
                </div>

                <div class="map-popup__text">
                    <div class="map-popup__text-content">${event.text}</div>
                </div>
            </div>
        `).join("");

        popupElement.classList.remove('map-popup--hidden');

        // прокручиваем контент наверх
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
    // 6. Создание маркера
    // ------------------------

    function createCustomMarker(coords, markerId) {
        const eventsForMarker = EVENTS.filter(ev => ev.markerId === markerId);

        const markerEl = document.createElement('div');
        markerEl.className = 'map-point';
        markerEl.dataset.markerId = markerId;
        markerEl.innerHTML = `
            <div class="map-point__inner">
                <span class="map-point__counter">${eventsForMarker.length}</span>
            </div>
        `;

        const marker = new YMapMarker({ coordinates: coords }, markerEl);

        markerEl.addEventListener('click', (e) => {
            e.stopPropagation();
            changePointColor();
            markerEl.classList.add('map-point--current');

            updatePopup(eventsForMarker);
        });

        return marker;
    }

    function changePointColor() {
        document.querySelectorAll('.map-point')
            .forEach(p => p.classList.remove('map-point--current'));
    }

    // ------------------------
    // 7. Добавляем маркеры на карту
    // ------------------------

    map.addChild(createCustomMarker(FIRST_MARKER_PROPS.coordinates, 1));
    map.addChild(createCustomMarker(SECOND_MARKER_PROPS.coordinates, 2));
}
