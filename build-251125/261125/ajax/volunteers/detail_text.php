<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if(!CModule::IncludeModule("iblock")) die();

$id = intval($_POST['ID'] ?? 0);
if($id <= 0) die('Неверный ID');

$arSelect = ['ID', 'NAME', 'PREVIEW_TEXT', 'DETAIL_TEXT',  'PREVIEW_PICTURE', 'DETAIL_PICTURE', 'PROPERTY_SUBTITLE', 'PROPERTY_WHERE', 'PROPERTY_TIME', 'PROPERTY_ADDRESS']; // Настройте под свои поля
$arFilter = ['IBLOCK_ID'=>27, 'ID'=>$id];
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
<div id="slide-popup" class="map-popup">
    <div class="map-popup__content">
        <div class="map-popup__list">
            <div class="map-popup__event" data-volunteers-id="<?=htmlspecialchars($arItem['ID'])?>">
              <div class="map-popup__title">
                <?=htmlspecialchars($arItem['NAME'])?>
                <p><?=$arItem['PROPERTY_SUBTITLE_VALUE']['TEXT']?></p>
              </div>

              <div class="map-popup__info">
                  <div class="map-popup__info-img-wrap">
                      <img class="map-popup__info-img" src="<?= htmlspecialchars($imgSrc) ?>" alt="Эльвира Валеева">
                  </div>
                  <div class="map-popup__info-text">
                    <?if( $arItem['PROPERTY_WHERE_VALUE']['TEXT'] != ''):?>
                    <div>Когда: <span style="font-weight: bold;"><?=$arItem['PROPERTY_WHERE_VALUE']['TEXT']?></span></div>
                    <?endif;?>

                    <?if( $arItem['PROPERTY_TIME_VALUE']['TEXT'] != ''):?>
                    <div>Во сколько: <span style="font-weight: bold;"><?=$arItem['PROPERTY_TIME_VALUE']['TEXT']?></span></div>
                    <?endif;?>

                    <?if( $arItem['PROPERTY_ADDRESS_VALUE']['TEXT'] != ''):?>
                    <div>Адрес: <span style="font-weight: bold;"><?=$arItem['PROPERTY_ADDRESS_VALUE']['TEXT']?></span></div>
                    <?endif;?>
                  </div>
              </div>

              <div class="map-popup__text">
                <div class="map-popup__text-content">
                  <?=$arItem['DETAIL_TEXT']?>
                </div>
              </div>
          </div>
        </div>
        <button class="map-popup__close">Закрыть</button>
    </div>
</div>


<div class="map-popup__event" data-volunteers-id="<?=htmlspecialchars($arItem['ID'])?>">
          <div class="map-popup__title">
            <?=htmlspecialchars($arItem['NAME'])?>
            <p><?=$arItem['PROPERTY_SUBTITLE_VALUE']['TEXT']?></p>
          </div>

          <div class="map-popup__info">
            <div class="map-popup__info-img-wrap">
              <img class="map-popup__info-img" src="<?= htmlspecialchars($imgSrc) ?>" alt="Эльвира Валеева">
            </div>
            <div class="map-popup__info-text">
              <?if( $arItem['PROPERTY_WHERE_VALUE']['TEXT'] != ''):?>
                <div>Когда: <span><?=$arItem['PROPERTY_WHERE_VALUE']['TEXT']?></span></div>
              <?endif;?>

              <?if( $arItem['PROPERTY_TIME_VALUE']['TEXT'] != ''):?>
                <div>Во сколько: <span><?=$arItem['PROPERTY_TIME_VALUE']['TEXT']?></span></div>
              <?endif;?>

              <?if( $arItem['PROPERTY_ADDRESS_VALUE']['TEXT'] != ''):?>
                <div>Адрес: <span><?=$arItem['PROPERTY_ADDRESS_VALUE']['TEXT']?></span></div>
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
