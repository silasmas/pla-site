@extends('parties.template',['titre'=>__('info.titrepage.expertise')])


@section('content')

<div class="global-div">
    <div class="wrapper">

        @include('parties.menu_mobile')

        <div class="banner-sm">
            <img src="{{ asset('assets/images/img3.jpg') }}" alt="">
        </div>
        <div class="block_5">
            <div class="container">
                <div class="row g-lg-5 g-5">
                    <div class="col-lg-6 col-separator">
                        <div class="text-star">
                            <h1>@lang('info.expertises.menu')</h1>
                        </div>
                        {{-- {{ $loop->first?'col-separator':'' }} --}}
                        <div class="row g-3 g-lg-4">
                            @forelse($secteur as $ex)
                            <div class="col-lg-6 col-md-6 col-6">
                                <a href="{{ route('detailExpertise',['id'=>$ex->id,'p'=>$ex->titre1]) }}">
                                    <div class="card">
                                        <div class="num">{{ ($i++)+1 }}</div>
                                        <img src="{{ asset('storage/'.$ex->photo) }}" alt="">
                                        <div class="content-text">
                                            <h5 class="mb-0">{{ $ex->titre1 }}</h5>
                                            <span class="icon">
                                                <i class="fas fa-angle-right"></i>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-star">
                            <h1>@lang('info.domaine.menu')</h1>
                        </div>
                        {{-- {{ $loop->first?'col-separator':'' }} --}}
                        <div class="row g-3 g-lg-4">
                            @forelse($domaine as $ex)
                            <div class="col-lg-6 col-md-6 col-6">
                                <a href="{{ route('detailCompetence',['id'=>$ex->id,'p'=>$ex->titre1]) }}">
                                    <div class="card">
                                        <div class="num">{{ ($ii++)+1 }}</div>
                                        <img src="{{ asset('storage/'.$ex->photo) }}" alt="">
                                        <div class="content-text">
                                            <h5 class="mb-0">{{ $ex->titre1 }}</h5>
                                            <span class="icon">
                                                <i class="fas fa-angle-right"></i>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
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
@endsection
