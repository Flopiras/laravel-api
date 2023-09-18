@extends('layouts.app')

@section('title', 'Types')

@section('content')

  {{-- add new --}}
  <div class="mt-4 d-flex justify-content-end align-items-baseline">
    {{-- create --}}
    <a href="{{ route('admin.types.create') }}" class="btn btn-success mx-4">Crea nuovo tipo</a>
    {{-- trash --}}
    <a href="{{ route('admin.types.trash') }}" class="btn btn-danger">Cestino</a>
  </div>

  {{-- types --}}
  <div class="mt-4">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome tipo</th>
          <th scope="col">Creato il</th>
          <th scope="col">Ultima modifica</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse($types as $type)
          <tr>
            <th scope="row">{{ $type->id }}</th>
            <td>{{ $type->label }}</td>
            <td>{{ $type->created_at }}</td>
            <td>{{ $type->updated_at }}</td>
            <td><a href="{{ route('admin.types.show', $type) }}" class="btn btn-primary">Vedi</a></td>
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
