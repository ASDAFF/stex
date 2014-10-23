<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => "Список товаров с фильтром.",
	"DESCRIPTION" => "Список товаров с фильтром",
	"CACHE_PATH" => "Y",
	"SORT" => 30,
	"PATH" => array(
		"ID" => "tesset",
		"CHILD" => array(
			"ID" => "tesset",
			"NAME" => "Список товаров с фильтром",
			"SORT" => 30,
			"CHILD" => array(
				"ID" => "tesset_catalog_list",
			),
		),
	),
);
?>