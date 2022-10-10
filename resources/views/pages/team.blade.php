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
                <div class="row">
                    <div class="col-lg-4">
                        <div class="text-star">
                            @if (!empty($accueil->titreTeam ))
                            <h1 class="title">{{ $accueil->titreTeam }}</h1>
                            @endif

                        </div>
                    </div>
                    <div class="col-lg-8">
                        @if (!empty($accueil->descriptionTeam ))
                        <p class="">{{ $accueil->descriptionTeam }}</p>
                        @endif

                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-9">
                        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
                            <div id="slider-carousel" class="owl-carousel carousel-mobil">

                                @forelse ($avocat as $nom=>$av)

                                    @foreach($av as $eachyear)
                                        <div class="item">
                                            <div class="col-lg-4 {{$eachyear->fonction->fonction}}">
                                                <a href=" {{ route('detailTeam', ['id'=>$eachyear->id]) }}">
                                                    <div class="card card-team">
                                                        <div class="card-img">
                                                            <img src="{{ asset('storage/'.$eachyear->photo) }}" alt="">
                                                        </div>
                                                        <div class="text-center">
                                                            <h5>{{ $eachyear->prenom.' '.$eachyear->nom }}</h5>
                                                            <span>{{ $eachyear->fonction->fonction }}</span>
                                                            <span class="readMore">@lang('info.apropo.accueilBtn')</span>
                                                        </div>
                                                    </div>

                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @empty

                                @endforelse
                            </div>
                        </div>
                        {{--  <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
                            <div id="slider-carousel" class="owl-carousel carousel-mobil">
                                @forelse ($avocat as $av)
                                <div class="text-star">
                                    <h3 class="mt-5">{{$av->fonction->fonction}}</h3>
                                </div>
                                <div class="item">
                                    <div class="col-lg-4 col-md-6 {{$av->fonction->fonction}}">
                                        <a href=" {{ route('detailTeam', ['id'=>$av->id]) }}">
                                            <div class="card">
                                                <div class="card-img">
                                                    <img src="{{ asset('storage/'.$av->photo) }}" alt="">
                                                </div>
                                                <div class="text-center">
                                                    <h5>{{ $av->prenom.'-'.$av->nom }}</h5>
                                                    <span>{{ $av->fonction }}</span>
                                                    <br>
                                                    <span class="readMore">@lang('info.apropo.accueilBtn')</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @empty

                                @endforelse
                            </div>
                        </div>  --}}



                           <div class="row portfolio-container hidden-block" data-aos="fade-up" data-aos-delay="100">
                            @forelse ($avocat as $nom=>$av)
                                <div class="text-star">
                                    {{--<h3 class="mt-5">{{$nom }} </h3>--}}
                                </div>
                            <div class="row">
                                    @foreach($av as $eachyear)
                                        <div class="col-lg-4">
                                            <div class="item">
                                                <div class="col-lg-12 {{$eachyear->fonction->fonction}}">
                                                    <a href=" {{ route('detailTeam', ['id'=>$eachyear->id]) }}">
                                                        <div class="card card-team">
                                                            <div class="card-img">
                                                                <img src="{{ asset('storage/'.$eachyear->photo) }}" alt="">
                                                            </div>
                                                            <div class="text-center">
                                                                <h5>{{ $eachyear->prenom.' '.$eachyear->nom }}</h5>
                                                                <span>{{ $eachyear->fonction->fonction }}</span>
                                                                <span class="readMore">@lang('info.apropo.accueilBtn')</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                            </div>
                            @empty

                            @endforelse
                        </div>
                    </div>
                    <div class="col-lg-3">
                           <div class="card card-exp mt-4">
                            <h3>@lang("info.autres.viewBy"):</h3>
                            <hr>
                            <h4 class="mb-4">@lang('info.autres.bureau'):</h4>
                            <select class="select2_demo_3 form-control" id="teamByBureau">
                                <option></option>
                                @forelse ($bureau as $b)
                                <option value="{{ $b->id}}">{!! $b->adresse!!}</option>
                                @empty

                                @endforelse


                            </select>
                            <hr>
                            <h4 class="">@lang('info.autres.categorie'):</h4>
                            <div class="link-category">
                                <a href="{{ route('team') }}">@lang('info.team.all')<span class="num">()</span></a>
                                @forelse ($fonction as  $cat)
                                <a href="{{ route('teamByCat',['id'=>$cat->id]) }}">{{$cat->fonction}}
                                    <span class="num">( {{$cat->avocat->count()}})</span></a>
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
@section("autres_script")
<script>
    $(document).ready(function () {
        $('.summernote').summernote();
        $("#teamByBureau").on("change", function (e) {
            e.preventDefault();
            var id = $(this).val();
            //  alert(id);
            // window.location.replace(newUrl);

            window.location.href = '/teamByBureau/' + id;

        });
    });

</script>
@endsection
