export default {
  init() {
    // JavaScript to be fired on all pages


    $(window).scroll(function(){
        var offset = 40,
            header = $('.header-main'),
            scroll = $(window).scrollTop();

        if (scroll >= offset) header.addClass('fixed-top');
        else header.removeClass('fixed-top');
    });

    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 500);
        return false;
    });
    
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
