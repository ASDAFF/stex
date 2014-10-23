<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Наши достижения</title>
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
                                <li class="vertical-menu-active">
                                    <span>Наши достижения</span>
                                </li>
                                <li><a href="/about/managers">
                                    Ваши менеджеры
                                </a></li>
                                <li><a href="/about/partners">
                                    Партнеры
                                </a></li>
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
                      <li class="active">Наши достижения</li>
                    </ol>

                    <div class="about__company">
                        <h2>
                            Наши достижения
                        </h2>
                        <p>
                            «Сеинтекс» - динамично развивающаяся торгово-производственная компания, действующая с 1997 года. Наша специализация – производство и продажа автомобильных аксессуаров. Продукция компании представлена во всех регионах России и странах СНГ.

                        </p>
                    </div>
					<div class="our__sertificates">
						
						<?php
						  $dir = '../../img/sertificates/'; // Папка с изображениями
						  $cols = 6; // Количество столбцов в будущей таблице с картинками
						  $files = scandir($dir); // Берём всё содержимое директории
						 
						  $k = 0; // Вспомогательный счётчик для перехода на новые строки
						  for ($i = 0; $i < count($files); $i++) { // Перебираем все файлы
							if (($files[$i] != ".") && ($files[$i] != "..")&& ($files[$i] != "big")) { // Текущий каталог и родительский пропускаем
							  if ($k % $cols == 0) echo "<div class='row'>"; // Добавляем новую строку

							  $path = $dir.$files[$i]; // Получаем путь к картинке
							  echo "<div class='col-xs-2 item'>";
							  echo "<a href='".$dir."big/$files[$i]' class='popup' data-fancybox-group='item-large-photo'>";
							  echo "<img src='$path'>"; // Вывод превью картинки
							  echo "</a>";
							  echo "</div>";
							  /* Закрываем строку, если необходимое количество было выведено, либо данная итерация последняя */
							  if ((($k + 1) % $cols == 0) || (($i + 1) == count($files))) echo "</div>";
							  $k++; // Увеличиваем вспомогательный счётчик
							}
						  }
						?>
					
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