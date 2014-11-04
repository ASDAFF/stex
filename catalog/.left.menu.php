<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION;
CModule::IncludeModule('iblock');

global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent(
    "bitrix:menu.sections",
    "",
    Array(
        "IBLOCK_TYPE" => "catalog", 
        "IBLOCK_ID" => "9", 
        // "SECTION_URL" => "/e-store/books/index.php?SECTION_ID=#ID#", 
        "CACHE_TIME" => "3600" 
    )
);

$aMenuLinksExt[] = Array(
	"Весь каталог", 
	"/catalog/", 
	Array(), 
	Array('IS_PARENT' => false, 'DEPTH_LEVEL' => 2), 
	"" 
);

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
