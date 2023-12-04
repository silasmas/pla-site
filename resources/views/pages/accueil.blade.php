@extends('parties.template',['titre'=>__('info.titrepage.home')])


@section('content')
<div class="global-div">
    <div class="wrapper">
        @include('parties.menu_mobile')
        <div class="banner">
            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @for($i = 0; $i <count($slide); $i++) <button type="button"
                        data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}"
                        class="{{ $i==0?'active':'' }}" aria-current="true" aria-label="Slide {{$i+1}}"></button>
                        @endfor
                        {{--

                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button> --}}
                </div>
                <div class="carousel-inner">
                    @forelse ($slide as $s)
                    <div class="carousel-item {{ $loop->first?'active':'' }}">
                        <img src="{{ asset('storage/'.$s->photo) }}" alt="">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-white text-star">
                                        <h2>{{ $s->titresmall }}</h2>
                                        <h1>{{$s->titrebig}}</h1>
                                        <p>{{Str::length($s->resume)>120?Str::substr(strip_tags($s->resume),0,
                                            120).'...':$s->resume}}</p>
                                        <a href="{{ route("$s->lienvers") }}" class="btn btn-1">{{ $s->textbtn }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty

                    @endforelse
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        {{-- BUREAU --}}
        <div class="block_1">
            <div class="container">
                <div class="row g-3 g-sm-3 g-lg-3">
                    @forelse ($bureau as $b)
                    <div class="col-lg-4 col-sm-6 col-12">
                        <a href="{{ route('detailBureau', ['id'=>$b->id,'p'=>$b->id]) }}">
                            <div class="card">
                                <div class="text-star">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                            <path
                                                d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                            <path
                                                d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        </svg>
                                    </div>
                                    <h4>{!!
                                        strlen(strip_tags($b->adresse))>13?substr(strip_tags($b->adresse),0,13)."...":$b->adresse!!}
                                    </h4>
                                    <p>{{ $b->titre}}</p>
                                    <p>Email : {{ $b->email }}</p>
                                    <p>Tel : {{ $b->telephone }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @empty

                    @endforelse

                </div>
            </div>
        </div>

        {{-- ABOUT --}}
        <div class="about">
            <div class="container">
                <div class="row g-3 g-sm-5 g-lg-0">
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <img src="{{ !empty($about->photohome)?asset('storage/'.$about->photohome):asset('img/default.png') }}"
                                alt="img">
                            {{-- <div class="play-video" id="show-video"></div> --}}
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-bar">
                        <h2>{{ !empty($about->quisommenous)?$about->quisommenous:'Vide' }}</h2>
                        <h1>{{ !empty($about->titrecabinet)?$about->titrecabinet:'Vide' }} </h1>
                        <div class="row">
                            <div class="col-sm-12">
                                <p>{!! !empty($about->extrait)?Str::limit($about->contenu,450, '...'):'Vide '!!}</p>
                            </div>
                            <div class="col-sm-12">
                                <a href="{{route('about')}}" class="btn text-with">@lang('info.apropo.accueilBtn')</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        {{-- TEAMS --}}
        <div class="block_3" style="background: #1a1a1a;">
            <img src="{{ asset('assets/images/bg-cover2.jpg') }}" class="img-cover">
            <div class="container">
                <div class="text-center">
                    @if ($avocat->isEmpty())
                    <h2 class="mb-2">@lang('info.titrepage.videInfo')</h2>
                    @else
                    <h2 class="mb-2">{!! !empty($accueil->t1Team)?$accueil->t1Team:'' !!}</h2>
                    <h1 style="color: #fff!important;">{{ !empty($accueil->t2Team)?$accueil->t2Team:'' }}</h1>
                    @endif

                </div>
                <div id="slider-carousel" class="owl-carousel">
                    @forelse ($avocat as $av)
                    <div class="item">
                        <a href="{{ route('detailTeam', ['id'=>$av->id]) }}">
                            <div class="card">
                                <div class="card-img">
                                    <img src="{{ asset('storage/'.$av->photo) }}" alt="">
                                </div>
                                <div class="text-center">
                                    <h5>{{ $av->prenom.' '.$av->nom }}</h5>
                                    <span>{{ $av->fonction->fonction }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @empty
                    <p class="text-danger">@lang('info.titrepage.videInfo')</p>
                    @endforelse

                </div>
            </div>

        </div>

        {{-- PUBLICATION --}}
        <div class="block_9">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            @if ($publication->isEmpty())
                            <h2 class="mb-2">@lang('info.titrepage.videInfo')</h2>
                            @else
                                <h2 class="mb-2">{{!empty($accueil->t1Pub)?$accueil->t1Pub:'' }}</h2>
                            <h1>{{ !empty($accueil->t2Pub)?$accueil->t2Pub:'' }}</h1>
                            @endif

                        </div>
                    </div>
                </div>
                <div id="slider-carousel-blog" class="owl-carousel">

                    @forelse ($publication as $value)
                    <div class="item">
                        <div class="card">
                            <div class="category">
                                {{ $value->categorie->nom}}
                            </div>
                            <div class="card-img">
                                <div class="content-img">
                                    <img src="{{ asset('storage/'.$value->cover) }}" alt="img">
                                </div>
                                <div class="date">
                                    <span>{{ $value->created_at->format('d') }}</span>
                                    <span>{{ $value->created_at->format('M') }}</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="{{ route("detailTeam",['id'=>$value->avocat->id]) }}" style="margin-top:0">
                                    <h6>
                                        <div class="avatar">
                                            <img src="{{ asset('storage/'.$value->avocat->photo) }}" alt="">
                                        </div>
                                        {{ $value->avocat->prenom }}
                                    </h6>
                                </a>
                                <h4>
                                    {{-- {{ $value->titre }} --}}
                                    {{ strlen($value->titre) > 80 ? substr($value->titre,0,80).'...' : $value->titre}}
                                </h4>
                                {{-- <p>{!! strip_tags(substr($value->contenu,0,200)).'...'!!} --}}
                                <p>
                                    {!! strlen($value->contenu) > 200 ? substr(strip_tags($value->contenu),0,200).'...' : $value->contenu!!}
                                </p>
                                <a href="{{ route('detailPublication',['id'=>$value->id]) }}">@lang('info.apropo.accueilBtn')<i
                                        class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @empty
                    {{-- <p class="text-danger">@lang('info.titrepage.videInfo')</p> --}}
                    @endforelse

                </div>
                <div class="row g-lg-5 g-3">

                </div>
            </div>
        </div>

        @include('parties.footer')
            <div class="block-video">
                <div class="content-video">
                    <div class="play-video" id="play-video"></div>
                    <video src="{{ asset('video/video.mp4') }}" id="video"></video>
                </div>
            </div>
            <div class="bg-overplay">
                <div class="close-video"></div>
            </div>
    </div>
</div>

@endsection

@section("autres_script")
<script>
    let video = document.querySelector('#video')

function togglePlayPause() {
    if (video.paused) {
        video.play()
        $('#play-video').addClass('paused')
    } else {
        video.pause()
        $('#play-video').removeClass('paused')
    }
}

$('#play-video').click(function() {
    togglePlayPause()
})
$('#show-video').click(function() {
    $('.block-video').addClass('active')
    $('.bg-overplay').addClass('active')
})
$('.bg-overplay').click(function() {
    video.pause()
    $('#play-video').removeClass('paused')
    $('.block-video').removeClass('active')
    $('.bg-overplay').removeClass('active')
    $('.modal-about').removeClass('active')
})
$('.btn-plus').click(function() {
    $('.modal-about').addClass('active')
    $('.bg-overplay').addClass('active')
})
</script>
@endsection
