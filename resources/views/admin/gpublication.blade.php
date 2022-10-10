@extends('parties.adminTemplate',['titre'=>"G_Publication"])

@section('autres_style')
<link href="{{ asset('css/dataTables/datatables.min.cs') }}" rel="stylesheet">
@endsection
@section('content')

<div class="wrapper wrapper-content">
    <div class="row animated fadeInRight">

        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab_publication">Publications</a></li>
                <li class=""><a data-toggle="tab" href="#tab_categorie">Catégories</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab_publication" class="tab-pane active">
                    <div class="panel-body">
                        @forelse ($publication as $pub)
                        <div class="col-md-4">
                            <div class="ibox">
                                <div class="ibox-content product-box">

                                    <div class="product-imitation" style="padding: 2px 0 !important;">
                                        <img src="{{'../storage/'.$pub->cover}}" class="img-responsive"
                                            style="height: 250px !important;" height="50" />
                                    </div>
                                    <div class="product-desc">
                                        <span class="product-price">
                                            {{ $pub->created_at->format('d').'-'.$pub->created_at->format('M') }}
                                        </span>
                                        <small class="text-muted">{{ $pub->categorie->nom }}</small>
                                        <a href="{{ route('admin_detailPublication',['id'=>$pub->id]) }}"
                                            class="product-name">
                                            {{ $pub->titre }}</a>



                                        <div class="small m-t-xs">
                                            {{-- {!! strlen($pub->contenu) > 200 ? substr($pub->contenu,0,200).'...' :
                                            $pub->contenu!!} --}}
                                            {!! strlen($pub->contenu) > 200 ?
                                            substr(strip_tags($pub->contenu),0,200).'...' : $pub->contenu!!}
                                        </div>
                                        <div class="m-t text-righ">

                                            <a href="{{ route('admin_detailPublication',['id'=>$pub->id]) }}"
                                                class="btn btn-xs btn-outline btn-primary">detail <i
                                                    class="fa fa-long-arrow-right"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <span class="badge badge-danger">Pas d'information disponible</span><br>
                        @endforelse
                    </div>
                </div>
                <div id="tab_categorie" class="tab-pane">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom de la catégorie</th>
                                        <th>Date d'enregistrement</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categorie as $i)
                                    <tr class="gradeX">
                                        <td>{{ $i->id }}</td>
                                        <td>{{ $i->nom }}
                                        </td>
                                        <td> {{ \Carbon\Carbon::parse( $i->created_at)->isoFormat('LLLL') }}</td>
                                        <td class="center">
                                            <p>
                                                <a href="{{ $i->id }}" id="deleteCat"
                                                    class="btn btn-outline btn-danger dim">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <a href="{{route('editCat',$i->id)}}"
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
    });

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
