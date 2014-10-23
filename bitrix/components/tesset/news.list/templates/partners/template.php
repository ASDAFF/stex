<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<div class="js-clients-slider client-slider">
	<?foreach ($arResult['items'] as $item) : ?>
	<div class="slide">
		<div class="slide__color">
			<img class="img-responsive" alt="" src="<?=$item['picture']['src']?>">
		</div>
		<div class="slide__black">
	 		<img class="img-responsive" alt="" src="<?=$item['picture']['src']?>">
		</div>
	</div>
	<?endforeach;?>
</div>