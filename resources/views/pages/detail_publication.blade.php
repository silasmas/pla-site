@extends('parties.template',['titre'=>__('info.titrepage.publication')])


@section('content')

<div class="global-div">
    <div class="wrapper">
        <div class="loading">
            <div id="loader"></div>
        </div>
        <div class="full-menu">
            <div class="close-menu">
                <span></span>
                <span></span>
            </div>

        </div>

        <div class="banner-sm">
            <img src="{{ asset('assets/images/img7.jpg') }}" alt="">
        </div>
        <div class="block_10">
            <div class="container">
                <div class="row g-lg-5 g-3">
                    <div class="col-lg-3 order-2">
                        <div class="card card-exp" style="padding-bottom: 60px">
                            <h4>Publication Recente</h4>
                            <div class="link-publ">
                                @forelse ($publication as $pubs)
                                <a href="{{ route('detailPublication',['id'=>$pubs->id]) }}">
                                    <h6>{{ $pubs->titre }}</h6>
                                    <span class="sm-date">
                                        {{ \Carbon\Carbon::parse( $pubs->created_at)->isoFormat('LL') }}</span>
                                </a>

                                @empty

                                @endforelse
                                <div class="block_btn d-flex w-100">
                                    {!! $publication->links('vendor.pagination.simple-bootstrap-4') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 order-1">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <a href="{{ route('detailTeam',['id'=>$pub->avocat->id]) }}">
                                    <h2>
                                        <div class="avatar"><img src="{{ asset('storage/'.$pub->avocat->photo) }}" alt="">
                                        </div>{{ $pub->avocat->prenom.' '.$pub->avocat->nom }}
                                    </h2>
                                </a>
                                <h1>{{ $pub->titre }}</h1>
                                <div class=""><span class="date">
                                        {{ \Carbon\Carbon::parse( $pub->created_at)->isoFormat('LL') }}</span>
                                </div>
                                        {{--  {{ \Carbon\Carbon::parse( $pub->created_at)->isoFormat('LLLL') }}</span>  --}}
                              @empty(!$pub->pubpdf)
                                  <a href="" id="{{ $pub->pubpdf }}" class="btn btn-download"><i class="fas fa-download"></i> Télécharger en PDF</a>
                              @endempty


                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="card card-picture">
                                    <img src="{{ asset('storage/'.$pub->cover) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="text-star">
                            <hr>

                                <p class="">{!!$pub->contenu!!}</p>
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
    $(".btn-download").click(function(e){
        e.preventDefault();
        var data = $(this).attr('id');

        $.ajax({
            type: 'GET',
            url: '../downloadCvPub',
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
