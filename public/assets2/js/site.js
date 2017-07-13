(function($){
    $(document).ready( function(){
        // bxslider
        if( jQuery().bxSlider ) {
            $('.recomended-slide').bxSlider({
                slideMargin: 0,
                autoReload: true,
                pager: false,
                auto: false,
                speed: 800,
                moveSlides: 1,
                nextText: '',
                prevText: '',
                slideMargin: 25,
                breaks: [
                    {screen:0, slides:1},
                    {screen:560, slides:2},
                    {screen:768, slides:3},
                    {screen:992, slides:5}
                ]
            });

            $('.section-detail-slider-action').bxSlider({
                slideMargin: 0,
                autoReload: true,
                pager: true,
                auto: true,
                speed: 800,
                moveSlides: 1,
                nextText: '',
                prevText: '',
                slideMargin: 0
            });
        }

        $(window).on('resize load', function() {
            $('.section-grid-small, .section-grid .section-grid-small .ratio-full').css('height', ($('.section-grid-big').height() / 2) - 5);
        });

        // Scroll: Check to see if the window is top if not then display button
        $(window).scroll(function(){
            if ($(this).scrollTop() > 600) {
                $('.scrollToTop').fadeIn();
            } else {
                $('.scrollToTop').fadeOut();
            }
        });

        // Scroll: Click event to scroll to top
        $('.scrollToTop').click(function(){
            $('html, body').animate({scrollTop : 0},800);
            return false;
        });

        var $window = $(window);

        function checkWidth() {
            var windowsize = $window.width();

            if ( windowsize < 992 ) {
                $('.navbar-navigation').insertAfter('.navbar-brand');
                $('.section-detail-meta').insertAfter('.section-detail-slider');
                $('.section-filter .show-filter-btn').attr('data-toggle', 'collapse');
            };

            if ( windowsize > 992 ) {
                $('.navbar-navigation').insertAfter('.navbar-header');
                $('.section-detail-meta').insertBefore('.section-detail-similar');
                $('.section-filter .show-filter-btn').removeAttr('data-toggle', 'collapse');
            }

            if ( windowsize > 768 ) {
                $(".navbar-top .dropdown").hover( function() {
                    $('.dropdown-menu', this).stop( true, true ).fadeIn(0);
                    $(this).toggleClass('open');
                    //$('span', this).toggleClass("caret caret-up");
                }, function() {
                    $('.dropdown-menu', this).stop( true, true ).fadeOut(0);
                    $(this).toggleClass('open');
                    //$('span', this).toggleClass("caret caret-up");
                });
            } else {
            }
        }

        // Execute on load
        checkWidth();
        // Bind event listener
        $(window).resize(checkWidth);

        $('.navbar-navigation').on('show.bs.collapse', function () {
            $('.section-feedback').addClass('hidden');
        });

        $('.navbar-navigation').on('hidden.bs.collapse', function () {
            $('.section-feedback').removeClass('hidden');
        });


        // iCheck
        $('input').iCheck({
            checkboxClass: 'icheckbox_minimal-orange',
            radioClass: 'iradio_minimal-orange',
            increaseArea: '20%' // optional
        });


        // filter_harga
        $("#filter_harga").ionRangeSlider({
            type: "double",
            grid: false,
            min: 0,
            max: 10000000,
            from: 0,
            to: 10000000,
            prefix: "Rp ",
            step: 10000,
            prettify_enabled: true,
            prettify_separator: "."
        });


        $('.product-item').matchHeight({
            byRow: true
        });


        $(window).on("scroll load resize", function(){
            var headerHeight = $('.section-header').outerHeight();
            var filterHeight = $('.section-filter').outerHeight();

            if ($(window).width() > 992 ) {
                if ($(window).scrollTop() < headerHeight + filterHeight) {
                    $(".section-filter").removeClass("section-fixed");
                    $(".section-filter-block").removeClass("dropdown-menu");
                    $(".section-product").css("padding-top", 0);
                }

                if ($(window).scrollTop() > headerHeight) {
                    $(".section-filter").addClass("section-fixed");
                    $(".section-filter-block").addClass("dropdown-menu");
                    $(".section-product").css("padding-top", 120);
                }
            }

            if ($(window).width() > 992 ) {
                var headerHeight = $('.section-header').outerHeight(true);
                var contactHeight = $('.section-contact-top').outerHeight(true);
                var cartWidth = $('#cart-wrap').outerWidth(true);
                //$('#cart-wrap').css('width', cartWidth - 50);

                $('#cart-wrap').affix({
                    offset: {
                        top: headerHeight + contactHeight + 25,
                        bottom: function () {
                            return (this.bottom = $('.section-footer-wrap').outerHeight(true) + 50)
                        }
                    }
                });

                $('#cart-wrap').on('affix.bs.affix', function () {
                    $(this).css('width', cartWidth - 50);
                });

                $('#cart-wrap').on('affix-bottom.bs.affix', function () {
                    $(this).css('width', cartWidth - 50);
                });
            }

            if ($(window).width() < 992 ) {
                $('#cart-wrap').css('width', 'auto');
            }
        });

        $('#collapse-filter').on('show.bs.collapse', function () {
            $('.section-filter .show-filter').text('Sembunyikan Filter');
            $(".section-filter").addClass("section-collapse");
            $(".section-filter-block").addClass("dropdown-menu");
        });

        $('#collapse-filter').on('hidden.bs.collapse', function () {
            $('.section-filter .show-filter').text('Tampilkan Filter');
            $(".section-filter").removeClass("section-collapse");
            $(".section-filter-block").removeClass("dropdown-menu");
        });


        // plugin bootstrap minus and plus for qty
        $('.btn-number').click(function(e){
            e.preventDefault();

            fieldName = $(this).attr('data-field');
            type      = $(this).attr('data-type');
            var input = $("input[name='"+fieldName+"']");
            var currentVal = parseInt(input.val());
            if (!isNaN(currentVal)) {
                if(type == 'minus') {

                    if(currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    }
                    if(parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if(type == 'plus') {

                    if(currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
                    }
                    if(parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });

        $('.input-number').focusin(function(){
            $(this).data('oldValue', $(this).val());
        });

        $('.input-number').change(function() {
            minValue =  parseInt($(this).attr('min'));
            maxValue =  parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());

            name = $(this).attr('name');
            if(valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
            } else {
                alert('Sorry, the minimum value was reached');
                $(this).val($(this).data('oldValue'));
            }
            if(valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
            } else {
                alert('Sorry, the maximum value was reached');
                $(this).val($(this).data('oldValue'));
            }
        });

        $(".input-number").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });

        $(".section-checkout-cart-list").mCustomScrollbar({
            theme: "dark",
            scrollbarPosition: "outside"
        });

        $(".section-filter-list").mCustomScrollbar({
            scrollbarPosition: 'inside',
            theme: 'rounded'
        });
    });
})(jQuery);