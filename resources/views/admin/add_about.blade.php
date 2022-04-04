@extends('parties.adminTemplate',['titre'=>"P_addAbout"])


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
                        <div class="panel-body" id="tab-Team">

                            <div class="ibox-content">

                                @if(session()->has('message'))
                                <div class="col-md-6 col-md-offset-3" >
                                       <div class="alert alert-success alert-dismissable">
                                           <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                           {{session()->get('message')}}
                                       </div>
                                </div>
                                @endif
                                <div class="col-lg-12">
                                    <div class="tabs-container">
                                        <ul class="nav nav-tabs">
                                            <li class="{{isset($pub)?"":"active" }}">
                                                <a data-toggle="tab" href="#tab-apropo">Apropo</a></li>
                                            <li class="{{ isset($pub)?"active":'' }}">
                                                <a data-toggle="tab" href="#tab-benefice">Bénéfice</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="tab-apropo" class="tab-pane active">
                                                <div class="ibox-title">
                                                    <h5>Ce formulaire vous permet de posté les éléments sur la page ABOUT</h5>
                                                </div>
                                                <div class='row'>
                                                    <div class=" col-lg-12 col-sm-12">
                                                        <form id="" method="POST" class="" action="{{route('add.about')}}" class='form-group' enctype="multipart/form-data" data-parsley-validate>
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Titre 1 (fr)</label>
                                                                    <input type="text" class="form-control" name='quisommenous' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Titre 1 (en)</label>
                                                                    <input type="text" class="form-control" name='quisommenous_en'>
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Grand Titre (fr)</label>
                                                                    <input type="text" class="form-control" name='titrecabinet' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Grand Titre (en)</label>
                                                                    <input type="text" class="form-control" name='titrecabinet_en' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Slogant (fr)</label>
                                                                    <input type="text" class="form-control" name='slogant' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Slogant (en)</label>
                                                                    <input type="text" class="form-control" name='slogant_en' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Titre vision (fr)</label>
                                                                    <input type="text" class="form-control" name='titreNosValeurs' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Titre vision (en)</label>
                                                                    <input type="text" class="form-control" name='titreNosValeurs_en' >
                                                                </div>
                                                                <div class="col-sm-4 form-group ">
                                                                    <label>Temps d'existence (mois ou année) (fr)</label>
                                                                    <input type="text" class="form-control" name='temps' >
                                                                </div>
                                                                <div class="col-sm-4 form-group ">
                                                                    <label>Temps d'existence (mois ou année) (en)</label>
                                                                    <input type="text" class="form-control" name='temps_en' >
                                                                </div>
                                                                <div class="col-sm-4 form-group ">
                                                                    <label>Nombre d'année (en chiffre)</label>
                                                                    <input type="text" class="form-control" name='nbrexperience' >
                                                                </div>
                                                                <div class="col-sm-6 form-group">
                                                                    <label>Photo about Accueil</label>
                                                                    <div class=" fileinput fileinput-new input-group"
                                                                        data-provides="fileinput">
                                                                        <div class="form-control" data-trigger="fileinput">
                                                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                            <span class="fileinput-filename"></span>
                                                                        </div>
                                                                        <span class="input-group-addon btn btn-default btn-file"><span
                                                                                class="fileinput-new">Photo about Accueil</span>
                                                                            <span class="fileinput-exists">Changer</span>
                                                                            <input type="file" name="photohome" >
                                                                        </span>
                                                                        <a href="#"
                                                                            class="input-group-addon btn btn-default fileinput-exists"
                                                                            data-dismiss="fileinput">Supprimer</a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 form-group">
                                                                    <label>Photo about Apropo</label>
                                                                    <div class=" fileinput fileinput-new input-group"
                                                                        data-provides="fileinput">
                                                                        <div class="form-control" data-trigger="fileinput">
                                                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                            <span class="fileinput-filename"></span>
                                                                        </div>
                                                                        <span class="input-group-addon btn btn-default btn-file"><span
                                                                                class="fileinput-new">Photo about Apropo</span>
                                                                            <span class="fileinput-exists">Changer</span><input
                                                                                type="file" name="photoabout" ></span>
                                                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                                                            data-dismiss="fileinput">Supprimer</a>
                                                                    </div>

                                                                </div>
                                                                <div class=" col-sm-6 form-group">
                                                                    <label>Description bénéfice (Française)</label>
                                                                    <textarea name="extrait" data-provide="markdown" rows="6">
                                                                    </textarea>
                                                                </div>
                                                                <div class=" col-sm-6 form-group">
                                                                    <label>Extrait description bénéfice (Anglaise)</label>
                                                                    <textarea name="extrait_en" data-provide="markdown" rows="6">
                                                                    </textarea>
                                                                </div>
                                                                <div class=" col-sm-12 form-group">
                                                                    <label>Description apropo (Française)</label>
                                                                    <textarea name="contenu" class="summernote" rows="6"
                                                                        data-parsley-trigger="change">
                                                                    </textarea>
                                                                </div>
                                                                <div class=" col-sm-12 form-group">
                                                                    <label>Description apropo (Anglaise)</label>
                                                                    <textarea name="contenu_en" class="summernote" rows="6"
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
                                            </div>
                                            <div id="tab-benefice" class="tab-pane">
                                                <div class="ibox-title">
                                                    <h5>Ce formulaire vous permet de posté les éléments sur la page ABOUT dans la partie Bénéfices</h5>
                                                </div>
                                                <div class='row'>
                                                    <div class=" col-lg-12 col-sm-12">
                                                        <form id="" method="POST" class="" action="{{route('add.benefice')}}" class='form-group' enctype="multipart/form-data" data-parsley-validate>
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Grand titre bénefice (fr)</label>
                                                                    <input type="text" class="form-control" name='titrebigbenefice' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Grand titre bénefice (en)</label>
                                                                    <input type="text" class="form-control" name='titrebigbenefice_en' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Small titre bénefice (fr)</label>
                                                                    <input type="text" class="form-control" name='titreBeneficesmall' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Small titre bénefice (en)</label>
                                                                    <input type="text" class="form-control" name='titreBeneficesmall_en' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Raison 1 (fr)</label>
                                                                    <input type="text" class="form-control" name='b1' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Raison 1 (en)</label>
                                                                    <input type="text" class="form-control" name='b1_en' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Detail raison 1 (fr)</label>
                                                                    <input type="text" class="form-control" name='r1' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Detail raison 1 (en)</label>
                                                                    <input type="text" class="form-control" name='r1_en' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Raison 2 (fr)</label>
                                                                    <input type="text" class="form-control" name='b2' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Raison 2 (en)</label>
                                                                    <input type="text" class="form-control" name='b2_en' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Detail raison 2 (fr)</label>
                                                                    <input type="text" class="form-control" name='r2' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Detail raison 2 (en)</label>
                                                                    <input type="text" class="form-control" name='r2_en' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Raison 3 (fr)</label>
                                                                    <input type="text" class="form-control" name='b3' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Raison 3 (en)</label>
                                                                    <input type="text" class="form-control" name='b3_en' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Detail raison 3 (fr)</label>
                                                                    <input type="text" class="form-control" name='r3' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Detail raison 3 (en)</label>
                                                                    <input type="text" class="form-control" name='r3_en' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Raison 4 (fr)</label>
                                                                    <input type="text" class="form-control" name='b4' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Raison 4 (en)</label>
                                                                    <input type="text" class="form-control" name='b4_en' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Detail raison 4 (fr)</label>
                                                                    <input type="text" class="form-control" name='r4' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Detail raison 4 (en)</label>
                                                                    <input type="text" class="form-control" name='r4_en' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Raison 5 (fr)</label>
                                                                    <input type="text" class="form-control" name='b5' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Raison 5 (en)</label>
                                                                    <input type="text" class="form-control" name='b5_en' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Detail raison 5 (fr)</label>
                                                                    <input type="text" class="form-control" name='r5' >
                                                                </div>
                                                                <div class="col-sm-6 form-group ">
                                                                    <label>Detail raison 5 (en)</label>
                                                                    <input type="text" class="form-control" name='r5_en' >
                                                                </div>
                                                                <div class="col-sm-12 form-group">
                                                                    <label>Photo</label>
                                                                    <div class=" fileinput fileinput-new input-group"
                                                                        data-provides="fileinput">
                                                                        <div class="form-control" data-trigger="fileinput">
                                                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                            <span class="fileinput-filename"></span>
                                                                        </div>
                                                                        <span class="input-group-addon btn btn-default btn-file"><span
                                                                                class="fileinput-new">Photo</span>
                                                                            <span class="fileinput-exists">Changer</span>
                                                                            <input type="file" name="photobenefice" >
                                                                        </span>
                                                                        <a href="#"
                                                                            class="input-group-addon btn btn-default fileinput-exists"
                                                                            data-dismiss="fileinput">Supprimer</a>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class=" col-sm-6 form-group">
                                                                    <label>Description bénéfice (Française)</label>
                                                                    <textarea name="resume" class="summernote" rows="6">
                                                                    </textarea>
                                                                </div>
                                                                <div class=" col-sm-6 form-group">
                                                                    <label>Description bénéfice (Anglaise)</label>
                                                                    <textarea name="resume_en" class="summernote" rows="6">
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
