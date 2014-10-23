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
class NewsDetail extends CBitrixComponent 
{

    const IBLOCK_ID = 10;
    
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
        'DATE_CREATE',
        'DETAIL_TEXT',
        'DETAIL_PICTURE',
        'PROPERTY_GALLERY',
        'PROPERTY_VIDEO'
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
            'text' => $item->field('DETAIL_TEXT'),
            'date' => FormatDate("d.m.Y", MakeTimeStamp($item->field('DATE_CREATE'))),
            'picture' => $item->src('DETAIL_PICTURE'),
            'name' => $item->field('NAME'),
            'photos' => $item->propValueArray('GALLERY'),
            'video' => $item->propValueArray('VIDEO'),
            'footer' => $item->propValueArray('FOOTER')
            );
        return $this->prepareX($x);
    }

    private function prepareX($x) {
        foreach ($x['photos'] as $key => $photo) {
            $x['fancybox'][$key] = array(
                'thumb' => array(
                    'medium' => CFile::ResizeImageGet($photo, array("width" => 300, "height" => 250 ), BX_RESIZE_IMAGE_EXACT, false),
                    ),
                'normal' => [
                    'src' => CFile::GetPath($photo)
                    ]
                );
        }
        $x['fancybox'] = array_chunk($x['fancybox'], 3);
        return $x;
    }
    
}
