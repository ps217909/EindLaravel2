@extends('bands.layout')
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
        <th scope="col">genre</th>
        <th scope="col">onstaan</th>
        <th scope="col">actief tot</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($bands as $band)
      <tr>
        <th scope="row">{{ $band->id }}</th>
        <td>{{ $band->naam }}</td>
        <td>{{ $band->genre }}</td>
        <td>{{ $band->onstaan }}</td>
        <td>{{ $band->actieftot }}</td>
        <td>
          <form action="{{ route('bands.destroy',$band->id) }}" method="POST">

            <a class="btn btn-info" href="{{ route('bands.show',$band->id) }}">Toon</a>

            @if(Auth::check())
            <a class="btn btn-primary" href="{{ route('bands.edit',$band->id) }}">Pas aan</a>

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
        <a class="btn btn-primary" href="{{ route('bands.create') }}">Maak een band</a>
        @endif
      </div>
    </div>
  </div>

  {{ $bands->links() }}
</section>
@endsection