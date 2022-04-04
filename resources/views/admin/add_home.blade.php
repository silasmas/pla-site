@extends('parties.adminTemplate',['titre'=>"P_AddHome"])


@section('autres_style')
<link href="{{asset('css/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/chosen/bootstrap-chosen.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/select2/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('js/parsley/parsley.css') }}">
{{-- <link rel="stylesheet" type="text/css" href="{{asset('css/iCheck/custom.css') }}"> --}}
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-markdown/bootstrap-markdown.min.css') }}">

@endsection
@section('content')
<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="panel-body" id="tab-PUBLICATION">
                            <div class="ibox-title">
                                <h5>Ce formulaire vous permet de poster des informations sur la page d'Accueil</h5>
                            </div>
                            <div class="ibox-content">

                                @if(session()->has('message'))
                                <div class="col-md-6 col-md-offset-3" >
                                       <div class="alert alert-success alert-dismissable">
                                           <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                           {{session()->get('message')}}
                                       </div>
                                </div>
                                @endif
                                <div class='row'>
                                    <div class=" col-lg-12 col-sm-12">
                                        <form id="" method="POST" class="" action="{{route('add.home')}}" class='form-group' enctype="multipart/form-data" data-parsley-validate>
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-6 form-group ">
                                                    <label>Texte reseau sociau (fr)</label>
                                                    <input type="text"  class="form-control" name='textsuivre' >
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Texte reseau sociau (en)</label>
                                                    <input type="text" class="form-control" name='textsuivre_en' >
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Adresse (fr)</label>
                                                    <input type="text" class="form-control" name='adresse' >
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Adresse (en)</label>
                                                    <input type="text" class="form-control" name='adresse_en'>
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Telephone (fr)</label>
                                                    <input type="phone" class="form-control" name='telephone' >
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Telephone (en)</label>
                                                    <input type="phone" class="form-control" name='telephone_en' >
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Lien de la page Facebook</label>
                                                    <input type="text" class="form-control" name='facebook' >
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Lien de la page Tweeter</label>
                                                    <input type="text" class="form-control" name='tweeter'>
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Lien de la page Linkedin</label>
                                                    <input type="text" class="form-control" name='linkedin'>
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Lien de la page Google+</label>
                                                    <input type="text" class="form-control" name='google'>
                                                </div>
                                                <div class="col-sm-12 form-group ">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" name='email'>
                                                </div>

                                                <div class="col-sm-6 form-group ">
                                                    <label>Titre 1 (FR) TEAM</label>
                                                    <input type="text" class="form-control" name='t1Team'>
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Titre 1 (EN)</label>
                                                    <input type="text" class="form-control" name='t1Team_en'>
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Titre 2 (FR) TEAM</label>
                                                    <input type="text" class="form-control" name='t2Team'>
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Titre 2 (EN)</label>
                                                    <input type="text" class="form-control" name='t2Team_en'>
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Titre 1 (FR) PUBLICATION</label>
                                                    <input type="text" class="form-control" name='t1Pub'>
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Titre 1 (EN)</label>
                                                    <input type="text" class="form-control" name='t1Pub_en'>
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Titre 2 (FR) PUBLICATION</label>
                                                    <input type="text" class="form-control" name='t2Pub'>
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Titre 2 (EN)</label>
                                                    <input type="text" class="form-control" name='t2Pub_en'>
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Titre de la page (FR) TEAM</label>
                                                    <input type="text" class="form-control" name='titreTeam'>
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Titre de la page (EN)</label>
                                                    <input type="text" class="form-control" name='titreTeam_en'>
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Description (FR) TEAM</label>
                                                    <input type="text" class="form-control" name='descriptionTeam'>
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Description (EN)</label>
                                                    <input type="text" class="form-control" name='descriptionTeam_en'>
                                                </div>
                                                <div class=" col-sm-12 form-group">
                                                    <label>Courte slogant footer (Française)</label>
                                                    <textarea class="summernote"  name="txtfooter" rows="10" col='12'
                                                        data-parsley-trigger="change">
                                                    </textarea>
                                                </div>
                                                <div class=" col-sm-12 form-group">
                                                    <label>Courte slogant footer (Anglaise)</label>
                                                    <textarea class="summernote" name="txtfooter_en" rows="12"
                                                        data-parsley-trigger="change">
                                                    </textarea>
                                                </div>
                                                <div class="col-lg-offset-3 col-lg-6 col-sm-12 form-group">
                                                    <div class="col-sm-offset-4 col-sm-5">

                                                        <button class="ladda-button btn btn-sm btn-primary"
                                                            id='ladda-session' data-style="expand-right"
                                                            type="submit">{{ isset($avocat)?'Modifier':'Enregistrer' }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                  <div class='row'>
                                    <div class=" col-lg-12 col-sm-12">
                                    <div class="ibox-title">
                                <h5>Ce formulaire vous permet de poster les différents logo des Partenaire</h5>
                            </div>
                                     </div>
                                    <div class=" col-lg-12 col-sm-12">
                                        <form id="" method="POST" class="" action="{{route('add.partenaire')}}" class='form-group' enctype="multipart/form-data" data-parsley-validate>
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-12 form-group">
                                                    <label>Partenaire 1</label>
                                                    <div class=" fileinput fileinput-new input-group"
                                                        data-provides="fileinput">
                                                        <div class="form-control" data-trigger="fileinput">
                                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                            <span class="fileinput-filename"></span>
                                                        </div>
                                                        <span class="input-group-addon btn btn-default btn-file"><span
                                                                class="fileinput-new">Image</span>
                                                            <span class="fileinput-exists">Changer</span><input
                                                                type="file" name="photo1" ></span>
                                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                                            data-dismiss="fileinput">Supprimer</a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 form-group">
                                                    <label>Lien du site 1</label>
                                                    <input type="text" class="form-control" name='l1'>
                                                </div>
                                                <div class="col-sm-12 form-group">
                                                    <label>Partenaire 2</label>
                                                    <div class=" fileinput fileinput-new input-group"
                                                        data-provides="fileinput">
                                                        <div class="form-control" data-trigger="fileinput">
                                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                            <span class="fileinput-filename"></span>
                                                        </div>
                                                        <span class="input-group-addon btn btn-default btn-file"><span
                                                                class="fileinput-new">Image</span>
                                                            <span class="fileinput-exists">Changer</span><input
                                                                type="file" name="photo2" ></span>
                                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                                            data-dismiss="fileinput">Supprimer</a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 form-group">
                                                    <label>Lien du site 2</label>
                                                    <input type="text" class="form-control" name='l2'>
                                                </div>
                                                <div class="col-sm-12 form-group">
                                                    <label>Partenaire 3</label>
                                                    <div class=" fileinput fileinput-new input-group"
                                                        data-provides="fileinput">
                                                        <div class="form-control" data-trigger="fileinput">
                                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                            <span class="fileinput-filename"></span>
                                                        </div>
                                                        <span class="input-group-addon btn btn-default btn-file"><span
                                                                class="fileinput-new">Image</span>
                                                            <span class="fileinput-exists">Changer</span><input
                                                                type="file" name="photo3" ></span>
                                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                                            data-dismiss="fileinput">Supprimer</a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 form-group">
                                                    <label>Lien du site 3</label>
                                                    <input type="text" class="form-control" name='l3'>
                                                </div>
                                                <div class="col-sm-12 form-group">
                                                    <label>Partenaire 4</label>
                                                    <div class=" fileinput fileinput-new input-group"
                                                        data-provides="fileinput">
                                                        <div class="form-control" data-trigger="fileinput">
                                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                            <span class="fileinput-filename"></span>
                                                        </div>
                                                        <span class="input-group-addon btn btn-default btn-file"><span
                                                                class="fileinput-new">Image</span>
                                                            <span class="fileinput-exists">Changer</span><input
                                                                type="file" name="photo4" ></span>
                                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                                            data-dismiss="fileinput">Supprimer</a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 form-group">
                                                    <label>Lien du site 4</label>
                                                    <input type="text" class="form-control" name='l4'>
                                                </div>
                                                <div class="col-lg-offset-3 col-lg-6 col-sm-12 form-group">
                                                    <div class="col-sm-offset-4 col-sm-5">

                                                        <button class="ladda-button btn btn-sm btn-primary"
                                                            id='ladda-session' data-style="expand-right"
                                                            type="submit">{{ isset($avocat)?'Modifier':'Enregistrer' }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
<script src="{{ asset('js/bootstrap-markdown/bootstrap-markdown.js') }}"></script>
<script src="{{ asset('js/bootstrap-markdown/markdown.js') }}"></script>
<script src="{{ asset('js/datapicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/chosen/chosen.jquery.js') }}"></script>
<script src="{{ asset('js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('js/jasny/jasny-bootstrap.min.js') }}"></script>


<script src="{{ asset('js/parsley/js/parsley.js') }}"></script>
<script src="{{ asset('js/parsley/i18n/fr.js') }}"></script>

<script src="{{ asset('js/toastr/toastr.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.summernote').summernote();

        // $(".select2_demo_4").select2({
        //         placeholder: "Choisissez un mentor",
        //         allowClear: true
        //     });
    });



</script>
@endsection
