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
				<div class="b-features__item b-features__item1">
                    <?$APPLICATION->IncludeFile('/include/index.top.slide1.php');?>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="b-features__item b-features__item2">
                    <?$APPLICATION->IncludeFile('/include/index.top.slide2.php');?>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="b-features__item b-features__item3">
                    <?$APPLICATION->IncludeFile('/include/index.top.slide3.php');?>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="b-features__item b-features__item4">
                    <?$APPLICATION->IncludeFile('/include/index.top.slide4.php');?>
				</div>
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
					<h2>
					Компания «Сеинтекс» </h2>
					<p>
						 <?$APPLICATION->IncludeFile('/include/index.about.php');?>
					</p>
 <a href="/about/" class="btn btn--red">
					Подробнее о компании </a>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="b-about__benefits">
					<div class="b-about__benefits-item b-about__benefits-item1">
                        <?$APPLICATION->IncludeFile('/include/index.about.slide1.php');?>
					</div>
					<div class="b-about__benefits-item b-about__benefits-item2">
                        <?$APPLICATION->IncludeFile('/include/index.about.slide2.php');?>
					</div>
					<div class="b-about__benefits-item b-about__benefits-item3">
                        <?$APPLICATION->IncludeFile('/include/index.about.slide3.php');?>
					</div>
					<div class="b-about__benefits-item b-about__benefits-item4">
                        <?$APPLICATION->IncludeFile('/include/index.about.slide4.php');?>
					</div>
					<div class="b-about__benefits-item b-about__benefits-item5">
                        <?$APPLICATION->IncludeFile('/include/index.about.slide5.php');?>
					</div>
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
                <form action="" class="form form-with-select">
                    <div class="heading">
                        <h3>
                            Подбор ковриков
                        </h3>
                    </div>
                    <div class="form-group">
                        <select name="marka" id="marka">
                            <option value="none">
                                Марка автомобиля
                            </option>
                            <option value="Audi">
                                Audi
                            </option>
                            <option value="Rover">
                                Rover
                            </option>
                            <option value="Nissan">
                                Nissan
                            </option>
                            <option value="BMW">
                                BMW
                            </option>
                        </select>
                        
                        
                    </div>
                    <div class="form-group">
                        <select name="model" id="model">
                            <option value="none">
                                Модель автомобиля
                            </option>
                            <option value="value1">
                                a4
                            </option>
                            <option value="value1">
                                rx8
                            </option>
                            <option value="value1">
                                rx8
                            </option>
                            <option value="value1">
                                rx8
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="year" id="year">
                            <option value="none">
                                Год выпуска
                            </option>
                            <option value="value1">
                                2014
                            </option>
                            <option value="value1">
                                2013
                            </option>
                            <option value="value1">
                                2012
                            </option>
                            <option value="value1">
                                2011
                            </option>
                        </select>
                    </div>
                    <div class="btn-wrap">
                        <button type="submit" class="btn btn--red">
                            <span>
                                Подобрать
                            </span>
                        </button>
                    </div>
                </form>
                <ul class="car-list list-unstyled">
                    <li><a href="#">Acura</a>   </li>
                    <li><a href="#">Alfa Romeo</a>   </li>
                    <li><a href="#">Aston Martin</a>   </li>
                    <li><a href="#">Audi</a>   </li>
                    <li><a href="#">Bentley</a>   </li>
                    <li><a href="#">BMW</a>   </li>
                    <li><a href="#">Brilliance</a>   </li>
                    <li><a href="#">Byd</a>   </li>
                    <li><a href="#">Cadillac</a>   </li>
                    <li><a href="#">Chery</a>   </li>
                    <li><a href="#">Chevrolet</a>   </li>
                    <li><a href="#">Chrysler</a>   </li>
                    <li><a href="#">Citroen</a>   </li>
                    <li><a href="#">Daewoo</a>   </li>
                </ul>
                <ul class="car-list list-unstyled">
                    <li><a href="#">Dodge</a>   </li>
                    <li><a href="#">FAW</a>   </li>
                    <li><a href="#">Ferrari</a>   </li>
                    <li><a href="#">Fiat</a>   </li>
                    <li><a href="#">Ford</a>   </li>
                    <li><a href="#">Geely</a>   </li>
                    <li><a href="#">GMC</a>   </li>
                    <li><a href="#">Great Wall</a>   </li>
                    <li><a href="#">Honda</a>   </li>
                    <li><a href="#">Hummer</a>   </li>
                    <li><a href="#">Hyundai</a>   </li>
                    <li><a href="#">IKCO</a>   </li>
                    <li><a href="#">Infiniti</a>   </li>
                    <li><a href="#">Isuzu</a>   </li>
                </ul>
                <div class="car-list list-unstyled">
                    <li><a href="#">Jaguar</a>   </li>
                    <li><a href="#">Jeep</a>   </li>
                    <li><a href="#">Kia</a>   </li>
                    <li><a href="#">Lamborghini</a>   </li>
                    <li><a href="#">Land Rover</a>   </li>
                    <li><a href="#">Lexus</a>   </li>
                    <li><a href="#">LIFAN</a>   </li>
                    <li><a href="#">Lincoln</a>   </li>
                    <li><a href="#">Lotus</a>   </li>
                    <li><a href="#">Maserati</a>   </li>
                    <li><a href="#">Maybach</a>   </li>
                    <li><a href="#">Mazda</a>   </li>
                    <li><a href="#">Mercedes-Benz</a>   </li>
                    <li><a href="#">Mini</a>   </li>
                </div>
                <div class="car-list list-unstyled">
                    <li><a href="#">Mitsubishi</a>   </li>
                    <li><a href="#">Nissan</a>   </li>
                    <li><a href="#">Opel</a>   </li>
                    <li><a href="#">Peugeot</a>   </li>
                    <li><a href="#">Pontiac</a>   </li>
                    <li><a href="#">Porsche</a>   </li>
                    <li><a href="#">Renault</a>   </li>
                    <li><a href="#">Rolls-Royce</a>   </li>
                    <li><a href="#">Rover</a>   </li>
                    <li><a href="#">Saab</a>   </li>
                    <li><a href="#">Seat</a>   </li>
                    <li><a href="#">Skoda</a>   </li>
                    <li><a href="#">Smart</a>   </li>
                    <li><a href="#">SsangYong</a>   </li>
                </div>
                <div class="car-list list-unstyled">
                    <li><a href="#">Subaru</a>   </li>
                    <li><a href="#">Suzuki</a>   </li>
                    <li><a href="#">Tagaz</a>   </li>
                    <li><a href="#">Toyota</a>   </li>
                    <li><a href="#">Volkswagen</a>   </li>
                    <li><a href="#">Volvo</a>   </li>
                    <li><a href="#">ZAZ</a>   </li>
                    <li><a href="#">Богдан</a>   </li>
                    <li><a href="#">ВАЗ</a>   </li>
                    <li><a href="#">ВАЗ 4x4</a>   </li>
                    <li><a href="#">ВАЗ Классика</a>   </li>
                    <li><a href="#">ГАЗ</a>   </li>
                    <li><a href="#">УАЗ</a>   </li>
                </div>
            </div>
        </div>
<div class="b-clients">
	<div class="container">
		<div class="heading">
			<h2>Клиенты и партнеры</h2>
		</div>
		<?$APPLICATION->IncludeComponent('tesset:news.list', 'partners', array(
            'IBLOCK_ID' => 12
        ));?>
	</div>
</div>
<br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>