<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => "Подбор ковриков.",
	"DESCRIPTION" => "Подбор ковриков",
	"CACHE_PATH" => "Y",
	"SORT" => 30,
	"PATH" => array(
		"ID" => "tesset",
		"CHILD" => array(
			"ID" => "tesset",
			"NAME" => "Подбор ковриков",
			"SORT" => 30,
			"CHILD" => array(
				"ID" => "tesset_filter",
			),
		),
	),
);
?>