<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<div class="row">
	<?foreach ($arResult['items'] as $item) : ?>
	<div class="col-xs-3 latest-news__item">
		<div class="latest-news__item__image">
			<img alt="" src="<?=$item['picture']['src']?>">
		</div>
		<div class="latest-news__item__date">
			 <?=$item['dateCreated']?>
		</div>
		<a href="<?=$item['url']?>" class="latest-news__item__link"><?=$item['name']?></a>
	</div>
	<?endforeach;?>
</div>