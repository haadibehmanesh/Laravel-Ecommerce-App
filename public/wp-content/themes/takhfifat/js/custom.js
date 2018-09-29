jQuery(document).ready(function($) {
	/*--
	 $("#myBtn").click(function(){
	 $("#myModal").modal();
	 });

	 //
	 $("#myBtn2").click(function(){
	 $("#myModal2").modal();
	 });
	 //
	 $(".button_modal2").click(function(){
	 setTimeout(function(){ 	$("#myBtn2").click();}, 500);
	 });

	 --*/

// menu respansive

    $(window).resize(function () {
        if ($(window).width() >= 1195) {
            $('.box_button').css('display', 'none');
            $('.multiple_menu').css('display', 'block');
        }
        else {
            $('.box_button').css('display', 'block');
        }

    });


    $('.menu_icon').click(function () {
        $('.multiple_menu').slideDown();
        $('.menu_icon').hide();
        $('.button_menu').show();
    });


    $('.button_menu').click(function () {
        $('.multiple_menu').slideUp();
        $('.button_menu').hide();
        $('.menu_icon').show();
    });


    $('<span class="icon_respan">+</span>').appendTo('.multiple_menu > .menu-item-has-children');
    $('.icon_respan').on('click', function () {
        $(this).parent().find('.mpm_content').slideToggle(400);
        var x = $(this).text();
        if (x == '+') {
            $(this).text('-');
        }
        if (x == '-') {
            $(this).text('+');
        }
    });


//cart_list
/*
    $(".content_mini_cart a").click(function (e) {
        $("div.main_cart_list").fadeIn();
    });

    $(".user_login a").click(function (e) {
        $("div.main_cart_list").fadeIn();
    });

    var box = $('div.main_cart_list');
    var button = $('.content_mini_cart a');

    $(".content_mini_cart").click(function () {
        $("div.main_cart_list").fadeIn();
        return false;
    });

    $(document).click(function () {
        $("div.main_cart_list").fadeOut();
    });

    $("div.main_cart_list").click(function (e) {
        e.stopPropagation();
    });

*/
    // Note the window height + offset
    if (($(window).height() + 100) < $(document).height()) {
        $('#top-link-block').removeClass('hidden').affix({
            offset: {top: 100}
        });
    }



});