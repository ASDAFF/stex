<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Демонстрационная версия продукта «1С-Битрикс: Управление сайтом»");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetTitle("Главная страница");
?>
<div class="b-features" data-vide-bg="video/video" data-vide-options="loop: true, muted: true, position: 50% 50%">
	<div class="video-controls">
 <a href="#" class="btn-play js-video-play"></a> <a href="#" class="btn-pause js-video-pause active"></a>
	</div>
	<div class="volume-controls">
 <a href="#" class="btn-volume-on js-video-volume-on"></a> <a href="#" class="btn-volume-off js-video-volume-off active"></a>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-3">
                <?$APPLICATION->IncludeFile('/include/index.top.slide1.php');?>
			</div>
			<div class="col-xs-3">
                <?$APPLICATION->IncludeFile('/include/index.top.slide2.php');?>
			</div>
			<div class="col-xs-3">
                <?$APPLICATION->IncludeFile('/include/index.top.slide3.php');?>
			</div>
			<div class="col-xs-3">
                <?$APPLICATION->IncludeFile('/include/index.top.slide4.php');?>
			</div>
		</div>
	</div>
</div>
<div class="b-product-types">
	<?$APPLICATION->IncludeComponent('tesset:catalog.section.list', 'full', array(
		'IBLOCK_ID' => 9
	));?>
</div>
<div class="b-about">
	<div class="container">
		<div class="row">
			<div class="col-xs-6">
				<div class="b-about__info">
					<?$APPLICATION->IncludeFile('/include/index.about.php');?>
                    <a href="/about/" class="btn btn--red">
					Подробнее о компании </a>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="b-about__benefits">
                    <?$APPLICATION->IncludeFile('/include/index.about.slide1.php');?>
                    <?$APPLICATION->IncludeFile('/include/index.about.slide2.php');?>
                    <?$APPLICATION->IncludeFile('/include/index.about.slide3.php');?>
                    <?$APPLICATION->IncludeFile('/include/index.about.slide4.php');?>
                    <?$APPLICATION->IncludeFile('/include/index.about.slide5.php');?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="b-latest-news">
	<div class="container">
		<div class="heading">
			<h2>
			Последние новости </h2>
 			<a href="/press-center/news/" class="btn btn--dotted more">смотреть все</a>
		</div>
		<!-- news -->
		<?$APPLICATION->IncludeComponent('tesset:news.list', '', array(
			'IBLOCK_ID' => 10
		));?>
	</div>
</div>
<div class="b-select-rugs">
            <div class="container">
                <div class="heading">
                    <h2>
                        Коврики для автомобилей от производителя
                    </h2>
                </div>
                <div class="filter-index">
                    <?$APPLICATION->IncludeComponent('tesset:catalog.filter', '', []);?>
                </div>
                <?$APPLICATION->IncludeComponent('tesset:catalog.section.list', 'index', [
                    'IBLOCK_ID' => 6
                ])?>
            </div>
        </div>
<div class="b-clients">
	<div class="container">
		<div class="heading">
			<h2>Клиенты и партнеры</h2>
		</div>
		<?$APPLICATION->IncludeComponent('tesset:news.list', 'partners', array(
            'IBLOCK_ID' => 12,
            'SORT' => ['NAME' => 'ASC']
        ));?>
	</div>
</div>
<br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>