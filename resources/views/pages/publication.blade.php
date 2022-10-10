@extends('parties.template',['titre'=>__('info.titrepage.publication')])


@section('content')
<div class="global-div">
    <div class="wrapper">
      @include('parties.menu_mobile')

        <div class="banner-sm">
            <img src="{{ asset('assets/images/img6.jpg') }}" alt="">
        </div>
        <div class="block_9" style="background: #fff;">
            <div class="container-fluid px-lg-5">
                <div class="row g-4">
                        <div class="col-lg-9 col-md-8">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-star">
                                        <h2 class="mb-1">@lang('info.autres.nos')</h2>
                                        <h1> <h1>{{ $publication->count() }} {{ $publication->count()>1?'Publications':'Publication' }} </h1></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-lg-3 g-3 pub-container" data-aos="fade-up" data-aos-delay="100">
                                @forelse ($publication as $value)
                                    <div class="col-lg-4 col-md-4 portfolio-item {{ $value->categorie->id}}">
                                        <div class="card">
                                            <div class="category">
                                                {{ $value->categorie->nom}}
                                            </div>
                                            <div class="card-img">
                                                <div class="content-img">
                                                    <img src="{{ asset('storage/'.$value->cover) }}" alt="">
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
                                                <h4>{{ strlen($value->titre) > 70 ? substr($value->titre,0,70).'...' : $value->titre}}</h4>
                                                {{-- <p>{{substr(strip_tags($value->contenu),0,200)}}</p> --}}
                                                <p>{{ strlen(strip_tags($value->contenu)) > 200 ? substr(strip_tags($value->contenu),0,200).'...': strip_tags($value->contenu)}}</p>
                                                <a href="{{ route('detailPublication',['id'=>$value->id]) }}">Lire Plus <i class="fas fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <h2 class="mb-1">@lang("info.titrepage.videInfo")</h2>
                                @endforelse
                            </div>
                        </div>
                        <div class="col-lg-3 order-2">

                            <div class="card-exp">
                                <h3>@lang('info.autres.viewBy'):</h3>
                                <hr>
                                <h4 class="">@lang('info.autres.categorie'):</h4>
                                <div class="link-category">
                                    <ul id="portfolio-flters">
                                        <li data-filter="*" class="filter-active">@lang('info.team.all')</li>
                                        @forelse ($categorie as $cat)
                                        <li data-filter="{{ '.'.$cat->id }}">
                                            {{ $cat->nom }} <span class="num">({{ $cat->publication->count() }})</span>
                                        </li>
                                        @empty

                                        @endforelse
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
       @include('parties.footer')
    </div>
</div>

@endsection
