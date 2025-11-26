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

  <section class="section--books container">
    <h3 class="section__title section__title--warm animate__animated">Щедрый бизнес</h3>
    <div class="books">
      <div class="books__inner">
        <div class="book-carousel" id="book-carousel">
          <?foreach ($arResult["ITEMS"] as $arItem):?>
            <div class="book-carousel__slide" data-id="<?=$arItem['ID']?>">
				<div class="book-carousel__slide-inner">
					<div class="media media--main">
					  <div class="media__block">
						<div class="media__img-wrapper">
							<?if($arItem["PREVIEW_PICTURE"]["SRC"]):?>
							  <img class="media__img" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>">
							<?endif;?>
						</div>
						<div class="media__txt-wrapper">
						  <h4 class="media__title"><?=$arItem["NAME"]?></h4>
						  <div class="media__txt"><?= ($arItem["PREVIEW_TEXT"]) ?></div>
						</div>
					  </div>
					</div>
				</div>
            </div>
          <?endforeach;?>
        </div>
      </div>
    </div>
  </section>

