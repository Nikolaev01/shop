$(document).ready(function () {
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

	//увеличение и уменьшение количества товара в корзине
	$('.add_item:first-child').click(function(){
		var num = $(this).next();
		if(num.text() <= 1) return false;
		else {
			var end_text = Number(num.text())-1;
			$(this).next().text(end_text);
		}
	});
	$('.add_item:last-child').click(function(){
		var num = $(this).prev();
		var end_text = Number(num.html())+1;
		$(this).prev().text(end_text);
	});


	$('.s_right').click(function() {
        var scrollblock = $(this).parent().next();
        var scrollblock_margin1 = scrollblock.children().css('margin-left');
        var scrollblock_margin2 = scrollblock.children().css('margin-right');
        //console.log(scrollblock.css('border-width'));
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
    time.setDate(time.getDate() + 0.1);//Добавляем 24 минуты
    initializeClock('timer', time);//Запускаем счетчик
});
//Функция возврата оставшегося времени
function getTimeRemaining(endtime){
    var t = Date.parse(endtime) - Date.parse(new Date());
    var seconds = Math.floor( (t/1000) % 60 );
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

    var timeinterval = setInterval(function(){
        var t = getTimeRemaining(endtime);
        minutesSpan1.html(triades(t.minutes)[0]);
        minutesSpan2.html(triades(t.minutes)[1]);
        secondsSpan1.html(triades(t.seconds)[0]);
        secondsSpan2.html(triades(t.seconds)[1]);
        if(t.total<=0){
            clearInterval(timeinterval);
        }
    },1000);
}
//Функция парсенга значения
function triades(n){
    var x=parseInt(n,10).toString();
    var r=/(\d+)(\d{1})/;
    while(r.test(x)){
        x=x.replace(r,'$1,$2');
    };
    return x.split(',');
}