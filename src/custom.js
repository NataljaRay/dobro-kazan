// console.log('Added Custom.js')

// Активация попапов для экскурсоводов (секция "Щедрые экскурсоводы")
document.addEventListener('DOMContentLoaded', function () {
    const guidesPopupWrapper = document.querySelector('.slide-popup-wrapper');
    const guidesPopup = document.getElementById('slide-popup');
    const guidesPopupContent = guidesPopup.querySelector('.map-popup__content');
    const guidesPopupList = guidesPopup.querySelector('.map-popup__list');
    const html = document.querySelector('html');

    // Данные для экскурсоводов (замени на реальные данные)
    const guidesData = [
        {
            id: 1,
            title: "Благотворительная экскурсия 'Казань культурная: от изобразительного до театрального искусства'",
            image: "img/guides/g-1-Valeeva.jpeg",
            imageAlt: "Эльвира Валеева",
            info: "<div>Когда: <span style='font-weight: bold;'>24.11.2025</span></div><div>Во сколько: <span style='font-weight: bold;'>12:00</span></div></div>",
            text: `
                <p>Эльвира Валеева – экскурсовод – проведет благотворительную экскурсию "Казань культурная: от изобразительного до театрального искусства". Экскурсия пройдет для Серебряных волонтёров.</p>
                <p>Мы будем держать в фокусе внимания зарождение изобразительного и театрального искусства в Казани.Маршрут пройдет по улицам Карла Маркса, Горького, завершится на площади Свободы.</p>
                <p>Во время экскурсии посмотрим здание Казанской художественной школы и главное здание музея изобразительных искусств (снаружи). Заглянем в Лядской сад, поговорим как события, происходившие там в 18 веке, оказали влияние на открытие в Казани первого публичного театра.</p>
                <p>На площади свободы посмотрим современное здание Театра оперы и балета, и поговорим о судьбе первого публичного театра, какое место он занимал в жизни губернского города Казани и какую роль играет театр в жизни горожан в современное время.</p>
                <p>Красота спасет мир, а искусство делает мир человека лучше.</p>
                <p>Щедрым быть просто!</p>
            `
        },
        {
            id: 2,
            title: "Благотворительная экскурсия по Музею-заповеднику «Казанский Кремль»",
            image: "img/guides/g-2-Minnulina.jpeg",
            imageAlt: "Раушания Миннулина",
            info: "<div>Когда: <span style='font-weight: bold;'>27 ноября 2025г, </span></div><div>Во сколько: <span style='font-weight: bold;'>11:00</span></div><div>Где: <span>Музей- заповедник «Казанский Кремль»</span></div>",
            text: `
                <p>Миннуллина Раушания - персональный гид для экскурсий по Казани, Свияжску, Булгару и другим интересным местам Татарстана, опыт работы экскурсоводом 6 лет. Раушания проведет благотворительную экскурсию по Музею-заповеднику «Казанский Кремль».</p>
                <p>Экскурсия для незрячих - подопечных благотворительного фонда «Ярдэм».</p>
                <p>Щедрым быть просто!</p>

            `
        },
        {
            id: 3,
            title: "Благотворительная экскурсия в Раифском Богородицком монастыре",
            image: "img/guides/g-3-Hmilova.jpeg",
            imageAlt: "Наталья Хмылова ",
            info: "<div>Когда: <span style='font-weight: bold;'>26.11.2025</span></div><div>Во сколько: <span style='font-weight: bold;'>10:00</span></div><div>Где: <span>Раи́фский Богоро́дицкий монасты́рь</span></div>",
            text: `
                <p>Хмылова Наталья – экскурсовод – проведет благотворительную экскурсию для подростков с ментальной формой инвалидности. Место проведения: Раи́фский Богоро́дицкий монасты́рь.</p>
                <p>Ребятам проведут экскурсию и расскажут и о соборе, освящённом в честь иконы Божией Матери «Грузинская» (построен и освящён в 1842 году), храме, освящённом в честь Преподобных отцов в Раифе и Синае избиенных, храме в честь новомучеников и исповедников Церкви Русской (на втором этаже храма в честь Преподобных отцов в Раифе и Синае избиенных), и о многом другом.</p>
                <p>Щедрым быть просто!</p>
            `
        }
    ];

    // Обработчик клика по слайдам экскурсоводов
    document.querySelectorAll('#guides-carousel .guides-carousel__slide-inner').forEach((slide, index) => {
        slide.addEventListener('click', function (e) {
            e.stopPropagation();
            openGuidePopup(index);
        });
    });

    function openGuidePopup(guideIndex) {
        const guide = guidesData[guideIndex];
        if (!guide) return;

        guidesPopupList.innerHTML = `
            <div class="map-popup__event" id="guide-${guide.id}">
                <div class="map-popup__title">${guide.title}</div>
                <div class="map-popup__info">${guide.imageAlt}</div>

                <div class="map-popup__info">
                    <div class="map-popup__info-img-wrap">
                        <img class="map-popup__info-img"
                             src="${guide.image}"
                             alt="${guide.imageAlt}">
                    </div>
                    <div class="map-popup__info-text">
                        <div> ${guide.info}</div>
                    </div>
                </div>

                <div class="map-popup__text">
                    <div class="map-popup__text-content">${guide.text}</div>
                </div>
            </div>
        `;

        // Показываем попап
        setTimeout(() => {
            html.classList.add('is-lock');
            guidesPopupWrapper.classList.remove('slide-popup-wrapper--hidden');
        }, 200);

        setTimeout(() => {
            guidesPopup.classList.remove('map-popup--hidden');
        }, 300);

        guidesPopupContent.scrollTop = 0;
    }

    // Закрытие попапа
    guidesPopup.querySelector('.map-popup__close').addEventListener('click', closePopup);
    guidesPopupWrapper.addEventListener('click', closePopup);

    function closePopup() {
        guidesPopupWrapper.classList.add('slide-popup-wrapper--hidden');
        guidesPopup.classList.add('map-popup--hidden');
        html.classList.remove('is-lock');
    }

    guidesPopup.addEventListener('click', e => e.stopPropagation());
});