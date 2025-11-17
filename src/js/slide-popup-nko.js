export const slidePopupHandler = () => {

    slidePopup();

    async function slidePopup() {

// -----------------------------------------------------------
// ПОПАП ДЛЯ СЛАЙДЕРОВ
// -----------------------------------------------------------
// ------------------------
// 0. Загружаем данные из JSON
// ------------------------

        const EVENTS = await fetch('./map/events-nko.json').then(r => r.json());

        const html = document.querySelector('html');
        
// 1) Находим элементы попапа для слайдов
        const slidePopupWrapper = document.querySelector('.slide-popup-wrapper');
        const slidePopup = document.getElementById('slide-popup');
        const slidePopupContent = slidePopup.querySelector('.map-popup__content');
        const slidePopupList = slidePopup.querySelector('.map-popup__list');
        const slidePopupClose = slidePopup.querySelector('.map-popup__close');


// 2) Функция поиска события по eventId
        function findEventById(eventId) {
            for (const marker of EVENTS) {
                for (const ev of marker.events) {
                    if (ev.eventId === eventId) return ev;
                }
            }
            return null;
        }


// 3) Функция заполнения попапа
        function openSlidePopup(eventData) {
            if (!eventData) return;

            slidePopupList.innerHTML = `
        <div class="map-popup__event" id="event-${eventData.eventId}">
            <div class="map-popup__title">${eventData.title}</div>

            <div class="map-popup__info">
                <div class="map-popup__info-img-wrap">
                    <img class="map-popup__info-img"
                         src="${eventData.image}"
                         alt="${eventData.imageAlt}">
                </div>
                <div class="map-popup__info-text">${eventData.info}</div>
            </div>

            <div class="map-popup__text">
                <div class="map-popup__text-content">${eventData.text}</div>
            </div>
        </div>
    `;

            setTimeout(function () {
                html.classList.add('is-lock');
                slidePopupWrapper.classList.remove('slide-popup-wrapper--hidden');
            }, 200)
            setTimeout(function () {
                slidePopup.classList.remove('map-popup--hidden');
            }, 300)
            // slidePopupWrapper.classList.remove('slide-popup-wrapper--hidden');
            // slidePopup.classList.remove('map-popup--hidden');
            slidePopupContent.scrollTop = 0;
        }


// 4) Закрытие попапа
        slidePopupClose.addEventListener('click', () => {
            slidePopupWrapper.classList.add('slide-popup-wrapper--hidden');
            slidePopup.classList.add('map-popup--hidden');
            html.classList.remove('is-lock');
        });
        slidePopup.addEventListener('click', e => e.stopPropagation());
        document.body.addEventListener('click', () => {
            slidePopupWrapper.classList.add('slide-popup-wrapper--hidden');
            slidePopup.classList.add('map-popup--hidden');
            html.classList.remove('is-lock');
        });


// 5) Вешаем обработчики на слайды
        document.querySelectorAll('.guides-carousel__slide-inner').forEach(slide => {
            slide.addEventListener('click', e => {
                e.stopPropagation();

                const eventId = Number(slide.dataset.eventId);

                const eventData = findEventById(eventId);

                openSlidePopup(eventData);
            });
        });

    }
}