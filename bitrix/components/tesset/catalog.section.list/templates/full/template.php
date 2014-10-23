<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<div class="container">
	<?foreach ($arResult['items'] as $item) : ?>
	 	<a href="#">
			<div class="product-types__item" style="background: url(<?=$item['picture']['src']?>) no-repeat scroll center 14px rgba(0, 0, 0, 0)">
	 			<span class="types-link"><?=$item['name']?></span>
			</div>
		</a> 
	<?endforeach;?>
</div>