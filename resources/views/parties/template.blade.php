<!DOCTYPE html>
<html lang="fr">

<head>
    {{-- header('Content-Type: text/plain; charset=utf-8'); --}}
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name') }} | {{ isset($titre)?$titre:"" }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/PlaLogo.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel=" stylesheet" href="{{ asset('assets/font/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('js/parsley/parsley.css') }}">
    <link href="{{ asset('js/sweetalert/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('css/summernote/summernote.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/read-more.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/aos.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @yield('autres-tyle')
</head>

<body>
    @include('parties.menu')

    @yield('content')


    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>

    <script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{ asset('js/parsley/js/parsley.js') }}"></script>
<script src="{{ asset('js/parsley/i18n/fr.js') }}"></script>

<script src="{{asset('js/summernote/summernote.min.js')}}"></script>
{{--  <script src="{{asset('assets/js/readmore.min.js')}}"></script>
<script src="{{asset('assets/js/read-more.es5.js')}}"></script>
<script src="{{asset('assets/js/read-more.js')}}"></script>  --}}
<script src="{{asset('assets/js/aos.js')}}"></script>
<script src="{{asset('assets/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/scriptcarousel.js') }}"></script>
<script async src='https://stackwhats.com/pixel/4958f4367609133da9d63d60b8f3ca'></script>


@yield("autres_script")
    <script>
//         if (document.querySelector('.js-read-more')) {
//   ReadMore.init();
// }
        // $('.bloc-item').readmore({
        //     speed: 100,
        //     moreLink: '<a href="#">Lire plus</a>',
        //     lessLink: '<a href="#">Reduire</a>'
        // })
        $(window).scroll(function () {

            if ($(this).scrollTop() > 40) {
                $(".navbar").addClass('bg-white');
                $('.topbar').addClass('active')

            } else {
                $(".navbar").removeClass('bg-white');
                $('.topbar').removeClass('active')
            }
        });
        $(".select2_demo_3").select2({
                placeholder: "Recherche",
                allowClear: true
            });
        $('.menu-toggle').click(function () {
            $(this).toggleClass('active')
            $('.full-menu').addClass('active')
        })
        $('.close-menu').click(function () {
            $('.menu-toggle').removeClass('active')
            $('.full-menu').removeClass('active')
        })
        $(window).on('load', function () {
            $('.loading').addClass('complete');
        });
        $('.scrollTop').click(function () {
            var getElement = $(this).attr('href');
            if ($(getElement).length) {
                var getOffset = $(getElement).offset().top - $('.navbar').height();
                $('html,body').animate({
                    scrollTop: getOffset
                }, 1000);
            }
            return false;
        })
        $(document).ready(function () {
            $('.summernote').summernote();
        $("#formnewsletter").on("submit", function (e) {
            e.preventDefault();
            //alert('ok');
            
            // add("#formnewsletter", '#btNewsletter', '../add.newsletter')
        });
    });

    function add(form, idLoad, url) {
        var f = form;

        var u = url;
        $(idLoad).addClass('disabled');
        $.ajax({
            url: u,
            method: "POST",
            data: $(f).serialize(),
            success: function (data) {
                $(idLoad).removeClass('disabled');
                if (!data.reponse) {
                    swal({
                        title: data.msg,
                        icon: 'error'
                    })
                } else {
                    swal({
                        title: data.msg,
                        icon: 'success'
                    })

                    $(f)[0].reset();
                }

            },
        });

    }



    </script>
</body>

</html>
