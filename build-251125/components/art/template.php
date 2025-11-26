<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="background-white">
  <section class="section--art container">
    <h3 class="section__title animate__animated">Щедрый арт</h3>
    <div class="art">
      <div class="art__inner">
        <div class="art-carousel" id="art-carousel">
          <?foreach ($arResult["ITEMS"] as $arItem):?>
            <div class="art-carousel__slide slide js-open-modal" 
                 data-id="<?=$arItem['ID']?>">
              <div class="art-carousel__slide-img-wrap slide-img-wrap">
                <?if($arItem["PREVIEW_PICTURE"]["SRC"]):?>
                  <img class="art-carousel__slide-img slide-img" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="art-11">
                <?endif;?>
              </div>
              <div class="art-carousel__slide-info slide-info">
                <p class="slide-title"><?=$arItem["NAME"]?></p>
                <p class="slide-txt"><?= strip_tags($arItem["PREVIEW_TEXT"]) ?></p>
              </div>
            </div>
          <?endforeach;?>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- Модальное окно -->
<div class="modal" id="modal">
  <div class="modal-content">
    <button class="map-popup__close" id="modal-close">Закрыть</button>
    <div id="modal-body">
      <!-- Сюда будет динамически вставляться весь HTML с сервера -->
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const modal = document.getElementById('modal');
  const modalBody = document.getElementById('modal-body');
  const modalClose = document.getElementById('modal-close');

  document.querySelectorAll('.js-open-modal').forEach(function(el) {
    el.addEventListener('click', function() {
      const id = this.getAttribute('data-id');

      // Очистка содержимого перед загрузкой нового
      modalBody.innerHTML = '';

      fetch('/ajax/art/detail_text.php?id=' + encodeURIComponent(id))
        .then(response => {
          if (!response.ok) throw new Error(`Ошибка сети: ${response.status}`);
          return response.text();
        })
        .then(html => {
          modalBody.innerHTML = html;
          modal.classList.add('show');
        })
        .catch(error => {
          console.error('Ошибка загрузки:', error);
          alert('Не удалось загрузить данные. Попробуйте позже.');
        });
    });
  });

  function closeModal() {
    modal.classList.remove('show');
    modalBody.innerHTML = '';
  }

  if (modalClose) {
    modalClose.addEventListener('click', closeModal);
  }

  window.addEventListener('click', function(e) {
    if (e.target === modal) {
      closeModal();
    }
  });
});
</script>