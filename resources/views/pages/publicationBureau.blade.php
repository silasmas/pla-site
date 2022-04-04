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
                            <h1 class="title">{{ $accueil->titreTeam }}</h1>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <p class="">{{ $accueil->descriptionTeam }}</p>
                    </div>
                </div>

                <h2>{{ $avocatBy->count() }} @lang('info.team.trouver')</h2>
                <div class="row ">
                    <div class="col-lg-9">
                        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
                            <div id="slider-carousel" class="owl-carousel carousel-mobil"> 
                                @forelse ($avocatBy as $cat)
                                    <div class="col-lg-4">
                                        <div class="item">
                                            <div class="col-lg-12 {{$cat->fonction->fonction}}">
                                                <a href=" {{ route('detailTeam', ['id'=>$cat->id]) }}">
                                                    <div class="card">
                                                        <div class="card-img">
                                                            <img src="{{ asset('storage/'.$cat->photo) }}" alt="">
                                                        </div>
                                                        <div class="text-center">
                                                            <h5>{{ $cat->prenom.'-'.$cat->nom }}</h5>
                                                            <span>{{ $cat->fonction->fonction }}</span>
                                                            <br>
                                                            <span class="readMore">@lang('info.apropo.accueilBtn')</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>    
                                @empty

                                @endforelse
                            </div>
                        </div>
                        <div class="row portfolio-container hidden-block" data-aos="fade-up" data-aos-delay="100">
                            @forelse ($avocatBy as $av)
                            <div class="col-lg-4 col-md-6 portfolio-item {{$av->fonction->fonction}}">
                                <div class="portfolio-wrap">
                                    <a href=" {{ route('detailTeam', ['id'=>$av->id]) }}">
                                        <div class="card">
                                            <div class="card-img">
                                                <img src="{{ asset('storage/'.$av->photo) }}" alt="">
                                            </div>
                                            <div class="text-center">
                                                <h5>{{ $av->prenom.' '.$av->nom }}</h5>
                                                <span>{{ $av->fonction->fonction}}</span>
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
                    </div>
                    <div class="col-lg-3">
                        @include('pages.searchBy')
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
            var id=$(this).val();
          //  alert(id);
            // window.location.replace(newUrl);

        window.location.href='/teamByBureau/'+id;

        });
    });

</script>
@endsection