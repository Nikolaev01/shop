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




});
