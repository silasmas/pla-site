<header class="fixed-top">
    <div class="topbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-8 col-md-4">
                    <div class="d-flex net-work">

                        @if (!empty($accueil->textsuivre))
                        <span>
                            {{ $accueil->textsuivre }}
                        </span>
                        @endif


                        @if (!empty($accueil->facebook))
                        <a href="{{ $accueil->facebook }}">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        @endif

                        @if (!empty($accueil->tweeter))
                        <a href="{{ $accueil->tweeter }}">
                            <i class="fab fa-twitter"></i>
                        </a>
                        @endif

                        @if (!empty($accueil->linkedin))
                        <a href="{{ $accueil->linkedin }}">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        @endif
                        @if (!empty($accueil->google))
                        <a href="{{ $accueil->google }}">
                            <i class="fab fa-google-plus"></i>
                        </a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-8 col-4 col-md-8">
                    <div class="d-flex contact-info justify-content-end">

                        @if (!empty($accueil->adresse))
                        <p class="mb-0">
                            <i class="fas fa-map-marker"></i>
                            <span>{{ $accueil->adresse }}</span>
                        </p>
                        @endif
                        @if (!empty($accueil->email))
                        <p class="mb-0">
                            <i class="fas fa-envelope"></i>
                            <span> {{ $accueil->email }}</span>
                        </p>
                        @endif

                        @if (!empty($accueil->telphone))
                        <p class="mb-0">
                            <i class="fas fa-phone"></i>
                            <span>{{ $accueil->telphone }}</span>
                        </p>
                        @endif

                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <p class="mb-0">
                            <a rel="alternate" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                class="{{App::currentLocale() ===$localeCode?"active":""}}">
                                {{ $properties['native']}}
                            </a>
                        </p>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">
                <img src="{{asset('assets/images/PLA logo.png')}}" alt="img">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link {{$titre==="Accueil"||$titre==="Home"?"active":""}}  me-4"
                            aria-current="page" href="{{ route('home') }}">@lang('info.m1')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$titre==="About Us"||$titre==="Apropo"?"active":""}} me-4"
                            href="{{route('about') }}"> @lang('info.m2')</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link {{$titre==="Expertise"||$titre==="Expertise"?"active":""}} me-4"
                                href="{{ route('expertise') }}">@lang('info.m3')</a>
                        <div class="subMenu">
                            <ul>
                                <li class="list-item">
                                    <a href="#" class="list-link">@lang('info.expertises.menu')</a>
                                    @if (!$secteur->isEmpty())
                                        <div class="dropMenu dropMenu-lg">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <ul>
                                                            @forelse ($secteur as $sec)
                                                            <li><a href="{{ route('detailExpertise',['id'=>$sec->id,'p'=>$sec->titre1]) }}">{{ $sec->titre1 }}</a></li>
                                                            @empty

                                                            @endforelse
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </li>
                                <li class="list-item">
                                    <a href="#" class="list-link ">@lang('info.domaine.menu')</a>
                                    @if (!$domaine->isEmpty())
                                    <div class="dropMenu dropMenu-lg">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <ul>
                                                        @forelse ($domaine as $sec)
                                                        <li><a href="{{ route('detailCompetence',['id'=>$sec->id,'p'=>$sec->titre1]) }}">{{ $sec->titre1 }}</a></li>
                                                        @empty

                                                        @endforelse
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{$titre==="Equipe"||$titre==="Team"?"active":""}} me-4"
                            href="{{ route('team') }}">@lang('info.m4')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$titre==="Presence"||$titre==="Presence"?"active":""}} me-4"
                            href="{{ route('presence') }}">@lang('info.m6')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$titre==="Publications"||$titre==="publications"?"active":""}} "
                            href="{{ route('publication') }}">@lang('info.m5')</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
