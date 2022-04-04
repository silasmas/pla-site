@extends('parties.adminTemplate',['titre'=>"G_Publication"])


@section('content')
<div class="wrapper wrapper-content">
    <div class="row animated fadeInRight">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="pull-right">
                            <a class="btn btn-success btn-xs" href="{{ route('gexpertise') }}"><i class="fa fa-arrow-circle-left"></i>Retour</a>
                            <a class="btn btn-primary btn-xs" href="{{ route('editExp', ['id'=>$pub->id]) }}"><i class="fa fa-edit"></i>Edit</a>
                            <a class="btn btn-danger btn-xs" id="btnSupPub" href="{{ $pub->id}}"><i class="fa fa-trash"></i>Delete</a>
                        </div>
                        <div class="text-center article-title">
                        <span class="text-muted"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse( $pub->created_at)->isoFormat('LLLL') }}</span>
                            <h1>
                          {{$pub->titre1}}
                            </h1>
                        </div>
                        <p>
                        {!! $pub->contenu !!}
                        </p>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                  <img src="{{ asset('storage/'.$pub->photo) }}" alt="" width="500" height="300">
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
                deleteEmail(id, '../destroyExp');
            });
        });


        function deleteEmail(id, url) {

            swal({
                title: "Attention suppression",
                text: "Vous êtes sur le poin de supprimer cet element de façon définitive!",
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
            location.replace('../gexpertise');
        }
</script>

@endsection
