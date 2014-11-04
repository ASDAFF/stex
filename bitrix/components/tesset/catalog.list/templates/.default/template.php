<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
 <div class="about-catalog-item">
    <h2>
        <?=$arResult['section']['name']?>
    </h2>
    <?=$arResult['section']['description']?>
    <?if (!$_GET['filter'] && !$arParams['SECTION_CODE']) : ?>
        <?$APPLICATION->IncludeFile('/include/catalog.text.php');?>
    <?endif;?>
</div>
<div class="catalog-filter">
    <div class="catalog-filter-form">
        <form method="GET" action="<?=$APPLICATION->GetCurPageParam('', array('filter'))?>" name="form-x" class="filter">
            <div class="sort-type">
                <span>По цене</span>
                <div>
                    <input type="radio" name="filter[price-sort]" value="asc" id="sort-up" class="price-sort-radio" <?if (!isset($arParams['filter']['price-sort']) || $arParams['filter']['price-sort'] == 'asc') : ?>checked<?endif;?>>
                    <label for="sort-up">по возрастанию</label>
                    
                </div>
                <div>
                    <input type="radio" name="filter[price-sort]" value="desc" id="sort-down" class="price-sort-radio" <?if ($arParams['filter']['price-sort'] == 'desc') : ?>checked<?endif;?>>
                    <label for="sort-down">по убыванию</label>
                    
                </div>
            </div>
            <div class="filter-car-type">

                <div class="filter-car-type__name">
                    <span>Для</span>
                    <select name="filter[make]" id="filter-make" class="select-filter">
                        <option>Выберите марку</option>
                        <?foreach ($arResult['filter']['makes'] as $code => $make) : ?>
                            <option value="<?=$code?>" <?if ($code == $arParams['filter']['make']): ?>selected<?endif;?>>
                                <?=$make['name']?>
                            </option>
                        <?endforeach;?>
                    </select>
                </div>
                <div class="filter-car-type__model">
                    <select name="filter[model]" id="filter-model" class="select-filter" <?if (false === $arResult['filter']['models']) : ?>disabled<?endif;?>>
                    <option>Выберите модель</option>
                        <?foreach ($arResult['filter']['models'] as $code => $model) : ?>
                            <option value="<?=$model['code']?>" <?if ($code == $arParams['filter']['model']): ?>selected<?endif;?>>
                                <?=$model['name']?>
                            </option>
                        <?endforeach;?>    
                    </select>
                </div>
                <div class="filter-car-type__year">
                   <select name="filter[year]" id="filter-year" class="select-filter" <?if (false === $arResult['filter']['year']) : ?>disabled<?endif;?>>
                        <?foreach ($arResult['filter']['year'] as $index => $year) : ?>
                            <option value="<?=$year?>" <?if ($year == $arParams['filter']['year']): ?>selected<?endif;?>>
                                <?=$year?>
                            </option>
                        <?endforeach;?>    
                    </select>
                    <span>года</span>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="catalog-items">
    <?foreach ($arResult['items'] as $index => $chunk) : ?>
    <div class="row">
        <?foreach ($chunk as $id => $item) : ?>
        <div class="col-xs-4">
            <div class="catalog-item">
                <div class="catalog-item__photo">
                    <a href="<?=$item['url']?>"><img src="<?=($item['picture']['src'])?$item['picture']['src']:$arResult['catalogSections'][$item['section']]['no_photo']?>" alt=""></a>
                </div>
                <div class="catalog-item__name">
                    <a href="<?=$item['url']?>">
                        <?=$item['name']?>
                    </a>
                </div>
                <div class="item-form-order">
                    <form action="#" >
                        <div class="product-available <?if (!$item['availability']) : ?>disable<?endif;?>">
                            <?if ($item['availability']) : ?>
                                Есть в наличии
                            <?else : ?>
                                Нет в наличии
                            <?endif;?>
                        </div>
                        <div class="product-price">
                            <?=$item['price']?> рублей
                        </div>
                        <input type="button" value="Купить" class="btn btn--red" onclick="document.location.href='<?=$item['shopLink']?>'">
                    </form>
                </div>
            </div>
        </div>
        <?endforeach;?>
    </div>
    <?endforeach;?>
</div>
<?=$arResult['paginator']?>
