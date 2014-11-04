<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

CBitrixComponent::includeComponentClass("component.model:item");

/**
* News list
* 
* @author Roman Morozov <tesset.studio@gmail.com>
* @version 1.0
*/
class FilterCatalog extends CBitrixComponent 
{

    const IBLOCK_ID = 6;

    /**
     * Изначальное значение сортировки
     * @var array
     */
    private $sort = array(
        'NAME' => 'ASC'
        );

    /**
     * Поля для выбора основных элементов
     * @var array
     */
    private $select = array(
        'ID',
        'IBLOCK_ID',
        'NAME',
        'PREVIEW_PICTURE',
        'PREVIEW_TEXT',
        'DATE_CREATE',
        'DETAIL_PAGE_URL',
        );

    /**
     * Параметры для Битриксовой навигации
     * @var array
     */
    private $navParams = array();

    /**
     * Если не знаешь что за метод, дальше не смотри
     */
    public function executeComponent() 
    {
        if (false === $this->Initialize()) {
            return false;
        }

        global $USER;
        $cache = $this->navParams . $arNavigation . bitrix_sessid_get() . $USER->GetID();
        
        if ($this->startResultCache(0, $cache)) {
            $this->arResult = $this->GetItems();
            $this->includeComponentTemplate();
        }
    }

    /**
     * Initialize main component parameters
     */
    public function Initialize() {
        if (!CModule::IncludeModule("iblock")) {
            return false;
        }
        if (!$this->arParams["IBLOCK_ID"]) {
            $this->arParams["IBLOCK_ID"] = self::IBLOCK_ID; 
        }
        return true;
    }


    /**
     * Получение полностью сформированного списка необходимых элементов. <br/>
     * Зависит от self::<b>composeItem(</i>Item</i> instance)</b>
     * @return array Список сформированных элементов
     */
    private function GetItems() 
    {
        $rsMake = CIBlockSection::GetList([
        'NAME' => 'ASC'
        ], [
        'IBLOCK_ID' => $this->arParams["IBLOCK_ID"],
        'ACTIVE' => 'Y',
        'DEPTH_LEVEL' => 1
        ], false, [
        'NAME', 'CODE', 'ID'
        ]);

        while ($make = $rsMake->Fetch()) {
            $result['makes'][$make['CODE']] = [
                'name' => $make['NAME'],
                'id' => $make['ID']
            ];
        }

        if ($_POST['make']) {
            $rsModel = CIBlockSection::GetList([
                'NAME' => 'ASC'
                ], [
                'IBLOCK_ID' => $this->arParams["IBLOCK_ID"],
                'ACTIVE' => 'Y',
                'SECTION_ID' => $result['makes'][$_POST['make']]['id']
                ], false, [
                'NAME', 'CODE', 'ID'
                ]);

            while ($model = $rsModel->Fetch()) {
                $result['models'][$model['CODE']] = [
                    'name' => $model['NAME'],
                    'id' => $model['ID']
                ];
            }   
        }

        if ($_POST['make'] && $_POST['model']) {
            $rsItem = CIBlockElement::GetList([
                'PROPERTY_YEAR' => 'DESC'
                ], [
                'IBLOCK_ID' => 9,
                'ACTIVE' => 'Y',
                'PROPERTY_MAKE' => $result['makes'][$_POST['make']]['id'],
                'PROPERTY_MODEL' => $result['models'][$_POST['model']]['id']
                ], false, false, [
                'PROPERTY_YEAR'
                ]);
            while ($item = $rsItem->Fetch()) {
                if ($item['PROPERTY_YEAR_VALUE']) {
                    $result['years'][$item['PROPERTY_YEAR_VALUE']] = $item['PROPERTY_YEAR_VALUE'];
                }
            }
        }
        return $result;

    }
}
