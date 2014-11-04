<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/press-center/exibitions/([^\\/]*)/.*#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "",
		"PATH" => "/press-center/exibitions/item.php",
	),
	array(
		"CONDITION" => "#^/press-center/news/([^\\/]*)/.*#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "",
		"PATH" => "/press-center/news/item.php",
	),
	array(
		"CONDITION" => "#^/catalog/([^\\/]*)/([^\\/]*)/.*#",
		"RULE" => "SECTION_CODE=\$1&ELEMENT_CODE=\$2",
		"ID" => "",
		"PATH" => "/catalog/item.php",
	),
	array(
		"CONDITION" => "#^/catalog/([^\\/]*)/.*#",
		"RULE" => "SECTION_CODE=\$1",
		"ID" => "",
		"PATH" => "/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/communication/forum/#",
		"RULE" => "",
		"ID" => "bitrix:forum",
		"PATH" => "/communication/forum/index.php",
	),
	array(
		"CONDITION" => "#^/communication/blog/#",
		"RULE" => "",
		"ID" => "bitrix:blog",
		"PATH" => "/communication/blog/index.php",
	),
	array(
		"CONDITION" => "#^/content/gallery/#",
		"RULE" => "",
		"ID" => "bitrix:photogallery_user",
		"PATH" => "/content/gallery/index.php",
	),
	array(
		"CONDITION" => "#^/personal/lists/#",
		"RULE" => "",
		"ID" => "bitrix:lists",
		"PATH" => "/personal/lists/index.php",
	),
	array(
		"CONDITION" => "#^/content/photo/#",
		"RULE" => "",
		"ID" => "bitrix:photogallery",
		"PATH" => "/content/photo/index.php",
	),
	array(
		"CONDITION" => "#^/club/gallery/#",
		"RULE" => "",
		"ID" => "bitrix:photogallery_user",
		"PATH" => "/club/gallery/index.php",
	),
	array(
		"CONDITION" => "#^/content/idea/#",
		"RULE" => "",
		"ID" => "bitrix:idea",
		"PATH" => "/content/idea/index.php",
	),
	array(
		"CONDITION" => "#^/club/forum/#",
		"RULE" => "",
		"ID" => "bitrix:forum",
		"PATH" => "/club/forum/index.php",
	),
	array(
		"CONDITION" => "#^/club/#",
		"RULE" => "",
		"ID" => "bitrix:socialnetwork",
		"PATH" => "/club/index.php",
	),
);

?>