<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Щедрый Щак Щак");

$APPLICATION->AddHeadString('<script src="https://api-maps.yandex.ru/v3/?apikey=9396485d-1500-4279-8445-c5db0367ddf1&lang=ru_RU"></script>');

$APPLICATION->SetAdditionalCSS("/culture-of-charity/shchedryy-shchak-shchak/css/style.css");
?>
  <div id="chak-chak">
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
                25<sup>11</sup> — 2<sup>12</sup>
              </div>
              <p>
                Щедрый Щак-Щак — ежегодная неделя<br>
                благотворительности в Татарстане. В это время<br>
                миллионы людей рассказывают, как и кому они помогают.<br>
                Корни Щедрого Щак-Щака — благотворительный день Щедрый<br>
                Вторник – день, когда в России люди помогают тем, кому необходимо.
              </p>
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
        <div class="map">
          <div class="map__inner">
            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ab168df40f2d98ea0bf2201a3d09eb74766fc49e4b5f3b5a9ed0aa69e9182c6da&amp;source=constructor" width="100%" height="720" frameborder="0"></iframe>
          </div>
        </div>
      </section>

      <section class="section--guides container">
        <div class="guides">
          <h3 class="section__title section__title--white animate__animated">Щедрые <br>экскурсоводы</h3>
          <div class="guides__inner">
            <div class="guides-carousel" id="guides-carousel">

              <div class="guides-carousel__slide slide">
                <div class="guides-carousel__slide-inner">
                  <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                    <img class="guides-carousel__slide-img slide-img" src="img/guides/g-1.png" alt="Изображение">
                  </div>
                  <div class="guides-carousel__slide-info slide-info">
                    <p class="slide-title">Алина Шарифуллина</p>
                    <p class="slide-txt">
                      Экрскурсовод мирового уровня, 1 категор. Русский, англи.йский, татарский языкиЭкрскурсовод мирового уровня, 1 категор. Русский, английский, татарский языки
                    </p>
                  </div>
                </div>
              </div>
              <div class="guides-carousel__slide slide">
                <div class="guides-carousel__slide-inner">
                  <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                    <img class="guides-carousel__slide-img slide-img" src="img/guides/g-2.png" alt="Изображение">
                  </div>
                  <div class="guides-carousel__slide-info slide-info">
                    <p class="slide-title">Алина Шарифуллина</p>
                    <p class="slide-txt">
                      Экрскурсовод мирового уровня, 1 категор. Русский, англи.йский, татарский языкиЭкрскурсовод мирового уровня, 1 категор. Русский, английский, татарский языки
                    </p>
                  </div>
                </div>
              </div>

              <div class="guides-carousel__slide slide">
                <div class="guides-carousel__slide-inner">
                  <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                    <img class="guides-carousel__slide-img slide-img" src="img/guides/g-1.png" alt="Изображение">
                  </div>
                  <div class="guides-carousel__slide-info slide-info">
                    <p class="slide-title">Алина Шарифуллина</p>
                    <p class="slide-txt">
                      Экрскурсовод мирового уровня, 1 категор. Русский, англи.йский, татарский языкиЭкрскурсовод мирового уровня, 1 категор. Русский, английский, татарский языки
                    </p>
                  </div>
                </div>
              </div>
              <div class="guides-carousel__slide slide">
                <div class="guides-carousel__slide-inner">
                  <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                    <img class="guides-carousel__slide-img slide-img" src="img/guides/g-2.png" alt="Изображение">
                  </div>
                  <div class="guides-carousel__slide-info slide-info">
                    <p class="slide-title">Алина Шарифуллина</p>
                    <p class="slide-txt">
                      Экрскурсовод мирового уровня, 1 категор. Русский, англи.йский, татарский языкиЭкрскурсовод мирового уровня, 1 категор. Русский, английский, татарский языки
                    </p>
                  </div>
                </div>
              </div>

              <div class="guides-carousel__slide slide">
                <div class="guides-carousel__slide-inner">
                  <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                    <img class="guides-carousel__slide-img slide-img" src="img/guides/g-1.png" alt="Изображение">
                  </div>
                  <div class="guides-carousel__slide-info slide-info">
                    <p class="slide-title">Алина Шарифуллина</p>
                    <p class="slide-txt">
                      Экрскурсовод мирового уровня, 1 категор. Русский, англи.йский, татарский языкиЭкрскурсовод мирового уровня, 1 категор. Русский, английский, татарский языки
                    </p>
                  </div>
                </div>
              </div>
              <div class="guides-carousel__slide slide">
                <div class="guides-carousel__slide-inner">
                  <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                    <img class="guides-carousel__slide-img slide-img" src="img/guides/g-2.png" alt="Изображение">
                  </div>
                  <div class="guides-carousel__slide-info slide-info">
                    <p class="slide-title">Алина Шарифуллина</p>
                    <p class="slide-txt">
                      Экрскурсовод мирового уровня, 1 категор. Русский, англи.йский, татарский языкиЭкрскурсовод мирового уровня, 1 категор. Русский, английский, татарский языки
                    </p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>

    </div>

    <div class="background-white">
      <section class="section--art container">
        <h3 class="section__title animate__animated">Щедрый арт</h3>
        <div class="art">
          <div class="art__inner">
            <div class="art-carousel" id="art-carousel">

              <div class="art-carousel__slide slide">
                <div class="art-carousel__slide-img-wrap slide-img-wrap">
                  <img class="art-carousel__slide-img slide-img" src="img/art/full/art-11.png" alt="art-11">
                </div>
                <div class="art-carousel__slide-info slide-info">
                  <p class="slide-title">Марсель Каримов</p>
                  <p class="slide-txt">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec venenatis magna eget enim convallis dictum. Ut gravida quis ex id condimentum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed sit amet rutrum massa. Sed pulvinar tempor arcu, in malesuada ante lobortis non.
                  </p>
                </div>
              </div>
              <div class="art-carousel__slide slide">
                <div class="art-carousel__slide-img-wrap slide-img-wrap">
                  <img class="art-carousel__slide-img slide-img" src="img/art/full/art-22.png" alt="art-22">
                </div>
                <div class="art-carousel__slide-info slide-info">
                  <p class="slide-title">София Марджани</p>
                  <p class="slide-txt">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec venenatis magna eget enim convallis dictum. Ut gravida quis ex id condimentum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed sit amet rutrum massa. Sed pulvinar tempor arcu, in malesuada ante lobortis non.
                  </p>
                </div>
              </div>
              <div class="art-carousel__slide slide">
                <div class="art-carousel__slide-img-wrap slide-img-wrap">
                  <img class="art-carousel__slide-img slide-img" src="img/art/full/art-33.png" alt="art-33">
                </div>
                <div class="art-carousel__slide-info slide-info">
                  <p class="slide-title">Эркен Буриев</p>
                  <p class="slide-txt">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec venenatis magna eget enim convallis dictum. Ut gravida quis ex id condimentum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed sit amet rutrum massa. Sed pulvinar tempor arcu, in malesuada ante lobortis non.
                  </p>
                </div>
              </div>

              <div class="art-carousel__slide slide">
                <div class="art-carousel__slide-img-wrap slide-img-wrap">
                  <img class="art-carousel__slide-img slide-img" src="img/art/art-1.png" alt="art-1">
                </div>
                <div class="art-carousel__slide-info slide-info">
                  <p class="slide-title">Марсель Каримов</p>
                  <p class="slide-txt">Туган Авылым</p>
                </div>
              </div>
              <div class="art-carousel__slide slide">
                <div class="art-carousel__slide-img-wrap slide-img-wrap">
                  <img class="art-carousel__slide-img slide-img" src="img/art/art-2.png" alt="art-2">
                </div>
                <div class="art-carousel__slide-info slide-info">
                  <p class="slide-title">София Марджани</p>
                  <p class="slide-txt">Буря</p>
                </div>
              </div>
              <div class="art-carousel__slide slide">
                <div class="art-carousel__slide-img-wrap slide-img-wrap">
                  <img class="art-carousel__slide-img slide-img" src="img/art/art-3.png" alt="art-3">
                </div>
                <div class="art-carousel__slide-info slide-info">
                  <p class="slide-title">Эркен Буриев</p>
                  <p class="slide-txt">На восток</p>
                </div>
              </div>
              <div class="art-carousel__slide slide">
                <div class="art-carousel__slide-img-wrap slide-img-wrap">
                  <img class="art-carousel__slide-img slide-img" src="img/art/art-4.png" alt="art-4">
                </div>
                <div class="art-carousel__slide-info slide-info">
                  <p class="slide-title">Марсель Каримов</p>
                  <p class="slide-txt">Туган Авылым</p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>
    </div>

    <div class="background-linear--2">
      <section class="section--books container">
        <h3 class="section__title section__title--warm animate__animated">Щедро-умный <br>Щак Щак</h3>
        <div class="books">
          <div class="books__inner">
            <div class="book-carousel" id="book-carousel">
              <div class="book-carousel__slide">
                <div class="book-carousel__slide-inner">
                  <div class="media media--main">
                    <div class="media__block">

                      <div class="media__img-wrapper">
                        <img class="media__img " src="img/books.png" width="474" height="424" alt="Книжные магазины">
                      </div>
                      <div class="media__txt-wrapper">
                        <h4 class="media__title">Книжные магазины</h4>
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
                  <div class="media media--main">
                    <div class="media__block">
                      <div class="media__img-wrapper">
                        <img class="media__img " src="img/restaurant/restaurant-1.png" width="474" height="424" alt="Книжные магазины">
                      </div>
                      <div class="media__txt-wrapper">
                        <h4 class="media__title">Книжные магазины 2</h4>
                        <p class="media__txt">
                          Интересные книжные магазины Казани · Книжный магазин «Дом книги» · Книжный магазин «Читай-город» · Книжный магазин «Любимый книжный» · Магазин в Доме татарской Интересные книжные магазины Казани · Книжный магазин «Дом книги» · Книжный магазин «Читай-город» · Книжный магазин «Любимый книжный» · Магазин в Доме татарской 
                        </p>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section--volunteers container">
        <h3 class="section__title section__title--white animate__animated">Щедрые <br>волонтеры</h3>
        <div class="volunteers">
          <div class="volunteers__inner">

            <div class="guides-carousel" id="volunteers-carousel">

              <div class="guides-carousel__slide slide">
                <div class="guides-carousel__slide-inner">
                  <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                    <img class="guides-carousel__slide-img slide-img" src="img/guides/g-1.png" alt="Изображение">
                  </div>
                  <div class="guides-carousel__slide-info slide-info">
                    <p class="slide-title">Алина Шарифуллина</p>
                    <p class="slide-txt">
                      Экрскурсовод мирового уровня, 1 категор. Русский, англи.йский, татарский языкиЭкрскурсовод мирового уровня, 1 категор. Русский, английский, татарский языки
                    </p>
                  </div>
                </div>
              </div>
              <div class="guides-carousel__slide slide">
                <div class="guides-carousel__slide-inner">
                  <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                    <img class="guides-carousel__slide-img slide-img" src="img/guides/g-2.png" alt="Изображение">
                  </div>
                  <div class="guides-carousel__slide-info slide-info">
                    <p class="slide-title">Алина Шарифуллина</p>
                    <p class="slide-txt">
                      Экрскурсовод мирового уровня, 1 категор. Русский, англи.йский, татарский языкиЭкрскурсовод мирового уровня, 1 категор. Русский, английский, татарский языки
                    </p>
                  </div>
                </div>
              </div>

              <div class="guides-carousel__slide slide">
                <div class="guides-carousel__slide-inner">
                  <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                    <img class="guides-carousel__slide-img slide-img" src="img/guides/g-1.png" alt="Изображение">
                  </div>
                  <div class="guides-carousel__slide-info slide-info">
                    <p class="slide-title">Алина Шарифуллина</p>
                    <p class="slide-txt">
                      Экрскурсовод мирового уровня, 1 категор. Русский, англи.йский, татарский языкиЭкрскурсовод мирового уровня, 1 категор. Русский, английский, татарский языки
                    </p>
                  </div>
                </div>
              </div>
              <div class="guides-carousel__slide slide">
                <div class="guides-carousel__slide-inner">
                  <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                    <img class="guides-carousel__slide-img slide-img" src="img/guides/g-2.png" alt="Изображение">
                  </div>
                  <div class="guides-carousel__slide-info slide-info">
                    <p class="slide-title">Алина Шарифуллина</p>
                    <p class="slide-txt">
                      Экрскурсовод мирового уровня, 1 категор. Русский, англи.йский, татарский языкиЭкрскурсовод мирового уровня, 1 категор. Русский, английский, татарский языки
                    </p>
                  </div>
                </div>
              </div>

              <div class="guides-carousel__slide slide">
                <div class="guides-carousel__slide-inner">
                  <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                    <img class="guides-carousel__slide-img slide-img" src="img/guides/g-1.png" alt="Изображение">
                  </div>
                  <div class="guides-carousel__slide-info slide-info">
                    <p class="slide-title">Алина Шарифуллина</p>
                    <p class="slide-txt">
                      Экрскурсовод мирового уровня, 1 категор. Русский, англи.йский, татарский языкиЭкрскурсовод мирового уровня, 1 категор. Русский, английский, татарский языки
                    </p>
                  </div>
                </div>
              </div>
              <div class="guides-carousel__slide slide">
                <div class="guides-carousel__slide-inner">
                  <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                    <img class="guides-carousel__slide-img slide-img" src="img/guides/g-2.png" alt="Изображение">
                  </div>
                  <div class="guides-carousel__slide-info slide-info">
                    <p class="slide-title">Алина Шарифуллина</p>
                    <p class="slide-txt">
                      Экрскурсовод мирового уровня, 1 категор. Русский, англи.йский, татарский языкиЭкрскурсовод мирового уровня, 1 категор. Русский, английский, татарский языки
                    </p>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>
      </section>
    </div>

    <div class="background-white">
      <section class="section--streets container">
        <h3 class="section__title section__title--cold animate__animated">Щедрая улица</h3>
        <div class="streets">
          <div class="streets__inner">
            <div class="street">
              <div class="street__img-wrapper">
                <img class="street__img" src="img/streets/full/street-11.png" alt="Улица Баумана">
              </div>
              <div class="street__title h3">Баумана</div>
              <p class="street__txt">
                Почти всю улицу Баумана будут встречать вас наши волонтеры, которые помогут вам в ваших добрых делах
              </p>
            </div>

            <div class="street">
              <div class="street__img-wrapper">
                <img class="street__img " src="img/streets/full/street-22.png" alt="Улица Карима Тинчурина">
              </div>
              <div class="street__title h3">Карима Тинчурина</div>
              <p class="street__txt">
                Почти всю улицу Баумана будут встречать вас наши волонтеры, которые помогут вам в ваших добрых делах
              </p>
            </div>

            <div class="street">
              <div class="street__img-wrapper">
                <img class="street__img " src="img/streets/full/street-33.png" alt="Улица Большая Красная">
              </div>
              <div class="street__title h3">Большая красная</div>
              <p class="street__txt">
                Почти всю улицу Баумана будут встречать вас наши волонтеры, которые помогут вам в ваших добрых делах
              </p>
            </div>
          </div>
        </div>
      </section>

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
    </div>

    <div class="test-map" id="test-map" style="width: 100px;height: 100px; position: fixed; bottom: 0;right: 0;background: #ddd"></div>
  </div>
<style>
  body > .container {max-width: 100%;}
  /*#panel + .container {position: fixed;top: 0;z-index: 99999;}*/
  /*.header.fixed {width: 100%;position: relative;}*/
  .header.fixed {width: 100%;}
  .head_flex {max-width: 1440px;}
  @media screen and (min-width: 1455px) {
    .head_flex {
      max-width: 1296px;
    }
  }
  #chak-chak {overflow-x: hidden;}
</style>
<script type="text/javascript">
    /*document.querySelector('.root-item-selected').classList.add('root-item');
    document.querySelector('.root-item-selected').classList.remove('root-item-selected');*/
</script>
<script src="/culture-of-charity/shchedryy-shchak-shchak/assets/slick/slick.min.js"></script>
<script src="/culture-of-charity/shchedryy-shchak-shchak/bundle.js"></script>

  <script
          data-plugins="transform-modules-umd"
          data-presets="react, typescript"
          type="text/babel"
          src="map/common.ts"
  ></script>
  <script
          data-plugins="transform-modules-umd"
          data-presets="react, typescript"
          type="text/babel"
          src="map/variables.ts"
  ></script>
  <script
      data-plugins="transform-modules-umd"
      data-presets="react, typescript"
      type="text/babel"
      src="map/map-test.js"
  ></script>
<!--  <script data-plugins="transform-modules-umd" data-presets="typescript" type="text/babel">-->
<!--      import {FIRST_MARKER_PROPS, LOCATION, SECOND_MARKER_PROPS} from 'map/variables';-->
<!--      import {InfoMessage} from 'map/common';-->
<!---->
<!--      window.map = null;-->
<!---->
<!--      main();-->
<!--      async function main() {-->
<!--          // Waiting for all api elements to be loaded-->
<!--          await ymaps3.ready;-->
<!--          const {YMap, YMapDefaultSchemeLayer, YMapDefaultFeaturesLayer, YMapControls} = ymaps3;-->
<!---->
<!--          // Import the package to add a default marker-->
<!--          const {YMapDefaultMarker} = await ymaps3.import('@yandex/ymaps3-default-ui-theme');-->
<!---->
<!---->
<!--          let popupWithImage = null;-->
<!--          // let popupWithButtons = null;-->
<!---->
<!--          // // Create a custom popup-->
<!--          const PopupWithImage = () => {-->
<!--              const popupElement = document.createElement('div');-->
<!--              popupElement.classList.add('popup');-->
<!---->
<!--              const imageElement = document.createElement('img');-->
<!--              imageElement.src = 'img/streets/full/street-11.png';-->
<!--              imageElement.alt = 'waves';-->
<!--              imageElement.classList.add('popup-image');-->
<!---->
<!--              const popupContentElement = document.createElement('div');-->
<!--              popupContentElement.classList.add('popup__content');-->
<!---->
<!--              const popupElementText = document.createElement('div');-->
<!--              popupElementText.classList.add('popup__text');-->
<!---->
<!--              const popupElementTextTitle = document.createElement('div');-->
<!--              popupElementTextTitle.classList.add('popup__text_title');-->
<!--              popupElementTextTitle.textContent = 'Title of that pop up';-->
<!--              popupElementText.appendChild(popupElementTextTitle);-->
<!---->
<!--              const popupElementTextContent = document.createElement('div');-->
<!--              popupElementTextContent.classList.add('popup__text_content');-->
<!--              popupElementTextContent.textContent =-->
<!--                  'Some useful information about a place. You can add whatever you want: pictures, buttons, different headings.';-->
<!--              popupElementText.appendChild(popupElementTextContent);-->
<!---->
<!--              const buttonElement = document.createElement('button');-->
<!--              buttonElement.onclick = () => {-->
<!--                  popupWithImage.update({-->
<!--                      popup: {-->
<!--                          show: false-->
<!--                      }-->
<!--                  });-->
<!--              };-->
<!--              buttonElement.classList.add('button');-->
<!--              buttonElement.textContent = 'Close';-->
<!---->
<!--              popupContentElement.appendChild(imageElement);-->
<!--              popupContentElement.appendChild(popupElementText);-->
<!---->
<!--              popupElement.appendChild(popupContentElement);-->
<!--              popupElement.appendChild(buttonElement);-->
<!---->
<!--              return popupElement;-->
<!--          };-->
<!---->
<!--          // const PopupWithImageHtml = PopupWithImage();-->
<!---->
<!---->
<!--          // // Create a custom popup-->
<!--          // const PopupWithButtons = () => {-->
<!--          //     const popupElement = document.createElement('div');-->
<!--          //     popupElement.classList.add('popup', 'second_variant');-->
<!--          //-->
<!--          //     const popupElementText = document.createElement('div');-->
<!--          //     popupElementText.classList.add('popup__text');-->
<!--          //-->
<!--          //     const popupElementTextTitle = document.createElement('div');-->
<!--          //     popupElementTextTitle.classList.add('popup__text_title');-->
<!--          //     popupElementTextTitle.textContent = 'Title of that pop up';-->
<!--          //     popupElementText.appendChild(popupElementTextTitle);-->
<!--          //-->
<!--          //     const popupElementTextContent = document.createElement('div');-->
<!--          //     popupElementTextContent.classList.add('popup__text_content');-->
<!--          //     popupElementTextContent.textContent =-->
<!--          //         'Some useful information about a place. You can add whatever you want: pictures, buttons, different headings.';-->
<!--          //     popupElementText.appendChild(popupElementTextContent);-->
<!--          //-->
<!--          //     const popupButtonsElement = document.createElement('div');-->
<!--          //     popupButtonsElement.classList.add('popup__buttons');-->
<!--          //-->
<!--          //     const popupButtonsBlockElement = document.createElement('div');-->
<!--          //     popupButtonsBlockElement.classList.add('popup__buttons__block');-->
<!--          //-->
<!--          //     const buttonElementFirst = document.createElement('button');-->
<!--          //     buttonElementFirst.classList.add('button');-->
<!--          //     buttonElementFirst.textContent = 'Button 1';-->
<!--          //     buttonElementFirst.onclick = () => {-->
<!--          //         alert('Clicked!');-->
<!--          //     };-->
<!--          //-->
<!--          //     const buttonElementSecond = document.createElement('button');-->
<!--          //     buttonElementSecond.classList.add('button');-->
<!--          //     buttonElementSecond.textContent = 'Button 2';-->
<!--          //     buttonElementSecond.onclick = () => {-->
<!--          //         alert('Clicked!');-->
<!--          //     };-->
<!--          //-->
<!--          //     popupButtonsBlockElement.appendChild(buttonElementFirst);-->
<!--          //     popupButtonsBlockElement.appendChild(buttonElementSecond);-->
<!--          //-->
<!--          //     const buttonElement = document.createElement('button');-->
<!--          //     buttonElement.classList.add('button_close');-->
<!--          //     buttonElement.textContent = 'Primary Button';-->
<!--          //     buttonElement.onclick = () => {-->
<!--          //         alert('Clicked!');-->
<!--          //     };-->
<!--          //-->
<!--          //     const closeIconElement = document.createElement('button');-->
<!--          //     closeIconElement.classList.add('close_icon');-->
<!--          //     closeIconElement.onclick = () => {-->
<!--          //         popupWithButtons.update({-->
<!--          //             popup: {-->
<!--          //                 show: false-->
<!--          //             }-->
<!--          //         });-->
<!--          //     };-->
<!--          //-->
<!--          //     popupButtonsElement.appendChild(popupButtonsBlockElement);-->
<!--          //     popupButtonsElement.appendChild(buttonElement);-->
<!--          //-->
<!--          //     popupElement.appendChild(popupElementText);-->
<!--          //     popupElement.appendChild(popupButtonsElement);-->
<!--          //     popupElement.appendChild(closeIconElement);-->
<!--          //-->
<!--          //     return popupElement;-->
<!--          // };-->
<!---->
<!--          // Initialize the map-->
<!--          map = new YMap(-->
<!--              // Pass the link to the HTMLElement of the container-->
<!--              document.getElementById('test-map'),-->
<!--              // Pass the map initialization parameters-->
<!--              {location: LOCATION, showScaleInCopyrights: true},-->
<!--              [-->
<!--                  // Add a map scheme layer-->
<!--                  new YMapDefaultSchemeLayer({}),-->
<!--                  // Add a layer of geo objects to display the markers-->
<!--                  new YMapDefaultFeaturesLayer({})-->
<!--              ]-->
<!--          );-->
<!---->
<!---->
<!--          popupWithImage = new YMapDefaultMarker({-->
<!--              ...FIRST_MARKER_PROPS,-->
<!--              onClick() {-->
<!--                  popupWithImage.update({popup: {show: true}});-->
<!--              },-->
<!--              popup: {content: PopupWithImage, position: 'right'}-->
<!--          });-->
<!---->
<!--          // popupWithButtons = new YMapDefaultMarker({-->
<!--          //     ...SECOND_MARKER_PROPS,-->
<!--          //     onClick() {-->
<!--          //         popupWithButtons.update({popup: {show: true}});-->
<!--          //     },-->
<!--          //     popup: {content: PopupWithButtons, position: 'right'}-->
<!--          // });-->
<!---->
<!--          map-->
<!--              // Add a default marker with a popup window from the package to the map-->
<!--              .addChild(popupWithImage)-->
<!--          // .addChild(popupWithButtons);-->
<!---->
<!--          // console.log(PopupWithImageHtml)-->
<!--          // map.addChild(-->
<!--          //     // Using YMapControls you can change the position of the control-->
<!--          //     new YMapControls({position: 'top right'})-->
<!--          //         // Add the geolocation control to the map-->
<!--          //         .addChild(-->
<!--          //             new InfoMessage({-->
<!--          //                 text: 'Click on markers'-->
<!--          //                 // text: '<h1>dsds</h1>'-->
<!--          //                 // text: PopupWithImageHtml-->
<!--          //             })-->
<!--          //         )-->
<!--          // );-->
<!--      }-->
<!--  </script>-->
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>