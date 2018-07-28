@extends('master')

@section('content')

<h3 class="well">Novo putovanje</h3>


  <form method="post" action="{{action('PlaceController@store')}}" enctype="multipart/form-data">
   {{csrf_field()}}
   <div class="form-group">
    <label for="name" >Mesto</label>
    <input type="text" name="name" class="form-control" autocomplete="off" placeholder="Mesto koje ste posetili" />
   </div>
   <div class="form-group">
    <label for="name" >Opis</label>
    <textarea class="form-control" id="product-body" name="body" rows="8" cols="80" placeholder="Opis"></textarea>
   </div>

    <div class="input-group hdtuto control-group lst increment" >
      <input type="file" name="cover" class="myfrm form-control" placeholder="Pozadinska slika"><br><br><br>
      <input type="file" name="filenames[]" class="myfrm form-control" multiple>

    </div>
    <br>
    <button type="submit" class="btn btn-success" style="margin-top:10px">Kreiraj</button>

    <br><br>

</form>



 @endsection
