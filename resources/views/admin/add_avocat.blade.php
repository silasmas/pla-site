@extends('parties.adminTemplate',['titre'=>"P_addAvocat"])


@section('autres_style')
<link href="{{asset('css/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/chosen/bootstrap-chosen.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/select2/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('js/parsley/parsley.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/chosen/bootstrap-chosen.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-markdown/bootstrap-markdown.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/dualListbox/bootstrap-duallistbox.min.css') }}">

@endsection
@section('content')
<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
                <div class="panel-body" id="tab-Team">
                    <div class="ibox-content">

                        @if(session()->has('message'))
                        <div class="col-md-6 col-md-offset-3">
                            <div class="alert alert-success alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                {{session()->get('message')}}
                            </div>
                        </div>
                        @endif
                        <div class="col-lg-12">
                            <div class="tabs-container">
                                <ul class="nav nav-tabs">
                                    <li class="{{isset($avocat)?"":" active" }}"><a data-toggle="tab"
                                            href="#tab-sessions">Fonction</a></li>
                                    <li class="{{ isset($avocat)?" active":'' }}"><a data-toggle="tab"
                                            href="#tab-smalGroupe">Equipe</a></li>
                                    <li class="{{ isset($affect)?" active":'' }}"><a data-toggle="tab"
                                            href="#tab-affecter">Affectation</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab-sessions" class="tab-pane {{isset($avocat)?"":" active" }}">
                                        <div class="panel-body ">
                                            <div class="ibox-title">
                                                <h5>Ce formulaire vous permet d'enregistrer les différentes fonction que
                                                    peux avoir un membre de l'équipe</h5>
                                            </div>
                                            <div class="col-lg-offset-1 col-lg-10 col-sm-12">
                                                <div class="ibox" id="tabCat">
                                                    <div class="ibox-content">
                                                        <div class="sk-spinner sk-spinner-wandering-cubes">
                                                            <div class="sk-cube1"></div>
                                                            <div class="sk-cube2"></div>
                                                        </div>
                                                        <div class='row'>
                                                            <div class=" col-lg-12 col-sm-12">
                                                                <form id="{{isset($fonctions)?'Updat':'formFonction'}}"
                                                                    method="POST" action="{{route('changerFonctions')}}"
                                                                    class="" data-parsley-validate>
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-lg-6 form-group ">
                                                                            <label>Nom de la fonction
                                                                                (français)</label>
                                                                            <input type="text" class="form-control"
                                                                                name='fonction' required
                                                                                value="{{isset($fonctions)?$fonctions->fonction:''}}"
                                                                                aria-required="true"
                                                                                data-parsley-minlength="2"
                                                                                data-parsley-trigger="change">
                                                                        </div>
                                                                        <div class="col-lg-6 form-group ">
                                                                            <label>Nom de la fonction
                                                                                (Anglais)</label>
                                                                            <input type="text" class="form-control"
                                                                                name='fonction_en' required
                                                                                value="{{isset($fonctions)?$fonctions->getTranslation('fonction','en'):''}}"
                                                                                aria-required="true"
                                                                                data-parsley-minlength="2"
                                                                                data-parsley-trigger="change">
                                                                        </div>
                                                                        <div
                                                                            class="col-lg-offset-3 col-lg-6 col-sm-12 form-group">
                                                                            <div class="col-sm-offset-4 col-sm-5">
                                                                                <button
                                                                                    class="ladda-button btn btn-sm btn-primary"
                                                                                    id='ladda-session'
                                                                                    data-style="expand-right"
                                                                                    type="submit">{{isset($fonctions)?'Modifier':'Enregistrer'}}</button>
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
                                    <div id="tab-smalGroupe" class="tab-pane {{isset($avocat)?" active":"" }}">
                                        <div class="panel-body">
                                            <div class="ibox-title">
                                                <h5>Ce formulaire vous permet d'enregistrer un membre de l'équipe</h5>
                                            </div>
                                            <div class='row'>
                                                <div class=" col-lg-12 col-sm-12">
                                                    <form id="" method="POST" class=""
                                                        action="{{isset($avocat)?route('UpdateAvocat'):route('add.team')}}"
                                                        class='form-group' enctype="multipart/form-data"
                                                        data-parsley-validate>
                                                        @csrf
                                                        <div class="row">
                                                            <div>
                                                                <input name="id" hidden
                                                                    value="{{ isset($avocat)?$avocat->id:'' }}" />
                                                            </div>
                                                            <div class="col-sm-4 form-group ">
                                                                <label>Nom</label>
                                                                <input type="text" placeholder="Entrez le Nom"
                                                                    class="form-control" name='nom' required
                                                                    aria-required="true"
                                                                    value="{{ isset($avocat)?$avocat->nom:'' }}"
                                                                    data-parsley-minlength="2"
                                                                    data-parsley-trigger="change">
                                                            </div>
                                                            <div class="col-sm-4 form-group ">
                                                                <label>Prénom</label>
                                                                <input type="text" placeholder="Entrez le Prénom"
                                                                    value="{{ isset($avocat)?$avocat->prenom:'' }}"
                                                                    class="form-control" name='prenom' {{
                                                                    isset($avocat)?'required aria-required="true"':'' }}
                                                                    data-parsley-minlength="2"
                                                                    data-parsley-trigger="change">
                                                                @if ($errors->has(' prenom')) <span
                                                                    class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('prenom')}}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                            <div class="col-sm-4 form-group ">
                                                                <label>Telephone</label>
                                                                <input type="phone" placeholder="(+243)82 000-0000"
                                                                    value="{{ isset($avocat)?$avocat->telephone:'' }}"
                                                                    class="form-control" name='telephone' id='telephone'
                                                                    required aria-required="true"
                                                                    data-parsley-minlength="3"
                                                                    data-parsley-trigger="change">
                                                                @if ($errors->has('telephone'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('telephone')}}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                            <div class="col-sm-6 form-group ">
                                                                <label>Sexe</label>
                                                                <select class=" form-control" id="sexe" required
                                                                    value="" aria-required="true" class="validate"
                                                                    data-parsley-trigger="change" name="sexe">
                                                                    @if (isset($avocat))
                                                                    <option value="H" {{ $avocat->
                                                                        sexe=='H'?'selected':'' }}>Home
                                                                    </option>
                                                                    <option value="F" {{ $avocat->
                                                                        sexe=='F'?'selected':'' }}>Femme
                                                                    </option>
                                                                    @else
                                                                    <option value="" disabled>Sexe</option>
                                                                    <option value="H">Home</option>
                                                                    <option value="F">Femme</option>
                                                                    @endif

                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6 form-group">
                                                                <label>Date de Naissance</label>
                                                                <div class="input-group date">
                                                                    <span class="input-group-addon"><i
                                                                            class="fa fa-calendar"></i></span>
                                                                    <input type="date" placeholder="Date debut"
                                                                        class="form-control"
                                                                        data-parsley-trigger="change"
                                                                        data-parsley-trigger="change"
                                                                        value="{{ isset($avocat)?$avocat->datenaissance:'' }}"
                                                                        name='datenaissance' {{
                                                                        isset($avocat)?'':'required aria-required="true"' }}>

                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 form-group ">
                                                                <label>E-mail</label>
                                                                <input type="email" placeholder="Adresse mail"
                                                                    class="form-control" name=' email' required
                                                                        aria-required="true"
                                                                        value="{{ isset($avocat)?$avocat->email:'' }}"
                                                                        data-parsley-minlength="2"
                                                                        data-parsley-trigger="change">
                                                                </div>
                                                                <div class="col-sm-4 form-group ">
                                                                    <label>Fonction </label>
                                                                    <select class=" form-control" id="fonction" required
                                                                        aria-required="true" class="validate"
                                                                        data-parsley-trigger="change" name="fonction">
                                                                        <option value="" disabled selected>fonction
                                                                        </option>

                                                                        @foreach ($fonction as $f)
                                                                        <option value="{{ $f->id }}"
                                                                            {{isset($avocat)?$f->
                                                                            id==$avocat->id?'selected':'':''}}>{{
                                                                            $f->fonction }}</option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-4 form-group ">
                                                                    <label>Niveau </label>
                                                                    <select class=" form-control" id="niveau" required
                                                                        aria-required="true" class="validate"
                                                                        data-parsley-trigger="change" name="niveau">
                                                                        <option value="" disabled selected>niveau
                                                                        </option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>

                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-12 form-group">
                                                                    <label>CV en PDF</label>
                                                                    <div class=" fileinput fileinput-new input-group"
                                                                        data-provides="fileinput">
                                                                        <div class="form-control"
                                                                            data-trigger="fileinput">
                                                                            <i
                                                                                class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                            <span class="fileinput-filename"></span>
                                                                        </div>
                                                                        <span
                                                                            class="input-group-addon btn btn-default btn-file"><span
                                                                                class="fileinput-new">CV PDF</span>
                                                                            <span
                                                                                class="fileinput-exists">Changer</span>
                                                                            <input type="file" name="pdfbio">
                                                                        </span>
                                                                        <a href="#"
                                                                            class="input-group-addon btn btn-default fileinput-exists"
                                                                            data-dismiss="fileinput">Supprimer</a>
                                                                    </div>
                                                                    @if ($errors->has('pdfbio'))

                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('pdfbio')}}</strong>
                                                                    </span>

                                                                    @endif
                                                                </div>
                                                                <div class="col-sm-12 form-group">
                                                                    <label>Photo</label>
                                                                    <div class=" fileinput fileinput-new input-group"
                                                                        data-provides="fileinput">
                                                                        <div class="form-control"
                                                                            data-trigger="fileinput">
                                                                            <i
                                                                                class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                            <span class="fileinput-filename"></span>
                                                                        </div>
                                                                        <span
                                                                            class="input-group-addon btn btn-default btn-file"><span
                                                                                class="fileinput-new">Profil</span>
                                                                            <span
                                                                                class="fileinput-exists">Changer</span><input
                                                                                type="file" name="photo" {{
                                                                                isset($avocat)?'':'required
                                                                                aria-required="true"' }}></span>
                                                                    <a href="#"
                                                                        class="input-group-addon btn btn-default fileinput-exists"
                                                                        data-dismiss="fileinput">Supprimer</a>
                                                                </div>
                                                                @if ($errors->has(' photo')) <span
                                                                                class="invalid-feedback" role="alert">
                                                                            <strong>{{
                                                                                $errors->first('photo')}}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                    <div class=" col-sm-12 form-group">
                                                                        <label>Description (Française)</label>
                                                                        {{-- <textarea name="biographie"
                                                                            class="summernote" rows="12"
                                                                            data-parsley-trigger="change" required
                                                                            aria-required="true">
                                                                                {{ isset($avocat)?$avocat->biographie:'' }}
                                                                            </textarea> --}}
                                                                        <div class=" fileinput fileinput-new input-group"
                                                                            data-provides="fileinput">
                                                                            <div class="form-control"
                                                                                data-trigger="fileinput">
                                                                                <i
                                                                                    class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                <span class="fileinput-filename"></span>
                                                                            </div>
                                                                            <span
                                                                                class="input-group-addon btn btn-default btn-file">
                                                                                <span class="fileinput-new">Fichier
                                                                                    (Française)</span>
                                                                                <span
                                                                                    class="fileinput-exists">Changer</span>
                                                                                <input type="file" name="biographie"
                                                                                    {{isset($avocat)?'':'requiredaria-required="true"' }}></span>
                                                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Supprimer</a>
                                                                        </div>
                                                                     </div>
                                                                    <div class=" col-sm-12 form-group">
                                                                            <label>Description (Anglaise)</label>
                                                                                {{-- <textarea name="biographie_en" class="summernote" rows="12"
                                                                                    data-parsley-trigger="change" required
                                                                                    aria-required="true">
                                                                                    {{ isset($avocat)?$avocat->getTranslation('
                                                                                    biographie','en'):'' }} </textarea>
                                                                                --}}
                                                                                <div class=" fileinput fileinput-new input-group"
                                                                                    data-provides="fileinput">
                                                                                    <div class="form-control"
                                                                                        data-trigger="fileinput">
                                                                                        <i
                                                                                            class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                        <span
                                                                                            class="fileinput-filename"></span>
                                                                                    </div>
                                                                                    <span
                                                                                        class="input-group-addon btn btn-default btn-file">
                                                                                        <span
                                                                                            class="fileinput-new">Fichier (ANglais)</span>
                                                                                        <span
                                                                                            class="fileinput-exists">Changer</span>
                                                                                        <input type="file" name="biographie_en"
                                                                                            {{isset($avocat)?'':'requiredaria-required="true"' }}></span>
                                                                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Supprimer</a>
                                                                                    </div>
                                                                    </div>
                                                                        <div
                                                                            class="col-lg-offset-3 col-lg-6 col-sm-12 form-group">
                                                                            <div class="col-sm-offset-4 col-sm-5">

                                                                                <button
                                                                                    class="ladda-button btn btn-sm btn-primary"
                                                                                    id=' ladda-session'
                                                                                            data-style="expand-right"
                                                                                            type="submit">{{
                                                                                        isset($avocat)?'Modifier':'Enregistrer'
                                                                                        }}</button>
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab-affecter" class="tab-pane">
                                        <div class="panel-body {{isset($affect)?" active":"" }}">
                                            <div class="ibox-title">
                                                <h5>Ce formulaire vous permet d'affecter un avoat dans un ou plusieurs
                                                    bureau</h5>
                                            </div>
                                            <div class=" col-lg-12 col-sm-12">
                                                <div class="ibox" id="tabbureau">
                                                    <div class="ibox-content">
                                                        <div class="sk-spinner sk-spinner-wandering-cubes">
                                                            <div class="sk-cube1"></div>
                                                            <div class="sk-cube2"></div>
                                                        </div>
                                                        <div class='row'>
                                                            <div class="col-lg-12 col-sm-12">
                                                                <form id="formBureau" method="POST"
                                                                    action="{{isset($categorie)?route('UpdateCategorie'):''}}"
                                                                    class="" data-parsley-validate>
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-sm-12 form-group ">
                                                                            <label>Avocat </label>
                                                                            <select class=" form-control" id="fonction"
                                                                                required aria-required="true"
                                                                                class="validate"
                                                                                data-parsley-trigger="change"
                                                                                name="avocat_id">
                                                                                <option value="" disabled selected>
                                                                                    Selectionez membre
                                                                                </option>
                                                                                @forelse ($avoca as $a)
                                                                                <option value="{{$a->id}}">{{
                                                                                    $a->prenom.'-'.$a->nom}}</option>
                                                                                @empty
                                                                                @endforelse
                                                                            </select>
                                                                        </div>
                                                                        <select name='bureau' id='bureau'
                                                                            class="form-control dual_select" multiple>
                                                                            @forelse ($bureau as $f)
                                                                            <option value="{{$f->id}}">{{
                                                                                strip_tags($f->adresse) }}</option>
                                                                            @empty
                                                                            @endforelse
                                                                        </select>
                                                                        <input name="tabFidel" id="inpute" hidden />
                                                                        <button
                                                                            class="ladda-button btn btn-sm btn-primary"
                                                                            data-style="expand-left"
                                                                            type="submit">Enregistrer</button>
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
<script src="{{ asset('js/chosen/chosen.jquery.js') }}"></script>
<script src="{{ asset('js/dualListbox/jquery.bootstrap-duallistbox.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.summernote').summernote();
        $('.chosen-select').chosen({width: "100%"});
        $('.dual_select').bootstrapDualListbox({
                selectorMinimalHeight: 160
            });
        // $(".select2_demo_4").select2({
        //         placeholder: "Choisissez un mentor",
        //         allowClear: true
        //     });
        $('#bureau').change(function(){
            $('#inpute').val($(this).val());
        });
        $("#formFonction").on("submit", function (e) {
            e.preventDefault();
            add("#formFonction", '#tabCat', 'add.fonction')
        });
        $("#Updat").on("submit", function (e) {
            e.preventDefault();
            update("#Updat", '#tabCatr', 'modifierFonctions')
        });
        $("#formBureau").on("submit", function (e) {
            e.preventDefault();
          //  alert($('#bureau').val());
            if ($('#bureau').val()!='') {
                add("#formBureau", '#tabbureau', 'add.affectation')
            } else {
                swal({
                        title: 'Veillez selectionnez au-moins un bureau',
                        icon: 'error'
                    })
            }
        });

    });

    function load(id) {
        $(id).children('.ibox-content').toggleClass('sk-loading');
    }

    function update(form, idLoad, url) {
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
