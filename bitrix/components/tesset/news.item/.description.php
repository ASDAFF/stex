<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => "Новость детально.",
	"DESCRIPTION" => "Новость детально",
	"CACHE_PATH" => "Y",
	"SORT" => 30,
	"PATH" => array(
		"ID" => "tesset",
		"CHILD" => array(
			"ID" => "tesset",
			"NAME" => "Новость детально",
			"SORT" => 30,
			"CHILD" => array(
				"ID" => "tesset_cart",
			),
		),
	),
);
?>