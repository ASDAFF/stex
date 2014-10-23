<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => "Список категорий.",
	"DESCRIPTION" => "Список категорий",
	"CACHE_PATH" => "Y",
	"SORT" => 30,
	"PATH" => array(
		"ID" => "tesset",
		"CHILD" => array(
			"ID" => "tesset",
			"NAME" => "Список категорий",
			"SORT" => 30,
			"CHILD" => array(
				"ID" => "tesset_section_list",
			),
		),
	),
);
?>