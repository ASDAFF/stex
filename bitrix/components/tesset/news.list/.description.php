<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => "Список новостей.",
	"DESCRIPTION" => "Список новостей",
	"CACHE_PATH" => "Y",
	"SORT" => 30,
	"PATH" => array(
		"ID" => "tesset",
		"CHILD" => array(
			"ID" => "tesset",
			"NAME" => "Список новостей",
			"SORT" => 30,
			"CHILD" => array(
				"ID" => "tesset_news",
			),
		),
	),
);
?>