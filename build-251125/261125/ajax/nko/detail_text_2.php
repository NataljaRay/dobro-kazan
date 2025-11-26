<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if(!CModule::IncludeModule("iblock")) die();

$id = intval($_POST['ID'] ?? 0);
if($id <= 0) die('Неверный ID');

$arSelect = ['ID', 'NAME', 'PREVIEW_TEXT', 'DETAIL_TEXT',  'PREVIEW_PICTURE', 'DETAIL_PICTURE', 'DATE_EVENT', 'PROPERTY_TIME_EVENT', 'PROPERTY_ADDRESS_EVENT', 'PROPERTY_MAP_COORDS_EVENT']; // Настройте под свои поля
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
      <?=$arItem['DATE_EVENT']['TEXT']?>
      <p><?=htmlspecialchars($arItem['NAME'])?></p>
    </div>

    <div class="map-popup__info">
      <div class="map-popup__info-img-wrap">
        <img class="map-popup__info-img" src="<?= htmlspecialchars($imgSrc) ?>" alt="<?=htmlspecialchars($arItem['NAME'])?>">
      </div>
      <div class="map-popup__info-text">
        <?if( $arItem['DATE_EVENT']['TEXT'] != ''):?>
          <div>Когда: <span><?=$arItem['DATE_EVENT']['TEXT']?></span></div>
        <?endif;?>

        <?if( $arItem['PROPERTY_TIME_EVENT']['TEXT'] != ''):?>
          <div>Во сколько: <span><?=$arItem['PROPERTY_TIME_EVENT']['TEXT']?></span></div>
        <?endif;?>

        <?if( $arItem['PROPERTY_ADDRESS_EVENT']['TEXT'] != ''):?>
          <div>Адрес: <span><?=$arItem['PROPERTY_ADDRESS_EVENT']['TEXT']?></span></div>
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
