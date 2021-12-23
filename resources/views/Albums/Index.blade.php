@extends('albums.layout')
@section('content')

<section class=" max-w-screen-md m-auto">
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif

  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">naam</th>
        <th scope="col">jaar</th>
        <th scope="col">verkocht</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($albums as $album)
      <tr>
        <th scope="row">{{ $album->id }}</th>
        <td>{{ $album->naam }}</td>
        <td>{{ $album->jaar }}</td>
        <td>{{ $album->verkocht }}</td>
        <td>
          <form action="{{ route('albums.destroy',$album->id) }}" method="POST">

            <a class="btn btn-info" href="{{ route('albums.show',$album->id) }}">Toon</a>

            @if(Auth::check())
            <a class="btn btn-primary" href="{{ route('albums.edit',$album->id) }}">Pas aan</a>

            @csrf
            @method('DELETE')

            <button class="btn btn-danger">Verwijder</button>

            @endif

          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>


  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-right">
        @if(Auth::check())
        <a class="btn btn-primary" href="{{ route('albums.create') }}">Maak een album</a>
        @endif
      </div>
    </div>
  </div>

  {{ $albums->links() }}
</section>
@endsection