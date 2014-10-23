/*! jQuery JSON plugin 2.4.0 | code.google.com/p/jquery-json */
(function($){'use strict';var escape=/["\\\x00-\x1f\x7f-\x9f]/g,meta={'\b':'\\b','\t':'\\t','\n':'\\n','\f':'\\f','\r':'\\r','"':'\\"','\\':'\\\\'},hasOwn=Object.prototype.hasOwnProperty;$.toJSON=typeof JSON==='object'&&JSON.stringify?JSON.stringify:function(o){if(o===null){return'null';}
var pairs,k,name,val,type=$.type(o);if(type==='undefined'){return undefined;}
if(type==='number'||type==='boolean'){return String(o);}
if(type==='string'){return $.quoteString(o);}
if(typeof o.toJSON==='function'){return $.toJSON(o.toJSON());}
if(type==='date'){var month=o.getUTCMonth()+1,day=o.getUTCDate(),year=o.getUTCFullYear(),hours=o.getUTCHours(),minutes=o.getUTCMinutes(),seconds=o.getUTCSeconds(),milli=o.getUTCMilliseconds();if(month<10){month='0'+month;}
if(day<10){day='0'+day;}
if(hours<10){hours='0'+hours;}
if(minutes<10){minutes='0'+minutes;}
if(seconds<10){seconds='0'+seconds;}
if(milli<100){milli='0'+milli;}
if(milli<10){milli='0'+milli;}
return'"'+year+'-'+month+'-'+day+'T'+
hours+':'+minutes+':'+seconds+'.'+milli+'Z"';}
pairs=[];if($.isArray(o)){for(k=0;k<o.length;k++){pairs.push($.toJSON(o[k])||'null');}
return'['+pairs.join(',')+']';}
if(typeof o==='object'){for(k in o){if(hasOwn.call(o,k)){type=typeof k;if(type==='number'){name='"'+k+'"';}else if(type==='string'){name=$.quoteString(k);}else{continue;}
type=typeof o[k];if(type!=='function'&&type!=='undefined'){val=$.toJSON(o[k]);pairs.push(name+':'+val);}}}
return'{'+pairs.join(',')+'}';}};$.evalJSON=typeof JSON==='object'&&JSON.parse?JSON.parse:function(str){return eval('('+str+')');};$.secureEvalJSON=typeof JSON==='object'&&JSON.parse?JSON.parse:function(str){var filtered=str.replace(/\\["\\\/bfnrtu]/g,'@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,']').replace(/(?:^|:|,)(?:\s*\[)+/g,'');if(/^[\],:{}\s]*$/.test(filtered)){return eval('('+str+')');}
throw new SyntaxError('Error parsing JSON, source is not valid.');};$.quoteString=function(str){if(str.match(escape)){return'"'+str.replace(escape,function(a){var c=meta[a];if(typeof c==='string'){return c;}
c=a.charCodeAt();return'\\u00'+Math.floor(c/16).toString(16)+(c%16).toString(16);})+'"';}
return'"'+str+'"';};}(jQuery));
/*! jQuery TextChange Plugin */
 (function(a){a.event.special.textchange={setup:function(){a(this).data("lastValue",this.contentEditable==="true"?a(this).html():a(this).val());a(this).bind("keyup.textchange",a.event.special.textchange.handler);a(this).bind("cut.textchange paste.textchange input.textchange",a.event.special.textchange.delayedHandler)},teardown:function(){a(this).unbind(".textchange")},handler:function(){a.event.special.textchange.triggerIfChanged(a(this))},delayedHandler:function(){var c=a(this);setTimeout(function(){a.event.special.textchange.triggerIfChanged(c)},
 25)},triggerIfChanged:function(a){var b=a[0].contentEditable==="true"?a.html():a.val();b!==a.data("lastValue")&&(a.trigger("textchange",[a.data("lastValue")]),a.data("lastValue",b))}};a.event.special.hastext={setup:function(){a(this).bind("textchange",a.event.special.hastext.handler)},teardown:function(){a(this).unbind("textchange",a.event.special.hastext.handler)},handler:function(c,b){b===""&&b!==a(this).val()&&a(this).trigger("hastext")}};a.event.special.notext={setup:function(){a(this).bind("textchange",
 a.event.special.notext.handler)},teardown:function(){a(this).unbind("textchange",a.event.special.notext.handler)},handler:function(c,b){a(this).val()===""&&a(this).val()!==b&&a(this).trigger("notext")}}})(jQuery);

$(document).ready(function(){
	var isMobile = { 
        Android: function() { 
            return navigator.userAgent.match(/Android/i); }, 
        BlackBerry: function() { 
            return navigator.userAgent.match(/BlackBerry/i); },
        iOS: function() { 
            return navigator.userAgent.match(/iPhone|iPad|iPod/i); }, 
        Opera: function() { 
            return navigator.userAgent.match(/Opera Mini/i); },
        Windows: function() { 
            return navigator.userAgent.match(/IEMobile/i); }, 
        any: function() { 
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows()); } 
    };
	if(isMobile.any()){
		$('body').addClass('mobile');
	}

	//стилизация селектов 
	$('input, select').styler();
	//play/pause video
	$('.b-features video').attr('id','video-bg')
	function playPause() {
	    var mediaPlayer = document.getElementById('video-bg');
	    if (mediaPlayer.paused) {
	        mediaPlayer.play(); 
	        $('.js-video-pause').addClass('active');
	        $('.js-video-play').removeClass('active');
	    } else {
	        mediaPlayer.pause(); 
	        $('.js-video-play').addClass('active');
	        $('.js-video-pause').removeClass('active');
	    }
	}
	$(".js-video-play").click(function (e) {
		e.preventDefault();
		playPause();
	});

	$(".js-video-pause").click(function (e) {
		e.preventDefault();
		playPause();
	});

	//latest news image adapt

	$('.latest-news__item__image img').each(function(){
		var $this = $(this);
		if($this.height() < 90)  {
			$this.height(90).css('width','auto')
		}
	});
	$('.js-clients-slider').bxSlider({
		auto: false,
		autoHover: true,
	    slideWidth: 210,
	    minSlides: 5,
	    maxSlides: 5,
	    moveSlides: 1,
	    slideMargin: 10,
	    pager: false,
	    touchEnabled: false
	});
	$('.js-clients-slider2').bxSlider({
		auto: false,
		autoHover: true,
	    slideWidth: 250,
	    minSlides: 3,
	    maxSlides: 3,
	    moveSlides: 1,
	    slideMargin: 10,
	    pager: false,
	    touchEnabled: false
	});
	//Всплывашки
	$(".popup").fancybox({
    	padding: 0,
    	
	});
	//слайдер товара
	var productLargePhotoSlider = $('.js-product-large-photo').bxSlider({
		mode: 'fade',
		speed: 0,
		controls: false,
		pager: false,
		auto: false,
		infiniteLoop: false
	});

	$('.js-product-small-photo .slide').each(function(){
		if ($(this).hasClass('active')) {
			var thisIndex = $(this).index();
			productLargePhotoSlider.goToSlide(thisIndex);
		}
	});
	$('.js-product-small-photo').delegate('.slide', 'click', function(){
		$('.js-product-small-photo .slide').removeClass('active');
		$(this).addClass('active');
		var thisIndex = $(this).index();
		productLargePhotoSlider.goToSlide(thisIndex);
	});
});


/*
* Обработка формы
*/
$(document).ready(function(){
	//Функция проверки на валидность
	function validate(field, type) { 
		var pp = '';

		if(type == 'email'){
			var pp = /^[a-zA-Z0-9][-\._a-zA-Z0-9]+@(?:[a-zA-Z0-9][-a-zA-Z0-9]+\.)+[a-zA-Z]{2,6}$/;
			}
		//если подключен плагин maskedinput
		/*if(type == 'phone'){
			var pp = /^\+?[\d()\-\s]*\d+\s*$/;
		}*/
		//если нет маски
		if(type == 'phone'){
			var pp = /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,20}$/;
		}

		if(type == 'name'){
			var pp = /^[a-zA-Zа-яА-Я][a-zA-Zа-яА-Я0-9\s]{1,220}$/;
			}

		//Проверка поля по выбранному типу
		if(!field.match(pp)){
		return false;
		}
		return true;
	}

	//количество обязательных полей
	var required;
	//количество полей прощедших валидацию
	var validated;
	//тип формы
	var formtype = '';

	//если текст изменен у обязательных полей, проверяем на валидность
	$('.required').bind('textchange', function () {
		var fieldType = $(this).attr('name');
  		if(!validate($(this).val(), fieldType)) {
  			$(this).parent().removeClass('ok').addClass('err');
  				
  		} else {
  			$(this).parent().removeClass('err').addClass('ok');
  				
  		}
  		if ($(this).hasClass('question')) {
  			if ($(this).val() == "") {
  				$(this).parent().removeClass('ok').addClass('err');
  			} else {
  				$(this).parent().removeClass('err').addClass('ok');
  			}	
  		} 

	});
	
    //если нажата кнопка отпрвки, проверяем на валидность
	$('.submit').click(function(){
		//запоминаем тип формы
		formtype = $(this).parents('form').data('type');
	  	//проверяем обязательные поля на валидность
	  	$(this).parents('form').find('.required').each(function(){
	  		var fieldType = $(this).attr('name');
	  		if(!validate($(this).val(), fieldType)) {
	  			$(this).parent().removeClass('ok').addClass('err');
	  				validated = $(this).parent().find('.ok').length;	
	  		} else {
	  			$(this).parent().removeClass('err').addClass('ok');
	  			validated = $(this).parent().find('.ok').length;
	  		}
	  		if($(this).hasClass('question')) {
		  		if($(this).val()=="") {
	  				$(this).parent().removeClass('ok').addClass('err');
	  				validated = $(this).parent().find('.ok').length;

					
	  			} else {
	  				$(this).parent().removeClass('err').addClass('ok');
	  				validated = $(this).parent().find('.ok').length;
	  			
	  			}
		  	}
		});
		//количество объязатеных полей
	  	required = $(this).parents('form').find('.required').length;
	  	//количество полей прошедших валидацию
		validated = $(this).parents('form').find('.ok').length;

        //если нет ошибок
		if (required == validated){
			var formData = {}
			formData.phone = $(this).parents('form').find('.phone').val();
			formData.email = $(this).parents('form').find('.email').val();
			formData.name = $(this).parents('form').find('.name').val();
			formData.question = $(this).parents('form').find('.question').val();
			formData.formtype = formtype;

			var yaTarget = $(this).parents('form').data('target');

			// удаляем введенные данные у всех инпутов
			$('.form-group input').val('');
			$('.form-group textarea').val('');
			$('.form-group input:disabled').val('+7');
			$('.form-group').removeClass('ok').removeClass('err');
			$('.form-group label').show();
			formtype = '';
			$.ajax({ //отправляем аяксом
				url:'php/mail.php',
				type:'POST',
				data:'jsonData=' + $.toJSON(formData),
				//если все успешно заполнено и нажата форма отправки - показываем окно с успешной отправкой
				success: function() {
					$.fancybox.close();
					$.fancybox({
						href: "#thank-you",
						padding: 0,
					});
					reachGoalFunc(yaTarget);
				}
				
			});
		}
	});	
});