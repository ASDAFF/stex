<?include $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include.php';?>

<?
CModule::IncludeModule('iblock');


$APPLICATION->IncludeComponent('tesset:catalog.filter', '', []);