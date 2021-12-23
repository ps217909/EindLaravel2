@extends('albums.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 class="text-3xl font-bold">Pas albums aan</h2>
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

<form action="{{ route('albums.update',$album->id) }}" method="POST">
@csrf
@method('PUT')
  <div class="form-group">
    <label for="naam" class="font-bold">naam</label>
    <input type="text" class="form-control" value="{{ $album->naam }}" placeholder="Enter naam" name ="naam">
  </div>
  <div class="form-group">
    <label for="jaar" class="font-bold">jaar</label>
    <input type="text" class="form-control" value="{{ $album->jaar }}" placeholder="Enter jaartal" name ="jaar">
  </div>
  <div class="form-group">
    <label for="verkocht" class="font-bold">verkocht</label>
    <input type="text" class="form-control" value="{{ $album->verkocht }}" placeholder="Enter aantal verkocht" name ="verkocht">
  </div>
  <button class="btn btn-primary">Bevestigen</button>
  <div class="pull-right">
    <br>
            <a class="btn btn-info" href="{{ route('albums.index') }}"> Terug</a>
        </div>
</form>

@endsection