<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if(!CModule::IncludeModule("iblock")) die();

$id = intval($_POST['ID'] ?? 0);
if($id <= 0) die('Неверный ID');

$arSelect = ['ID', 'NAME', 'PREVIEW_TEXT', 'DETAIL_TEXT',  'PREVIEW_PICTURE', 'DETAIL_PICTURE', 'PROPERTY_MODAL_TITLE_EVENT', 'PROPERTY_DATE_EVENT', 'PROPERTY_TIME_EVENT', 'PROPERTY_ADDRESS_EVENT', 'PROPERTY_MAP_COORDS_EVENT', 'PROPERTY_TEST_COORDS_EVENT']; // Настройте под свои поля
$arFilter = ['IBLOCK_ID'=>25, 'ID'=>$id];
$res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
if($arItem = $res->GetNext())
{

  $pictureId = !empty($arItem['DETAIL_PICTURE']) ? $arItem['DETAIL_PICTURE'] : $arItem['PREVIEW_PICTURE'];
  $imgSrc = '';

  if ($pictureId) {
    $imgSrc = CFile::GetPath($pictureId); // Получить ссылку на картинку по ID
  }


  // Формируем HTML модального окна, например:
  ?>

  <div class="map-popup__event" data-nko-id="<?=htmlspecialchars($arItem['ID'])?>">
    <div class="map-popup__title">

      <?if( $arItem['PROPERTY_MODAL_TITLE_EVENT_VALUE']['TEXT'] != ''):?>
        <?=$arItem['PROPERTY_MODAL_TITLE_EVENT_VALUE']['TEXT']?>
      <?else: ?>
        <?=($arItem['PREVIEW_TEXT'])?>
      <?endif;?>

      <p><?=htmlspecialchars($arItem['NAME'])?></p>
    </div>

    <div class="map-popup__info">
      <div class="map-popup__info-img-wrap">
        <img class="map-popup__info-img" src="<?= htmlspecialchars($imgSrc) ?>" alt="<?=htmlspecialchars($arItem['NAME'])?>">
      </div>
      <div class="map-popup__info-text">
        <?if( $arItem['PROPERTY_DATE_EVENT_VALUE']['TEXT'] != ''):?>
          <div>Когда: <span><?=$arItem['PROPERTY_DATE_EVENT_VALUE']['TEXT']?></span></div>
        <?endif;?>

        <?if( $arItem['PROPERTY_TIME_EVENT_VALUE']['TEXT'] != ''):?>
          <div>Во сколько: <span><?=$arItem['PROPERTY_TIME_EVENT_VALUE']['TEXT']?></span></div>
        <?endif;?>

        <?if( $arItem['PROPERTY_ADDRESS_EVENT_VALUE']['TEXT'] != ''):?>
          <div>Адрес: <span><?= $arItem['PROPERTY_ADDRESS_EVENT_VALUE']['TEXT']?></span></div>
        <?endif;?>

        <?if( $arItem['PROPERTY_MAP_COORDS_EVENT_VALUE']['TEXT'] != ''):?>
          <div>Координаты: <span><?= $arItem['PROPERTY_MAP_COORDS_EVENT_VALUE']['TEXT']?></span></div>
        <?endif;?>

        <?if( $arItem['PROPERTY_TEST_COORDS_EVENT_VALUE'] != ''):?>
          <div>Авто Координаты: <span><?= $arItem['PROPERTY_TEST_COORDS_EVENT_VALUE']?></span></div>
        <?endif;?>

      </div>
    </div>

    <div class="map-popup__text">
      <div class="map-popup__text-content">
        <?=$arItem['DETAIL_TEXT']?>
      </div>
    </div>
  </div>

  <?
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
