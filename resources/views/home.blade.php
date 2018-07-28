@extends('master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <div class="panel-body">
                  <a href="/places/create" class="btn btn-primary">Kreiraj</a>
                  <h3>Tvoja putovanja</h3>
                  @if(count($places)>0)
                  <table class="table table-striped">

                    <table class="table table-striped">
                      <tr>
                          <th>Naziv mesta</th>
                          <th></th>
                          <th></th>
                      </tr>
                      @foreach($places as $place)
                          <tr>
                              <td><a href="/places/{{$place->id}}">{{$place->name}}</a></td>
                              <td><a href="/places/{{$place->id}}/edit" class="btn btn-default">Izmeni</a></td>
                              <td>
                                <form method="post" class="pull-right" action="{{action('PlaceController@destroy', $place->id)}}">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="DELETE" />
    <button type="submit" class="btn btn-danger">Obriši</button>
   </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        @else
                                        <p>You have no posts</p>
@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
