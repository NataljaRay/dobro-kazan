<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$this->setFrameMode(true);
?>
<section class="section--nko container">
  <h3 class="section__title section__title--white animate__animated">Щедрые НКО</h3>
  <div class="guides nko">
    <div class="guides__inner">
      <div class="guides-carousel" id="nko-carousel">
        <?php foreach($arResult["ITEMS"] as $arItem): ?>
          <div class="guides-carousel__slide slide">
            <div class="guides-carousel__slide-inner open-modal-link-nko" data-event-id="1" data-id="<?= $arItem['ID'] ?>">
              <div class="guides-carousel__slide-img-wrap slide-img-wrap">
                <img class="guides-carousel__slide-img slide-img" src="<?= htmlspecialchars($arItem["PREVIEW_PICTURE"]["SRC"]) ?>" alt="<?= htmlspecialchars($arItem["NAME"]) ?>">
              </div>
              <div class="guides-carousel__slide-info slide-info">
                <p class="slide-title"><?= htmlspecialchars($arItem["NAME"]) ?></p>
                <div class="slide-txt-container">
                  <p class="slide-txt">
                    <?= ($arItem["PREVIEW_TEXT"]) ?>
                  </p>
                  <p class="slide-txt">
                    <?= ($arItem["PROPERTIES"]["DATE_EVENT"]["VALUE"]["TEXT"]) ?>
                  </p>
                  <p class="slide-txt">
                    <?= ($arItem["PROPERTIES"]["ADDRESS_EVENT"]["VALUE"]["TEXT"]) ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const html = document.querySelector('html');

        // Находим элементы попапа для слайдов
        const slidePopupWrapper = document.querySelector('.slide-popup-wrapper');
        const slidePopup = document.getElementById('slide-popup');
        const slidePopupContent = slidePopup.querySelector('.map-popup__content');
        const slidePopupList = slidePopup.querySelector('.map-popup__list');
        const slidePopupClose = slidePopup.querySelector('.map-popup__close');


        document.querySelectorAll('.open-modal-link-nko').forEach(function(link){
            link.addEventListener('click', function(e){
                e.preventDefault();
                var id = this.getAttribute('data-id');

                BX.ajax({
                    url: '/ajax/nko/detail_text.php',
                    method: 'POST',
                    data: {ID: id},
                    dataType: 'html',
                    onsuccess: function(data) {

                        slidePopupList.innerHTML = data;

                        setTimeout(function () {
                            html.classList.add('is-lock');
                            slidePopupWrapper.classList.remove('slide-popup-wrapper--hidden');
                        }, 200);
                        setTimeout(function () {
                            slidePopup.classList.remove('map-popup--hidden');
                        }, 300);
                        slidePopupContent.scrollTop = 0;

                    },
                    onfailure: function() {
                        alert('Ошибка загрузки данных');
                    }
                });
            });
        });


        // Закрытие попапа
        slidePopupClose.addEventListener('click', () => {
            slidePopupList.innerHTML = ''; // очищаем содержимое
        });
        document.body.addEventListener('click', () => {
            slidePopupList.innerHTML = ''; // очищаем содержимое
        });

    });

</script>