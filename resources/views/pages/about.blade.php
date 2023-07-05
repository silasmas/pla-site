@extends('parties.template',['titre'=>__('info.titrepage.about')])


@section('content')
    @include('parties.menu_mobile')
    <div class="banner-sm">
        <img src="{{ asset('assets/images/img3.jpg') }}" alt="">
    </div>
    <div class="about about-sm">
        <div class="container">
            <div class="row g-3 g-sm-5 g-lg-5">
                <div class="col-lg-6 col-sm-6 ">
                    <h2>{{ !empty($about->quisommenous) ? $about->quisommenous : '' }}</h2>
                    <h1>{{ !empty($about->titrecabinet) ? $about->titrecabinet : '' }}</h1>

                    @if (!empty($about->contenu))
                        <div class='row'>
                            <div class="col-sm-12">
                                <p>
                                    @if (Str::length($about->contenu) > 600)
                                        {!! Str::limit($about->contenu, 1000, '...') !!}
                                    @else
                                        {!! $about->contenu  !!}
                                    @endif

                                </p>
                            </div>
                            <div class="col-sm-12">
                                @if (Str::length($about->extrait) > 800)
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal-read-more"
                                        class="read">@lang('info.apropo.accueilBtn')</a>
                                @endif
                            </div>
                        </div>
                    @endif

                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="card">
                        <img src="{{ !empty($about->photoabout) ? asset('storage/' . $about->photoabout) : asset('img/default.png') }}"
                            alt="img">
                        <div class="block-badge">
                            <span>{{ !empty($about->nbrexperience) ? $about->nbrexperience : '' }}</span>
                            <span>{{ !empty($about->temps) ? $about->temps : '' }}</span>
                            <span>@lang('info.apropo.s11'){{ !empty($about->nbrexperience) ? ($about->nbrexperience > 2 ? 's' : '') : '' }}</span>
                        </div>
                    </div>
                    <div class="mt-3 row g-3 block-hidden2">
                        <div class="col-lg-12">
                            <div class="card-object">
                                <div class="block text-star">
                                    <h5>{{ !empty($about->titreNosValeurs) ? $about->titreNosValeurs : '' }}</h5>
                                    <p>{{ !empty($about->slogant) ? $about->slogant : '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- MODAL READ MORE --}}
        <div class="modal fade" id="modal-read-more" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <h3>
                                {{ !empty($about->quisommenous) ? $about->quisommenous : '' }}
                            </h3>
                            <div class="content-about">
                                <h1>{{ !empty($about->titrecabinet) ? $about->titrecabinet : '' }}</h1>
                                <p>
                                    {!! !empty($about->contenu) ? $about->contenu : '' !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- MODAL READ MORE END --}}
    </div>
    <div class="counter">
        <img src="{{ asset('assets/images/img/baner.jpg') }}" alt="">
        <div class="container">
            <div class="text-center">
                <h5>{{ !empty($about->titreNosValeurs) ? $about->titreNosValeurs : '' }}</h5>
                <p>{{ !empty($about->slogant) ? $about->slogant : '' }}</p>
            </div>
        </div>
    </div>
    <div class="block_2 block-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="bg">
                        @if (!empty($about->photobenefice))
                            <img src="{{ asset('storage/' . $about->photobenefice) }}" alt="">
                        @else
                            <img src="{{ asset('img/default.png') }}" alt="">
                        @endif

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-star content">
                        <h2>{{ !empty($about->titreBeneficesmall) ? $about->titreBeneficesmall : '' }}</h2>
                        <h1>{{ !empty($about->titreBeneficesmall) ? $about->titreBeneficesmall : '' }}</h1>
                        <section>
                            {!! !empty($about->resume) ? $about->resume : '' !!}
                        </section>
                        <ul>
                            @if (!empty($about->b1))
                                <li>
                                    <i class="fas fa-check"></i>
                                    <h4>{{ $about->b1 }}</h4>
                                    <p>{{ $about->r1 }}</p>
                                </li>
                            @endif
                            @if (!empty($about->b2))
                                <li>
                                    <i class="fas fa-check"></i>
                                    <h4>{{ $about->b2 }}</h4>
                                    <p>{{ $about->r2 }}</p>
                                </li>
                            @endif
                            @if (!empty($about->b3))
                                <li>
                                    <i class="fas fa-check"></i>
                                    <h4>{{ $about->b3 }}</h4>
                                    <p>{{ $about->r3 }}</p>
                                </li>
                            @endif
                            @if (!empty($about->b4))
                                <li>
                                    <i class="fas fa-check"></i>
                                    <h4>{{ $about->b4 }}</h4>
                                    <p>{{ $about->r4 }}</p>
                                </li>
                            @endif
                            @if (!empty($about->b5))
                                <li>
                                    <i class="fas fa-check"></i>
                                    <h4>{{ $about->b5 }}</h4>
                                    <p>{{ $about->r5 }}</p>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('parties.footer')
@endsection
