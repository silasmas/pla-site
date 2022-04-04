@extends('parties.adminTemplate',['titre'=>"P_AddExpertise"])


        @section('autres_style')
        <link href="{{asset('css/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/chosen/bootstrap-chosen.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/select2/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{asset('js/parsley/parsley.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/select2/select2.min.css') }}">
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
                                        <div class='row'>
                                            <div class="col-lg-12">

                                                        <div id="tab-smalGroupe" class="tab-pane active">
                                                            <div class="panel-body">
                                                                <div class=" col-lg-12 col-sm-12">
                                                                    <div class="ibox" id="tab-smlGroup">
                                                                        <div class="ibox-title">
                                                                            @if (isset($exp))
                                                                            <h5>Ce formulaire vous permet de modifier une expertise</h5>
                                                                            @else
                                                                            <h5>Ce formulaire vous permet de poster une expertise</h5>
                                                                            @endif
                                                                        </div>
                                                                        <div class="ibox-content">
                                                                            <div class='row'>
                                                                                <div class="col-lg-12 col-sm-12">
                                                                                    <form method="POST" action="{{isset($exp)?route('UpdateExp'):route('add.expertise') }}" class='form-group' enctype="multipart/form-data" data-parsley-validate>
                                                                                        @csrf
                                                                                        <div class="row">
                                                                                            <div class="col-sm-12  form-group ">
                                                                                                <input type="text" placeholder="Le titre"
                                                                                                    class="form-control hidden" name='id' value="{{ isset($exp)?$exp->id:'' }}" hidden>
                                                                                            </div>
                                                                                            <div class="col-lg-12 form-group">
                                                                                                <label>Catégorie</label>
                                                                                                <select class="select2_cat form-control" id="" aria-required="true"
                                                                                                data-parsley-trigger="change" name="sorte" required>
                                                                                                    <option value="" disabled selected></option>
                                                                                                    <option value="1"  {{isset($exp)?$exp->sorte=="1"?"selected":"":''}}>Secteur d'activité</option>
                                                                                                    <option value="2"  {{ isset($exp)?$exp->sorte=="2"?"selected":"":''}}>Domaine de competence</option>
                                                                                                </select>
                                                                                            </div>

                                                                                            <div class="col-sm-6  form-group ">
                                                                                                <label>Grand Titre  (Francais)</label>
                                                                                                <input type="text" placeholder="Le titre"
                                                                                                    class="form-control" name='titre1' value="{{isset($exp)?$exp->titre1:'' }}">
                                                                                            </div>
                                                                                            <div class="col-sm-6  form-group ">
                                                                                                <label>Grand Titre (Anglais)</label>
                                                                                                <input type="text" placeholder="Le titre"
                                                                                                    class="form-control" name='titre1_en' value="{{isset($exp)?$exp->getTranslation('titre1','en'):''  }}">
                                                                                            </div>
                                                                                            <div class="col-sm-6  form-group ">
                                                                                                <label>Titre expertise (Français)</label>
                                                                                                <input type="text" placeholder="Le sous titre"
                                                                                                    class="form-control" name='titre2' value="{{ isset($exp)?$exp->titre2:'' }}">
                                                                                            </div>
                                                                                            <div class="col-sm-6  form-group ">
                                                                                                <label>Titre expertise (Anglais)</label>
                                                                                                <input type="text" placeholder="Le sous titre"
                                                                                                    class="form-control" name='titre2_en' value="{{isset($exp)?$exp->getTranslation('titre2','en'):''  }}">
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
                                                                                                        <input type="file" name="photo"
                                                                                                        {{ isset($pub)?'':'aria-required="true" data-parsley-trigger="change"'}}></span>
                                                                                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                                                                                        data-dismiss="fileinput">Supprimer</a>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class=" col-sm-12 col-lg-12 form-group">
                                                                                                <label>Contenu (Français)</label>
                                                                                                <textarea name="contenu" class="summernote"
                                                                                                    rows="12" id=''>
                                                                                                    {{ isset($exp)?$exp->getTranslation('contenu','fr'):'' }}
                                                                                            </textarea>
                                                                                            </div>
                                                                                            <div class=" col-sm-12 col-lg-12 form-group">
                                                                                                <label>Contenu (Anglais)</label>
                                                                                                <textarea name="contenu_en" class="summernote"
                                                                                                    rows="12" id=''>
                                                                                                    {{ isset($exp)?$exp->getTranslation('contenu','en'):'' }}
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
        <script src="{{ asset('js/select2/select2.full.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('.summernote').summernote();

                $("#formCat").on("submit", function (e) {
                    e.preventDefault();
                    add("#formCat", '#tabCat', 'add.sorte')
                });
                $(".select2_cat").select2({
                    placeholder: "Choisissez un avocat",
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
