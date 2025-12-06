<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Щедрый Щак Щак");

$APPLICATION->AddHeadString('<script crossorigin src="https://cdn.jsdelivr.net/npm/@babel/standalone@7/babel.min.js"></script>');
$APPLICATION->AddHeadString('<script src="https://api-maps.yandex.ru/v3/?apikey=9396485d-1500-4279-8445-c5db0367ddf1&lang=ru_RU"></script>');
$APPLICATION->AddHeadString('<script src="https://forms.yandex.ru/_static/embed.js"></script>');


$APPLICATION->AddHeadString('<link rel="preload" href="fonts/NauryzRedKeds.woff2" as="font" type="font/woff2" crossorigin>');
$APPLICATION->AddHeadString('<link rel="preload" href="img/pyramid.svg" as="image">');
$APPLICATION->AddHeadString('<link rel="preload" href="img/tuesday.svg" as="image">');
$APPLICATION->AddHeadString('<link rel="preload" href="img/bg-full/heart-white.svg" as="image">');
$APPLICATION->AddHeadString('<style>#chak-chak {font-family: \'Inter\', sans-serif;font-weight: 400;}</style>');
$APPLICATION->SetAdditionalCSS("/culture-of-charity/shchedryy-shchak-shchak/css/style.css");

?>

<div id="chak-chak">
  <div id="participation" class="container">
    <span id="participation-btn">Прими участие</span>
    <div class="participation-popup-wrapper participation-popup-wrapper--hidden" id="participation-popup">
      <div class="slide-popup participation-popup participation-popup--hidden">
        <div class="map-popup__content">
          <div class="map-popup__list">
            <iframe src="https://forms.yandex.ru/u/6921bfebd046880445c04b79?iframe=1" frameborder="0" name="ya-form-6921bfebd046880445c04b79" width="100%" height="100%"></iframe>
          </div>
          <button class="map-popup__close">Закрыть</button>
        </div>
      </div>
    </div>
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
      <div id="slide-popup" class="slide-popup map-popup map-popup--hidden">
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
            "PROPERTY_CODE" => array("DATE", "ADDRESS"),
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
            "PROPERTY_CODE" => array("DATE", "ADDRESS"),
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "3600",
            "SET_BROWSER_TITLE"=>"N",
            "SET_TITLE"=>"N"
        )
    );?>

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
    "NEWS_COUNT" => "100", // количество новостей
    "SORT_BY1" => "ACTIVE_FROM",
    "SORT_ORDER1" => "DESC",
    "FIELD_CODE" => array("NAME", "PREVIEW_TEXT"),
    "PROPERTY_CODE" => array("DATE", "ADDRESS"),
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
    "NEWS_COUNT" => "100",
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

  </div>
  <div id="debug-log" style="display: none!important;"></div>
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

<?php
use Bitrix\Main\Loader;

Loader::includeModule('iblock');

$iblocks = [25, 27, 28]; // НКО, волонтеры, бизнес
$eventsData = [];

foreach ($iblocks as $iblockId) {

  $res = CIBlockElement::GetList(
      ['SORT' => 'ASC'],
      ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'],
      false,
      false,
      [
          'ID',
          'NAME',
          'DETAIL_PAGE_URL',
          'DETAIL_TEXT',
          'PREVIEW_PICTURE',
          'DETAIL_PICTURE',
          'PROPERTY_WHEN',
          'PROPERTY_TIME',
          'PROPERTY_ADDRESS',
          'PROPERTY_MAP_COORDS',
      ]
  );

  while ($item = $res->GetNext()) {

    // --- Координаты ---
    $rawCoords = $item['PROPERTY_MAP_COORDS_VALUE'] ?? '';

// если массив → берём первый элемент
    if (is_array($rawCoords)) {
      $rawCoords = reset($rawCoords);
    }

    $coords = trim((string)$rawCoords);

// дробим
    $coordsArr = array_map('floatval', explode(',', $coords));

    if (count($coordsArr) !== 2) {
      continue; // мусор — пропускаем
    }

    $first  = $coordsArr[0];
    $second = $coordsArr[1];

// Диапазоны Татарстана
    $latMin = 54.0;
    $latMax = 56.0;
    $lonMin = 48.0;
    $lonMax = 51.0;

// проверяем, что значения вообще похожи на координаты Татарстана
    $firstIsLat  = ($first  >= $latMin && $first  <= $latMax);
    $firstIsLon  = ($first  >= $lonMin && $first  <= $lonMax);
    $secondIsLat = ($second >= $latMin && $second <= $latMax);
    $secondIsLon = ($second >= $lonMin && $second <= $lonMax);

// если координаты не Татарстан → не трогаем
    $isTatarstan = ($firstIsLat && $secondIsLon) || ($firstIsLon && $secondIsLat);
    if (!$isTatarstan) {
      $coordKey = implode(',', $coordsArr);
    } else {

      /*
          ЛОГИКА:
          ✔ если LAT, LON → (55, 49)
              → нужно перевернуть в (49, 55)

          ✔ если LON, LAT → (49, 55)
              → ничего не делаем
      */

      if ($firstIsLat && $secondIsLon) {
        // LAT,LON → переворачиваем
        $coordsArr = [$second, $first];
      }

      // если уже LON,LAT → оставляем как есть
      $coordKey = implode(',', $coordsArr);
    }


    if (!isset($eventsData[$coordKey])) {
      $eventsData[$coordKey] = [
          'id'     => md5($coordKey),
          'coords' => $coordsArr,
          'events' => []
      ];
    }

//// --- Картинка ---
//    $img = '';
//    if ($item['PREVIEW_PICTURE']) {
//      $img = CFile::GetPath($item['PREVIEW_PICTURE']);
//    }

    // --- Картинка ---
    $img = '';

    if ((int)$iblockId === 28 && $item['DETAIL_PICTURE']) {
      // Для Щедрого бизнеса показываем детальную картинку
      $img = CFile::GetPath($item['DETAIL_PICTURE']);
    } elseif ($item['PREVIEW_PICTURE']) {
      // Остальные берут картинку из превью (анонса)
      $img = CFile::GetPath($item['PREVIEW_PICTURE']);
    }




// --- Данные события ---
    $eventsData[$coordKey]['events'][] = [
        'eventId'  => (int)$item['ID'],
        'title'    => (string)$item['NAME'],
        'image'    => (string)$img,
        'imageAlt' => (string)$item['NAME'],
//        'info'     => (string)trim($item['PROPERTY_WHEN_VALUE'] . ' ' . $item['PROPERTY_TIME_VALUE']),
        'when'     => (string)($item['PROPERTY_WHEN_VALUE']['TEXT']),
        'time'     => (string)($item['PROPERTY_TIME_VALUE']['TEXT']),
        'text'     => (string)$item['DETAIL_TEXT'],
        'address'  => (string)$item['PROPERTY_ADDRESS_VALUE']['TEXT'],
        'iblock'   => (int)$iblockId,
    ];

  }
}

// отдаём как простой массив
$markersJson = json_encode(array_values($eventsData), JSON_UNESCAPED_UNICODE);
?>

  <script>
      window.MARKERS_FROM_BITRIX = <?= $markersJson ?>;
  </script>


<script
  data-plugins="transform-modules-umd"
  data-presets="react, typescript"
  type="text/babel"
  src="map/common.ts"></script>
<script
  data-plugins="transform-modules-umd"
  data-presets="react, typescript"
  type="text/babel"
  src="map/map-nko-php.js"></script>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>