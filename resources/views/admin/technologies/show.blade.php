@extends('layouts.app')

@section('title', $technology->label)

@section('content')
  {{-- back --}}
  <a href="{{ route('admin.technologies.index') }}" class="btn btn-primary mt-4">
    <i class="fas fa-arrow-left"></i> Torna alla lista delle tecnologie</a>

  <div class="card mt-4" style="width: 600px">
    <div class="row g-0">
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title text-center mb-4">{{ $technology->label }}</h5>
          <p class="card-text">Creata in data : {{ $technology->created_at }}</p>
          <p class="card-text"><small class="text-body-secondary">Update : {{ $technology->updated_at }}</small></p>
        </div>
      </div>
    </div>
    {{-- buttons --}}
    <div class="d-flex justify-content-end m-2">

      {{-- edit --}}
      <a href="{{ route('admin.technologies.edit', $technology) }}" class="btn btn-warning mx-3 mt-4 text-end"><i
          class="fas fa-pencil"></i> Edit</a>

      {{-- delete --}}
      <form method="POST" action="{{ route('admin.technologies.destroy', $technology) }}" class="delete-form mt-4">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
      </form>
    </div>
  </div>

@endsection

@section('scripts')
  @vite(['resources/js/delete-confirmation.js'])
@endsection
