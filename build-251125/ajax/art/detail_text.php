<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");


if(isset($_GET['id']) && intval($_GET['id']) > 0) {
    $id = intval($_GET['id']);

    CModule::IncludeModule("iblock");

    // Получаем элемент по ID
    $res = CIBlockElement::GetByID($id);
    if($ar_res = $res->GetNext()) {
        echo $ar_res['DETAIL_TEXT'];
    }

    // Получаем свойство VIDEO
    $propertyRes = CIBlockElement::GetProperty($ar_res['IBLOCK_ID'], $id, array(), array("CODE" => "VIDEO"));
    while ($prop = $propertyRes->Fetch()) {
        if ($prop['VALUE']) {
            echo $prop['VALUE'];
        }
    }
}

?>
