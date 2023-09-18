@extends('layouts.app')

@section('title', 'Technologies')

@section('content')

  {{-- add new --}}
  <div class="mt-4 d-flex justify-content-end align-items-baseline">
    {{-- create --}}
    <a href="{{ route('admin.technologies.create') }}" class="btn btn-success mx-4">Crea nuovo progetto</a>
    {{-- trash --}}
    <a href="{{ route('admin.technologies.trash') }}" class="btn btn-danger">Cestino</a>
  </div>

  {{-- technologies --}}
  <div class="mt-4">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome tecnologia</th>
          <th scope="col">Creato il</th>
          <th scope="col">Ultima modifica</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse($technologies as $technology)
          <tr>
            <th scope="row">{{ $technology->id }}</th>
            <td>{{ $technology->label }}</td>
            <td>{{ $technology->created_at }}</td>
            <td>{{ $technology->updated_at }}</td>
            <td><a href="{{ route('admin.technologies.show', $technology) }}" class="btn btn-primary">Vedi</a></td>
          </tr>
        @empty
          <tr>
            <td class="text-center" colspan="6">
              <h3>Non ci sono tecnologie disponibili</h3>
            </td>
          </tr>
        @endforelse

      </tbody>
    </table>
  </div>

@endsection
