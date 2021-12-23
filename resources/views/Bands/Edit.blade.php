@extends('bands.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 class="text-3xl font-bold">Pas bands aan</h2>
        </div>
    </div>
</div>

@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong>Controleer of alle velden zijn ingevuld<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif

<form action="{{ route('bands.update',$band->id) }}" method="POST">
@csrf
@method('PUT')
  <div class="form-group">
    <label for="naam" class="font-bold">naam</label>
    <input type="text" class="form-control" value="{{ $band->naam }}" placeholder="Enter naam" name ="naam">
  </div>
  <div class="form-group">
    <label for="genre" class="font-bold">genre</label>
    <input type="text" class="form-control" value="{{ $band->genre }}" placeholder="Enter genre" name ="genre">
  </div>
<div class="form-group">
    <label for="onstaan" class="font-bold">onstaan</label>
    <input type="text" class="form-control" value="{{ $band->onstaan }}" placeholder="Enter onstaan" name ="onstaan">
  </div>
  <div class="form-group">
    <label for="actieftot" class="font-bold">actief tot</label>
    <input type="text" class="form-control" value="{{ $band->actieftot }}" placeholder="Enter actieftot" name ="actieftot">
  </div>
  <button class="btn btn-primary">Bevestigen</button>
  <div class="pull-right">
    <br>
            <a class="btn btn-info" href="{{ route('bands.index') }}"> Terug</a>
        </div>
</form>

@endsection