<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Context,
    Bitrix\Main\Type\DateTime,
    Bitrix\Main\Loader,
    Bitrix\Iblock;

\Bitrix\Main\Loader::includeModule('iblock');

CPageOption::SetOptionString("main", "nav_page_in_session", "N");

if(!isset($arParams["CACHE_TIME"]))
    $arParams["CACHE_TIME"] = 36000000;

$arParams["IBLOCK_TYPE"] = trim($arParams["IBLOCK_TYPE"]);

$arParams["ELEMENT_ID"] = intval($arParams["~ELEMENT_ID"]);
if($arParams["ELEMENT_ID"] > 0 && $arParams["ELEMENT_ID"]."" != $arParams["~ELEMENT_ID"])
{
    Iblock\Component\Tools::process404(
        trim($arParams["MESSAGE_404"]) ?: GetMessage("GALLERY_DETAIL_INFO"),
        true,
        $arParams["SET_STATUS_404"] === "Y",
        $arParams["SHOW_404"] === "Y",
        $arParams["FILE_404"]
    );
    return;
}

if(!is_array($arParams["FIELD_CODE"]))
	$arParams["FIELD_CODE"] = array();
foreach($arParams["FIELD_CODE"] as $key=>$val)
	if(!$val)
		unset($arParams["FIELD_CODE"][$key]);
if(!is_array($arParams["PROPERTY_CODE"]))
	$arParams["PROPERTY_CODE"] = array();
foreach($arParams["PROPERTY_CODE"] as $k=>$v)
	if($v==="")
		unset($arParams["PROPERTY_CODE"][$k]);

$arParams["STRICT_SECTION_CHECK"] = (isset($arParams["STRICT_SECTION_CHECK"]) && $arParams["STRICT_SECTION_CHECK"] === "Y");


if($this->startResultCache(false, array()))
{

	if(!Loader::includeModule("iblock"))
	{
		$this->abortResultCache();
		ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
		return;
	}

	$arFilter = array(
		"IBLOCK_LID" => SITE_ID,
		"IBLOCK_ACTIVE" => "Y",
		"ACTIVE" => "Y",
		"CHECK_PERMISSIONS" => "Y",
	);

	if(intval($arParams["IBLOCK_ID"]) > 0)
		$arFilter["IBLOCK_ID"] = $arParams["IBLOCK_ID"];
	else
		$arFilter["=IBLOCK_TYPE"] = $arParams["IBLOCK_TYPE"];

	//Handle case when ELEMENT_CODE used
	if($arParams["ELEMENT_ID"] <= 0)
		$arParams["ELEMENT_ID"] = CIBlockFindTools::GetElementID(
			$arParams["ELEMENT_ID"],
			$arParams["~ELEMENT_CODE"],
			$arParams["STRICT_SECTION_CHECK"]? $arParams["SECTION_ID"]: false,
			$arParams["STRICT_SECTION_CHECK"]? $arParams["~SECTION_CODE"]: false,
			$arFilter
		);

	if ($arParams["STRICT_SECTION_CHECK"])
	{
		if ($arParams["SECTION_ID"] > 0)
		{
			$arFilter["SECTION_ID"] = $arParams["SECTION_ID"];
		}
		elseif ($arParams["~SECTION_CODE"] <> '')
		{
			$arFilter["SECTION_CODE"] = $arParams["~SECTION_CODE"];
		}
	}

// Получаем пользовательские свойства инфоблока
$customProps = CIBlockProperty::GetList(Array("SORT" => "ASC", "NAME" => "ASC"), Array("ACTIVE" => "Y", "IBLOCK_ID" => $arParams["IBLOCK_ID"]));

$customPropsList = array();
while ($prop = $customProps->GetNext()) {
    $customPropsList[] = "PROPERTY_" . $prop["CODE"];
}

$arSelect = array_merge($arParams["FIELD_CODE"], array(
    "ID",
    "NAME",
    "IBLOCK_ID",
    "IBLOCK_SECTION_ID",
    "DETAIL_TEXT",
    "DETAIL_TEXT_TYPE",
    "PREVIEW_TEXT",
    "PREVIEW_TEXT_TYPE",
    "PREVIEW_PICTURE",
    "DETAIL_PICTURE"
), $customPropsList);

	$bGetProperty = count($arParams["PROPERTY_CODE"]) > 0;

	if($bGetProperty)
		$arSelect[]="PROPERTY_*";

	$arFilter["ID"] = $arParams["ELEMENT_ID"];

	$rsElement = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
	
	if($obElement = $rsElement->GetNextElement())
	{
		$arResult = $obElement->GetFields();

		$ipropValues = new Iblock\InheritedProperty\ElementValues($arResult["IBLOCK_ID"], $arResult["ID"]);

		$arResult["IPROPERTY_VALUES"] = $ipropValues->getValues();

		Iblock\Component\Tools::getFieldImageData(
			$arResult,
			array('PREVIEW_PICTURE', 'DETAIL_PICTURE'),
			Iblock\Component\Tools::IPROPERTY_ENTITY_ELEMENT,
			'IPROPERTY_VALUES'
		);

		// Проверка активных полей
		$arResult["FIELDS"] = array();
		foreach($arParams["FIELD_CODE"] as $code)
			if(array_key_exists($code, $arResult))
				$arResult["FIELDS"][$code] = $arResult[$code];

		// Перечитка свойств элемента
		if($bGetProperty)
			$arResult["PROPERTIES"] = $obElement->GetProperties();
		$arResult["DISPLAY_PROPERTIES"]=array();
		foreach($arParams["PROPERTY_CODE"] as $pid)
		{
			$prop = &$arResult["PROPERTIES"][$pid];
			if(
				(is_array($prop["VALUE"]) && count($prop["VALUE"])>0)
				|| (!is_array($prop["VALUE"]) && $prop["VALUE"] <> '')
			)
			{
				$arResult["DISPLAY_PROPERTIES"][$pid] = CIBlockFormatProperties::GetDisplayValue($arResult, $prop, "news_out");
			}
		}

		// Проверка на ID и Тип
		$arResult["IBLOCK"] = GetIBlock($arResult["IBLOCK_ID"], $arResult["IBLOCK_TYPE"]);

		$arResult["SECTION"] = array("PATH" => array());
		//$arResult["SECTION_URL"] = "";

		$resultCacheKeys = array(
			"ID",
			"IBLOCK_ID",
			"NAME",
			"IBLOCK_SECTION_ID",
			"IBLOCK",
			"SECTION",
			"IPROPERTY_VALUES",
		);

		$this->setResultCacheKeys($resultCacheKeys);

		$this->includeComponentTemplate();
	}
	else
	{
		$this->abortResultCache();
		Iblock\Component\Tools::process404(
			trim($arParams["MESSAGE_404"]) ?: GetMessage("GALLERY_DETAIL_INFO")
			,true
			,$arParams["SET_STATUS_404"] === "Y"
			,$arParams["SHOW_404"] === "Y"
			,$arParams["FILE_404"]
		);
	}
}
