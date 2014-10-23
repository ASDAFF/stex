<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => "Карточка товара.",
	"DESCRIPTION" => "Карточка товара",
	"CACHE_PATH" => "Y",
	"SORT" => 30,
	"PATH" => array(
		"ID" => "tesset",
		"CHILD" => array(
			"ID" => "tesset",
			"NAME" => "Карточка товара",
			"SORT" => 30,
			"CHILD" => array(
				"ID" => "tesset_cart",
			),
		),
	),
);
?>