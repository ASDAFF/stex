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
class NewsList extends CBitrixComponent 
{

    const ITEMS_PER_PAGE = 9;

    const IBLOCK_ID = 9;

    const MAKE_IBLOCK = 6;

    const ITEM_IN_LINE = 3;

    const SELECT_DEFAULT = 'Выберите';
    
    /**
     * Изначальное значение сортировки
     * @var array
     */
    private $sort = array(
        'DATE_CREATE' => 'DESC'
        );

    /**
     * Поля для выбора основных элементов
     * @var array
     */
    private $select = array(
        'ID',
        'IBLOCK_ID',
        'NAME',
        'PREVIEW_TEXT',
        'PREVIEW_PICTURE',
        'DETAIL_PAGE_URL',
        'IBLOCK_SECTION_ID',
        'PROPERTY_MAKE',
        'PROPERTY_MODEL',
        'PROPERTY_YEAR',
        'PROPERTY_HEIGHT',
        'PROPERTY_MATERIAL',
        'PROPERTY_FEATURES',
        'PROPERTY_PRICE',
        'PROPERTY_AVAILABILITY',
        'PROPERTY_PHOTOS',
        'PROPERTY_SHOP_LINK'
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

        $arNavigation = CDBResult::GetNavParams($arNavParams);

        global $USER;
        $cache = $this->navParams . $arNavigation . bitrix_sessid_get() . $USER->GetID();
        
        if ($this->startResultCache(0, $cache)) {
            $this->arResult['filter']['makes'] = $this->makes();
            $this->arResult['filter']['models'] = $this->models();
            $this->arResult["items"] = array_chunk($this->GetItems($arNavParams), self::ITEM_IN_LINE);
            $this->includeComponentTemplate();
        }
    }

    /**
     * Initialize main component parameters
     */
    public function Initialize() {
        global $APPLICATION;
        if (!CModule::IncludeModule("iblock")) {
            return false;
        }
        if (!$this->arParams["IBLOCK_ID"]) {
            $this->arParams["IBLOCK_ID"] = self::IBLOCK_ID; 
        }
        if (!$this->arParams["ITEMS_COUNT"]) {
            $this->arParams["ITEMS_COUNT"] = self::ITEMS_PER_PAGE;
        }
        if (isset($_GET['SECTION_CODE'])) {
            $this->arParams['SECTION_CODE'] = $_GET['SECTION_CODE'];
            $section = CIBlockSection::GetList(false, [
                'IBLOCK_ID' => self::IBLOCK_ID,
                'CODE' => $this->arParams['SECTION_CODE']
                ], false, [
                'ID', 'CODE', 'NAME', 'DESCRIPTION', 'UF_NO_PHOTO'
                ])->Fetch();
            $this->arResult['section'] = array(
                'id' => $section['ID'],
                'code' => $section['CODE'],
                'description' => $section['DESCRIPTION'],
                'name' => $section['NAME'],
                'no_photo' => CFile::GetPath($section['UF_NO_PHOTO'])
                );
            $APPLICATION->AddChainItem($this->arResult['section']['name'], '');
        }

        $sectionsFilter = [
            'IBLOCK_ID' => self::IBLOCK_ID,
        ];
        if ($this->arParams['SECTION_CODE']) {
            $sectionsFilter['CODE'] = $this->arParams['SECTION_CODE'];
        }
        $rs = CIBlockSection::GetList(false, $sectionsFilter, false, [
            'ID', 'CODE', 'NAME', 'DESCRIPTION', 'UF_NO_PHOTO'
            ]);
        while ($section = $rs->Fetch()) {
            $this->arResult['catalogSections'][$section['ID']] = array(
                'id' => $section['ID'],
                'code' => $section['CODE'],
                'description' => $section['DESCRIPTION'],
                'name' => $section['NAME'],
                'no_photo' => CFile::GetPath($section['UF_NO_PHOTO'])
                );
        }
        if (isset($_GET['filter']['make']) && strpos($_GET['filter']['make'], self::SELECT_DEFAULT) === false) {
            $this->arParams['filter']['make'] = $_GET['filter']['make'];
        }
        if (isset($_GET['filter']['model']) && strpos($_GET['filter']['make'], self::SELECT_DEFAULT) === false) {
            $this->arParams['filter']['model'] = $_GET['filter']['model'];
        }
        if (isset($_GET['filter']['year']) && strpos($_GET['filter']['make'], self::SELECT_DEFAULT) === false) {
            $this->arParams['filter']['year'] = $_GET['filter']['year'];
        }
        if (isset($_GET['filter']['price-sort'])) {
            $this->arParams['filter']['price-sort'] = $_GET['filter']['price-sort'];
        }
        $this->navParams = array(
            "nPageSize" => $this->arParams["ITEMS_COUNT"],
        );

        return true;
    }

    /**
     * Формирование стандартного фильтра.
     * @return array Стандартный фильтр
     */
    private function filter() 
    {
        $filter = array(    
            'IBLOCK_ID' => $this->arParams['IBLOCK_ID'],
            'ACTIVE' => 'Y'
            // 'INCLUDE_SUBSECTIONS' => 'Y'
        );
        if ($this->arParams['filter']['model']) {
            $filter['PROPERTY_MODEL'] = $this->arResult['filter']['models'][$this->arParams['filter']['model']]['id'];
        }
        if ($this->arParams['filter']['make']) {
            $filter['PROPERTY_MAKE'] = $this->arResult['filter']['makes'][$this->arParams['filter']['make']]['id'];
        }
        if ($this->arParams['filter']['year']) {
            $filter['PROPERTY_YEAR'] = $this->arParams['filter']['year'];
        }
        if ($this->arParams['SECTION_CODE']) {
            $section = CIBlockSection::GetList(false, [
                'IBLOCK_ID' => self::IBLOCK_ID,
                'CODE' => $this->arParams['SECTION_CODE']
                ], false, [
                'ID', 'CODE', 'NAME', 'DESCRIPTION'
                ])->Fetch();
            $filter['SECTION_ID'] = $section['ID'];
        }
        $filterFilter = [
        'IBLOCK_ID' => self::IBLOCK_ID,
        'ACTIVE' => 'Y'
        ];
        if ($this->arParams['filter']['make']) {
            $filterFilter['PROPERTY_MAKE'] = $this->arResult['filter']['makes'][$this->arParams['filter']['make']]['id'];
        }
        if ($this->arParams['filter']['model']) {
            $filterFilter['PROPERTY_MODEL'] = $this->arResult['filter']['models'][$this->arParams['filter']['model']]['id'];
        }
        $rs = CIBlockElement::GetList(false, $filterFilter, false, false, [
            'PROPERTY_YEAR'
            ]);
        while ($y = $rs->Fetch()) {
            $this->arResult['filter']['year'][$y['PROPERTY_YEAR_VALUE']] = $y['PROPERTY_YEAR_VALUE'];
        }
        return $filter;
    }

    /**
     * Получение полностью сформированного списка необходимых элементов. <br/>
     * Зависит от self::<b>composeItem(</i>Item</i> instance)</b>
     * @return array Список сформированных элементов
     */
    private function GetItems() 
    {
        if (isset($this->arParams['filter']['price-sort'])) {
            $this->sort = array('PROPERTY_PRICE' => $this->arParams['filter']['price-sort']);
        }
        $rs = CIBlockElement::GetList(
            $this->sort, 
            $this->filterEx(),
            false,
            $this->navParams, 
            $this->select
        );
        $this->arResult['paginator'] = $rs->GetPageNavStringEx($navComponentObject, '', 'seintex');
        return $this->data($rs);

    }

    /**
     * Обработчик результат. Вносим изменения при необходимости
     * @param  CDBResult $rsItems Выборка основного массива элементов
     * @return array              Основной массив элементов
     */
    private function data($rsItems) {
        while ($item = $rsItems->GetNext()) {
            $items[] = $this->composeItem(new Item($item));
        }
        return $items;
    }

    // --------- ITEM LOGIC -------------- //

    /**
     * Расширенный фильтр для основного GetList() элементов
     * @return array 
     */
    private function filterEx() 
    {
        $filterEx = false; // Почему? потому что бля (см. стандартный класс для элементов)
        $filter = (false === $filterEx) ? $this->filter() : array_merge($this->filter(), $filterEx);
        return $filter;
    }

    
    /**
     * Формирует данные об основном элементе
     * @param  Item   $item Item instance
     * @return array       Данные об элменте
     */
    private function composeItem(Item $item) 
    {
        $x = array(
            'id' => $item->field('ID'),
            'iblockId' => $item->field('IBLOCK_ID'),
            'section' => $item->field('IBLOCK_SECTION_ID'),
            'anounce' => $item->field('PREVIEW_TEXT'),
            'picture' => $item->src('PREVIEW_PICTURE'),
            'name' => $item->field('NAME'),
            'make' => $item->propValue('MAKE'),
            'model' => $item->propValue('MODEL'),
            'year' => $item->propValue('YEAR'),
            'height' => $item->propValue('HEIGHT'),
            'material' => $item->propValue('MATERIAL'),
            'features' => $item->propValue('FEATURES'),
            'price' => $item->propValue('PRICE'),
            'availability' => $item->propValue('AVAILABILITY'),
            'photos' => $item->propValue('PHOTOS'),
            'shopLink' => $item->propValue('SHOP_LINK'),
            'url' => $item->field('DETAIL_PAGE_URL')
            );
        // if (!in_array($x['year'], $this->arResult['filter']['year'])) {
        //     $this->arResult['filter']['year'][] = $x['year'];
        // }
        return $x;
    }

    /**
     * Get makes
     * @return [type]
     */
    private function makes() {
        $rs = CIBlockSection::GetList(false, array(
            'IBLOCK_ID' => self::MAKE_IBLOCK,
            'ACTIVE' => 'Y',
            'SECTION_ID' => false
            ), false, array(
            'ID', 'CODE', 'NAME'
            ));
        while ($section = $rs->Fetch()) {
            $makes[$section['CODE']] = array(
                'id' => $section['ID'],
                'code' => $section['CODE'],
                'name' => $section['NAME']
                );
        }

        return $makes;
    }

    private function models() {
        if ($this->arParams['filter']['make'] == false) {
            return false;
        } else {
           $rs = CIBlockSection::GetList(false, array(
                'IBLOCK_ID' => self::MAKE_IBLOCK,
                'ACTIVE' => 'Y',
                'SECTION_ID' => $this->arResult['filter']['makes'][$this->arParams['filter']['make']]['id']
                ), false, array(
                'ID', 'CODE', 'NAME'
                ));
            while ($section = $rs->Fetch()) {
                $models[$section['CODE']] = array(
                    'id' => $section['ID'],
                    'code' => $section['CODE'],
                    'name' => $section['NAME']
                    );
            } 
        }
        return $models;
    }
}
