@extends('parties.adminTemplate',['titre'=>"G_Home"])


@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
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
    <div class="tabs-container">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab_publication">Equipes</a></li>
            <li class=""><a data-toggle="tab" href="#tab_categorie">Fonctions</a></li>
        </ul>
        <div class="tab-content">
            <div id="tab_publication" class="tab-pane active">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{ route('downloadQrHome') }}" target="_blank" class="btn btn-lg btn-success center-version">
                                <i class="fa fa-download"></i>
                                <i class="fa fa-qrcode"></i>QRCODE DU SITE</a>
                        </div>
                    </div>
                    <div class="row">

<br><br>
                        @forelse ($avocat as $av)
                        <div class="col-lg-3">
                            <div class="contact-box center-version">

                                <a href="{{ route('detailAvocat',['id'=>$av->id]) }}">

                                    <img alt="image" class="img-circle" src="{{ 'storage/'.$av->photo }}">


                                    <h3 class="m-b-xs"><strong>{{ $av->prenom.' '.$av->nom.' ('.$av->niveau.')'
                                            }}</strong></h3>

                                    <div class="font-bold">{{ $av->fonction->fonction }}</div>
                                    <address class="m-t-md">
                                        <strong>{{ $av->email }}</strong><br>
                                        Publication : <strong>{{ $av->publication->count()}}</strong><br>
                                        <abbr title="Phone">P:</abbr> {{ $av->telephone }}
                                    </address>
                                    <div class="row">
                                        @if ($av->pdfbio && file_exists("storage/".$av->pdfbio))
                                        <small class="col-sm-6 col-sm-offset-3 mb-3" style="margin-bottom: 10px;">
                                            <a href="" id="{{ $av->pdfbio}}"
                                                class="btn btn-xs btn-primary btn-xs btn-download">
                                                <i class="fa fa-download"></i>
                                                <i class="fa fa-file-pdf-o"></i>
                                                CV</a>
                                        </small>
                                        @else
                                        <small class="col-sm-6 col-sm-offset-3 mb-3" style="margin-bottom: 10px;">
                                            <a href="" class="btn btn-danger  btn-xs btn-download">
                                                <i class="fa fa-download"></i>
                                                <i class="fa fa-file-pdf-o"></i>
                                                CV Absent</a>
                                        </small>
                                        @endif
                                        <small class="col-sm-6 col-sm-offset-3" style="margin-bottom: 10px;">
                                            <a href="{{ route('downloadQr',["id"=>$av->id]) }}" target="_blank" id="{{
                                                $av->id}}"
                                                class="btn btn-xs btn-warning ">
                                                <i class="fa fa-download"></i>
                                                <i class="fa fa-qrcode"></i>QRCODE</a>
                                        </small>
                                    </div>



                                </a>
                                <div class="contact-box-footer">
                                    <div class="m-t-xs btn-group">
                                        <a href="{{ route('detailAvocat',['id'=>$av->id]) }}"
                                            class="btn btn-xs btn-white"><i class="fa fa-info-circle"></i> detail</a>
                                        <a href="{{ route('editAvocat',['id'=>$av->id]) }}"
                                            class="btn btn-xs btn-white"><i class="fa fa-edit"></i> Edite </a>
                                        <a id="deleteAvocat" href="{{$av->id}}" class="btn btn-xs btn-white"><i
                                                class="fa fa-trash"></i> delete</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @empty
                        <span class="badge badge-danger">Pas d'information disponible</span><br>
                        @endforelse
                    </div>
                </div>
            </div>
            <div id="tab_categorie" class="tab-pane">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom de la fonction</th>
                                    <th>Date d'enregistrement</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($fonction as $i)
                                <tr class="gradeX">
                                    <td>{{ $i->id }}</td>
                                    <td>{{ $i->fonction }}
                                    </td>
                                    <td> {{ \Carbon\Carbon::parse( $i->created_at)->isoFormat('LLLL') }}</td>
                                    <td class="center">
                                        <p>
                                            <a href="{{ $i->id }}" id="deleteFonc"
                                                class="btn btn-outline btn-danger dim">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <a href="{{route('editFonction',$i->id)}}"
                                                class="btn btn-outline btn-warning dim">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </p>
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Nom de la catégorie</th>
                                    <th>Date d'enregistrement</th>
                                    <th>Options</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
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
            $(document).on("click", "#deleteAvocat", function (e) {
                e.preventDefault();
                var id = $(this).attr("href");
                deleteTeame(id, '../destroy_Avocat');
            });
            $(document).on("click", "#deleteFonc", function (e) {
                e.preventDefault();
                var id = $(this).attr("href");
                //alert(id);
                deleteTeame(id, './destroy_fonction');
            });
        });
function deleteTeame(id, url) {
    swal({
        title: "Attention suppression",
        text: "Cette suppression entrainera aussi la suppression des informations qui lui sont attachées?",
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


    $(".btn-download").click(function(e){
        e.preventDefault();
        var data = $(this).attr('id');

        $.ajax({
            type: 'GET',
            url: 'downloadCv',
            data: {'cv':data},
            xhrFields: {
                responseType: 'blob'
            },
            success: function(response){
                var blob = new Blob([response]);
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download ='PLA_'+data;
                link.click();
            },
            error: function(blob){
                console.log(blob);
            }
        });
    });
    $(".downloadQr").click(function(e){
        e.preventDefault();
        var data = $(this).attr('id');

        $.ajax({
            type: 'GET',
            url: 'downloadQr',
            data: {'cv':data},
            xhrFields: {
                responseType: 'blob'
            },
            success: function(response){
                var blob = new Blob([response]);
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download ='PLA_'+data;
                link.click();
            },
            error: function(blob){
                console.log(blob);
            }
        });
    });

</script>
@endsection
