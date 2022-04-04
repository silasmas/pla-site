<div class="card card-exp mt-4">
    <h3>@lang('info.titrepage.vuepar') :</h3>
    <hr>
    <h4 class="mb-4">@lang('info.titrepage.vueparBureau') :</h4>
    <select class="select2_demo_3 form-control" id='teamByBureau'>
        <option></option>
        @forelse ($bureau as $b)
        <option value="{{ $b->id}}">{!! $b->adresse!!}</option>
        @empty
        @endforelse
    </select>
    <hr>
    {{--  <h4 class="">Catégories:</h4>
    <div class="link-category">
        <a href="{{ route('team') }}">@lang('info.team.all')<span class="num">( {{$avocat->count()}})</span></a>
        @forelse ($avocat as $cat)
        <a href="{{ route('teamByCat',['id'=>$cat->fonction_id]) }}">{{ $cat->fonction->fonction }}
            <span class="num">( {{$cat->fonction()->count()}})</span></a>
        @empty

        @endforelse
    </div>  --}}
    <h4 class="">@lang('info.titrepage.vueparCat') :</h4>
    <div class="link-category">
        <a href="{{ route('team') }}">@lang('info.team.all')<span class="num">({{ $avocat->count() }})</span></a>
        @forelse ($fonction as  $cat)
        <a href="{{ route('teamByCat',['id'=>$cat->id]) }}">{{$cat->fonction}}
            <span class="num">( {{$cat->avocat->count()}})</span></a>
        @empty

        @endforelse
    </div>
</div>
