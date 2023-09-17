@extends('layouts.app')

@section('title', 'Projects')

@section('content')
  <div class="d-flex justify-content-between align-items-baseline">
    {{-- searchbar --}}
    <form action="{{ route('admin.projects.index') }}" method="GET">
      <div class="input-group mb-3" style="width: 400px">
        <button class="btn btn-outline-secondary" type="submit">Filtra</button>
        <select class="form-select" name="type_filter">
          <option value="">Tutte le categorie</option>
          @foreach ($types as $type)
            <option @if ($type_filter == $type->id) selected @endif value="{{ $type->id }}">{{ $type->label }}
            </option>
          @endforeach
        </select>
      </div>
    </form>
    {{-- add new --}}
    <div class="mt-4 d-flex justify-content-end align-items-baseline">
      {{-- create --}}
      <a href="{{ route('admin.projects.create') }}" class="btn btn-success mx-4">Crea nuovo progetto</a>
      {{-- trash --}}
      <a href="{{ route('admin.projects.trash') }}" class="btn btn-danger">Cestino</a>
    </div>
  </div>

  {{-- projects --}}
  <div class="mt-4">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome progetto</th>
          <th scope="col">Tecnologie</th>
          <th scope="col">Categoria</th>
          <th scope="col">Creato il</th>
          <th scope="col">Ultima modifica</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse($projects as $project)
          <tr>
            <th scope="row">{{ $project->id }}</th>
            <td>{{ $project->title }}</td>
            <td>
              @if (count($project->technologies))
                @foreach ($project->technologies as $technology)
                  <span class="badge rounded-pill text-bg-dark">{{ $technology->label }}</span>
                @endforeach
              @else
                --
              @endif
            </td>
            <td>
              @if ($project->type_id)
                <span class="badge" style="background-color: {{ $project->type->color }}">{{ $project->type->label }}
                </span>
              @else
                --
              @endif
            </td>
            <td>{{ $project->created_at }}</td>
            <td>{{ $project->updated_at }}</td>
            <td><a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary">Vedi</a></td>
          </tr>
        @empty
          <tr>
            <td class="text-center" colspan="6">
              <h3>Non ci sono progetti disponibili</h3>
            </td>
          </tr>
        @endforelse

      </tbody>
    </table>
  </div>
@endsection
