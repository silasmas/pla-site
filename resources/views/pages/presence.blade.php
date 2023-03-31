@extends('parties.template',['titre'=>__('info.titrepage.presence')])


@section('content')
<div class="global-div">
    <div class="wrapper">
      @include('parties.menu_mobile')

        <div class="banner-sm">
            <img src="{{ asset('assets/images/img1.jpg') }}" alt="">
        </div>
        <div class="block_8">
          <div class="container">
            <div class="row g-3 justify-content-center g-lg-4">
                @forelse ($presence as $pr)
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('detailBureau', ['id'=>$pr->id,'p'=>$pr->id]) }}">
                        <div class="card card-location">
                        <div class="card-img">
                            <h5 class="text-white"><i class="fas fa-map-marker"></i>
                                {!! strip_tags($pr->adresse)!!}</h5>
                            <img src="{{ asset('storage/'.$pr->photo) }}" alt="">
                        </div>
                        <div class="card-body">
                            <h6>{{ $pr->titre }}</h6>
                            <p><span><i class="fas fa-envelope"></i> : </span> {{ $pr->email }}</p>
                            <p><span><i class="fas fa-phone"></i> : </span> {{ $pr->telephone }}</p>
                            <p><span><i class="fas fa-map-marker"></i> : </span>{{ $pr->adresse }}</p>
                        </div>
                        </div>
                    </a>
                </div>

                @empty

                @endforelse

            </div>
          </div>
        </div>
       @include('parties.footer')
    </div>
</div>

@endsection
