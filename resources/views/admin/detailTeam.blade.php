@extends('parties.adminTemplate',['titre'=>"G_Home"])


@section('content')
<div class="wrapper wrapper-content">
    <div class="row animated fadeInRight">
        <div class="col-md-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Profile Detail</h5>
                </div>
                <div>
                    <div class="ibox-content no-padding border-left-right">
                        <img alt="image" class="img-responsive" height="50" src="{{ '../storage/'.$team->photo }}">
                    </div>
                    <div class="ibox-content profile-content">
                        <h4><strong>{{$team->prenom.'-'.$team->nom}}</strong></h4>
                        <p><i class="fa fa-user-circle-o"></i> : {{$team->fonction->fonction}}</p>
                        <p><i class="fa fa-phone"></i> : {{$team->telephone}}</p>
                        <p><i class="fa fa-envelope"></i> : {{$team->email}}</p>

                        <div class="user-button">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('editAvocat',['id'=>$team->id]) }}"
                                        class="btn btn-primary btn-sm btn-block"><i class="fa fa-edit"></i> Edite </a>

                                </div>
                                <div class="col-md-6">
                                    <a id="deleteAvocat" href="{{$team->id}}" class="btn btn-danger btn-sm btn-block"><i
                                            class="fa fa-trash"></i> delete</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="user-button">
                            <div class="row">
                                @empty(!$team->bureau)
                                @forelse ($team->bureau as $item)
                                <h3 class="mb-3 bureau">
                                    {!! strip_tags($item->adresse) !!}
                                    <a href="{{$item->id}}" title="{{$team->id }}" id='deleteBureau'><i class="fa fa-trash"></i></a>
                                    </h3>
                                @empty
                                    <h2 class="text-danger text-center">Cet agent n'est pas affecter dans un bureau</h2>
                                @endforelse
                            @endempty

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>About me</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div>
                        <h5>Biographie :</h5>
                        <div class="feed-activity-list">
                            <p>
                                {!! $team->biographie !!}
                            </p>
                        </div>
                        @if ($team->pdfbio && file_exists("storage/".$team->pdfbio))

                        <a href="" id="{{$team->pdfbio}}" class="btn btn-primary btn-block m btn-download"><i
                                class="fa fa-download"></i> Télecharger CV</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h2 class="">Publications ({{ $team->publication->count() }})</h2>
                </div>
            </div>
            <div class="row">

                @forelse ($team->publication as $pub)
                <div class="col-md-6">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation" style="padding: 2px 0 !important">
                                <img src="{{'../storage/'.$pub->cover}}" class="img-responsive" height="50" />
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    {{ $pub->created_at->format('d').'-'.$pub->created_at->format('M')  }}
                                </span>
                                <small class="text-muted">{{ $pub->categorie->nom }}</small>
                                <a href="{{ route('admin_detailPublication',['id'=>$pub->id]) }}" class="product-name">
                                    {{ $pub->titre }}</a>



                                <div class="small m-t-xs">
                                    {!! strlen($pub->contenu) > 200 ? substr($pub->contenu,0,200).'...' : $pub->contenu!!}
                                </div>
                                <div class="m-t text-righ">

                                    <a href="{{ route('admin_detailPublication',['id'=>$pub->id]) }}" class="btn btn-xs btn-outline btn-primary">Info <i
                                            class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty

                @endforelse

            </div>
        </div>

    </div>

    @endsection
    @section('autres-script')

    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on("click", "#deleteAvocat", function (e) {
                e.preventDefault();
                var id = $(this).attr("href");
                deleteTeame(id, '../destroy_Avocat');
            });
            $(document).on("click", "#deleteBureau", function (e) {
                e.preventDefault();
                var id = $(this).attr("href");
                var idv = $(this).attr("title");
               // alert(idv+'-'+id);
                deleteBureau(id,idv, '../destroy_AvocatBureau');
            });
        });
        $(".btn-download").click(function (e) {
            e.preventDefault();
            var data = $(this).attr('id');

            $.ajax({
                type: 'GET',
                url: '../downloadCv',
                data: {
                    'cv': data
                },
                xhrFields: {
                    responseType: 'blob'
                },
                success: function (response) {
                    var blob = new Blob([response]);
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'PLA' + data;
                    link.click();
                },
                error: function (blob) {
                    console.log(blob);
                }
            });
        });

        function deleteBureau(id,idv, url) {

            swal({
                title: "Attention suppression",
                text: "Etes -vous prêt de supprimer cet agent dans ce bureau ?",
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
                        data: {'idv':idv},
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
                                actualiser2();
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
        function deleteTeame(id, url) {

            swal({
                title: "Attention suppression",
                text: "Cette suppression entrainera aussi la suppression des publications attachées à celui-ci ?",
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
                        data: "",
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
            location.replace('../dashboard');
        }
        function actualiser2() {
            location.reload();
        }

    </script>
    @endsection
