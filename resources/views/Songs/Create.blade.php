<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="container">
  <!-- Content here -->
  @yield('content')
</div>

</body>
</html>
..
@extends('songs.layout')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 class="text-3xl font-bold">Maak een song</h2>
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

<form action="{{ route('songs.store') }}" method="POST">
@csrf
  <div class="form-group">
    <label for="naam" class="font-bold">titel</label>
    <input type="text" class="form-control"  placeholder="Vul hier een titel in" name ="titel">
  </div>
  <div class="form-group">
    <label for="genre" class="font-bold">zanger</label>
    <input type="text" class="form-control"  placeholder="Vul hier een zanger in" name ="zanger">
  </div>
  <button class="btn btn-primary">Bevestigen</button>
</form>
<div class="pull-right">
    <br>
            <a class="btn btn-info" href="{{ route('songs.index') }}"> Terug</a>
        </div>

@endsection