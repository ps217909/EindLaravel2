@extends('bands.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 class="text-3xl font-bold">Laat band zien</h2>
        </div>
    </div>
</div>
<form action="{{ route('bands.update',$band->id) }}" method="POST">
@csrf
@method('PUT')
  <div class="form-group">
    <label  class="font-bold" for="naam">naam:</label>
    <td>{{ $band->naam }}</td>
  </div>
  <div class="form-group">
    <label class="font-bold" for="genre">genre:</label>
    <td>{{ $band->genre }}</td>
  </div>
<div class="form-group">
    <label  class="font-bold" for="onstaan">onstaan:</label>
    <td>{{ $band->onstaan }}</td>
  </div>
  <div class="form-group">
    <label  class="font-bold" for="actieftot">actief tot:</label>
    <td>{{ $band->actieftot }}</td>
  </div>
</form>
<div class="pull-right">
            <a class="btn btn-info" href="{{ route('bands.index') }}"> Back</a>
        </div>

@endsection