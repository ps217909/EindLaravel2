@extends('bands.layout')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 class="text-3xl font-bold">Maak een band</h2>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Waarschuwing!</strong> Controleer of de velden allemaal zijn ingevuld<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('bands.store') }}" method="POST">
@csrf
  <div class="form-group">
    <label for="naam" class="font-bold">naam</label>
    <input type="text" class="form-control"  placeholder="Vul hier een naam in" name ="naam">
  </div>
  <div class="form-group">
    <label for="genre" class="font-bold">genre</label>
    <input type="text" class="form-control"  placeholder="Vul hier een genre in" name ="genre">
  </div>
  <div class="form-group">
    <label for="onstaan" class="font-bold">onstaan</label>
    <input type="text" class="form-control"  placeholder="Vul hier een ontstaan in" name ="onstaan">
  </div>
  <div class="form-group">
    <label for="actieftot" class="font-bold">actief tot</label>
    <input type="text" class="form-control"  placeholder="Vul hier een actief tot in" name ="actieftot">
  </div>
  <button class="btn btn-primary">Bevestigen</button>
</form>
<div class="pull-right">
  <br>
            <a class="btn btn-info" href="{{ route('bands.index') }}"> Terug</a>
        </div>

@endsection