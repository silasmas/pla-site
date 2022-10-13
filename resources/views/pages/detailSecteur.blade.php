@extends('parties.template',['titre'=>__('info.titrepage.expertise')])


@section('content')
<div class="global-div">
    <div class="wrapper">
@include('parties.menu_mobile')

        <div class="banner-sm">
            <img src="{{ asset('assets/images/img6.jpg') }}" alt="">
        </div>
        <div class="block_10">
            <div class="container">
               <div class="row g-lg-5 g-3">
                    <div class="col-lg-3 order-2">
                        <div class="list-group card-exp" id="list-tab" role="tablist">
                            <h4 class="mb-3">@lang('info.expertises.menu')</h4>
                            @forelse ($secteur as $se)
                            <a class="list-group-item list-group-item-action {{ Str::substr($_GET['p'], 0, 3)==Str::substr($se->titre1, 0, 3)?'show active':''}} scrollTop"
                                 id="list-home-list" data-bs-toggle="list" href="{{"#".Str::substr($se->titre1, 0, 3)}}" role="tab" aria-controls="{{ $se->id }}">
                                 {{ $se->titre1 }}</a>
                            @empty

                            @endforelse
                         </div>
                    </div>
                    <div class="col-lg-9 order-1">
                            <div class="tab-content" id="nav-tabContent">
                                <!-- SECTEURS -->
                                @forelse ($secteur as $se)
                                <div class="tab-pane fade  {{ Str::substr($_GET['p'], 0, 3)==Str::substr($se->titre1, 0, 3)?'show active':''}} "
                                    id="{{Str::substr($se->titre1, 0, 3)}}" role="tabpanel" aria-labelledby="list-home-list">
                                    <div class="text-star">
                                            <div class="row ">
                                                <div class="col-lg-6 ">
                                                <h1>{{ $se->titre1 }}</h1>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="card card-picture">
                                                        <img src="{{ asset('storage/'.$se->photo) }}" alt="">
                                                    </div>
                                                </div>

                                            </div>
                                        <hr>
                                    </div>
                                        <div>
                                            <div class="row mb-0 mt-4">
                                                <div class="col-lg-12 col-md-12">
                                                    <p>
                                                        {!! $se->contenu!!}
                                                    </p>
                                                </div>
                                            </div>

                                        </div>


                                </div>
                                @empty

                                @endforelse
                                <!--FIN SECTEURS -->

                            </div>
                    </div>
               </div>
            </div>
        </div>
       @include('parties.footer')
    </div>
</div>

@endsection
