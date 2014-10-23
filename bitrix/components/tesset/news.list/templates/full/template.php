<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
 <div class="news-list">
    <h2>
        Новости
    </h2>
    <?foreach ($arResult['items'] as $item) : ?>
    <div class="news-list__item">
        <div class="row">
            <div class="col-xs-3">
                <div class="news__photo">
                    <a href="<?=$item['url']?>">
						<img src="<?=$item['picture']['src']?>" alt="">
					</a>
                </div>
            </div>
            <div class="col-xs-9">
                <div class="news__info">
                    <div class="news__info__date">
                        <?=$item['dateCreated']?>
                    </div>
                    <div class="news__info__news-name">
                        <a href="<?=$item['url']?>"><?=$item['name']?></a>
                    </div>
                    <div class="news__info__preview-text">
                        <p>
                            <?=$item['anounce']?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?endforeach;?>
</div>