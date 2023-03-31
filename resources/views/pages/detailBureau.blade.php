@extends('parties.template',['titre'=>__('info.titrepage.presence')])


@section('content')
<div class="global-div">
    <div class="wrapper">
@include('parties.menu_mobile')

            <div class="banner-sm">
                <img src="{{ asset('assets/images/img6.jpg') }}" alt="">
            </div>
            <div class="block_10 block-presence">
                <div class="container">
                    <div class="row g-lg-5 g-3">
                        <div class="col-lg-3 order-2">
                            <div class="list-group card-exp" id="list-tab" role="tablist">
                                <h4 class="mb-3">@lang('info.bureau.menu')</h4>
                                @forelse ($bueaux as $se)
                                <a class="list-group-item list-group-item-action {{ $_GET['p']==$se->id?'show active':''}} scrollTop"
                                    id="list-home-list" data-bs-toggle="list"  href="{{ '#tab'.$se->id }}" role="tab"
                                    aria-controls="{{ $se->id }}" >
                                    {!! $se->adresse!!}</a>
                                @empty

                                @endforelse
                            </div>
                        </div>
                        <div class="col-lg-9 order-1">
                            <div class="tab-content" id="nav-tabContent">
                                <!-- SECTEURS -->
                                @forelse ($bueaux as $se)
                                <div class="tab-pane fade  {{ $_GET['p']==$se->id?'show active':''}} "
                                    id="{{'tab'.$se->id}}" role="tabpanel" aria-labelledby="list-home-list">
                                    <div class="text-star">
                                            <div class="row">
                                                <div class="col-lg-6 col-detail-presence">
                                                    <h1>{!! $se->adresse!!}</h1>
                                                    <h2> {{ $se->titre }}</h2>
                                                    <p><span><i class="fas fa-envelope"></i> :</span> {{ $se->email }}</p>
                                                    <p><span><i class="fas fa-phone"></i> :</span> {{ $se->telephone }}</p>
                                                    <p><span><i class="fas fa-map-marker"></i> :</span> {{ $se->physique }}</p>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="card card-picture">
                                                        <img src="{{ asset('storage/'.$se->photo) }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        <hr>
                                        <div class="list-group group-link-nav d-flex align-items-center mb-2" id="list-tab" role="tablist">
                                            <a class="active link-nav" id="list-home-list" data-bs-toggle="list" href="{{ '#list-home'.$se->id }}" role="tab" aria-controls="list-home">@lang('info.bureau.Presentation')</a>
                                            <a class="link-nav" id="list-profile-list" data-bs-toggle="list" href="{{'#list-profile'.$se->id }}" role="tab" aria-controls="list-profile">@lang('info.bureau.avocat')</a>
                                        </div>
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="{{ 'list-home'.$se->id }}" role="tabpanel" aria-labelledby="list-home-list">
                                                <div class="text-star">
                                                   @if ($se->detail)
                                                    {!! $se->detail  !!}
                                                    @else
                                                    <p class="text-danger">@lang('info.titrepage.videInfo')</p>

                                                    @endif

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="{{'list-profile'.$se->id }}" role="tabpanel" aria-labelledby="list-profile-list">
                                                <div class="block_3" style="padding: 0px 0;">
                                                    <div class="row">
                                                        @forelse ($se->avocat as $av)
                                                        <div class="col-lg-4">
                                                            <div class="item">
                                                                <div class="col-lg-12 {{$av->fonction->fonction}}">
                                                                    <a href=" {{ route('detailTeam', ['id'=>$av->id]) }}">
                                                                        <div class="card card-team">
                                                                            <div class="card-img">
                                                                                <img src="{{ asset('storage/'.$av->photo) }}" alt="">
                                                                            </div>
                                                                            <div class="text-center">
                                                                                <h5>{{ $av->prenom.' '.$av->nom }}</h5>
                                                                                <span>{{ $av->fonction->fonction }}</span>
                                                                                <span class="readMore">@lang('info.apropo.accueilBtn')</span>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @empty
                                                            <p class="text-danger">@lang('info.titrepage.videInfo')</p>
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty

                                @endforelse
                            </div>
                        </div>       <!--FIN SECTEURS -->
                    </div>
                </div>
            </div>
       @include('parties.footer')
    </div>
</div>

@endsection
