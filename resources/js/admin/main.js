(function ($) {
    "use strict";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.delete', function () {
        var id = $(this).attr('data-id');
        $('#id').val(id);
    });

    // Jquery Mask
    $('.money').mask("#.##0,00", { reverse: true });
    $('.cm').mask('##0,00', { reverse: true });
    $('.mes_ano').mask('00/0000');

    $('.summernote').summernote({
        lang: 'pt-BR',
        height: 200,
    });


    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 5,
        responsiveClass: true,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
                loop: false
            }
        }
    });


    $('.select').select2({
        placeholder: "Selecione uma opção",
    });

    //Geolocalização
    $(function($){       

        $("#geocompletecad").geocomplete({
            country: 'BR',
            map: "#mapa",
            details: "form",
            types: ["geocode", "establishment"],
        });

        $("#find").click(function(){
            $("#geocompletecad").trigger("geocode");
        }).click();

    });


    //Tabs
    let url = location.href.replace(/\/$/, "");

    if (location.hash) {
        const hash = url.split("#");
        $('#tabStep a[href="#' + hash[1] + '"]').tab("show");
        url = location.href.replace(/\/#/, "#");
        history.replaceState(null, null, url);
        setTimeout(() => {
            $(window).scrollTop(0);
        }, 400);
    }

    $('a[data-toggle="tab"]').on("click", function () {
        let newUrl;
        const hash = $(this).attr("href");
        newUrl = url.split("#")[0] + hash;
        newUrl += "/";
        history.replaceState(null, null, newUrl);
    });

    require('./pages/servicos.js');

})(jQuery, window, document);