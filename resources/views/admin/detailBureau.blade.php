@extends('parties.adminTemplate',['titre'=>"G_Bureau"])


@section('content')
<div class="wrapper wrapper-content">
    <div class="row animated fadeInRight">
        <div class="col-md-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Info du bureau : {{$bureau->adresse}}</h5>
                </div>
                <div>
                    <div class="ibox-content no-padding border-left-right">
                        <img alt="image" class="img-responsive" height="50" src="{{ '../storage/'.$bureau->photo }}">
                    </div>
                    <div class="ibox-content profile-content">
                        <h4><strong>{{$bureau->titre}}</strong></h4>
                        <p><i class="fa fa-phone"></i> : {{$bureau->telephone}}</p>
                        <p><i class="fa fa-envelope"></i> : {{$bureau->email}}</p>
                        <p><i class="fa fa-map-marker"></i> : {{$bureau->physique}}</p>

                        <div class="user-button">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('admin_editeBureau',['id'=>$bureau->id]) }}"
                                        class="btn btn-primary btn-sm btn-block"><i class="fa fa-edit"></i> Edite </a>

                                </div>
                                {{--  <div class="col-md-6">
                                    <a id="deleteBureau" href="{{$bureau->id}}" class="btn btn-danger btn-sm btn-block"><i
                                            class="fa fa-trash"></i> delete</a>
                                </div>  --}}
                            </div>
                        </div>
                        <hr>
                        <div class="user-button">
                            {{--  <div class="row">
                                @empty(!$bureau->bureau)
                                @forelse ($bureau as $item)
                                <h3 class="mb-3 bureau">
                                    {!! strip_tags($item->adresse) !!}
                                    <a href="{{$item->id}}" title="{{$bureau->id }}" id='deleteBureau'><i class="fa fa-trash"></i></a>
                                    </h3>
                                @empty
                                    <h2 class="text-danger text-center">Cet agent n'est pas affecter dans un bureau</h2>
                                @endforelse
                                @endempty

                            </div>  --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Présentation</h5>
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
                        <h5></h5>
                        <div class="feed-activity-list">
                            <p>
                                {!! $bureau->detail !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h2 class="">Equipe ({{ $bureau->avocat->count() }})</h2>
                </div>
            </div>
            <div class="row">

                @forelse ($bureau->avocat as $av)
                <div class="col-lg-4">
                    <div class="contact-box center-version">

                        <a href="{{ route('detailAvocat',['id'=>$av->id]) }}">

                            <img alt="image" class="img-circle" src="{{ '../storage/'.$av->photo }}">


                            <h3 class="m-b-xs"><strong>{{ $av->prenom.' '.$av->nom }}</strong></h3>

                            <div class="font-bold">{{ $av->fonction->fonction }}</div>
                            <address class="m-t-md">
                                <strong>{{ $av->email }}</strong><br>
                                Publication : <strong>{{ $av->publication->count()}}</strong><br>
                                <abbr title="Phone">P:</abbr> {{ $av->telephone }}
                            </address>
                        </a>
                        <div class="contact-box-footer">
                            <div class="m-t-xs btn-group">
                                <a href="{{ route('detailAvocat',['id'=>$av->id]) }}" class="btn btn-xs btn-white"><i class="fa fa-info-circle"></i> detail</a>
                                <a href="{{ route('editAvocat',['id'=>$av->id]) }}" class="btn btn-xs btn-white"><i class="fa fa-edit"></i> Edite </a>
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
            // $(document).on("click", "#deleteAvocat", function (e) {
            //     e.preventDefault();
            //     var id = $(this).attr("href");
            //     deleteBureau(id, '../destroy_Avocat');
            // });
            $(document).on("click", "#deleteBureau", function (e) {
                e.preventDefault();
                var id = $(this).attr("href");
                var idv = $(this).attr("title");
               // alert(idv+'-'+id);
                deleteBureau(id,idv, '../destroy_AvocatBureau');
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
