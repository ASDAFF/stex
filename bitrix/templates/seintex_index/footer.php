<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<footer class="footer">
    <div class="container">
        <div class="footer__contacts">
            <h4>Контакты</h4>
            <address>
                <?$APPLICATION->IncludeFile('/include/footer.address.moscow.php')?>
            </address>
            <address>
            <?$APPLICATION->IncludeFile('/include/footer.address.piter.php')?>
            </address>
            <div class="email">
                Email: <?$APPLICATION->IncludeFile('/include/footer.email.php')?>
            </div>
			<div class="social-icons">
        <?$APPLICATION->IncludeFile('/include/footer.social.php')?>
			</div>
        </div>
        <div class="footer__about-company">
            <h4>О компании</h4>
            <div>
                <p>
                    <?$APPLICATION->IncludeFile('/include/footer.about.company.php')?>
                    
                </p>
            </div>
        </div>
        <div class="footer__products-list">
            <h4>Продукция компании</h4>
            <?$APPLICATION->IncludeComponent(
    "tesset:catalog.section.list",
    "",
    Array(
        "AJAX_MODE" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "IBLOCK_TYPE" => "catalog",
        "IBLOCK_ID" => "9"
    )
    );?>
        </div>
        <div class="footer__form">
            <h4>Напишите нам</h4>
            <div class="form">
                <form method="POST" onsubmit="return false;" data-type="Напишите нам">
                    <div class="form-content">
                        <div class="form-group">
                            <textarea name="question" class="question required" placeholder="Текст письма"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="email required" placeholder="Ваш email">
                            <button type="submit" class="submit btn btn--red"></button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="copyright-block">
        <div class="container">
            <small><?$APPLICATION->IncludeFile('/include/footer.copy.php')?></small>
			<span><a href="#" id="toTop">Наверх</a></span>
        </div>
    </div>
</footer>
</div>


<!-- MODALS
    ================================================== -->
<!--Окно спасибо за заявку-->
<div style="display: none;">
     <div id="thank-you" class="thank-you">
       <h5>Ваша заявка получена</h5>
       <p>
           Спасибо за то, что обратились к нам!
       </p>
    </div>
</div>
<div style="display: none;">
    <div id="callback" class="callback popup-form">
       <div class="form">
           <form method="POST" onsubmit="return false;" data-type="Обратный звонок">
               <div class="form-heading">
                   <div class="heading">
                       <h3>Заказать звонок</h3>
                   </div>
               </div>
               <div class="form-content">
                   <div class="form-group">
                       <input type="text" name="name" class="name required" placeholder="Ваше имя">
                   </div>
                   <div class="form-group">
                       <input type="text" name="phone" class="phone required" placeholder="Номер телефона">
                   </div>
                   <button type="submit" class="submit btn btn--red">Заказать</button>
               </div>
           </form>
       </div>
    </div>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script async src="/js/libs/jquery.min.js">')
</script>

<script src="/js/libs/modernizr.js" async></script>
<script src="/js/libs/jquery.bxslider.min.js"></script>
<script src="/js/libs/bootstrap.min.js"></script>
<script src="/js/libs/ie10-viewport-bug-workaround.js"></script>
<script src="/js/libs/jquery.vide.js"></script>
<script src="/js/libs/jquery.formstyler.min.js"></script>
<script src="/js/libs/placeholders.min.js"></script>
<script src="/js/libs/jquery.fancybox.js"></script>
<script src="/js/libs/slick.min.js"></script>

<script src="/js/min/script.min.js"></script>

</body>

</html>