@extends('songs.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 class="text-3xl font-bold">Pas songs aan</h2>
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

<form action="{{ route('songs.update',$song->id) }}" method="POST">
@csrf
@method('PUT')
<div class="form-group">
    <label for="titel" class="font-bold">titel</label>
    <input type="text" class="form-control" value="{{ $song->titel }}" placeholder="Enter titel" name ="titel">
  </div>
  <div class="form-group">
    <label for="zanger" class="font-bold">zanger</label>
    <input type="text" class="form-control" value="{{ $song->zanger }}" placeholder="Enter aantal zanger" name ="zanger">
  </div>
  <button class="btn btn-primary">Bevestigen</button>
  <div class="pull-right">
      <br>
            <a class="btn btn-info" href="{{ route('songs.index') }}"> Terug</a>
        </div>
</form>

@endsection