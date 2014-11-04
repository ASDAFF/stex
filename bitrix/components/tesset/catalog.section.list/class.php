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
class CatalogSectionList extends CBitrixComponent 
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
        'PICTURE',
        'SECTION_PAGE_URL',
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
            $this->arResult["items"] = $this->GetItems($arNavParams);
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
        if (isset($_GET['SECTION_CODE'])) {
            $this->arParams['SECTION_CODE'] = $_GET['SECTION_CODE'];
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
            'ACTIVE' => 'Y',
            'DEPTH_LEVEL' => 1
            // 'INCLUDE_SUBSECTIONS' => 'Y'
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
        return $this->data(CIBlockSection::GetList(
            $this->sort, 
            $this->filterEx(),
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
            'url' => $item->field('SECTION_PAGE_URL'),
            'code' => $item->field('CODE'),
            'picture' => $item->src('PICTURE')
            );
        return $x;
    }
}
