<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
{{-- header('Content-Type: text/plain; charset=utf-8') --}}
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <title>{{config('app.name')}} | {{isset($titre)?$titre:""}}</title>
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
<style>
    /* Cibler l'iframe par son ID */
#iframe-example {
  border: 2px solid #ccc; /* Ajouter une bordure de 2 pixels avec une couleur grise */
  border-radius: 10px; /* Ajouter des coins arrondis à la bordure */
  box-shadow: 3px 3px 5px #888; /* Ajouter une ombre portée */
  padding: 30px;

}
iframe {
  overflow-y: scroll; /* Ajoute une barre de défilement verticale */
  scrollbar-width: thin; /* Définit l'épaisseur de la barre de défilement */
  scrollbar-color: #DF2219 #f5f5f5; /* Définit la couleur de la barre de défilement */
}

/* Cibler l'iframe par sa classe */
.iframe-custom {
  width: 100%; /* Définir une largeur de 100% pour remplir complètement le conteneur parent */
  height: 600px; /* Définir une hauteur fixe de 400 pixels */
}
/* Styles pour la barre de défilement */
::-webkit-scrollbar {
  width: 10px; /* Définit la largeur de la barre de défilement pour les navigateurs WebKit (Chrome, Safari, etc.) */
}

::-webkit-scrollbar-thumb {
  background-color: #DF2219; /* Définit la couleur du curseur de la barre de défilement pour les navigateurs WebKit */
}

::-webkit-scrollbar-track {
  background-color: #f5f5f5; /* Définit la couleur de fond de la barre de défilement pour les navigateurs WebKit */
}
    iframe body{
    font-size: inherit!important;

  }
    #my-iframe {
        /* Définissez une hauteur minimale pour l'iframe */
        min-height: 700px;
    }

    /* Styles pour le paragraphe */
/* p {
  font-family: Arial, sans-serif;
  font-size: 14px;
  line-height: 1.5;
  margin-bottom: 10px;
} */

/* Styles pour les titres */
/* h1, h2, h3, h4, h5, h6 {
  font-family: "Times New Roman", serif;
  font-weight: bold;
  margin-top: 20px;
  margin-bottom: 10px;
} */

/* Styles pour les listes à puces */
/* ul {
  list-style-type: disc;
  margin-left: 20px;
} */

/* Styles pour les listes numérotées */
/* ol {
  list-style-type: decimal;
  margin-left: 20px;
} */

/* Styles pour les liens hypertexte */
/* a {
  color: #007bff;
  text-decoration: underline;
} */

/* Autres styles personnalisés */
/* ... */

</style>
<body>
    <div class="loading">
        <div id="loader"></div>
    </div>
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


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-DFXMGDXBEF"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-DFXMGDXBEF');
</script>


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
