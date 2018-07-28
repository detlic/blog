@extends('master')

@section('content')
<h3 class="well">Izmeni putovanje</h3>


  <form method="post" action="{{action('PlaceController@update',$place->id)}}" enctype="multipart/form-data">
    {{csrf_field()}}
  <input type="hidden" name="_method" value="PATCH" />
   <div class="form-group">
    <label for="name" >Mesto</label>
    <input type="text" name="name" class="form-control" autocomplete="off" value="{{$place->name}}" />
   </div>
   <div class="form-group">
    <label for="name" >Opis</label>
    <textarea class="form-control" id="product-body" name="body" rows="8" cols="80">{{$place->body}}</textarea>
   </div>

    <div class="input-group hdtuto control-group lst increment" >
      <input type="file" name="cover" class="myfrm form-control" value="{{$place->cover_image}}"><br><br><br>


    </div>

    <button type="submit" class="btn btn-success" style="margin-top:10px">Unesi izmene</button>
    <br><br>


</form>



 @endsection
