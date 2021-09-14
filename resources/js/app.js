require('./bootstrap')

import 'slick-carousel';
import 'owl.carousel';
import { Fancybox } from '@fancyapps/ui/src/Fancybox/Fancybox.js';

$(function () {
    $('body').on('click', '.nav-link', function () {
        $('.nav-link').removeClass('active')
        $(this).addClass('active')
    })

    $(document).on('scroll', function () {
        var nav = $('.navbar')
        nav.toggleClass('navbar-scrolled', $(this).scrollTop() > nav.height())
    })

    $('a').on('click', function (e) {
        let target = $(this).attr('href')
        let divSize = parseFloat($('nav').height())
        let targetId = target.substring(target.indexOf('#'), target.length)
        let targetIsInTheSamePage = $('body').find(targetId).length

        if (targetIsInTheSamePage) {
            target = target.substring(target.indexOf('#'), target.length)

            $('html, body').animate(
                {
                    scrollTop: $(target).position().top - divSize
                },
                350
            )
        }
    })

    /* ===================================
        Side Menu
    ====================================== */
    if ($('#sidemenu_toggle').length) {
        $('#sidemenu_toggle').on('click', function () {
            $('.pushwrap').toggleClass('active')
            $('.side-menu').addClass('side-menu-active'),
                $('#close_side_menu').fadeIn(700)
        }),
            $('#close_side_menu').on('click', function () {
                $('.side-menu').removeClass('side-menu-active'),
                    $(this).fadeOut(200),
                    $('.pushwrap').removeClass('active')
            }),
            $('.side-nav .navbar-nav').on('click', function () {
                $('.side-menu').removeClass('side-menu-active'),
                    $('#close_side_menu').fadeOut(200),
                    $('.pushwrap').removeClass('active')
            }),
            $('#btn_sideNavClose').on('click', function () {
                $('.side-menu').removeClass('side-menu-active'),
                    $('#close_side_menu').fadeOut(200),
                    $('.pushwrap').removeClass('active')
            })
    }

    // Navbar Scroll Function
    var $window = $(window)
    $window.scroll(function () {
        var $scroll = $window.scrollTop()
        var $navbar = $('.header-nav')
        if (!$navbar.hasClass('sticky-bottom')) {
            if ($scroll > 250) {
                $navbar.addClass('fixed-menu')
            } else {
                $navbar.removeClass('fixed-menu')
            }
        }
    })

    Fancybox.bind('[data-fancybox]', {})

    // Banner Carousel / Owl Carousel
    $('.banner-carousel').owlCarousel({
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        loop: true,
        margin: 0,
        nav: true,
        dots: false,
        smartSpeed: 500,
        autoHeight: true,
        autoplay: true,
        autoplayTimeout: 5000,
        navText: [
            '<span class="fa fa-angle-left">',
            '<span class="fa fa-angle-right">'
        ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1024: {
                items: 1
            }
        }
    })

    $('.grid-blog').masonry({
        // options
        itemSelector: '.item',
        columnWidth: 10
    })

})
