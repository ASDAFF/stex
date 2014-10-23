<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION;
CModule::IncludeModule('iblock');

$aMenuLinksExt=$APPLICATION->IncludeComponent("bitrix:menu.sections", "", array(
"IBLOCK_TYPE_ID" => "catalog",
"CACHE_TYPE" => "A",
"CACHE_TIME" => "36000000"
) ,
false,
Array('HIDE_ICONS' => 'Y')
);

// echo '<pre>';
// print_r($aMenuLinks);
// die();

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>