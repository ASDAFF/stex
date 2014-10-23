<header class="main-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-3">
                <div class="logo">
                    <a href="/">
                        <img src="/img/seintext-logo.png" height="36" width="186" alt="">
                    </a>
                    <div class="logo__description">
                        <span>
                            производство автомобильных <br>аксессуаров
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xs-3">
                <!-- <div class="language-change">
                    <div class="language-change__type language-change__type--rus">
                        <a href="#" class="active">
                            Rus
                        </a>
                    </div>
                    <div class="language-change__type language-change__type--eng">
                        <a href="#" class="">
                            Eng
                        </a>
                    </div>
                </div> -->
            </div>
            <div class="col-xs-3">
                <?$APPLICATION->InclideFile('/include/header.shop.button.php');?>
            </div>
            <div class="col-xs-3">
                <div class="main-header__contacts">
                    <div class="main-header__contacts__phone">
                       <span> +7 (495)</span> 223-23-04
                    </div>
                    <div class="main-header__contacts__callback-btn">
                        <a href="#callback" class="popup btn--dotted">Заказать звонок</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-nav navbar navbar-default" role="navigation">
        <div class="container">
		<?  
			if(strpos($_SERVER['REQUEST_URI'], 'about')) $active[2]=' active';  
			else $active[1]=' active';
		?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
            <?$APPLICATION->IncludeComponent(
                "bitrix:menu",
                "top_2level",
                Array(
                    "ROOT_MENU_TYPE" => "top", 
                    "MAX_LEVEL" => "3", 
                    "CHILD_MENU_TYPE" => "left", 
                    "USE_EXT" => "Y", 
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "MENU_CACHE_GET_VARS" => Array()
                )
            );?> 
                <!-- <ul class="nav navbar-nav">
                    <li class="dropdown<? echo $active[1]; ?>"><a href="/">Главная</a></li>
                    <li class="dropdown<? echo $active[2]; ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">О компании</a>
                        <ul class="dropdown-menu">
                            <li><a href="/about">О компании</a></li>
                            <li><a href="/about/sertificates">Наши достижения</a></li>
                            <li><a href="/about/managers">Ваши менеджеры</a></li>
                            <li><a href="/about/partners">Партнеры</a></li>
                            <li><a href="/about/vacations">Вакансии</a></li>

                        </ul>
                    </li>
                    <li class="dropdown<? echo $active[3]; ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Каталог</a>
                        <ul class="dropdown-menu">
							<li><a href="/catalog/setka">Резиновые коврики «Сетка»</a></li>
							<li><a href="#">Резиновые коврики с высоким бортом</a></li>
							<li><a href="#">Ворсовые коврики LUX </a></li>
							<li><a href="#">3D коврики</a></li>
							<li><a href="#">Коврики в багажник</a></li>
							<li><a href="#">Коврики для отечественных авто</a></li>
							<li><a href="#">Коврики для грузовиков</a></li>
							<li><a href="#">Универсальные коврики</a></li>
							<li><a href="#">Брызговики</a></li>
							<li><a href="#">Чехлы</a></li>
                        </ul>
                    </li>
                    <li class="dropdown<? echo $active[4]; ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Оптовым клиентам </a>
                        <ul class="dropdown-menu">
                            <li><a href="/wholesale/advantages/">Наши преимущества</a></li>
                            <li><a href="#">Гарантия</a></li>
                            <li><a href="#">Получить прайс-лист с оптовыми ценами</a></li>
                        </ul>
                    </li>
                    <li class="dropdown<? echo $active[5]; ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Пресс-центр</a>
                        <ul class="dropdown-menu">
                            <li><a href="/news">Новости</a></li>
                            <li><a href="#">Выставки</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#">Интернет-магазин</a></li>
                    <li class="dropdown<? echo $active[6]; ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Контакты</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Наши офисы</a></li>
                            <li><a href="#">Форма обратной связи</a></li>
                        </ul>
                    </li>
                </ul> -->
                <form class="navbar-form navbar-right" role="search">
                    <button type="submit" class="btn btn-default"></button>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Поиск">
                    </div>
                    
                </form>
            </div>
        </div>
    </nav>
</header>