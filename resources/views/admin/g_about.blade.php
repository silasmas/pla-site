@extends('parties.adminTemplate',['titre'=>"G_about"])

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
                        <li class="active"><a data-toggle="tab" href="#tab_1">About</a></li>
                        <li class=""><a data-toggle="tab" href="#tab_2">Rubrique Bénefice</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab_1" class="tab-pane active">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>
                                            <h3 class="badge badge-white">Titre 1 :</h3>
                                            @if (!empty($about->quisommenous))
                                            <span class="badge badge-primary">{{ $about->quisommenous }}</span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="quisommenous" id='delete'><i class="fa fa-trash"></i></a>
                                            </small><br><br>
                                            @else
                                            <span class="badge badge-danger">Pas d'information disponible</span><br><br>
                                            @endif
                                        </p>
                                        <p>
                                            <h3 class="badge badge-white">Nom du cabinet :</h3>
                                            @if (!empty($about->titrecabinet))
                                            <span class="badge badge-primary">{{ $about->titrecabinet }} (FR)</span>
                                            <span class="badge badge-primary">{{ $about->getTranslation('titrecabinet','en') }} (EN)</span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="titrecabinet" id='delete'><i class="fa fa-trash"></i></a>
                                            </small><br><br>
                                            @else
                                            <span class="badge badge-danger">Pas d'information disponible</span><br><br>
                                            @endif
                                        </p>
                                        <p>
                                            <h3 class="badge badge-white">Slogan :</h3>
                                            @if (!empty($about->slogant))
                                            <span class="badge badge-primary">{!! Str::length($about->slogant)>65?Str::substr($about->slogant, 0, 65).'...' :$about->slogant!!} (FR)</span>
                                            <span class="badge badge-primary">{!! Str::length($about->slogant)>65?Str::substr($about->getTranslation('slogant','en'), 0, 65).'...' :$about->slogant!!} (EN)</span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="slogant" id='delete'><i class="fa fa-trash"></i></a>
                                            </small><br><br>
                                            @else
                                            <span class="badge badge-danger">Pas d'information disponible</span><br><br>
                                            @endif
                                        </p>

                                        <p>
                                            <h3 class="">Photo Acueil</h3>
                                            @if (!empty($about->photohome))
                                            <small class="btn btn-danger btn-circle">
                                                <a href="photo" title="photohome" id='delete'><i class="fa fa-trash"></i></a>
                                            </small>
                                            <img class="mt-10" src="{{asset('storage/'.$about->photohome)}}" width="200" height="300"/>

                                            @else
                                            <span class="badge badge-danger">Image pas disponible</span>
                                            @endif


                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>
                                            <h3 class="badge badge-white">Nombre d'experience :</h3>
                                            @if (!empty($about->nbrexperience))

                                            <span class="badge badge-primary">{{ $about->nbrexperience }}</span>
                                            {{-- <span class="badge badge-primary">{{ $about->getTranslation('nbrexperience','en') (EN) }}</span> --}}
                                            <small class="btn btn-danger btn-circle">
                                                <a href="menu" title="nbrexperience" id='delete'><i class="fa fa-trash"></i></a>
                                            </small><br><br>
                                            @else
                                            <span class="badge badge-danger">Pas d'information disponible</span><br><br>
                                            @endif
                                        </p>
                                        <p>
                                            <h3 class="badge badge-white">Temps d'experience :</h3>
                                            @if (!empty($about->temps))
                                            <span class="badge badge-primary">{{ $about->temps }} (FR)</span>
                                            <span class="badge badge-primary">{{ $about->getTranslation('temps','en') }} (EN)</span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="temps" id='delete'><i class="fa fa-trash"></i></a>
                                            </small><br><br>
                                            @else
                                            <span class="badge badge-danger">Pas d'information disponible</span><br><br>
                                            @endif
                                        </p>
                                        <p>
                                            <h3 class="badge badge-white">Titre slogan :</h3>
                                            @if (!empty($about->titreNosValeurs))
                                            <span class="badge badge-primary">{{ $about->titreNosValeurs}} (FR)</span>
                                            <span class="badge badge-primary">{{ $about->getTranslation('titreNosValeurs','en')}} (EN)</span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="titreNosValeurs" id='delete'><i class="fa fa-trash"></i></a>
                                            </small><br><br>
                                            @else
                                            <span class="badge badge-danger">Pas d'information disponible</span><br><br>
                                            @endif
                                        </p>
                                        <p>
                                            <h3 class="">Photo About</h3>
                                            @if (!empty($about->photoabout))
                                            <small class="btn btn-danger btn-circle">
                                                <a href="photo" title="photoabout" id='delete'><i class="fa fa-trash"></i></a>
                                            </small>
                                            <img class="mt-10" src="{{asset('storage/'.$about->photoabout)}}" width="200" height="300"/>
                                            @else
                                            <span class="badge badge-danger">Image pas disponible</span>
                                            @endif


                                        </p>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3 class="">Extrait de la description (FR) :</h3>
                                        <small class="btn btn-danger btn-circle">
                                            <a href="tel" title="extrait" id='delete'><i class="fa fa-trash"></i></a>
                                        </small>
                                        <p>
                                            {{$about->getTranslation('extrait','fr')}}
                                        </p>

                                    </div>
                                    <div class="col-sm-6">
                                        <h3 class="">Extrait de la description (EN) :</h3>
                                        <small class="btn btn-danger btn-circle">
                                            <a href="tel" title="extrait" id='delete'><i class="fa fa-trash"></i></a>
                                        </small>
                                        <p>
                                            {{$about->getTranslation('extrait','en')}}
                                        </p>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p>
                                        <h3 class="">Apropo du cabinet (FR)</h3>
                                        @if (!empty($about->contenu))
                                        <small class="btn btn-danger btn-circle">
                                            <a href="tel" title="contenu" id='delete'><i class="fa fa-trash"></i></a>
                                        </small>
                                        <p class="badge badge-primary">{!! $about->getTranslation('contenu','fr') !!}</p>
                                        @else
                                        <span class="badge badge-danger">Pas des texts disponible</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p>
                                        <h3 class="">Apropo du cabinet (EN)</h3>
                                        @if (!empty($about->contenu))
                                        <small class="btn btn-danger btn-circle">
                                            <a href="tel" title="contenu" id='delete'><i class="fa fa-trash"></i></a>
                                        </small>
                                        <p class="badge badge-primary">{!! $about->getTranslation('contenu','en') !!}</p>
                                        @else
                                        <span class="badge badge-danger">Pas des texts disponible</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div id="tab_2" class="tab-pane">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <p>
                                            <h3 class="badge badge-white">Titre 1 :</h3>
                                            @if (!empty($about->titrebigbenefice))
                                            <span class="badge badge-primary">{{ $about->titrebigbenefice }}</span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="titrebigbenefice" id='delete'><i class="fa fa-trash"></i></a>
                                            </small><br><br>
                                            @else
                                            <span class="badge badge-danger">Pas d'information disponible</span><br><br>
                                            @endif
                                        </p>
                                        <p>
                                            <h3 class="badge badge-white">Small Titre :</h3>
                                            @if (!empty($about->titreBeneficesmall))
                                            <span class="badge badge-primary">{{ $about->titreBeneficesmall }}</span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="titreBeneficesmall" id='delete'><i class="fa fa-trash"></i></a>
                                            </small><br><br>
                                            @else
                                            <span class="badge badge-danger">Pas d'information disponible</span><br><br>
                                            @endif
                                        </p>
                                        <p>
                                            <h3 class="badge badge-white">Grand Titre :</h3>
                                            @if (!empty($about->titreNosValeurs))
                                            <span class="badge badge-primary">{{ $about->titreNosValeurs }}</span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="titreNosValeurs" id='delete'><i class="fa fa-trash"></i></a>
                                            </small><br><br>
                                            @else
                                            <span class="badge badge-danger">Pas d'information disponible</span><br><br>
                                            @endif
                                        </p>
                                        <p>
                                            <h3 class="badge badge-white">Resumé :</h3>
                                            @if (!empty($about->resume))

                                            <span class="badge badge-primary">
                                                {!! strlen($about->resume) > 110 ? substr(strip_tags($about->resume),0,110).'...' : $about->resume!!}
                                            </span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="resume" id='delete'><i class="fa fa-trash"></i></a>
                                            </small><br><br>
                                            @else
                                            <span class="badge badge-danger">Pas d'information disponible</span><br><br>
                                            @endif
                                        </p>
                                        <p>
                                            <h3 class="">Photo Bénéfice</h3>
                                            @if (!empty($about->photobenefice))
                                            <small class="btn btn-danger btn-circle">
                                                <a href="photo" title="photobenefice" id='delete'><i class="fa fa-trash"></i></a>
                                            </small>
                                            <img class="mt-10" src="{{asset('storage/'.$about->photobenefice)}}" width="400" height="200"/>
                                            @else
                                            <span class="badge badge-danger">Image pas disponible</span>
                                            @endif


                                        </p>

                                    </div>
                                    <div class="col-sm-7">
                                        <p>
                                            <h3 class="badge badge-white">Bénéfice 1 :</h3>
                                            @if (!empty($about->b1))
                                            <span class="badge badge-primary">{{ $about->b1 }}</span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="b1" id='delete'><i class="fa fa-trash"></i></a>
                                            </small><br><br>
                                            @else
                                            <span class="badge badge-danger">Pas d'information disponible</span><br><br>
                                            @endif
                                            <span class="badge badge-white">Detail :</span>
                                            @if (!empty($about->r1))
                                            <span class="badge badge-primary">{!! $about->r1!!}</span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="r1" id='delete'><i class="fa fa-trash"></i></a>
                                            </small>
                                            @else
                                            <span class="badge badge-danger">Pas d'information disponible</span><br><br>
                                            @endif
                                        </p>
                                        <hr>
                                        <p>
                                            <h3 class="badge badge-white">Bénéfice 2 :</h3>
                                            @if (!empty($about->b2))
                                            <span class="badge badge-primary">{{ $about->b2 }}</span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="b2" id='delete'><i class="fa fa-trash"></i></a>
                                            </small><br><br>
                                            @else
                                            <span class="badge badge-danger">Pas d'information disponible</span><br><br>
                                            @endif
                                            <span class="badge badge-white">Detail :</span>
                                            @if (!empty($about->r2))
                                            <span class="badge badge-primary">{!! $about->r2!!}</span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="r2" id='delete'><i class="fa fa-trash"></i></a>
                                            </small>
                                            @else
                                            <span class="badge badge-danger">Pas d'information disponible</span><br><br>
                                            @endif
                                        </p>
                                        <hr>
                                        <p>
                                            <h3 class="badge badge-white">Bénéfice 3 :</h3>
                                            @if (!empty($about->b3))
                                            <span class="badge badge-primary">{{ $about->b3 }}</span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="b3" id='delete'><i class="fa fa-trash"></i></a>
                                            </small><br><br>
                                            @else
                                            <span class="badge badge-danger">Pas d'information disponible</span><br><br>
                                            @endif
                                            <span class="badge badge-white">Detail :</span>
                                            @if (!empty($about->r3))
                                            <span class="badge badge-primary">{!! $about->r3!!}</span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="r3" id='delete'><i class="fa fa-trash"></i></a>
                                            </small>
                                            @else
                                            <span class="badge badge-danger">Pas d'information disponible</span><br><br>
                                            @endif
                                        </p>
                                        <hr>
                                        <p>
                                            <h3 class="badge badge-white">Bénéfice 4 :</h3>
                                            @if (!empty($about->b4))
                                            <span class="badge badge-primary">{{ $about->b4 }}</span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="b4" id='delete'><i class="fa fa-trash"></i></a>
                                            </small><br><br>
                                            @else
                                            <span class="badge badge-danger">Pas d'information disponible</span><br><br>
                                            @endif
                                            <span class="badge badge-white">Detail :</span>
                                            @if (!empty($about->r4))
                                            <span class="badge badge-primary">{!! $about->r4!!}</span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="r4" id='delete'><i class="fa fa-trash"></i></a>
                                            </small>
                                            @else
                                            <span class="badge badge-danger">Pas d'information disponible</span><br><br>
                                            @endif
                                        </p>
                                        <hr>
                                        <p>
                                            <h3 class="badge badge-white">Bénéfice 5 :</h3>
                                            @if (!empty($about->b5))
                                            <span class="badge badge-primary">{{ $about->b5 }}</span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="b5" id='delete'><i class="fa fa-trash"></i></a>
                                            </small><br><br>
                                            @else
                                            <span class="badge badge-danger">Pas d'information disponible</span><br><br>
                                            @endif
                                            <span class="badge badge-white">Detail :</span>
                                            @if (!empty($about->r5))
                                            <span class="badge badge-primary">{!! $about->r5!!}</span>
                                            <small class="btn btn-danger btn-circle">
                                                <a href="tel" title="r5" id='delete'><i class="fa fa-trash"></i></a>
                                            </small>
                                            @else
                                            <span class="badge badge-danger">Pas d'information disponible</span><br><br>
                                            @endif
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
                deletee(id,idv, '../destroy_about');
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
