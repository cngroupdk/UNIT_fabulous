(function ($) {
    $(window).scroll(function () {

        if ($(window).scrollTop() > 50) {
            $('.navbar').addClass('nav-bg');
        }
        else {
            $('.navbar').removeClass('nav-bg');
        }
    });

    $(".navbar-toggle").on("click", function () {
        $(this).toggleClass("active");
    });

    $(".feature-item").on("click", function () {
        $(".feature-item").removeClass('active')
        $(this).addClass("active");

        var animation = $(this).data('animation');

        $(".animation-item").removeClass('active');
        $('.animation-item[data-animation="' + animation + '"]').addClass('active');
    });
})(jQuery);


$('select').select2({
    tags: true
});



var docHeight = $(window).height();
var footerHeight = $('footer').outerHeight();
var footerTop = $('footer').position().top + footerHeight;


if (footerTop < docHeight) {
    $('footer').css('margin-top', (docHeight - footerTop) + 'px');
}


$('select').select2({
    tags: true
});
$('select').select2({
    tags: true
});
new WOW().init();
$('.rating').click(function(){
    $(this).siblings('.rating').removeClass('active');
    $(this).addClass('active');

    var value = $(this).prevAll('.rating').length - 1;
    $(this).closest('li').find('inpu').val(value);

    console.log(value);

})