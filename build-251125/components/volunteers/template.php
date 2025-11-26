<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$this->setFrameMode(true);
?>
<section class="section--volunteers container">
  <h3 class="section__title section__title--cold animate__animated animate__fadeInUp">Щедрые <br>волонтеры</h3>
  <div class="volunteers">
    <div class="volunteers__inner">
      <div class="guides-carousel" id="volunteers-carousel">
        <?php foreach($arResult["ITEMS"] as $arItem): ?>
          <div class="guides-carousel__slide slide" data-id="<?= $arItem['ID'] ?>">
            <div class="guides-carousel__slide-inner">
              <div class="guides-carousel__slide-img-wrap slide-img-wrap">
			  <a href="#" class="open-modal-link" data-id="<?= $arItem['ID'] ?>">
                <img class="guides-carousel__slide-img slide-img" src="<?= htmlspecialchars($arItem["PREVIEW_PICTURE"]["SRC"]) ?>" alt="Изображение">
				</a>
              </div>
              <div class="guides-carousel__slide-info slide-info">
                <p class="slide-title">
				  <a href="#" class="open-modal-link" data-id="<?= $arItem['ID'] ?>">
					<?= htmlspecialchars($arItem["NAME"]) ?>
				  </a>
				</p>

                <p class="slide-txt"><?= strip_tags($arItem["PREVIEW_TEXT"]) ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- Контейнер для вставки содержимого модального окна -->
<div id="volunteer-modal-container"></div>

<style>
#volunteer-modal-container {
display:none;
  position: fixed;       /* фиксированное позиционирование относительно окна */
  top: 50%;              /* сдвинуть вниз на 50% окна */
  left: 50%;             /* сдвинуть вправо на 50% окна */
  transform: translate(-50%, -50%); /* сдвинуть на половину своих размеров назад для точного центра */
  z-index: 9999999;         /* поверх другого контента */
  background: white;     /* можно сделать фон */
  padding: 20px;         /* внутренние отступы */
  box-shadow: 0 0 15px rgba(0,0,0,0.5); /* тень для выделения */
  max-width: 100vw;       /* максимальная ширина */
  max-height: 100vh;      /* максимальная высота */
  overflow: auto;        /* скролл при переполнении */
  border-radius: 6px;    /* скругленные края */
}

</style>

<script>
document.querySelectorAll('.open-modal-link').forEach(function(link){
  link.addEventListener('click', function(e){
    e.preventDefault();
    var id = this.getAttribute('data-id');

    BX.ajax({
      url: '/ajax/volunteers/detail_text.php',
      method: 'POST',
      data: {ID: id},
      dataType: 'html',
      onsuccess: function(data) {
		  var container = document.getElementById('volunteer-modal-container');
		  container.innerHTML = data;
		  container.style.display = 'block';  // показать окно
        var container = document.getElementById('volunteer-modal-container');
        container.innerHTML = data; // Вставляем html в div с центровкой
        // Здесь можно вызвать логику открытия модального окна, если нужно
      },
      onfailure: function() {
        alert('Ошибка загрузки данных');
      }
    });
  });
});
document.addEventListener('click', function(event) {
  if (event.target.classList.contains('map-popup__close')) {
    var modal = document.getElementById('volunteer-modal-container');
    if (modal) {
      modal.style.display = 'none'; // скрываем модальное окно
      modal.innerHTML = ''; // очищаем содержимое, если нужно
    }
  }
});

</script>
