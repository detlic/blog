@extends('master')

@section('content')
<a href="/places" class="btn btn-default">Nazad</a>
<h1>{{$place->name}}</h1>

  <div>
    {!!$place->body!!}
</div>
<style type="text/css">
.gallery
{
    display: inline-block;
    margin-top: 20px;
}
.close-icon{
  border-radius: 50%;
    position: absolute;
    right: 5px;
    top: -10px;
    padding: 5px 8px;
}
.form-image-upload{
    background: #e8e8e8 none repeat scroll 0 0;
    padding: 15px;
}
</style>
<div class='list-group gallery'>

           @if($images->count())
               @foreach($images as $image)
               <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                   <a class="thumbnail fancybox" rel="ligthbox" href="/files/{{ $image->image }}">
                       <img class="img-responsive" alt="" src="/files/{{ $image->image }}" />
                       <div class='text-center'>
                           <small class='text-muted'>{{ $image->image }}</small>
                       </div> <!-- text-center / end -->
                   </a>
                   @auth
                   @if(Auth::user()->id==$place->user_id)
                   <form action="{{action('PlaceController@destroy_image', $image->id)}}" method="POST">
                   <input type="hidden" name="_method" value="delete">
                   {!! csrf_field() !!}
                   <button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                 </form>
                 @endif
                 @endauth
               </div> <!-- col-6 / end -->
               @endforeach
           @endif
           @auth
           @if(Auth::user()->id==$place->user_id)
           <form method="post" action="{{action('PlaceController@addimages',$place->id)}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">

               <input type="file" name="slike[]" class="myfrm form-control" multiple>

             </div>

             <button type="submit" class="btn btn-success" style="margin-top:10px">Dodaj slike</button>
         </form>


           @endif
           @endauth


    </div> <!-- list-group / end -->
<hr>

  <small>Kreirano {{$place->created_at}}</small>
  <hr>
  @auth
  @if(Auth::user()->id==$place->user_id)
  <a href="/places/{{$place->id}}/edit" class="btn btn-default">Izmeni</a>
  <form method="post" class="pull-right" action="{{action('PlaceController@destroy', $place->id)}}">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-danger">Obriši</button>
      <br><br><br>
     </form>

     @endif
     @endauth
     <script type="text/javascript">
         $(document).ready(function(){
             $(".fancybox").fancybox({
                 openEffect: "none",
                 closeEffect: "none"
             });
         });
     </script>
@endsection
