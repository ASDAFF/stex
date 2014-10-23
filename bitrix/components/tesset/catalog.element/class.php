<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

CBitrixComponent::includeComponentClass("component.model:item");
/**
* CRelatedSKU
* 
* Связанные товары по ID.
* Велючает в себя получение информации 
* только о Торговых предложениях по товару либо торговому предложению
* 
* @author Roman Morozov <tesset.studio@gmail.com>
* @version 1.0
*/
class EvrikaBlogList extends CBitrixComponent 
{

    const IBLOCK_ID = 9;
    
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
    private $likes;
    
    /**
     * Если не знаешь что за метод, дальше не смотри
     */
    public function executeComponent() 
    {
        if (false === $this->Initialize()) {
            // 404
            return false;
        }
        global $USER;
        global $APPLICATION;
        $cache = $this->navParams . bitrix_sessid_get() . $USER->GetID();
        
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
        if (!$this->arParams["ELEMENT_CODE"]) {
            $this->arParams["ELEMENT_CODE"] = $_GET['ELEMENT_CODE'];
        }
        if (!$this->arParams["SECTION_CODE"]) {
            $this->arParams["SECTION_CODE"] = $_GET['SECTION_CODE'];
        }
        if (!$this->arParams["ELEMENT_CODE"]) {
            return false;
        }
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
            'CODE' => $this->arParams['ELEMENT_CODE'],
            'ACTIVE' => 'Y'
        );
        return $filter;
    }

    /**
     * Получение полностью сформированного списка необходимых элементов. <br/>
     * Зависит от self::<b>composeItem(</i>Item</i> instance)</b>
     * @return array Список сформированных элементов
     */
    private function GetItems() 
    {
        return $this->data(CIBlockElement::GetList(
            $this->sort, 
            $this->filterEx(),
            false,
            $this->navParams, 
            $this->select
        ));

    }

    /**
     * Обработчик результат. Вносим изменения при необходимости
     * @param  CDBResult $rsItems Выборка основного массива элементов
     * @return array              Основной массив элементов
     */
    private function data($rsItems) {
        if ($objX = $rsItems->GetNextElement()) {
            $x = array_merge($objX->getFields(), array('properties' => $objX->getProperties()));
            $item = $this->composeItem(new Item($x));
        }
        CIBlockElement::CounterInc($item['id']);
        return $item;
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
            'anounce' => $item->field('PREVIEW_TEXT'),
            'photos' => $item->propValueArray('PHOTOS'),
            'name' => $item->field('NAME'),
            'make' => $item->propValue('MAKE'),
            'model' => $item->propValue('MODEL'),
            'year' => $item->propValue('YEAR'),
            'height' => $item->propValue('HEIGHT'),
            'material' => $item->propValue('MATERIAL'),
            'features' => $item->propValue('FEATURES'),
            'price' => $item->propValue('PRICE'),
            'availability' => $item->propValue('AVAILABILITY'),
            'shopLink' => $item->propValue('SHOP_LINK'),
            'url' => $item->field('DETAIL_PAGE_URL')
            );
        return $this->prepareX($x);
    }

    private function prepareX($x) {
        global $APPLICATION;
        $x['features'] = $x['features']['TEXT'];
        foreach ($x['photos'] as $key => $photo) {
            $x['fancybox'][$key] = array(
                'thumb' => array(
                    'medium' => CFile::ResizeImageGet($photo, array("width" => 370, "height" => 250 ), BX_RESIZE_IMAGE_EXACT, false),
                    'small' => CFile::ResizeImageGet($photo, array("width" => 80, "height" => 50 ), BX_RESIZE_IMAGE_EXACT, false),
                    ),
                'normal' => [
                    'src' => CFile::GetPath($photo)
                    ]
                );
        }
        $x['section'] = CIBlockSection::GetList(false, [
            'IBLOCK_ID' => self::IBLOCK_ID,
            'ACTIVE' => 'Y',
            'CODE' => $this->arParams['SECTION_CODE']
            ], false, [
            'NAME', 'CODE', 'SECTION_PAGE_URL', 'UF_*'
            ])->GetNext();
        $obUserTypeEntity = new CUserTypeEntity;
        foreach ($x['section'] as $key => $info) {
            if (strpos($key, 'UF_') !== false && strpos($key, '~') === false && $info) {
                $x['section']['properties'][$key] = [
                    'name' => CUserTypeEntity::GetByID($obUserTypeEntity->GetList(array(), array("FIELD_NAME" => $key))->Fetch()['ID'])['LIST_COLUMN_LABEL']['ru'],
                    'value' => $info
                ];
            } 
        }
        $x['make'] = CIBlockSection::GetList(false, [
            'ID' => $x['make']
            ], false, [
            'NAME', 'CODE'
            ])->Fetch();

        $x['model'] = CIBlockSection::GetList(false, [
            'ID' => $x['model']
            ], false, [
            'NAME', 'CODE'
            ])->Fetch();
        $APPLICATION->AddChainItem($x['section']['NAME'], $x['section']['SECTION_PAGE_URL']);
        $APPLICATION->AddChainItem($x['name'], '');        
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
