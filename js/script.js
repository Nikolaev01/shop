(function($) {

    /*---------------------------
     Defaults for Reveal
     ----------------------------*/

    /*---------------------------
     Listener for data-reveal-id attributes
     ----------------------------*/

    $('a[data-reveal-id]').on('click', function(e) {
        e.preventDefault();
        var modalLocation = $(this).attr('data-reveal-id');
        $('#'+modalLocation).reveal($(this).data());
    });

    /*---------------------------
     Extend and Execute
     ----------------------------*/

    $.fn.reveal = function(options) {


        var defaults = {
            animation: 'fadeAndPop', //fade, fadeAndPop, none
            animationspeed: 300, //how fast animtions are
            closeonbackgroundclick: true, //if you click background will modal close?
            dismissmodalclass: 'close-reveal-modal' //the class of a button or element that will close an open modal
        };

        //Extend dem' options
        var options = $.extend({}, defaults, options);

        return this.each(function() {

            /*---------------------------
             Global Variables
             ----------------------------*/
            var modal = $(this),
                topMeasure  = parseInt(modal.css('top')),
                topOffset = modal.height() + topMeasure,
                locked = false,
                modalBG = $('.reveal-modal-bg');

            /*---------------------------
             Create Modal BG
             ----------------------------*/
            if(modalBG.length == 0) {
                modalBG = $('<div class="reveal-modal-bg" />').insertAfter(modal);
            }

            /*---------------------------
             Open & Close Animations
             ----------------------------*/
            //Entrance Animations
            modal.bind('reveal:open', function () {
                modalBG.unbind('click.modalEvent');
                $('.' + options.dismissmodalclass).unbind('click.modalEvent');
                if(!locked) {
                    lockModal();
                    if(options.animation == "fadeAndPop") {
                        modal.css({'top': $(document).scrollTop()-topOffset, 'opacity' : 0, 'visibility' : 'visible'});
                        modalBG.fadeIn(options.animationspeed/2);
                        modal.delay(options.animationspeed/2).animate({
                            "top": $(document).scrollTop()+topMeasure + 'px',
                            "opacity" : 1
                        }, options.animationspeed,unlockModal());
                    }
                    if(options.animation == "fade") {
                        modal.css({'opacity' : 0, 'visibility' : 'visible', 'top': $(document).scrollTop()+topMeasure});
                        modalBG.fadeIn(options.animationspeed/2);
                        modal.delay(options.animationspeed/2).animate({
                            "opacity" : 1
                        }, options.animationspeed,unlockModal());
                    }
                    if(options.animation == "none") {
                        modal.css({'visibility' : 'visible', 'top':$(document).scrollTop()+topMeasure});
                        modalBG.css({"display":"block"});
                        unlockModal()
                    }
                }
                modal.unbind('reveal:open');
            });

            //Closing Animation

            setTimeout(function(){
                if(!locked) {
                lockModal();
                if(options.animation == "fadeAndPop") {
                    modalBG.delay(options.animationspeed).fadeOut(options.animationspeed);
                    modal.animate({
                        "top":  $(document).scrollTop()-topOffset + 'px',
                        "opacity" : 0
                    }, options.animationspeed/2, function() {
                        modal.css({'top':topMeasure, 'opacity' : 1, 'visibility' : 'hidden'});
                        unlockModal();
                    });
                }
                if(options.animation == "fade") {
                    modalBG.delay(options.animationspeed).fadeOut(options.animationspeed);
                    modal.animate({
                        "opacity" : 0
                    }, options.animationspeed, function() {
                        modal.css({'opacity' : 1, 'visibility' : 'hidden', 'top' : topMeasure});
                        unlockModal();
                    });
                }
                if(options.animation == "none") {
                    modal.css({'visibility' : 'hidden', 'top' : topMeasure});
                    modalBG.css({'display' : 'none'});
                }
            }
                modal.unbind('reveal:close');

            }, 1500);


            modal.bind('reveal:close', function () {
                if(!locked) {
                    lockModal();
                    if(options.animation == "fadeAndPop") {
                        modalBG.delay(options.animationspeed).fadeOut(options.animationspeed);
                        modal.animate({
                            "top":  $(document).scrollTop()-topOffset + 'px',
                            "opacity" : 0
                        }, options.animationspeed/2, function() {
                            modal.css({'top':topMeasure, 'opacity' : 1, 'visibility' : 'hidden'});
                            unlockModal();
                        });
                    }
                    if(options.animation == "fade") {
                        modalBG.delay(options.animationspeed).fadeOut(options.animationspeed);
                        modal.animate({
                            "opacity" : 0
                        }, options.animationspeed, function() {
                            modal.css({'opacity' : 1, 'visibility' : 'hidden', 'top' : topMeasure});
                            unlockModal();
                        });
                    }
                    if(options.animation == "none") {
                        modal.css({'visibility' : 'hidden', 'top' : topMeasure});
                        modalBG.css({'display' : 'none'});
                    }
                }
                modal.unbind('reveal:close');
            });

            /*---------------------------
             Open and add Closing Listeners
             ----------------------------*/
            //Open Modal Immediately
            modal.trigger('reveal:open')

            //Close Modal Listeners
            var closeButton = $('.' + options.dismissmodalclass).bind('click.modalEvent', function () {
                modal.trigger('reveal:close')
            });

            if(options.closeonbackgroundclick) {
                modalBG.css({"cursor":"pointer"})
                modalBG.bind('click.modalEvent', function () {
                    modal.trigger('reveal:close')
                });
            }
            $('body').keyup(function(e) {
                if(e.which===27){ modal.trigger('reveal:close'); } // 27 is the keycode for the Escape key
            });


            /*---------------------------
             Animations Locks
             ----------------------------*/
            function unlockModal() {
                locked = false;
            }
            function lockModal() {
                locked = true;
            }

        });//each call
    }//orbit plugin call
})(jQuery);


$(document).ready(function () {
    //alert ($(document).width());
    $(".pay_checkbox__label label").click(function () {
        if ($(".pay_checkbox__label input").attr('checked', 'checked')){
        $(".pay_checkbox__label input").removeAttr('checked');}
        $(this).prev().attr('checked',true);
    });

    $(".samov_checkbox__label label").click(function () {
        if ($(".samov_checkbox__label input").attr('checked', 'checked')){
        $(".samov_checkbox__label input").removeAttr('checked');}
        $(this).prev().attr('checked',true);
    });

    $(".order_brand label").click(function () {

        if ($(".order_brand input").attr('checked', 'checked')){
        $(".order_brand input").removeAttr('checked');}
        $(this).prev().attr('checked',true);
    });

    $(".order_made label").click(function () {

        if ($(".order_made input").attr('checked', 'checked')){
        $(".order_made input").removeAttr('checked');}
        $(this).prev().attr('checked',true);
    });

    $(".order_type label").click(function () {

        if ($(".order_type input").attr('checked', 'checked')){
        $(".order_type input").removeAttr('checked');}
        $(this).prev().attr('checked',true);
    });

    $(".cur_item label").click(function () {

        if ($(".cur_item input").attr('checked', 'checked')){
        $(".cur_item input").removeAttr('checked');}
        $(this).prev().attr('checked',true);
    });

    $(".order_fields input[type='submit']").on('submit', function (event) {
        event.preventDefault();

    });



	//увеличение и уменьшение количества товара в корзине
	$('.add_item.minus').click(function(){
        //var summa = Number($('#price').text().replace(/\s/g, ''));
	    //alert (summa);
		var num = $(this).next();
        var num2 = $(this).prev().attr("value");
		//var num2 = $("input[name='count_product']").attr("value");
		if(num.text() <= 1) return false;
		else {
		    var end_text = Number(num.text())-1;
		    var end_text2 = Number(num2)-1;
			$(this).next().text(end_text);
            $(this).prev().attr("value", end_text2);
		}
		ajaxUpdateOrder('ship', 'shipping');

	});
	$('.add_item:last-child').click(function(){
       // var summa = Number($('#price').text().replace(/\s/g, ''));
        var num = $(this).prev();
        var num2 = $(this).prev().prev().prev().attr("value");
        //var num2 = $("input[name='count_product']").attr("value");
		var end_text = Number(num.html())+1;
        var end_text2 = Number(num2)+1;
        $(this).prev().text(end_text);
        $(this).prev().prev().prev().attr("value", end_text2);
        ajaxUpdateOrder('ship','shipping');
	});

    //прокрутка вперед горизонтального скрола Хиты и Распродажа
	$('.s_right').click(function() {
        var scrollblock = $(this).parent().next();
        var scrollblock_margin1 = scrollblock.children().css('margin-left');
        var scrollblock_margin2 = scrollblock.children().css('margin-right');
        scrollblock_margin1 = scrollblock_margin1.replace(/px/g, "");
        scrollblock_margin1 = Number(scrollblock_margin1);
        scrollblock_margin2 = scrollblock_margin2.replace(/px/g, "");
        scrollblock_margin2 = Number(scrollblock_margin2);
        //console.log(scrollblock_margin1);
        var position = scrollblock.scrollLeft();
        var bk_height = scrollblock.children().width();
        //console.log(position);
        $(scrollblock).animate({scrollLeft: position+bk_height+scrollblock_margin1+scrollblock_margin2+10},500);
    });
    //прокрутка назад горизонтального скрола Хиты и Распродажа
    $('.s_left').click(function() {
        var scrollblock = $(this).parent().next();
        var scrollblock_margin1 = scrollblock.children().css('margin-left');
        var scrollblock_margin2 = scrollblock.children().css('margin-right');
        scrollblock_margin1 = scrollblock_margin1.replace(/px/g, "");
        scrollblock_margin1 = Number(scrollblock_margin1);
        scrollblock_margin2 = scrollblock_margin2.replace(/px/g, "");
        scrollblock_margin2 = Number(scrollblock_margin2);
        //console.log(scrollblock_margin1);
        var position = scrollblock.scrollLeft();
        var bk_height = scrollblock.children().width();
        //console.log(position);
        $(scrollblock).animate({scrollLeft: position-bk_height-scrollblock_margin1-scrollblock_margin2},500);
    });
    //(position-bk_height)

	//Таймер акции
    var time = new Date();//Создаем время
    time.setDate(time.getDate() + 0.01);//Добавляем 24 минуты
    initializeClock('timer', time);//Запускаем счетчик


    $("#submit").click(function() {
        var fnumb = $("#a").val();
        var snumb = $("#b").val();
        $.ajax({
            url: "server.php",
            type: "POST",
            dataType: "text",
            data: ("a="+fnumb+"&b="+snumb),
            success: function(data){
                $("#block").text(data);
            }
        });
    });


    $(".product_price_info.right span").click(function () {
        var query = $(this).attr("v");
        query = query.substr(14);
        ajaxAddPrinCart(query);
            //console.log(query);
    });
    $(".inner_pro_inf div:last-child span:last-child").click(function () {
        var query = $(this).attr("v");
        query = query.substr(14);
        ajaxAddPrinCart(query);
            //console.log(query);
    });

    if($(".cur_item.left input[type='radio']").attr("checked") == "checked"){
        $(".samo_shipping").css("display", "block");
    }
    if($(".cur_item.right input[type='radio']").attr("checked") == "checked"){
        $(".ship").css("display", "block");
    }
    //alert ($("textarea[name='comment']").text());
    if($("textarea[name='comment']").text())$("textarea[name='comment']").css("display","block") ;

    //переключение радиокнопки выбора сомовывоза
    $(".cur_item.left .left span").click(function () {
        $(".ship").animate({height: 'hide'}, 200);
        $(".samo_shipping").animate({height: 'show'}, 200);

    });
    $(".cur_item.right .left span").click(function () {
        $(".samo_shipping").animate({height: 'hide'}, 200);
        $(".ship").animate({height: 'show'}, 200);
    });
    $("#comment").click(function () {

        if ($(".comment textarea").css("display") == "none") $(".comment textarea").animate({height: 'show'}, 700);
        else $(".comment textarea").animate({height: 'hide'}, 700);
    });

  /*  $("#order").validate({
        rules:{

            name:{
                required: true,
                minlength: 4,
                maxlength: 16,
            },

            phone:{
                required: true,
                minlength: 6,
                maxlength: 25,
            },
            email:{
                required: true,
                email : true,
            },
            addres:{
                required: true,
                minlength: 4,
            },
        },

        messages:{

            name:{
                required: "Это поле обязательно для заполнения",
                minlength: "Логин должен быть минимум 4 символа",
                maxlength: "Максимальное число символо - 16",
            },

            phone:{
                required: "Это поле обязательно для заполнения",
                minlength: "Пароль должен быть минимум 6 символа",
                maxlength: "Пароль должен быть максимум 16 символов",
            },
            email:{
                required: "Это поле обязательно для заполнения",
                email: "Не правильный E-mail",
            },
            addres:{
                required: "Это поле обязательно для заполнения",
                minlength: "Адрес должен быть минимум 4 символа",
            },

        }

    });*/

    //Маска для телефона
   // $(".field_input.left input[name='phone']").mask("+7 (999) 999-9999");

});

//Функция возврата оставшегося времени
function getTimeRemaining(endtime){
    var t = Date.parse(endtime) - Date.parse(new Date());
    var seconds = Math.floor( (t/1000) % 60 );
    if (seconds < 10) {
        seconds = "0"+seconds;
        //alert(seconds);
    }
    var minutes = Math.floor( (t/1000/60) % 60 );
    var hours = Math.floor( (t/(1000*60*60)) % 24 );
    var days = Math.floor( t/(1000*60*60*24) );
    return {
        'total': t,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
    };
}
//Функция таймера
function initializeClock(id_, endtime){
    var minutesSpan1 = $('.minute .first');
    var minutesSpan2 = $('.minute .second');
    var secondsSpan1 = $('.secound .first');
    var secondsSpan2 = $('.secound .second');
    function updateClock(){
        var t = getTimeRemaining(endtime);
        minutesSpan1.html(triades(t.minutes)[0]);
        minutesSpan2.html(triades(t.minutes)[1]);
        secondsSpan1.html(triades(t.seconds)[0]);
        secondsSpan2.html(triades(t.seconds)[1]);
        array_min = ["минута","минуты","минут"];
        array_sec = ["секунда","секунды","секунд"];
        $(".timer_clock.minute p").html(getWord(t.minutes, array_min));
        $(".timer_clock.secound p").html(getWord(t.seconds, array_sec));
        if(t.total<=0){
            clearInterval(timeinterval);
        }
    }
    updateClock();
    var timeinterval = setInterval(updateClock,1000);
    //Функция склонения слов
    function getWord(number, suffix) {
        var keys = new Array(2, 0, 1, 1, 1, 2);
        var mod = number % 100;
        var suffix_key = mod > 4 && mod < 20 ? 2 : keys[Math.min(mod%10, 5)];
        return suffix[suffix_key];
    }
}
//Функция парсенга значения в массив по 1-му значению
function triades(dig){
    var array = [],
        mask = dig.toString(),
        key = (mask.length)%1,
        first_sp = (key==0) ? 1:key,
        i = 0;
    while(mask.length>1)
    {
        var sub_str, k;
        k = (i==0) ? first_sp:1;
        sub_str = mask.substr(0,k);
        array.push(sub_str);
        mask = mask.substr(k,mask.length-k);
        if(mask.length == 1) {array.push(mask); break;}
        i++;
    }
    return array;
}
function ajaxAddPrinCart(data){
    $.ajax({
        url: "/function.php",
        type: "POST",
        data:(data),
        dataType: "text",
        success: function () {
            //alert(data);
            $('#modalCart').reveal();
            setTimeout(function(){
                $("#cart").load(location.href+" #cart>*","");
                //$("modalCart").css("display", "none");
            }, 1500);
        }
    });
}
function ajaxUpdateOrder(form, form2){
    $.ajax({
        url: "/function.php",
        type: "POST",
        data:jQuery("#"+form).serialize(),
        dataType: "text",
        success: function () {
            $("#"+form2).load(location.href+" #"+form2+">*","");
        }
    });

}
function call() {
    var msg   = $('#order').serialize();
    $.ajax({
        type: 'POST',
        url: '/function.php',
        data: msg,
        success: function(data) {
            $('#modalCart_1').reveal();
            setTimeout(function(){
                window.location="http://nd-shop.local";
            }, 1800);
        },
        error:  function(xhr, str){
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    });
}
//геокодирование доступно только с https
/*navigator.geolocation.getCurrentPosition(succes, error);
function succes(position){
    var sh = position.coords.latitude;
    var dol = position.coords.longitude;
    var coord = sh+","+dol;
    alert(coord);
    ajaxgetplace(coord);
}
function error(e){
    alert("что-то пошло не так");
}

function ajaxgetplace(data) {
    $.ajax({
        url: "/function.php",
        type: "POST",
        data: (data),
        dataType: "text",
        success: function () {
            setTimeout(function () {
                location.reload()
            }, 1500);
        }
    });
}*/





