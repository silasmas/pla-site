@extends('parties.adminTemplate',['titre'=>"Slide"])

@section('autres_style')
<link href="{{ asset('css/dataTables/datatables.min.cs') }}" rel="stylesheet">
@endsection
@section('content')
<div class="wrapper wrapper-content">
    <div class="row animated fadeInRight">
                     <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Titre 1</th>
                                        <th>Grand Titre</th>
                                        <th>Resumé</th>
                                        <th>Text button</th>
                                        <th>Lien de la page</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($slide as $i)
                                    <tr class="gradeX">
                                        <td><img src="{{ asset('storage/'.$i->photo) }}" width="100" height="100"/></td>
                                        <td>{{ $i->titresmall}}</td>
                                        <td>{{ $i->titrebig}}</td>
                                        <td class="center">{{ $i->resume}}</td>
                                        <td>{{ $i->textbtn}}</td>
                                        <td>{{ $i->lienvers}}</td>
                                        <td class="center">
                                            <p>
                                                <a href="{{ $i->id }}" id="deleteCat"
                                                    class="btn btn-outline btn-danger dim">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <a href="{{route('editSlide',$i->id)}}"
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
                                        <th>Image</th>
                                        <th>Titre 1</th>
                                        <th>Grand Titre</th>
                                        <th>Resumé</th>
                                        <th>Text button</th>
                                        <th>Lien de la page</th>
                                        <th>Options</th>
                                    </tr>
                                </tfoot>
                            </table>
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
                deleteTeame(id, 'destroy_slide');
            });
    });

    function deleteTeame(id, url) {

swal({
    title: "Attention suppression",
    text: "êtes vous sûre de supprimer ce slide ?",
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
