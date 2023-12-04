
<div class="full-menu">
    <div class="close-menu">
        <span></span>
        <span></span>
    </div>
    <div class="content">
        <h1>Menu</h1>
        <hr>
        <ul>
            <li>
                <a href="{{ route('home') }}" class="nav-link">
                    @lang('info.m1')
                </a>
            </li>
            <li>
                <a href="{{route('about')}}" class="nav-link">
                    @lang('info.m2')
                </a>
            </li>
            <li>
                <a href="{{ route('expertise') }}" class="nav-link ">
                    @lang('info.m3')
                </a>
            </li>
            <li>
                <a href="{{ route('team') }}" class="nav-link ">
                    @lang('info.m4')
                </a>
            </li>
            <li>
                <a href="{{ route('presence') }}" class="nav-link ">
                    @lang('info.m6')
                </a>
            </li>
            <li>
                <a href="{{ route('publication') }}" class="nav-link ">
                    @lang('info.m5')
                </a>
            </li>

        </ul>
        <h1> @if (!empty($accueil->textsuivre))
            <span>
                {{ $accueil->textsuivre }}
            </span>
            @endif</h1>
        <hr>
        @if (!empty($accueil->telphone))
        <p class="mb-0">
            <i class="fas fa-phone"></i>
            <span>{{ $accueil->telphone }}</span>
        </p>
        @endif
             <div class="net-work d-flex justify-content-center mt-4">
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
        @if (!empty($accueil->email))
                        <p class="mb-0">
                            <i class="fas fa-envelope"></i>
                            <span> {{ $accueil->email }}</span>
                        </p>
                        @endif
        <div class="net-work d-flex justify-content-center mt-4">
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
</div>
