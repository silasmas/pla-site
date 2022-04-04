@extends('parties.adminTemplate',['titre'=>"P_addPublication"])

@section('autres_style')

<link href="{{asset('css/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('css/chosen/bootstrap-chosen.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('js/parsley/parsley.css') }}">
{{-- <link rel="stylesheet" type="text/css" href="{{asset('css/iCheck/custom.css') }}"> --}}
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-markdown/bootstrap-markdown.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/select2/select2.min.css') }}">
@endsection
@section('content')
<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">

        <div class="col-lg-12">
            <div class="row">
                @if(session()->has('message'))
                <div class="col-md-6 col-md-offset-3">
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        {{session()->get('message')}}
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="col-lg-12">
            <div class="tabs-container">
                <ul class="nav nav-tabs">
                    <li class="{{isset($pub)?"":"active" }}"><a data-toggle="tab" href="#tab-sessions">Catégorie</a></li>
                    <li class="{{ isset($pub)?"active":'' }}"><a data-toggle="tab" href="#tab-smalGroupe">Publication</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab-sessions" class="tab-pane {{isset($pub)?"":"active" }}">
                        <div class="panel-body">
                            <div class="col-lg-offset-1 col-lg-10 col-sm-12">
                                <div class="ibox" id="tabCat">
                                    <div class="ibox-title">
                                        <h5>
                                            {{isset($categorie)?'Ce formulaire vous permet de modifier la catégorie':'Ce formulaire vous permet de crée une nouvelle catégorie'}}
                                        </h5>
                                    </div>
                                    <div class="ibox-content">
                                        <div class="sk-spinner sk-spinner-wandering-cubes">
                                            <div class="sk-cube1"></div>
                                            <div class="sk-cube2"></div>
                                        </div>
                                        <div class='row'>
                                            <div class=" col-lg-12 col-sm-12">
                                                <form id="{{isset($categorie)?'UpdateCate':'formCat'}}" method="POST" action="{{isset($categorie)?route('UpdateCategorie'):''}}" class="" data-parsley-validate>
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-6 form-group ">
                                                            <label>Nom de la catégorie (français)</label>
                                                            <input type="text" hidden value="{{isset($categorie)?$categorie->id:''}}" name="id"/>
                                                            <input type="text" placeholder="Le nom de la catégorie"
                                                                class="form-control" name='nom' required value="{{isset($categorie)?$categorie->nom:''}}"
                                                                aria-required="true" data-parsley-minlength="2"
                                                                data-parsley-trigger="change">
                                                        </div>
                                                        <div class="col-lg-6 form-group ">
                                                            <label>Nom de la catégorie (Anglais)</label>
                                                            <input type="text" hidden value="{{isset($categorie)?$categorie->id:''}}" name="id"/>
                                                            <input type="text" placeholder="Le nom de la catégorie"
                                                                class="form-control" name='nom_en' required value="{{isset($categorie)?$categorie->nom:''}}"
                                                                aria-required="true" data-parsley-minlength="2"
                                                                data-parsley-trigger="change">
                                                        </div>
                                                        <div class="col-lg-offset-3 col-lg-6 col-sm-12 form-group">
                                                            <div class="col-sm-offset-4 col-sm-5">
                                                                <button class="ladda-button btn btn-sm btn-primary"
                                                                    id='ladda-session' data-style="expand-right"
                                                                    type="submit">{{isset($categorie)?'Modifier':'Enregistrer'}}</button>
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
                    <div id="tab-smalGroupe" class="tab-pane {{ isset($pub)?"active":'' }}">
                        <div class="panel-body">
                            <div class=" col-lg-12 col-sm-12">
                                <div class="ibox" id="tab-smlGroup">
                                    <div class="ibox-title">
                                        <h5>Ce formulaire vous permet de poster une publication</h5>
                                    </div>
                                    <div class="ibox-content">
                                        <div class='row'>
                                            <div class="col-lg-12 col-sm-12">
                                                <form method="POST" action="{{isset($pub)?route('UpdatePublication'):route('add.pub') }}" class='form-group' enctype="multipart/form-data" data-parsley-validate>
                                                    @csrf
                                                    <div class="row">
                                                        {{-- <div class="col-sm-12  form-group hidden"> --}}
                                                            <input type="text" hidden class="form-control hidden" value="{{ isset($pub)?$pub->id:'' }}" name="id"/>
                                                        {{-- </div> --}}
                                                        <div class="col-sm-6  form-group ">
                                                            <label>Titre (Francais)</label>
                                                            <input type="text" placeholder="Le titre" value="{{isset($pub)?$pub->titre:""}}"
                                                                class="form-control" name='titre' required
                                                                aria-required="true" data-parsley-minlength="2"
                                                                data-parsley-trigger="change">
                                                        </div>
                                                        <div class="col-sm-6  form-group ">
                                                            <label>Titre (Anglais)</label>
                                                            <input type="text" placeholder="Le titre" value="{{isset($pub)?$pub->getTranslation('titre','en'):""}}"
                                                                class="form-control" name='titre_en' required
                                                                aria-required="true" data-parsley-minlength="2"
                                                                data-parsley-trigger="change">
                                                        </div>
                                                        <div class="col-sm-6  form-group ">
                                                            <label>Sous-titre (Français)</label>
                                                            <input type="text" placeholder="Le sous titre" value="{{ isset($pub)?$pub->soustitre:"" }}"
                                                                class="form-control" name='soustitre'>
                                                        </div>
                                                        <div class="col-sm-6  form-group ">
                                                            <label>Sous-titre (Anglais)</label>
                                                            <input type="text" placeholder="Le sous titre" value="{{ isset($pub)?$pub->getTranslation('soustitre','en'):"" }}"
                                                                class="form-control" name='soustitre_en'>
                                                        </div>
                                                        <div class="col-lg-6 form-group">
                                                            <label>Avocat</label>
                                                            <select class="select2_demo_4 form-control" id="" required
                                                            {{ isset($pub)?'':'required aria-required="true" data-parsley-trigger="change"'}}
                                                               name="avocat_id">
                                                                <option value="" disabled {{ isset($pub)?'':'selected'}}></option>
                                                                @forelse ($avocat as $se)
                                                                <option value="{{ $se->id }}" value="{{
                                                                isset($pub)?$se->id==$pub->id?'selected':'':''}}" {{ isset($pub)?$se->id==$pub->id?'selected':'':''}}>
                                                                    {{ $se->prenom.'-'.$se->nom }}</option>
                                                                @empty
                                                                <option value="">Acun avocat enregistrer</option>
                                                                @endforelse
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6 form-group">
                                                            <label>Catégorie</label>
                                                            <select class="select2_cat form-control" id=""
                                                            {{ isset($pub)?'':'aria-required="true" data-parsley-trigger="change"'}}
                                                                name="categorie_id">
                                                                <option value="" disabled selected></option>

                                                                @forelse($cat as $se)
                                                                <option value="{{ $se->id }}" value="{{ isset($pub)?$se->id==$pub->id?'selected':'':''}}" {{ isset($pub)?$se->id==$pub->id?'selected':'':''}}>{{ $se->nom }}</option>
                                                                @empty
                                                                <option value="">Acune catégorie enregistrer</option>
                                                                @endforelse
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 form-group">
                                                            <label>PDF</label>
                                                            <div class=" fileinput fileinput-new input-group"
                                                                data-provides="fileinput">
                                                                <div class="form-control" data-trigger="fileinput">
                                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                    <span class="fileinput-filename"></span>
                                                                </div>
                                                                <span class="input-group-addon btn btn-default btn-file"><span
                                                                        class="fileinput-new">PDF</span>
                                                                    <span class="fileinput-exists">Changer</span>
                                                                    <input type="file" name="pubpdf" ></span>
                                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                                                    data-dismiss="fileinput">Supprimer</a>
                                                                </div>
                                                        </div>
                                                        <div class="col-sm-12 form-group">
                                                            <label>Cover</label>
                                                            <div class=" fileinput fileinput-new input-group"
                                                                data-provides="fileinput">
                                                                <div class="form-control" data-trigger="fileinput">
                                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                    <span class="fileinput-filename"></span>
                                                                </div>
                                                                <span class="input-group-addon btn btn-default btn-file"><span
                                                                        class="fileinput-new">cover</span>
                                                                    <span class="fileinput-exists">Changer</span>
                                                                    <input type="file" name="cover"
                                                                    {{ isset($pub)?'':'aria-required="true" data-parsley-trigger="change"'}}></span>
                                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                                                    data-dismiss="fileinput">Supprimer</a>
                                                                </div>
                                                        </div>
                                                        <div class=" col-sm-12 col-lg-12 form-group">
                                                            <label>Publication (Français)</label>
                                                            <textarea name="contenu" class="summernote"
                                                                rows="12" id='' data-parsley-trigger="change"
                                                                required aria-required="true">
                                                                {{ isset($pub)?$pub->contenu:'' }}
                                                        </textarea>
                                                        </div>
                                                        <div class=" col-sm-12 col-lg-12 form-group">
                                                            <label>Publication (Anglais)</label>
                                                            <textarea name="contenu_en" class="summernote"
                                                                rows="12" id='' data-parsley-trigger="change"
                                                                required aria-required="true">
                                                                {{ isset($pub)?$pub->getTranslation('contenu','en'):'' }}
                                                        </textarea>
                                                        </div>
                                                        <div class="col-sm-offset-3  col-sm-9 form-group">
                                                            <div class="col-sm-offset-4 col-sm-5">
                                                                <button class="btn btn-sm btn-primary"
                                                                    type="submit"> {{ isset($pub)?'Modifier':'Enregistrer' }}</button>
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
@endsection
@section('autres-script')
<script src="{{ asset('js/bootstrap-markdown/bootstrap-markdown.js') }}"></script>
<script src="{{ asset('js/bootstrap-markdown/markdown.js') }}"></script>
<script src="{{ asset('js/datapicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/chosen/chosen.jquery.js') }}"></script>
<script src="{{ asset('js/jasny/jasny-bootstrap.min.js') }}"></script>


<script src="{{ asset('js/parsley/js/parsley.js') }}"></script>
<script src="{{ asset('js/parsley/i18n/fr.js') }}"></script>

<script src="{{ asset('js/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('js/select2/select2.full.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.summernote').summernote();
        $("#description").markdown({
            autofocus: false,
            savable: false
        });

        $("#formCat").on("submit", function (e) {
            e.preventDefault();
            add("#formCat", '#tabCat', 'add.cat')
        });
        $("#UpdateCat").on("submit", function (e) {
            e.preventDefault();
            add("#UpdateCat", '#tabCat','updatecategorie')
        });

        $(".select2_demo_4").select2({
            placeholder: "Choisissez un avocat",
            allowClear: true
        });
        $(".select2_cat").select2({
            placeholder: "Choisissez une catégorie",
            allowClear: true
        });
    });

    function load(id) {
        $(id).children('.ibox-content').toggleClass('sk-loading');
    }

    function add(form, idLoad, url) {
        var f = form;
        var loade = idLoad;
        var u = url;
        load(loade);
        $.ajax({
            url: u,
            method: "post",
            data: $(f).serialize(),
            success: function (data) {
                load(loade);
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

                    $(f)[0].reset();
                }

            },
        });

    }

</script>
@endsection
