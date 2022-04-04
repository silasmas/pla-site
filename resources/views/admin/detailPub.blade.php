@extends('parties.adminTemplate',['titre'=>"G_Publication"])


@section('content')
<div class="wrapper wrapper-content">
    <div class="row animated fadeInRight">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="pull-right">
                            <a class="btn btn-success btn-xs" href="{{ route('g_publication') }}"><i class="fa fa-arrow-circle-left"></i>Retour</a>
                            <a class="btn btn-primary btn-xs" href="{{ route('editPublication', ['id'=>$pub->id]) }}"><i class="fa fa-edit"></i>Edit</a>
                            <a class="btn btn-danger btn-xs" id="btnSupPub" href="{{ $pub->id}}"><i class="fa fa-trash"></i>Delete</a>
                        </div>
                        <div class="text-center article-title">
                        <span class="text-muted"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse( $pub->created_at)->isoFormat('LLLL') }}</span>
                            <h1>
                          {{$pub->titre}}
                            </h1>
                        </div>
                        <p>
                        {!! $pub->contenu !!}
                        </p>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                    <h5>Domaine :</h5>
                                    <button class="btn btn-primary btn-xs" type="button">{{ $pub->categorie->nom }}</button>
                            </div>
                            <div class="col-md-6">
                                <div class="small text-right">
                                    <h5>Enregistrer par:</h5>
                                    <div> <i class="fa fa-user"> </i> {{ $pub->user->name}} </div>
                                    <i class="fa clock-o"> </i> {{ \Carbon\Carbon::parse( $pub->created_at)->isoFormat('LLLL') }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">

                                <h2>Publier par :</h2>
                                <div class="social-feed-box">
                                    <div class="social-avatar">
                                        <a href="" class="pull-left">
                                            <img alt="image" src="{{ '../storage/'.$pub->avocat->photo }}">
                                        </a>
                                        <div class="media-body">
                                            <a href="{{route('detailAvocat',['id'=>$pub->avocat->id]) }}">
                                               {{ $pub->avocat->prenom.'-'.$pub->avocat->nom}}
                                            </a>
                                            <small class="text-muted">{{ $pub->avocat->fonction->fonction}}</small>
                                        </div>
                                    </div>
                                    <div class="social-body">
                                        <p>
                                            {!! $pub->avocat->biographie !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('autres-script')
<script>
    $(document).ready(function(){

        $(document).on("click", "#btnSupPub", function (e) {
                e.preventDefault();
                var id = $(this).attr("href");
                deleteEmail(id, '../destroyPublication');
            });
        });


        function deleteEmail(id, url) {

            swal({
                title: "Attention suppression",
                text: "Vous êtes sur le poin de supprimer cette publication de façon définitive!",
                icon: 'warning',
                dangerMode: true,
                buttons: {
                    cancel: 'Non',
                    delete: 'OUI'
                }
            }).then(function (willDelete) {
                if (willDelete) {

                    $.ajax({
                        url: url + "/" + id,
                        method: "GET",
                        data: '',
                        success: function (data) {
                            //  load('#tab-session');
                            if (!data.reponse) {
                                swal({
                                    title: data.msg,
                                    icon: 'error'
                                })

                            } else {
                                swal({
                                    title: data.msg,
                                    icon: 'success'
                                })
                                actualiser();
                            }
                        },
                    });
                } else {
                    swal({
                        title: "Suppression annuler",
                        icon: 'error'
                    })
                }
            });
        }

        function actualiser() {
            location.replace('../g_publication');
        }
</script>

@endsection
