<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (!CModule::IncludeModule("iblock")) {
    return;
}

$arTypes = CIBlockParameters::GetIBlockTypes();

$arIBlocks = array();
$rsIBlocks = CIBlock::GetList(array("SORT" => "ASC"), array("SITE_ID" => $_REQUEST["site"], "TYPE" => ($arCurrentValues["IBLOCK_TYPE"] != "-" ? $arCurrentValues["IBLOCK_TYPE"] : "")));
while ($arIBlock = $rsIBlocks->Fetch()) {
    $arIBlocks[$arIBlock["ID"]] = "[" . $arIBlock["ID"] . "] " . $arIBlock["NAME"];
}

// Получение элементов выбранного инфоблока
$arElements = array();
if (isset($arCurrentValues["IBLOCK_ID"]) && !empty($arCurrentValues["IBLOCK_ID"])) {
    $arFilter = array(
        "IBLOCK_ID" => $arCurrentValues["IBLOCK_ID"],
        "ACTIVE" => "Y",
    );

    $arSelect = array(
        "ID",
        "NAME",
        "PREVIEW_TEXT",
        "DETAIL_PAGE_URL",
    );

    $rsElements = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);

    while ($arElement = $rsElements->Fetch()) {
        $arElements[] = $arElement;
    }
}

$arComponentParameters = array(

	"PARAMETERS" => array(

		"IBLOCK_TYPE" => array(
			"PARENT" => "BASE",
			"NAME" => "Выберите тип инфоблока",
			"TYPE" => "LIST",
			"VALUES" => $arTypes,
			"DEFAULT" => "",
			"REFRESH" => "Y",
		),

		"IBLOCK_ID" => array(
			"PARENT" => "BASE",
			"NAME" => "Выберите инфоблок для выборки данных",
			"TYPE" => "LIST",
			"VALUES" => $arIBlocks,
			"DEFAULT" => "",
			"ADDITIONAL_VALUES" => "Y",
			"REFRESH" => "Y",
		),

		"ELEMENT_ID" => array(
            "PARENT" => "BASE",
            "NAME" => "Выберите элемент инфоблока",
            "TYPE" => "LIST",
            "VALUES" => array_column($arElements, "NAME", "ID"),
            "DEFAULT" => "",
            "ADDITIONAL_VALUES" => "Y",
        ),

		// настройки кэширования
			"CACHE_TIME"  =>  array(
			"DEFAULT"=>3600
		),
		
		"CACHE_GROUPS" => array(
			"PARENT" => "CACHE_SETTINGS",
			"NAME" => "Учитывать права доступа",
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N",
		),

		/* Если нужен вывод по символьному коду
		"ELEMENT_CODE" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("CP_BND_ELEMENT_CODE"),
			"TYPE" => "STRING",
			"DEFAULT" => "",
		),

		// Если нужны дополнительные поля
		"FIELD_CODE" => array(
			"PARENT" => "DATA_SOURCE",
			"NAME" => "Выберите нужные поля",
			"MULTIPLE" => "Y",
			"TYPE"      =>  "LIST",
			"VALUES"    =>  array(
				"NAME" => "Название элемента",
			),
		),
		*/	

		/*"PROPERTY_CODE" => array(
			"PARENT" => "DATA_SOURCE",
			"NAME" => GetMessage("T_IBLOCK_PROPERTY"),
			"TYPE" => "LIST",
			"MULTIPLE" => "Y",
			"VALUES" => $arProperty_LNS,
			"ADDITIONAL_VALUES" => "Y",
			"DEFAULT" => "MORE_PHOTO",
		),*/

		"CACHE_TIME"  =>  array("DEFAULT"=>36000000),
	),
);