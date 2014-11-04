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
class NewsListList extends CBitrixComponent 
{

    const ITEMS_PER_PAGE = 10;

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
            $this->arResult["items"] = $this->GetItems();
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
        $this->navParams = array(
            "nPageSize" => $this->arParams["ITEMS_COUNT"],
        );
        if ($this->arParams['SORT']) {
            $this->sort = $this->arParams['SORT'];
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
            false,
            $this->select
        ));

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
            'name' => $item->field('NAME'),
            'url' => $item->field('DETAIL_PAGE_URL'),
            'anounce' => $item->field('PREVIEW_TEXT'),
            'picture' => $item->src('PREVIEW_PICTURE'),
            'dateCreated' => FormatDate("d.m.Y", MakeTimeStamp($item->field('DATE_CREATE')))
            );
        return $x;
    }
}
