@extends('parties.adminTemplate',['titre'=>"G_accueil"])

@section('autres_style')
<link href="{{ asset('css/dataTables/datatables.min.cs') }}" rel="stylesheet">
@endsection
@section('content')
<div class="wrapper wrapper-content">
    <div class="row animated fadeInRight">
        <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">

                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab_menu">Menu entet</a></li>
                        <li class=""><a data-toggle="tab" href="#tab_footer">Footer et partenaire</a></li>
                        <li class=""><a data-toggle="tab" href="#tab_titre">Titre rubrique</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab_menu" class="tab-pane active">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                    <p>
                                        Titre :
                                        @if(!empty($home->textsuivre))
                                            <span class="badge badge-primary">
                                                {{ !empty($home->textsuivre)?$home->textsuivre:'' }}
                                            </span>
                                                <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="textsuivre" id='delete'><i class="fa fa-trash"></i></a>
                                            </small>
                                        @endif

                                    </p>
                                    <p>
                                        <span class="btn btn-success btn-circle"><i class="fa fa-facebook"></i></span>  :

                                        @if(!empty($home->facebook))
                                        <span class="badge badge-primary">
                                            {{ !empty($home->facebook)?$home->facebook:"" }}
                                        </span>
                                            <small class="btn btn-danger btn-circle">
                                            <a href="menu" title="facebook" id='delete'><i class="fa fa-trash"></i></a>
                                        </small>
                                        @endif

                                    </p>
                                    <p>
                                        <span class="btn btn-info btn-circle"><i class="fa fa-twitter"></i></span>  :

                                        @if(!empty($home->tweeter))
                                        <span class="badge badge-primary">
                                            {{ !empty($home->tweeter)?$home->tweeter:'' }}
                                        </span>
                                            <small class="btn btn-danger btn-circle">
                                            <a href="menu" title="tweeter" id='delete'><i class="fa fa-trash"></i></a>
                                        </small>
                                        @endif

                                    </p>
                                    <p>
                                        <span class="btn btn-success btn-circle"><i class="fa fa-linkedin"></i></span>  :

                                        @if(!empty($home->linkedin))
                                        <span class="badge badge-primary">
                                            {{ !empty($home->linkedin)?$home->linkedin:'' }}
                                        </span>
                                            <small class="btn btn-danger btn-circle">
                                            <a href="menu" title="linkedin" id='delete'><i class="fa fa-trash"></i></a>
                                        </small>
                                        @endif

                                    </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>
                                            <span class="btn btn-danger btn-circle"><i class="fa fa-google-plus"></i></span>  :

                                            @if(!empty($home->google))
                                            <span class="badge badge-primary">
                                                {{!empty( $home->google)? $home->google:'' }}
                                            </span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="menu" title="google" id='delete'><i class="fa fa-trash"></i></a>
                                            </small>
                                        @endif

                                        </p>
                                        <p>
                                            <span class="btn btn-white btn-circle"><i class="fa fa-phone"></i></span>  :

                                            @if(!empty($home->telphone))
                                            <span class="badge badge-primary">
                                                {{ !empty($home->telphone)?$home->telphone:'' }}
                                            </span>
                                             <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="telphone" id='delete'><i class="fa fa-trash"></i></a>
                                            </small>
                                        @endif

                                        </p>
                                        <p>
                                            <span class="btn btn-white btn-circle"><i class="fa fa-envelope"></i></span>  :

                                            @if(!empty($home->email))
                                            <span class="badge badge-primary">
                                                {{ !empty($home->email)?$home->email:'' }}
                                            </span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="menu" title="email" id='delete'><i class="fa fa-trash"></i></a>
                                            </small>
                                        @endif

                                        </p>
                                        <p>
                                            <span class="btn btn-white btn-circle"><i class="fa fa-map-marker"></i></span> :

                                            @if(!empty($home->adresse))
                                            <span class="badge badge-primary">
                                                {{ !empty($home->adresse)?$home->adresse:'' }}
                                            </span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="adresse" id='delete'><i class="fa fa-trash"></i></a>
                                            </small>
                                        @endif

                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div id="tab_footer" class="tab-pane">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>
                                            <h3 class="">Partenaire 1</h3>
                                            @if (!empty($home->p1))
                                            <span class="badge badge-white">Lien du site :</span>
                                            <span class="badge badge-primary">{{ $home->l1 }}</span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="partenaire" title="1" id='delete'><i class="fa fa-trash"></i></a>
                                            </small><br><br>
                                            <img class="mt-10" src="{{asset('storage/'.$home->p1)}}" width="200" height="150"/>
                                            @else
                                            <span class="badge badge-danger">Image pas disponible</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>
                                            <h3 class="">Partenaire 2</h3>
                                            @if (!empty($home->p2))
                                            <span class="badge badge-white">Lien du site :</span>
                                            <span class="badge badge-primary">{{ $home->l2 }}</span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="partenaire" title="2" id='delete'><i class="fa fa-trash"></i></a>
                                            </small><br><br>
                                            <img src="{{asset('storage/'.$home->p2)}}" width="150" height="200"/>
                                            @else
                                            <span class="badge badge-danger">Image pas disponible</span>
                                            @endif


                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>
                                            <h3 class="">Partenaire 3</h3>
                                            @if (!empty($home->p3))
                                            <span class="badge badge-white">Lien du site :</span>
                                            <span class="badge badge-primary">{{ $home->l3 }}</span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="partenaire" title="3" id='delete'><i class="fa fa-trash"></i></a>
                                            </small><br><br>
                                            <img src="{{asset('storage/'.$home->p3)}}" width="150" height="200"/>
                                            @else
                                            <span class="badge badge-danger">Image pas disponible</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>
                                            <h3 class="">Partenaire 4</h3>
                                            @if (!empty($home->p4))
                                            <span class="badge badge-white">Lien du site :</span>
                                            <span class="badge badge-primary">{{ $home->l4 }}</span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="partenaire" title="4" id='delete'><i class="fa fa-trash"></i></a>
                                            </small><br><br>
                                            <img src="{{asset('storage/'.$home->p4)}}" width="150" height="200"/>
                                            @else
                                            <span class="badge badge-danger">Image pas disponible</span>
                                            @endif


                                        </p>
                                    </div>
                                </div>
                                    <hr>
                                    <div class="col-sm-6">
                                        <p>
                                            <h3 class="">Slogant du footer</h3>
                                            @if (!empty($home->txtfooter))
                                            <p class="">{!! $home->txtfooter !!}</p>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="txtfooter" id='delete'><i class="fa fa-trash"></i></a>
                                            </small>
                                            @else
                                            <span class="badge badge-danger">Pas des texts disponible</span>
                                            @endif


                                        </p>
                                    </div>
                                </div>
                        </div>
                        <div id="tab_titre" class="tab-pane">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>
                                            <h3 class="">Rubrique Equipe</h3>
                                            <span class="badge badge-white">Titre 1 :</span>
                                            <span class="badge badge-primary">{{ !empty($home->t1Team)?$home->t1Team:'' }}</span>
                                            @if(!empty($home->t1Team))
                                                 <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="t1Team" id='delete'><i class="fa fa-trash"></i></a>
                                            </small>
                                            @endif
                                            <br><br>
                                            <span class="badge badge-white">Titre 2:</span>
                                            <span class="badge badge-primary">{{ !empty($home->t2Team)?$home->t2Team:'' }}</span>
                                            @if(!empty($home->t2Team))
                                                <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="t2Team" id='delete'><i class="fa fa-trash"></i></a>
                                            </small>
                                            @endif
                                            <br>
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>
                                            <h3 class="">Rubrique Publication</h3>
                                            <span class="badge badge-white">Titre 1 :</span>
                                            <span class="badge badge-primary">{{ !empty($home->t1Pub)?$home->t1Pub:''}}</span>
                                            @if(!empty($home->t1Pub))
                                                <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="t1Pub" id='delete'><i class="fa fa-trash"></i></a>
                                            </small>
                                            @endif
                                            <br><br>
                                            <span class="badge badge-white">Titre 2:</span>
                                            <span class="badge badge-primary">{{ !empty($home->t2Pub)?$home->t2Pub:'' }}</span>
                                            @if(!empty($home->t2Pub))
                                                 <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="t2Pub" id='delete'><i class="fa fa-trash"></i></a>
                                            </small>
                                            @endif
                                            <br>

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
<script src="{{asset('js/dataTables/datatables.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.dataTables-example').DataTable({
            language: {
                processing: "Traitement en cours...",
                search: "Rechercher&nbsp;:",
                lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
                info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                infoPostFix: "",
                loadingRecords: "Chargement en cours...",
                zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable: "Aucune donnée disponible dans le tableau",
                paginate: {
                    first: "Premier",
                    previous: "Pr&eacute;c&eacute;dent",
                    next: "Suivant",
                    last: "Dernier"
                },
                aria: {
                    sortAscending: ": activer pour trier la colonne par ordre croissant",
                    sortDescending: ": activer pour trier la colonne par ordre décroissant"
                }
            },
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [{
                    extend: 'copy'
                },
                {
                    extend: 'csv'
                },
                {
                    extend: 'excel',
                    title: 'NewsLetter'
                },
                {
                    extend: 'pdf',
                    title: 'NewsLetter'
                },

                {
                    extend: 'print',
                    customize: function (win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]

        });

        $(document).on("click", "#deleteCat", function (e) {
            e.preventDefault();
            var id = $(this).attr("href");
            deleteTeame(id, 'destroy_Cat');
        });
        $(document).on("click", "#delete", function (e) {
                e.preventDefault();
                var id = $(this).attr("href");
                var idv = $(this).attr("title");
               // alert(idv+'-'+id);
                deletee(id,idv, '../destroy_info');
            });
    });
    function deletee(id,idv, url) {

        swal({
            title: "Attention suppression",
            text: "Etes -vous prêt de supprimer cette information?",
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
        location.reload();
    }

</script>

@endsection
