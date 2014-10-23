<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Вакансии</title>
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
                                <li><a href="/about/partners">
                                    Партнеры
                                </a></li>
                                <li class="vertical-menu-active"><span>
                                    Вакансии
                                </span></li>
                            </ul>
                        </nav>
                    </div>
                    <? include($_SERVER['DOCUMENT_ROOT'].'/sidebar.php'); ?>
                </aside>
                <div class="content-left">
                    <ol class="breadcrumb">
                      <li><a href="/">Главная</a></li>
                      <li><a href="/about">О компании</a></li>
                      <li class="active">Вакансии</li>
                    </ol>

                    <div class="about__company">
                        <h2>
                            Вакансии
                        </h2>
						<div class="row">
							<div class="col-xs-8">
								<p>
									Своими победами наша компания обязана, в первую очередь, сотрудникам. Именно наша команда – первое звено в цепочке слагаемых успеха. Мы высоко ценим командный дух, готовность согласованно мыслить и действовать для достижения единой цели. Этому содействуют накопленные знания и опыт, а также традиция передачи их между сотрудниками. Благодаря всему этому мы достигли высоких показателей качества нашей работы.
								</p>
								<p>
									Наша компания активно развивается, и мы всегда готовы принять в команду новых специалистов. Если Вы целеустремленны, прогрессивны, нацелены на успех, вы всегда сможете реализовать себя в нашей компании. Мы готовы рассмотреть Ваши предложения и резюме.
								</p>
							</div>
							<div class="col-xs-4">
								<img src="img/img.png">
							</div>
                    </div>
					
					<div class="our__vacations">
						<div class="row">
							<div class="col-xs-3 item">
								<img src="img/voc1.png">
								<p class="name">Вакансия №1</p>
								<p class="desc">Краткое описание вакансии №1, требования и т.д. и т.п.</p>
							</div>
							<div class="col-xs-3 item">
								<img src="img/voc2.png">
								<p class="name">Вакансия №2</p>
								<p class="desc">Краткое описание вакансии №2, требования и т.д. и т.п.</p>
							</div>
							<div class="col-xs-3 item">
								<img src="img/voc3.png">
								<p class="name">Вакансия №3</p>
								<p class="desc">Краткое описание вакансии №3, требования и т.д. и т.п.</p>
							</div>
							<div class="col-xs-3 item">
								<img src="img/voc4.png">
								<p class="name">Вакансия №4</p>
								<p class="desc">Краткое описание вакансии №4, требования и т.д. и т.п.</p>
							</div>
						</div>
						<p><span class="join">Вы хотите присоединиться к команде компании «Сеинтекс», но пока не нашли подходящего предложения?</span>
						<br>
						Отправьте свое резюме по электронной почте <a href="mailto:office@seintex.ru">office@seintex.ru</a>. Мы свяжемся с Вами, как только интересующая вас вакансия появится.
						</p>
					</div>
					
                    
                    <div class="clients-slider-inner">
                        <h2>
                            Клиенты и партнеры
                        </h2>
                        <div class="js-clients-slider2 client-slider">
					<div class="slide">
                        <div class="slide__color">
                            <span><img src="/img/client6-logo-color.png" class="img-responsive" alt=""></span>
                        </div>
                        <div class="slide__black">
                            <span><img src="/img/client6-logo-black.png" class="img-responsive" alt=""></span>
                        </div>
                    </div>
				    <div class="slide">
                        <div class="slide__color">
                            <span><img src="/img/client7-logo-color.png" class="img-responsive" alt=""></span>
                        </div>
                        <div class="slide__black">
                            <span><img src="/img/client7-logo-black.png" class="img-responsive" alt=""></span>
                        </div>
                    </div>
				    <div class="slide">
                        <div class="slide__color">
                            <span><img src="/img/client8-logo-color.png" class="img-responsive" alt=""></span>
                        </div>
                        <div class="slide__black">
                            <span><img src="/img/client8-logo-black.png" class="img-responsive" alt=""></span>
                        </div>
                    </div>
				    <div class="slide">
                        <div class="slide__color">
                            <span><img src="/img/client9-logo-color.png" class="img-responsive" alt=""></span>
                        </div>
                        <div class="slide__black">
                            <span><img src="/img/client9-logo-black.png" class="img-responsive" alt=""></span>
                        </div>
                    </div>
                            <div class="slide">
                                <div class="slide__color">
                                    <span><img src="/img/client1-logo-color.png" class="img-responsive" alt=""></span>
                                </div>
                                <div class="slide__black">
                                    <span><img src="/img/client1-logo-black.png" class="img-responsive" alt=""></span>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="slide__color">
                                    <span><img src="/img/client2-logo-color.png" class="img-responsive" alt=""></span>
                                </div>
                                <div class="slide__black">
                                    <span><img src="/img/client2-logo-black.png" class="img-responsive" alt=""></span>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="slide__color">
                                    <span><img src="/img/client3-logo-color.png" class="img-responsive" alt=""></span>
                                </div>
                                <div class="slide__black">
                                    <span><img src="/img/client3-logo-black.png" class="img-responsive" alt=""></span>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="slide__color">
                                    <span><img src="/img/client4-logo-color.png" class="img-responsive" alt=""></span>
                                </div>
                                <div class="slide__black">
                                    <span><img src="/img/client4-logo-black.png" class="img-responsive" alt=""></span>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="slide__color">
                                    <span><img src="/img/client5-logo-color.png" class="img-responsive" alt=""></span>
                                </div>
                                <div class="slide__black">
                                    <span><img src="/img/client5-logo-black.png" class="img-responsive" alt=""></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <? include($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>