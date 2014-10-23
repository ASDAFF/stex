<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?$item = $arResult;?>
<div class="about-single-item">
    <h2>
        <?=$item['name']?>
    </h2>
    <div class="row">
        <div class="col-xs-6">
            <ul class="catalog-item__large-photo js-product-large-photo">
                <?foreach ($item['fancybox'] as $photo) : ?>
                <li class="slide">
                    <a href="<?=$photo['normal']['src']?>" class="popup" data-fancybox-group="item-large-photo">
                        <img src="<?=$photo['thumb']['medium']['src']?>" alt="">
                    </a>
                </li>
                <?endforeach;?>
            </ul>
            <div class="catalog-item__small-photo js-product-small-photo">
                <?foreach ($item['fancybox'] as $index => $photo) :?>
                    <div class="slide <?if ($index == 0) : ?>active<?endif?>">
                        <img src="<?=$photo['thumb']['small']['src']?>" alt="">
                    </div>
                <?endforeach;?>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="item-info">
                <div class="item-info-list item-info__height">
                    <span>Тип:</span> <a href="<?=$item['section']['SECTION_PAGE_URL']?>" title=""><?=$item['section']['NAME']?></a>
                </div>
                <div class="item-info-list item-info__height">
                    <span>Марка:</span> <a href="/catalog/?filter[make]=<?=$item['make']['CODE']?>" title=""><?=$item['make']['NAME']?></a>
                </div>
                <div class="item-info-list item-info__height">
                    <span>Модель:</span> <a href="/catalog/?filter[make]=<?=$item['make']['CODE']?>&filter[model]=<?=$item['model']['CODE']?>" title=""><?=$item['model']['NAME']?></a>
                </div>
                <?foreach ($item['section']['properties'] as $property) : ?>
                    <div class="item-info-list item-info__height">
                        <span><?=$property['name']?>:</span> <?=$property['value']?>
                    </div>
                <?endforeach;?>    
                <div class="item-info-list item-info__backside">
                    <span>Особенности:</span> <?=$item['features']?>
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
                        <a href="<?=$item['shopLink']?>" type="submit" value="Купить" class="btn btn--red">Купить</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="about-catalog-item inner-catalog-item">
    <h2>
        Описание
    </h2>
    <p>
        <?=$item['anounce']?>
    </p>
</div>
</div>
<!-- <div class="catalog-items catalog-similar-items">
    <h2>
        Ещё товары для BMW 3 Ser F-30 (БМВ 3 серия)
    </h2>
    <div class="row">
        <div class="col-xs-4">
            <div class="catalog-item">
                <div class="catalog-item__photo">
                    <img src="/img/catalog-photo.jpg" alt="">
                </div>
                <div class="catalog-item__name">
                    <a href="#">
                        Резиновые коврики Сетка BMW 3 Ser F-30 (БМВ 3 серия)
                    </a>
                </div>
                <div class="item-form-order">
                    <form action="#" >
                        <div class="product-available">
                            Есть в наличии
                        </div>
                        <div class="product-price">
                            2 080 рублей
                        </div>
                        <input type="submit" value="Купить" class="btn btn--red">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="catalog-item">
                <div class="catalog-item__photo">
                    <img src="/img/catalog-photo.jpg" alt="">
                </div>
                <div class="catalog-item__name">
                    <a href="#">
                        Резиновые коврики Сетка Audi A-3 2003–2012 best quality
                    </a>
                </div>
                <div class="item-form-order">
                    <form action="#" >
                        <div class="product-available">
                            Есть в наличии
                        </div>
                        <div class="product-price">
                            2 080 рублей
                        </div>
                        <input type="submit" value="Купить" class="btn btn--red">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="catalog-item">
                <div class="catalog-item__photo">
                    <img src="/img/catalog-photo.jpg" alt="">
                </div>
                <div class="catalog-item__name">
                    <a href="#">
                        Резиновые коврики Сетка Audi A-3 2003–2012 best quality
                    </a>
                </div>
                <div class="item-form-order disable">
                    <form action="#" >
                        <div class="product-available">
                            Нет в наличии
                        </div>
                        <div class="product-price">
                            2 080 рублей
                        </div>
                        <input type="submit" value="Купить" class="btn btn--red" disabled>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4">
            <div class="catalog-item">
                <div class="catalog-item__photo">
                    <img src="/img/catalog-photo.jpg" alt="">
                </div>
                <div class="catalog-item__name">
                    <a href="#">
                        Резиновые коврики Сетка Audi A-3 2003–2012 best quality
                    </a>
                </div>
                <div class="item-form-order">
                    <form action="#" >
                        <div class="product-available">
                            Есть в наличии
                        </div>
                        <div class="product-price">
                            2 080 рублей
                        </div>
                        <input type="submit" value="Купить" class="btn btn--red">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="catalog-item">
                <div class="catalog-item__photo">
                    <img src="/img/catalog-photo.jpg" alt="">
                </div>
                <div class="catalog-item__name">
                    <a href="#">
                        Резиновые коврики Сетка Audi A-3 2003–2012 best quality
                    </a>
                </div>
                <div class="item-form-order">
                    <form action="#" >
                        <div class="product-available">
                            Есть в наличии
                        </div>
                        <div class="product-price">
                            2 080 рублей
                        </div>
                        <input type="submit" value="Купить" class="btn btn--red">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="catalog-item">
                <div class="catalog-item__photo">
                    <img src="/img/catalog-photo.jpg" alt="">
                </div>
                <div class="catalog-item__name">
                    <a href="#">
                        Резиновые коврики Сетка Audi A-3 2003–2012 best quality
                    </a>
                </div>
                <div class="item-form-order disable">
                    <form action="#" >
                        <div class="product-available">
                            Нет в наличии
                        </div>
                        <div class="product-price">
                            2 080 рублей
                        </div>
                        <input type="submit" value="Купить" class="btn btn--red" disabled>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->