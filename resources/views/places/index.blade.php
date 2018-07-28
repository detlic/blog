@extends('master')

@section('content')

<h1>Putovanja</h1>
@if(count($places)>0)
@foreach($places as $place)
    <div class="well">
        <div class="row">
            <div class="col-md-4 col-sm-4">
              <a class="thumbnail fancybox" rel="ligthbox" href="/files/{{ $place->cover_image }}">
                  <img class="img-responsive" alt="" src="/files/{{ $place->cover_image }}" />
                </a>
            </div>
            <div class="col-md-8 col-sm-8">
                <h3><a href="/places/{{$place->id}}">{{$place->name}}</a></h3>
                <small>Written on {{$place->created_at}} by {{$place->user->name}}</small>
            </div>
        </div>
    </div>
@endforeach
{{$places->links()}}
@else
<p>No place found</p>
@endif
<script type="text/javascript">
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>
@endsection
