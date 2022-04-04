@extends('parties.adminTemplate',['titre'=>"P_AddSlide"])


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
                            <div class="ibox-title">
                                <h5>Ce formulaire vous permet de poster des slides sur la page d'Accueil</h5>
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
                                        <form id="" method="POST" class="" action="{{isset($slide)?route('UpdateSlide'):route('add.slide') }}" class='form-group' enctype="multipart/form-data" data-parsley-validate>
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-12  form-group ">
                                                    <input type="text" placeholder="Le titre"
                                                        class="form-control hidden" name='id' value="{{ isset($slide)?$slide->id:'' }}" >
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Titre samll (fr)</label>
                                                    <input type="text"  class="form-control" name='titresmall' value="{{ isset($slide)?$slide->titresmall:'' }}">
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Titre samll (en)</label>
                                                    <input type="text" class="form-control" name='titresmall_en' value="{{ isset($slide)?$slide->getTranslation('titresmall','en'):'' }}">
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Titre grand (fr)</label>
                                                    <input type="text" class="form-control" name='grandTitre' value="{{ isset($slide)?$slide->titrebig:''}}">
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Titre grand (en)</label>
                                                    <input type="text" class="form-control" name='grandTitre_en' value="{{ isset($slide)?$slide->getTranslation('titrebig','en'):'' }}">
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Texte du bouton (fr)</label>
                                                    <input type="text" class="form-control" name='txtbtn' value="{{ isset($slide)?$slide->textbtn:''}}">
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Texte du bouton (en)</label>
                                                    <input type="text" class="form-control" name='txtbtn_en' value="{{ isset($slide)?$slide->getTranslation('textbtn','en'):'' }}">
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Lien de la page </label>
                                                    <select class=" form-control" id="fonction" required
                                                        aria-required="true" class="validate"
                                                        data-parsley-trigger="change" name="lienvers">
                                                        <option value="" disabled selected>Selectionez une page
                                                        </option>
                                                        <option value="">Accueil</option>
                                                        <option value="about"  {{isset($slide)?$slide->lienvers=="about"?"selected":"":''}}>Apropo</option>
                                                        <option value="expertise" {{isset($slide)?$slide->lienvers=="expertise"?"selected":"":''}}>Expertise</option>
                                                        <option value="team"  {{isset($slide)?$slide->lienvers=="team"?"selected":"":''}}>Equipe</option>
                                                        <option value="presence"  {{ isset($slide)?$slide->lienvers=="presence"?"selected":"":''}}>Prsence</option>
                                                        <option value="publication"  {{isset($slide)?$slide->lienvers=="publication"?"selected":"":''}}>Publication</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label>Photo</label>
                                                    <div class=" fileinput fileinput-new input-group"
                                                        data-provides="fileinput">
                                                        <div class="form-control" data-trigger="fileinput">
                                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                            <span class="fileinput-filename"></span>
                                                        </div>
                                                        <span class="input-group-addon btn btn-default btn-file"><span
                                                                class="fileinput-new">Image</span>
                                                            <span class="fileinput-exists">Changer</span><input
                                                                type="file" name="photo"
                                                                {{ isset($slide)?'':'required aria-required="true"' }}></span>
                                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                                            data-dismiss="fileinput">Supprimer</a>
                                                    </div>

                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Courte Description (en)</label>
                                                    <input type="text" class="form-control" name='resume' value="{{ isset($slide)?$slide->getTranslation('resume','fr'):'' }}">
                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label>Courte Description (en)</label>
                                                    <input type="text" class="form-control" name='resume_en' value="{{ isset($slide)?$slide->getTranslation('resume','en'):'' }}">
                                                </div>
                                                <div class="col-lg-offset-3 col-lg-6 col-sm-12 form-group">
                                                    <div class="col-sm-offset-4 col-sm-5">

                                                        <button class="ladda-button btn btn-sm btn-primary"
                                                            id='ladda-session' data-style="expand-right"
                                                            type="submit">{{ isset($slide)?'Modifier':'Enregistrer' }}</button>
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
      //      $('.summernote').summernote();

        // $(".select2_demo_4").select2({
        //         placeholder: "Choisissez un mentor",
        //         allowClear: true
        //     });
    });



</script>
@endsection
