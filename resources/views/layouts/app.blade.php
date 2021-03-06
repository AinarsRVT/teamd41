<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SIA Būvnesis - Tavs uzticamākais partneris!</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Aināra inline scripts -->
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>



    <script>
        //File managment
        $(document).ready(function () {

            //Form Validation
            Parsley.addMessages('lv', {
                defaultMessage: "Šis ieraksts veikts nekorekti.",
                type: {
                    email:        "Šeit jāieraksta derīgs e-pasts.",
                    phone_number: "Šeit ir jaievada telefona nr.",
                    url:          "Šeit jāieraksta korekts url.",
                    number:       "Šeit jāieraksta derīgs skaitlis.",
                    integer:      "Šeit jāieraksta vesels skaitlis.",
                    digits:       "Šeit jāieraksta cipari.",
                    alphanum:     "Šeit derīgi tikai alfabēta burti vai cipari."
                },
                notblank:       "Šis ieraksts nedrīkst būt tukšs.",
                required:       "Šis ieraksts ir obligāti jāaizpilda.",
                pattern:        "Šis ieraksts aizpildīts nekorekti.",
                min:            "Šai vērtībai jābūt lielākai vai vienādai ar %s.",
                max:            "Šai vērtībai jābūt mazākai vai vienādai ar %s.",
                range:          "Šai vērtībai jābūt starp %s un %s.",
                minlength:      "Vērtībai jābūt vismaz %s simbolu garai.",
                maxlength:      "Vērtībai jābūt %s simbolus garai vai īsākai.",
                length:         "Šīs vērtības garums ir neatbilstošs. Tai jābūt %s līdz %s simbolus garai.",
                mincheck:       "Jāizvēlas vismaz %s varianti.",
                maxcheck:       "Jāizvēlas %s varianti vai mazāk.",
                check:          "Jāizvēlas no %s līdz %s variantiem.",
                equalto:        "Šai vērtībai jāsakrīt."
            });

            Parsley.setLocale('lv');
            $('form').parsley();

            //Show functionality
            $('[data-show]').each(function (e) {
                var $thisElement = $(this);
                var $relatedElement = $('[data-showable="' + $thisElement.data('show') + '"]');

                //On trigger click
                $thisElement.find('[data-show-trigger]').each(function () {
                    $(this).click(function () {
                        //Show the showable field
                        $relatedElement.slideDown();

                        //Add required to the showable field
                        $relatedElement.find('[data-add-required]').each(function () {
                            $(this).prop('required',true);
                        });

                        //Hide "show" field
                        $thisElement.hide();
                    });
                });
            });

            //Hides "showbale" fields
            $('[data-showable]').each(function (e) {
                $(this).hide();
            });
        });
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>


    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container" id="app">
            <a class="navbar-brand js-scroll-trigger" href="/">BŪVGALDNIEKS</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Izvēlne
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/#services">Pakalpojumi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#about">Par mums</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#portfolio">Projekti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#contact">Kontakti</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Pierakstīties</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">Reģistrēties</a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if(Auth::check())
                                    <a class="dropdown-item" href="/profile">Mans profils</a>
                                    <a class="dropdown-item" href="/orders">Projekti</a>
                                @endif
                                @if(Auth::user()->status == 2 || Auth::user()->status == 3)
                                    <a class="dropdown-item" href="/worker">Darbinieks</a>
                                @endif
                                @if(Auth::user()->status == 3)
                                    <a class="dropdown-item" href="/admin">Administrators</a>
                                @endif

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Iziet') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

     @yield('content')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Visas tiesības paturam &copy; BUVGALDNIEKS</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li class="list-inline-item">
                            <a href="#">Privātuma politika</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">Lietošanas noteikumi</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
