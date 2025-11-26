<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Щедрый Щак Щак");

$APPLICATION->AddHeadString('<script crossorigin src="https://cdn.jsdelivr.net/npm/@babel/standalone@7/babel.min.js"></script>');
$APPLICATION->AddHeadString('<script src="https://api-maps.yandex.ru/v3/?apikey=9396485d-1500-4279-8445-c5db0367ddf1&lang=ru_RU"></script>');


$APPLICATION->AddHeadString('<link rel="preload" href="fonts/NauryzRedKeds.woff2" as="font" type="font/woff2" crossorigin>');
$APPLICATION->AddHeadString('<link rel="preload" href="img/pyramid.svg" as="image">');
$APPLICATION->AddHeadString('<link rel="preload" href="img/tuesday.svg" as="image">');
$APPLICATION->AddHeadString('<link rel="preload" href="img/bg-full/heart-white.svg" as="image">');
$APPLICATION->AddHeadString('<style>#chak-chak {font-family: \'Inter\', sans-serif;font-weight: 400;}</style>');
$APPLICATION->SetAdditionalCSS("/culture-of-charity/shchedryy-shchak-shchak/css/style.css");
?>

<div id="chak-chak">
  <div id="participation" class="container">
    <a target="_blank" style='text-decoration: none' href='https://forms.yandex.ru/u/6921bfebd046880445c04b79/'>
      Прими участие
    </a>
  </div>

  <div class="background-linear--1">
    <section class="section--main container">
      <div class="hero-3">
        <div class="hero-3__intro">

          <div class="hero-3__pyramid">
            <img class="hero-3__pyramid-img" src="img/pyramid.svg" width="224" height="182" alt="Щак-щак">
            <h1 class="hero-3__pyramid-txt">Щедрый <br><span>Щак-Щак</span></h1>
          </div>

          <div class="hero-3__info">
            <div class="hero-3__dates">
              1<sup>11</sup> — 31<sup>12</sup>
            </div>
            <p>Щедрый Щак-Щак — ежегодный праздник<br> благотворительности в Татарстане. В это время<br> миллионы людей
              рассказывают, как и кому они помогают.<br> Корни Щедрого Щак-Щака — благотворительный день Щедрый<br> Вторник
              – день, когда в России люди помогают тем, кому необходимо.</p>
          </div>
        </div>

        <div class="hero-3__block">
          <div class="hero-3__block-part-1">
            <img class="hero-3__block-img" src="img/tuesday.svg" width="210" height="71" alt="Щедрый вторник">
            <div class="hero-3__char hero-3__char--plus">+</div>
            <h2 class="hero-3__txt">Татарстан</h2>
          </div>
          <div class="hero-3__block-part-2">
            <div class="hero-3__char hero-3__char--equals">=</div>
            <h2 class="hero-3__pyramid-txt">Щедрый <br><span>Щак-Щак</span></h2>
          </div>
        </div>
      </div>
    </section>

    <section class="section--map container">
      <h3 class="section__title section__title--cold animate__animated">Карта мероприятий</h3>
      <div class="map" aria-hidden="true">
        <div class="map__inner" id="map"></div>
      </div>
    </section>

    <div class="slide-popup-wrapper slide-popup-wrapper--hidden">
      <div id="slide-popup" class="map-popup map-popup--hidden">
        <div class="map-popup__content">
          <div class="map-popup__list"></div>
          <button class="map-popup__close">Закрыть</button>
        </div>
      </div>
    </div>

    <?
    /*
        Щедрый Бизнес
    */
    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "shchedryy-biznes",
        array(
            "IBLOCK_ID" => "28",
            "IBLOCK_TYPE" => "news", // укажите ваш тип инфоблока
            "NEWS_COUNT" => "10000", // количество новостей
            "SORT_BY1" => "ACTIVE_FROM",
            "SORT_ORDER1" => "DESC",
            "FIELD_CODE" => array("NAME", "PREVIEW_TEXT"),
            "PROPERTY_CODE" => array(),
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "3600",
            "SET_BROWSER_TITLE"=>"N",
            "SET_TITLE"=>"N"
        )
    );?>

    <?
    /*
        Щедрые НКО
    */
    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "nko",
        array(
            "IBLOCK_ID" => "25",
            "IBLOCK_TYPE" => "news", // укажите ваш тип инфоблока
            "NEWS_COUNT" => "10000", // количество новостей
            "SORT_BY1" => "ACTIVE_FROM",
            "SORT_ORDER1" => "DESC",
            "FIELD_CODE" => array("NAME", "PREVIEW_TEXT"),
            "PROPERTY_CODE" => array("DATE_EVENT", "ADDRESS_EVENT"),
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "3600",
            "SET_BROWSER_TITLE"=>"N",
            "SET_TITLE"=>"N"
        )
    );?>
<?/*
    <section class="section--nko container">
      <div class="guides nko">
        <h3 class="section__title section__title--white animate__animated">Щедрые НКО</h3>
        <div class="guides__inner">
          <div class="guides-carousel" id="nko-carousel">

            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="1">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-1.jpeg" alt="АНО Без бергэ Возвращение вкуса жизни">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">АНО «Без бергэ (Мы вместе)» </p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      Праздник «Возвращение вкуса жизни у женщин с онкологическими заболеваниями"
                    </p>
                    <p class="slide-txt">
                      18 ноября 2025 года, 18:00
                    </p>
                    <p class="slide-txt">
                      Театр кукол «Экият», ул. Петербургская, 57
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="2">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-2.jpeg" alt="АНО Донорсерч">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">АНО Донор-Серч</p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      Осенняя донорская акция<br>
                      Стань донором — подари шанс на жизнь!
                    </p>
                    <p class="slide-txt">
                      18 ноября 2025 года, 08:00 - 12.00
                    </p>
                    <p class="slide-txt">
                      Республиканский центр крови,<br> пр. Победы, 85
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="3">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-3.jpeg" alt="АНО Особые дети Татарстан">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">АНО «Особые дети. Татарстан»</p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      Встреча «Психологическая поддержка родителей детей с ОВЗ»
                    </p>
                    <p class="slide-txt">
                      29 ноября 2025 года
                    </p>
                    <p class="slide-txt">
                      ул. Ак.Глушко, 4
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="4">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-4.jpeg" alt="БФ Ассоциация кадрового менеджмента">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">БФ Ассоциация кадрового менеджмента</p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      Щедрый Щак-Щак: Рецепт Инклюзии от Казани
                    </p>
                    <p class="slide-txt">
                      26 ноября 2025 года, 12:00
                    </p>
                    <p class="slide-txt">
                      Коворкинг Добрая Казань,<br> ул. Сеченова 5, каб. 4
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="5">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-5.1.jpeg" alt="БФ Во Благо Вместе">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">БФ «Во Благо Вместе»</p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      Щедрый Вторник | Добрая ярмарка школьников
                    </p>
                    <p class="slide-txt">
                      14 ноября 2025 года, 16:00 - 19:00
                    </p>
                    <p class="slide-txt">
                      Арт-центр, ул. Ершова 62, 1 этаж
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="6">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-6.jpeg" alt="БФ Решение жить">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">БФ «РЕШЕНИЕ ЖИТЬ»</p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      Особый День открытых дверей
                    </p>
                    <p class="slide-txt">
                      22 ноября 2025 года, 14:00 - 17:00
                    </p>
                    <p class="slide-txt">
                      Арт-пространство галереи художника Славы Зайцева, ул. Бурхана Шахиди, 7
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="7">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-7.jpeg" alt="БФ «Сможем вместе»">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">БФ «Сможем вместе»</p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      Мастер класс «ТЁПЛЫЕ КАРТИНЫ»
                    </p>
                    <p class="slide-txt">
                      23 ноября 2025 года, 11:00
                    </p>
                    <p class="slide-txt">
                      Центр «Подкова»,<br> ул. Октябрьская, д.1
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="8">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap slide-img-wrap-bottom">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-8.jpeg" alt="БФ Трамплин 1">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">БФ Трамплин</p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      Мероприятие: Щасливый волонтёрский Щас
                    </p>
                    <p class="slide-txt">
                      26 ноября 2025 года, 13:00
                    </p>
                    <p class="slide-txt">
                      Казань, пешеходная улица Баумана
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="9">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap slide-img-wrap-bottom">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-9.jpeg" alt="БФ Трамплин 2">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">БФ Трамплин</p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      Турнир по плаванию «Плыви к мечте»
                    </p>
                    <p class="slide-txt">
                      Бассейн «Касатка», ул. Зорге, 64
                    </p>
                    <p class="slide-txt">
                      Казань, пешеходная улица Баумана
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="10">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-10.jpeg" alt="Фонд борьбы с диабетом">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">Благотворительный фонд борьбы с диабетом</p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      Мероприятие «Диа-фест», посвященный Всемирному дню борьбы с диабетом
                    </p>
                    <p class="slide-txt">
                      14 ноября 2025 года, 15:00 - 19:00
                    </p>
                    <p class="slide-txt">
                      ТЦ МЕГА Казань, пр. Победы, 141
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="11">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-11.jpg" alt="НКО Альпари">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">БФ «Альпари»</p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      Мастер-классы по изготовлению Щедрого Щак-Щака
                    </p>
                    <p class="slide-txt">
                      12, 18, 26 ноября 2025 года
                    </p>
                    <p class="slide-txt">
                      Коворкинг «Добрая Казань»,<br> ул. Сеченова, д.5
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="12">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap slide-img-wrap-right">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-12.1.jpeg" alt="Центр иппотерапии">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">Центр иппотерапии «Айда»</p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      Чудесная акция с новогодними предсказаниями
                    </p>
                    <p class="slide-txt">
                      01.11.2025 - 31.12.2025
                    </p>
                    <p class="slide-txt">
                      ул. Патриса Лумумбы, 47
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="13">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-13.jpeg" alt="АНО «Все для детей»">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">АНО «Все для детей»</p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      День женской гармонии
                    </p>
                    <p class="slide-txt">
                      25 ноября 2025г, 09:00-17:00
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="14">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-14.jpeg" alt="АНО «Психологи Казани»">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">АНО «Психологи Казани»</p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      День психолога: расти, развиваться и быть вместе!
                    </p>
                    <p class="slide-txt">
                      22 ноября 2025г, 15:00
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="15">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-15.jpeg" alt="АНО «Центр защиты материнства «Умиление»">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">АНО «Центр защиты материнства «Умиление»</p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      Мероприятие «День мамы»
                    </p>
                    <p class="slide-txt">
                      27 ноября 2025, Мероприятие проводится в течение дня
                    </p>
                    <p class="slide-txt">Приют «Колыбель»</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="16">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-16.jpeg" alt="АНО «Центр защиты материнства «Умиление»">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">АНО «Центр защиты материнства «Умиление»</p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      Акция "Корзина малыша"
                    </p>
                    <p class="slide-txt">
                      21 и 28 ноября 2025г, 10:00-16:00
                    </p>
                    <p class="slide-txt">Агропарк, г. Казань, ул. Аграрная, 2</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="17">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-17.jpeg" alt="БФ «Благодарение»">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">БФ «Благодарение»</p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      Мастер-класс по правополушарному рисованию
                    </p>
                    <p class="slide-txt">
                      27 ноября и 11 декабря 2025г, 15:00
                    </p>
                    <p class="slide-txt">ул. Ф.Амирхана, 10а, корп 2</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="18">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-18.jpeg" alt="БФ «Благодарение»">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">БФ «Благодарение»</p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      Концерт-дискотека с участием звезд татарской эстрады
                    </p>
                    <p class="slide-txt">
                      17 декабря 2025г, 11:00
                    </p>
                    <p class="slide-txt">Казань, ул. Мусина, д.30</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="19">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-19.jpeg" alt="БФ «Во Благо Вместе»">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">БФ «Во Благо Вместе»</p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      Щедрый Вторник | Добрая ярмарка школьников
                    </p>
                    <p class="slide-txt">
                      14 ноября 2025г, 16:00-19:00
                    </p>
                    <p class="slide-txt">Казань, Ершова 62 (Арт-центр), 1 этаж</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="20">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-20.jpeg" alt="БФ «Лига добрых людей»">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">БФ «Лига добрых людей»</p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      Онлайн вебинар «Почему ваш ребёнок ведёт себя иначе? Нейропсихология развития детей»
                    </p>
                    <p class="slide-txt">
                      22 ноября 2025г, 16:00 (<span style="color: green">Онлайн</span>)
                    </p>
                    <p class="slide-txt">Казань, ул. Вишневского, д.26А</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="21">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-21.jpeg" alt="БФ «Ярдам-Помощь»">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">БФ «Ярдам-Помощь»</p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      Обучающие программы
                    </p>
                    <p class="slide-txt">
                      Казань, ул. Серова, 4а
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="22">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-22.jpeg" alt="РОО «Многодетные семьи РТ»">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">РОО «Многодетные семьи РТ»</p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      Проект «Больше рожать — здорово жить! Идем за вторым!»
                    </p>
                    <p class="slide-txt">
                      29 ноября 2025г
                    </p>
                    <p class="slide-txt">Казань, улица Алексея Козина, дом 3</p>
                    <p class="slide-txt">Millenium Clinic (Казань)</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="23">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-23.jpeg" alt="РОО Приемные семьи Татарстана «Мы вместе!»">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">РОО Приемные семьи Татарстана «Мы вместе!»</p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      Фотовыставка «ПАПАМАМАЕСТЬ»
                    </p>
                    <p class="slide-txt">
                      С 20 ноября 2025г
                    </p>
                    <p class="slide-txt">города Высокая Гора, Набережные Челны и Болгар</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner" data-event-id="24">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/nko/nko-24.jpeg" alt="РЦ «Изумрудный город» и СОЦ «ВКЛЮЧАЙСЯ!»">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">РЦ «Изумрудный город» и СОЦ «ВКЛЮЧАЙСЯ!»</p>
                  <div class="slide-txt-container">
                    <p class="slide-txt">
                      Благотворительный марафон "ПРАЗДНИК, КОТОРЫЙ ДАРИШЬ ТЫ"
                    </p>
                    <p class="slide-txt">
                      С 22 ноября по 4 января
                    </p>
                    <p class="slide-txt">В разных районах Республики</p>
                  </div>
                </div>
              </div>
            </div>




          </div>
        </div>
      </div>
    </section>
*/?>
  </div>


<?
/*
	Щедрый арт
*/
$APPLICATION->IncludeComponent(
  "bitrix:news.list",
  "art",
  array(
    "IBLOCK_ID" => "26",
    "IBLOCK_TYPE" => "news", // укажите ваш тип инфоблока
    "NEWS_COUNT" => "10000", // количество новостей
    "SORT_BY1" => "ACTIVE_FROM",
    "SORT_ORDER1" => "DESC",
    "FIELD_CODE" => array("NAME", "PREVIEW_TEXT"),
    "PROPERTY_CODE" => array(),
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "3600",
	"SET_BROWSER_TITLE"=>"N",
	"SET_TITLE"=>"N"
  )
);?>
  <div class="background-linear--2">
<?
/*
	Щедрые волонтеры
*/
$APPLICATION->IncludeComponent(
  "bitrix:news.list",
  "volunteers",
  array(
    "IBLOCK_ID" => "27",
    "IBLOCK_TYPE" => "news", // укажите ваш тип инфоблока
    "NEWS_COUNT" => "10", // количество новостей
    "SORT_BY1" => "ACTIVE_FROM",
    "SORT_ORDER1" => "DESC",
    "FIELD_CODE" => array("NAME", "PREVIEW_TEXT"),
    "PROPERTY_CODE" => array(),
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "3600",
	"SET_BROWSER_TITLE"=>"N",
	"SET_TITLE"=>"N"
  )
);?>
  </div>

  <div class="background-white">
  
<?php
/*
	Щедрые районы
*/
$APPLICATION->IncludeComponent(
  "bitrix:news.list",
  "street",
  array(
    "IBLOCK_ID" => "24",
    "NEWS_COUNT" => "10",
    "SORT_BY1" => "ACTIVE_FROM",
    "SORT_ORDER1" => "DESC",
    "FIELD_CODE" => array("NAME", "PREVIEW_TEXT"),
    "PROPERTY_CODE" => array(),
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "36000000",
	"SET_BROWSER_TITLE"=>"N",
	"SET_TITLE"=>"N"
  ),
  false
);
?>

    <section class="section--guides section--guides-copy container">
      <div class="guides">
        <h3 class="section__title animate__animated">Щедрые <br>экскурсоводы</h3>
        <div class="guides__inner">
          <div class="guides-carousel" id="guides-carousel">

            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/guides/g-1-Valeeva.jpeg" alt="Изображение">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">Эльвира Валеева</p>
                  <p class="slide-txt">
                    Благотворительная экскурсия "Казань культурная: от изобразительного до театрального искусства"
                  </p>
                  <p class="slide-txt">
                    24 ноября 2025г, 12:00
                  </p>
                </div>
              </div>
            </div>
            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/guides/g-2-Minnulina.jpeg" alt="Изображение">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">Раушания Миннулина </p>
                  <p class="slide-txt">
                    Благотворительная экскурсия по Музею-заповеднику «Казанский Кремль»
                  </p>
                  <p class="slide-txt">
                    27 ноября 2025г, 11:00
                  </p>
                </div>
              </div>
            </div>

            <div class="guides-carousel__slide slide">
              <div class="guides-carousel__slide-inner">
                <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                  <img class="guides-carousel__slide-img slide-img" src="img/guides/g-3-Hmilova.jpeg" alt="Изображение">
                </div>
                <div class="guides-carousel__slide-info slide-info">
                  <p class="slide-title">Наталья Хмылова</p>
                  <p class="slide-txt">
                    Благотворительная экскурсия в Раифском Богородицком монастыре
                  </p>
                  <p class="slide-txt">
                    26 ноября 2025г, 10:00
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?/*
    <section class="section--taste container">
      <h3 class="section__title animate__animated">Щедро-вкусный <br>Щак Щак</h3>
      <div class="taste">
        <div class="taste__inner">

          <div class="taste-carousel" id="taste-carousel">
            <div class="book-carousel__slide">
              <div class="book-carousel__slide-inner">

                <div class="media media--secondary">
                  <div class="media__block">

                    <div class="media__img-wrapper">
                      <img class="media__img" src="img/restaurant/restaurant-1.png" width="474" height="424" alt="Ресторан Чирэм">
                    </div>
                    <div class="media__txt-wrapper">
                      <h4 class="media__title">Ресторан Чирэм</h4>
                      <p class="media__txt">
                        Интересные книжные магазины Казани · Книжный магазин «Дом книги» · Книжный магазин «Читай-город» · Книжный магазин «Любимый книжный» · Магазин в Доме татарской Интересные книжные магазины Казани · Книжный магазин «Дом книги» · Книжный магазин «Читай-город» · Книжный магазин «Любимый книжный» · Магазин в Доме татарской 
                      </p>
                    </div>

                  </div>
                </div>

              </div>
            </div>
            <div class="book-carousel__slide">
              <div class="book-carousel__slide-inner">

                <div class="media media--secondary">
                  <div class="media__block">

                    <div class="media__img-wrapper">
                      <img class="media__img" src="img/books.png" width="474" height="424" alt="Ресторан Чирэм">
                    </div>
                    <div class="media__txt-wrapper">
                      <h4 class="media__title">Ресторан Чирэм 2</h4>
                      <p class="media__txt">
                        Интересные книжные магазины Казани · Книжный магазин «Дом книги» · Книжный магазин «Читай-город» · Книжный магазин «Любимый книжный» · Магазин в Доме татарской Интересные книжные магазины Казани · Книжный магазин «Дом книги» · Книжный магазин «Читай-город» · Книжный магазин «Любимый книжный» · Магазин в Доме татарской 
                      </p>
                    </div>

                  </div>
                </div>

              </div>
            </div>
          </div>

          <div class="media media--secondary" style="display: none">
            <div class="media__block">

              <div class="media__img-wrapper">
                <img class="media__img" src="img/restaurant/restaurant-1.png" width="474" height="424" alt="Ресторан Чирэм">
              </div>
              <div class="media__txt-wrapper">
                <h4 class="media__title">Ресторан Чирэм</h4>
                <p class="media__txt">
                  Интересные книжные магазины Казани · Книжный магазин «Дом книги» · Книжный магазин «Читай-город» · Книжный магазин «Любимый книжный» · Магазин в Доме татарской Интересные книжные магазины Казани · Книжный магазин «Дом книги» · Книжный магазин «Читай-город» · Книжный магазин «Любимый книжный» · Магазин в Доме татарской 
                </p>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>
*/?>
  </div>
</div>
<style>
  body>.container {
    max-width: 100%;
  }

  /*#panel + .container {position: fixed;top: 0;z-index: 99999;}*/
  /*.header.fixed {width: 100%;position: relative;}*/
  .header.fixed {
    width: 100%;
  }

  .head_flex {
    max-width: 1440px;
  }

  @media screen and (min-width: 1455px) {
    .head_flex {
      max-width: 1296px;
    }
  }

  #chak-chak {
    overflow-x: hidden;
  }
</style>

<script src="/culture-of-charity/shchedryy-shchak-shchak/assets/slick/slick.min.js"></script>
<script src="/culture-of-charity/shchedryy-shchak-shchak/bundle.js"></script>
<script src="/culture-of-charity/shchedryy-shchak-shchak/custom.js"></script>


<script
  data-plugins="transform-modules-umd"
  data-presets="react, typescript"
  type="text/babel"
  src="map/common.ts"></script>
<script
  data-plugins="transform-modules-umd"
  data-presets="react, typescript"
  type="text/babel"
  src="map/map-nko.js"></script>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>