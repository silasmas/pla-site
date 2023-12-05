@extends('parties.template',['titre'=>__('info.titrepage.team')])


@section('content')

<div class="global-div">
    <div class="wrapper">
        @include('parties.menu_mobile')

        <div class="banner-sm">
            <img src="{{ asset('assets/images/img6.jpg') }}" alt="">
        </div>
        <div class="block_3" style="padding: 50px 0;">
            <div class="container">
                <div class="row g-4 g-lg-5">
                    <div class="col-lg-8 col-xl-9 col-md-8 order-2 order-lg-1 order-md-1">
                        <div class="text-star">
                            <div class="block-about">
                                <div class="row">
                                    <div class="col-lg-9 col-md-8">
                                        <h1 style="font-size: 35px;">{{ $avocat->prenom.' '.$avocat->nom }}</h1>
                                    </div>
                                    {{-- <div class="col-lg-3 col-md-4">
                                        <a href="#" id="{{ $avocat->pdfbio}}" class="btn btn-download"><i
                                                class="fas fa-download"></i> Télécharger CV</a>
                                    </div> --}}
                                </div>
                                @empty(!$bureau->bureau)
                                @foreach ($avocat->bureau as $item)
                                <h6 class="mb-3 bureau"><i class="fas fa-map-marker"></i>
                                    <a href="{{ route('detailBureau', ['id'=>$item->id,'p'=>$item->id]) }}"
                                        id='btnverBureau'>
                                        {!! strip_tags($item->adresse) !!}
                                    </a>
                                </h6>
                                @endforeach
                                @endempty
                                <h2>@lang('info.team.bio')</h2>

                                {{-- <p>{!! $avocat->biographie !!}</p> --}}
                                @if ($avocat->biographie)
                                <div>
                                    <iframe class="iframe-custom" id="iframe-example" frameborder="0"
                                        onload="10" src="{{ asset('storage/'.$avocat->biographie) }}"
                                        allowfullscreen></iframe>
                                </div>
                                @else
                                <p class="text-danger">@lang('info.titrepage.videInfo')</p>
                                @endif


                            </div>
                            <h2 style="" class="mt-4 mb-4">
                                @if ($avocat->publication->count()==0)
                                @lang('info.team.videPubTeam')
                                @else

                                {{ $avocat->publication->count()." Publications" }}
                                @endif
                            </h2>
                            <div id="slider-carousel-publ" class="owl-carousel">
                                @forelse($avocat->publication as $value)
                                <div class="item">
                                    {{-- \Carbon\Carbon::parse( $value->created_at)->isoFormat('M') --}}
                                    <div class="card-publ">
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
                                            <h5>
                                                {{ strlen($value->titre) > 50 ? substr($value->titre,0,50).'...' :
                                                $value->titre}}
                                            </h5>
                                            <p>
                                                {{ strlen(strip_tags($value->contenu)) > 250 ?
                                                substr(strip_tags($value->contenu),0,250).'...':
                                                strip_tags($value->contenu)}}
                                            </p>
                                            <a href="{{ route('detailPublication',['id'=>$value->id]) }}">@lang("info.autres.lirePlus")
                                                <i class="fas fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @empty

                                @endforelse

                            </div>
                        </div>
                        <div class="card card-exp block-hidden1">
                            <h4>@lang("info.autres.teamViewmore")</h4>
                            <div class="link-category">
                                @forelse($avocats as $value)
                                <a href="{{ route('detailTeam',['id'=>$value->id]) }}" class="link-avocat">
                                    {{ $value->prenom.' '.$value->nom }}
                                    <div class="avatar">
                                        <img src="{{ asset('storage/'.$value->photo)}}" alt="">
                                    </div>
                                </a>
                                @empty

                                @endforelse

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3 col-md-4 order-1 order-lg-2 order-md-2">
                        <div class="card" style="margin-top: 0;">
                            <style>
                                .card:hover {
                                    transform: none !important;
                                }

                                .block_3 .card .text-center::before {
                                    transform: scale(0.5);
                                    bottom: 0 !important;
                                }

                                .block_3 .card .text-center::after {
                                    transform: scale(0.5);
                                    bottom: 10px !important;
                                }
                            </style>
                            <div class="card-img card-md">
                                <img src="{{ asset('storage/'.$avocat->photo)}}" alt="">
                            </div>
                            <div class="text-center text-center-md">
                                <h5>{{ $avocat->prenom.' '.$avocat->nom }}</h5>
                                <span>{{ $avocat->fonction->fonction}}</span>
                                @if ($avocat->pdfbio && file_exists("storage/".$avocat->pdfbio))
                                <a href="" id="{{ $avocat->pdfbio}}" class="btn-download"><i
                                        class="fas fa-download"></i> @lang("info.autres.teamDownload")</a>
                                @endif
                            </div>
                        </div>
                        <div class="card card-exp block-hidden2">
                            <h4>@lang("info.autres.teamViewmore")</h4>
                            <div class="link-category">
                                @forelse($avocats as $value)
                                <a href="{{ route('detailTeam',['id'=>$value->id]) }}" class="link-avocat">
                                    {{ $value->prenom.' '.$value->nom }}
                                    <div class="avatar">
                                        <img src="{{ asset('storage/'.$value->photo)}}" alt="">
                                    </div>
                                </a>
                                @empty

                                @endforelse

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

@section('autres_script')

<script type="text/javascript">
    function adjustIframeHeight(height) {
            // Sélectionnez l'iframe en utilisant un sélecteur CSS approprié
            var iframe = document.querySelector("#my-iframe");
            iframe.style.height = height + "px";
        }
    $(".btn-download").click(function(e){
        e.preventDefault();
        var data = $(this).attr('id');

        $.ajax({
            type: 'GET',
            url: '../downloadCv',
            data: {'cv':data},
            xhrFields: {
                responseType: 'blob'
            },
            success: function(response){
                var blob = new Blob([response]);
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download ='PLA_'+data;
                link.click();
            },
            error: function(blob){
                console.log(blob);
            }
        });
    });

</script>
@endsection
