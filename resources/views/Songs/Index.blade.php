@extends('songs.layout')
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
        <th scope="col">titel</th>
        <th scope="col">zanger</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($songs as $song)
      <tr>
        <th scope="row">{{ $song->id }}</th>
        <td>{{ $song->titel }}</td>
        <td>{{ $song->zanger }}</td>
        <td>
          <form action="{{ route('songs.destroy',$song->id) }}" method="POST">

            <a class="btn btn-info" href="{{ route('songs.show',$song->id) }}">Toon</a>

            @if(Auth::check())
            <a class="btn btn-primary" href="{{ route('songs.edit',$song->id) }}">Pas aan</a>

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
        <a class="btn btn-primary" href="{{ route('songs.create') }}">Maak een song</a>
        @endif
      </div>
    </div>
  </div>

  {{ $songs->links() }}
</section>
@endsection