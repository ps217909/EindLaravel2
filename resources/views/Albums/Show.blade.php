@extends('albums.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 class="text-3xl font-bold">Laat album zien</h2>
        </div>
    </div>
</div>
<form action="{{ route('albums.update',$album->id) }}" method="POST">
@csrf
@method('PUT')
  <div class="form-group">
    <label  class="font-bold" for="naam">naam:</label>
    <td>{{ $album->naam }}</td>
  </div>
  <div class="form-group">
    <label class="font-bold" for="jaar">jaar:</label>
    <td>{{ $album->jaar }}</td>
  </div>
  <div class="form-group">
    <label class="font-bold" for="verkocht">verkocht:</label>
    <td>{{ $album->verkocht }}</td>
  </div>
  <ul>
    @forelse ($album->songs as $song)
    <li>{{ $song->titel }} - {{ $song->zanger }}</li>
    @empty
    <p>Geen songs gevonden</p>
    @endforelse
</ul>
</form>
<div class="pull-right">
            <a class="btn btn-info" href="{{ route('albums.index') }}"> Back</a>
        </div>
@endsection