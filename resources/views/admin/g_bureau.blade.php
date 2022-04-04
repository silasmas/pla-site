@extends('parties.adminTemplate',['titre'=>"G_Bureau"])

@section('autres_style')
<link href="{{ asset('css/dataTables/datatables.min.cs') }}" rel="stylesheet">
@endsection
@section('content')

<div class="wrapper wrapper-content">
    <div class="row animated fadeInRight">
                    <div class="panel-body">
                            @forelse ($bureau as $pub)
                            <div class="col-md-4">
                                <div class="ibox">
                                    <div class="ibox-content product-box">
                                        <div class="product-imitation" style="padding: 2px 0 !important;">
                                            <img src="{{'../storage/'.$pub->photo}}" class="img-responsive"
                                                style="height: 250px !important;" height="50" />
                                        </div>
                                        <div class="product-desc">
                                            <span class="product-price">
                                                {{ $pub->created_at->format('d').'-'.$pub->created_at->format('M')  }}
                                            </span>
                                        <span class="product-name">
                                            {{ $pub->titre }}
                                        </span>
                                        <p>
                                            <span class="btn btn-white btn-circle"><i class="fa fa-envelope"></i>
                                            </span>   <small class="text-muted">{{ $pub->email }}</small>
                                        </p>
                                        <p>
                                            <span class="btn btn-white btn-circle"><i class="fa fa-phone"></i>
                                            </span>   <small class="text-muted">{{ $pub->telephone }}</small>
                                        </p>
                                        <p>
                                            <span class="btn btn-white btn-circle"><i class="fa fa-map-marker"></i>
                                            </span>   <small class="text-muted">{{ $pub->physique }}</small>
                                        </p>
                                            <div class="small m-t-xs text-center">
                                                {{ strip_tags($pub->adresse) }}
                                            </div>
                                            <div class="m-t text-righ">
                                                <a href="{{$pub->id}}"
                                                  id="deleteBureau"  class="btn btn-xs btn-outline btn-danger">Supprimer <i
                                                        class="fa fa-trash"></i> </a>

                                                <a href="{{ route('admin_editeBureau',['id'=>$pub->id]) }}" class="btn btn-xs btn-outline btn-warning">Modifier <i
                                                            class="fa fa-edit"></i> </a>
                                                <a href="{{ route('admin_detailBureau',['id'=>$pub->id]) }}" class="btn btn-xs btn-outline btn-success">Detail <i
                                                            class="fa fa-info-circle"></i> </a>
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
@endsection
@section('autres-script')
<script src="{{asset('js/dataTables/datatables.min.js')}}"></script>
<script>
    $(document).ready(function () {

        $(document).on("click", "#deleteBureau", function (e) {
                e.preventDefault();
                var id = $(this).attr("href");
                deleteTeame(id, 'destroy_bureau');
            });
    });

    function deleteTeame(id, url) {

swal({
    title: "Attention suppression",
    text: "êtes vous sûre de vouloir supprimer ce bureau?",
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
