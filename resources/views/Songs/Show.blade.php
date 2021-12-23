@extends('songs.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 class="text-3xl font-bold">Laat song zien</h2>
        </div>
    </div>
</div>
<form action="{{ route('songs.update',$song->id) }}" method="POST">
@csrf
@method('PUT')
  <div class="form-group">
    <label  class="font-bold" for="titel">titel:</label>
    <td>{{ $song->titel }}</td>
  </div>
  <div class="form-group">
    <label class="font-bold" for="zanger">zanger:</label>
    <td>{{ $song->zanger }}</td>
  </div>
</form>
<div class="pull-right">
            <a class="btn btn-info" href="{{ route('songs.index') }}"> Back</a>
        </div>

@endsection