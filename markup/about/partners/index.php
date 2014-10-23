<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Партнеры</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    
    <link rel="stylesheet" href="/css/libs/jquery.bxslider.css">
    <link rel="stylesheet" href="/css/libs/bootstrap.min.css">
    <link rel="stylesheet" href="/css/libs/jquery.formstyler.css">
    <link rel="stylesheet" href="/css/libs/jquery.fancybox.css">
    <link rel="stylesheet" href="/css/style.css">

    <!--[if lt IE 9]>
        <script src="/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="page-container">
        <? include($_SERVER['DOCUMENT_ROOT'].'/header.php'); ?>
        <div class="main-content">
            <div class="container">
                <aside class="sidebar">
                    <div class="sidebar__block">
                        <div class="heading">
                            <h3>Меню раздела</h3>
                        </div>
                        <nav class="vertical-menu">
                            <ul>
                                <li>
                                    <a href="/about">
									О компании
									</a>
                                </li>
                                <li>
                                    <a href="/about/sertificates">
									Наши достижения
									</a>
                                </li>
                                <li><a href="/about/managers">
                                    Ваши менеджеры
                                </a></li>
                                <li class="vertical-menu-active"><span>
                                    Партнеры
                                </span></li>
                                <li><a href="/about/vacations">
                                    Вакансии
                                </a></li>
                            </ul>
                        </nav>
                    </div>
                    <? include($_SERVER['DOCUMENT_ROOT'].'/sidebar.php'); ?>
                </aside>
                <div class="content-left">
                    <ol class="breadcrumb">
                      <li><a href="/">Главная</a></li>
                      <li><a href="/about">О компании</a></li>
                      <li class="active">Партнеры</li>
                    </ol>

                    <div class="about__company">
                        <h2>
                            Партнеры
                        </h2>
                        <p>
                            «Сеинтекс» - динамично развивающаяся торгово-производственная компания, действующая с 1997 года. Наша специализация – производство и продажа автомобильных аксессуаров. Продукция компании представлена во всех регионах России и странах СНГ.

                        </p>
                    </div>
					<div class="our__partners">
						<div class="row">
							<div class="col-xs-3 item">
								<img src="/img/partners/client1-logo-color.png">
							</div>
							<div class="col-xs-3 item">
								<img src="/img/partners/client2-logo-color.png">
							</div>
							<div class="col-xs-3 item">
								<img src="/img/partners/client5-logo-color.png">
							</div>

							<div class="col-xs-3 item">
								<img src="/img/partners/client6-logo-color.png">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4 item">
								<img src="/img/partners/client4-logo-color.png">
							</div>
							<div class="col-xs-4 item">
								<img src="/img/partners/client7-logo-color.png">
							</div>
							<div class="col-xs-4 item">
								<img src="/img/partners/client8-logo-color.png">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3 col-xs-offset-1 item">
								<img src="/img/partners/client10-logo-color.png">
							</div>							
							<div class="col-xs-3 item">
								<img src="/img/partners/client3-logo-color.png">
							</div>
							<div class="col-xs-3 item">
								<img src="/img/partners/client9-logo-color.png">
							</div>
						</div>

					</div>
                </div>
            </div>
        </div>
        <? include($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>